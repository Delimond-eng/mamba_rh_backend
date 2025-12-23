<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMouvementsTable extends Migration
{
    public function up()
    {
        Schema::create('mouvements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agent_absent_id')->constrained('agents')->cascadeOnDelete();
            $table->foreignId('agent_remplacant_id')->constrained('agents')->cascadeOnDelete();
            $table->foreignId('site_id')->constrained('sites')->cascadeOnDelete();
            $table->string('poste');
            $table->enum('motif', ['absence', 'congé', 'sanction', 'urgence']);
            $table->date('date_debut');
            $table->date('date_fin')->nullable();
            $table->enum('status', ['actif', 'terminé', 'annulé'])->default('actif');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mouvements');
    }
}
