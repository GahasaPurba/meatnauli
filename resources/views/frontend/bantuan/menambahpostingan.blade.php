@extends('frontend.template.master')

@section('title', 'Cara Menambahkan Postingan')

@section('content')

<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ asset('frontend/images/meatnauli-bg-09.jpg') }}');">
    <h2 class="ltext-105 cl0 txt-center">
        Cara Menambahkan Postingan
    </h2>
</section>
<section class="bg0 p-t-75 p-b-120">
    <div class="container">
        <div class="row p-b-148">
            <div class="order-md-2 col-md-7 col-lg-8 my-auto">
                <div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
                    <h3 class="mtext-111 cl2 p-b-16">
                        1. Menuju Halaman Blog
                    </h3>
                    <p class="stext-113 cl2 p-b-26 text-justify">
                        <b>Pertama sekali, sebelum menambahkan postingan, pastikan anda sudah login menggunakan akun author. Setelah itu, pergilah menuju halaman blog dengan mengklik menu "Blog" yang tertera di navbar.</b>
                    </p>
                </div>
            </div>
            <div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
                <div class="how-bor2">
                    <div class="hov-img0">
                        <img alt="Information" src="{{ asset('frontend/images/meatnauli-menambahpostingan-step1.png') }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="row p-b-148">
            <div class="order-md-2 col-md-7 col-lg-8 my-auto">
                <div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
                    <h3 class="mtext-111 cl2 p-b-16">
                        2. Klik Tambah Postingan
                    </h3>
                    <p class="stext-113 cl2 p-b-26 text-justify">
                        <b>Setelah berada di halaman blog, klik tambah postingan untuk menambahkan postingan baru.</b>
                    </p>
                </div>
            </div>
            <div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
                <div class="how-bor2">
                    <div class="hov-img0">
                        <img alt="Information" src="{{ asset('frontend/images/meatnauliii-menambahpostingan-step2.png') }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="row p-b-148">
            <div class="order-md-2 col-md-7 col-lg-8 my-auto">
                <div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
                    <h3 class="mtext-111 cl2 p-b-16">
                        3. Isi Form Postingan
                    </h3>
                    <p class="stext-113 cl2 p-b-26 text-justify">
                        <b>Pada halaman ini, anda harus mengisi form postingan yang berisi judul postingan, kategori, tag, isi konten dan thumbnail postingan. Setelah form terisi, anda dapat menekan tombol "Add" untuk menambahkan postingan.</b>
                    </p>
                </div>
            </div>
            <div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
                <div class="how-bor2">
                    <div class="hov-img0">
                        <img alt="Information" src="{{ asset('frontend/images/meatnauli-menambahpostingan-step3.png') }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="row p-b-148">
            <div class="order-md-2 col-md-7 col-lg-8 my-auto">
                <div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
                    <h3 class="mtext-111 cl2 p-b-16">
                        4. Postingan Berhasil Dipost Pada Halaman Blog
                    </h3>
                    <p class="stext-113 cl2 p-b-26 text-justify">
                        <b>Setelah mengisi form postingan dengan benar, postingan anda telah berhasil ditambahkan dan dicantumkan pada halaman blog.</b>
                    </p>
                </div>
            </div>
            <div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
                <div class="how-bor2">
                    <div class="hov-img0">
                        <img alt="Information" src="{{ asset('frontend/images/meatnauli-menambahpostingan-step4.png') }}">
                    </div>
                </div>
            </div>
        </div>
        <h5 class="mtext-107 cl2 p-t-100 text-center">
            Apabila Masih Ada Pertanyaan Terkait Bantuan Yang Kami Berikan, Silahkan Bertanya Di <b>Forum Tanya Jawab</b> <br>
            Atau Hubungi Kami di <b>+62 811 6120 030, naulimeat@gmail.com</b>
        </h5>
    </div>
</section>

@endsection
