<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Coffee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CoffeeSingleMController extends Controller
{
    
    /**
    * Kaffee Produkte einzeln anzeigen
    *
    * @param [products] - auf Coffee Model zugreifen und Daten aus DB auslesen
    *        [id] - auf bestimmten Artikel zugreifen und Inhalte ausgeben 
    *
    * @return view
    */

    public function show($id){

        $product = Coffee::where('id', $id)->first();
        return view('shop.coffee-single-m',compact('product'));
    }

    /**
    * Kaffee Produkte den Warenkorb hinzufügen
    *
    * @param   Request  $request angebene Parameter vom Formular
    * @param   Coffee $product Daten aus der DB holen
    *  
    * @param   Session [oldCart] Es wird überprüft ob eine bereits eine Session existiert
    * [cart] über $cart werden Produkte dem Warenkorb hinzugefügt
    * @return  view 
    */
    
    public function addToCart(Request $request,$id){
        
        $product = Coffee::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;

        $amount = intval($request->get('amount'));
        $cart = new Cart($oldCart);
        $cart->add($product,$product->id,$amount, 'coffee');

    
        if($product->piece_available != 0){      
            $request->session()->put('cart', $cart);

            return redirect()->route('coffee.show', ['id' => $product->id])->with('message', 'Artikel wurde hinzugefügt');
        }
        
        else{
            // Falls Artikel Menge in DB 0 ist 
            return redirect()->route('coffee.show', ['id' => $product->id])->with('message', 'Artikel ist derzeit nicht verfügbar'); 
        }
    }
}