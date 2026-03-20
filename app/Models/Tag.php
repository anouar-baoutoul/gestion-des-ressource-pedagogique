<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    protected $fillable = ['code', 'label'];

    public function ressources(): BelongsToMany
    {
        return $this->belongsToMany(Ressource::class, 'resource_tag', 'tag_id', 'ressource_id')
                    ->withTimestamps();
    }
}
