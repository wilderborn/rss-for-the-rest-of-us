@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <p>
                    <a href="{{ route('feeds.create') }}" class="btn btn-primary">Create Feed</a>
                </p>

                <div class="panel panel-default">
                    <div class="panel-heading">Feeds</div>

                    <div class="panel-body">

                        <table class="table">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Items</th>
                                <th>URL</th>
                            </tr>
                            </thead>
                            @foreach ($feeds as $feed)
                                <tr>
                                    <td><a href="{{ route('feeds.show', $feed) }}">{{ $feed->title }}</a></td>
                                    <td>{{ $feed->description }}</td>
                                    <td>{{ $feed->count }}</td>
                                    <td>{{ $feed->url }}</td>
                                </tr>
                            @endforeach
                        </table>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
