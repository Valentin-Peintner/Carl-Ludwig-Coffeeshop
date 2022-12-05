<?php

use App\Http\Controllers\Static\AboutusController;
use App\Http\Controllers\Shop\AgbController;
use App\Http\Controllers\Shop\CoffeeController;
use App\Http\Controllers\Shop\CoffeeSingleMController;
use App\Http\Controllers\Static\ContactController;
use App\Http\Controllers\Static\DatenschutzController;
use App\Http\Controllers\Shop\DatenschutzShopController;
use App\Http\Controllers\Shop\EquipmentController;
use App\Http\Controllers\Shop\EquipmentSingleController;
use App\Http\Controllers\Static\ImpressumController;
use App\Http\Controllers\Shop\ImpressumShopController;
use App\Http\Controllers\UserInterface\ProfileController;
use App\Http\Controllers\Shop\ShopController;
use App\Http\Controllers\Shop\WarenkorbController;
use App\Http\Controllers\Shop\ZahlungInfoController;
use App\Http\Controllers\Userinterface\DashboardController;
use App\Http\Controllers\UserInterface\PasswordController;
use App\Http\Controllers\UserInterface\StripeController;
use App\Http\Controllers\UserInterface\UserAdressController;
use App\Http\Controllers\UserInterface\UserOrderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
    /*
    -------------------------------------------------
    Laravel Breeze - Login in - Dashboard - Warenkorb
    -------------------------------------------------
    */ 

    // Authentication
    Route::group(['middleware' => 'auth','verified'], function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        
        // Online shop - Warenkorb    
        Route::get('/warenkorb',[WarenkorbController::class, 'index'])->name('cart.index');
        Route::get('/warenkorb/{id}',[WarenkorbController::class, 'show']);
        Route::delete('/warenkorb/{id}',[WarenkorbController::class,'destroy'])->name('cart.destroy');
        
        // User Profil
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
        
        //User Password ändern
        Route::get('/change-password', [PasswordController::class, 'index'])->name('change-password');
        Route::put('/change-password', [PasswordController::class, 'update'])->name('update-password');
        
        // User Adresse
        Route::get('/adress', [UserAdressController::class, 'index'])->name('adress');
        Route::put('/adress', [UserAdressController::class, 'update'])->name('adress.update');
        
        // User Bestellungen
        Route::get('/order', [UserOrderController::class, 'index'])->name('order');
        
        // Artikel in den Warenkorb nur möglich als User
        Route::post('/equipment-single/{id}', [EquipmentSingleController::class, 'addToCart'])->name('equipment.addToCart');
        Route::post('/coffee-single-m/{id}', [CoffeeSingleMController::class, 'addToCart'])->name('coffee.addToCart');
    });

    require __DIR__.'/auth.php';


    /*
    -------------------------------------------------
    Website - Home - About Us - Kontakt
    -------------------------------------------------
    */ 

    // Home
    Route::get('/', function () {
        return view('static.index');
    });

    // About us
    Route::get('/about-us', [AboutusController::class, 'index']);

    // Datenschutz & Impressum
    Route::get('/datenschutz',[DatenschutzController::class, 'index']);
    Route::get('/impressum',[ImpressumController::class, 'index']);

    // Kontakt
    Route::get('/contact',[ContactController::class, 'index'])->name('contact.index');
    Route::post('/contact', [ContactController::class, 'send']);


    /*
    -------------------------------------------------
    Online Shop - Home - Kaffee - Equipment
    -------------------------------------------------
    */ 

    // Home 
    Route::get('/index-shop',[ShopController::class, 'index']);

    // AGB, Datenschutz, Impressum & Zahlungsinfo
    Route::get('/agb-shop',[AgbController::class, 'index']);
    Route::get('/datenschutz-shop',[DatenschutzShopController::class, 'index']);
    Route::get('/impressum-shop',[ImpressumShopController::class, 'index']);
    Route::get('/zahlung-info',[ZahlungInfoController::class, 'index']);

    // Kaffee
    Route::get('/coffee',[CoffeeController::class, 'index'])->name('coffee.index');
    Route::get('/coffee-single-m/{id}',[CoffeeSingleMController::class, 'show'])->name('coffee.show');
   
    // Equipment
    Route::get('/equipment',[EquipmentController::class, 'index'])->name('equipment.index');
    Route::get('/equipment-single/{id}',[EquipmentSingleController::class,'show'])->name('equipment.show');
    


    /*
    -------------------------------------------------
    Online Shop - Laravel Cashier - Stripe - Payment
    -------------------------------------------------
    */ 

    // Lieferadresse
    Route::get('/stripe',[StripeController::class, 'adress'])->name('stripe.adress');

    // Bezahlung 
    Route::get('/stripe/index',[StripeController::class, 'index'])->name('stripe.index');
    Route::post('/stripe/create-charge',[StripeController::class, 'createCharge'])->name('stripe.create-charge');

    // Bestellung in Orders Tablle einfügen
    Route::get('/stripe/order',[StripeController::class, 'order'])->name('stripe.order');

    // Bestätigung
    Route::get('/stripe/success',[StripeController::class, 'success'])->name('stripe.success');
   
