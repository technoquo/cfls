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
        Schema::create('info_formations', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable(); // Already nullable
            $table->text('description')->nullable(); // Already nullable
            $table->boolean('status')->nullable()->default(0); // Make nullable with default 0
            $table->foreignId('formations_id')->constrained()->onDelete('cascade');   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('info_formations');
    }
};
