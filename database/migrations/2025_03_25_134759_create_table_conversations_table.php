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
        Schema::create('table_conversations', function (Blueprint $table) {
            $table->id();
            $table->date('date_start');           
            $table->datetime('hour_start');           
            $table->integer('price');
            $table->integer('inscription')->default(0);
            $table->integer('open')->default(1);
            $table->boolean('status')->default(1); 
            $table->foreignId('formations_id')->constrained()->onDelete('cascade');   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_conversations');
    }
};
