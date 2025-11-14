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
        Schema::create('crosswords', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            // Dimensiones de la cuadrícula
            $table->unsignedSmallInteger('size_x');
            $table->unsignedSmallInteger('size_y');
            // Datos del tablero (ubicación, orientación y IDs de las palabras), guardados como JSON
            $table->json('board_data');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crosswords');
    }
};
