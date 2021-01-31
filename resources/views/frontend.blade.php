@extends('frontend.template.master')

@section('title', 'Beranda')

@section('content')

<section class="section-slide" style="height:500px">
    <div class="wrap-slick1 rs1-slick1">
        <div class="slick1">
            <div class="item-slick1" style="background-image: url({{ asset('frontend/images/meatnauli-slide-03.jpg') }}); height:500px;">
                <div class="container h-50">
                    <div class="flex-col-c-m h-full p-t-100 p-b-30">
                        <div class="layer-slick1 animated visible-false text-center" data-appear="zoomIn" data-delay="0">
                            @if (Auth::check())
                            <span class="ltext-202 txt-center cl2 respon2">
                                <br><br><br><br><br><br>
                                Horas ! Selamat Datang, {{ Auth::user()->name }}
                                <br> di Website
                            </span>
                            @else
                            <span class="ltext-202 txt-center cl2 respon2">
                                <br><br><br><br><br><br>
                                Horas ! Selamat Datang di Website
                            </span>
                            @endif
                        </div>
                        <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="800">
                            <h2 class="ltext-104 txt-center cl2 p-t-22 p-b-40 respon1">
                                MeatNauli
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item-slick1" style="background-image: url({{ asset('frontend/images/meatnauli-slide-02.jpg') }});">
                <a href="{{ route('souvenir') }}">
                    <div class="container h-50">
                        <div class="flex-col-c-m h-full p-t-100 p-b-30">
                            <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="0">
                                <span class="ltext-202 txt-center cl0 respon2">
                                    Salah Satu Yang Khas Dari Desa Ini
                                </span>
                            </div>
                            <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="800">
                                <h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
                                    Ulos
                                </h2>
                            </div>
                            <div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
                                <a href="{{ route('souvenir') }}" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                                    Lihat Cinderamata
                                </a>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="item-slick1" style="background-image: url({{ asset('frontend/images/meatnauli-slide-04.jpg') }}); height:500px;">
                <div class="container h-50">
                    <div class="flex-col-l-m h-full p-t-100 p-b-30">
                        <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                            <span class="ltext-202 cl2 respon2">
                                <br><br><br><br><br><br>
                                Tanah Surga di Pesisir Danau Toba
                            </span>
                        </div>
                        <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                            <h2 class="ltext-104 cl2 p-t-19 p-b-43 respon1">
                                MeatNauli
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="sec-banner bg0">
    <div class="flex-w flex-c-m">
        <div class="size-202 m-lr-auto respon4">
            <div class="block1 wrap-pic-w">
                <img alt="Banner Photo" src="{{ asset('frontend/images/meatnauli-banner-04.jpg') }}">
                <a href="{{ route('blog') }}" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                    <div class="block1-txt-child1 flex-col-l">
                        <span class="block1-name ltext-102 trans-04 p-b-8 text-white">
                            Blog
                        </span>
                        <span class="block1-info stext-102 trans-04 text-white">
                            Temukan Berbagai Hal Menarik Seputar Desa Meat
                        </span>
                    </div>
                    <div class="block1-txt-child2 p-b-4 trans-05">
                        <div class="block1-link stext-101 cl0 trans-09">
                            Lihat Blog
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="size-202 m-lr-auto respon4">
            <div class="block1 wrap-pic-w">
                <img href="{{ route('souvenir') }}" alt="Banner Photo" src="{{ asset('frontend/images/meatnauli-banner-05.jpg') }}">
                <a href="{{ route('souvenir') }}" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                    <div class="block1-txt-child1 flex-col-l">
                        <span class="block1-name ltext-102 trans-04 p-b-8 text-white">
                            Cinderamata
                        </span>
                        <span class="block1-info stext-102 trans-04 text-white">
                            Berkunjung Ke Desa Meat Tidak Lengkap Rasanya Jika Tidak Membawa Oleh-oleh. Salah Satunya Ulos Yang Sudah Menjadi Khas Desa Meat
                        </span>
                    </div>
                    <div class="block1-txt-child2 p-b-4 trans-05">
                        <div class="block1-link stext-101 cl0 trans-09">
                            Beli Cinderamata
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="size-202 m-lr-auto respon4">
            <div class="block1 wrap-pic-w">
                <img alt="Banner Photo" src="{{ asset('frontend/images/meatnauli-banner-06.jpg') }}">
                <a href="{{ route('qna') }}" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                    <div class="block1-txt-child1 flex-col-l">
                        <span class="block1-name ltext-102 trans-04 p-b-8 text-white">
                            Tanya Jawab
                        </span>
                        <span class="block1-info stext-102 trans-04 text-white">
                            Ajukan Pertanyaan Anda Seputar Desa Meat, Kami Akan Selalu Sedia Untuk Menjawab
                        </span>
                    </div>
                    <div class="block1-txt-child2 p-b-4 trans-05">
                        <div class="block1-link stext-101 cl0 trans-09">
                            Ajukan Pertanyaan
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<section class="sec-product bg0 p-t-100 p-b-50">
    <div class="container">
        <div class="p-b-32">
            <h3 class="ltext-105 cl5 txt-center respon1">
                Sekilas Tentang Desa Meat
            </h3>
        </div>
        <div class="tab01">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item p-b-10">
                    <a href="#geografis" class="nav-link active" data-toggle="tab" role="tab">Geografis</a>
                </li>
                <li class="nav-item p-b-10">
                    <a href="#pemerintahan" class="nav-link" data-toggle="tab" role="tab">Pemerintahan</a>
                </li>
                <li class="nav-item p-b-10">
                    <a href="#kehidupansosial" class="nav-link" data-toggle="tab" role="tab">Kehidupan Sosial</a>
                </li>
            </ul>
            <div class="tab-content p-t-50">
                <div class="tab-pane fade show active" id="geografis" role="tabpanel">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 mb-5">
                            <div class="row justify-content-center">
                                <img alt="Geografis" class="img-responsive img-fluid rounded" width="500" src="{{ asset('frontend/images/meatnauli-geografis.jpg') }}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 mt-4">
                            <p class="stext-102 cl2 text-justify">
                                Desa Meat merupakan sebuah desa wisata yang terletak di Kecamatan Tampahan, Kabupaten Toba, Provinsi Sumatera Utara.
                                Desa ini memiliki jarak tempuh sekitar 30 Menit dari Kota Balige menggunakan kendaraan
                                bermotor, sedangkan jarak dari kantor Kepala Desa ke Kantor Kecamatan sekitar 5 Kilometer. Desa Meat dapat dicapai
                                melalui jalan darat menggunakan kendaraan bermotor dan dengan perahu melalui Danau Toba. Saat ini, perjalanan
                                darat lebih banyak dipilih karena infrastruktur yang sudah memadai. Perjalanan darat menuju Desa Meat dilalui dengan
                                melewati jalan menurun dengan tebing di sisi dan jurang di kedua sisinya, hal ini karena lokasi geografi desa Meat
                                berada di antara perbukitan dan Danau Toba. <br><br>
                                Data Badan Pusat Statistik Kabupaten Toba menyebutkan bahwa Desa Meat terletak pada koordinat
                                2 19’23.01” LU dan 99 00’18.09” BT, serta berada pada ketinggian 979 MDPL. Luas desa
                                mencapai 3 Kilometer Persegi atau 12,27% luas wilayah Kecamatan Tampahan.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pemerintahan" role="tabpanel">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 mb-5">
                            <div class="row justify-content-center">
                                <img alt="Pemerintahan" class="img-responsive img-fluid rounded" width="500" src="{{ asset('frontend/images/meatnauli-pemerintahan.png') }}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 my-auto">
                            <p class="stext-102 cl2 text-justify">
                                Desa Meat Berada Di Wilayah Pemerintahan Kabupaten Toba, Yang Dipimpin Oleh Bapak Ir. Darwin Siagian, M.Sc Sebagai Bupati dan Bapak Ir. Hulman Sitorus, MM Sebagai Wakil Bupati.
                                Desa Meat Sendiri Dipimpin Oleh Seorang Kepala Desa Bernama Bapak Janri Simanjuntak.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="kehidupansosial" role="tabpanel">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 mb-5">
                            <div class="row justify-content-center">
                                <img alt="Kehidupan Sosial" class="img-responsive img-fluid rounded" width="500" src="{{ asset('frontend/images/meatnauli-kehidupansosial.jpg') }}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 my-auto">
                            <p class="stext-102 cl2 text-justify">
                                Jumlah penduduk yang bermukim di Desa Meat pada tahun 2020 mencapai kurang lebih 876 KK. Mayoritas penduduk berpenghasilan sebagai Petani. Untuk menambah penghasilan,
                                ibu-ibu di Desa Meat juga berprofesi sebagai Penenun Ulos yang merupakan salah satu oleh-oleh khas dari desa ini.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="form-group mt-5">
                        <a href="{{ route('information') }}" class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn1 p-lr-15 trans-04"><b>Lihat Info Detail</b></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="sec-product bg0 p-t-100 p-b-50">
	<div class="container">
		<div class="p-b-32">
			<h3 class="ltext-105 cl5 txt-center respon1">
				Cinderamata
			</h3>
		</div>
		<div class="tab01">
			<div class="tab-content p-t-50">
				<div class="tab-pane fade show active" id="best-seller" role="tabpanel">
					<div class="wrap-slick2">
						<div class="slick2">
						    @foreach($data2 as $item)
							<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
								<div class="block2">
									<div class="block2-pic hov-img0">
										<img src="{{ asset('upload/productphoto/' . $item->productphoto) }}" alt="IMG-PRODUCT">
										<a href="{{ route('singlesouvenir', $item->slug) }}" class="block2-btn flex-c-m stext-103 cl0 size-102 bg1 bor2 hov-btn2 p-lr-15 trans-04">
											Lihat Detail
										</a>
									</div>
									<div class="block2-txt flex-w flex-t p-t-14">
										<div class="block2-txt-child1 flex-col-l ">
											<a href="{{ route('singlesouvenir', $item->slug) }}" class="stext-103 cl2 hov-cl1 trans-04 js-name-b2 p-b-6">
												{{ $item->name }}
											</a>
											<span class="stext-105 cl3">
												{{ 'Rp ' . number_format($item->price) . ', -' }}
											</span>
										</div>
									</div>
								</div>
							</div>
						    @endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="sec-blog bg0 p-t-60 p-b-90">
    <div class="container">
        <div class="p-b-66">
            <h3 class="ltext-105 cl5 txt-center respon1">
                Postingan Terbaru
            </h3>
        </div>
        <div class="row justify-content-center">
            @foreach($data as $post_terbaru)
            <div class="col-sm-6 col-md-4 p-b-40">
                <div class="blog-item">
                    <div class="hov-img0">
                        <a href="{{ route('singleblog', $post_terbaru->slug) }}">
                            <img alt="Thumbnail" src="{{ asset('upload/thumbnail/' . $post_terbaru->thumbnail) }}">
                        </a>
                    </div>
                    <div class="p-t-15">
                        <div class="stext-107 flex-w p-b-14">
                            <span class="m-r-3">
                                <span class="cl4">
                                    Oleh
                                </span>
                                <span class="cl5">
                                    {{ $post_terbaru->user->name }}
                                </span>
                            </span>
                            <span>
                                <span class="cl4">
                                    Pada
                                </span>
                                <span class="cl5">
                                    {{ $post_terbaru->created_at->format('d F Y') }}
                                </span>
                            </span>
                        </div>
                        <h4 class="p-b-12">
                            <a href="{{ route('singleblog', $post_terbaru->slug) }}" class="mtext-101 cl2 hov-cl1 trans-04">
                                {{ $post_terbaru->title }}
                            </a>
                        </h4>
                        <p class="stext-108 cl2 text-justify">
                            {!! Str::words($post_terbaru->content, 20) !!}
                            <a href="{{ route('singleblog', $post_terbaru->slug) }}" class="cl2">
                                <b>Lanjutkan Membaca</b>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="form-group mt-5">
                <a href="{{ route('blog') }}" class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn1 p-lr-15 trans-04"><b>Lihat Blog</b></a>
            </div>
        </div>
    </div>
</section>

@endsection
