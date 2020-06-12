@extends('frontend.template.master')

@section('title', 'Keranjang Belanja')

@section('content')

<div class="container mb-4">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="{{ url('/') }}" class="stext-109 cl8 hov-cl1 trans-04">
            Beranda
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>
        <span class="stext-109 cl4">
            Keranjang Belanja
        </span>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
            <div class="m-l-25 m-r--38 m-lr-0-xl">
                <div class="wrap-table-shopping-cart">
                    <table class="table-shopping-cart">
                        <tr class="table_head">
                            <th class="text-center">Item</th>
                            <th class="text-center"></th>
                            <th class="text-center">Harga</th>
                            <th class="text-center">Jumlah</th>
                            <th class="text-center">Total</th>
                            <th class="text-center"></th>
                        </tr>
                        @foreach($orderdetails as $orderdetail)
                        <tr class="table_row">
                            <td class="text-center">
                                <img alt="Product Photo" class="rounded" width="80" src="{{ asset('upload/productphoto/' . $orderdetail->item->productphoto) }}">
                            </td>
                            <td class="text-center">{{ $orderdetail->item->name }}</td>
                            <td class="text-center">{{ 'Rp ' . number_format($orderdetail->item->price) . ', -' }}</td>
                            <td class="text-center">{{ $orderdetail->quantity }}</td>
                            <td class="text-center">{{ 'Rp ' . number_format($orderdetail->totalprice) . ', -' }}</td>
                            <td class="text-center">
                                <form method="POST" action="{{ route('souvenir.destroy', $orderdetail->id) }}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-dark"><i class="fa fa-trash"> </i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
            <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                <h4 class="mtext-109 cl2 p-b-30">
                    Checkout
                </h4>
                <div class="flex-w flex-t bor12 p-b-13">
                    <div class="size-208">
                        <span class="stext-110 cl2">
                            Berat Pesanan
                        </span>
                    </div>
                    <div class="size-209">
                        <span class="mtext-110 cl2">
                            {{ ' : ' . $order->totalweight }} gr
                        </span>
                    </div>
                </div>
                <div class="flex-w flex-t bor12 p-t-13 p-b-13">
                    <div class="size-208">
                        <span class="stext-110 cl2">
                            Harga Pesanan
                        </span>
                    </div>
                    <div class="size-209">
                        <span class="mtext-110 cl2">
                            {{ ' : Rp ' . number_format($order->totalprice) . ', -' }}
                        </span>
                    </div>
                </div>
                <form method="POST" action="{{ route('souvenir.checkout') }}">
                    @csrf
                    <div class="flex-w flex-t bor12 p-t-15 p-b-30">
                        <div class="size-208 w-full-ssm">
                            <span class="stext-110 cl2">
                                Pengiriman
                            </span>
                        </div>
                        <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                            <div class="p-t-30">
                                <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
                                    <select name="province_destination" class="js-select2">
                                        <option value="">Pilih Provinsi Tujuan</option>
                                        @foreach($provinces as $province => $value)
                                        <option value="{{ $province }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                                @error('province_destination')
                                <div class="text-danger stext-109">
                                    {{ $message }}
                                </div>
                                @enderror
                                <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
                                    <select name="city_destination" class="js-select2">
                                        <option value="">Pilih Kabupaten/Kota Tujuan</option>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                                @error('city_destination')
                                <div class="text-danger stext-109">
                                    {{ $message }}
                                </div>
                                @enderror
                                <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
                                    <select name="courier" class="js-select2">
                                        <option value="">Pilih Jasa Pengiriman</option>
                                        @foreach($couriers as $courier => $value)
                                        <option value="{{ $courier }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                                @error('courier')
                                <div class="text-danger stext-109">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer mt-5">
                        Checkout
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('select[name="province_destination"]').on('change', function() {
            let provinceId = $(this).val();
            if (provinceId) {
                jQuery.ajax({
                    url: '/province/' + provinceId + '/cities'
                    , type: "GET"
                    , dataType: "json"
                    , success: function(data) {
                        $('select[name="city_destination"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="city_destination"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                , });
            } else {
                $('select[name="city_destination"]').empty();
            }
        });
    });

</script>
@endsection
