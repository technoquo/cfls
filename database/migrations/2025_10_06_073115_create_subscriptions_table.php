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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            // Relación con usuarios
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Datos del plan
            $table->string('plan_name');        // "Annuel", "3 Mois", "Mensuel"
            $table->decimal('price', 8, 2);
            $table->string('currency')->default('EUR');
            $table->integer('duration_days');   // 30, 90, 365
            $table->date('starts_at')->nullable();
            $table->date('ends_at')->nullable();

            // Estado
            $table->enum('status', ['active', 'expired', 'cancelled'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
