<?php
namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'roles';
    protected $guarded = [];

    public function users()
    {
        return $this->belongsToMany('App\Http\Models\User', 'user_roles', 'role_id', 'user_id')->withTimestamps();
    }
}
