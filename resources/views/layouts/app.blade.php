<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/6e491a471f.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&family=Lato&display=swap" rel="stylesheet">
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <i class="fas fa-bicycle my-2"></i> 
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                @auth
                    <ul class="navbar-nav mr-auto">
                    @include("partials.navlink", [
                            'url' => route('categories.index'),
                            'displayName' => 'Categories'
                            ])

                    @include("partials.navlink", [
                            'url' => route('bikes.index'),
                            'displayName' => 'Bikes'
                            ])

                    @include("partials.navlink", [
                            'url' => route('rentaltransactions.index'),
                            'displayName' => 'My Requests'
                            ])
                    </ul>
                @endauth
                   

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                    @auth
                         <li class="nav-item">
                            <a href="{{route('bikerequests.index')}}" class="nav-link">Bike Request Form
                                <span id="cart-count" class="badge badge-primary">
                                    {{ Session::has('data') ? count(Session::get('data')) : 0}}
                                </span>

                            </a>
                        </li>
                    @endauth
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                    
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                            
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @can('isAdmin')
                                    <a class="dropdown-item" href="{{ route('categories.trashed-index') }}" >Trashed Categories
                                    </a> 

                                    <a class="dropdown-item" href="{{ route('bikes.trashed-index') }}" >Trashed Bikes
                                    </a>

                                    {{-- @if (Route::has('register'))
                                    <a class="dropdown-item" href="{{ route('register') }}">
                                    {{ __('Register') }}</a>
                                    @endif --}}

                                    @endcan('isAdmin')
                                    
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
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
