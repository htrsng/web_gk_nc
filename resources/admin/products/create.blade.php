@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Thêm sản phẩm</h3>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary float-right">Quay lại</a>
    </div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Lỗi!</strong> Vui lòng kiểm tra lại các trường nhập:<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">Tên sản phẩm</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label for="price">Giá bán</label>
                <input type="number" name="price" class="form-control" value="{{ old('price') }}" required min="0" step="0.01">
            </div>

            <div class="form-group">
                <label for="original_price">Giá gốc</label>
                <input type="number" name="original_price" class="form-control" value="{{ old('original_price') }}" min="0" step="0.01">
            </div>

            <div class="form-group">
                <label for="discount">Giảm giá (%)</label>
                <input type="number" name="discount" class="form-control" value="{{ old('discount') }}" min="0" max="100">
            </div>

            <div class="form-group">
                <label for="category_id">Danh mục</label>
                <select name="category_id" class="form-control" required>
                    <option value="">-- Chọn danh mục --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="stock">Tồn kho</label>
                <input type="number" name="stock" class="form-control" value="{{ old('stock') }}" required min="0">
            </div>

            <div class="form-group">
                <label for="image">Hình ảnh</label>
                <input type="file" name="image" class="form-control-file">
            </div>

            <button type="submit" class="btn btn-success">Thêm sản phẩm</button>
        </form>
    </div>
</div>
@endsection
