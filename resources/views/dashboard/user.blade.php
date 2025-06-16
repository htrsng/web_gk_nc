@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-4xl font-bold mb-4">User Dashboard</h1>
    <p class="mb-6">Chào mừng {{ auth()->user()->name ?? 'người dùng' }} đến với bảng điều khiển!</p>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="border p-4 rounded shadow">
            <h2 class="text-xl font-semibold">Đơn hàng của bạn</h2>
            <p class="text-2xl">{{ \App\Models\Order::where('user_id', auth()->id())->count() }}</p>
        </div>
        <div class="border p-4 rounded shadow">
            <h2 class="text-xl font-semibold">Sản phẩm yêu thích</h2>
            <p class="text-2xl">0</p> <!-- Cần thêm logic nếu có bảng favorite -->
        </div>
    </div>
</div>
@endsection