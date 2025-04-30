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
        Schema::create('calendars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('formations_id')->constrained()->onDelete('cascade');
            $table->foreignId('levels_id')->constrained()->onDelete('cascade');
            $table->string('slug')->unique()->nullable();
            $table->datetime('start_date');
            $table->datetime('end_date');
            $table->integer('price');
            $table->string('hour_start')->nullable();
            $table->string('hour_end')->nullable();
            $table->string('day')->nullable();
            $table->boolean('quota')->default(true);
            $table->string('image')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calendars');
    }
};
