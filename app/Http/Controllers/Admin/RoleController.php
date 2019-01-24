<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Session;
use Auth;

class RoleController extends Controller {

    public function __construct() 
    {
        $this->middleware(['auth', 'isAdmin']);//middleware 
    }

    public function index() 
    {
        $roles = Role::orderBy('id', 'ASC')->paginate();
        return view('admin.roles.index',compact('roles'));
    }

    public function create() 
    {
        $permissions = Permission::get();
        return view('admin.roles.create',compact('permissions'));
    }

    public function store(Request $request) 
    {
        $this->validate($request, [
            'name'=>'required|unique:roles|max:10',
            'permissions' =>'required',
            ]
        );

        $name = $request['name'];
        $role = new Role();
        $role->name = $name;

        $permissions = $request['permissions'];

        $role->save();
        
        foreach ($permissions as $permission) {
            $p = Permission::where('id', '=', $permission)->firstOrFail(); 
            $role = Role::where('name', '=', $name)->first(); 
            $role->givePermissionTo($p);
        }

        return redirect()->route('roles.index')
            ->with('info', 'Role'. $role->name.' added!'); 
    }

    public function show($id) 
    {
        return redirect('roles');
    }

    public function edit($id) 
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();

        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, $id) 
    {

        $role = Role::findOrFail($id);
        
        $this->validate($request, [
            'name'=>'required|max:10|unique:roles,name,'.$id,
            'permissions' =>'required',
        ]);

        $input = $request->except(['permissions']);
        $permissions = $request['permissions'];
        $role->fill($input)->save();

        $p_all = Permission::all();

        foreach ($p_all as $p) {
            $role->revokePermissionTo($p);
        }

        foreach ($permissions as $permission) {
            $p = Permission::where('id', '=', $permission)->firstOrFail();
            $role->givePermissionTo($p);
        }

        return redirect()->route('roles.index')
            ->with('info', 'Role'. $role->name.' updated!');
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('roles.index')
            ->with('info', 'Role deleted!');
    }
}
