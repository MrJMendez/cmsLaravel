<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_roles');
    }
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'user_permissions');
    }

    public function isAdmin()
    {
        foreach ($this->roles as $role) {
            if ($role->id === 1)
                return true;
        }
        return false;
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
