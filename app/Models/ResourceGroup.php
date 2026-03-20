<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;
class ResourceGroup extends pivot
{
    protected $table = 'resource_group';

    public $timestamps = true;

    protected $fillable = [
        'resource_id',
        'group_id',
    ];
}
