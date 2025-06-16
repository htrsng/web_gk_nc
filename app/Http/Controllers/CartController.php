<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use App\Events\ProductAddedToCart;


class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function add(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            $cart[$productId] = [
                "name" => $product->name,
                "price" => $product->price,
                "quantity" => 1
            ];
        }

        session()->put('cart', $cart);

        // Nếu bạn có Event, mới cần gọi
        Event::dispatch(new ProductAddedToCart($productId, $cart[$productId]['quantity']));

        return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ!');
    }
}
