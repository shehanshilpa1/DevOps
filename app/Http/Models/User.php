<?php

namespace App\Http\Models;

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

    public function name()
    {
        return $this->first_name.' '.$this->last_name;
    }

    public function roles()
    {
        return $this->belongsToMany('App\Http\Models\Role', 'user_roles', 'user_id', 'role_id')->withTimestamps();
    }
    
    public function hasRoles(array $rs)
    {
        $roles = $this->roles()->get()->pluck('name', 'id')->toArray();
        $roles = array_flip($roles);
        foreach ($rs as $key => $r) {
            if (isset($roles[strtoupper($r)])) {
                return true;
            }
        }
        return false;
    }

    public function hasManagingPermission()
    {
        $roles = $this->roles()->get()->pluck('name', 'id')->toArray();
        $roles = array_flip($roles);
        foreach (['SUPER_ADMIN', 'ADMIN', 'MANAGER'] as $key => $r) {
            if (isset($roles[strtoupper($r)])) {
                return true;
            }
        }
        return false;
    }

    public function hasAdminPermission()
    {
        $roles = $this->roles()->get()->pluck('name', 'id')->toArray();
        $roles = array_flip($roles);
        foreach (['SUPER_ADMIN', 'ADMIN'] as $key => $r) {
            if (isset($roles[strtoupper($r)])) {
                return true;
            }
        }
        return false;
    }

    public function isSuperAdmin()
    {
        $roles = $this->roles()->get()->pluck('name', 'id')->toArray();
        $roles = array_flip($roles);
        foreach (['SUPER_ADMIN'] as $key => $r) {
            if (isset($roles[strtoupper($r)])) {
                return true;
            }
        }
        return false;
    }
}
