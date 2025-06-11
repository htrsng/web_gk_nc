@extends('layouts.app')

     @section('content')
         <div class="container mx-auto p-4">
             <h1 class="text-2xl font-bold mb-4">Orders</h1>
             @if (session('success'))
                 <div class="bg-green-100 text-green-800 p-4 mb-4">{{ session('success') }}</div>
             @endif
             <a href="{{ route('orders.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Create Order</a>
             <table class="w-full mt-4 border">
                 <thead>
                     <tr>
                         <th class="border px-4 py-2">ID</th>
                         <th class="border px-4 py-2">Customer</th>
                         <th class="border px-4 py-2">Total</th>
                         <th class="border px-4 py-2">Status</th>
                         <th class="border px-4 py-2">Actions</th>
                     </tr>
                 </thead>
                 <tbody>
                     @foreach ($orders as $order)
                         <tr>
                             <td class="border px-4 py-2">{{ $order->id }}</td>
                             <td class="border px-4 py-2">{{ $order->customer->name }}</td>
                             <td class="border px-4 py-2">{{ $order->total }}</td>
                             <td class="border px-4 py-2">{{ $order->status }}</td>
                             <td class="border px-4 py-2">
                                 <a href="{{ route('orders.show', $order) }}" class="text-blue-500">View</a>
                                 <a href="{{ route('orders.edit', $order) }}" class="text-yellow-500">Edit</a>
                                 <form action="{{ route('orders.destroy', $order) }}" method="POST" class="inline">
                                     @csrf
                                     @method('DELETE')
                                     <button type="submit" class="text-red-500" onclick="return confirm('Are you sure?')">Delete</button>
                                 </form>
                             </td>
                         </tr>
                     @endforeach
                 </tbody>
             </table>
         </div>
     @endsection