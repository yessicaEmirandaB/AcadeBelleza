<?php

namespace App\Http\Controllers;
use App\Models\Alumnos;
use App\Models\cursos;
use App\Models\Detalle_alumnos_cursos;
use Illuminate\Http\Request;

class DetalleAlumnosCursosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //´
        
        $alumno=Alumnos::find(1);
        $curso=cursos::find(2);
        return view('detalle_alumno_curso.index',compact('alumno','curso'));
        
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
    public function show(Detalle_alumnos_cursos $detalle_alumnos_cursos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Detalle_alumnos_cursos $detalle_alumnos_cursos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Detalle_alumnos_cursos $detalle_alumnos_cursos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Detalle_alumnos_cursos $detalle_alumnos_cursos)
    {
        //
    }
}
