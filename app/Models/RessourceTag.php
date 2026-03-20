<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class RessourceTag extends Pivot
{
    protected $table = 'resource_tag';

    protected $fillable = [
        'ressource_id',
        'tag_id',

    ];
}
