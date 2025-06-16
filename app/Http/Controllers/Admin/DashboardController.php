<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $productsCount = Product::count();
        $ordersCount = Order::where('status', 'completed')->count();
        $customersCount = User::where('role', 'customer')->count();

        return view('admin.dashboard', compact(
            'productsCount',
            'ordersCount',
            'customersCount'
        ));
    }
}