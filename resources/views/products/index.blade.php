@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-4xl font-bold mb-4">Sản phẩm</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @foreach($products as $product)
            <div class="border p-4 rounded shadow">
                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-48 object-cover mb-2" onerror="this.src='https://via.placeholder.com/600x600?text=Image+Not+Found'">
                <h3 class="text-xl font-semibold">{{ $product->name }}</h3>
                <p class="text-gray-600">{{ number_format($product->price, 2) }} VND</p>
                @if($product->discount > 0)
                    <p class="text-red-500">Giảm: {{ $product->discount }}%</p>
                @endif
                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="mt-2 w-full bg-pink-100 hover:bg-pink-200 text-pink-700 py-2 rounded transition duration-300">Thêm vào giỏ</button>
                </form>
            </div>
        @endforeach
    </div>
    {{ $products->links() }}
</div>
@endsection