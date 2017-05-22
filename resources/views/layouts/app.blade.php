@extends('layouts.base')

@section('all')
    <header class="page-header">
        <h1>@yield('title', 'Rad!')</h1>
    </header>
    
    <section class="main">
        @yield('content')
    </section>
@stop