<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    use HasFactory;

    protected $fillable = [
        'agent_id',
        'type_absence',
        'motif',
        'date_absence',
        'saisi_par',
        'locked',
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
