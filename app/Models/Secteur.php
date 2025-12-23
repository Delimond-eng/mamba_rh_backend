<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Secteur extends Model
{
    use HasFactory;

    protected $table = 'secteurs';

    protected $fillable = [
        'libelle'
    ];

    protected $casts = [
        'created_at' => 'datetime:d/m/Y H:i',
        'updated_at' => 'datetime:d/m/Y H:i'
    ];

    /**
     * Sites belonging to this secteur
     * @return HasMany
     */
    public function sites(): HasMany
    {
        return $this->hasMany(Site::class, foreignKey: 'secteur_id', localKey: 'id');
    }
}
