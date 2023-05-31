<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permiso;
use DataTables;

class PermisosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('permisos.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('permisos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $permiso = Permiso::create([
            'name'                      => $request->name,
        ]);

        return redirect()->route('permisos.create', compact('permiso'))->with('info', 'El alta se creo con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $permisos = Permiso::where('active', '=', 1)->get();
        return datatables()
            ->of($permisos)
            ->addColumn('btn', 'permisos.partials.actions')
            ->rawColumns(['btn'])
            ->toJson();

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Permiso $permiso)
    {
        return view('permisos.edit', compact('permiso'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permiso $permiso)
    {
        $permiso->update($request->All());
        return redirect()->route('permisos.edit', $permiso)->with('info', 'El permiso se actualizo con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Permiso::where('id', '=', $id)->update(array('active' => 0));
        return redirect()->route('permisos.index', $user)->with('info', 'El permiso se elimino con éxito');
    }
}
