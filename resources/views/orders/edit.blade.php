@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4">Edit Order</h2>
    <form action="{{ route('orders.update', $order) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block">Status</label>
            <select name="status" class="border p-2 w-full">
                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                <option value="canceled" {{ $order->status == 'canceled' ? 'selected' : '' }}>Canceled</option>
            </select>
            @error('status') <p class="text-red-500">{{ $message }}</p> @endif
        </div>
        <button type="submit" class="bg-blue-500 text-white p-2 rounded">Update</button>
    </form>
</div>
@endsection