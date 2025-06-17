@extends('layouts.app')

  @section('title', 'Chi tiết Đơn hàng')

  @section('content')
      <h1 class="text-2xl font-bold mb-4">Chi tiết Đơn hàng</h1>
      <p><strong>ID:</strong> {{ $order->id }}</p>
      <p><strong>Người dùng:</strong> {{ $order->user->name }}</p>
      <p><strong>Tổng tiền:</strong> {{ number_format($order->total) }} VNĐ</p>
      <p><strong>Trạng thái:</strong> {{ $order->status }}</p>
      <a href="{{ route('orders.index') }}" class="bg-blue-500 text-white p-2 rounded mt-4 inline-block">Quay lại</a>
  @endsection