@extends('layouts.app')
@section('title', $feed->title)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12" v-pre>

                <form action="{{ route('feeds.destroy', $feed) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button>Unsubscribe</button>
                </form>

                <h2>{{ $feed->title }} <span class="badge">{{ $feed->count }}</span></h2>
                <p>{{ $feed->description }}</p>

                @foreach ($feed->items as $item)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="{{ $item->url }}">{{ $item->title }}</a>
                        </div>
                        <div class="panel-body" v-pre>
                            {!! $item->content_html !!}
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
