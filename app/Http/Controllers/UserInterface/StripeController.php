<?php

namespace App\Http\Controllers\UserInterface;

use App\Http\Controllers\Controller;
use App\Mail\Invoice;
use App\Models\Adress;
use App\Models\Order;
use App\Models\SoldArticle;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\Stripe;


class StripeController extends Controller
{
    /**
     * User & Adresse werden der view Payment zur Verfügung gestellt
     * 
     */
    public function adress(){

        $user = Auth::user();
        $adresses = Adress::find($user);

        return view('shop.payment',compact('user','adresses'));
    }

    /** 
     * Warenkorb wird nochmal angezeigt
     *  [user] eingeloggter User
     *  [cart] Produkte im Warenkorb
     *  [cartPrice] Gesamtsumme vom Warenkorb
     *  method createSetupIntent => Zahlungsmehtode für Bezahlung einrichten
     * @return  view
     */
    public function index(){

        $user = auth()->user();
        $cart = Session::get('cart');
        $cartPrice = $cart->calcTotalPrice();

        if($cartPrice >= 65) {
            $cartPrice = $cart->calcTotalPrice();
        }
        else{
            $cartPrice = $cart->calcTotalPrice() + 4.90;
        }
        
        // dd($cartPrice, $cart);
        return view('shop.payment-method',compact('cartPrice','cart'), [
            'intent' => $user->createSetupIntent()
        ]);   
    }

    /**
     * Bezahlungsvorgang
     *
     * @param   Request  $request stripeToken erstellt einen single-use Token für KreditKarten Details
     *  [customer] erstellt einen Stripe Customer
     *  Charge [amount] Betrag der abgebucht wird
     *  Charge [customer] Sripe Customer ID
     * 
     * @return  
     */
    public function createCharge(Request $request)
    { 
        $user = Auth::user();
        $cart = Session::get('cart');
        
        $cartPrice = $cart->calcTotalPrice();
        
        if($cartPrice >= 65) {
            $cartPrice = $cart->calcTotalPrice();
        }
        else{
            $cartPrice = $cart->calcTotalPrice() + 4.90;
        }

        /////////////////////
        // Stripe Payment //
        ////////////////////

        Stripe::setApiKey(env('STRIPE_SECRET'));

        // User estellen
        $customer = Customer::create(array(
            'name' => $user->firstname,
            'email' => $user->email,
            'payment_method' => 'pm_card_visa',
        ));

        // stripeToken
        Customer::createSource(
            $customer->id,
            ['source' => $request->stripeToken]
        );
        
        // Bezahlung 
        Charge::create ([
                "amount" => $cartPrice * 100,
                "currency" => "EUR",
                "description" => 'Danke',
                "customer" => $customer->id              
        ]);

        return redirect()->route('stripe.success')->with('success', 'Zahlung erfolgreich!');
        }
 

    /**
     * Wenn Zahlungseingang erfolgreich war, wird Bestellung der Orders Tabelle hinzugefügt
     * Zeitgleich wird über die order_id in der Tabelle sold_articles die bestellen Produkte angezeigt
     *
     * [cart] Produkte im Warenkorb werden über die Session weitergegeben
     * [order] Bestellung wird erstellt und in DB Tabelle order hinzugefügt
     *         [tracking_number][status] werden zufällig generiert, da es keine Verbindung zu Lieferdienst gibt
     *         [sale_date] ist akutelles Datum der Bestellung
     * [sold_articles] Zeigt die bestelleten Artikel aus der Orders Tabelle an
     * Mail => Bestellbestätigung senden
     * @return  view 
     */
    public function success(Request $request){

        $user = Auth::user();
        $cart = Session::get('cart');

        // Variante 1
        if(isset($cart->items["coffee"])) {
            $coffees = $cart->items['coffee'];  
        } else {
            $coffees = [];
        }

        // Variante 2
        $equipment = $cart->items['equipment'] ?? [];

        foreach($coffees as $key => $value) {
            $coffee_id = $key;
        }
 
        foreach($equipment as $key => $value) {
            $equipment_id = $key;
        }

        $order = Order::create([
            'user_id' => auth()->user()->id,
            'coffee_id' => $coffee_id ?? NULL,
            'equipment_id' => $equipment_id ?? NULL,
            'price' => $cart->calcTotalPrice(),
            'tracking_number' => random_int(1000,8000),
            'sale_date' => date('Y-m-d H:i:s', time()),
            'status' => rand(1,4),
        ]);   

        // Die Produkte werden der sold_articles Tabelle hinzugefügt, sobald Bestellung erstellt wurde
        foreach ($cart->items as $type_key => $type ){
            foreach ($type as $key => $item){

                $soldArticles = SoldArticle::create([
                    'order_id' => $order->id,
                    'article' => $item['item']['name'],
                    'price' => $item['item']['price'],
                    'qty' => $item['qty']
                ]);   
            }
        }
        
        // Bestellbestätigung Email senden - Infos was in Email stehen
        $name = $user->firstname;
        $totalPrice = $cart->calcTotalPrice();
      
        // LeftJoin
        $articles = SoldArticle::select('sold_articles.order_id','sold_articles.article','sold_articles.price','sold_articles.qty','orders.created_at','orders.user_id')
                            ->leftJoin('orders', 'order_id','=','orders.id')        
                            ->get();
        
        // Hier wird letzte Bestellung aufgerufen
        $lastOrder = $articles->last();
    
        // Email wird an eingeloggten User mit definierten Variablen gesendet
        Mail::to($user->email)->send(new Invoice($name,$totalPrice,$articles,$lastOrder));

        // Warenkorb zurücksetzen
        session()->forget('cart');
  
        return view('shop.payment-success');
    }
}


