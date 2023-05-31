<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Permiso;
use DataTables;
use App\Http\Requests\UserPostRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd( auth()->check() );
        return view('users.index');
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserPostRequest $request)
    {

        return redirect()->route('users.create', compact('user'))->with('info', 'El alta se creo con éxito');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $users = User::where('active', '=', 1)->get();
        return datatables()
            ->of($users)
            ->addColumn('btn', 'users.partials.actions')
            ->rawColumns(['btn'])
            ->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, User $user)
    {
        $roles_usuario = User::with('roles')->where('active', '=', '1')->where('id', '=', $user->id)->get();
        $roles_asignados = $roles_usuario[0]->roles;
        $roles_existentes = Role::get();

        $permisos_usuario = User::with('permisos')->where('active', '=', '1')->where('id', '=', $user->id)->get();
        $permisos_asignados = $permisos_usuario[0]->permisos;
        $permisos_existentes = Permiso::get();

        return view('users.edit', compact('user', 'roles_asignados', 'roles_existentes', 'permisos_asignados', 'permisos_existentes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->update($request->All());

        if(isset($request->roles)){
            $list_roles = array_map('intval', $request->roles);
            $user->roles()->sync($list_roles);
        }else{
            $user->roles()->sync([1]);
        }

        if(isset($request->permisos)){
            $list_permisos = array_map('intval', $request->permisos);
            $user->permisos()->sync($list_permisos);
        }else{
            $user->permisos()->sync([1]);
        }

        return redirect()->route('users.edit', $user)->with('info', 'El usuario se actualizo con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::where('id', '=', $id)->update(array('active' => 0));
        return redirect()->route('users.index', $user)->with('info', 'El usuario se elimino con éxito');
    }



}
