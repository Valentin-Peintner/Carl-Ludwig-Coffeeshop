<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    protected $table = 'equipments';
    
    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
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
