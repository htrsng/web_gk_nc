@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Đơn hàng #{{ $order->id }}</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <h4>Thông tin khách hàng</h4>
                <p><strong>Tên:</strong> {{ $order->user->name }}</p>
                <p><strong>Email:</strong> {{ $order->user->email }}</p>
            </div>
            <div class="col-md-6">
                <h4>Thông tin đơn hàng</h4>
                <p><strong>Sản phẩm:</strong> {{ $order->product->name }}</p>
                <p><strong>Số lượng:</strong> {{ $order->quantity }}</p>
                <p><strong>Tổng tiền:</strong> {{ number_format($order->total) }}đ</p>
                <p><strong>Trạng thái:</strong> {{ $order->status_text }}</p>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <a href="{{ route('admin.orders.index') }}" class="btn btn-default">Quay lại</a>
    </div>
</div>
@endsection