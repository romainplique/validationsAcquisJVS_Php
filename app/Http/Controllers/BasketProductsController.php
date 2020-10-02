<?php

namespace App\Http\Controllers;

use App\Models\BasketProducts;
use Illuminate\Http\Request;

class BasketProductsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){}

    /// ******************************** GET *********************************************************
    public function allBasketProducts()
    {
        return BasketProducts::all();
    }

    /// ******************************** ADD, REMOVE *************************************************
    public function addProductToBasket(Request $request){
        // On crée l'enregistrement avec la quantité reçue
        $body = $request->all();
        return BasketProducts::create($body, 201);
    }

    public function removeProductFromBasket($idBasketProduct){
        // On essaye de récupérer la ligne dans le panier
        $basketProduct = BasketProducts::findOrFail($idBasketProduct);
        $basketProduct->delete();        
        return response()->json($basketProduct, 200);
    }

    /// ******************************** UPDATE ******************************************************
    public function updateProductQuantity($idBasketProduct, Request $request){
        $basketProduct = BasketProducts::findOrFail($idBasketProduct);
        $basketProduct->fill($request->all());
        $basketProduct->update();
        return response()->json($basketProduct, 200);
    }

}
