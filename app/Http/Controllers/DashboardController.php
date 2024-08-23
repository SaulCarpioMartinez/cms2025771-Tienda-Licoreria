<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSales = Order::sum('total');
        $newCustomers = User::where('created_at', '>=', now()->subMonth())->count();
        $totalProductsSold = Order::with('products')->get()->flatMap(function($order) {
            return $order->products;
        })->count();
        $topProducts = Product::withCount('orders')->orderBy('orders_count', 'desc')->take(5)->get();

        if (auth()->user()->hasRole('admin')) {
            return view('dashboard', [
                'totalSales' => $totalSales,
                'newCustomers' => $newCustomers,
                'totalProductsSold' => $totalProductsSold,
                'topProducts' => $topProducts,
            ]);
        } else {
            return view('client');
        }
    }
}
