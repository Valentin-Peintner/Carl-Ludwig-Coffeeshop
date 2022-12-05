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
        Schema::create('coffees', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('roast');
            $table->Text('description');
            $table->string('amount');
            $table->string('image');
            $table->float('price');
            $table->bigInteger('piece_available');
            $table->timestamps();
        });
    }
 
    public function down()
    {
        Schema::dropIfExists('coffees');
    }
};
