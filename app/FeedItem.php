<?php

namespace App;

use Illuminate\Support\Str;

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

    public function contentHtml()
    {
        return safe_html(
            array_get($this->data, 'content_html')
        );
    }

    public function __get($key)
    {
        if (method_exists($this, $method = Str::camel($key))) {
            return $this->$method();
        }

        return array_get($this->data, $key);
    }
}
