<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    {{-- favicon --}}
    <link rel="icon" href="{{url('/storage/favicon.ico')}}">
    <link rel="stylesheet" href="{{ resource_path('css/cart.css') }}" />

    <!-- Scripts -->
    @vite(['resources/sass/app.scss',
     'resources/js/auth.js',
     'resources/css/auth.css'])
</head>

<body>
    @yield('content')
</body>

</html>
