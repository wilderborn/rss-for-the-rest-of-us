@extends('layouts.custom')
@section('title', 'Reset Password')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form class="hero styled" role="form" method="POST" action="{{ route('password.email') }}">
        {{ csrf_field() }}
        <div class="content">
            <h2>Reset Password</h2>
            <div class="fields">
                <label for="email">E-Mail Address</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                <button type="submit" class="button" type="submit">Send Reset Link</button>
            </div>
        </div>
    </form>
    
@endsection
