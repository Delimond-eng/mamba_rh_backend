<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retard extends Model
{
    use HasFactory;

    protected $table = 'retards';

    protected $fillable = [
        'agent_id',
        'motif',
        'date_retard',
        'heure_arrivee',
        'observation',
        'saisi_par',
    ];

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }

    public function saisiPar()
    {
        return $this->belongsTo(User::class, 'saisi_par');
    }
}
