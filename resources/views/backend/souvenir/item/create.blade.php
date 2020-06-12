@extends('backend.template.master')

@section('title', 'Souvenir (Add Item)')

@section('content')

<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-cart icon-gradient bg-warm-flame">
                    </i>
                </div>
                <div>Add Item
                    <div class="page-title-subheading">Silahkan Tambah Item Baru Untuk Ditampilkan Sebagai Cinderamata
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-6">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title mb-5">Add Item</h5>
                    <form method="POST" action="{{ route('item.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="position-relative form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Item" value="{{ old('name') }}" autofocus>
                            @error('name')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="position-relative form-group">
                            <label for="price">Price</label>
                            <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" placeholder="Harga Item (Rp)" value="{{ old('price') }}" autofocus>
                            @error('price')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="position-relative form-group">
                            <label for="stock">Stock</label>
                            <input type="number" name="stock" id="stock" class="form-control @error('stock') is-invalid @enderror" placeholder="Stok Item" value="{{ old('stock') }}" autofocus>
                            @error('stock')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="position-relative form-group">
                            <label for="weight">Weight</label>
                            <input type="number" name="weight" id="weight" class="form-control @error('weight') is-invalid @enderror" placeholder="Berat Item (Satuan Gram)" value="{{ old('weight') }}" autofocus>
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
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                            @error('description')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="position-relative form-group">
                            <label for="productphoto">Item Photo</label>
                            <input type="text" onfocus="this.type='file'" name="productphoto" id="productphoto" class="form-control @error('productphoto') is-invalid @enderror" placeholder="Foto Item">
                            @error('productphoto')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="mt-1 btn btn-primary btn-block">Add</button>
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

@endsection
