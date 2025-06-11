<?php

     namespace App\Http\Controllers;

     use App\Http\Requests\OrderRequest;
     use App\Models\Customer;
     use App\Models\Order;
     use App\Models\Product;
     use Illuminate\Http\Request;

     class OrderController extends Controller
     {
         public function index()
         {
             $orders = Order::with(['customer', 'products'])->get();
             return view('orders.index', compact('orders'));
         }

         public function create()
         {
             $customers = Customer::all();
             $products = Product::all();
             return view('orders.create', compact('customers', 'products'));
         }

         public function store(OrderRequest $request)
         {
             $order = Order::create($request->only('customer_id', 'total', 'status'));
             $order->products()->attach($this->prepareOrderProducts($request));
             return redirect()->route('orders.index')->with('success', 'Order created successfully.');
         }

         public function show(Order $order)
         {
             $order->load(['customer', 'products']);
             return view('orders.show', compact('order'));
         }

         public function edit(Order $order)
         {
             $customers = Customer::all();
             $products = Product::all();
             return view('orders.edit', compact('order', 'customers', 'products'));
         }

         public function update(OrderRequest $request, Order $order)
         {
             $order->update($request->only('customer_id', 'total', 'status'));
             $order->products()->sync($this->prepareOrderProducts($request));
             return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
         }

         public function destroy(Order $order)
         {
             $order->delete();
             return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
         }

         private function prepareOrderProducts(Request $request)
         {
             $products = [];
             foreach ($request->products as $index => $productId) {
                 $products[$productId] = [
                     'quantity' => $request->quantities[$index],
                     'price' => Product::find($productId)->price,
                 ];
             }
             return $products;
         }
     }