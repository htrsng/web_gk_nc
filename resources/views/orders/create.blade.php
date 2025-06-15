@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4">Create Order</h2>
    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block">Product</label>
            <select name="product_id" class="border p-2 w-full">
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }} - ${{ $product->price }}</option>
                @endforeach
            </select>
            @error('product_id') <p class="text-red-500">{{ $message }}</p> @endif
        </div>
        <div class="mb-4">
            <label class="block">Quantity</label>
            <input type="number" name="quantity" class="border p-2 w-full" value="{{ old('quantity') }}" min="1">
            @error('quantity') <p class="text-red-500">{{ $message }}</p> @endif
        </div>
        <div class="mb-4">
            <label class="block">Total</label>
            <input type="number" step="0.01" name="total" class="border p-2 w-full" value="{{ old('total') }}" required>
            @error('total') <p class="text-red-500">{{ $message }}</p> @endif
        </div>
        <button type="submit" class="bg-blue-500 text-white p-2 rounded">Submit</button>
    </form>
</div>
@endsection