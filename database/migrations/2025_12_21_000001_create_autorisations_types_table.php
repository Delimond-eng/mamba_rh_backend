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
        Schema::create('autorisations_types', function (Blueprint $table) {
            $table->id();

            $table->string('code')->unique();
            $table->string('libelle');
            $table->enum('type', ['conge', 'autorisation'])->default('conge');
            $table->integer('nombre_jours')->nullable();
            $table->boolean('payable')->default(true);
            $table->boolean('justificatif_obligatoire')->default(false);
            $table->string('status')->default('actif');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('autorisations_types');
    }
};
