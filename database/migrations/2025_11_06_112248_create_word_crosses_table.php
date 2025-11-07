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
        Schema::create('word_crosses', function (Blueprint $table) {
            $table->id();
            $table->string('text')->unique(); // La palabra (e.g., LARAVEL)
            $table->text('clue');           // La pista (e.g., Framework de PHP)
            $table->unsignedSmallInteger('length'); // Longitud para facilitar la lógica
            $table->enum('difficulty', ['easy', 'medium', 'hard'])->default('medium');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('word_crosses');
    }
};
