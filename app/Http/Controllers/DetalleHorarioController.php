<?php

namespace App\Http\Controllers;

use App\Models\Aulas;
use App\Models\Detalle_Horario;
use App\Models\Materias;
use Illuminate\Http\Request;

class DetalleHorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $detalles= Materias::join('detalle_horario', 'materias.id' , '=', 'detalle_horario.Materias_id')
                        ->join('aulas', 'aulas.id' , '=', 'detalle_horario.Aula_id')
                        ->select('materias.*', 'aulas.*' , 'detalle_horario.*')->get();
                        // dd($detalles);
       return view('Horario.index',compact('detalles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $aula=Aulas::all();
        $materias=Materias::all();
        return view('Horario.create',compact('aula','materias'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'Materias_id' => 'required',
            'Aula_id' => 'required',
            'Horario' => 'required',
        ]);

        $detalleHorario = new Detalle_Horario([
            'Materias_id' => $request->get('Materias_id'),
            'Aula_id' => $request->get('Aula_id'),
            'Horario' => $request->get('Horario')
        ]);

        $detalleHorario->save();

        return redirect('/Horario')->with('success', 'Detalle de horario guardado!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Detalle_Horario $detalle_Horario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $detalleHorario = Detalle_Horario::find($id);
        $materias = Materias::all();
        $aulas = Aulas::all();
        return view('Horario.edit', compact('detalleHorario', 'materias', 'aulas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'Materias_id' => 'required',
            'Aula_id' => 'required',
            'Horario' => 'required',
        ]);

        $detalleHorario = Detalle_Horario::find($id);
        $detalleHorario->Materias_id = $request->get('Materias_id');
        $detalleHorario->Aula_id = $request->get('Aula_id');
        $detalleHorario->Horario = $request->get('Horario');
        $detalleHorario->save();

        return redirect('/Horario')->with('success', 'Detalle de horario actualizado!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $detalleHorario = Detalle_Horario::find($id);
        $detalleHorario->delete();

        return redirect('/Horario')->with('success', 'Detalle de horario eliminado!');
    }
}
