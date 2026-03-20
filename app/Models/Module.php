<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Module extends Model
{
    protected $table = 'modules';

    protected $fillable = [
        'name',
        'description',
    ];

    public function ressources(): HasMany
    {
        return $this->hasMany(Ressource::class);
    }
}
