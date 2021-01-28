@extends('frontend.template.master')

@section('title', 'Blog')

@section('content')

<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ asset('frontend/images/meatnauli-bg-01.jpg') }}');">
    <h2 class="ltext-105 cl0 txt-center">
        Blog
    </h2>
</section>
<section class="bg0 p-t-62 p-b-60">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-9 p-b-80">
                <div class="p-r-45 p-r-0-lg">
                    @foreach($posts as $post)
                    <div class="p-b-63">
                        <a href="{{ route('singleblog', $post->slug) }}" class="hov-img0 how-pos5-parent">
                            <img alt="Thumbnail" src="{{ asset('upload/thumbnail/' . $post->thumbnail) }}">
                            <div class="flex-col-c-m size-123 bg9 how-pos5">
                                <span class="ltext-107 cl2 txt-center">
                                    {{ $post->created_at->format('d') }}
                                </span>
                                <span class="stext-109 cl3 txt-center">
                                    {{ $post->created_at->format('M Y') }}
                                </span>
                            </div>
                        </a>
                        <div class="p-t-32">
                            <h4 class="p-b-15">
                                <a href="{{ route('singleblog', $post->slug) }}" class="ltext-108 cl2 hov-cl1 trans-04">
                                    {{ $post->title }}
                                </a>
                            </h4>
                            <p class="stext-117 cl2 text-justify">
                                {!! Str::words($post->content, 80, ' . . . . .') !!}
                                <a href="{{ route('singleblog', $post->slug) }}" class="cl2">
                                    <b>Lanjutkan Membaca</b>
                                </a>
                            </p>
                            <div class="flex-w flex-sb-m p-t-18">
                                <span class="flex-w flex-m stext-111 cl2 p-r-30 m-tb-10">
                                    <span>
                                        <span class="cl4">Oleh</span> {{ $post->user->name }}
                                        <span class="cl12 m-l-4 m-r-6">|</span>
                                    </span>
                                    <span>
                                        {{ $post->category->name }}
                                        <span class="cl12 m-l-4 m-r-6">|</span>
                                    </span>
                                    <span>
                                        {{ $post->comments->count() }} Komentar
                                    </span>
                                </span>
                            </div>
                            {{--
                            <a href="{{ route('singleblog', $post->slug) }}" class="stext-101 cl2 hov-cl1 trans-04 m-tb-10">
                                Lanjutkan Membaca
                                <i class="fa fa-long-arrow-right m-l-9"></i>
                            </a>
                            --}}
                        </div>
                    </div>
                    @endforeach
                    <div class="flex-l-m flex-w w-full p-t-10 m-lr--7">
                        {{ $posts->links() }}
                    </div>
                </div>
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
                            @foreach($data as $post)
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
