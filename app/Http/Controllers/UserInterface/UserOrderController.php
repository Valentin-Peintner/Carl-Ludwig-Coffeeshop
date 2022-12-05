<?php

namespace App\Http\Controllers\UserInterface;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\SoldArticle;
use Illuminate\Support\Facades\Auth;

class UserOrderController extends Controller
{

    /**
     * [orders] Über Order Model werden Bestellungen die mit Auth User übereinstimmen ausgelesen
     * [articles] Über SoldArticle Model werden Daten ausgelesen und über order_id mit einem LeftJoin wird die passende order_id rausgefiltert
     * 
     * @return  view
     */
    public function index(){
        
        $orders = Order::where('user_id', '=', Auth::id())->get();
        
        $articles = SoldArticle::select('sold_articles.order_id','sold_articles.article','sold_articles.price','sold_articles.qty','orders.sale_date','orders.user_id')
                    ->leftJoin('orders', 'order_id','=','orders.id')        
                    ->get();
        
        return view('UserInterface.order',compact('articles'));
    }
}
