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
        if (!Schema::hasTable('agent_separations')) {
            Schema::create('agent_separations', function (Blueprint $table) {
                $table->id();

                $table->foreignId('agent_id')
                      ->constrained('agents')
                      ->onDelete('cascade');

                $table->enum('type', [
                    'demission',
                    'licenciement',
                    'deces',
                    'essai_non_concluant',
                    'fin_contrat'
                ]);

                $table->date('date_evenement');

                $table->text('motif')->nullable();

                $table->boolean('document_remis')->default(false);

                $table->boolean('solde_final_effectue')->default(false);

                $table->string('decision_par')->nullable();

                $table->string('status')->default('valide');

                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agent_separations');
    }
};
