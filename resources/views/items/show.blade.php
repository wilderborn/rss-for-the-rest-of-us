@extends('layouts.app')
@section('title', $feed->title)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12" v-pre>

                <h1><a href="{{ $item->url }}">{{ $item->title }}</a></h1>
                {!! $item->content_html !!}

            </div>
        </div>
    </div>
@endsection
