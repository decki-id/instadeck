<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

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
<body class="bg-instagram">
    <div class="row w-100 mx-0" id="app">
        <div class="col-lg-6">
            <div class="dhs_auth-page">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-10 dhs_dark-banner">
                            <h1>Welcome to <strong>InstaDeck</strong></h1>
                            <hr>
                            <p>
                                <strong>InstaDeck</strong> is an Instagram clone website created by <strong>Decki Herdiawan Soepandi</strong> 
                                as a project portfolio. <strong>InstaDeck</strong> includes CRUD (Create, Read, Update, Delete) features 
                                such as post a picture, browse all posts and profiles on <strong>InstaDeck</strong>, search for a specific user 
                                account, see a user account profile, update profile, and follow a user account. <strong>InstaDeck</strong> built 
                                with the Laravel framework and Vue Js example component. <strong>InstaDeck</strong> also built with an API link 
                                to open the real Instagram account of the creator for presentation purposes only.
                                <br>Thank you for visiting this project.
                                <br>See more project portfolio created by <strong>Decki Herdiawan Soepandi</strong> 
                                <a href="https://deckidecki.com/portfolios">here</a>.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <main class="dhs_auth-form">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>