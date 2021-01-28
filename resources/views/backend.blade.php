@extends('backend.template.master')

@section('title', 'Dashboard')

@section('content')

<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-monitor icon-gradient bg-warm-flame">
                    </i>
                </div>
                <div>Dashboard
                    <div class="page-title-subheading">Hai, <b>{{ Auth::user()->name }}</b>, Selamat Datang Di Dashboard MeatNauli, Horas !
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-6 col-xl-4">
            <div class="card mb-3 widget-content bg-happy-green">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading text-white">
                            <h4>Postingan</h4>
                        </div>
                        <div class="widget-subheading"><b>Jumlah Postingan Yang Sudah Ditampilkan Di Blog Website MeatNauli</b></div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers">
                            <span>
                                <h1><b>{{ $jumlahpost }}</b></h1>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-4">
            <div class="card mb-3 widget-content bg-arielle-smile">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">
                            <h4>Item</h4>
                        </div>
                        <div class="widget-subheading"><b>Jumlah Item Yang Terdaftar dan Dijual Di Menu Cinderamata Website MeatNauli</b></div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white">
                            <span>
                                <h1><b>{{ $jumlahitem }}</b></h1>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-4">
            <div class="card mb-3 widget-content bg-sunny-morning">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">
                            <h4>Pertanyaan</h4>
                        </div>
                        <div class="widget-subheading"><b>Jumlah Pertanyaan Yang Diajukan Pengunjung Website MeatNauli di Forum Tanya Jawab</b></div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white">
                            <span>
                                <h1><b>{{ $jumlahquestion }}</b></h1>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row text-center">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <img alt="Logo MeatNauli" class="img-responsive img-fluid mb-5" width="300" src="{{ asset('backend/assets/images/logo-big.png') }}">
                            <p class="text-justify">
                                <b>
                                    Horas ! Selamat Datang Di Dashboard MeatNauli ! <br><br>
                                </b>
                                {{--MeatNauli Adalah Sebuah Website Yang Digagas Oleh Kelompok 03 - PA 1 Institut Teknologi Del.--}}
                                Website MeatNauli Ditujukan Untuk Mempromosikan Desa Meat Yang Memiliki Potensi Alam Dan Budaya Yang Tidak Perlu Diragukan Lagi.
                                Semoga Website Ini Dapat Semakin Memperkenalkan Desa Meat Ke Banyak Orang. <br><br>
                                Di Sini Anda Bisa Membuat Post Baru, Jika Anda Seorang Author. Menambahkan Item Baru, Jika Anda Seorang Seller. Dan Memberi Pertanyaan, Jika Anda Seorang User.
                                Bijaklah Dalam Membuat Post, Menambah Item, Ataupun Memberi Pertanyaan. Kami Tim Administrator Akan Tetap Mengecek Post, Item, Maupun Pertanyaan Yang Anda Tambahkan Agar Tetap Sesuai Dengan Syarat Dan Ketentuan
                                Yang Berlaku Di Website Ini. Terimakasih. <br><br>
                                <b>
                                    Salam Kami, Tim Administrator MeatNauli
                                </b>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card bg-night-sky">
        <div class="no-gutters row">
            <div class="col-lg-6 col-xl-3">
                <div class="widget-content">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-right ml-0 mr-3">
                            <div class="widget-numbers text-success">{{ $administrators }}</div>
                        </div>
                        <div class="widget-content-left">
                            <div class="widget-heading text-success">Administrator</div>
                            <div class="widget-subheading text-white">Jumlah Administrator Yang Telah Terdaftar Di Website MeatNauli</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-3">
                <div class="widget-content">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-right ml-0 mr-3">
                            <div class="widget-numbers text-warning">{{ $authors }}</div>
                        </div>
                        <div class="widget-content-left">
                            <div class="widget-heading text-warning">Author</div>
                            <div class="widget-subheading text-white">Jumlah Author Yang Telah Terdaftar Di Website MeatNauli</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-3">
                <div class="widget-content">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-right ml-0 mr-3">
                            <div class="widget-numbers text-success">{{ $sellers }}</div>
                        </div>
                        <div class="widget-content-left">
                            <div class="widget-heading text-success">Seller</div>
                            <div class="widget-subheading text-white">Jumlah Seller / Penjual Yang Telah Terdaftar Di Website MeatNauli</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-3">
                <div class="widget-content">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-right ml-0 mr-3">
                            <div class="widget-numbers text-warning">{{ $users }}</div>
                        </div>
                        <div class="widget-content-left">
                            <div class="widget-heading text-warning">User</div>
                            <div class="widget-subheading text-white">Jumlah User Yang Telah Terdaftar Di Website MeatNauli</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (Auth::user()->role == 'Administrator')
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">Postingan Terbaru
                    <div class="btn-actions-pane-right">
                        <div role="group" class="btn-group-sm btn-group">
                            <a href="{{ route('post.index') }}" class="btn btn-focus text-white">Lihat Semua</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Judul</th>
                                <th class="text-center">Author</th>
                                <th class="text-center">Diposting Pada</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                            <tr>
                                <td class="text-center"><b>{{ $loop->iteration }}</b></td>
                                <td>{{ $post->title }}</td>
                                <td>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <div class="widget-content-left">
                                                    <img alt="Profile Photo" class="rounded-circle" width="40" src="{{ asset('upload/profilephoto/' . $post->user->avatar) }}">
                                                </div>
                                            </div>
                                            <div class="widget-content-left flex2">
                                                <div class="widget-heading">{{ $post->user->name }}</div>
                                                <div class="widget-subheading opacity-7">{{ $post->user->role }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">
                                    {{ $post->created_at->diffForHumans() }}
                                </td>
                                <td class="text-center">
                                    <form method="POST" action="{{ route('home.destroypost', $post->id) }}">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('home.editpost', $post->id) }}" class="mr-2 btn-icon btn-icon-only btn btn-outline-warning text-warning"><i class="pe-7s-pen btn-icon-wrapper"> </i></a>
                                        <button type="submit" class="mr-2 btn-icon btn-icon-only btn btn-outline-danger"><i class="pe-7s-trash btn-icon-wrapper"> </i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-block card-footer">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">Item Terbaru
                    <div class="btn-actions-pane-right">
                        <div role="group" class="btn-group-sm btn-group">
                            <a href="{{ route('item.index') }}" class="btn btn-focus text-white">Lihat Semua</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Seller</th>
                                <th class="text-center">Ditambah Pada</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                            <tr>
                                <td class="text-center"><b>{{ $loop->iteration }}</b></td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <div class="widget-content-left">
                                                    <img alt="Profile Photo" class="rounded-circle" width="40" src="{{ asset('upload/profilephoto/' . $item->user->avatar) }}">
                                                </div>
                                            </div>
                                            <div class="widget-content-left flex2">
                                                <div class="widget-heading">{{ $item->user->name }}</div>
                                                <div class="widget-subheading opacity-7">{{ $item->user->role }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">
                                    {{ $item->created_at->diffForHumans() }}
                                </td>
                                <td class="text-center">
                                    <form method="POST" action="{{ route('home.destroyitem', $item->id) }}">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('home.edititem', $item->id) }}" class="mr-2 btn-icon btn-icon-only btn btn-outline-warning text-warning"><i class="pe-7s-pen btn-icon-wrapper"> </i></a>
                                        <button type="submit" class="mr-2 btn-icon btn-icon-only btn btn-outline-danger"><i class="pe-7s-trash btn-icon-wrapper"> </i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-block card-footer">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">Pertanyaan Terbaru
                    <div class="btn-actions-pane-right">
                        <div role="group" class="btn-group-sm btn-group">
                            <a href="{{ route('question.index') }}" class="btn btn-focus text-white">Lihat Semua</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Pertanyaan</th>
                                <th class="text-center">Ditanya Oleh</th>
                                <th class="text-center">Ditanya Pada</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($questions as $question)
                            <tr>
                                <td class="text-center"><b>{{ $loop->iteration }}</b></td>
                                <td>{{ $question->question }}</td>
                                <td>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <div class="widget-content-left">
                                                    <img alt="Profile Photo" class="rounded-circle" width="40" src="{{ asset('upload/profilephoto/' . $question->user->avatar) }}">
                                                </div>
                                            </div>
                                            <div class="widget-content-left flex2">
                                                <div class="widget-heading">{{ $question->user->name }}</div>
                                                <div class="widget-subheading opacity-7">{{ $question->user->role }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">
                                    {{ $question->created_at->diffForHumans() }}
                                </td>
                                <td class="text-center">
                                    <form method="POST" action="{{ route('home.destroyquestion', $question->id) }}">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('home.editquestion', $question->id) }}" class="mr-2 btn-icon btn-icon-only btn btn-outline-warning text-warning"><i class="pe-7s-pen btn-icon-wrapper"> </i></a>
                                        <button type="submit" class="mr-2 btn-icon btn-icon-only btn btn-outline-danger"><i class="pe-7s-trash btn-icon-wrapper"> </i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-block card-footer">
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

@endsection
