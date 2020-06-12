@extends('backend.template.master')

@section('title', 'QnA (Add Category)')

@section('content')

<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-ribbon icon-gradient bg-warm-flame">
                    </i>
                </div>
                <div>Add Category
                    <div class="page-title-subheading">Silahkan Buat Kategori Baru Untuk Pertanyaan
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-6">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title mb-5">Add Category</h5>
                    <form method="POST" action="{{ route('qnacategory.store') }}">
                        @csrf
                        <div class="position-relative form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Kategori" value="{{ old('name') }}" autofocus>
                            @error('name')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="mt-1 btn btn-primary btn-block">Add</button>
                        <a href="{{ route('qnacategory.index') }}" class="mt-1 btn btn-danger btn-block">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
