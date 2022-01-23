<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <link rel="icon" type="image/jpg" href="{{ url('storage/instagram.png') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ url('assets/jquery/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ url('js/instadeck.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{url('assets/fontawesome-513/css/all.css')}}">

    <!-- Styles -->
    <link href="{{ url('css/app.css') }}" rel="stylesheet">
    <link href="{{ url('css/instadeck.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-sm navbar-light bg-white" id="dhs_navbar">
            <div class="container">
                <div id="dhs_navbar-brand"><a class="navbar-brand" href="/">InstaDeck</a></div>
                @if (Route::currentRouteName() == 'instadeck.explore' || Route::currentRouteName() == 'instadeck.search')
                    <a href="#" class="navbar-toggler" onclick="searchToggle()"><i class="fas fa-fw fa-search"></i></a>
                    <form action="/search" method="get" class="dhs_search-form">
                        <div class="input-group dhs_search-bar">
                            <input id="desktop-search" name="search" type="text" spellcheck="false" autocomplete="off" class="form-control dhs_search-input" placeholder="Search Users...">
                            <i class="fas fa-fw fa-search dhs_search-icon"></i>
                        </div>
                    </form>
                @endif
                @if (Auth::user())
                <div class="navbar-nav" id="dhs_navbar-dropdown">
                    <div class="dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" data-toggle="dropdown">
                            {{ Auth::user()->username }}
                        </a>
                        <div class="dropdown-menu" id="dhs_dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item dhs_dropdown-item" href="/">
                                <i class="fas fa-fw fa-home mr-3"></i>{{ __('Home') }}
                            </a>
                            <a class="dropdown-item dhs_dropdown-item" href="/explore">
                                <i class="fas fa-fw fa-search mr-3"></i>{{ __('Explore') }}
                            </a>
                            <a class="dropdown-item dhs_dropdown-item" href="/profile/{{ Auth::user()->username }}">
                                <i class="fas fa-fw fa-user mr-3"></i>{{ __('Profile') }}
                            </a>
                            <a class="dropdown-item dhs_dropdown-item" href="{{ route('instadeck.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-fw fa-power-off mr-3"></i>{{ __('Logout') }}
                            </a>
                        </div>
                    </div>
                </div>
                @endif
                @if (Route::currentRouteName() == 'instadeck.profile.show')
                    <div class="navbar-nav" id="dhs_navbar-nav">
                        <div class="dropdown" id="dhs_dropdown">{{ Request::segment(3) }}</div>
                    </div>
                @endif
            </div>
        </nav>

        <main class="dhs_main-page">
            @yield('content')
        </main>

        @if (Auth::user(['id']))
            <div id="dhs_mobile-button">
                <div class="col text-center">
                    <a href="/" class="dhs_mobile-link-dark {{ Route::currentRouteName() == 'instadeck.home' ? 'active' : '' }}" title="Home">
                        <i class="fas fa-fw fa-home"></i>
                    </a>
                </div>
                <div class="col text-center">
                    <a href="/explore" class="dhs_mobile-link-dark {{ Route::currentRouteName() == 'instadeck.explore' || Route::currentRouteName() == 'instadeck.search' ? 'active' : '' }}" title="Explore">
                        <i class="fas fa-fw fa-search"></i>
                    </a>
                </div>
                <div class="col text-center">
                    <a href="/post/create" class="dhs_mobile-link-dark {{ Route::currentRouteName() == 'instadeck.post.create' ? 'active' : '' }}" title="Create New Post">
                        <i class="fas fa-fw fa-plus-square"></i>
                    </a>
                </div>
                <div class="col text-center">
                    <a href="/profile/{{ Auth::user()->username }}" title="Profile">
                        <img src="{{ Auth::user()->profile->profileImage() }}" class="rounded-circle dhs_mobile-nav {{ Request::segment(3) == Auth::user()->username && Route::currentRouteName() == 'instadeck.profile.show' ? 'active' : '' }}">
                    </a>
                </div>
                <div class="col text-center">
                    <a href="{{ route('instadeck.logout') }}" class="dhs_mobile-link-dark" title="Logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-fw fa-power-off"></i>
                    </a>
                </div>
            </div>
            <form id="logout-form" action="{{ route('instadeck.logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        @endif
    </div>
</body>
</html>