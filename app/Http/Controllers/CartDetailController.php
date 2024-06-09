<?php

namespace App\Http\Controllers;

use App\Models\CartDetail;
use App\Models\Produk;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartDetailController extends Controller
{
    public function index(Request $request)
    {
        return abort('404');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'produk_id' => 'required',
        ]);

        $itemuser = $request->user();
        $itemproduk = Produk::findOrFail($request->produk_id);

        $cart = Cart::where('user_id', $itemuser->id)
                    ->where('status_cart', 'cart')
                    ->first();

        if (!$cart) {
            $no_invoice = Cart::where('user_id', $itemuser->id)->count();
            $inputancart = [
                'user_id' => $itemuser->id,
                'no_invoice' => 'INV '.str_pad(($no_invoice + 1),'3', '0', STR_PAD_LEFT),
                'status_cart' => 'cart',
                'status_pembayaran' => 'belum',
                'status_pengiriman' => 'belum',
            ];
            $cart = Cart::create($inputancart);
        }

        $cekdetail = CartDetail::where('cart_id', $cart->id)
                                ->where('produk_id', $itemproduk->id)
                                ->first();

        $qty = 1;
        $harga = $itemproduk->harga;
        $diskon = $itemproduk->promo != null ? $itemproduk->promo->diskon_nominal : 0;
        $subtotal = ($qty * $harga) - $diskon;

        if ($cekdetail) {
            $cekdetail->updatedetail($cekdetail, $qty, $harga, $diskon);
            $cekdetail->cart->updatetotal($cekdetail->cart, $subtotal);
        } else {
            $inputan = $request->all();
            $inputan['cart_id'] = $cart->id;
            $inputan['produk_id'] = $itemproduk->id;
            $inputan['qty'] = $qty;
            $inputan['harga'] = $harga;
            $inputan['diskon'] = $diskon;
            $inputan['subtotal'] = ($harga * $qty) - $diskon;
            $itemdetail = CartDetail::create($inputan);
            $itemdetail->cart->updatetotal($itemdetail->cart, $subtotal);
        }

        return redirect()->route('cart.index')->with('success', 'Product successfully added to cart');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
{
    $detail = CartDetail::findOrFail($id);

    if ($request->param == 'kurang') {
        $detail->qty -= 1;
    } elseif ($request->param == 'tambah') {
        $detail->qty += 1;
    }

    if ($detail->qty <= 0) {
        $subtotal = 0;
        $detail->delete();
    } else {
        $subtotal = $detail->qty * $detail->harga - $detail->diskon;
        $detail->subtotal = $subtotal;
        $detail->save();
    }

    // Update cart totals
    $cart = $detail->cart;
    $cart->subtotal = $cart->details->sum('subtotal');
    $cart->diskon = $cart->details->sum('diskon');
    $cart->total = $cart->subtotal - $cart->diskon;
    $cart->save();

    return response()->json([
        'success' => true,
        'qty' => $detail->qty,
        'subtotal' => $subtotal,
        'cartSubtotal' => $cart->subtotal,
        'cartDiskon' => $cart->diskon,
        'cartTotal' => $cart->total
    ]);
}

    

    public function destroy($id)
    {
        $itemdetail = CartDetail::findOrFail($id);
        $itemdetail->cart->updatetotal($itemdetail->cart, '-'.$itemdetail->subtotal);
        if ($itemdetail->delete()) {
            return back()->with('success', 'Item deleted successfully');
        } else {
            return back()->with('error', 'Item failed to delete');
        }
    }
}
