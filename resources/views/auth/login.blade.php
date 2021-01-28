@extends('auth.template.master')

@section('title', 'Login')

@section('content')

<div class="main-content">
    <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
        <div class="container">
            <div class="header-body text-center mb-7">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                        <h1 class="text-white">Horas, Selamat Datang !</h1>
                        <p class="text-lead text-white">Silahkan Login Ke Website</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </div>
    <div class="container mt--8 pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="card bg-secondary border-0 mb-0">
                    <div class="card-header bg-transparent pb-5">
                        <div class="text-muted text-center mt-2 mb-3"><small>Login Dengan</small></div>
                        <div class="btn-wrapper text-center">
                            <a href="{{ url('login/github') }}" class="btn btn-neutral btn-icon">
                                <span class="btn-inner--icon"><img src="{{ asset('auth/img/icons/common/github.svg') }}"></span>
                                <span class="btn-inner--text">GitHub</span>
                            </a>
                            <a href="{{ url('login/google') }}" class="btn btn-neutral btn-icon">
                                <span class="btn-inner--icon"><img src="{{ asset('auth/img/icons/common/google.svg') }}"></span>
                                <span class="btn-inner--text">Google</span>
                            </a>
                        </div>
                    </div>
                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="text-center text-muted mb-4">
                            <small>Atau Login Dengan Email dan Password</small>
                        </div>
                        <form role="form" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <div class="input-group input-group-merge input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                    </div>
                                    <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" autofocus>
                                    @error('email')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-merge input-group-alternative">
                                    {{--
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    --}}
                                    <input data-toggle="password" type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                                    @error('password')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="custom-control custom-control-alternative custom-checkbox">
                                <input type="checkbox" name="remember" id=" customCheckLogin" class="custom-control-input" {{ old('remember') ? 'checked' : '' }}>
                                <label for=" customCheckLogin" class="custom-control-label">
                                    <span class="text-muted">Ingat Saya</span>
                                </label>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary my-4">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6">
                        @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-light"><small>Lupa Password ?</small></a>
                        @endif
                    </div>
                    <div class="col-6 text-right">
                        <a href="{{ route('register') }}" class="text-light"><small>Buat Akun Baru</small></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
