@extends('frontend.template.master')

@section('title', 'Jawaban Pertanyaan')

@section('content')

@foreach($data as $singleqna)
<div class="container">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="{{ url('/') }}" class="stext-109 cl8 hov-cl1 trans-04">
            Beranda
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>
        <a href="{{ route('qna') }}" class="stext-109 cl8 hov-cl1 trans-04">
            Daftar Pertanyaan
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>
        <span class="stext-109 cl4">
            {{ $singleqna->question }}
        </span>
    </div>
</div>

<section class="bg0 p-t-52 p-b-20">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-9 p-b-80">
                <div class="p-r-45 p-r-0-lg">
                    <div class="p-t-32">
                        <span class="flex-w flex-m stext-111 cl2 p-b-19">
                            <span>
                                <span class="cl4">Ditanya Oleh</span> {{ $singleqna->user->name }}
                                <span class="cl12 m-l-4 m-r-6">|</span>
                            </span>
                            <span>
                                {{ $singleqna->created_at->format('d F Y') }}
                                <span class="cl12 m-l-4 m-r-6">|</span>
                            </span>
                            <span>
                                {{ $singleqna->qna_category->name }}
                                <span class="cl12 m-l-4 m-r-6">|</span>
                            </span>
                            <span>
                                {{ $singleqna->comments->count() }} Jawaban / Pembahasan
                            </span>
                        </span>
                        <h4 class="ltext-109 cl2 p-b-28">
                            {{ $singleqna->question }}
                        </h4>
                    </div>
                    <div class="addthis_inline_share_toolbox p-t-40"></div>
                    <div class="p-t-40">
                        <h5 class="mtext-113 cl2 p-b-12">
                            Beri Jawaban
                        </h5>
                        <p class="stext-107 cl6 p-b-40">
                            Silahkan Berikan Jawaban, Komentar, Ataupun Pesan Anda Terhadap Pertanyaan Ini, Pada Kolom Dibawah
                        </p>
                        @comments(['model' => $singleqna])
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-md-4 col-lg-3 p-b-80">
                <div class="side-menu">
                    <div class="stext-103 bor17 of-hidden pos-relative mb-3">
                        <a href="{{ route('question.create') }}" class="btn btn-block btn-dark">Ajukan Pertanyaan</a>
                    </div>
                    <div class="bor17 of-hidden pos-relative">
                        <form method="GET" action="{{ route('qnasearch') }}">
                            @csrf
                            <input type="text" name="search" id="search" class="stext-103 cl2 plh4 size-116 p-l-28 p-r-55" placeholder="Cari Pertanyaan" value="{{ old('search') }}">
                            <button type="submit" class="flex-c-m size-122 ab-t-r fs-18 cl4 hov-cl1 trans-04">
                                <i class="zmdi zmdi-search"></i>
                            </button>
                        </form>
                    </div>
                    <div class="p-t-65">
                        <h4 class="mtext-112 cl2 p-b-33">
                            Pertanyaan Terbaru
                        </h4>
                        <ul>
                            @foreach($questions as $question)
                            <li class="flex-w flex-t p-b-30">
                                <div class="size-215 flex-col-t my-auto">
                                    <a href="{{ route('singleqna', $question->slug) }}" class="stext-116 cl8 hov-cl1 trans-04">
                                        {{ Str::words($question->question) }}
                                    </a>
                                    <span class="stext-116 cl6 p-t-10">
                                        {{ $question->created_at->diffForHumans() }}
                                    </span>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="p-t-55">
                        <h4 class="mtext-112 cl2 p-b-20">
                            Kategori
                        </h4>
                        <ul>
                            @foreach($categories as $category)
                            <li class="p-b-7">
                                <a href="{{ route('qnacategory', $category->slug) }}" class="flex-w flex-sb-m stext-115 cl6 hov-cl1 trans-04 p-tb-2">
                                    <span>
                                        {{ $category->name }}
                                    </span>
                                    <span>
                                        ({{ $category->question->count() }})
                                    </span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="p-t-65">
                        <h4 class="mtext-112 cl2 p-b-33">
                            Item Terbaru
                        </h4>
                        <ul>
                            @foreach($items as $item)
                            <li class="flex-w flex-t p-b-30">
                                <a href="{{ route('singlesouvenir', $item->slug) }}" class="wrao-pic-w size-230 hov-ovelay1 m-r-20">
                                    <img alt="Product Photo" class="rounded" width="80" src="{{ asset('upload/productphoto/' . $item->productphoto) }}">
                                </a>
                                <div class="size-215 flex-col-t p-t-8">
                                    <a href="{{ route('singlesouvenir', $item->slug) }}" class="stext-116 cl8 hov-cl1 trans-04">
                                        {{ $item->name }}
                                    </a>
                                    <span class="stext-116 cl6 p-t-20">
                                        {{ 'Rp ' . number_format($item->price) . ', -' }}
                                    </span>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
