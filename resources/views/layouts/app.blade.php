<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'My project') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <!-- public\js\function_app.js  -->
      <script src="{{ asset('js/jquery.min.js') }}"></script>
       <script src="{{ asset('js/ckeditor.js') }}"></script>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
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
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <!-- li vectorins -->
                        <li  class="nav-item dropdown">
                            <a class="nav-link" href="{{ route('home') }}"
                            role="button"
                            id-="navbarDropdown0"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"



                            >
                            {{ __('Victorina') }}
                            </a>
                            <!-- type1 vectorina -->
                            <div   class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('vict.index') }}?v=1">
                                    {{ __('V1') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('vict.index') }}?v=2">
                                       {{ __('V2') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('vict.index') }}?v=3">
                                    {{ __('V3') }}
                                </a>

                                <a class="dropdown-item" href="{{ route('vict.index') }}?v=4">
                                                                    {{ __('V4') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('vict.index') }}?v=5">
                                                                    {{ __('V5') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('vict.index') }}?v=6">
																																																																				                                {{ __('V6') }}
                                </a>
                            </div>
                        </li>
                           
                        <li
                            class="nav-item dropdown"
                            >
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ __('Data') }}
                            </a>
                           
                            <div
                            class="dropdown-menu dropdown-menu-end"
                            aria-labelledby="navbarDropdown"
                            >
                            <a
                            class="dropdown-item"
                            href="{{ route('question.index') }}"
                            >
                            {{ __('question') }}
                            </a>
                            <a
                            class="dropdown-item"
                            href="{{ route('topic.index') }}"
                            >
                            {{ __('topic') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('answer.index') }}">
                            {{ __('answer') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('page.index') }}">
                            {{ __('page') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('game.index') }}">
	    					{{ __('game') }}
                            </a>
                            </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
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

        <main class="py-4">
            <!-- errors block -->
            @if ($errors->any())
            <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
            </ul>
            </div>
            @endif
            <!-- errors block -->
            @yield('content')
        </main>
    </div>
</body>
</html>
