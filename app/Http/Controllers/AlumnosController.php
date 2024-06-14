<?php

namespace App\Http\Controllers;

use App\Models\Alumnos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
class AlumnosController extends Controller
{
    function _construct()
    {
        // $this->middleware('permission:ver-alumno|crear-rol|crear-alumno|editar-alumno|borrar-alumno',['only'=>['index']]);
        // $this->middleware('permission:crear-alumno',['only'=>['create','store']]);
        // $this->middleware('permission:editar-alumno',['only'=>['edit','update']]);
        // $this->middleware('permission:borrar-alumno',['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        /*$alumnos=Alumnos::get();*/
        $alumno=Alumnos::select('*')->orderBy('id','ASC');
        $limit=(isset($request->limit))?$request->limit:10;

        if(isset($request->search)) {
           $alumno=$alumno->where('id','like','%'.$request->search.'%')
           ->orWhere('Apellidos','like','%'.$request->search.'%')
           ->orWhere('Nombres','like','%'.$request->search.'%')
           ->orWhere ('CI','like','%'.$request->search.'%')
           ->orWhere('Direccion','like','%'.$request->search.'%')
           ->orWhere('Celular','like','%'.$request->search.'%')
           ->orWhere('Correo','like','%'.$request->search.'%');
        }


       /* $datos['alumno']=Alumnos::paginate(3);*/
       $alumno=$alumno->paginate($limit)->appends($request->all());
        return view('Alumno.index',compact('alumno'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users=User::all();
        return view('Alumno.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
         $campos=[
            'Apellidos'=>'required|string|max:100',
            'Nombres'=>'required|string|max:100',
            'CI'=>'required|string|max:100',
            'Direccion'=>'required|string|max:100',
            'Celular'=>'required|string|max:100',
            'Correo'=>'required|email',
            'Foto'=>'required|max:10000|mimes:jpeg,png,jpg',
         ];
         $mensaje=[
            'required'=>'El :attribute es requerido',
            'Foto.required'=>'La foto requerida'
        ];

        $this->validate($request,$campos,$mensaje);

        $datosAlumno = request()->except('_token');
        if($request->hasFile('Foto')){
            $datosAlumno['Foto']=$request->file('Foto')->store('uploads','public');
        }
        Alumnos::insert($datosAlumno);
        //return response()->json($datosAlumno);
        return redirect('Alumno')->with('mensaje','Alumno agregado con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        // $alumno = Alumnos::findOrFail($id);
        //return view('Alumno.show', ['alumno' => $alumno]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $alumnos=Alumnos::findOrFail($id);
        $users=User::all();
        return view('Alumno.edit',compact('users', 'alumnos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $campos=[
            'Apellidos'=>'required|string|max:100',
            'Nombres'=>'required|string|max:100',
            'CI'=>'required|string|max:100',
            'Direccion'=>'required|string|max:100',
            'Celular'=>'required|string|max:100',
            'Correo'=>'required|email',
         ];
         $mensaje=[
            'required'=>'El :attribute es requerido',
        ];

        if($request->hasFile('Foto')){
            $campos=['Foto'=>'required|max:10000|mimes:jpeg,png,jpg'];
            $mensaje=['Foto.required'=>'La foto requerida'];
        }
        $this->validate($request,$campos,$mensaje);
        //
        $datosAlumno = request()->except(['_token','_method']);

        if($request->hasFile('Foto')){
            $alumnos=Alumnos::findOrFail($id);
            Storage::delete('public/'.$alumnos->Foto);
            $datosAlumno['Foto']=$request->file('Foto')->store('uploads','public');
        }

        Alumnos::where('id','=',$id)->update($datosAlumno);

         $alumnos=Alumnos::findOrFail($id);
       // return view('Alumno.edit',compact('alumnos'));
       return redirect('Alumno')->with('mensaje','El alumno fue modificado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $alumnos=Alumnos::findOrFail($id);
        if(Storage::delete('public/'.$alumnos->Foto)){

           Alumnos::destroy($id);
        }

        return redirect('Alumno')->with('mensaje','El alumno borrado correctamente');
    }
    public function prueba()
    {
        $role = Role::where('name', '=', 'supervisor')->first();
       $permissions = Permission::where('name', 'like', '%alumnos%')->get();
        dd($role);
    }
}
