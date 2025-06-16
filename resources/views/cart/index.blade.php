@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-4xl font-bold mb-4">Giỏ hàng</h1>
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    @if(count($cart) > 0)
        <ul>
            @foreach($cart as $item)
                <li>{{ $item['name'] }} - {{ number_format($item['price'], 2) }} VND x {{ $item['quantity'] }}</li>
            @endforeach
        </ul>
    @else
        <p>Giỏ hàng trống.</p>
    @endif
</div>
@endsection