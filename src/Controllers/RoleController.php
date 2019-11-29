<?php

namespace Tonacastelan\Roles\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tonacastelan\Roles\Models\Role;
use Tonacastelan\Roles\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();
        echo '<pre>';
        print_r($user);
        echo '</pre>';
        $roles = Role::all();
        return view('roles::roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('roles::roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $permissions = $request->get('permissions');
        unset($request['permissions']);

        $role = new Role();

        $role->name = $request->input('name');
        $role->slug = $request->input('slug');
        $role->description = $request->input('description');
        $role->save();
        
        $role->permissions()->sync($permissions);
        return redirect('roles');
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::findOrFail($id);
        return view('roles::roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $permissions = Permission::all();
        $assignedRoles  = $role->permissions->pluck('id')->toArray();
        return view('roles::roles.edit', compact('role', 'permissions', 'assignedRoles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->slug = $request->input('slug');
        $role->description = $request->input('description');
        $role->save();

        $role->permissions()->sync($request->input('permissions'));
        return redirect('roles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy($role)
    {
        Role::where('id', $role)->delete();
        return redirect('roles');
    }

    /**
     * Get all permissions
     *
     * @return {array} roles
     */
    private function getPermissions($role = null)
    {   
        $collection = count($role->permissions) > 0 ? $role->permissions : Permission::all();   
        $permissions = [];

        foreach ($collection as $permission) {
            $permissions[$permission->id] = $permission->name;
        }
        return $permissions;
    }

}
