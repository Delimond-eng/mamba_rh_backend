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
        Schema::create('baremes_salariaux', function (Blueprint $table) {
            $table->id();

            // (Removed 'societe' field - barèmes are global)

            // Classification RH
            $table->string('categorie', 100);
            $table->string('classe', 50);
            $table->string('echelon', 50);

            // Fonction (libre)
            $table->string('fonction')->nullable();

            // Salaire de base
            $table->decimal('salaire_mensuel', 15, 2)->default(0);
            $table->string('devise', 10)->default('USD');

            // Avantages
            $table->decimal('allocation_familiale', 15, 2)->default(0);
            $table->decimal('transport_journalier', 15, 2)->default(0);
            $table->decimal('transport_mensuel', 15, 2)->default(0);

            // Primes fixes
            $table->decimal('prime_fonction', 15, 2)->default(0);
            $table->decimal('prime_risque', 15, 2)->default(0);
            $table->decimal('prime_anciennete', 15, 2)->default(0);

            // 13ème mois
            $table->boolean('treizieme_mois')->default(false);
            $table->decimal('treizieme_mois_montant', 15, 2)->default(0);
             $table->string('note')->nullable();
            // Statut
            $table->enum('statut', ['actif', 'inactif'])->default('actif');

            // Audit minimal
            $table->foreignId('created_by')
                  ->nullable()
                  ->constrained('users')
                  ->nullOnDelete();

            $table->timestamps();

            // Sécurité : un barème unique par catégorie/classe/échelon
            $table->unique(
                ['categorie', 'classe', 'echelon'],
                'unique_bareme_salaire'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('baremes_salariaux');
    }
};
