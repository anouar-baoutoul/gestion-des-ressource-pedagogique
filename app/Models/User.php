<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'niveau',
        'groupe',
        'email_verified_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function teacher(): HasOne
    {
        return $this->hasOne(Teacher::class);
    }
    public function resourceViews(): HasMany
    {
        return $this->hasMany(ResourceView::class);
    }
    public function downloads(): HasMany
    {
        return $this->hasMany(Download::class);
    }
}
