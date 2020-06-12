@component('mail::message')
# Berlangganan Di Website MeatNauli

Terimakasih Telah Berlangganan,Tetap Nantikan Informasi-Informasi Dari Kami!

@component('mail::button', ['url' => 'http://meatnauli.site/'])
Kembali Ke Website
@endcomponent

Salam Kami,<br>
{{ config('app.name') }}
@endcomponent
