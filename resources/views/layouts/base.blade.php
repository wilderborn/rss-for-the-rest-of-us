<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | RSS For the Rest of Us</title>
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <script src="https://use.typekit.net/uoh8uqk.js"></script>
    <script>try{Typekit.load({ async: true });}catch(e){}</script>
</head>
<body>
    <div id="app">
        @include('partials/nav')
        @yield('all')
        
        <footer class="site-footer">
            © Copyright 2017 by the gentlemen at <a href="https://wilderborn.com">Wilderborn</a>.
        </footer>
    </div>

    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}

    @if (env('APP_ENV') === 'production')
        <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-99573963-1', 'auto');
        ga('send', 'pageview');
        </script>
    @endif
</body>
</html>