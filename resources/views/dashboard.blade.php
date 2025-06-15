@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h2 class="text-xl font-bold mb-4">Dashboard</h2>
                <p>You're logged in!</p>
                @if (Auth::user()->role === 'admin')
                    <a href="{{ route('orders.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Create New Order</a>
                @endif
                <h3 class="text-lg font-semibold mt-4">Your Orders</h3>
                @if (isset($orders) && $orders->isNotEmpty())
                    <table class="min-w-full bg-white border">
                        <thead>
                            <tr>
                                <th class="border p-2">ID</th>
                                <th class="border p-2">Product</th>
                                <th class="border p-2">Quantity</th>
                                <th class="border p-2">Status</th>
                                <th class="border p-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td class="border p-2">{{ $order->id }}</td>
                                    <td class="border p-2">{{ $order->product->name }}</td>
                                    <td class="border p-2">{{ $order->quantity }}</td>
                                    <td class="border p-2">{{ $order->status }}</td>
                                    <td class="border p-2">
                                        <a href="{{ route('orders.show', $order) }}" class="text-blue-500">View</a>
                                        @if (Auth::user()->role === 'admin')
                                            <a href="{{ route('orders.edit', $order) }}" class="text-blue-500 ml-2">Edit</a>
                                            <form action="{{ route('orders.destroy', $order) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 ml-2">Delete</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>No orders found.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection