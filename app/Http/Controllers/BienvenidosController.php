<?php

namespace App\Http\Controllers;

use App\Models\Alumnos;
use App\Models\Maestros;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

class BienvenidosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
      
        return view('BIENVENIDO.index');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       
    }
    public function prueba()
    {
       
    }
}
