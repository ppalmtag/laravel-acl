<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * The users that belong to the role
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    /**
     * The permissions that belong to the role
     */
    public function permissions()
    {
        return $this->belongsToMany('App\Permission');
    }
}
