<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Auth::user()->role === 'admin' ? Order::all() : Order::where('user_id', Auth::id())->get();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $products = \App\Models\Product::all();
        return view('orders.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'total' => 'required|numeric',
        ]);

        Order::create([
            'user_id' => Auth::id(),
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'total' => $request->total,
            'status' => 'pending',
        ]);

        return redirect()->route('orders.index')->with('success', 'Order created successfully.');
    }

    public function show(Order $order)
    {
        if (Auth::user()->role !== 'admin' && $order->user_id !== Auth::id()) {
            abort(403);
        }
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }
        $products = \App\Models\Product::all();
        return view('orders.edit', compact('order', 'products'));
    }

    public function update(Request $request, Order $order)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }
        $request->validate([
            'status' => 'required|in:pending,completed,canceled',
        ]);
        $order->update($request->only('status'));
        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    }

    public function destroy(Order $order)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
}