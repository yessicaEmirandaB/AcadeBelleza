<?php

namespace App\Http\Controllers;

use App\Models\PermisoController;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class PermisoControllerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permisos = Permission::paginate(15);
        return view('permisos.index', compact('permisos'));
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
        $this->validate($request, [
            'name' => 'required',
        ]);

        $permiso = Permission::create(['name' => $request->input('name')]);

        return redirect()->route('permisos.index');
    }

    public function show(PermisoController $permisoController)
    {
        //
    }

    public function edit(string $id)
    {
        $permiso = Permission::find($id);
        return view('permisos.edit',compact('permiso'));
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $permiso = Permission::find($id);
        $permiso->name = $request->input('name');
        $permiso->save();
        return redirect()->route('permisos.index');

    }

    public function destroy(string $id)
    {
        DB::table("permissions")->where('id', $id)->delete();
        return redirect()->route('permisos.index');
    }
}
