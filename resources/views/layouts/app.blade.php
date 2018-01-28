<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="//use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        <header class="navbar">
            <section class="navbar-section">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <p class="pl-2 text-xs text-grey-dark">Online 2D Medieval RPG</p>
            </section>
            <section class="navbar-section">
                @guest
                    <a class="btn btn-link" href="{{ route('login') }}">Login</a>
                    <a class="btn btn-link" href="{{ route('register') }}">Register</a>
                @else
                    <div class="dropdown dropdown-right">
                        <a class="btn btn-primary dropdown-toggle" tabindex="0">
                        {{ Auth::user()->username }} <i class="fas fa-chevron-down"></i>
                        </a>
                        <ul class="menu text-left">
                        <li class="menu-item">
                            <a href="{{ route('dashboard') }}">my dashboard</a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('logout') }}" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                        </ul>
                    </div>
                @endguest
            </section>
        </header>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
