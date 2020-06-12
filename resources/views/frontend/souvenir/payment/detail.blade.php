@extends('frontend.template.master')

@section('title', 'Pembayaran')

@section('content')

<div class="container mb-4">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="{{ url('/') }}" class="stext-109 cl8 hov-cl1 trans-04">
            Beranda
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>
        <a href="{{ route('payment') }}" class="stext-109 cl8 hov-cl1 trans-04">
            Checkout
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>
        <span class="stext-109 cl4">
            Pembayaran
        </span>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-xl-12 m-b-50">
            <div class="m-l-25 m-r--38 m-lr-0-xl">
                @php
                date_default_timezone_set('Asia/Jakarta');
                @endphp
                <p class="stext-101 mb-3">
                    Tanggal Pembayaran : <strong>{{ date('d F Y') }}</strong>
                </p>
                <div class="wrap-table-shopping-cart">
                    <table class="table-shopping-cart">
                        <tr class="table_head">
                            <th class="text-center">Item</th>
                            <th class="text-center"></th>
                            <th class="text-center">Harga</th>
                            <th class="text-center">Jumlah</th>
                            <th class="text-center">Total</th>
                        </tr>
                        @foreach($orderdetails as $orderdetail)
                        <tr class="table_row">
                            <td class="text-center">
                                <img alt="Product Photo" class="rounded" width="80" src="{{ asset('upload/productphoto/' . $orderdetail->item->productphoto) }}">
                            </td>
                            <td class="text-center">{{ $orderdetail->item->name }}</td>
                            <td class="text-center">{{ 'Rp ' . number_format($orderdetail->item->price) . ', -' }}</td>
                            <td class="text-center">{{ $orderdetail->quantity }}</td>
                            <td class="text-center">{{ 'Rp ' . number_format($orderdetail->totalprice) . ', -' }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-sm-12 col-lg-12 col-xl-12 m-b-50">
            <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                <h4 class="mtext-109 cl2 p-b-30">
                    Kalkulasi
                </h4>
                <div class="flex-w flex-t bor12 p-b-13">
                    <div class="size-208">
                        <span class="stext-110 cl2">
                            Provinsi Tujuan
                        </span>
                    </div>
                    <div class="size-209">
                        <span class="stext-110 cl2">
                            {{ ' : ' . $order->province_destination }}
                        </span>
                    </div>
                </div>
                <div class="flex-w flex-t bor12 p-t-13 p-b-13">
                    <div class="size-208">
                        <span class="stext-110 cl2">
                            Kabupaten/Kota Tujuan
                        </span>
                    </div>
                    <div class="size-209">
                        <span class="stext-110 cl2">
                            {{ ' : ' . $order->city_destination }}
                        </span>
                    </div>
                </div>
                <div class="flex-w flex-t bor12 p-t-13 p-b-13">
                    <div class="size-208">
                        <span class="stext-110 cl2">
                            Jasa Pengiriman
                        </span>
                    </div>
                    <div class="size-209">
                        <span class="stext-110 cl2">
                            {{ ' : ' . $order->kurir }}
                        </span>
                    </div>
                </div>
                <div class="flex-w flex-t bor12 p-t-13 p-b-13">
                    <div class="size-208">
                        <span class="stext-110 cl2">
                            Estimasi Waktu Pengiriman (Hari)
                        </span>
                    </div>
                    <div class="size-209">
                        <span class="stext-110 cl2">
                            {{ ' : ' . $order->etd }}
                        </span>
                    </div>
                </div>
                <div class="flex-w flex-t bor12 p-t-13 p-b-13">
                    <div class="size-208">
                        <span class="stext-110 cl2">
                            Berat Pesanan
                        </span>
                    </div>
                    <div class="size-209">
                        <span class="stext-110 cl2">
                            {{ ' : ' . $order->totalweight }} gr
                        </span>
                    </div>
                </div>
                <div class="flex-w flex-t bor12 p-t-13 p-b-13">
                    <div class="size-208">
                        <span class="stext-110 cl2">
                            Harga Pesanan
                        </span>
                    </div>
                    <div class="size-209">
                        <span class="stext-110 cl2">
                            {{ ' : Rp ' . number_format($order->totalprice - $order->ongkir) . ', -' }}
                        </span>
                    </div>
                </div>
                <div class="flex-w flex-t bor12 p-t-13 p-b-13">
                    <div class="size-208">
                        <span class="stext-110 cl2">
                            Ongkos Kirim
                        </span>
                    </div>
                    <div class="size-209">
                        <span class="stext-110 cl2">
                            {{ ' : Rp ' . number_format($order->ongkir) . ', -' }}
                        </span>
                    </div>
                </div>
                <div class="flex-w flex-t bor12 p-t-13 p-b-13">
                    <div class="size-208">
                        <span class="stext-110 cl2">
                            Kode Unik
                        </span>
                    </div>
                    <div class="size-209">
                        <span class="stext-110 cl2">
                            {{ ' : Rp ' . number_format($order->code) . ', -' }}
                        </span>
                    </div>
                </div>
                <div class="flex-w flex-t bor12 p-t-13 p-b-13">
                    <div class="size-208">
                        <span class="mtext-110 cl2">
                            <b>TOTAL PEMBAYARAN</b>
                        </span>
                    </div>
                    <div class="size-209">
                        <span class="mtext-110 cl2">
                            <b>{{ ' : Rp ' . number_format($order->totalprice + $order->code) . ', -' }}</b>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if($order->status == 1)
    <div class="row justify-content-center">
        <div class="col-sm-12 col-lg-12 col-xl-12 m-b-50">
            <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                <h4 class="mtext-109 cl2 p-b-30">
                    Pembayaran
                </h4>
                <div class="flex-w flex-t bor12 p-b-13">
                    <div class="size-208">
                        <span class="mtext-110 cl2">
                            <b>Bank</b>
                        </span>
                    </div>
                    <div class="size-209">
                        <span class="mtext-110 cl2">
                            <b>{{ ' : ' . 'Mandiri' }}</b>
                        </span>
                    </div>
                </div>
                <div class="flex-w flex-t bor12 p-t-13 p-b-13">
                    <div class="size-208">
                        <span class="mtext-110 cl2">
                            <b>No Rekening</b>
                        </span>
                    </div>
                    <div class="size-209">
                        <span class="mtext-110 cl2">
                            <b>{{ ' : ' . '142.00.2020.9718' }}</b>
                        </span>
                    </div>
                </div>
                <div class="flex-w flex-t bor12 p-t-13 p-b-13">
                    <div class="size-208">
                        <span class="mtext-110 cl2">
                            <b>Atas Nama</b>
                        </span>
                    </div>
                    <div class="size-209">
                        <span class="mtext-110 cl2">
                            <b>{{ ' : ' . 'PT. MEAT NAULI INDONESIA' }}</b>
                        </span>
                    </div>
                </div>
                <div class="flex-w flex-t bor12 p-t-50 p-b-50">
                    <div class="size-230">
                        <p class="stext-111 cl2 text-justify">
                            <b>Transfer Menggunakan Bank Transfer Mandiri Melalui ATM Mandiri :</b> <br>
                            1. Masukkan Kartu ATM dan PIN Anda <br>
                            2. Pilih "Transaksi lainnya" <br>
                            3. Pilih "Transfer" <br>
                            4. Pilih "Ke Rekening Mandiri" <br>
                            5. Masukkan Nomor Rekening <b>142.00.2020.9718</b> a.n PT. MEAT NAULI INDONESIA <br>
                            6. Pilih "Benar" <br>
                            7. Masukkan jumlah sesuai dengan total pembayaran yaitu sebanyak <b>{{ ' : Rp ' . number_format($order->totalprice + $order->code) }}</b>, lalu pilih "Benar" <br>
                            8. Pastikan nomor Akun, Nama dan jumlah transfer sudah tepat, lalu pilih "Benar" <br>
                            9. Pilih "Keluar" <br>
                            10. Transaksi berhasil <br>
                            11. Simpan struk pembayaran / bukti transfer <br><br>
                            <b>Transfer Menggunakan Internet Banking (Mandiri E-Banking) :</b> <br>
                            1. Akses <a href="https://ib.bankmandiri.co.id" target="_blank">https://ib.bankmandiri.co.id</a> <br>
                            2. Masukkan ID pengguna dan kata sandi Anda <br>
                            3. Klik "Kirim" <br>
                            4. Pilih menu "Transfer > Rekening Mandiri" <br>
                            5. Pastikan field "Dari akun" benar <br>
                            6. Masukkan jumlah pembayaran sesuai dengan total pembayaran yaitu sebanyak <b>{{ ' : Rp ' . number_format($order->totalprice + $order->code) }}</b> <br>
                            7. Masukkan Nomor Rekening Tujuan, <b>142.00.2020.9718</b> a.n PT. MEAT NAULI INDONESIA <br>
                            8. Periksa "Simpan di Transfer data" <br>
                            9. Klik "Lanjutkan" <br>
                            10. Aktifkan Token Mandiri Anda <br>
                            11. Tekan nomor 1 untuk mendapatkan "kode APPLI 1" <br>
                            12. Muncul 6 digit angka di monitor perangkat token Anda <br>
                            13. Masukkan 6 digit angka ke dalam kolom "Masukkan PIN Mandiri untuk konfirmasi (Metode APPLI 1)" <br>
                            14. Klik "Lanjutkan" <br>
                            15. Transaksi berhasil <br>
                            16. Simpan bukti transfer <br><br>
                            <b>Transfer Menggunakan Mobile Banking (Mandiri M-Banking) :</b> <br>
                            1. Pastikan Anda telah mengunduh Mandiri Mobile <br>
                            2. Buka aplikasi <br>
                            3. Masukkan ID pengguna dan PIN <br>
                            4. ketuk ikon di sudut kiri atas dan pilih menu "Transfer" <br>
                            5. Pilih "ke akun Mandiri" <br>
                            6. Tap "Rekening Tujuan" <br>
                            7. Masukkan Nomor Rekening Tujuan, <b>142.00.2020.9718</b> a.n PT. MEAT NAULI INDONESIA, di bidang "Tujuan" <br>
                            8. Tap "Tambahkan sebagai tujuan baru" <br>
                            9. Tap "Konfirmasi" <br>
                            10. Masukkan jumlah pembayaran sesuai dengan total pembayaran yaitu sebanyak <b>{{ ' : Rp ' . number_format($order->totalprice + $order->code) }}</b> <br>
                            11. Ketuk "Lanjut" <br>
                            12. Ketuk "Kirim" <br>
                            13. Masukkan PIN Mandiri Anda <br>
                            14. Transaksi berhasil <br>
                            15. Simpan bukti transfer <br>
                        </p>
                    </div>
                </div>
                <div class="flex-w flex-t bor12 p-t-13 p-b-13">
                    <div class="size-230">
                        <p class="stext-111 cl2 text-justify">
                            Setelah Transaksi Berhasil, Silahkan Isi <b>Kolom Dibawah</b>,
                            Dengan <b>Alamat Lengkap</b> Tujuan Pengiriman Barang dan <b>Bukti Transfer / Bukti Pembayaran</b>
                            Yang Berformat Gambar (JPEG, JPG, PNG, BMP, GIF, SVG, Atau WEBP).
                            Setelah Itu, Dalam Waktu <b>1 X 24 Jam</b> Kami Akan Mengirimkan <b>Konfirmasi</b> Via <b>Email</b> Ataupun <b>SMS</b>,
                            Dan Kami Akan Segera Mengirimkan <b>Barang Pesanan</b> Anda
                            Melalui <b>Jasa Pengiriman</b> Yang Anda Pilih, Ke <b>Alamat</b> Yang Sudah Anda Masukkan. <br><br>
                            Apabila Masih Ada Hal Yang Ingin Ditanyakan Silahkan Kontak Kami di <b>+62 811 6120 030</b>
                        </p>
                    </div>
                </div>
                <form method="POST" action="{{ route('paymentupload') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="order_id" id="order_id" style="display: none;" value="{{ $order->id }}">
                    <div class="flex-w flex-t bor12 p-t-15 p-b-30">
                        <div class="size-204 p-l-100 p-r-0-sm w-full-ssm">
                            <div class="p-t-30">
                                <div class="bor8 bg0 m-b-12 m-t-9">
                                    <textarea name="address" id="address" class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25 @error('address') is-invalid @enderror" placeholder="Masukkan Alamat Pengiriman">{{ old('address') }}</textarea>
                                </div>
                                @error('address')
                                <div class="text-danger stext-109">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="p-t-30">
                                <div class="bor8 bg0 m-b-12 m-t-9">
                                    <input type="text" onfocus="this.type='file'" name="buktipembayaran" id="buktipembayaran" class="stext-111 cl2 plh3 size-116 p-l-25 p-r-30 @error('buktipembayaran') is-invalid @enderror" placeholder="Upload Bukti Pembayaran" value="{{ old('buktipembayaran') }}">
                                </div>
                                @error('buktipembayaran')
                                <div class="text-danger stext-109">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer mt-4">
                        Kirim
                    </button>
                </form>
            </div>
        </div>
    </div>
    @elseif($order->status == 2)
    <div class="row justify-content-center">
        <div class="col-sm-12 col-lg-12 col-xl-12 m-b-50">
            <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                <div class="flex-w flex-t bor12 p-t-13 p-b-13">
                    <div class="size-230">
                        <p class="mtext-111 cl2 text-center text-warning">
                            Silahkan Tunggu Konfirmasi
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @elseif($order->status == 3)
    <div class="row justify-content-center">
        <div class="col-sm-12 col-lg-12 col-xl-12 m-b-50">
            <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                <div class="flex-w flex-t bor12 p-t-13 p-b-13">
                    <div class="size-230">
                        <p class="mtext-111 cl2 text-center text-success">
                            Transaksi Telah Dikonfirmasi
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
</div>

@endsection
