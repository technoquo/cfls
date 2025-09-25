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
            $table->enum('type', ['choice', 'text', 'video-choice', 'yes-no'])->after('question_text');
            $table->json('options')->nullable()->after('type');
            $table->string('answer')->nullable()->after('options');
        });
    }

    public function down(): void
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->dropColumn(['type', 'options', 'answer']);
        });
    }
};
