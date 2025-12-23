<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('retards', function (Blueprint $table) {
            $table->id();

            // Agent concerné
            $table->foreignId('agent_id')->constrained('agents')->cascadeOnDelete();

            // Motif du retard
            $table->string('motif');

            // Date du retard
            $table->date('date_retard');

            // Heure réelle d’arrivée (optionnelle)
            $table->time('heure_arrivee')->nullable();

            // Commentaire éventuel
            $table->text('observation')->nullable();

            // Saisi par
            $table->foreignId('saisi_par')->nullable()->constrained('users')->nullOnDelete();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('retards');
    }
};
