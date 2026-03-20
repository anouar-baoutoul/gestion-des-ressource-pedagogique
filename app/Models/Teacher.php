<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Teacher extends Model
{
    protected $fillable = [
        'last_name',
        'first_name',
        'email',
        'subjects',
    ];
    public function ressources(): HasMany
    {
        return $this->hasMany(Ressource::class, 'teacher_id');
    }
    public function getFullNameAttribute(): string
    {
         return $this->first_name.' '.$this->last_name;
    }

}
