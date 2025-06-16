@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Chi tiết đơn hàng #{{ $order->id }}</h3>
    </div>
    <div class="card-body">
        <div class="row mb-4">
            <div class="col-md-6">
                <h4>Thông tin khách hàng</h4>
                <p><strong>Tên:</strong> {{ $order->user->name }}</p>
                <p><strong>Email:</strong> {{ $order->user->email }}</p>
            </div>
            <div class="col-md-6">
                <h4>Thông tin đơn hàng</h4>
                <p><strong>Ngày đặt:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
                <p><strong>Trạng thái:</strong> {{ $order->status }}</p>
                <p><strong>Địa chỉ giao hàng:</strong> {{ $order->shipping_address }}</p>
            </div>
        </div>

        <h4>Danh sách sản phẩm</h4>
        <table class="table">
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->items as $item)
                <tr>
                    <td>
                        <img src="{{ $item->product->image }}" width="50" class="mr-2">
                        {{ $item->product->name }}
                    </td>
                    <td>{{ number_format($item->price) }}đ</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format($item->price * $item->quantity) }}đ</td>
                </tr>
                @endforeach
                <tr class="font-weight-bold">
                    <td colspan="3" class="text-right">Tổng cộng:</td>
                    <td>{{ number_format($order->total) }}đ</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        <a href="{{ route('admin.orders.index') }}" class="btn btn-default">Quay lại</a>
    </div>
</div>
@endsection