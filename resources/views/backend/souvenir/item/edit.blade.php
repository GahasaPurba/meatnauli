@extends('backend.template.master')

@section('title', 'Souvenir (Edit Item)')

@section('content')

<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-cart icon-gradient bg-warm-flame">
                    </i>
                </div>
                <div>Edit Item
                    <div class="page-title-subheading">Silahkan Edit Item
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-6">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title mb-5">Edit Item</h5>
                    <form method="POST" action="{{ route('item.update', $items->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="position-relative form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Item" value="{{ $items->name }}" autofocus>
                            @error('name')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="position-relative form-group">
                            <label for="price">Price</label>
                            <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" placeholder="Harga Item" value="{{ $items->price }}" autofocus>
                            @error('price')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="position-relative form-group">
                            <label for="stock">Stock</label>
                            <input type="number" name="stock" id="stock" class="form-control @error('stock') is-invalid @enderror" placeholder="Stok Item" value="{{ $items->stock }}" autofocus>
                            @error('stock')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="position-relative form-group">
                            <label for="weight">weight</label>
                            <input type="number" name="weight" id="weight" class="form-control @error('weight') is-invalid @enderror" placeholder="Berat Item (Satuan Gram)" value="{{ $items->weight }}" autofocus>
                            @error('weight')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="position-relative form-group">
                            <label for="souvenir_category_id">Category</label>
                            <select name="souvenir_category_id" id="souvenir_category_id" class="form-control @error('souvenir_category_id') is-invalid @enderror">
                                <option value="">Kategori Item</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" @if($items->souvenir_category_id == $category->id) selected @endif>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('souvenir_category_id')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="position-relative form-group">
                            <label for="description">Description</label>
                            <small class="form-text text-muted">
                                Deskripsi Item
                            </small>
                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ $items->description }}</textarea>
                            @error('description')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="position-relative form-group">
                            <img name="output" id="output" alt="Product Photo" class="img-fluid rounded" width="200" src="{{ asset('upload/productphoto/' . $items->productphoto) }}">
                        </div>
                        <div class="position-relative form-group">
                            <label for="productphoto">Item Photo</label>
                            <input type="text" onfocus="this.type='file'" onchange="loadFile(event)" accept="image/*" name="productphoto" id="productphoto" class="form-control @error('productphoto') is-invalid @enderror" placeholder="Edit Photo Item">
                            @error('productphoto')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="mt-1 btn btn-warning btn-block">Edit</button>
                        <a href="{{ route('item.index') }}" class="mt-1 btn btn-danger btn-block">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')

<script>
    CKEDITOR.replace('description');

</script>
<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    };

</script>

@endsection
