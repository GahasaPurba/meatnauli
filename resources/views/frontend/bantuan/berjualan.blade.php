@extends('frontend.template.master')

@section('title', 'Cara Berjualan')

@section('content')

<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ asset('frontend/images/meatnauli-bg-09.jpg') }}');">
    <h2 class="ltext-105 cl0 txt-center">
        Cara Berjualan
    </h2>
</section>
<section class="bg0 p-t-75 p-b-120">
    <div class="container">
        <div class="row p-b-148">
            <div class="order-md-2 col-md-7 col-lg-8 my-auto">
                <div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
                    <h3 class="mtext-111 cl2 p-b-16">
                        1. Menuju Halaman "Add Item/Tambah Cinderamata"
                    </h3>
                    <p class="stext-113 cl2 p-b-26 text-justify">
                        <b>Pertama sekali, sebelum menambahkan postingan, pastikan anda sudah login menggunakan akun seller. Setelah itu, pergilah menuju halaman "Add Item/Tambah Cinderamata" dengan mengklik menu di sebelah pojok kanan atas, lalu mengklik "Tambah Item Cinderamata" yang tertera di sidebar.</b>
                    </p>
                </div>
            </div>
            <div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
                <div class="how-bor2">
                    <div class="hov-img0">
                        <img alt="Information" src="{{ asset('frontend/images/meatnauli-berjualan-step1.png') }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="row p-b-148">
            <div class="order-md-2 col-md-7 col-lg-8 my-auto">
                <div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
                    <h3 class="mtext-111 cl2 p-b-16">
                        2. Isi Form Cinderamata
                    </h3>
                    <p class="stext-113 cl2 p-b-26 text-justify">
                        <b>Pada halaman ini, anda harus mengisi form cinderamata yang berisi nama, harga, stok, berat, kategori, deskripsi, dan thumbnail item cinderamata. Setelah form terisi, anda dapat menekan tombol "Add" untuk menambahkan item cinderamata.</b>
                    </p>
                </div>
            </div>
            <div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
                <div class="how-bor2">
                    <div class="hov-img0">
                        <img alt="Information" src="{{ asset('frontend/images/meatnauli-berjualan-step2.png') }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="row p-b-148">
            <div class="order-md-2 col-md-7 col-lg-8 my-auto">
                <div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
                    <h3 class="mtext-111 cl2 p-b-16">
                        3. Item Berhasil Ditampilkan Pada Halaman Cinderamata
                    </h3>
                    <p class="stext-113 cl2 p-b-26 text-justify">
                        <b>Setelah mengisi form cinderamata dengan benar, item cinderamata yang anda jual telah berhasil ditambahkan dan dicantumkan pada halaman cinderamata.</b>
                    </p>
                </div>
            </div>
            <div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
                <div class="how-bor2">
                    <div class="hov-img0">
                        <img alt="Information" src="{{ asset('frontend/images/meatnauli-berjualan-step3.png') }}">
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
