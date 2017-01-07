<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use \Illuminate\Auth\Authenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'first_name', 'last_name', 'alias'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Role', 'user_role', 'user_id', 'role_id');
    }

    public function hasAnyRoles($roles)
    {
        if (is_array($roles))
        {
            foreach ($roles as $role) 
            {
                if ($this->hasRole($role))
                {
                    return true;
                }
            }
        }

        return $this->hasRole($role);
    }

    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first())
        {
            return true;
        }
        return false;
    }

}
