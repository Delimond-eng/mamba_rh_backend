<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehiculeRapport extends Model
{
    use HasFactory;

    protected $table = 'vehicule_rapports';

    protected $fillable = [
        'vehicule_id',
        'date_rapport',
        'kilometrage',
        'kilometrage_debut',
        'kilometrage_fin',
        'niveau_carburant',
        'carburant_recu',
        'observation',
        'agent_id',
    ];

    public function vehicule()
    {
        return $this->belongsTo(Vehicule::class);
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }
}
