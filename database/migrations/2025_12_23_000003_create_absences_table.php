<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('absences', function (Blueprint $table) {
            $table->id();

            // Agent concerné
            $table->foreignId('agent_id')->constrained('agents')->cascadeOnDelete();

            // Type d'absence
            $table->enum('type_absence', ['absence_12h', 'absence_24h']);

            // Motif obligatoire
            $table->string('motif');

            // Date concernée
            $table->date('date_absence');

            // Observations éventuelles
            $table->text('observation')->nullable();

            // Saisi par
            $table->foreignId('saisi_par')->nullable()->constrained('users')->nullOnDelete();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('absences');
    }
};
