@extends('frontend.template.master')

@section('title', 'Daftar Transaksi')

@section('content')

<div class="container mb-4">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="{{ url('/') }}" class="stext-109 cl8 hov-cl1 trans-04">
            Beranda
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>
        <span class="stext-109 cl4">
            Daftar Transaksi
        </span>
    </div>
</div>
<div class="container">
    <p class="stext-111 cl2 text-center mb-5 text-danger">
        <b>Perlu Diketahui, Transaksi Yang Menunda Pembayaran Selama Terhitung 7 Hari Setelah Checkout, Akan Dianggap Batal dan Dihapus Oleh Admin.</b>
    </p>
    <div class="row justify-content-center">
        @foreach($orders as $order)
        <div class="col-lg-10 col-xl-10 m-b-50">
            <div class="m-l-25 m-r--38 m-lr-0-xl">
                <p class="stext-101 mb-3">
                    Tanggal Checkout : <strong>{{ $order->orderdate }}</strong>
                </p>
                <div class="wrap-table-shopping-cart">
                    <table class="table-shopping-cart">
                        <tr class="table_head">
                            <th class="text-center">Total Pembayaran</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Detail</th>
                        </tr>
                        <tr class="table_row">
                            <td class="text-center"><b>{{ 'Rp ' . number_format($order->totalprice + $order->code) . ', -' }}</b></td>
                            <td class="text-center">
                                @if($order->status == 1)
                                <p class="text-danger">
                                    <b>Belum Dibayar</b>
                                </p>
                                @elseif($order->status == 2)
                                <p class="text-warning">
                                    <b>Menunggu Konfirmasi</b>
                                </p>
                                @elseif($order->status == 3)
                                <p class="text-success">
                                    <b>Terkonfirmasi</b>
                                </p>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('paymentdetail', $order->id) }}" class="btn cl0 bg1 hov-btn1"><i class="fa fa-info"></i></a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row justify-content-center">
        <div class="mb-5">
            {{ $orders->links() }}
        </div>
    </div>
</div>

@endsection
