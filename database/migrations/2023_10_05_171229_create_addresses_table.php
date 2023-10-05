<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('country'); // Поле "Страна"
            $table->string('city'); // Поле "Город"
            $table->string('street'); // Поле "Улица"
            $table->integer('house_number'); // Поле "Дом"
            $table->integer('apartment_number'); // Поле "Квартира"
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
