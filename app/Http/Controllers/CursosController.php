<?php

namespace App\Http\Controllers;

use App\Models\cursos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class CursosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search'); 
        $curso = cursos::orderBy('id', 'ASC');
        if ($search) {
            $curso->where(function ($query) use ($search) {
                $query->where('id', 'like', '%' . $search . '%')
                    ->orWhere('nombrecurso', 'like', '%' . $search . '%');
            });
        }
        $curso = $curso->get(); 
        return view('Curso.index', compact('curso'));
    }
    public function pdf(Request $request)
    {
        $search = $request->input('search'); // Obtén el valor del campo de búsqueda
        $curso = cursos::orderBy('id', 'ASC');
        // Aplicar búsqueda si se proporciona un término de búsqueda
        if ($search) {
            $curso->where(function ($query) use ($search) {
                $query->where('id', 'like', '%' . $search . '%')
                    ->orWhere('nombrecurso', 'like', '%' . $search . '%');
            });
        }
        $curso = $curso->get(); 
        $pdf = PDF::loadView('Curso.pdf', compact('curso'));
        return $pdf->stream('Curso.pdf');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Curso.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $campos = [

            'nombrecurso' => 'required|string|max:100'
        ];
        $mensaje = [
            'required' => 'El :attribute es requerido',
        ];

        $this->validate($request, $campos, $mensaje);

        $datosCursos = request()->except('_token');
        cursos::insert($datosCursos);
        //return response()->json($datosAlumno);
        return redirect('Curso')->with('mensaje', 'Curso agregado con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(cursos $cursos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cursos = cursos::findOrFail($id);

        return view('Curso.edit', compact('cursos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $campos = [
            'nombrecurso' => 'required|string|max:100',
        ];
        $mensaje = [
            'required' => 'El :attribute es requerido',
        ];

        $this->validate($request, $campos, $mensaje);
        //
        $datosCursos = request()->except(['_token', '_method']);
        cursos::where('id', '=', $id)->update($datosCursos);

        $cursos = cursos::findOrFail($id);
      //  return view('Curso.edit', compact('cursos'));
      return redirect('Curso')->with('mensaje', 'Horario actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        cursos::destroy($id);

        return redirect('Curso')->with('mensaje', 'El curso fue borrado correctamente');
    }
}
