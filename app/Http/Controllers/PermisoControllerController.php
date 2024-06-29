<?php

namespace App\Http\Controllers;

use App\Models\PermisoController;
use Illuminate\Http\Request;
use Spatie\Permission\Contracts\Permission;

class PermisoControllerController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:ver-permisos', ['only' => ['index', 'show']]);
        $this->middleware('permission:crear-permisos', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-permisos', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-permisos', ['only' => ['destroy']]);
    }

    public function index()
    {

        return view('sistema.user.permisos', compact('permisos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PermisoController $permisoController)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PermisoController $permisoController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PermisoController $permisoController)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PermisoController $permisoController)
    {
        //
    }
}
