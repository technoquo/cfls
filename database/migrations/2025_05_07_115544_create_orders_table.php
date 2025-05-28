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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->string('first_name');
            $table->string('second_name');
            $table->string('email');
            $table->string('telephone');
            $table->string('delivery'); // livraison,  retrait
            $table->decimal('delivery_fee', 8, 2)->default(0.00); // Frais de livraison
            $table->json('address')->nullable(); // JSON pour les champs d'adresse
            $table->decimal('total', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
