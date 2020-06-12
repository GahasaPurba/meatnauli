@extends('auth.template.master')

@section('title', 'Verifikasi Email')

@section('content')

<div class="main-content">
    <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
        <div class="container">
            <div class="header-body text-center mb-7">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                        <h1 class="text-white">Verifikasi Email</h1>
                        <p class="text-lead text-white">Sebelum Melanjut, Silahkan Cek Email Anda Untuk Mendapatkan Link Verifikasi</p>
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
                    <div class="card-body px-lg-5 py-lg-5">
                        @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            <small>Link Verifikasi Baru Telah Dikirim, Silahkan Cek Email Anda</small>
                        </div>
                        @endif
                        <div class="text-center text-muted mb-4">
                            <small>Jika Anda Tidak Menemukan Link Verifikasi Di Email Anda,</small>
                        </div>
                        <form method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary my-4">Klik Disini Untuk Mengirim Ulang</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
