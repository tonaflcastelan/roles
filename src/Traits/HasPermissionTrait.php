<?php

namespace Tonacastelan\Roles\Traits;

use Tonacastelan\Roles\Models\Role;
use Tonacastelan\Roles\Models\Permission;

trait HasPermissionTrait {

   public function roles() {
      return $this->belongsToMany(Role::class,'role_user');
   }

   public function permissions() {
      return $this->belongsToMany(Permission::class,'permission_user');
   }

   public function refreshPermissions( ... $permissions ) {
		$this->permissions()->detach();
		return $this->givePermissionsTo($permissions);
   }

   protected function getAllPermissions(array $permissions) {
		return Permission::whereIn('slug', $permissions)->get();
	}

   public function hasRole( ... $roles ) {
      print_r($roles);
      foreach ($roles as $role) {
         if ($this->roles->contains('slug', $role)) {
            return true;
         }
      }
      return false;
   }

   public function hasPermissionTo($permission) {
      return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);
   }
   
   protected function hasPermission($permission) {
      return (bool) $this->permissions->where('slug', $permission->slug)->count();
   }

   public function hasPermissionThroughRole($permission) {
      foreach ($permission->roles as $role){
         if($this->roles->contains($role)) {
            return true;
         }
      }
      return false;
   }

   public function givePermissionsTo(... $permissions) {
      $permissions = $this->getAllPermissions($permissions);
      if($permissions === null) {
         return $this;
      }
      $this->permissions()->saveMany($permissions);
      return $this;
   }

   public function deletePermissions( ... $permissions ) {
      $permissions = $this->getAllPermissions($permissions);
      $this->permissions()->detach($permissions);
      return $this;
   }
}