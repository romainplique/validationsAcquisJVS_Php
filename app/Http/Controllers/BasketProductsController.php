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
        // On récupère les paramètres de la requête
        $idNewProduit = $request->input('idProduct');
        $quantityNewProduit = $request->input('quantity');
        // On regarde si on a déjà le produit dans le panier
        $productInBasket = BasketProducts::where('idProduct', $idNewProduit)->first();
        // Si c'est le cas alors on incrémente sa quantité
        if($productInBasket){            
            return BasketProducts::where('idProduct', $idNewProduit)
            ->first()->update(['quantity' => $productInBasket->quantity + $quantityNewProduit]);
        }else{
            // Sinon on crée l'enregistrement avec la quantité reçue
            return BasketProducts::create($idNewProduit, $quantityNewProduit);
        }
    }

    public function removeProductFromBasket($idProduct){
        // On récupère le produit dans le panier
        $productInBasket = BasketProducts::where('idProduct', $idProduct)->first();
        // S'il a une quantité égale à 1 alors on le supprime
        if($productInBasket->quantity == 1){
            return BasketProducts::where('idProduct', $idProduct)
            ->first()->delete();
        }else{
            // Sinon on décrémente la quantité
            return BasketProducts::where('idProduct', $idProduct)
            ->first()->update(['quantity' => $productInBasket->quantity-1]);  
        }
    }
}
