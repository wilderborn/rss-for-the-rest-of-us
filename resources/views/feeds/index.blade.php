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
                                <th>ID</th>
                                <th>Domain</th>
                            </tr>
                            </thead>
                            @foreach ($feeds as $feed)
                                <tr>
                                    <td>{{ $feed->id }}</td>
                                    <td><a href="{{ route('feeds.show', $feed) }}">{{ $feed->url }}</a></td>
                                </tr>
                            @endforeach
                        </table>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
