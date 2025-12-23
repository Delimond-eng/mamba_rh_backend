<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanctionsTable extends Migration
{
    public function up()
    {
        Schema::create('sanctions', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('agent_id');

            $table->enum('type', [
                'avertissement',
                'blame',
                'mise_en_garde',
                'mise_a_pied'
            ]);

            // used only for mise_a_pied (in days)
            $table->integer('duree_jours')->nullable();

            $table->text('motif')->nullable();

            $table->date('date_sanction');

            $table->enum('statut', ['actif', 'levee', 'annulee'])->default('actif');

            $table->timestamps();

            $table->foreign('agent_id')
                  ->references('id')
                  ->on('agents')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('sanctions');
    }
}
