<?php

namespace App\Http\Controllers;

use App\City;
use App\Courier;
use App\SouvenirCategory;
use App\Item;
use App\Order;
use App\OrderDetail;
use App\Province;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Kavist\RajaOngkir\Facades\RajaOngkir;
use RealRashid\SweetAlert\Facades\Alert;

class SouvenirController extends Controller
{
    public function souvenir(Item $items)
    {
        $items = Item::orderBy('created_at', 'desc')->paginate(12);
        $categories = SouvenirCategory::all();
        return view('frontend.souvenir.index', compact('items', 'categories'));
    }

    public function singlesouvenir(Item $items, $slug)
    {
        $data = Item::where('slug', $slug)->get();
        $categories = SouvenirCategory::all();
        return view('frontend.souvenir.single', compact('data', 'categories'));
    }

    public function category(SouvenirCategory $category)
    {
        $items = $category->item()->paginate(12);
        $categories = SouvenirCategory::all();
        return view('frontend.souvenir.index', compact('items', 'categories'));
    }

    public function search(Request $request)
    {
        $items = Item::where('name', $request->search)->orWhere('name', 'like', '%' . $request->search . '%')->paginate(12);
        $categories = SouvenirCategory::all();
        return view('frontend.souvenir.index', compact('items', 'categories'));
    }

    public function order(Request $request, $id)
    {
        $item = Item::where('id', $id)->first();

        $rules = [
            'quantity' => 'required',
            'quantity' => 'numeric|min:1'
        ];

        $messages = [
            'quantity.required' => 'Pesanan Tidak Boleh Kosong',
            'quantity.min' => 'Harus Memesan Minimal 1 Buah',
        ];

        $request->validate($rules, $messages);

        if ($request->quantity > $item->stock) {
            return redirect('/souvenir')->with('warning', 'Pesanan Melebihi Jumlah Stok Yang Ada !');
        }

        $ordercheck = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();

        if (empty($ordercheck)) {
            Order::create([
                'user_id' => Auth::user()->id,
                'status' => 0,
                'totalprice' => 0,
                'totalweight' => 0,
            ]);
        }

        $order = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();

        $orderdetailcheck = OrderDetail::where('item_id', $item->id)->where('order_id', $order->id)->first();

        if (empty($orderdetailcheck)) {
            OrderDetail::create([
                'item_id' => $item->id,
                'order_id' => $order->id,
                'quantity' => $request->quantity,
                'totalprice' => $item->price * $request->quantity,
                'totalweight' => $item->weight * $request->quantity,
            ]);
        } else {
            $orderdetail = OrderDetail::where('item_id', $item->id)->where('order_id', $order->id)->first();

            $orderdetail->quantity = $orderdetail->quantity + $request->quantity;

            $newprice = $item->price * $request->quantity;
            $orderdetail->totalprice = $orderdetail->totalprice + $newprice;

            $newweight = $item->weight * $request->quantity;
            $orderdetail->totalweight = $orderdetail->totalweight + $newweight;

            $orderdetail->update();
        }

        $pesanan = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesanan->totalprice = $pesanan->totalprice + $item->price * $request->quantity;
        $pesanan->totalweight = $pesanan->totalweight + $item->weight * $request->quantity;
        $pesanan->update();

        return redirect('/souvenir')->with('success', 'Pesanan Berhasil Ditambah Ke Keranjang Belanja !');
    }

    public function shoppingcart()
    {
        $order = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $orderdetails = OrderDetail::where('order_id', $order->id)->get();
        $couriers = Courier::pluck('name', 'courier_code');
        $provinces = Province::pluck('name', 'province_id');
        return view('frontend.souvenir.shoppingcart', compact('order', 'orderdetails', 'couriers', 'provinces'));
    }

    public function getcities($id)
    {
        $city = City::where('province_id', $id)->pluck('name', 'city_id');
        return json_encode($city);
    }

    public function destroy($id)
    {
        $orderdetail = OrderDetail::where('id', $id)->first();

        $order = Order::where('id', $orderdetail->order_id)->first();
        $order->totalprice = $order->totalprice - $orderdetail->totalprice;
        $order->totalweight = $order->totalweight - $orderdetail->totalweight;
        $order->update();

        $orderdetail->delete();

        return redirect('/souvenir')->with('success', 'Pesanan Berhasil Dihapus !');
    }

    public function checkout(Request $request)
    {
        $order = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $order_id = $order->id;

        $weight = $order->totalweight;

        $city = City::where('id', 501)->first();
        $city_origin = $city->city_id;

        $rules = [
            'province_destination' => 'required',
            'city_destination' => 'required',
            'courier' => 'required',
        ];

        $messages = [
            'province_destination.required' => 'Pilih Salah Satu Provinsi Destinasi',
            'city_destination.required' => 'Pilih Salah Satu Kabupaten/Kota Destinasi',
            'courier.required' => 'Pilih Salah Satu Jasa Pengiriman',
        ];

        $request->validate($rules, $messages);

        $user = User::where('id', Auth::user()->id)->first();

        if (empty($user->telephone)) {
            $users = User::findorfail($user->id);
            Alert::warning('Lengkapi Profil', 'Sebelum Checkout, Lengkapi Profil Diri Anda Terlebih Dahulu !');
            return view('backend.profile.edit', compact('users'));
        }

        $cost = RajaOngkir::ongkosKirim([
            'origin' => $city_origin,
            'destination' => $request->city_destination,
            'weight' => $weight,
            'courier' => $request->courier,
        ])->get();

        $ongkir = $cost[0]['costs'][0]['cost'][0]['value'];
        $kurir = $cost[0]['name'];
        $etd = $cost[0]['costs'][0]['cost'][0]['etd'];

        $province = Province::where('province_id', $request->province_destination)->first();
        $city = City::where('city_id', $request->city_destination)->first();

        $province_destination = $province->name;
        $city_destination = $city->name;

        $orderdate = Carbon::now();
        $code = mt_rand(100, 999);

        $order->orderdate = $orderdate;
        $order->status = 1;
        $order->code = $code;
        $order->totalprice = $order->totalprice + $ongkir;
        $order->ongkir = $ongkir;
        $order->kurir = $kurir;
        $order->etd = $etd;
        $order->province_destination = $province_destination;
        $order->city_destination = $city_destination;
        $order->update();

        $orderdetail = OrderDetail::where('order_id', $order_id)->get();
        foreach ($orderdetail as $order_detail) {
            $item = Item::where('id', $order_detail->item_id)->first();
            $item->stock = $item->stock - $order_detail->quantity;
            $item->update();
        }

        return redirect('/payment')->with('success', 'Pesanan Berhasil Di Checkout Lihat Detail dan Perhatikan Tata Cara Pembayaran !');
    }
}
