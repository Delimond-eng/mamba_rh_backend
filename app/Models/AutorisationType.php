<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutorisationType extends Model
{
    use HasFactory;

    protected $table = 'autorisations_types';

    protected $fillable = [
        'code','libelle','type','nombre_jours','payable','justificatif_obligatoire','status'
    ];

    protected $casts = [
        'payable' => 'boolean',
        'justificatif_obligatoire' => 'boolean',
    ];
}
