<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
use Session;
use Auth;

class UserController extends Controller
{
    public function __construct() 
    {
        $this->middleware(['auth', 'isAdmin']);//middleware 
    }

    public function index()
    {
        $users = User::orderBy('id', 'DESC')->paginate();

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::get();
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|max:120',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|confirmed'
        ]);

        $user = User::create($request->only('email', 'name', 'password'));

        $roles = $request['roles']; //Retrieving the roles field

        //Checking if a role was selected
        if (isset($roles)) {
            foreach ($roles as $role) {
                $role_r = Role::where('id', '=', $role)->firstOrFail();            
                $user->assignRole($role_r); //Assigning role to user
            }
        } 

        return redirect()->route('users.index')->with('info', 'Usuario creado con éxito');
    }

    public function show($id)
    {
        return redirect('users');

        //$user = User::findOrFail($id);
        //return view('admin.users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::get(); //Get all roles

        return view('admin.users.edit', compact('user', 'roles')); //pass user and roles data to view
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id); 

        $this->validate($request, [
            'name'=>'required|max:120',
            'email'=>'required|email|unique:users,email,'.$id,
            'password'=>'required|min:6|confirmed'
        ]);

        $input = $request->only(['name', 'email', 'password']); 
        $roles = $request['roles'];
        $user->fill($input)->save();

        if (isset($roles)) {        
            $user->roles()->sync($roles);          
        }        
        else {
            $user->roles()->detach();
        }

        $user->fill($request->all())->save();

        return redirect()->route('users.index')
            ->with('info', 'Usuario actualizado con éxito');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id); 
        $user->delete();

        return back()->with('info', 'Eliminado correctamente');
    }
}
