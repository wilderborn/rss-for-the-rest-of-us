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
        <header class="page-header">
            <h1>@yield('title', 'Rad!')</h1>
        </header>
        <section class="main">
            @yield('content')
        </section>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
