@extends('layouts.custom')    
@section('title', 'Create Your Account')

@section('content')


<form class="hero styled" role="form" method="POST" action="{{ route('register') }}">
    <div class="content">
        <h2>Create Account</h2>
        {{ csrf_field() }}

        <div class="fields">
            <label for="name">Name</label>
            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif

            <label for="email">E-Mail Address</label>
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif

            <label for="password">Password</label>
            <input id="password" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif

            <label for="password-confirm">Confirm Password</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

            <button type="submit" class="button">Register</button>

            <br>
            <small>By registering you agree it's cool if we send you an email one day. We never sell your info, ever. That's dank.</small>
    </div>
</form>
                
@endsection
