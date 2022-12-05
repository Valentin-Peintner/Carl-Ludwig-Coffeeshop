<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoldArticle extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'order_id',
        'article',
        'price',
        'qty'
    ];

     /**
    * Relation to Order model
    * 
    * @return
    */

    public function order(){
        return $this->belongsTo(Order::class,'order_id','id');
    }
}
