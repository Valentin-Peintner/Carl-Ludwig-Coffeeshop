<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, Billable;

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [ 
        'gender',
        'firstname',
        'lastname',
        'email',
        'street',
        'number',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Update User Information on Stripe account
     *
     */
    protected static function booted(){
 
        // static::updated(function($customer){
        //     if($customer != null){
        //     $customer->syncStripeCustomerDetails();
        //     }
        // });
    
    }

    /**
      * Relation to Adress model
      *
      * @return object
      */
     public function adresses(){
         return $this->hasMany(Adress::class, 'user_id','id');
     }


    /**
     * Relation to Order model
     *
     * @return  object
     */
    public function orders(){
        return $this->hasMany(Order::class,'user_id','id');
    }

   
}
