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
        Schema::create('inscription_formations', function (Blueprint $table) {
//            $table->id();
//            $table->string('first_name');
//            $table->string('last_name');
//            $table->string('email');
//            $table->string('phone')->nullable();
//            $table->string('company')->nullable();
//            $table->foreignId('formations_id')->constrained()->cascadeOnDelete();
//            $table->foreignId('levels_id')->nullable()->constrained()->cascadeOnDelete();
//            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //Schema::dropIfExists('inscription_formations');
    }
};
