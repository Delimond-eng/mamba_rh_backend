<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affectation extends Model
{
    use HasFactory;

    protected $table = 'affectations';

    protected $fillable = [
        'agent_id',
        'ancien_site_id',
        'nouveau_site_id',
        'type_affectation',
        'motif',
        'date_debut',
        'date_fin',
        'update_site_agent'
    ];

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }

    public function ancienSite()
    {
        return $this->belongsTo(Site::class, 'ancien_site_id');
    }

    public function nouveauSite()
    {
        return $this->belongsTo(Site::class, 'nouveau_site_id');
    }
}
