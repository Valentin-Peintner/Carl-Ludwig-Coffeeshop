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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('coffee_id');
            $table->foreignId('equipment_id');
            $table->float('price');
            $table->string('tracking_number');
            $table->date('sale_date');
            $table->integer('status');
            

            $table->foreign('user_id')->on('users')->references('id')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('coffee_id')->on('coffees')->references('id')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('equipment_id')->on('equipments')->references('id')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
