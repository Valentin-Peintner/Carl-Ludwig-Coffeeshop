<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id');    
            $table->foreignId('user_id');
            $table->string('street');
            $table->integer('number');
            $table->string('city');
            $table->integer('zip');
            $table->boolean('is_delivery_adress');

            $table->foreign('country_id')->on('countries')->references('id')->onDelete('restrict')->onUpdate('cascade');
            
            $table->foreign('user_id')->on('users')->references('id')->onDelete('restrict')->onUpdate('cascade');  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adresses');
    }
};
