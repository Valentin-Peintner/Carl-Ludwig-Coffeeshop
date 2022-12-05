<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WarenkorbController extends Controller
{
    /**
    * Anzeigen von Warenkorb view
    *
    * über $cart Session werden ausgewählte Produkte im Warenkorb angezeigt* 
    * @return  
    */

    public function index()
    {
        $cart = Session::get('cart');
        return view('shop.warenkorb',compact('cart'));
    }


    /**
    * Artikel aus Warenkorb löschen
    * @param   Request  $request dient zum löschen & um danach den aktuelle Inhalt anzuzeigen
    * @param   Session  es wird überprüft ob eine Session existiert
    * [cart]   über $cart->delete werden Produkte gelöscht
    *
    * @return  view
    */

    public function destroy(Request $request, $id){

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);

        // Funktion aus Cart Model
        $cart->delete($request->type, $id);
        $request->session()->put('cart', $cart);
       
        // Ajax request
        $status = 200;
        $msg = 'Der Artikel wurde erfolgreich entfernt';
        if(request()->ajax()){
            return response()->json(['status' => $status,'msg'=>$msg],$status);
        }

        // Aufruf HTML
        if($status == 404){
            abort(404);
        }

        // Flash message
        return redirect()->route('cart.index')->with('message',$msg);
    }

}


