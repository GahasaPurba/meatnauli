@extends('backend.template.master')

@section('title', 'Pengumuman (Tambah Pengumuman)')

@section('content')

@if (Auth::check() && Auth::user()->role == 'Administrator')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-id icon-gradient bg-warm-flame">
                    </i>
                </div>
                <div>Tambah Pengumuman
                    <div class="page-title-subheading">Silahkan Buat Pengumuman Baru
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-6">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title mb-5">Tambah Pengumuman</h5>
                    <form method="POST" action="{{ route('announcement.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="position-relative form-group">
                            <label for="title">Judul</label>
                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Judul Pengumuman" value="{{ old('title') }}" autofocus>
                            @error('title')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="position-relative form-group">
                            <label for="content">Konten</label>
                            <small class="form-text text-muted">
                                Konten Pengumuman
                            </small>
                            <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror">{{ old('content') }}</textarea>
                            @error('content')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="position-relative form-group">
                            <label for="file">File</label>
                            <input type="text" onfocus="this.type='file'" name="file" id="file" class="form-control @error('file') is-invalid @enderror" placeholder="Upload File Jika Perlu">
                            @error('file')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="mt-1 btn btn-primary btn-block">Tambahkan</button>
                        <a href="{{ route('announcement.index') }}" class="mt-1 btn btn-danger btn-block">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@endsection

@section('script')

<script>
    CKEDITOR.replace('content');

</script>

@endsection
