<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppelNonRepondusTable extends Migration
{
    public function up()
    {
        Schema::create('appel_non_repondus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agent_id')->constrained('agents')->cascadeOnDelete();
            $table->date('date_appel');
            $table->time('heure');
            $table->integer('nombre_appels')->default(1);
            $table->foreignId('saisi_par')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('appel_non_repondus');
    }
}
