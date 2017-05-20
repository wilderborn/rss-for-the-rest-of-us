<nav class="nav-main">
    <a href="/" class="brand">
        {!! svg('us') !!}
        <span class="title">RSS<sup>beta</sup></span>
    </a>

    <ul class="links">
        @if (Auth::check())
            <li><a href="{{ route('feeds.create') }}" class="active">Add Feed</a></li>
            <li><a href="{{ route('feeds.index') }}">Your Feeds</a></li>
            <li><a href="/logout">Logout</a></li>
        @else
            <li><a href="/register">Register</a></li>
            <li><a href="/login">Login</a></li>
        @endif
    </ul>
</nav>
