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
        Schema::create('mots_croises', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image_mot');
            $table->string('image_solution');
            $table->string('code_vimeo');
            $table->string('pdf');
            $table->string('pdf_solution');
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mots_croises');
    }
};
