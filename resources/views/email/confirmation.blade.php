@component('mail::message')
# Konfirmasi Pembayaran

Terimakasih Telah Melakukan Pembayaran Atas Pesanan Anda, Kami Akan Segera Mengirimkan Barang Pesanan Anda Melalui Jasa Pengiriman Yang Anda Pilih, Ke Alamat Yang Sudah Anda Masukkan. <br>
Terimakasih Telah Mempercayai Kami dan Telah Melestarikan Budaya Batak. <br>
Horas !

@component('mail::button', ['url' => 'http://meatnauli.site/'])
Kembali Ke Website
@endcomponent

Salam Kami,<br>
{{ config('app.name') }}
@endcomponent
