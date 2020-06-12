@extends('backend.template.master')

@section('title', 'Announcement (Announcement Detail)')

@section('content')

<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-id icon-gradient bg-warm-flame">
                    </i>
                </div>
                <div>Announcement Detail
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
                    <h5 class="card-title mb-5">Announcement Detail</h5>
                    <div class="position-relative form-group">
                        <label for="title">Title</label>
                        <small class="form-text text-muted">
                            Judul Pengumuman
                        </small>
                        <input type="text" id="title" class="form-control" value="{{ $announcements->title }}" readonly>
                    </div>
                    <div class="position-relative form-group">
                        <label for="content">Content</label>
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
                        <a href="{{ asset('upload/filepengumuman/' . $announcements->file) }}">{{ $announcements->file }}</a>
                    </div>
                    <div class="position-relative form-group">
                        <label for="created_at">Created At</label>
                        <small class="form-text text-muted">
                            Dibuat Pada
                        </small>
                        <input type="text" id="created_at" class="form-control" value="{{ $announcements->created_at }}" readonly>
                    </div>
                    <a href="{{ route('announcement.index') }}" class="mt-1 btn btn-info btn-block">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
