@extends('backend.template.master')

@section('title', 'Cinderamata (List Checkout)')

@section('content')

@if (Auth::check() && Auth::user()->role == 'Administrator')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-cash icon-gradient bg-warm-flame">
                    </i>
                </div>
                <div>List Checkout
                    <div class="page-title-subheading">Berikut Daftar Order Yang Telah Di Checkout Di Website MeatNauli
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    List Checkout
                </div>
                <div class="table-responsive">
                    <table class="mb-0 table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Pembeli</th>
                                <th class="text-center">Tanggal Checkout</th>
                                <th class="text-center">Total Pembayaran</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order => $result)
                            <tr>
                                <td class="text-center"><b>{{ $order + $orders->firstitem() }}</b></td>
                                <td>{{ $result->user->name }}</td>
                                <td class="text-center">{{ $result->orderdate }}</td>
                                <td class="text-center">{{ 'Rp ' . number_format($result->totalprice + $result->code) . ', -' }}</td>
                                @if($result->status == 1)
                                <td class="text-center text-danger">
                                    <b>Belum Dibayar</b>
                                </td>
                                @elseif($result->status == 2)
                                <td class="text-center text-warning">
                                    <b>Menunggu Konfirmasi</b>
                                </td>
                                @elseif($result->status == 3)
                                <td class="text-center text-success">
                                    <b>Terkonfirmasi</b>
                                </td>
                                @endif
                                <td class="text-center">
                                    <form method="POST" action="{{ route('payment.destroy', $result->id) }}">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('paymentdetail2', $result->id) }}" class="mr-2 btn-icon btn-icon-only btn btn-outline-info text-info"><i class="pe-7s-info btn-icon-wrapper"> </i></a>
                                        <button type="submit" class="mr-2 btn-icon btn-icon-only btn btn-outline-danger"><i class="pe-7s-trash btn-icon-wrapper"> </i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@endsection
