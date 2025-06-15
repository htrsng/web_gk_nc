@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4">Order Details</h2>
    <p>ID: {{ $order->id }}</p>
    <p>Product: {{ $order->product->name }}</p>
    <p>Quantity: {{ $order->quantity }}</p>
    <p>Total: ${{ $order->total }}</p>
    <p>Status: {{ $order->status }}</p>
    <a href="{{ route('orders.index') }}" class="bg-blue-500 text-white p-2 rounded mt-4 inline-block">Back</a>
</div>
@endsection