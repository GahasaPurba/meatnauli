<footer class="bg3 p-t-75 p-b-32">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">
                    Tentang Kami
                </h4>
                <p class="stext-107 cl7 size-201 text-justify">
                    MeatNauli Adalah Sebuah Website Yang Digagas Oleh Kelompok 03 - PA 1 Institut Teknologi Del.
                    Website Ini Ditujukan Untuk Mempromosikan Desa Meat Yang Memiliki Potensi Alam Dan Budaya Yang Tidak Perlu Diragukan Lagi.
                    Semoga Website Ini Dapat Semakin Memperkenalkan Desa Meat Ke Banyak Orang.
                </p>
                <div class="p-t-27">
                    <a href="https://www.facebook.com/meatnauli.id" target="_blank" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a href="https://www.instagram.com/meatnauli" target="_blank" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                        <i class="fa fa-instagram"></i>
                    </a>
                    <a href="https://www.twitter.com/meatnauli_id" target="_blank" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a href="https://www.github.com/meatnauli" target="_blank" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                        <i class="fa fa-github"></i>
                    </a>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">
                    Link Terkait
                </h4>
                <ul>
                    <li class="p-b-10">
                        <a href="https://www.del.ac.id/" target="_blank" class="stext-107 cl7 hov-cl1 trans-04">
                            Institut Teknologi Del
                        </a>
                    </li>
                    <li class="p-b-10">
                        <a href="http://www.tobasamosirkab.go.id/" target="_blank" class="stext-107 cl7 hov-cl1 trans-04">
                            Pemerintah Kabupaten Toba
                        </a>
                    </li>
                    <li class="p-b-10">
                        <a href="http://www.kemenparekraf.go.id/" target="_blank" class="stext-107 cl7 hov-cl1 trans-04">
                            Kementerian Pariwisata dan Ekonomi Kreatif - RI
                        </a>
                    </li>
                    <li class="p-b-10">
                        <a href="https://www.indonesia.travel/" target="_blank" class="stext-107 cl7 hov-cl1 trans-04">
                            Wonderfull Indonesia
                        </a>
                    </li>
                </ul>
            </div>
            @if (Auth::check())
            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">
                    User Feedback
                </h4>
                <p class="stext-107 cl7 size-201 text-justify">
                    Tolong Berikan Feedback Pada Kami Dengan Mengisi Kuesioner Yang Telah Kami Sediakan
                </p>
                <div class="p-t-27">
                    <a href="{{ route('questionnaire.create') }}" class="btn stext-101 cl0 bg1 hov-btn2">
                        Isi Kuesioner
                    </a>
                </div>
            </div>
            @endif
            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">
                    Berlangganan
                </h4>
                <form method="POST" action="{{ route('mail.store') }}">
                    @csrf
                    <div class="wrap-input1 w-full p-b-4">
                        <input type="text" name="email" id="email" class="input1 bg-none plh1 stext-107 cl7 @error('email') is-invalid @enderror" placeholder="Masukkan Email" value="{{ old('email') }}" autocomplete="off">
                    </div>
                    @error('email')
                    <div class="stext-107 text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    <div class="p-t-18">
                        <button type="submit" class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                            Berlangganan
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="p-t-40">
            <div class="flex-c-m flex-w p-b-18">
                <a href="https://www.del.ac.id/" target="_blank" class="m-all-1">
                    <img alt="Logo IT Del" width="50" src="{{ asset('frontend/images/icons/itdel.png') }}">
                </a>
                &nbsp;&nbsp;&nbsp;
                <a href="{{ url('/') }}" class="m-all-1">
                    <img alt="Logo MeatNauli" width="180" src="{{ asset('frontend/images/icons/logo-02.png') }}">
                </a>
            </div>
            <p class="stext-107 cl6 txt-center">
                Copyright &copy;<script>
                    document.write(new Date().getFullYear());

                </script> All Rights Reserved | This Website Is Made With <i class="fa fa-heart-o" aria-hidden="true"></i> By <a href="#">Kelompok 03 PA 1 - IT Del</a>
            </p>
        </div>
    </div>
</footer>
<div class="btn-back-to-top" id="myBtn">
    <span class="symbol-btn-back-to-top">
        <i class="zmdi zmdi-chevron-up"></i>
    </span>
</div>
@yield('modal')
<script src="{{ asset('frontend/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/animsition/js/animsition.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/bootstrap/js/popper.js') }}"></script>
<script src="{{ asset('frontend/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/select2/select2.min.js') }}"></script>
<script>
    $(".js-select2").each(function() {
        $(this).select2({
            minimumResultsForSearch: 20
            , dropdownParent: $(this).next('.dropDownSelect2')
        });
    })

</script>
<script src="{{ asset('frontend/vendor/daterangepicker/moment.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('frontend/vendor/slick/slick.min.js') }}"></script>
<script src="{{ asset('frontend/js/slick-custom.js') }}"></script>
<script src="{{ asset('frontend/vendor/parallax100/parallax100.js') }}"></script>
<script>
    $('.parallax100').parallax100();

</script>
<script src="{{ asset('vendor/MagnificPopup/jquery.magnific-popup.min.js') }}"></script>
<script>
    $('.gallery-lb').each(function() {
        $(this).magnificPopup({
            delegate: 'a'
            , type: 'image'
            , gallery: {
                enabled: true
            }
            , mainClass: 'mfp-fade'
        });
    });

</script>
<script src="{{ asset('frontend/vendor/isotope/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script>
    $('.js-pscroll').each(function() {
        $(this).css('position', 'relative');
        $(this).css('overflow', 'hidden');
        var ps = new PerfectScrollbar(this, {
            wheelSpeed: 1
            , scrollingThreshold: 1000
            , wheelPropagation: false
        , });
        $(window).on('resize', function() {
            ps.update();
        })
    });

</script>
<script src="{{ asset('frontend/js/main.js') }}"></script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5ecb5f5c713cdbb2"></script>
@yield('script')
</body>
</html>
