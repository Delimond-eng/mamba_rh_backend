<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppelNonRepondu extends Model
{
    use HasFactory;

    protected $table = 'appel_non_repondus';

    protected $fillable = [
        'agent_id',
        'date_appel',
        'heure',
        'nombre_appels',
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
