@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4">Orders</h2>
    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-2 mb-4">{{ session('success') }}</div>
    @endif
    @if (Auth::user()->role === 'admin')
        <a href="{{ route('orders.create') }}" class="bg-blue-500 text-white p-2 rounded">Create Order</a>
    @endif
    <table class="min-w-full bg-white border mt-4">
        <thead>
            <tr>
                <th class="border p-2">ID</th>
                <th class="border p-2">Product</th>
                <th class="border p-2">Quantity</th>
                <th class="border p-2">Total</th>
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
                    <td class="border p-2">{{ $order->total }}</td>
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
</div>
@endsection