<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Equipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EquipmentSingleController extends Controller
{
   
    /**
     * Equipment Produkte einzeln anzeigen
     * @param [products] - auf Equipment Model zugreifen und Daten aus DB auslesen
     *        [id] - auf bestimmten Artikel zugreifen und Inhalte ausgeben 
     *
     * @return
     */

    public function show($id){
     
        $product = Equipment::where('id', $id)->first();
        
        return view('shop.equipment-single',compact('product'));
    }

    /**
    * Equipment Produkte den Warenkorb hinzufügen
    *
    * @param   Request  $request angebene Parameter vom Formular
    * @param   Equipment $product Daten aus der DB holen
    *  
    * @param   Session [oldCart] Es wird überprüft ob eine bereits eine Session existiert
    * [cart] über $cart werden Produkte dem Warenkorb hingezufügen
    * @return  view 
    */

    public function addToCart(Request $request, $id){

        $product = Equipment::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;

        $amount = intval($request->get('amount'));
        $cart = new Cart($oldCart);
        $cart->add($product,$product->id,$amount, 'equipment');
        
        if($product->piece_available != 0){
            $request->session()->put('cart', $cart);
            return redirect()->route('equipment.show', ['id' => $product->id])->with('message', 'Artikel wurde hinzugefügt');;
        }
        // Falls Artikel Menge in DB 0 ist 
        else{
            return redirect()->route('equipment.show', ['id' => $product->id])->with('message', 'Artikel ist derzeit nicht verfügbar'); 
        }
    }
}
