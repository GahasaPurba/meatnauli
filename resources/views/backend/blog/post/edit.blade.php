@extends('backend.template.master')

@section('title', 'Blog (Edit Postingan)')

@section('content')

@if (Auth::check() && Auth::user()->role == 'Administrator' || Auth::user()->role == 'Author')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-pen icon-gradient bg-warm-flame">
                    </i>
                </div>
                <div>Edit Postingan
                    <div class="page-title-subheading">Silahkan Edit Postingan
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-6">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title mb-5">Edit Postingan</h5>
                    @if (Auth::check() && Auth::user()->name == $posts->user->name && Auth::user()->role == 'Author')
                    <form method="POST" action="{{ route('post.update', $posts->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="position-relative form-group">
                            <label for="title">Judul</label>
                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Judul Postingan" value="{{ $posts->title }}" autofocus>
                            @error('title')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="position-relative form-group">
                            <label for="category_id">Kategori</label>
                            <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                <option value="">Kategori Postingan</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" @if($posts->category_id == $category->id) selected @endif>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="position-relative form-group">
                            <label for="tag_id">Tag</label>
                            <small class="form-text text-muted">
                                Tekan Tombol CTRL Jika Ingin Memilih Lebih Dari Satu Tag Postingan
                            </small>
                            <select name="tag_id[]" id="tag_id" class="form-control @error('tag_id') is-invalid @enderror" multiple>
                                @foreach($tags as $tag)
                                <option value="{{ $tag->id }}" @foreach($posts->tag as $value) @if($tag->id == $value->id) selected @endif @endforeach>{{ $tag->name }}</option>
                                @endforeach
                            </select>
                            @error('tag_id')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="position-relative form-group">
                            <label for="content">Konten</label>
                            <small class="form-text text-muted">
                                Konten Postingan
                            </small>
                            <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" style="height:500px">{{ $posts->content }}</textarea>
                            @error('content')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="position-relative form-group">
                            <img name="output" id="output" alt="Thumbnail" class="img-fluid rounded" width="200" src="{{ asset('upload/thumbnail/' . $posts->thumbnail) }}">
                        </div>
                        <div class="position-relative form-group">
                            <label for="thumbnail">Thumbnail</label>
                            <input type="text" onfocus="this.type='file'" onchange="loadFile(event)" accept="image/*" name="thumbnail" id="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror" placeholder="Edit Thumbnail Postingan">
                            @error('thumbnail')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="mt-1 btn btn-warning btn-block">Edit</button>
                        <a href="{{ route('post.index') }}" class="mt-1 btn btn-danger btn-block">Batal</a>
                    </form>
                    @elseif (Auth::check() && Auth::user()->role == 'Administrator')
                    <form method="POST" action="{{ route('post.update', $posts->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="position-relative form-group">
                            <label for="title">Judul</label>
                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Judul Postingan" value="{{ $posts->title }}" autofocus>
                            @error('title')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="position-relative form-group">
                            <label for="category_id">Kategori</label>
                            <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                <option value="">Kategori Postingan</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" @if($posts->category_id == $category->id) selected @endif>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="position-relative form-group">
                            <label for="tag_id">Tag</label>
                            <small class="form-text text-muted">
                                Tekan Tombol CTRL Jika Ingin Memilih Lebih Dari Satu Tag Postingan
                            </small>
                            <select name="tag_id[]" id="tag_id" class="form-control @error('tag_id') is-invalid @enderror" multiple>
                                @foreach($tags as $tag)
                                <option value="{{ $tag->id }}" @foreach($posts->tag as $value) @if($tag->id == $value->id) selected @endif @endforeach>{{ $tag->name }}</option>
                                @endforeach
                            </select>
                            @error('tag_id')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="position-relative form-group">
                            <label for="content">Konten</label>
                            <small class="form-text text-muted">
                                Konten Postingan
                            </small>
                            <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" style="height:500px">{{ $posts->content }}</textarea>
                            @error('content')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="position-relative form-group">
                            <img name="output" id="output" alt="Thumbnail" class="img-fluid rounded" width="200" src="{{ asset('upload/thumbnail/' . $posts->thumbnail) }}">
                        </div>
                        <div class="position-relative form-group">
                            <label for="thumbnail">Thumbnail</label>
                            <input type="text" onfocus="this.type='file'" onchange="loadFile(event)" accept="image/*" name="thumbnail" id="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror" placeholder="Edit Thumbnail Postingan">
                            @error('thumbnail')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="mt-1 btn btn-warning btn-block">Edit</button>
                        <a href="{{ route('post.index') }}" class="mt-1 btn btn-danger btn-block">Batal</a>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@endsection

@section('script')

<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
<script>
    CKEDITOR.replace('content');
</script>

@endsection
