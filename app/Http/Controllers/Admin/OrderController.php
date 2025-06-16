<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        // Lấy đơn hàng cùng người dùng và các sản phẩm trong từng item
        $orders = Order::with(['user', 'items'])->latest()->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        // Load chi tiết user và sản phẩm từng item
        $order->load(['user', 'items.product']);
        return view('admin.orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        $statuses = Order::STATUSES;
        return view('admin.orders.edit', compact('order', 'statuses'));
    }

    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status' => 'required|in:' . implode(',', array_keys(Order::STATUSES))
        ]);

        $order->update($validated);

        return redirect()->route('admin.orders.index')
            ->with('success', 'Cập nhật trạng thái thành công');
    }
}
