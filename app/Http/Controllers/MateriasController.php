<?php

namespace App\Http\Controllers;

use App\Models\Materias;
use App\Models\cursos;
use Illuminate\Http\Request;

class MateriasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $materia=Materias::select('*')->orderBy('id','ASC');
        $limit=(isset($request->limit))?$request->limit:10;

        if(isset($request->search)) {
           $materia=$materia->where('id','like','%'.$request->search.'%')
           ->orWhere('cursos_id','like','%'.$request->search.'%')
           ->orWhere('nombremateria','like','%'.$request->search.'%');
        }
       $materia=$materia->paginate($limit)->appends($request->all());
        return view('Materia.index',['materia'=>$materia]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('Materia.create',['cursos'=>cursos::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $campos=[
            'cursos_id'=>'required|string|max:100',
            'nombremateria'=>'required|string|max:100',
         ];
         $mensaje=[
            'required'=>'El :attribute es requerido',
        ];
        
        $this->validate($request,$campos,$mensaje);

        $datosMateria = request()->except('_token');
        Materias::insert($datosMateria);
        //return response()->json($datosAlumno);
        return redirect('Materia')->with('mensaje','Nueva materia creada con exito');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Materias $materias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $materias=Materias::findOrFail($id);

        return view('Materia.edit',['materias'=>$materias,'cursos'=>cursos::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $campos=[
            'cursos_id'=>'required',
            'nombremateria'=>'required|string|max:100',
         ];
         $mensaje=[
            'required'=>'El :attribute es requerido',
        ];
        
        $materias= Materias::find($id);
        $materias->cursos_id =$request->input('cursos_id');
        $materias->nombremateria =$request->input('nombremateria');
        $materias->save();
        return redirect('Materia')->with('mensaje','La materia fue modificado con exito');

       // return view("Materia.message",['msg'=>"Registro modificado"]);

       // $this->validate($request,$campos,$mensaje);
        //
        //$datosMaterias = request()->except(['_token','_method']);
        //Materias::where('id','=',$id)->update($datosMaterias);

        // $materias=Materias::findOrFail($id);
         //return view('Materia.edit',compact('materias'));
       //return redirect('Curso')->with('mensaje','El curso fue modificado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
         Materias::destroy($id);
        
        return redirect('Materia')->with('mensaje','El curso fue borrado correctamente');
    }
}
