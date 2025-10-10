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
        if (!Schema::hasTable('words')) {
            Schema::create('words', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // palabra: casa, perro, etc.

            // Relación con la tabla de videos
            // $table->foreignId('video_theme_cloudinary_id')
            //     ->nullable()
            //     ->constrained('video_theme_cloudinary')
            //     ->onDelete('cascade');

            // Relaciones adicionales
            $table->foreignId('syllabu_id')
                ->nullable()
                ->constrained('syllabus')
                ->onDelete('cascade');

            $table->foreignId('theme_id')
                ->nullable()
                ->constrained('themes')
                ->onDelete('cascade');



            $table->timestamps();
        });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('words', function (Blueprint $table) {
            // $table->dropConstrainedForeignId('video_theme_cloudinary_id');
            $table->dropConstrainedForeignId('syllabu_id');
            $table->dropConstrainedForeignId('theme_id');
        });

        Schema::dropIfExists('words');
    }
};
