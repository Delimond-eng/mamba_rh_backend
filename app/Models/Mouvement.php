<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mouvement extends Model
{
    use HasFactory;

    protected $fillable = [
        'agent_absent_id',
        'agent_remplacant_id',
        'site_id',
        'poste',
        'motif',
        'date_debut',
        'date_fin',
        'status',
    ];

    public function agentAbsent()
    {
        return $this->belongsTo(Agent::class, 'agent_absent_id');
    }

    public function agentRemplacant()
    {
        return $this->belongsTo(Agent::class, 'agent_remplacant_id');
    }

    public function site()
    {
        return $this->belongsTo(Site::class);
    }
}
