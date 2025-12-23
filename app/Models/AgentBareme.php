<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentBareme extends Model
{
    use HasFactory;

    protected $table = 'agent_baremes';

    protected $fillable = ['agent_id','bareme_id','assigned_at','actif','note'];

    public function agent(){
        return $this->belongsTo(Agent::class);
    }

    public function bareme(){
        return $this->belongsTo(BaremeSalariaux::class, 'bareme_id');
    }
}
