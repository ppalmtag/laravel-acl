<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The roles that belong to the user
     */
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    /**
     * The permissions that belong to the user
     */
    public function permissions()
    {
        return $this->belongsToMany('App\Permission');
    }
    
    
    public function hasRole(Role $role): bool
    {
        return $this->roles()->where('roles.id', $role->id)->exists();
    }
    
    public function hasPermission(Permission $permission): bool
    {
         return $this->permissions()->where('permissions.id', $permission->id)->exists();
    }
}
