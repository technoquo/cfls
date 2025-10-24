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
            if (!Schema::hasColumn('questions', 'syllabu_id')) {
                $table->foreignId('syllabu_id')
                    ->after('id') // opcional: define dónde va la columna
                    ->constrained('syllabus')
                    ->onDelete('cascade');
            }
        });
    }

    public function down(): void
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->dropForeign(['syllabu_id']);
            $table->dropColumn('syllabu_id');
        });
    }

};
