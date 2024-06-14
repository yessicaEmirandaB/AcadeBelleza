<?php

namespace App\Http\Controllers;

use App\Models\Aulas;
use Illuminate\Http\Request;

class AulasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $aula=Aulas::select('*')->orderBy('id','ASC');
        $limit=(isset($request->limit))?$request->limit:10;

        if(isset($request->search)) {
           $aula=$aula->where('id','like','%'.$request->search.'%')
           ->orWhere('NumAula','like','%'.$request->search.'%')
           ->orWhere('Capacidad','like','%'.$request->search.'%');
        }
       $aula=$aula->paginate($limit)->appends($request->all());
        return view('Aula.index',['aula'=>$aula]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Aula.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $campos=[
            'NumAula'=>'required|string|max:100',
            'Capacidad'=>'required|string|max:100',
         ];
         $mensaje=[
            'required'=>'El :attribute es requerido',
        ];

        $this->validate($request,$campos,$mensaje);

        $datosAula = request()->except('_token');
        Aulas::insert($datosAula);
        //return response()->json($datosAlumno);
        return redirect('Aula')->with('mensaje','Nueva Aula creada con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Aulas $aulas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $aulas=Aulas::findOrFail($id);

        return view('Aula.edit',compact('aulas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        //
        $campos=[
            'NumAula'=>'required|string|max:100',
            'Capacidad'=>'required|string|max:100',
         ];
         $mensaje=[
            'required'=>'El :attribute es requerido',
        ];
        
        $aulas= Aulas::find($id);
        $aulas->NumAula =$request->input('NumAula');
        $aulas->Capacidad =$request->input('Capacidad');
        $aulas->save();
        return redirect('Aula')->with('mensaje','El Aula fue modificado con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        Aulas::destroy($id);
        
        return redirect('Aula')->with('mensaje','El Aula fue borrado correctamente');
    }
}
