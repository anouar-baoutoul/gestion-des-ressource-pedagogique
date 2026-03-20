<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Level extends Model
{
    protected $fillable = ['code', 'label'];

    public function ressources(): BelongsToMany
    {
        return $this->belongsToMany(Ressource::class, 'resource_level', 'level_id', 'ressource_id')
                    ->withTimestamps();
    }
}
