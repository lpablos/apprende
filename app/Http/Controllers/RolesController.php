<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permiso;
use DataTables;
use App\Http\Requests\RolePostRequest;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('roles.index');
    }

    public function getRoles()
    {
        
        $roles = Role::get();
        return datatables()
            ->of($roles)
            ->addColumn('btn', 'partials.actions')
            ->rawColumns(['btn'])
            ->toJson();
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RolePostRequest $request)
    {
        $role = Role::create([
            'name'                      => $request->name
        ]);

        return redirect()->route('roles.create', compact('role'))->with('info', 'El alta se creo con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $roles = Role::where('active', '=', 1)->get();
        return datatables()
            ->of($roles)
            /* ->addColumn('link', '<button type="button" class="btn btn-outline-danger px-5">Erase</button>') */
            ->addColumn('btn', 'roles.partials.actions')
            ->rawColumns(['btn'])
            ->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Role $role)
    {   
        $permisos_role = Role::with('permisos')->where('active', '=', '1')->where('id', '=', $role->id)->get();
        $permisos_asignados = $permisos_role[0]->permisos;
        $permisos_existentes = Permiso::get();
        return view('roles.edit', compact('role', 'permisos_asignados', 'permisos_existentes'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        
        $role->update($request->All());

        if(isset($request->permisos)){
            $list_permisos = array_map('intval', $request->permisos);
            $role->permisos()->sync($list_permisos);
        }else{
            $role->permisos()->sync([1]);
        }
        return redirect()->route('roles.edit', $role)->with('info', 'El rol se actualizo con éxito');

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Role::where('id', '=', $id)->update(array('active' => 0));
        return redirect()->route('roles.index', $user)->with('info', 'El rol se elimino con éxito');
    }
}
