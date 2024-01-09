<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        body {
            background-color: black;
            color: yellow;
            margin: 0;
            font-size: 48px;
        }

        .header {
            background-color: black;
            color: yellow;
            padding: 10px;
            font-size: 1.5em;
            font-weight: bold;
            text-align: center;
        }

        .navbar {
            background-color: black;
            padding: 0;
        }

        .navbar-brand {
            color: yellow;
            border: 1px solid yellow;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .navbar-nav .nav-link {
            color: black;
            background-color: yellow;
            border: 1px solid black;
            margin: 5px;
            padding: 5px 10px;
            border-radius: 5px;
        }

        select {
            :is(option) {
                font-size: 32px;
            }
        }

        .btn-warning {
            font-size: 32px;
        }

        .navbar-brand {
            font-size: 48px;
        }

        .navbar-brand:hover,
        .navbar-brand:focus {
            color: yellow;
            background-color: transparent;
        }

        .form-control {
            font-size: 32px;
        }

    </style>
</head>
<body>
<div class="header">
    <title style="color: yellow;">{{ config('app.name', 'SightlessGamers') }}</title>
</div>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-black shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'SightlessGamers') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Log in') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Registreer') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('games.index')}}">Games</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('games.create')}}">Toevoegen</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Log uit`') }}
                            </a>
                        </li>
                    @endguest



                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
</html>


