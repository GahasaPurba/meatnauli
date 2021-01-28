@extends('frontend.template.master')

@section('title', 'User Feedback')

@section('content')

<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ asset('frontend/images/meatnauli-bg-02.jpg') }}');">
    <h2 class="ltext-105 cl0 txt-center">
        User Feedback
    </h2>
</section>
<section class="bg0 p-t-104 p-b-116">
    <div class="container">
        <div class="flex-w flex-tr">
            <div class="size-220 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                <form method="POST" action="{{ route('questionnaire.store') }}">
                    @csrf
                    <h4 class="mtext-105 cl2 txt-center p-b-30">
                        Kuesioner
                    </h4>
                    <div class="bor8 m-t-20 how-pos4-parent">
                        <select name="question1" id="question1" class="stext-111 cl2 plh3 size-116 p-l-25 p-r-30 js-select2 @error('question1') is-invalid @enderror">
                            <option value="">Menurut Anda, Apakah Website Ini Bermanfaat ?</option>
                            <option value="Tidak Bermanfaat">Tidak Bermanfaat</option>
                            <option value="Kurang Bermanfaat">Kurang Bermanfaat</option>
                            <option value="Bermanfaat">Bermanfaat</option>
                            <option value="Sangat Bermanfaat">Sangat Bermanfaat</option>
                        </select>
                        <div class="dropDownSelect2"></div>
                    </div>
                    @error('question1')
                    <div class="text-danger stext-111">
                        {{ $message }}
                    </div>
                    @enderror
                    <div class="bor8 m-t-20 how-pos4-parent">
                        <select name="question2" id="question2" class="stext-111 cl2 plh3 size-116 p-l-25 p-r-30 js-select2 @error('question2') is-invalid @enderror">
                            <option value="">Menurut Anda, Apakah Blog Yang Ada Di Website Ini Informatif ?</option>
                            <option value="Tidak Informatif">Tidak Informatif</option>
                            <option value="Kurang Informatif">Kurang Informatif</option>
                            <option value="Informatif">Informatif</option>
                            <option value="Sangat Informatif">Sangat Informatif</option>
                        </select>
                        <div class="dropDownSelect2"></div>
                    </div>
                    @error('question2')
                    <div class="text-danger stext-111">
                        {{ $message }}
                    </div>
                    @enderror
                    <div class="bor8 m-t-20 how-pos4-parent">
                        <select name="question3" id="question3" class="stext-111 cl2 plh3 size-116 p-l-25 p-r-30 js-select2 @error('question3') is-invalid @enderror">
                            <option value="">Menurut Anda, Apakah Forum Tanya Jawab Yang Ada Di Website Ini Berguna ?</option>
                            <option value="Tidak Berguna">Tidak Berguna</option>
                            <option value="Kurang Berguna">Kurang Berguna</option>
                            <option value="Berguna">Berguna</option>
                            <option value="Sangat Berguna">Sangat Berguna</option>
                        </select>
                        <div class="dropDownSelect2"></div>
                    </div>
                    @error('question3')
                    <div class="text-danger stext-111">
                        {{ $message }}
                    </div>
                    @enderror
                    <div class="bor8 m-t-20 how-pos4-parent">
                        <select name="question4" id="question4" class="stext-111 cl2 plh3 size-116 p-l-25 p-r-30 js-select2 @error('question4') is-invalid @enderror">
                            <option value="">Menurut Anda, Bagaimana Kelengkapan Informasi Tentang Desa Meat Di Website Ini ?</option>
                            <option value="Tidak Lengkap">Tidak Lengkap</option>
                            <option value="Kurang Lengkap">Kurang Lengkap</option>
                            <option value="Lengkap">Lengkap</option>
                            <option value="Sangat Lengkap">Sangat Lengkap</option>
                        </select>
                        <div class="dropDownSelect2"></div>
                    </div>
                    @error('question4')
                    <div class="text-danger stext-111">
                        {{ $message }}
                    </div>
                    @enderror
                    <div class="bor8 m-t-20">
                        <textarea name="suggestion" id="suggestion" class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25 @error('suggestion') is-invalid @enderror" placeholder="Berikan Saran Anda">{{ old('suggestion') }}</textarea>
                    </div>
                    @error('suggestion')
                    <div class="text-danger stext-111">
                        {{ $message }}
                    </div>
                    @enderror
                    <button type="submit" class="flex-c-m stext-101 cl0 size-121 bg1 bor1 hov-btn1 p-lr-15 trans-04 pointer m-t-40">
                        Kirim
                    </button>
                </form>
            </div>
            <div class="size-200 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
                <div class="flex-w w-full p-b-42">
                    <span class="fs-18 cl5 txt-center size-211">
                        <span class="lnr lnr-map-marker"></span>
                    </span>
                    <div class="size-212 p-t-2">
                        <span class="mtext-110 cl2">
                            Alamat
                        </span>
                        <p class="stext-115 cl6 size-213 p-t-18">
                            Jl. P.I. Del, Sitoluama, Lagu Boti, Kabupaten Toba Samosir, Sumatera Utara 22381
                        </p>
                    </div>
                </div>
                <div class="flex-w w-full p-b-42">
                    <span class="fs-18 cl5 txt-center size-211">
                        <span class="lnr lnr-phone-handset"></span>
                    </span>
                    <div class="size-212 p-t-2">
                        <span class="mtext-110 cl2">
                            Hubungi Kami
                        </span>
                        <p class="stext-115 cl1 size-213 p-t-18">
                            +62 811 6120 030
                        </p>
                    </div>
                </div>
                <div class="flex-w w-full">
                    <span class="fs-18 cl5 txt-center size-211">
                        <span class="lnr lnr-envelope"></span>
                    </span>
                    <div class="size-212 p-t-2">
                        <span class="mtext-110 cl2">
                            Email Kami
                        </span>
                        <p class="stext-115 cl1 size-213 p-t-18">
                            naulimeat@gmail.com
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
