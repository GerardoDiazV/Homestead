@extends('UCN_layout')


    @section('title')Registrar actividad aprendizaje + servicio
    @endsection

@section('content')

<div class="container">
    <form autocomplete="off" method="POST" action="{{url('/registroASP')}}">
        {{ csrf_field() }}
        <div class="form-group row">
            <label for="inputActividad" class="col-sm-2 col-form-label">Nombre de actividad</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name= "nombre" id="inputActividad">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputAsigntura" class="col-sm-2 col-form-label">Asignatura</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name= "asignatura" id="inputAsignatura">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputProfesor" class="col-sm-2 col-form-label">Profesor</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name= "profesor" id="inputProfesor">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPeriodo" class="col-sm-2 col-form-label">Periodo</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name= "periodo" id="inputPeriodo">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEstudiantes" class="col-sm-2 col-form-label">Cantidad de estudiantes</label>
            <div class="col-sm-3">
                <input type="number" class="form-control" name= "cant_estudiantes" id="inputEstudiantes"
                       min = 0 onkeypress='return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57'>
            </div>
        </div>

        <div class="form-group row">
            <label for="inputOrganizacion" class="col-sm-2 col-form-label">Nombre socio comunitario</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name= "nombre_organizacion" id="inputOrganizacion">
            </div>
        </div>

        <div class="form-group row">
            <label for="inputEvidencia" class="col-sm-2 col-form-label">Evidencia</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name= "evidencia" id="inputEvidencia">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-2">
        <span class="border">
          <button type="submit" class="btn btn-secondary">Confirmar</button>
        </span>
            </div>
            <div class="col-sm-3">
        <span class="border">
            <a class="btn btn-secondary" href="{{route('menuRegistros')}}" role="button">Cancelar</a>
        </span>
            </div>
        </div>


    </form>
</div>

</body>
</html>
    @endsection