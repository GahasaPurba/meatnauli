<?php

namespace App\Http\Controllers;

use App\Item;
use App\Mail\PaymentConfirmation;
use App\Order;
use App\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function payment()
    {
        $orders = Order::where('user_id', Auth::user()->id)->where('status', '!=', 0)->orderBy('created_at', 'desc')->paginate(5);
        return view('frontend.souvenir.payment.index', compact('orders'));
    }

    public function paymentdetail($id)
    {
        $order = Order::where('id', $id)->first();
        $orderdetails = OrderDetail::where('order_id', $order->id)->get();
        return view('frontend.souvenir.payment.detail', compact('order', 'orderdetails'));
    }

    public function payment2()
    {
        $orders = Order::where('status', '!=', 0)->orderBy('created_at', 'desc')->paginate(5);
        return view('backend.souvenir.payment.index', compact('orders'));
    }

    public function paymentdetail2($id)
    {
        $order = Order::where('id', $id)->first();
        $orderdetails = OrderDetail::where('order_id', $order->id)->get();
        return view('backend.souvenir.payment.detail', compact('order', 'orderdetails'));
    }

    public function destroy($id)
    {
        $orders = Order::findorfail($id);
        $order_id = $orders->id;

        $orderdetail = OrderDetail::where('order_id', $order_id)->get();
        foreach ($orderdetail as $order_detail) {
            $item = Item::where('id', $order_detail->item_id)->first();
            $item->stock = $item->stock + $order_detail->quantity;
            $item->update();
        }

        $orders->delete();

        return redirect('/payment2')->with('success', 'Order Berhasil Dihapus !');
    }

    public function paymentupload(Request $request)
    {
        $rules = [
            'address' => 'required',
            'buktipembayaran' => 'required|image',
        ];

        $messages = [
            'address.required' => 'Alamat Pengiriman Tidak Boleh Kosong',
            'buktipembayaran.required' => 'Bukti Pembayaran Tidak Boleh Kosong',
            'buktipembayaran.image' => 'Bukti Pembayaran Harus Berformat Image (JPEG, JPG, PNG, BMP, GIF, SVG, Atau WEBP)',
        ];

        $request->validate($rules, $messages);

        $buktipembayaran = $request->buktipembayaran;
        $new_buktipembayaran = time() . $buktipembayaran->getClientOriginalName();
        $buktipembayaran->move('upload/buktipembayaran/', $new_buktipembayaran);

        $order = Order::findorfail($request->order_id);

        $order->address = $request->address;
        $order->buktipembayaran = $new_buktipembayaran;
        $order->status = 2;
        $order->update();

        return redirect('/payment')->with('success', 'Pembayaran Berhasil, Silahkan Menunggu Konfirmasi !');
    }

    public function paymentconfirm($id)
    {
        $order = Order::findorfail($id);

        $order->status = 3;
        $order->update();

        \Mail::to($order->user->email)->send(new PaymentConfirmation);

        return redirect('/payment2')->with('success', 'Pembayaran Berhasil Dikonfirmasi !');
    }
}
