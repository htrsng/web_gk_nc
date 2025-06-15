<?php

   namespace App\Http\Requests;

   use Illuminate\Foundation\Http\FormRequest;

   class OrderRequest extends FormRequest
   {
       public function authorize(): bool
       {
              return $this->user() && $this->user()->hasRole('admin');
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