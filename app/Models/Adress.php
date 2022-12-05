<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adress extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'street',
        'number',
        'city',
        'zip',
        'country_id',
        'user_id',
        'is_delivery_adress'
    ];

    /**
     * Relation to User Model
     * 
     * @return
     */
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

     /**
     * Relation to Country Model
     * 
     * @return
     */
    public function country(){
        return $this->belongsTo(Country::class,'country_id','id');
    }
}
