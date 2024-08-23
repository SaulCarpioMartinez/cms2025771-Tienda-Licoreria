<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function create()
    {
        $products = Product::all();
        return view('sales.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'money_given' => 'required|numeric|min:0',
        ]);

        $product = Product::find($request->product_id);
        $total = $product->price * $request->quantity;
        $change = $request->money_given - $total;

        // Save the order
        $order = Order::create([
            'user_id' => auth()->id(),
            'total' => $total,
        ]);

        // Save the order products
        $order->products()->attach($request->product_id, ['quantity' => $request->quantity]);

        // Return the view with data to display the receipt
        return view('sales.receipt')->with([
            'product' => $product,
            'quantity' => $request->quantity,
            'total' => $total,
            'change' => $change,
        ]);
    }
}