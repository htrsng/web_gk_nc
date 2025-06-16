<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(12); // Hiển thị 12 sản phẩm mỗi trang
        return view('products.index', compact('products'));
    }
}