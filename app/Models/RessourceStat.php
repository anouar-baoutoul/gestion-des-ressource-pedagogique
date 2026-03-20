<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RessourceStat extends Model
{
    protected $fillable = [
        'ressource_id',
         'user_id',
        'action',
    ];
    public function ressource(): BelongsTo
    {
        return $this->belongsTo(Ressource::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
