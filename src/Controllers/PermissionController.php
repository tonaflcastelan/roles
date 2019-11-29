<?php

namespace Tonacastelan\Roles\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tonacastelan\Roles\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();
        
        return view('roles::permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles::permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $permission = new Permission();

        $permission->name = $request->input('name');
        $permission->slug = $request->input('slug');
        $permission->description = $request->input('description');
        $permission->save();

        return redirect('permissions');
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permission = Permission::findOrFail($id);
        return view('roles::permissions.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = Permission::find($id);
        return view('roles::permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $permission)
    {
        Permission::where('id', $permission)->update(
            [
                'name' => $request->input('name'),
                'slug' => $request->input('slug'),
                'description' => $request->input('description')
            ]);
        return redirect('permissions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy($permission)
    {
        Permission::where('id', $permission)->delete();
        return redirect('permissions');
    }
}
