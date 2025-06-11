@extends('layouts.app')

     @section('content')
         <div class="container mx-auto p-4">
             <h1 class="text-2xl font-bold mb-4">Edit Order #{{ $order->id }}</h1>
             <form action="{{ route('orders.update', $order) }}" method="POST">
                 @csrf
                 @method('PUT')
                 <div class="mb-4">
                     <label for="customer_id" class="block">Customer</label>
                     <select name="customer_id" id="customer_id" class="border p-2 w-full">
                         @foreach ($customers as $customer)
                             <option value="{{ $customer->id }}" {{ $order->customer_id == $customer->id ? 'selected' : '' }}>{{ $customer->name }}</option>
                         @endforeach
                     </select>
                     @error('customer_id') <span class="text-red-500">{{ $message }}</span> @enderror
                 </div>
                 <div class="mb-4">
                     <label for="products" class="block">Products</label>
                     @foreach ($products as $product)
                         <div>
                             <input type="checkbox" name="products[]" value="{{ $product->id }}" {{ $order->products->contains($product->id) ? 'checked' : '' }}>
                             <label>{{ $product->name }} ({{ $product->price }})</label>
                             <input type="number" name="quantities[]" min="1" placeholder="Quantity" value="{{ $order->products->find($product->id) ? $order->products->find($product->id)->pivot->quantity : '' }}">
                         </div>
                     @endforeach
                     @error('products') <span class="text-red-500">{{ $message }}</span> @enderror
                 </div>
                 <div class="mb-4">
                     <label for="total" class="block">Total</label>
                     <input type="number" name="total" id="total" step="0.01" class="border p-2 w-full" value="{{ $order->total }}">
                     @error('total') <span class="text-red-500">{{ $message }}</span> @enderror
                 </div>
                 <div class="mb-4">
                     <label for="status" class="block">Status</label>
                     <select name="status" id="status" class="border p-2 w-full">
                         <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                         <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                         <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                         <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                     </select>
                     @error('status') <span class="text-red-500">{{ $message }}</span> @enderror
                 </div>
                 <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
             </form>
         </div>
     @endsection