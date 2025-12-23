<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentSeparation extends Model
{
    use HasFactory;

    protected $table = 'agent_separations';

    protected $fillable = [
        'agent_id',
        'type',
        'date_evenement',
        'motif',
        'document_remis',
        'solde_final_effectue',
        'decision_par',
        'status'
    ];

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }
}
