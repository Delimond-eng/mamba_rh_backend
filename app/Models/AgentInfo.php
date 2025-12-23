<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentInfo extends Model
{
    use HasFactory;

    protected $table = 'agent_infos';

    protected $fillable = [
        'agent_id',
        'telephone',
        'email',
        'date_naissance',
        'lieu_naissance',
        'adresse',
        'etat_civil',
        'est_marie',
        'nom_conjoint',
        'nombre_enfants',
        'noms_enfants',
        'date_embauche',
        'type_emploi',
        'date_fin_contrat',
        'niveau_etude',
        'fonction',
        'status'
    ];

    protected $casts = [
        'noms_enfants' => 'array',
        'est_marie' => 'boolean'
    ];
}
