<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class RoleController extends Controller
{
    /*public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:Admin');
    }*/

    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
{
    $permissions = Permission::all();
    return view('admin.roles.create', compact('permissions'));
}

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permissions' => 'required|array'
        ]);

        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permissions'));

        return redirect()->route('admin.roles.index')->with('success', 'Role created successfully');
    }

    public function show($id)
    {
        $role = Role::findOrFail($id);
        $rolePermissions = $role->permissions;

        return view('admin.roles.show', compact('role', 'rolePermissions'));
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        $rolePermissions = $role->permissions->pluck('id')->toArray();

        return view('admin.roles.edit', compact('role', 'permissions', 'rolePermissions'));
    }
    public function assignRolesForm()
    {
        $users = User::all();
        $roles = Role::all();
        return view('admin.roles.assign', compact('users', 'roles'));
    }
    public function assignRoles(Request $request)
{
    $user = User::findOrFail($request->input('user_id'));
    $roles = $request->input('roles');

    
    if (!empty($roles)) {
        
        $user->roles()->sync($roles);
        
        
        $role = Role::findOrFail($roles[0]);
        $user->role_id = $role->id;
    } else {
        
        $user->role_id = null;
    }

    $user->save();

    return redirect()->back()->with('success', 'Roles asignados correctamente');
}
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name,' . $id,
            'permissions' => 'required|array'
        ]);

        $role = Role::findOrFail($id);
        $role->name = $request->input('name');
        $role->save();

        $role->syncPermissions($request->input('permissions'));

        return redirect()->route('admin.roles.index')->with('success', 'Role updated successfully');
    }

    public function destroy($id)
{
    $role = Role::findOrFail($id);
    
    \DB::table('roles')->where('id', $role->id)->delete();

    return redirect()->route('roles.index')->with('success', 'Role deleted successfully');
}
}
