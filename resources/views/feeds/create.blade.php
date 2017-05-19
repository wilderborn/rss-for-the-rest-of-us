@extends('layouts.app')

@section('title', 'Add Feed')
@section('content')
    <form method="POST" class="styled" action="{{ route('feeds.store') }}">
        {{ csrf_field() }}
            <label>URL</label>
            <div class="flexy">
                <input type="text" class="max nm" name="url" value="{{ old('url', request('url')) }}" autofocus required />
                <button class="button fill nm" type="submit">Add</button>
            </div>

            @if ($errors->has('url'))
                <span class="help-block">
                    <strong>{{ $errors->first('url') }}</strong>
                </span>
            @endif
    </form>

@endsection
