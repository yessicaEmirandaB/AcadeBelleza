<h1>{{ $modo }} AlumnoCurso </h1>

@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach($errors->all() as $errors)
        <li>{{$errors}}</li>
        @endforeach
    </ul>
</div>
@endif




<div class="form-group">
    <label for="alumnos">Nombre del Alumno</label>
    <select name="Alumnos_id" id="Alumnos_id" class="form-control" required>
    <option value="">Seleccionar alumno</option>
    @foreach ($alumnos as $alumno)
        <option value="{{ $alumno->id }}"@if($alumno->id == $detalle->Alumnos_id) {{'selected'}} @endif>{{ $alumno->Nombres }} {{$detalle->Apellidos}}</option>
    @endforeach
    </select>
</div>

<div class="form-group">
    <label for="cursos_id">Nombre del curso para la inscripcion</label>
    <select name="cursos_id" id="cursos_id" class="form-control" required>
    <option value="">Seleccionar curso</option>
    @foreach ($cursos as $curso)
        <option value="{{ $curso->id }}"@if($curso->id == $detalle->cursos_id) {{'selected'}} @endif>{{ $curso->nombrecurso }}</option>
    @endforeach
    </select>
</div>


<input class="btn btn-success" type="submit" value="{{ $modo }} datos">

<a class="btn btn-primary" href="{{url('AlumnoCurso/')}}">Regresar</a>
<br>