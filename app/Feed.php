<?php

namespace App;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Exception\ClientException;

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
        )->filter(function ($item) {
            // Items without IDs should be discarded as per spec.
            return array_get($item, 'id');
        })->map(function ($item) {
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

            try {
                $response = $client->get($this->url);
            } catch (ClientException $e) {
                return null;
            }

            return json_decode($response->getBody()->getContents(), true);
        });
    }
}
