@extends('layouts.app')

@section('title', "Your Feeds")

@section('content')
    <div class="grid">
        <div class="item">
            <a class="feed-cover add-feed" href="{{ route('feeds.create') }}">
                <h2 class="feed-title">Add Feed</h2>
            </a>
        </div>
        @foreach ($feeds as $feed)
            <div class="item">
                <a href="{{ route('feeds.show', $feed) }}" class="feed-cover @if($feed->icon) with-image @endif " @if($feed->icon)style="background-image: url('{{ $feed->icon }}');"@endif>
                    @if (! $feed->icon)
                        <h2 class="feed-title">{{ $feed->title }}</h2>
                    @endif

                    <div class="feed-count"><span>{{ $feed->count }}</span></div>
                </a>
                <div class="feed-description">
                    @if ($feed->icon)
                        <h3>{{ $feed->title }}</h3>
                    @endif
                    @if ($feed->description)
                        <p>{{ $feed->description }}</p>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endsection
