<?php

namespace App;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getTitleAttribute()
    {
        return array_get($this->getFeedContents(), 'title');
    }

    public function getDescriptionAttribute()
    {
        return array_get($this->getFeedContents(), 'description');
    }

    public function getCountAttribute()
    {
        return $this->items->count();
    }

    public function getItemsAttribute()
    {
        return collect(
            array_get($this->getFeedContents(), 'items', [])
        )->map(function ($item) {
            return new FeedItem($item);
        });
    }

    public function isValid()
    {
        return $this->getFeedContents() !== null;
    }

    public function isInvalid()
    {
        return ! $this->isValid();
    }

    public function getFeedContents()
    {
        return \Cache::remember("feeds.{$this->id}", 5, function () {
            $client = new Client();
            $response = $client->get($this->url);
            return json_decode($response->getBody()->getContents(), true);
        });
    }
}
