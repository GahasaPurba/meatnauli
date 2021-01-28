@extends('frontend.template.master')

@section('title', 'Cara Berbelanja')

@section('content')

<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ asset('frontend/images/meatnauli-bg-09.jpg') }}');">
    <h2 class="ltext-105 cl0 txt-center">
        Cara Berbelanja
    </h2>
</section>
<section class="bg0 p-t-75 p-b-120">
    <div class="container">
        <div class="row p-b-148">
            <div class="order-md-2 col-md-7 col-lg-8 my-auto">
                <div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
                    <h3 class="mtext-111 cl2 p-b-16">
                        1. Login/Registrasi
                    </h3>
                    <p class="stext-113 cl2 p-b-26 text-justify">
                        <b>Pertama sekali, sebelum berbelanja, anda harus login menggunakan akun yang telah terdaftar sebelumnya. Apabila belum terdaftar, anda dapat mendaftarkan akun anda pada website ini dengan mengisi form yang telah tersedia. Perlu diingat, anda juga harus menambahkan nomor telepon sebelum melakukan transaksi. Maka dari itu anda dapat mengedit profile dan menambahkan nomor telepon pada form yang disediakan.</b>
                    </p>
                </div>
            </div>
            <div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
                <div class="how-bor2">
                    <div class="hov-img0">
                        <img alt="Information" src="{{ asset('frontend/images/meatnauli-berbelanja-step1.png') }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="row p-b-148">
            <div class="order-md-2 col-md-7 col-lg-8 my-auto">
                <div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
                    <h3 class="mtext-111 cl2 p-b-16">
                        2. Pilih Cinderamata
                    </h3>
                    <p class="stext-113 cl2 p-b-26 text-justify">
                        <b>Setelah proses login selesai, anda dapat menuju menu cinderamata untuk melihat item mana yang akan anda beli. Setelah menentukan item yang mana yang akan dibeli, anda dapat menekan tombol " Lihat Detail", dan akan diarahkan ke halaman detail cinderamata.</b>
                    </p>
                </div>
            </div>
            <div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
                <div class="how-bor2">
                    <div class="hov-img0">
                        <img alt="Information" src="{{ asset('frontend/images/meatnauli-berbelanja-step2.png') }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="row p-b-148">
            <div class="order-md-2 col-md-7 col-lg-8 my-auto">
                <div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
                    <h3 class="mtext-111 cl2 p-b-16">
                        3. Tambahkan Ke Keranjang
                    </h3>
                    <p class="stext-113 cl2 p-b-26 text-justify">
                        <b>Pada halaman detail cinderamata, anda dapat menentukan jumlah item yang ingin dibeli lalu menambahkannya ke keranjang.</b>
                    </p>
                </div>
            </div>
            <div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
                <div class="how-bor2">
                    <div class="hov-img0">
                        <img alt="Information" src="{{ asset('frontend/images/meatnauli-berbelanja-step3.png') }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="row p-b-148">
            <div class="order-md-2 col-md-7 col-lg-8 my-auto">
                <div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
                    <h3 class="mtext-111 cl2 p-b-16">
                        4. Lihat Keranjang Belanja
                    </h3>
                    <p class="stext-113 cl2 p-b-26 text-justify">
                        <b>Setelah menambahkannya ke keranjang, anda dapat melihat di pojok kanan atas ada icon "Keranjang Belanja" yang jika anda klik akan menampilkan isi keranjang belanja anda. Anda dapat menekan tombol "Lihat Detail" untuk menuju ke halaman checkout.</b>
                    </p>
                </div>
            </div>
            <div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
                <div class="how-bor2">
                    <div class="hov-img0">
                        <img alt="Information" src="{{ asset('frontend/images/meatnauli-berbelanja-step4.png') }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="row p-b-148">
            <div class="order-md-2 col-md-7 col-lg-8 my-auto">
                <div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
                    <h3 class="mtext-111 cl2 p-b-16">
                        5. Checkout
                    </h3>
                    <p class="stext-113 cl2 p-b-26 text-justify">
                        <b>Di halaman ini, anda harus memasukkan format pengiriman berupa provinsi tujuan, kabupaten/kota tujuan, serta memilih jasa pengiriman apa yang akan dipakai. Setelah semua terisi, anda dapat menekan tombol checkout untuk melanjutkan ke proses transaksi.</b>
                    </p>
                </div>
            </div>
            <div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
                <div class="how-bor2">
                    <div class="hov-img0">
                        <img alt="Information" src="{{ asset('frontend/images/meatnauli-berbelanja-step5.png') }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="row p-b-148">
            <div class="order-md-2 col-md-7 col-lg-8 my-auto">
                <div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
                    <h3 class="mtext-111 cl2 p-b-16">
                        6. Masukkan Alamat dan Bukti Pembayaran
                    </h3>
                    <p class="stext-113 cl2 p-b-26 text-justify">
                        <b>Halaman daftar transaksi dapat anda akses dengan menekan tombol berupa icon yan terletak di samping kiri keranjang belanja. Pada halaman ini anda dapat melihat daftar transaksi yang anda lakukan beserta statusnya. Pilih transaksi yang belum anda lakukan pembayaran dengan menekan tombol detail. Lalu akan tersedia beragam cara pembayaran serta langkah-langkahnya. Anda dapat mengikuti langkah-langkah yang tercantum pada halaman tersebut. Setelah itu anda harus memasukkan Alamat detail destinasi pengiriman cinderamata yang sudah anda bayar sebelumnya dan mengupload bukti pembayaran berupa file photo ataupun screenshoot.</b>
                    </p>
                </div>
            </div>
            <div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
                <div class="how-bor2">
                    <div class="hov-img0">
                        <img alt="Information" src="{{ asset('frontend/images/meatnauli-berbelanja-step6.png') }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="row p-b-148">
            <div class="order-md-2 col-md-7 col-lg-8 my-auto">
                <div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
                    <h3 class="mtext-111 cl2 p-b-16">
                        7. Pesanan Terkonfirmasi dan Siap Dikirim
                    </h3>
                    <p class="stext-113 cl2 p-b-26 text-justify">
                        <b>Setelah semua proses transaksi telah anda lakukan, selanjutnya anda dapat menunggu konfirmasi pembayaran dari Administrator kami. Anda dapat meninjau status transaksi yang anda lakukan sebelumnya melalui halaman daftar transaksi tadi. Apabila transaksi anda telah dikonfirmasi, anda akan menerima email dari kami yang menyatakan bahwa pesanan anda telah dikonfirmasi dan siap diantar ke destinasi yang sudah anda masukkan sebelumnya.</b>
                    </p>
                </div>
            </div>
            <div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
                <div class="how-bor2">
                    <div class="hov-img0">
                        <img alt="Information" src="{{ asset('frontend/images/meatnauli-berbelanja-step7.png') }}">
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
