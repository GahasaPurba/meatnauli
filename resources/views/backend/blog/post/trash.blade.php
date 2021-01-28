@extends('backend.template.master')

@section('title', 'Blog (Postingan Diarsipkan)')

@section('content')

@if (Auth::check() && Auth::user()->role == 'Administrator')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-pen icon-gradient bg-warm-flame">
                    </i>
                </div>
                <div>Arsip Postingan
                    <div class="page-title-subheading">Berikut Daftar Postingan Yang Telah Diarsipkan Dari Website MeatNauli
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Arsip Postingan
                </div>
                <div class="table-responsive">
                    <table class="mb-0 table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Judul</th>
                                <th class="text-center">Kategori</th>
                                <th class="text-center">Tag</th>
                                <th class="text-center">Author</th>
                                <th class="text-center">Thumbnail</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post => $result)
                            <tr>
                                <td class="text-center"><b>{{ $post + $posts->firstitem() }}</b></td>
                                <td>{{ $result->title }}</td>
                                <td>{{ $result->category->name }}</td>
                                <td>
                                    @foreach ($result->tag as $tags)
                                    <ul>
                                        <span class="badge badge-primary">{{ $tags->name }}</span>
                                    </ul>
                                    @endforeach
                                </td>
                                <td>{{ $result->user->name }}</td>
                                <td class="text-center">
                                    <img alt="Thumbnail" class="img-responsive img-fluid rounded" width="100" src="{{ asset('upload/thumbnail/' . $result->thumbnail) }}">
                                </td>
                                <td class="text-center">
                                    <form method="POST" action="{{ route('post.kill', $result->id) }}">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('post.restore', $result->id) }}" class="mr-2 btn-icon btn-icon-only btn btn-outline-info text-info"><i class="pe-7s-refresh-2 btn-icon-wrapper"> </i></a>
                                        <button type="submit" class="mr-2 btn-icon btn-icon-only btn btn-outline-danger"><i class="pe-7s-trash btn-icon-wrapper"> </i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@endsection
