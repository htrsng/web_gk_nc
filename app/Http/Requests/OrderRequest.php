<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;  // <-- thêm dòng này

class OrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();   // dùng Auth facade thay vì helper
    }

    public function rules(): array
    {
        return [
            'customer_id' => 'required|exists:customers,id',
            'products' => 'required|array',
            'products.*' => 'exists:products,id',
            'quantities' => 'required|array',
            'quantities.*' => 'integer|min:1',
            'total' => 'required|numeric|min:0',
            'status' => 'required|in:pending,processing,shipped,delivered',
        ];
    }
}
