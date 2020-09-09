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
        Product::create($body);
        return response()->json(null, 201);
    }

    public function updateProduct($idProduct, Request $request)
    {
        $user = Product::findOrFail($idProduct);
        $user->fill($request->all());
        return $user->update();
    }

    public function deleteProduct($idProduct)
    {
        return Product::findOrFail($idProduct)->delete();
    }
}
