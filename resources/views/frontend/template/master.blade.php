@php
$response = \Illuminate\Support\Facades\Http::get('https://v1.nocodeapi.com/meatnauli/instagram/bQdSUbmgGXMhlSEH');
$instagram = $response->json();
@endphp

@if (Auth::check())
@php
$pesanan = \App\Order::where('user_id', Auth::user()->id)->where('status', 0)->first();
if(!empty($pesanan)) {
$detailpesanan = \App\OrderDetail::where('order_id', $pesanan->id)->get();
$jumlahpesanan = \App\OrderDetail::where('order_id', $pesanan->id)->count();
}
$transaksi = \App\Order::where('user_id', Auth::user()->id)->where('status', 1)->get();
if(!empty($transaksi)) {
$jumlahtransaksi = $transaksi->count();
}
@endphp
@endif

<!DOCTYPE html>
<html lang="en">
<head>
    <title>MeatNauli - @yield('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="dicoding:email" content="timothiuspurba@gmail.com">
    <link rel="icon" type="image/png" href="{{ asset('frontend/images/icons/favicon.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/fonts/iconic/css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/fonts/linearicons-v1.0.0/icon-font.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/vendor/animate/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/vendor/css-hamburgers/hamburgers.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/vendor/animsition/css/animsition.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/vendor/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/vendor/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/vendor/MagnificPopup/magnific-popup.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/vendor/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/main.css') }}">
</head>
<body>
    <header class="header-v2 bg2">
        <div class="container-menu-desktop trans-03">
            <div class="wrap-menu-desktop how-shadow1">
                <nav class="limiter-menu-desktop p-l-45">
                    <a href="{{ url('/') }}" class="logo">
                        <img alt="Logo MeatNauli" src="{{ asset('frontend/images/icons/logo-01.png') }}">
                    </a>
                    <div class="menu-desktop">
                        <ul class="main-menu">
                            <li>
                                <a href="{{ url('/') }}">Beranda</a>
                            </li>
                            <li>
                                <a href="{{ route('blog') }}">Blog</a>
                            </li>
                            <li>
                                <a href="{{ route('souvenir') }}">Cinderamata</a>
                            </li>
                            <li>
                                <a href="{{ route('qna') }}">Tanya Jawab</a>
                            </li>
                            <li>
                                <a href="{{ route('information') }}">Informasi</a>
                            </li>
                            <li>
                                <a href="{{ url('/tentangkami') }}">Tentang Kami</a>
                            </li>
                        </ul>
                    </div>
                    <div class="wrap-icon-header flex-w flex-r-m h-full menu-desktop">
                        <ul class="main-menu">
                            @if (Auth::check())
                            <li>
                                <a href="{{ route('logout') }}" class="text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><b>LOGOUT</b></a>
                                <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                            @else
                            <li>
                                <a href="{{ route('login') }}" class="text-primary"><b>LOGIN</b></a>
                            </li>
                            @endif
                        </ul>
                        <div class="flex-c-m h-full p-l-18 p-r-25 bor5">
                            <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-modal-search">
								<i class="zmdi zmdi-search"></i>
							</div>
                        </div>
                        @if (Auth::check())
                        <div class="flex-c-m h-full p-l-18 p-r-25 bor5">
                            <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti" data-notify="@if(!empty($transaksi)) {{ $jumlahtransaksi }} @else 0 @endif">
                                <a href="{{ route('payment') }}" class="text-dark">
                                    <i class="zmdi zmdi-receipt"></i>
                                </a>
                            </div>
                        </div>
                        <div class="flex-c-m h-full p-l-18 p-r-25 bor5">
                            <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart" data-notify="@if(!empty($pesanan)) {{ $jumlahpesanan }} @else 0 @endif">
                                <i class="zmdi zmdi-shopping-cart"></i>
                            </div>
                        </div>
                        @endif
                        <div class="flex-c-m h-full p-lr-19">
                            <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-sidebar">
                                <i class="zmdi zmdi-menu"></i>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="wrap-header-mobile">
            <div class="logo-mobile">
                <a href="{{ url('/') }}"><img alt="Logo MeatNauli" src="{{ asset('frontend/images/icons/logo-01.png') }}"></a>
            </div>
            <ul class="main-menu">
                @if (Auth::check())
                <li>
                    <a href="{{ route('logout') }}" class="text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><b>LOGOUT</b></a>
                    <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                        @csrf
                    </form>
                </li>
                @else
                <li>
                    <a href="{{ route('login') }}" class="text-primary"><b>LOGIN</b></a>
                </li>
                @endif
            </ul>
            @if (Auth::check())
            <div class="wrap-icon-header flex-w flex-r-m h-full m-r-15">
                <div class="flex-c-m h-full p-lr-10 bor5">
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti" data-notify="@if(!empty($transaksi)) {{ $jumlahtransaksi }} @else 0 @endif">
                        <a href="{{ route('payment') }}" class="text-dark">
                            <i class="zmdi zmdi-receipt"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="wrap-icon-header flex-w flex-r-m h-full m-r-15">
                <div class="flex-c-m h-full p-lr-10 bor5">
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart" data-notify="@if(!empty($pesanan)) {{ $jumlahpesanan }} @else 0 @endif">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </div>
                </div>
            </div>
            @endif
            <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </div>
        </div>
        <div class="menu-mobile">
            <ul class="main-menu-m">
                <li>
                    <a href="{{ url('/') }}">Beranda</a>
                </li>
                <li>
                    <a href="{{ route('blog') }}">Blog</a>
                </li>
                <li>
                    <a href="{{ route('souvenir') }}">Cinderamata</a>
                </li>
                <li>
                    <a href="{{ route('qna') }}">Tanya Jawab</a>
                </li>
                <li>
                    <a href="{{ route('information') }}">Informasi</a>
                </li>
                {{--
                <li>
                    <a href="{{ url('/tentangkami') }}">Tentang Kami</a>
                </li>
                --}}
                @if (Auth::check())
                <li>
                    <a href="{{ route('home') }}">DASHBOARD</a>
                </li>
                @endif
            </ul>
        </div>
    </header>
    <aside class="wrap-sidebar js-sidebar">
        <div class="s-full js-hide-sidebar"></div>
        <div class="sidebar flex-col-l p-t-22 p-b-25">
            <div class="flex-r w-full p-b-30 p-r-27">
                <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-sidebar">
                    <i class="zmdi zmdi-close"></i>
                </div>
            </div>
            <div class="sidebar-content flex-w w-full p-lr-65 js-pscroll">
                <ul class="sidebar-link w-full">
                    @if (Auth::check())
                    <li class="p-b-13">
                        <a href="{{ route('home') }}" class="mtext-101 cl2 hov-cl1 trans-04">
                            Dashboard
                        </a>
                    </li>
                    @endif
                    @if (Auth::check() && Auth::user()->role == 'Administrator' || Auth::check() && Auth::user()->role == 'Author')
                    <li class="p-b-13">
                        <a href="{{ route('post.create') }}" class="mtext-101 cl2 hov-cl1 trans-04">
                            Buat Post di Blog
                        </a>
                    </li>
                    @endif
                    @if (Auth::check() && Auth::user()->role == 'Administrator' || Auth::check() && Auth::user()->role == 'Seller')
                    <li class="p-b-13">
                        <a href="{{ route('item.create') }}" class="mtext-101 cl2 hov-cl1 trans-04">
                            Tambah Item Cinderamata
                        </a>
                    </li>
                    @endif
                    @if (Auth::check())
                    <li class="p-b-13">
                        <a href="{{ route('question.create') }}" class="mtext-101 cl2 hov-cl1 trans-04">
                            Ajukan Pertanyaan di Forum Tanya Jawab
                        </a>
                    </li>
                    <li class="p-b-13">
                        <a href="{{ route('editprofile.edit', Auth::user()->id) }}" class="mtext-101 cl2 hov-cl1 trans-04">
                            Edit Profile
                        </a>
                    </li>
                    @endif
                </ul>
                <div class="sidebar-gallery w-full p-tb-30">
                    <span class="mtext-103 cl5">
                        Instagram Kami <br><br>
                        <a href="https://www.instagram.com/meatnauli" class="text-dark" target="_blank"><b>@meatnauli</b></a>
                    </span>
                    <div class="flex-w flex-sb p-t-36 gallery-lb">
                        @foreach($instagram['data'] as $ig)
                        <div class="wrap-item-gallery m-b-10">
                            <a class="item-gallery bg-img1" href="{{ $ig['permalink'] }}" style="background-image: url({{ $ig['media_url'] }});"></a>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="sidebar-gallery w-full">
                    <p class="stext-108 cl6 p-t-27 text-justify">
                        Desa Meat Yang Berada Di Pesisir Danau Toba Memiliki Potensi Alam Dan Budaya Yang Tidak Perlu Diragukan Lagi. Semoga Website Ini Dapat Semakin Memperkenalkan Desa Meat Ke Banyak Orang.
                    </p>
                </div>
            </div>
        </div>
    </aside>
    <div class="wrap-header-cart js-panel-cart">
        <div class="s-full js-hide-cart"></div>
        <div class="header-cart flex-col-l p-l-65 p-r-25">
            <div class="header-cart-title flex-w flex-sb-m p-b-8">
                <span class="mtext-103 cl2">
                    Keranjang Belanja
                </span>
                <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                    <i class="zmdi zmdi-close"></i>
                </div>
            </div>
            <div class="header-cart-content flex-w js-pscroll">
                <ul class="header-cart-wrapitem w-full">
                    @if(!empty($pesanan))
                    @foreach($detailpesanan as $pesanandetail)
                    <li class="header-cart-item flex-w flex-t m-b-12">
                        <img alt="Product Photo" class="rounded mr-2" width="70" src="{{ asset('upload/productphoto/' . $pesanandetail->item->productphoto) }}">
                        <div class="header-cart-item-txt p-t-8">
                            <a href="{{ route('singlesouvenir', $pesanandetail->item->slug) }}" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                {{ $pesanandetail->item->name }}
                            </a>
                            <span class="header-cart-item-info">
                                {{ $pesanandetail->quantity }} x {{ 'Rp ' . number_format($pesanandetail->item->price) . ', -' }}
                            </span>
                        </div>
                    </li>
                    @endforeach
                    @endif
                </ul>
                <div class="w-full">
                    @if(!empty($jumlahpesanan))
                    <div class="header-cart-total w-full p-tb-40">
                        Total Harga : {{ 'Rp ' . number_format($pesanan->totalprice) . ', -' }}
                    </div>
                    <div class="header-cart-buttons flex-w w-full">
                        <a href="{{ route('souvenir.shoppingcart') }}" class="flex-c-m stext-101 cl0 size-107 bg1 bor2 hov-btn1 p-lr-15 trans-04 m-r-8 m-b-10">
                            Checkout
                        </a>
                    </div>
                    @else
                    <div class="header-cart-total w-full p-tb-40">
                        Anda Belum Menambahkan Apapun Ke Keranjang Belanja
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Search -->
	<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
		<div class="container-search-header">
			<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
				<img src="{{ asset('frontend/images/icons/icon-close2.png') }}" alt="CLOSE">
			</button>
			<form class="wrap-search-header flex-w p-l-15" method="GET" action="{{ route('blogsearch') }}">
				@csrf
				<button type="submit" class="flex-c-m trans-04">
					<i class="zmdi zmdi-search"></i>
				</button>
				<input class="plh3" type="text" name="search" id="search" placeholder="Cari Sesuatu.." value="{{ old('search') }}">
			</form>
		</div>
	</div>
    @yield('content')
    @yield('modal')
    @include('frontend.template.footer')
    @include('sweetalert::alert')
