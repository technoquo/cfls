<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // "Annuel", "3 Mois", "Mensuel"
            $table->string('slug')->unique(); // "annuel", "3mois", "mensuel"
            $table->decimal('price', 8, 2);
            $table->string('currency')->default('EUR');
            $table->integer('duration_days'); // 30, 90, 365
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
