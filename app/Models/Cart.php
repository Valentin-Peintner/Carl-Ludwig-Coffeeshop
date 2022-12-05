<?php

namespace App\Models;

class Cart
{
    public $items = null;
    public $totalPrice = 0;

    /**
     * Konstruktor 
     */
    public function __construct($oldCart){
        if($oldCart){
            $this->items = $oldCart->items;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    /**
     * Preiskalkulation Warenkorb
     *
     * @return  Summe
     */
    public function calcTotalPrice(){
        
        $sum = 0;
        
        foreach($this->items as $category_items){     
            foreach($category_items as $item){
                     
            $sum += ($item['item_price'] * $item['qty']);
            }
        }
        return $sum;
    }


    /**
     * Artikel zu Warenkorb hinzufügen
     * 
     * [type]  $type  Coffee oder Equipment
     * 
     */
    public function add($item, $id, int $amount, $type){
        $storedItem = [
            'qty' => $amount,
            'item_price' => $item->price,
            'item' => $item,
            'type' => $type
        ];
       
        if($this->items && isset($this->items[$type])) {
            if(array_key_exists($id, $this->items[$type])) {
                $this->items[$type][$id]['qty'] += $storedItem['qty'];

            } else {
                $this->items[$type][$id] = $storedItem;
            }
        } 
        else {
            $this->items[$type][$id] = $storedItem;
        }   
    }

    /**
     * Artikel aus dem Warenkorb entfernen
     *
     * @param   [type]  $type  Coffee oder Equipment
     * @param   [id]  $id    Artikel id 
     *
     */
    public function delete($type, $id){

        if(isset($this->items[$type][$id])) {
            $this->items[$type][$id]['qty'] -= 1;
           
            if($this->items[$type][$id]['qty'] <= 0) {            
                unset($this->items[$type][$id]);
            }       
        }   
    }
}