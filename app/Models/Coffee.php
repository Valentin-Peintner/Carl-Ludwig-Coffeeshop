<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coffee extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'description',
        'roast',
        'image',
        'price',
        'quantity',
        'pieces_available'
    ];

     /**
     * Relation to Order Model
     * 
     * @return
     */
    public function orders(){
        return $this->hasMany(Order::class,'coffee_id','id');
    }
}
