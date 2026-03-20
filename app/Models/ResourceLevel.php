<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ResourceLevel extends Pivot
{
    protected $table = 'resource_level';

    public $timestamps = true;

    protected $fillable = [
        'ressource_id',
        'level_id',
    ];

}
