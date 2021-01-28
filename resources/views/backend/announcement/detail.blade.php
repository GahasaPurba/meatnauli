@extends('backend.template.master')

@section('title', 'Pengumuman (Detail Pengumuman)')

@section('content')

<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-id icon-gradient bg-warm-flame">
                    </i>
                </div>
                <div>Detail Pengumuman
                    <div class="page-title-subheading">Berikut Isi Pengumuman Yang Ada Di Website MeatNauli
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-6">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title mb-5">Detail Pengumuman</h5>
                    <div class="position-relative form-group">
                        <label for="title">Judul</label>
                        <small class="form-text text-muted">
                            Judul Pengumuman
                        </small>
                        <input type="text" id="title" class="form-control" value="{{ $announcements->title }}" readonly>
                    </div>
                    <div class="position-relative form-group">
                        <label for="content">Konten</label>
                        <small class="form-text text-muted">
                            Konten Pengumuman
                        </small>
                        <p>
                            {!! $announcements->content !!}
                        </p>
                    </div>
                    <div class="position-relative form-group">
                        <label for="file">File</label>
                        <small class="form-text text-muted">
                            File Pengumuman
                        </small>
                        <a href="{{ asset('upload/filepengumuman/' . $announcements->file) }}" target="_blank">{{ $announcements->file }}</a>
                    </div>
                    <div class="position-relative form-group">
                        <label for="created_at">Dibuat Pada</label>
                        <small class="form-text text-muted">
                            Dibuat Pada
                        </small>
                        <input type="text" id="created_at" class="form-control" value="{{ $announcements->created_at }}" readonly>
                    </div>
                    <a href="{{ route('announcement.index') }}" class="mt-1 btn btn-info btn-block">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
