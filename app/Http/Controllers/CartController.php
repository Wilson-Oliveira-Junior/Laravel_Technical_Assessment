<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function add(Request $request, Product $product)
    {
        $cart = session()->get('cart', []);
        $id = $product->id;
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += 1;
        } else {
            $cart[$id] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
            ];
        }
        session(['cart' => $cart]);
        return redirect()->back()->with('success', 'Produto adicionado ao carrinho!');
    }

    public function index()
    {
        return view('products.cart');
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);
        unset($cart[$id]);
        session(['cart' => $cart]);
        return redirect()->route('cart.index')->with('success', 'Produto removido do carrinho!');
    }

    public function checkout(Request $request)
    {
        // Aqui você pode implementar a lógica de finalização do pedido
        session()->forget('cart');
        return redirect()->route('cart.index')->with('success', 'Pedido finalizado com sucesso!');
    }

    public function applyCoupon(Request $request)
    {
        $code = $request->input('coupon');
        $cart = session('cart', []);
        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }
        $coupon = \App\Models\Coupon::where('code', $code)->first();
        if ($coupon) {
            $now = now();
            if (
                (!$coupon->valid_until || $now->lte($coupon->valid_until)) &&
                (!$coupon->min_value || $subtotal >= $coupon->min_value)
            ) {
                session(['coupon' => [
                    'code' => $coupon->code,
                    'value' => $coupon->discount ?? $coupon->value
                ]]);
                return redirect()->route('cart.index')->with('success', 'Cupom aplicado!');
            } else {
                return redirect()->route('cart.index')->with('coupon_error', 'Cupom expirado ou não atende o valor mínimo.');
            }
        }
        return redirect()->route('cart.index')->with('coupon_error', 'Cupom inválido ou expirado.');
    }
}
