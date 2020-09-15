<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){}

    /// ******************************** CREATE, READ, UPDATE, DELETE ********************************
    public function allProducts()
    {
        return Product::paginate(15);
    }

    public function getProduct($idProduct)
    {
        return Product::findOrFail($idProduct);
    }

    public function createProduct(Request $request)
    {
        $body = $request->all();
        $newProduct = Product::create($body);
        return response()->json($newProduct, 201);
    }

    public function updateProduct($idProduct, Request $request)
    {
        $product = Product::findOrFail($idProduct);
        $product->fill($request->all());
        return $product->update();
    }

    public function deleteProduct($idProduct)
    {
        return Product::findOrFail($idProduct)->delete();
    }
}
