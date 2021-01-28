<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>MeatNauli - @yield('title')</title>
    <link rel="icon" href="{{ asset('auth/img/brand/favicon.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700') }}">
    <link rel="stylesheet" href="{{ asset('auth/vendor/nucleo/css/nucleo.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('auth/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('auth/css/argon.css?v=1.2.0') }}" type="text/css">
</head>
<body class="bg-default">
    <nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
        <div class="container">
            <a href="{{ url('/') }}" class="navbar-brand">
                <img alt="Logo MeatNauli" src="{{ asset('auth/img/brand/white.png') }}">
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="{{ url('/') }}">
                                <img alt="Logo MeatNauli" src="{{ asset('auth/img/brand/blue.png') }}">
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a href="{{ url('/') }}" class="nav-link">
                            <span class="nav-link-inner--text">Beranda</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">
                            <span class="nav-link-inner--text">Login</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link">
                            <span class="nav-link-inner--text">Registrasi</span>
                        </a>
                    </li>
                </ul>
                <hr class="d-lg-none" />
                <ul class="navbar-nav align-items-lg-center ml-lg-auto">
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="https://www.facebook.com/meatnauli.id" target="_blank" data-toggle="tooltip" data-original-title="Like Page Kami di Facebook">
                            <i class="fab fa-facebook-square"></i>
                            <span class="nav-link-inner--text d-lg-none">Facebook</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="https://www.instagram.com/meatnauli" target="_blank" data-toggle="tooltip" data-original-title="Follow Kami di Instagram">
                            <i class="fab fa-instagram"></i>
                            <span class="nav-link-inner--text d-lg-none">Instagram</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="https://www.twitter.com/meatnauli" target="_blank" data-toggle="tooltip" data-original-title="Follow Kami di Twitter">
                            <i class="fab fa-twitter-square"></i>
                            <span class="nav-link-inner--text d-lg-none">Twitter</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="https://www.github.com/meatnauli" target="_blank" data-toggle="tooltip" data-original-title="Follow Kami di GitHub">
                            <i class="fab fa-github"></i>
                            <span class="nav-link-inner--text d-lg-none">GitHub</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
    @include('auth.template.footer')
    @include('sweetalert::alert')
