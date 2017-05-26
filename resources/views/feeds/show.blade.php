@extends('layouts.custom')
@section('title', $feed->title)

@section('content')
    <header class="page-header flexy">
        <div class="fill" v-pre>
            <h1>
                {{ $feed->title }}
                <small class="badge">({{ $feed->count }})</small>
            </h1>
            <p>{{ $feed->description }}</p>
        </div>
        <form action="{{ route('feeds.destroy', $feed) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button class="button">Unsubscribe</button>
        </form>
    </header>
    
    <section class="main">
        <div class="read">
            @foreach ($feed->items as $item)
                <div class="feed-item">
                    @if ($item->image)
                    <div class="media">
                        <img src="{{ $item->image }}">
                    </div>
                    @endif
                    <div class="content">
                        <h2><a href="{{ route('feeds.items.show', [$feed, 'id' => $item->id]) }}">{{ $item->title }}</a></h2>
                        <p><em>{{ \Carbon\Carbon::parse($item->date_published)->diffForHumans() }}</em></p>
                        {!! $item->summary !!}
                    </div>
                </div>
            @endforeach
        </div>        
    </section>
@endsection
