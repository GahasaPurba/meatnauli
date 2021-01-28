<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="dicoding:email" content="timothiuspurba@gmail.com">
    <title>MeatNauli - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="msapplication-tap-highlight" content="no">
    <link href="{{ asset('backend/main.css') }}" rel="stylesheet">
</head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <div class="logo-src"></div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>
            <div class="app-header__content">
                <div class="app-header-left">
                    <ul class="header-menu nav">
                        <li class="nav-item">
                            <a href="{{ url('/') }}" class="btn btn-primary">
                                <i class="nav-link-icon fa fa-home"> </i>
                                Kembali Ke Beranda
                            </a>
                        </li>
                        <li class="btn-group nav-item">
                            <a href="{{ route('announcement.index') }}" class="nav-link">
                                <i class="nav-link-icon fa fa-bullhorn"></i>
                                Pengumuman
                            </a>
                        </li>
                        <li class="dropdown nav-item">
                            <a href="{{ route('editprofile.edit', Auth::user()->id) }}" class="nav-link">
                                <i class="nav-link-icon fa fa-cog"></i>
                                Edit Profile
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                            <img alt="Profile Photo" class="rounded-circle" width="42" src="{{ asset('upload/profilephoto/' . Auth::user()->avatar) }}">
                                            <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                        </a>
                                        <div role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                            {{--
                                            <h6 class="dropdown-header">Profile</h6>
                                            <a href="{{ route('editprofile.edit', Auth::user()->id) }}" class="dropdown-item">Edit Profile</a>
                                            <div class="dropdown-divider"></div>
                                            --}}
                                            <a href="{{ url('/') }}" class="dropdown-item">Kembali Ke Beranda</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="{{ route('logout') }}" class="dropdown-item text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                            <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content-left  ml-3 header-user-info">
                                    <div class="widget-heading">
                                        {{ Auth::user()->name }}
                                    </div>
                                    <div class="widget-subheading">
                                        {{ Auth::user()->role }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('backend.template.setting')
        <div class="app-main">
            @include('backend.template.sidebar')
            <div class="app-main__outer">
                @yield('content')
                @include('backend.template.footer')
                @include('sweetalert::alert')
