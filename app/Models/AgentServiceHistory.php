<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentServiceHistory extends Model
{
    use HasFactory;

    protected $table = 'agent_service_histories';

    protected $fillable = [
        'agent_id',
        'service_id',
        'date_debut',
        'date_fin',
        'saisi_par',
    ];

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function saisiPar()
    {
        return $this->belongsTo(User::class, 'saisi_par');
    }
}
