<?php

namespace Tonacastelan\Roles\Models;

use Illuminate\Database\Eloquent\Model;
use Tonacastelan\Roles\Models\Permission;

class Role extends Model
{
    /**
     * The attributes that are fillable via mass assignment.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug', 'description'];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'permission_role');
    }

}
