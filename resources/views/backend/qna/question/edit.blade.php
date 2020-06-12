@extends('backend.template.master')

@section('title', 'QnA (Edit Question)')

@section('content')

<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-comment icon-gradient bg-warm-flame">
                    </i>
                </div>
                <div>Edit Question
                    <div class="page-title-subheading">Silahkan Edit Pertanyaan
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-6">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title mb-5">Edit Question</h5>
                    <form method="POST" action="{{ route('question.update', $questions->id) }}">
                        @csrf
                        @method('patch')
                        <div class="position-relative form-group">
                            <label for="question">Question</label>
                            <input type="text" name="question" id="question" class="form-control @error('question') is-invalid @enderror" placeholder="Isi Pertanyaan" value="{{ $questions->question }}" autofocus>
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
                                <option value="{{ $category->id }}" @if($questions->qna_category_id == $category->id) selected @endif>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('qna_category_id')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="mt-1 btn btn-warning btn-block">Edit</button>
                        <a href="{{ route('question.index') }}" class="mt-1 btn btn-danger btn-block">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
