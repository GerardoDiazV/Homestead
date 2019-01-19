@extends('UCN_layout')

@section('title')Registrar actividad de extension
@endsection

@section('pre-body')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
@section('content')
    <H1> <center> Edición Actividad de Aprendizaje + Servicio </center> </H1>

    <div class="container">
        <form autocomplete="off" method="POST" action="{{route('asp.update',$actividadASP['id']}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group row">
                <label for="inputActividad" class="col-sm-2 col-form-label">Nombre de actividad</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name= "nombre" id="inputActividad" value ="{{ $actividadASP['nombre'] }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="exampleFormControlSelect1"class="col-sm-2 col-form-label">Asignatura</label>
                <div class="col-sm-3">
                    <select class="form-control" id="asignaturasSelect" name= "nombre_asign" value="{{ $actividadASP['asignatura'] }}">
                        <option value="" disabled selected> Seleccione asignatura</option>
                        @foreach($asignaturas as $asignatura)
                            <option value="{{$asignatura->id}}">{{$asignatura->nombre_asign}},
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="form-group row">
                <label for="exampleFormControlSelect1"class="col-sm-2 col-form-label">Profesor</label>
                <div class="col-sm-3">
                    <select class="form-control" id="profesorSelect" name= "nombre_profesor">
                        <option value="" disabled selected> Seleccione profesor</option>
                        @foreach($profesores as $profesor)
                            <option value="{{$profesor->nombre_profesor}}">{{$profesor->nombre_profesor}},
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="form-group row">
                <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Periodo</label>
                <div class="col-sm-3">
                    <select class="form-control" name = "periodo" id="exampleFormControlSelect1" value="{{ $actividadASP['periodo'] }}">
                        <option value="" disabled selected> Seleccione año/semestre</option>
                        <option>2018-2</option>
                        <option>2018-1</option>
                        <option>2017-2</option>
                        <option>2017-1</option>
                        <option>2016-2</option>
                        <option>2016-1</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEstudiantes" class="col-sm-2 col-form-label">Cantidad de estudiantes</label>
                <div class="col-sm-3">
                    <input type="number" class="form-control" name= "cant_estudiantes" id="inputEstudiantes" value="{{ $actividadASP['cant_estudiantes'] }}"
                           min = 0 onkeypress='return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57'>
                </div>
            </div>

            <div class="form-group row">
                <label for="exampleFormControlSelect1"class="col-sm-2 col-form-label">Nombre socio comunitario</label>
                <div class="col-sm-3">
                    <select class="form-control" id="organizacionesSelect" name= "organizacion_id" value="{{ $actividadASP['organizacion_id'] }}">
                        <option value="" disabled selected> Seleccione socio comunitario</option>
                        @foreach($organizaciones as $socio)
                            <option value="{{$socio->nombre}}">{{$socio->nombre}},
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class = "form-group row ">
                <div class="col-sm-2 "></div>
                <div class="col-sm-3 ">
                    ​<figure>
                        <img class = "img-thumbnail" src="{{$actividadASP['evidencia']}}">
                        <figcaption class="figure-caption">Evidencia actual.</figcaption>
                    </figure>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEvidencia" class="col-sm-2 col-form-label">Evidencia de lista de asistentes</label>
                <div class="col-sm-3">
                    <input type="file" class="form-control file" name="inputEvidencia" id="inputEvidencia" value ="{{ $actividadASP['evidencia'] }}">
                </div>
            </div>


            <div class="form-group row">
                <div class="col-sm-2">
        <span class="border">
          <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#confirmSubmitModal" >Confirmar</button>
        </span>
                </div>
                <div class="col-sm-3">
        <span class="border">
            <button type="button" class="btn btn-secondary"  data-toggle="modal" data-target="#confirmCancelModal"  role="button">Cancelar</button>
        </span>
                </div>
            </div>

            <!-- Cancel Modal -->
            <div class="modal fade" id="confirmCancelModal" tabindex="-1" role="dialog" aria-labelledby="confirmCancelModal" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmCancelModal">Confirmar cancelacion</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ¿Desea cancelar el registro y volver al menu de registros?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Volver al formulario</button>
                            <a type="button" class="btn btn-primary" href="{{route('menu')}}" role="button">Cancelar registro</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Confirmar Modal -->
            <div class="modal fade" id="confirmSubmitModal" tabindex="-1" role="dialog" aria-labelledby="confirmSubmitModal" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmSubmitModal">Confirmar envio</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ¿Esta seguro que desea confirmar el registro?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Volver al formulario</button>
                            <button type="submit" class="btn btn-primary">Confirmar</button>
                        </div>
                    </div>
                </div>
            </div>


            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
                    crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
                    crossorigin="anonymous"></script>


        </form>
    </div>
@endsection