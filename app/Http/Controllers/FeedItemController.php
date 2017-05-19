<?php

namespace App\Http\Controllers;

use App\Feed;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class FeedItemController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param Feed $feed
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Feed $feed)
    {
        if (! $request->id) {
            throw new ModelNotFoundException;
        }

        if (! $item = $feed->items->get($request->id)) {
            throw new ModelNotFoundException;
        }

        return view('items.show', compact('feed', 'item'));
    }
}
