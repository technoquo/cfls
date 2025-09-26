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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('video_id')
                ->nullable()
                ->constrained('video_themes_cloudinary')
                ->onDelete('cascade');

            $table->string('question_text')->nullable();

            // 👇 Aquí la columna TYPE
            $table->enum('type', ['choice', 'text', 'video-choice', 'yes-no']);

            // 👇 Opciones en formato JSON
            $table->json('options')->nullable();

            // 👇 Respuesta correcta
            $table->string('answer')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
