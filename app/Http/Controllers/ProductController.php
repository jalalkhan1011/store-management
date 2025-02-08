<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();

        return view('admin.merchant.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $stores = Store::where('tenant_id', auth()->user()->id)->pluck('store_name', 'id');
        $categories = Category::where('tenant_id', auth()->user()->id)->pluck('category_name', 'id');

        return view('admin.merchant.product.create', compact('stores', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'store_id' => 'required',
            'category_id' => 'required',
        ]);

        $data = [
            'product_name' => $request->product_name,
            'store_id' => $request->store_id,
            'category_id' => $request->category_id,
            'tenant_id' => auth()->user()->id
        ];

        Product::create($data);

        return redirect(route('productList'))->with('success', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
