<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_infos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('agent_id')
                  ->constrained('agents')
                  ->onDelete('cascade');

            /* =====================
               INFOS PERSONNELLES
            ====================== */
            $table->string('telephone')->nullable();
            $table->string('email')->nullable();
            $table->date('date_naissance')->nullable();
            $table->string('lieu_naissance')->nullable();
            $table->string('adresse')->nullable();
            $table->string('etat_civil')->nullable();
            // célibataire, marié, veuf, divorcé

            /* =====================
               INFOS FAMILIALES
            ====================== */
            $table->boolean('est_marie')->default(false);
            $table->string('nom_conjoint')->nullable();
            $table->integer('nombre_enfants')->default(0);

            $table->json('noms_enfants')->nullable();
         

            /* =====================
               INFOS PROFESSIONNELLES
            ====================== */
            $table->date('date_embauche')->nullable();
            $table->enum('type_emploi', [
                'permanent',
                'temporaire',
                'journalier',
                'contractuel',
                'stagiaire'
            ])->default('permanent');

            $table->date('date_fin_contrat')->nullable();

            $table->string('niveau_etude')->nullable();
            $table->string('fonction')->nullable();

            /* =====================
               AUTRES
            ====================== */
            $table->string('status')->default('actif');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agent_infos');
    }
};
