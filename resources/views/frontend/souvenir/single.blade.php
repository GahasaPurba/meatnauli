@extends('frontend.template.master')

@section('title', 'Detail Cinderamata')

@section('content')

@foreach($data as $singlesouvenir)
<div class="container">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="{{ url('/') }}" class="stext-109 cl8 hov-cl1 trans-04">
            Beranda
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>
        <a href="{{ route('souvenir') }}" class="stext-109 cl8 hov-cl1 trans-04">
            Cinderamata
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>
        <span class="stext-109 cl2">
            Detail Cinderamata {{-- {{ $singlesouvenir->name }} --}}
        </span>
    </div>
</div>
<section class="sec-product-detail bg0 p-t-65 p-b-60">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-7 p-b-30">
                <div class="p-l-25 p-r-30 p-lr-0-lg">
                    <div class="wrap-slick3 flex-sb flex-w">
                        <div class="slick3 gallery-lb">
                            <div class="wrap-pic-w pos-relative">
                                <img alt="Product Photo" src="{{ asset('upload/productphoto/' . $singlesouvenir->productphoto) }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-5 p-b-30">
                <div class="p-r-50 p-t-5 p-lr-0-lg">
                    <h4 class="ltext-106 cl2 js-name-detail p-b-14">
                        {{ $singlesouvenir->name }}
                    </h4>
                    <span class="mtext-106 cl2">
                        {{ 'Rp ' . number_format($singlesouvenir->price) . ', -' }}
                    </span>
                    <br><br>
                    <span class="mtext-104 cl2">
                        Stok Tersisa &nbsp;: {{ $singlesouvenir->stock }}
                    </span>
                    <br>
                    <span class="mtext-104 cl2">
                        Berat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $singlesouvenir->weight }} gr
                    </span>
                    <p class="stext-102 cl3 p-t-23">
                        {!! $singlesouvenir->description !!}
                    </p>
                    <div class="p-t-33">
                        <div class="flex-w p-b-10">
                            <div class="size-204 flex-w flex-m respon6-next">
                                <form method="POST" action="{{ route('souvenir.order', $singlesouvenir->id) }}">
                                    @csrf
                                    <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                        </div>
                                        <input type="number" name="quantity" id="quantity" class="mtext-104 cl3 txt-center num-product" value="1">
                                        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-plus"></i>
                                        </div>
                                    </div>
                                    @error('quantity')
                                    <p class="text-danger stext-104 mb-2">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                    <button type="submit" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                                        Tambah Ke Keranjang
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="flex-w flex-m p-t-10 respon7">
                        <div class="addthis_inline_share_toolbox p-t-40"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bor10 m-t-50 p-t-43 p-b-40">
            <div class="tab01">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item p-b-10">
                        <a href="#description" class="nav-link active" data-toggle="tab" role="tab">Deskripsi</a>
                    </li>
                    <li class="nav-item p-b-10">
                        <a href="#information" class="nav-link" data-toggle="tab" role="tab">Detail Informasi</a>
                    </li>
                    <li class="nav-item p-b-10">
                        <a href="#reviews" class="nav-link" data-toggle="tab" role="tab">Review ({{ $singlesouvenir->comments->count() }})</a>
                    </li>
                </ul>
                <div class="tab-content p-t-43">
                    <div class="tab-pane fade show active" id="description" role="tabpanel">
                        <div class="how-pos2 p-lr-15-md">
                            <p class="stext-102 cl6">
                                {!! $singlesouvenir->description !!}
                            </p>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="information" role="tabpanel">
                        <div class="row justify-content-center">
                            <div class="col-sm-10 col-md-6 col-lg-4 m-lr-auto">
                                <ul class="p-lr-28 p-lr-15-sm">
                                    <li class="flex-w flex-t p-b-7">
                                        <span class="stext-102 cl3 size-205">
                                            Nama Item
                                        </span>
                                        <span class="stext-102 cl6 size-206">
                                            {{ $singlesouvenir->name }}
                                        </span>
                                    </li>
                                    <li class="flex-w flex-t p-b-7">
                                        <span class="stext-102 cl3 size-205">
                                            Harga
                                        </span>
                                        <span class="stext-102 cl6 size-206">
                                            {{ 'Rp ' . number_format($singlesouvenir->price) . ', -' }}
                                        </span>
                                    </li>
                                    <li class="flex-w flex-t p-b-7">
                                        <span class="stext-102 cl3 size-205">
                                            Stok Tersisa
                                        </span>
                                        <span class="stext-102 cl6 size-206">
                                            {{ $singlesouvenir->stock }}
                                        </span>
                                    </li>
                                    <li class="flex-w flex-t p-b-7">
                                        <span class="stext-102 cl3 size-205">
                                            Berat
                                        </span>
                                        <span class="stext-102 cl6 size-206">
                                            {{ $singlesouvenir->weight }} gr
                                        </span>
                                    </li>
                                    <li class="flex-w flex-t p-b-7">
                                        <span class="stext-102 cl3 size-205">
                                            Kategori
                                        </span>
                                        <span class="stext-102 cl6 size-206">
                                            {{ $singlesouvenir->souvenir_category->name }}
                                        </span>
                                    </li>
                                    <li class="flex-w flex-t p-b-7">
                                        <span class="stext-102 cl3 size-205">
                                            Nama Penjual
                                        </span>
                                        <span class="stext-102 cl6 size-206">
                                            {{ $singlesouvenir->user->name }}
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="reviews" role="tabpanel">
                        <div class="row">
                            <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                <div class="p-b-30 m-lr-15-sm">
                                    <h5 class="mtext-108 cl2 p-b-7">
                                        Beri Review
                                    </h5>
                                    <p class="stext-102 cl6 mb-5">
                                        Silahkan Berikan Review, Komentar, Ataupun Pesan Anda Terhadap Item Ini, Pada Kolom Dibawah
                                    </p>
                                    @comments(['model' => $singlesouvenir])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
        <span class="stext-107 cl6 p-lr-25">
            Kategori : {{ $singlesouvenir->souvenir_category->name }}
        </span>
    </div>
</section>
@endforeach

@endsection
