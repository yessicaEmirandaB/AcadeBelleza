<h1>{{ $modo }} Curso </h1>

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
<label for="nombrecurso"> nombrecurso </label>
<input type="text" class="form-control" name="nombrecurso" value="{{isset($cursos->nombrecurso)?$cursos->nombrecurso:old('nombrecurso')}}" id="nombrecurso">
<br>
</div>

<input class="btn btn-success" type="submit" value="{{ $modo }} datos">

<a class="btn btn-primary" href="{{url('Curso/')}}">Regresar</a>
<br>