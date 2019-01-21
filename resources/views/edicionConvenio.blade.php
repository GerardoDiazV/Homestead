@extends('UCN_layout')

@section('title')Registrar convenio
@endsection

@section('pre-body')
    @if ($errors->any())
        <div class="alert alert-danger">
            <p><strong>ERROR:</strong> Por favor corregir los siguientes errores</p>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
@section('content')
    <div class="container">
        <form autocomplete="off" method="POST" action="{{route('convenio.update',$convenio['id'])}} " enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group row">
                <label for="inputOrganizacion" class="col-sm-2 col-form-label"> Nombre de organización</label>
                <select class="form-control col-sm-3" id="convenioSelect" name= "convenio_id">
                    <option value="" disabled selected>Seleccione Organizacion</option>
                    @foreach($organizacions as $organizacion)
                        @if($convenio['organizacion_id'] == $organizacion->id)
                            <option value="{{$organizacion->id}}" selected>
                                Organizacion: {{$organizacion->nombre}}
                            </option>
                        @else
                            <option value="{{$organizacion->id}}">
                                Organizacion: {{$organizacion->nombre}}
                            </option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group row">
                <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Tipo de convenio</label>
                <div class="col-sm-3">
                    <select class="form-control" name = "tipo_convenio" id="tipoSelect">
                        <option value="" disabled selected>Seleccione tipo de convenio</option>
                        @if($convenio['tipo_convenio'] == 'Capstone')
                            <option selected>Capstone</option>
                        @else
                            <option>Capstone</option>
                        @endif
                        @if($convenio['tipo_convenio'] == 'Marco')
                            <option selected>Marco</option>
                        @else
                            <option>Marco</option>
                        @endif
                        @if($convenio['tipo_convenio'] == 'Especifico')
                            <option selected>Especifico</option>
                        @else
                            <option>Especifico</option>
                        @endif
                        @if($convenio['tipo_convenio'] == 'A+S')
                            <option selected>Aprendizaje + Servicio</option>
                        @else
                            <option>Aprendizaje + Servicio</option>
                        @endif
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputFechaInicio" class="col-sm-2 col-form-label">Fecha Inicio</label>
                <div class="col-sm-3">
                    <input id="datepicker" onkeydown="return false" class="date" name = "fecha_inicio" width="276" value="{{$convenio['fecha_inicio']}}" />
                </div>
            </div>

            <div class="form-group row">
                <label for="inputFechaTermino" class="col-sm-2 col-form-label">Fecha Término</label>
                <div class="col-sm-3">
                    <input onkeydown="return false" id="datepicker2" class="date" name = "fecha_termino" width="276" value="{{$convenio['fecha_termino']}}" />
                </div>
            </div>

            <div class = "form-group row ">
                <div class="col-sm-2 "></div>
                <div class="col-sm-3 ">
                    ​<figure>
                        <img class = "img-thumbnail" src="{{$convenio['evidencia']}}">
                        <figcaption class="figure-caption">Evidencia actual.</figcaption>
                    </figure>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEvidencia" class="col-sm-2 col-form-label">Evidencia</label>
                <div class="col-sm-3">
                    <input type="file" class="form-control file" name="inputEvidencia" id="inputEvidencia" value="{{$convenio['evidencia']}}">
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
                            <a type="button" class="btn btn-primary" href="{{route('convenio.index')}}" role="button">Cancelar registro</a>
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

            <script>
                $(document).ready(function () {


                    $('#datepicker').datepicker({
                        forceparse: true,
                        autoclose: true,
                        format: 'yyyy-mm-dd',
                        uiLibrary: 'bootstrap4'
                    });

                    $('#datepicker2').datepicker({
                        forceparse: true,
                        autoclose: true,
                        format: 'yyyy-mm-dd',
                        uiLibrary: 'bootstrap4'
                    });
                });
            </script>

        </form>
    </div>


    <!-- Optional JavaScript -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{asset('https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo')}}" crossorigin="anonymous"></script>
    <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut')}}" crossorigin="anonymous"></script>
    <script src="{{asset('https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k')}}" crossorigin="anonymous"></script>

@endsection