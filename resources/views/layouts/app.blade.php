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
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="{{ route('home') }}">{{ config('app.name', 'Laravel') }}</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page"
                                href="{{ route('home') }}">TRANG CHỦ</a></li>
                        <li class="nav-item"><a class="nav-link active" href="#">VỀ CHÚNG TÔI</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle" id="navbarDropdown" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">SHOP</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{route('allProducts')}}">Tất cả sản phẩm</a></li>
                                <li>
                                    <hr class="dropdown-divider" />
                                </li>
                                <li><a class="dropdown-item" href="{{route('search')}}?query=APPLE">APPLE</a></li>
                                <li><a class="dropdown-item" href="{{route('search')}}?query=ASUS">ASUS</a></li>
                                <li><a class="dropdown-item" href="{{route('search')}}?query=Lenovo">Lenovo</a></li>
                                <li><a class="dropdown-item" href="{{route('search')}}?query=MSI">MSI</a></li>
                                    <hr class="dropdown-divider" />
                                <li><a class="dropdown-item" href="{{route('search')}}?query=Laptop">Laptop</a></li>
                                <li><a class="dropdown-item" href="{{route('search')}}?query=PC">Máy tính để bàn</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <form action="{{route('search')}}">
                                <div class="input-group">
                                    <div class="form-outline shadow-sm">
                                        <input type="text" id="query" name="query" class="form-control" />
                                    </div>
                                    <button type="submit" class="btn shadow-sm">
                                        <img src="/storage/icons/search.svg" alt="">
                                    </button>
                                </div>
                            </form>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        {{-- Cart button --}}
                        <a class="nav-link" href="{{ route('cart.show') }}">
                            <img style="width:25px; margin-top:2px;" src="/storage/icons/cart.svg" alt="Cart">
                        </a>

                        <li class="nav-item dropdown">

                            {{-- Avatar --}}
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <img style="width: 30px; margin-right: 0.75rem;" class="rounded-circle"
                                    src="/storage/{{ Auth::user()->profile->avatar }}" alt="">
                                {{ Auth::user()->username }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                {{-- Dropdown profile --}}
                                <a class="dropdown-item" href="{{ route('profile.show') }}">
                                    {{ __('Tài khoản của tôi') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('profile.password') }}">
                                    {{ __('Đổi mật khẩu') }}
                                </a>

                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>



        <main class="mb-4 min-vh-100">
            @yield('content')
        </main>
    </div>
</body>
{{-- FOOTER --}}
@extends('layouts.footer')
@include('sweetalert::alert')

</html>

<script>
    const myModal = document.getElementById('myModal')
    const myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', () => {
    myInput.focus()
    })

</script>