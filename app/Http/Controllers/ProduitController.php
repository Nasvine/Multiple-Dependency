<?php

namespace App\Http\Controllers;

use App\Models\Price;
use App\Models\Produit;

class ProduitController extends Controller
{
    public function addProduits(){
        $produits = Produit::all();
         return view('produit.add_produits', compact('produits'));
    }
    public function getPrices($id){

        //$html = '';
        $prices = Price::where('produit_id', $id)->get();

        return response()->json($prices);


       /*  foreach($countries as $country){
            $html.= '<option value="'.$country->id.'">'.$country->country_name.'</option>';
        }
        return response()->json($html); */
    }
}
