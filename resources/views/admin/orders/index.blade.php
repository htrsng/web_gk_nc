@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-4xl font-bold mb-4">Quản lý Đơn hàng</h1>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border">
            <thead>
                <tr>
                    <th class="border p-2">ID</th>
                    <th class="border p-2">Khách hàng</th>
                    <th class="border p-2">Tổng tiền</th>
                    <th class="border p-2">Trạng thái</th>
                    <th class="border p-2">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach(\App\Models\Order::all() as $order)
                    <tr>
                        <td class="border p-2">{{ $order->id }}</td>
                        <td class="border p-2">{{ $order->customer->name ?? 'N/A' }}</td>
                        <td class="border p-2">{{ number_format($order->total, 2) }} VND</td>
                        <td class="border p-2">{{ $order->status }}</td>
                        <td class="border p-2">
                            <a href="{{ route('admin.orders.show', $order->id) }}" class="text-blue-500">Xem</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection