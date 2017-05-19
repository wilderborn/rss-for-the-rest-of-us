@extends('layouts.app')
@section('page-header', $feed->title)


@section('content')
    <form action="{{ route('feeds.destroy', $feed) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button>Unsubscribe</button>
    </form>
    
    <div class="read">
            <div class="content" v-pre>
                <h2>{{ $feed->title }} <span class="badge">{{ $feed->count }}</span></h2>
                <p>{{ $feed->description }}</p>

                @if ($feed->icon)
                    <img src="{{ $feed->icon }}" />
                @endif

                @foreach ($feed->items as $item)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="{{ route('feeds.items.show', [$feed, 'id' => $item->id]) }}">#</a>
                            <a href="{{ $item->url }}">{{ $item->title }}</a>
                        </div>
                        <div class="panel-body" v-pre>
                            {!! $item->content_html !!}
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
@endsection
