<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaremeSalariaux extends Model
{
    use HasFactory;

    protected $table = 'baremes_salariaux';

    protected $fillable = [
        'categorie','classe','echelon','fonction','salaire_mensuel','devise',
        'allocation_familiale','transport_journalier','transport_mensuel',
        'prime_fonction','prime_risque','prime_anciennete',
        'treizieme_mois','treizieme_mois_montant','statut','created_by','note'
    ];

    protected $casts = [
        'treizieme_mois' => 'boolean',
        'salaire_mensuel' => 'decimal:2',
    ];
}
