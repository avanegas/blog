<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use App\Presenters\DatePresenter;

class User extends Authenticatable
{
    use Notifiable, DatePresenter, HasRoles;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts()
    {
        return $this->hasMany(App\Models\Post\Post::class);
    }

    public function comments()
    {
        return $this->hasMany(App\Models\Post\Comment::class);
    }

    public function setPasswordAttribute($password)
    {   
        $this->attributes['password'] = bcrypt($password);
    }
}
