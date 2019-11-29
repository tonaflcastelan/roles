<?php

namespace Tonacastelan\Roles\Models;

use Illuminate\Database\Eloquent\Model;
use Tonacastelan\Roles\Models\Role;

class Permission extends Model
{
     /**
     * The attributes that are fillable via mass assignment.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug', 'description'];

    public function roles() {
        return $this->belongsToMany(Role::class,'permission_role');
    }
}
