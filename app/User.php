<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    const MANAGER = '2';
    const ADMIN = '1';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isManager()
    {
        return $this->role_id == User::MANAGER;
    }

    public function isAdmin()
    {
        return $this->role_id == User::ADMIN;
    }

    public function getRole()
    {
        return $this->hasOne(Role::class);
    }
}
 