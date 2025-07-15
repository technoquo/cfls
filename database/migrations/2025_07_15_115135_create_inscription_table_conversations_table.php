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
        Schema::create('inscription_table_conversations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tableconversation_id')
                ->constrained('table_conversations')
                ->onDelete('cascade'); // elimina inscripciones si se elimina la table_conversation
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->text('inscription_message');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscription_table_conversations');
    }
};
