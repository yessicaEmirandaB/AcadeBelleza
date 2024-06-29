<?php

namespace App\Http\Controllers;

use App\Models\Alumnos;
use App\Models\cursos;

use App\Models\Alumnoscursos;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class AlumnoscursosController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-ver-usuarios');
        $this->middleware('permission:crear-ver-usuarios');
        $this->middleware('permission:editar-ver-usuarios');
        $this->middleware('permission:borrar-ver-usuarios');
    }
    public function index(Request $request)
    {
        $search = $request->input('search'); // Obtén el valor del campo de búsqueda

        $detalles = Alumnos::join('alumnoscursos', 'alumnos.id', '=', 'alumnoscursos.Alumnos_id')
            ->join('cursos', 'cursos.id', '=', 'alumnoscursos.cursos_id')
            ->select('alumnos.*', 'cursos.*', 'alumnoscursos.*')
            ->when($search, function ($query, $search) {
                return $query->where('alumnos.Nombres', 'like', '%' . $search . '%')
                    ->orWhere('alumnos.Apellidos', 'like', '%' . $search . '%')
                    ->orWhere('cursos.nombrecurso', 'like', '%' . $search . '%');
            })
            ->paginate(3); // Pagina los resultados

        return view('AlumnoCurso.index', compact('detalles'));
    }
    public function pdf(Request $request)
    {
        $search = $request->input('search'); // Obtén el valor del campo de búsqueda

        $detalles = Alumnos::join('alumnoscursos', 'alumnos.id', '=', 'alumnoscursos.Alumnos_id')
            ->join('cursos', 'cursos.id', '=', 'alumnoscursos.cursos_id')
            ->select('alumnos.*', 'cursos.*', 'alumnoscursos.*')
            ->when($search, function ($query, $search) {
                return $query->where('alumnos.Nombres', 'like', '%' . $search . '%')
                    ->orWhere('alumnos.Apellidos', 'like', '%' . $search . '%')
                    ->orWhere('cursos.nombrecurso', 'like', '%' . $search . '%');
            })
            ->get();

        $pdf = Pdf::loadView('AlumnoCurso.pdf', compact('detalles'));
        return $pdf->stream();
        // return $pdf->download('alumnos_cursos.pdf'); // Para descargar directamente
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $alumnos = Alumnos::all();
        $cursos = cursos::all();
        return view('AlumnoCurso.create', compact('alumnos', 'cursos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Alumnos_id' => 'nullable|exists:alumnos,id',
            'cursos_id' => 'nullable|exists:cursos,id',

        ]);

        $datosDetalle = request()->except('_token');
        Alumnoscursos::insert($datosDetalle);

        return redirect('AlumnoCurso')->with('mensaje', 'creada con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Alumnoscursos $alumnoscursos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $detalle = Alumnoscursos::findOrFail($id);
        $alumnos = Alumnos::all();
        $cursos = cursos::all();
        return view('AlumnoCurso.edit', compact('detalle', 'alumnos', 'cursos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'Alumnos_id' => 'nullable|exists:alumnos,id',
            'cursos_id' => 'nullable|exists:cursos,id',
        ]);

        $datosDetalle = $request->except(['_token', '_method']);
        Alumnoscursos::where('id', '=', $id)->update($datosDetalle);

        return redirect('AlumnoCurso')->with('mensaje', 'Actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        Alumnoscursos::destroy($id);
        return redirect('AlumnoCurso')->with('mensaje', 'Eliminado con éxito');
    }
}
