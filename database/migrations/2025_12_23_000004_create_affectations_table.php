<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('affectations', function (Blueprint $table) {
            $table->id();

            // Agent concerné
            $table->foreignId('agent_id')
                  ->constrained('agents')
                  ->cascadeOnDelete();

            // Sites
            $table->foreignId('ancien_site_id')
                  ->nullable()
                  ->constrained('sites')
                  ->nullOnDelete();

            $table->foreignId('nouveau_site_id')
                  ->constrained('sites')
                  ->cascadeOnDelete();

            // Type d’affectation
            $table->enum('type_affectation', [
                'exclusive',
                'temporaire'
            ]);

            // Motif (renfort, événement, ouverture site, remplacement indirect…)
            $table->string('motif');

            // Dates
            $table->dateTime('date_debut');
            $table->dateTime('date_fin')->nullable();

            // Indique si on met à jour agents.site_id
            $table->boolean('update_site_agent')
                  ->default(false)
                  ->comment('true = affectation exclusive');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('affectations');
    }
};
