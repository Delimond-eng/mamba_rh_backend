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
        Schema::create('agent_baremes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agent_id')->constrained('agents')->cascadeOnDelete();
            $table->foreignId('bareme_id')->constrained('baremes_salariaux')->cascadeOnDelete();
            $table->date('assigned_at')->nullable();
            $table->boolean('actif')->default(true);
            $table->string('note')->nullable();
            $table->timestamps();

            $table->unique(['agent_id', 'bareme_id'], 'unique_agent_bareme');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agent_baremes');
    }
};
