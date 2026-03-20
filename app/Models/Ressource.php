<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ressource extends Model
{

    protected $table = 'ressources';

    protected $fillable = [
        'type',
        'title',
        'description',
        'file',
        'module_id',
        'level',
        'tags',
        'visibilite',
        'groups',
        'teacher_id',
        'views',
        'downloads',
    ];


    public function module(): BelongsTo
    {
        return $this->belongsTo(Module::class);
    }


    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'resource_tag','ressource_id', 'tag_id')
            ->using(RessourceTag::class)
                    ->withTimestamps();
    }


    public function levels(): BelongsToMany
    {
        return $this->belongsToMany(Level::class, 'resource_level', 'ressource_id', 'level_id')
                    ->withTimestamps();
    }


    public function groups(): BelongsToMany
    {
        return $this->belongsToMany(Group::class, 'resource_group', 'ressource_id', 'group_id' )
                    ->withTimestamps();
    }

    public function viewsLogs(): HasMany
    {
        return $this->hasMany(ResourceView::class, 'ressource_id  ');
    }

    public function downloadLogs(): HasMany
    {
        return $this->hasMany(Download::class, 'ressource_id');
    }

    public function stats(): HasMany
    {
        return $this->hasMany(RessourceStat::class);
    }
}
