<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::all();
        return view('products.coupons', compact('coupons'));
    }

    public function create()
    {
        return view('products.coupons-create'); // Corrija para 'products.coupons-create' se a view existir, ou crie a view
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|string|max:255',
            'discount' => 'required|numeric',
        ]);

        Coupon::create($request->all());
        return redirect()->route('coupons.index')->with('success', 'Coupon created successfully.');
    }

    public function show(Coupon $coupon)
    {
        return view('products.coupons-show', compact('coupon'));
    }

    public function edit(Coupon $coupon)
    {
        return view('products.coupons-edit', compact('coupon'));
    }

    public function update(Request $request, Coupon $coupon)
    {
        $request->validate([
            'code' => 'required|string|max:255',
            'discount' => 'required|numeric',
        ]);

        $coupon->update($request->all());
        return redirect()->route('coupons.index')->with('success', 'Coupon updated successfully.');
    }

    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return redirect()->route('coupons.index')->with('success', 'Coupon deleted successfully.');
    }
}