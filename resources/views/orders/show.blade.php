@extends('layouts.app')

     @section('content')
         <div class="container mx-auto p-4">
             <h1 class="text-2xl font-bold mb-4">Order #{{ $order->id }}</h1>
             <p><strong>Customer:</strong> {{ $order->customer->name }}</p>
             <p><strong>Total:</strong> {{ $order->total }}</p>
             <p><strong>Status:</strong> {{ $order->status }}</p>
             <h2 class="text-xl font-bold mt-4">Products</h2>
             <table class="w-full mt-4 border">
                 <thead>
                     <tr>
                         <th class="border px-4 py-2">Product</th>
                         <th class="border px-4 py-2">Quantity</th>
                         <th class="border px-4 py-2">Price</th>
                     </tr>
                 </thead>
                 <tbody>
                     @foreach ($order->products as $product)
                         <tr>
                             <td class="border px-4 py-2">{{ $product->name }}</td>
                             <td class="border px-4 py-2">{{ $product->pivot->quantity }}</td>
                             <td class="border px-4 py-2">{{ $product->pivot->price }}</td>
                         </tr>
                     @endforeach
                 </tbody>
             </table>
             <a href="{{ route('orders.index') }}" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded">Back to Orders</a>
         </div>
     @endsection