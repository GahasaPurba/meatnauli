@extends('backend.template.master')

@section('title', 'Souvenir (Checkout Detail)')

@section('content')

<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-cash icon-gradient bg-warm-flame">
                    </i>
                </div>
                <div>Checkout Detail
                    <div class="page-title-subheading">Berikut Detail Order
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Checkout Detail
                </div>
                <div class="table-responsive">
                    <table class="mb-0 table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">Item</th>
                                <th class="text-center">Penjual</th>
                                <th class="text-center">Harga</th>
                                <th class="text-center">Jumlah</th>
                                <th class="text-center">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orderdetails as $orderdetail)
                            <tr>
                                <td>{{ $orderdetail->item->name }}</td>
                                <td>{{ $orderdetail->item->user->name }}</td>
                                <td class="text-center">{{ 'Rp ' . number_format($orderdetail->item->price) . ', -' }}</td>
                                <td class="text-center">{{ $orderdetail->quantity }}</td>
                                <td class="text-center">{{ 'Rp ' . number_format($orderdetail->totalprice) . ', -' }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-8 mt-5">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title mb-5">Informasi Order</h5>
                    <div class="position-relative form-group">
                        <label for="name">Nama Pembeli</label>
                        <input type="text" id="name" class="form-control" value="{{ $order->user->name }}" readonly>
                    </div>
                    <div class="position-relative form-group">
                        <label for="email">Email Pembeli</label>
                        <input type="text" id="email" class="form-control" value="{{ $order->user->email }}" readonly>
                    </div>
                    <div class="position-relative form-group">
                        <label for="telephone">No Telephone Pembeli</label>
                        <input type="text" id="telephone" class="form-control" value="{{ $order->user->telephone }}" readonly>
                    </div>
                    <div class="position-relative form-group">
                        <label for="kurir">Jasa Pengiriman</label>
                        <input type="text" id="kurir" class="form-control" value="{{ $order->kurir }}" readonly>
                    </div>
                    <div class="position-relative form-group">
                        <label for="etd">Estimasi Waktu Pengiriman (Hari)</label>
                        <input type="text" id="etd" class="form-control" value="{{ $order->etd }}" readonly>
                    </div>
                    <div class="position-relative form-group">
                        <label for="totalweight">Berat Pesanan</label>
                        <input type="text" id="totalweight" class="form-control" value="{{ $order->totalweight }} gr" readonly>
                    </div>
                    <div class="position-relative form-group">
                        <label for="itemprice">Harga Pesanan</label>
                        <input type="text" id="itemprice" class="form-control" value="Rp {{ number_format($order->totalprice - $order->ongkir) }}, -" readonly>
                    </div>
                    <div class="position-relative form-group">
                        <label for="ongkir">Ongkos Kirim</label>
                        <input type="text" id="ongkir" class="form-control" value="Rp {{ number_format($order->ongkir) }}, -" readonly>
                    </div>
                    <div class="position-relative form-group">
                        <label for="code">Kode Unik</label>
                        <input type="text" id="code" class="form-control" value="Rp {{ number_format($order->code) }}, -" readonly>
                    </div>
                    <div class="position-relative form-group">
                        <label for="totalprice">Total Pembayaran</label>
                        <input type="text" id="totalprice" class="form-control" value="Rp {{ number_format($order->totalprice + $order->code) }}, -" readonly>
                    </div>
                    <div class="position-relative form-group">
                        <label for="province_destination">Provinsi Tujuan</label>
                        <input type="text" id="province_destination" class="form-control" value="{{ $order->province_destination }}" readonly>
                    </div>
                    <div class="position-relative form-group">
                        <label for="city_destination">Kabupaten/Kota Tujuan</label>
                        <input type="text" id="city_destination" class="form-control" value="{{ $order->city_destination }}" readonly>
                    </div>
                    <div class="position-relative form-group">
                        <label for="address">Alamat Pengiriman</label>
                        <textarea id="address" class="form-control" style="min-height:150px" readonly>{{ $order->address }}</textarea>
                    </div>
                    <div class="position-relative form-group">
                        <label for="buktipembayaran">Bukti Pembayaran</label>
                        <br>
                        <a href="{{ asset('upload/buktipembayaran/' . $order->buktipembayaran) }}" target="_blank">{{ $order->buktipembayaran }}</a>
                    </div>
                    <div class="position-relative form-group">
                        <label for="status">Status</label>
                        <input type="text" id="status" class="form-control @if($order->status == 1) text-danger @elseif($order->status == 2) text-warning @elseif($order->status == 3) text-success @endif" value="@if($order->status == 1) Belum Dibayar @elseif($order->status == 2) Menunggu Konfirmasi @elseif($order->status == 3) Dikonfirmasi @endif" readonly>
                    </div>
                    @if($order->status == 2)
                    <form method="POST" action="{{ route('paymentconfirm', $order->id) }}">
                        @csrf
                        @method('patch')
                        <button type="submit" class="mt-1 btn btn-success btn-block">
                            Konfirmasi
                        </button>
                    </form>
                    @endif
                    <a href="{{ route('payment2') }}" class="mt-1 btn btn-info btn-block">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
