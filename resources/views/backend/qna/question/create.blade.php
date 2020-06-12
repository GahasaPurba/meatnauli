@extends('backend.template.master')

@section('question', 'QnA (Add Question)')

@section('content')

<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-comment icon-gradient bg-warm-flame">
                    </i>
                </div>
                <div>Add Question
                    <div class="page-title-subheading">Silahkan Buat Pertanyaan Yang Ingin Anda Tanyakan
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-6">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title mb-5">Add Question</h5>
                    <form method="POST" action="{{ route('question.store') }}">
                        @csrf
                        <div class="position-relative form-group">
                            <label for="question">Question</label>
                            <input type="text" name="question" id="question" class="form-control @error('question') is-invalid @enderror" placeholder="Isi Pertanyaan" value="{{ old('question') }}" autofocus>
                            @error('question')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="position-relative form-group">
                            <label for="qna_category_id">Category</label>
                            <select name="qna_category_id" id="qna_category_id" class="form-control @error('qna_category_id') is-invalid @enderror">
                                <option value="">Kategori Pertanyaan</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('qna_category_id')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="mt-1 btn btn-primary btn-block">Add</button>
                        <a href="{{ route('question.index') }}" class="mt-1 btn btn-danger btn-block">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
