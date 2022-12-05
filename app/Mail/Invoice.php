<?php

namespace App\Mail;

use App\Models\Order;
use App\Models\SoldArticle;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class Invoice extends Mailable
{
    use Queueable, SerializesModels;

    public $name;    
    public $totalPrice; 
    public $articles;
    public $lastOrder;
    

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$totalPrice,$articles,$lastOrder)
    {
        $this->name = $name;
        $this->totalPrice = $totalPrice;
        $this->articles = $articles;
        $this->lastOrder = $lastOrder;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {          
     
        return $this->view('mail.invoice',[
            'name' => $this->name,
            'bestellung' => $this->lastOrder,
            'article' => $this->articles,
            'preis' => $this->totalPrice,
        ]);
    }
}
