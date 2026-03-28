<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Videogames') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Space+Grotesk:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Vite -->
    @vite(['resources/js/app.js'])
</head>

<body class="app-body">
    <div id="app" class="site-shell">
        <div class="bg-orb bg-orb-primary"></div>
        <div class="bg-orb bg-orb-secondary"></div>

        <nav class="navbar navbar-expand-lg app-navbar">
            <div class="container">
                <a class="navbar-brand brand-mark" href="{{ url('/') }}">
                    <span class="brand-mark__icon"><i class="bi bi-joystick"></i></span>
                    <span>
                        <small class="brand-mark__eyebrow">Archivio editoriale</small>
                        <strong class="brand-mark__title">Videogames Hub</strong>
                    </span>
                </a>

                <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto align-items-lg-center gap-lg-2 mt-3 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link nav-pill" href="{{ url('/') }}">Home</a>
                        </li>
                        @auth
                            <li class="nav-item">
                                <a class="nav-link nav-pill" href="{{ route('videogames.index') }}">Catalogo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-pill" href="{{ route('dashboard') }}">Dashboard</a>
                            </li>
                        @endauth
                    </ul>

                    <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2 mt-3 mt-lg-0">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link nav-pill" href="{{ route('login') }}">Login</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="btn btn-brand" href="{{ route('register') }}">Registrati</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link nav-user dropdown-toggle" href="#"
                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    v-pre>
                                    <span
                                        class="nav-user__avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                                    <span>{{ Auth::user()->name }}</span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end app-dropdown" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
                                    <a class="dropdown-item" href="{{ route('profile.edit') }}">Profilo</a>
                                    <a class="dropdown-item" href="{{ route('videogames.index') }}">Videogiochi</a>
                                    <hr class="dropdown-divider">
                                    <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
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

        <main class="app-main">
            @yield('content')
        </main>

        <footer class="app-footer">
            <div class="container d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3">
                <div>
                    <p class="app-footer__title mb-1">Videogames Hub</p>
                    <p class="app-footer__text mb-0">Catalogo, gestione e panoramica dei tuoi titoli in un’unica
                        interfaccia.</p>
                </div>
                <div class="app-footer__meta">
                    <span><i class="bi bi-controller me-2"></i>Laravel + Bootstrap</span>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>
