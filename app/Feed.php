<?php

namespace App;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Exception\GuzzleException;

class Feed extends Model
{
    protected $guarded = [];

    public function subscribers()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
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
        })->keyBy(function ($item) {
            return $item->id;
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
        return \Cache::remember("feeds.{$this->url}", 5, function () {
            $client = new Client();

            try {
                $response = $client->get($this->url);
            } catch (GuzzleException $e) {
                return null;
            }

            return json_decode($response->getBody()->getContents(), true);
        });
    }
}
