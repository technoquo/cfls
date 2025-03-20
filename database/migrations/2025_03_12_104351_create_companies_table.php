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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('mobile')->unique();
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->text('scheduler')->nullable();
            $table->text('transport')->nullable();
            $table->string('website')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->text('googlemap')->nullable();
            $table->string('bank')->nullable();
            $table->foreignId('users_id')->constrained('users')->onDelete('cascade');            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
