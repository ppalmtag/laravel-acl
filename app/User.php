<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Collection;

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
        'password', 'remember_token', 'permissions'
    ];

    /**
     * The attributes that should be cast to native types
     *
     * @var array
     */
    protected $casts = [
        'permissions' => 'array',
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

    /**
     * Checks if the user has the given role. Accepts name of the role or a
     * role object
     *
     * @param  Role | string  $role
     * @return bool
     */
    public function hasRole($role): bool
    {
        $has_role = false;
        if (is_string($role)) {
            $has_role = $this->roles()->where('roles.name', 'like', $role)->exists();
        } elseif ($role instanceof \App\Role) {
            $has_role = $this->roles()->where('roles.id', $role->id)->exists();
        }
        return $has_role;
    }

    /**
     * Checks if the user has the given permission
     *
     * @param  Permission | string  $permission
     * @return bool
     */
    public function hasPermission($permission): bool
    {
         return Permission::select('permissions.*')
            ->join('permission_role', 'permission_role.permission_id', 'permissions.id')
            ->join('roles', 'roles.id', 'permission_role.role_id')
            ->join('role_user', 'role_user.role_id', 'roles.id')
            ->where('role_user.user_id', $this->id)
            ->when($permission instanceof Permission, function ($query) use ($permission) {
                return $query->where('permissions.id', $permission->id);
            }, function ($query) use ($permission) {
                return $query->where('permissions.name', 'like', $permission);
            })
            ->union(
                $this->permissions()
                ->select('permissions.*')
                ->when($permission instanceof Permission, function ($query) use ($permission) {
                    return $query->where('permissions.id', $permission->id);
                }, function ($query) use ($permission) {
                    return $query->where('permissions.name', 'like', $permission);
                })
            )
            ->exists();
    }

    /**
     * Returns Permission objects of all the permissions of the user
     *
     * @return  Collection  of Permission objects
     */
    public function getPermissions(): Collection
    {
        return Permission::select('permissions.*')
            ->join('permission_role', 'permission_role.permission_id', 'permissions.id')
            ->join('roles', 'roles.id', 'permission_role.role_id')
            ->join('role_user', 'role_user.role_id', 'roles.id')
            ->where('role_user.user_id', $this->id)
            ->union($this->permissions()->select('permissions.*'))
            ->get();
    }
}
