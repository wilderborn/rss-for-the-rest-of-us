<nav class="nav-main">
    <a href="/" class="brand">
        {!! svg('us') !!}
        <span class="title">RSS</span>
    </a>

    <ul class="links">
        <li><a href="{{ route('feeds.create') }}" class="active">Add Feed</a></li>
        <li><a href="{{ route('feeds.index') }}">Your Feeds</a></li>
        <li><a href="/logout">Logout</a></li>
    </ul>
</nav>