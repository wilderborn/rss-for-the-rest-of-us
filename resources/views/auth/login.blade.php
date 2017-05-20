@extends('layouts.custom')
@section('title', "Login")

@section('content')
    <form class="hero styled" role="form" method="POST" action="{{ route('login') }}">
        <div class="content">
            <h2>Login</h2>
            
        {{ csrf_field() }}
        <div class="fields">
            <label for="email">E-Mail Address</label>
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <label for="password">Password</label>
            <input id="password" type="password" class="form-control" name="password" required>

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif

            {{-- <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                </label>
            </div> --}}

            <button type="submit" class="button">Login</button>
            
            <br>
            <a class="link" href="{{ route('password.request') }}">
                Forgot Your Password?
            </a>
        </div>
        </div>
    </form>

@endsection
