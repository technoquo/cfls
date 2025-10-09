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
        Schema::create('words', function (Blueprint $table) {
            $table->id();
            $table->string('word');
            $table->string('image')->nullable();
            $table->timestamps();
        });

        Schema::table('words', function (Blueprint $table) {
            $table->foreignId('syllabu_id')
                ->nullable()
                ->after('image')
                ->constrained('syllabus')
                ->onDelete('cascade');

            $table->foreignId('theme_id')
                ->nullable()
                ->constrained('themes')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('words', function (Blueprint $table) {
            $table->dropConstrainedForeignId('syllabu_id');
            $table->dropConstrainedForeignId('theme_id');
        });
        Schema::dropIfExists('words');
    }
};
