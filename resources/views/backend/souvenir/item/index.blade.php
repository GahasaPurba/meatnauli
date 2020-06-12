@extends('backend.template.master')

@section('title', 'Souvenir (Item List)')

@section('content')

<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-cart icon-gradient bg-warm-flame">
                    </i>
                </div>
                <div>Item List
                    <div class="page-title-subheading">Berikut Daftar Item Cinderamata Yang Ada Di Website MeatNauli
                    </div>
                </div>
            </div>
            <div class="page-title-actions">
                @if(Auth::user()->role == 'Administrator')
                <div class="d-inline-block dropdown">
                    <a href="{{ route('itempdf') }}" class="btn btn-sm btn-danger">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-file-pdf fa-w-20"></i>
                        </span>
                    </a>
                </div>
                &nbsp;
                <div class="d-inline-block dropdown">
                    <a href="{{ route('itemexcel') }}" class="btn btn-sm btn-success">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-file-excel fa-w-20"></i>
                        </span>
                    </a>
                </div>
                &nbsp;
                @endif
                <div class="d-inline-block dropdown">
                    <a href="{{ route('item.create') }}" class="btn btn-sm btn-primary">
                        <span class="btn-icon-wrapper pr-2 opacity-7">
                            <i class="fa fa-plus fa-w-20"></i>
                        </span>
                        Add Item
                    </a>
                </div>
                @if(Auth::user()->role == 'Administrator')
                &nbsp;
                <div class="d-inline-block dropdown">
                    <form method="GET" action="{{ route('itemsearch') }}">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="search" id="search" class="form-control form-control-sm" placeholder="Search Name" value="{{ old('search') }}">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Item List
                </div>
                <div class="table-responsive">
                    <table class="mb-0 table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Price (Rp)</th>
                                <th class="text-center">Stock</th>
                                <th class="text-center">Weight (gr)</th>
                                <th class="text-center">Category</th>
                                <th class="text-center">Seller</th>
                                <th class="text-center">Item Photo</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item => $result)
                            <tr>
                                <td class="text-center"><b>{{ $item + $items->firstitem() }}</b></td>
                                <td>{{ $result->name }}</td>
                                <td class="text-center">{{ $result->price }}</td>
                                <td class="text-center">{{ $result->stock }}</td>
                                <td class="text-center">{{ $result->weight }}</td>
                                <td>{{ $result->souvenir_category->name }}</td>
                                <td>{{ $result->user->name }}</td>
                                <td class="text-center">
                                    <img alt="Product Photo" class="img-responsive img-fluid rounded" width="100" src="{{ asset('upload/productphoto/' . $result->productphoto) }}">
                                </td>
                                <td class="text-center">
                                    <form method="POST" action="{{ route('item.destroy', $result->id) }}">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('item.edit', $result->id) }}" class="mr-2 btn-icon btn-icon-only btn btn-outline-warning text-warning"><i class="pe-7s-pen btn-icon-wrapper"> </i></a>
                                        <button type="submit" class="mr-2 btn-icon btn-icon-only btn btn-outline-danger"><i class="pe-7s-trash btn-icon-wrapper"> </i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $items->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
