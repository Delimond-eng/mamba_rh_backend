<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departure extends Model
{
    use HasFactory;

    protected $fillable = [
        'agent_id',
        'type',
        'date_depart',
        'motif',
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
