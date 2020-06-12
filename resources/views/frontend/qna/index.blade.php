@extends('frontend.template.master')

@section('title', 'Forum Tanya Jawab')

@section('content')

<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ asset('frontend/images/bg-04.jpg') }}');">
    <h2 class="ltext-105 cl0 txt-center">
        Forum Tanya Jawab
    </h2>
</section>
<section class="bg0 p-t-62 p-b-60">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-9 p-b-80">
                <div class="p-r-45 p-r-0-lg">
                    @foreach($questions as $question)
                    <div class="p-b-63">
                        <span class="mtext-107 cl3 txt-center">
                            {{ $question->created_at->format('d') }}
                        </span>
                        <span class="mtext-107 cl3 txt-center">
                            {{ $question->created_at->format('F Y') }}
                        </span>
                        <div class="p-t-32">
                            <h4 class="p-b-15">
                                <a href="{{ route('singleqna', $question->slug) }}" class="ltext-108 cl2 hov-cl1 trans-04">
                                    {{ $question->question }}
                                </a>
                            </h4>
                            <div class="flex-w flex-sb-m p-t-18">
                                <span class="flex-w flex-m stext-111 cl2 p-r-30 m-tb-10">
                                    <span>
                                        <span class="cl4">Ditanya Oleh</span> {{ $question->user->name }}
                                        <span class="cl12 m-l-4 m-r-6">|</span>
                                    </span>
                                    <span>
                                        {{ $question->qna_category->name }}
                                        <span class="cl12 m-l-4 m-r-6">|</span>
                                    </span>
                                    <span>
                                        {{ $question->comments->count() }} Jawaban / Pembahasan
                                    </span>
                                </span>
                                <a href="{{ route('singleqna', $question->slug) }}" class="stext-101 cl2 hov-cl1 trans-04 m-tb-10">
                                    Lihat Jawaban
                                    <i class="fa fa-long-arrow-right m-l-9"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="flex-l-m flex-w w-full p-t-10 m-lr--7">
                        {{ $questions->links() }}
                    </div>
                </div>
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
                            @foreach($data as $question)
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
                            @foreach($data2 as $item)
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
