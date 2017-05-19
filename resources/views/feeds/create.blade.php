@extends('layouts.app')

@section('title', 'Add Feed')
@section('content')
    <form method="POST" action="{{ route('feeds.store') }}">
        {{ csrf_field() }}
        <div class="form-group {{ $errors->has('url') ? ' has-error' : '' }}">
            <label>URL</label>

            <input type="text" name="url" value="{{ old('url', request('url')) }}" autofocus required />

            @if ($errors->has('url'))
                <span class="help-block">
                    <strong>{{ $errors->first('url') }}</strong>
                </span>
            @endif
        </div>
        <button class="button" type="submit">Add</button>
    </form>

@endsection
