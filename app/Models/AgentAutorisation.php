<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentAutorisation extends Model
{
    use HasFactory;

    protected $table = 'agent_autorisations';

    protected $fillable = [
        'agent_id','autorisation_type_id','date_debut','date_fin','status','created_by'
    ];
}
