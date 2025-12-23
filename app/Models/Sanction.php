<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sanction extends Model
{
    use HasFactory;

    protected $table = 'sanctions';

    protected $fillable = [
        'agent_id',
        'type',
        'duree_jours',
        'motif',
        'date_sanction',
        'statut'
    ];

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }
}

