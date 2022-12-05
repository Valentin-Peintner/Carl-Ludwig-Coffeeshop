<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    public $timestamps = false;
    
    protected $fillable = [
        'user_id',
        'coffee_id',
        'equipment_id',
        'price',
        'tracking_number',
        'sale_date',
        'status'
    ];

    /**
    * Relation to user model
    * 
    * @return
    */
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

     /**
    * Relation to coffee model
    * 
    * @return
    */
    public function coffee(){
        return $this->belongsTo(Coffee::class,'coffee_id','id');
    }

     /**
    * Relation to Equipment model
    * 
    * @return
    */
    public function equipment(){
        return $this->belongsTo(Equipment::class,'equipment_id','id');
    }

     /**
    * Relation to SoldArticle model
    * 
    * @return
    */
    public function soldArticles(){
        return $this->hasMany(SoldArticle::class,'sold_articles_id','id');
    }
}
