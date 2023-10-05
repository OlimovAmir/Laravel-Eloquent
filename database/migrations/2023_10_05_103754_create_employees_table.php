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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('last_name'); // Добавляем поле Фамилия
            $table->string('patronymic'); // Добавляем поле Отчество
            $table->unsignedBigInteger('position_id'); // Добавляем поле для связи с таблицей Должность
            $table->unsignedBigInteger('address_id'); // Добавляем поле для связи с таблицей Адрес
            $table->string('passport_data'); // Добавляем поле для паспортных данных
            $table->string('photo_path')->nullable(); // Добавляем поле для хранения пути к фотографии
            $table->timestamps();
    
            // Определяем внешние ключи для связей
            $table->foreign('position_id')->references('id')->on('positions');
            $table->foreign('address_id')->references('id')->on('addresses');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
