<?php

namespace App\Http\Controllers;

use App\Feed;
use Illuminate\Http\Request;
use App\Exceptions\InvalidFeedException;

class FeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $feeds = $request->user()->feeds;

        return view('feeds.index', compact('feeds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('feeds.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'url' => 'required|url'
        ]);

        try {
            $feed = $this->createFeed($request->url);
        } catch (InvalidFeedException $e) {
            return back()
                ->withInput()
                ->withErrors(['url' => "This doesn't appear to be a JSON feed."]);
        }

        $request->user()->feeds()->attach($feed);

        return redirect()->route('feeds.show', $feed);
    }

    private function createFeed($url)
    {
        if ($feed = Feed::where('url', $url)->first()) {
            return $feed;
        }

        return tap(new Feed(['url' => $url]), function ($feed) {
            throw_if($feed->isInvalid(), InvalidFeedException::class);

            $feed->save();
        });
    }

    /**
     * Display the specified resource.
     *
     * @param Feed $feed
     * @return \Illuminate\Http\Response
     */
    public function show(Feed $feed)
    {
        return view('feeds.show', compact('feed'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Feed $feed
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Feed $feed)
    {
        $request->user()->feeds()->detach($feed);

        return redirect()->route('feeds.index');
    }
}
