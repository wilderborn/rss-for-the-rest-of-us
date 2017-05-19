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
                <a href="{{ route('feeds.show', $feed) }}" class="feed-cover">
                    <h2 class="feed-title">{{ $feed->title }}</h2>
                    <div class="feed-count"><span>{{ $feed->count }}</span></div>
                </a>
                <div class="feed-description">
                    {{ $feed->description }}
                    {{-- {{ $feed->url }} --}}
                </div>
            </div>
        @endforeach
    </div>
@endsection
