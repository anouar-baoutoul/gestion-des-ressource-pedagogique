<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Download extends Model
{
    protected $fillable = ['ressource_id', 'user_id', 'downloaded_at'];

    public function ressource(): BelongsTo
    {
        return $this->belongsTo(Ressource::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class );
    }
}

