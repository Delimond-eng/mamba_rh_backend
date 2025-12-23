<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('vehicule_rapports', function (Blueprint $table) {
            $table->integer('kilometrage_debut')->nullable()->after('date_rapport');
            $table->integer('kilometrage_fin')->nullable()->after('kilometrage_debut');
            $table->string('niveau_carburant')->nullable()->after('kilometrage_fin');
            $table->decimal('carburant_recu', 8, 2)->nullable()->after('niveau_carburant');
        });
    }

    public function down()
    {
        Schema::table('vehicule_rapports', function (Blueprint $table) {
            $table->dropColumn(['kilometrage_debut','kilometrage_fin','niveau_carburant','carburant_recu']);
        });
    }
};
