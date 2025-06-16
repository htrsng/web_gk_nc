@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-4xl font-bold mb-4">Admin Dashboard</h1>
    <p class="mb-6">Chào mừng {{ auth()->user()->name ?? 'Admin' }} đến với bảng điều khiển quản trị!</p>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="border p-4 rounded shadow">
            <h2 class="text-xl font-semibold">Sản phẩm</h2>
            <p class="text-2xl">{{ \App\Models\Product::count() }}</p>
        </div>
        <div class="border p-4 rounded shadow">
            <h2 class="text-xl font-semibold">Đơn hàng</h2>
            <p class="text-2xl">{{ \App\Models\Order::count() }}</p>
        </div>
        <div class="border p-4 rounded shadow">
            <h2 class="text-xl font-semibold">Khách hàng</h2>
            <p class="text-2xl">{{ \App\Models\Customer::count() }}</p>
        </div>
    </div>
    <div class="mt-6">
        <a href="{{ route('admin.products.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded">Quản lý Sản phẩm</a>
        <a href="{{ route('admin.orders.index') }}" class="bg-green-500 hover:bg-green-700 text-white px-4 py-2 rounded ml-2">Quản lý Đơn hàng</a>
        <a href="{{ route('admin.categories.index') }}" class="bg-purple-500 hover:bg-purple-700 text-white px-4 py-2 rounded ml-2">Quản lý Danh mục</a>
    </div>
</div>
@endsection