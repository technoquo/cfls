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
        Schema::create('book_codes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('token', 64)->unique();        // identificador único del registro/código
            $table->string('code_livre');                 // el código del libro
            $table->timestamps();

            // Evita que el mismo usuario repita el mismo código
            $table->unique(['user_id', 'code_livre']);

            // Índices útiles
            $table->index('code_livre');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_codes');
    }
};
