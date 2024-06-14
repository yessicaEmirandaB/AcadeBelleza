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
    <label for="Aulas_id">Numero de aula </label>
    <select name="Aulas_id" id="Aulas_id" class="form-control" required>
        <option value="">Seleccionar curso</option>
        @foreach ($aulas as $aula)
        <option value="{{ $aula->id }}">{{$aula->NumAula}}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="Materias_id">Nombre de la materia </label>
    <select name="Materias_id" id="Materias_id" class="form-control" required>
        <option value="">Seleccionar Materia</option>
        @foreach ($materias as $materia)
        <option value="{{ $materia->id }}">{{$materia->nombremateria}} </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="HoraInicio"> Hora Inicio </label>
    <input type="text" class="form-control" name="HoraInicio" value="{{isset($detalle->HoraInicio)?$detalle->HoraInicio:old('HoraInicio')}}" id="HoraInicio">
    <br>
</div>

<div class="form-group">
    <label for="HoraFinal"> Hora Final </label>
    <input type="text" class="form-control" name="HoraFinal" value="{{isset($detalle->HoraFinal)?$detalle->HoraFinal:old('HoraFinal')}}" id="HoraFinal">
    <br>
</div>

<br>
<input class="btn btn-success" type="submit" value="{{ $modo }} datos">

<a class="btn btn-primary" href="{{url('Horario/')}}">Regresar</a>
<br>