<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ResourceView extends Model
{
    protected $table = 'resource_views';

    protected $fillable = [
        'ressource_id',
        'user_id',
        'viewed_at',
    ];

    public function ressource()
{
    return $this->belongsTo(Ressource::class);
}

public function student()
{
    return $this->belongsTo(User::class, 'student_id');
}
}
