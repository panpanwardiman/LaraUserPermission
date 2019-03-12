<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Validator;
use DB;
use App\User;

class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:role list')->only('index');
        $this->middleware('permission:role create')->only('create', 'store');
        $this->middleware('permission:role edit')->only('edit', 'update');
        $this->middleware('permission:role delete')->only('delete');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::get();

        return view('roles.index', ['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();

        return view('roles.create', ['permissions' => $permissions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required'
        ]);

        $role = Role::create(['name' => $request->input('name')]);

        $role->syncPermissions($request->input('permission'));

        $userId = $role->users->pluck('id')->toArray();

        $users = User::find($userId);

        foreach($users as $user):
           $user->syncPermissions($request->input('permission')); 
        endforeach;

        return redirect()->route('role.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);

        $permissions = Permission::all();

        $rolePermissions = $role->permissions->pluck('id')->toArray();

        // dd($rolePermissions);

        return view('roles.edit', compact('role', 'permissions', 'rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        $this->validate($request, [
            'name' => 'required|unique:roles,name,'.$id,
            'permission' => 'required'
        ]);
        
        $role->update(['name' => $request->input('name')]);        

        $role->syncPermissions($request->input('permission'));

        $userId = $role->users->pluck('id')->toArray();

        $users = User::find($userId);

        foreach($users as $user):
           $user->syncPermissions($request->input('permission')); 
        endforeach;

        return redirect()->route('role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);

        $role->delete();

        return redirect()->route('role.index');
    }
}
