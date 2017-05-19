<?php

namespace App;

class FeedItem
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function title()
    {
        return array_get($this->data, 'title', $this->id);
    }

    public function __get($key)
    {
        if (method_exists($this, $key)) {
            return $this->$key();
        }

        return array_get($this->data, $key);
    }
}
