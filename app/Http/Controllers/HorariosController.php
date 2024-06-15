<?php

namespace App\Http\Controllers;

use App\Models\Aulas;
use App\Models\Materias;
use App\Models\Horarios;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class HorariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        /*  $detalles = Materias::join('horarios', 'materias.id', '=', 'horarios.Materias_id')
            ->join('aulas', 'aulas.id', '=', 'horarios.Aulas_id')
            ->select('materias.*', 'aulas.*', 'horarios.*')->get();
        // dd($detalles);
        return view('Horario.index', compact('detalles'));*/

        $detalles = Horarios::with('aulas', 'materias')->get();
            // dd($detalles);

        return view('Horario.index', compact('detalles'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $aulas = Aulas::all();
        $materias = Materias::all();
        return view('Horario.create', compact('aulas', 'materias'));

        // $aula = Aulas::all();
        // $materias = Materias::all();
        // return view('Horario.create', ['aula' => $aula, 'materias' => $materias]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // $horarios = new Horarios($request->all());
        // $horarios->save();
        //foreach ($request->Aulas_id as $Aulas_id) {
        //  $horarios->aulas()->attach($Aulas_id);
        //}
        //return redirect()->action([HorariosController::class, 'index']);

        $request->validate([
            'Aulas_id' => 'nullable|exists:aulas,id',
            'Materias_id' => 'nullable|exists:materias,id',
            'HoraInicio' => 'required|string|max:20',
            'HoraFinal' => 'required|string|max:20',
        ]);

        //  Horarios::create($request->all());

        //  return redirect()->action([HorariosController::class, 'index']);

        $datosMateria = request()->except('_token');
        Horarios::insert($datosMateria);
        //return response()->json($datosAlumno);
        return redirect('Horario')->with('mensaje', 'Nueva materia creada con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Horarios $horarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $detalle = Horarios::findOrFail($id);
        $aulas = Aulas::all();
        $materias = Materias::all();
        return view('Horario.edit', compact('detalle', 'aulas', 'materias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'Aulas_id' => 'nullable|exists:aulas,id',
            'Materias_id' => 'nullable|exists:materias,id',
            'HoraInicio' => 'required|string|max:20',
            'HoraFinal' => 'required|string|max:20',
        ]);

        $datosMateria = $request->except(['_token', '_method']);
        Horarios::where('id', '=', $id)->update($datosMateria);

        return redirect('Horario')->with('mensaje', 'Horario actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        Horarios::destroy($id);
        return redirect('Horario')->with('mensaje', 'Horario eliminado con éxito');
    }
}
