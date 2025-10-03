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
        Schema::table('questions', function (Blueprint $table) {
            if (!Schema::hasColumn('questions', 'theme_id')) {
                $table->foreignId('theme_id')
                    ->after('syllabu_id') // opcional: define dónde va la columna
                    ->nullable()
                    ->constrained('themes')
                    ->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('questions', function (Blueprint $table) {
             $table->dropForeign(['theme_id']);
             $table->dropColumn('theme_id');
        });
    }
};
