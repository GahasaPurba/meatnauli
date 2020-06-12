@extends('backend.template.master')

@section('title', 'Souvenir (Item Trash)')

@section('content')

<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-cart icon-gradient bg-warm-flame">
                    </i>
                </div>
                <div>Item Trash
                    <div class="page-title-subheading">Berikut Daftar Item Cinderamata Yang Telah Dihapus Dari Website MeatNauli
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Item Trash
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
                                    <form method="POST" action="{{ route('item.kill', $result->id) }}">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('item.restore', $result->id) }}" class="mr-2 btn-icon btn-icon-only btn btn-outline-info text-info"><i class="pe-7s-refresh-2 btn-icon-wrapper"> </i></a>
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
