@extends('frontend.template.master')

@section('title', 'Detail Postingan')

@section('content')

@foreach($data as $singleblog)
<div class="container">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="{{ url('/') }}" class="stext-109 cl8 hov-cl1 trans-04">
            Beranda
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>
        <a href="{{ route('blog') }}" class="stext-109 cl8 hov-cl1 trans-04">
            Blog
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>
        <span class="stext-109 cl4">
            Detail Postingan {{-- {{ $singleblog->title }} --}}
        </span>
    </div>
</div>

<section class="bg0 p-t-52 p-b-20">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-9 p-b-80">
                <div class="p-r-45 p-r-0-lg">
                    <div class="wrap-pic-w how-pos5-parent">
                        <img alt="Thumbnail" src="{{ asset('upload/thumbnail/' . $singleblog->thumbnail) }}">
                        <div class="flex-col-c-m size-123 bg9 how-pos5">
                            <span class="ltext-107 cl2 txt-center">
                                {{ $singleblog->created_at->format('d') }}
                            </span>
                            <span class="stext-109 cl3 txt-center">
                                {{ $singleblog->created_at->format('M Y') }}
                            </span>
                        </div>
                    </div>
                    <div class="p-t-32">
                        <span class="flex-w flex-m stext-111 cl2 p-b-19">
                            <span>
                                <span class="cl4">Oleh</span> {{ $singleblog->user->name }}
                                <span class="cl12 m-l-4 m-r-6">|</span>
                            </span>
                            <span>
                                {{ $singleblog->created_at->format('d F Y') }}
                                <span class="cl12 m-l-4 m-r-6">|</span>
                            </span>
                            <span>
                                {{ $singleblog->category->name }}
                                <span class="cl12 m-l-4 m-r-6">|</span>
                            </span>
                            <span>
                                {{ $singleblog->comments->count() }} Komentar
                            </span>
                        </span>
                        <h4 class="ltext-109 cl2 p-b-28">
                            {{ $singleblog->title }}
                        </h4>
                        <p class="stext-117 cl2 p-b-26 text-justify">
                            {!! $singleblog->content !!}
                        </p>
                    </div>
                    <div class="flex-w flex-t p-t-50">
                        <span class="size-216 stext-116 cl8 p-t-4">
                            Tag
                        </span>
                        <div class="flex-w size-217">
                            @foreach ($singleblog->tag as $tagsatu)
                            <a href="{{ route('blogtag', $tagsatu->slug) }}" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                {{ $tagsatu->name }}
                            </a>
                            @endforeach
                        </div>
                    </div>
                    <div class="addthis_inline_share_toolbox p-t-40"></div>
                    <div class="p-t-40">
                        <h5 class="mtext-113 cl2 p-b-12">
                            Beri Komentar
                        </h5>
                        <p class="stext-107 cl6 p-b-40">
                            Silahkan Berikan Komentar Anda Terhadap Postingan Ini, Pada Kolom Komentar Dibawah
                        </p>
                        @comments(['model' => $singleblog])
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-md-4 col-lg-3 p-b-80">
                <div class="side-menu">
                    @if (Auth::check() && Auth::user()->role == 'Administrator' || Auth::check() && Auth::user()->role == 'Author')
                    <div class="stext-103 bor17 of-hidden pos-relative mb-3">
                        <a href="{{ route('post.create') }}" class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn1 p-lr-15 trans-04">Tambah Postingan</a>
                    </div>
                    @endif
                    <div class="bor17 of-hidden pos-relative">
                        <form method="GET" action="{{ route('blogsearch') }}">
                            @csrf
                            <input type="text" name="search" id="search" class="stext-103 cl2 plh4 size-116 p-l-28 p-r-55" placeholder="Cari Postingan" value="{{ old('search') }}">
                            <button type="submit" class="flex-c-m size-122 ab-t-r fs-18 cl4 hov-cl1 trans-04">
                                <i class="zmdi zmdi-search"></i>
                            </button>
                        </form>
                    </div>
                    <div class="p-t-65">
                        <h4 class="mtext-112 cl2 p-b-33">
                            Postingan Terbaru
                        </h4>
                        <ul>
                            @foreach($posts as $post)
                            <li class="flex-w flex-t p-b-30">
                                <a href="{{ route('singleblog', $post->slug) }}" class="wrao-pic-w size-220 hov-ovelay1 m-r-20">
                                    <img alt="Thumbnail" class="rounded" width="80" src="{{ asset('upload/thumbnail/' . $post->thumbnail) }}">
                                </a>
                                <div class="size-215 flex-col-t my-auto">
                                    <a href="{{ route('singleblog', $post->slug) }}" class="stext-116 cl8 hov-cl1 trans-04">
                                        {{ Str::words($post->title, 3) }}
                                    </a>
                                    <span class="stext-116 cl6 p-t-10">
                                        {{ $post->created_at->diffForHumans() }}
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
                                <a href="{{ route('blogcategory', $category->slug) }}" class="flex-w flex-sb-m stext-115 cl6 hov-cl1 trans-04 p-tb-2">
                                    <span>
                                        {{ $category->name }}
                                    </span>
                                    <span>
                                        ({{ $category->post->count() }})
                                    </span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="p-t-50">
                        <h4 class="mtext-112 cl2 p-b-27">
                            Tag
                        </h4>
                        <div class="flex-w m-r--5">
                            @foreach($tags as $tag)
                            <a href="{{ route('blogtag', $tag->slug) }}" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                {{ $tag->name }}
                            </a>
                            @endforeach
                        </div>
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
