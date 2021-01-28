@extends('frontend.template.master')

@section('title', 'Cara Mengajukan Pertanyaan')

@section('content')

<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ asset('frontend/images/meatnauli-bg-09.jpg') }}');">
    <h2 class="ltext-105 cl0 txt-center">
        Cara Mengajukan Pertanyaan
    </h2>
</section>
<section class="bg0 p-t-75 p-b-120">
    <div class="container">
        <div class="row p-b-148">
            <div class="order-md-2 col-md-7 col-lg-8 my-auto">
                <div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
                    <h3 class="mtext-111 cl2 p-b-16">
                        1. Menuju Halaman Forum Tanya Jawab
                    </h3>
                    <p class="stext-113 cl2 p-b-26 text-justify">
                        <b>Pertama sekali, sebelum menambahkan postingan, pastikan anda sudah login menggunakan akun anda. Setelah itu, pergilah menuju halaman forum tanya jawab dengan mengklik menu "Tanya Jawab" yang tertera di navbar.</b>
                    </p>
                </div>
            </div>
            <div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
                <div class="how-bor2">
                    <div class="hov-img0">
                        <img alt="Information" src="{{ asset('frontend/images/meatnauli-mengajukanpertanyaan-step1.png') }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="row p-b-148">
            <div class="order-md-2 col-md-7 col-lg-8 my-auto">
                <div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
                    <h3 class="mtext-111 cl2 p-b-16">
                        2. Klik Ajukan Pertanyaan
                    </h3>
                    <p class="stext-113 cl2 p-b-26 text-justify">
                        <b>Setelah berada di halaman forum tanya jawab, klik "Ajukan Pertanyaan" untuk mengajukan pertanyaan baru.</b>
                    </p>
                </div>
            </div>
            <div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
                <div class="how-bor2">
                    <div class="hov-img0">
                        <img alt="Information" src="{{ asset('frontend/images/meatnauli-mengajukanpertanyaan-step2.png') }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="row p-b-148">
            <div class="order-md-2 col-md-7 col-lg-8 my-auto">
                <div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
                    <h3 class="mtext-111 cl2 p-b-16">
                        3. Isi Form Pertanyaan
                    </h3>
                    <p class="stext-113 cl2 p-b-26 text-justify">
                        <b>Pada halaman ini, anda harus mengisi form pertanyaan yang berisi isi pertanyaan, dan kategori pertanyaan. Setelah form terisi, anda dapat menekan tombol "Add" untuk mengajukan pertanyaan.</b>
                    </p>
                </div>
            </div>
            <div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
                <div class="how-bor2">
                    <div class="hov-img0">
                        <img alt="Information" src="{{ asset('frontend/images/meatnauli-mengajukanpertanyaan-step3.png') }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="row p-b-148">
            <div class="order-md-2 col-md-7 col-lg-8 my-auto">
                <div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
                    <h3 class="mtext-111 cl2 p-b-16">
                        4. Pertanyaan Berhasil Diajukan Pada Forum Tanya Jawab
                    </h3>
                    <p class="stext-113 cl2 p-b-26 text-justify">
                        <b>Setelah mengisi form pertanyaan dengan benar, pertanyaan anda telah berhasil diajukan dan dicantumkan pada halaman forum tanya jawab.</b>
                    </p>
                </div>
            </div>
            <div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
                <div class="how-bor2">
                    <div class="hov-img0">
                        <img alt="Information" src="{{ asset('frontend/images/meatnauli-mengajukanpertanyaan-step4.png') }}">
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
