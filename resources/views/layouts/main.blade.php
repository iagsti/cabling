<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    @yield('scripts')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">

        @auth
            <ul id="dropdown-user" class="dropdown-content">
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="material-icons left">exit_to_app</i>
                        {{ __('Sair') }}
                    </a>
                </li>
            </ul>
        @endauth

        <div class="navbar-fixed">
            <nav>
                <div class="nav-wrapper container">
                    <a href="{{ route('home') }}" class="brand-logo" dusk="title">{{ config('app.name', 'Laravel') }}</a>
                    <ul class="right">
                        @auth
                            <login-component username="{{ Auth::user()->name }}"></login-component>
                        @endauth
                    </ul>        
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </nav>
        </div>
        @yield('welcome')
        <div class="container">
            <div>
                <h5>@yield('pageTitle')</h5>
            </div>
            @yield('content')
        </div>
    </div>
</body>