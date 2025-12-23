<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class Agent extends Model
{
    use HasFactory;

     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'agents';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        "photo",
        "matricule",
        "fullname",
        "password",
        "role",
        "site_id",
        "service_id",
        "groupe_id",
        "status"
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [

    ];


    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at'=>'datetime:d/m/Y H:i',
        'updated_at'=>'datetime:d/m/Y H:i'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];


    /**
     * Agency Belongs to site
     * @return BelongsTo
    */
    public function site() : BelongsTo{
        return $this->belongsTo(Site::class, foreignKey:"site_id",);
    }

        /**
         * Belongs to Service
         */
        public function service() : BelongsTo{
            return $this->belongsTo(Service::class, foreignKey:"service_id");
        }

    /**
     * Belongs to agency
     * @return BelongsTo
    */
    public function groupe() : BelongsTo{
        return $this->belongsTo(AgentGroup::class, foreignKey:"groupe_id",);
    }

    public function plannings()
    {
        return $this->hasMany(AgentGroupPlanning::class, "agent_id", "id");
    }

    public function agentInfo()
    {
        return $this->hasOne(\App\Models\AgentInfo::class, 'agent_id', 'id');
    }

    public function baremes()
    {
        return $this->hasMany(\App\Models\AgentBareme::class, 'agent_id', 'id');
    }

    public function currentAssignment()
    {
        return $this->hasOne(AgentGroupAssignment::class)->latestOfMany();
    }

    public function groupAssignments()
    {
        return $this->hasMany(AgentGroupAssignment::class);
    }

    public function activeGroupAt(Carbon $date)
    {
        return $this->groupAssignments
            ->where('start_date', '<=', $date->toDateString())
            ->filter(function ($a) use ($date) {
                return is_null($a->end_date) || $a->end_date >= $date->toDateString();
            })
            ->first();
    }
}
