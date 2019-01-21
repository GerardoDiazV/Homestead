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

    <style>
        table {
            margin-top: -7px;
            margin-left: 2px;
        }
        .table > thead > tr:first-child > td,
        .table > tbody > tr:first-child > td {
            border: none;
        }
    </style>
@endsection
@section('content')

    <H1> <center> Editar Actividad de Extension </center></H1>
    <div class="container">
        <form autocomplete="off" method="POST" action="{{route('extension.update',$actividadExtension['id'])}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group row">
                <label for="inputActividad" class="col-sm-2 col-form-label">Nombre de actividad</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name= "nombre" id="inputActividad" value ="{{ $actividadExtension['nombre'] }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputLocalizacion" class="col-sm-2 col-form-label">Localización</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name= "localizacion" id="inputLocalizacion" value ="{{ $actividadExtension['localizacion'] }}">
                </div>
            </div>


            <div class="form-group row">
                <label for="inputFecha" class="col-sm-2 col-form-label">Fecha</label>
                <div class="col-sm-3">
                    <input id="datepicker" onkeydown="return false" class="date" name = "fecha" width="292" value ="{{ $actividadExtension['fecha']}}"/>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputAsistentes" class="col-sm-2 col-form-label">Cantidad de asistentes</label>
                <div class="col-sm-3">
                    <input type="number" class="form-control" name= "cant_asistentes" id="inputAsistentes"
                           min = 1 onkeypress='return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57'
                           value ="{{ $actividadExtension['cant_asistentes'] }}">
                </div>
            </div>


            <div class = "form-group row ">
                <div class="col-sm-2 "></div>
                <div class="col-sm-3 ">
                    ​<figure>
                        <img class = "img-thumbnail" src="{{$actividadExtension['evidencia']}}">
                        <figcaption class="figure-caption">Evidencia actual.</figcaption>
                    </figure>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEvidencia" class="col-sm-2 col-form-label">Evidencia de lista de asistentes</label>
                <div class="col-sm-3">
                    <input type="file" class="form-control file" name="inputEvidencia" id="inputEvidencia" value ="{{ $actividadExtension['evidencia'] }}">
                </div>
            </div>



            <div class="form-group row">
                <table class="table">
                    <thead class="thead-light">
                    <caption>Fotografias Registradas</caption>
                    <tr>
                        <th scope="col">Nombre Archivo</th>
                        <th scope="col">Miniatura</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($fotografias as $key => $foto)
                        <tr>
                            <th scope="row">{{$nombresFotos[$key]}}</th>
                            <td><img class=" col-sm-2 img-thumbnail" src="{{$foto['fotografia']}}"></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="form-group row">
                <label for="inputFotosa" class="col-sm-2 col-form-label">(Opcional) Fotografias</label>
                <div class="col-sm-3">
                    <input type="file" class="form-control file" name="inputFotos[]" id="inputFotos" multiple>
                </div>
            </div>



            <div class="form-group row">
                <label for="exampleFormControlSelect1" class = "col-sm-2 col-form-label">Convenio asociado</label>
                <div class = "col-sm-3">
                    <select class="form-control" id="convenioSelect" name= "convenio_id">
                        <option value="">Ninguno</option>
                        @foreach($convenios as $convenio)
                            @if($convenio->id == $actividadExtension['convenio_id'])
                                <option value="{{$convenio->id}}" selected>Fecha inicio: {{$convenio->fecha_inicio}},
                                    Empresa Convenio: {{$convenio->organizacion()->first()->nombre}},
                                    Tipo Convenio: {{$convenio->tipo_convenio}}
                            @else
                                <option value="{{$convenio->id}}">Fecha inicio: {{$convenio->fecha_inicio}},
                                    Empresa Convenio: {{$convenio->organizacion()->first()->nombre}},
                                    Tipo Convenio: {{$convenio->tipo_convenio}}
                                </option>
                            @endif
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="form-group row">
                <table id="myTable" class=" table order-list " style="width: 40.0%">
                    <thead>
                    <tr>
                        <td class = "col-sm-12">Orador/es</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <input type="text" name="oradores[]" class="form-control col-sm-10" value = "{{$oradores->first()['orador']}}"/>
                        </td>
                        <td colspan="5" style="text-align: left;">
                            <input type="button" class="btn btn-md" id="addrow" value="Añadir otra persona" />
                        </td>
                    </tr>
                    @foreach($oradores as $key => $orador)
                        @if ($key > 0)
                            <tr>
                                <td>
                                    <input type="text" class="form-control col-sm-10" name="oradores[]" value = "{{$orador['orador']}}"/>
                                </td>
                                <td>
                                    <input type="button" class="ibtnDel btn btn-md btn-danger "  value="Borrar">
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="form-group row">
                <table id="myTable2" class=" table order-list " style="width: 40.0%">
                    <thead>
                    <tr>
                        <td class = "col-sm-12">Organizador/es</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <input type="text" name="organizadores[]" class="form-control col-sm-10" value = "{{$organizadores->first()['organizador']}}" />
                        </td>
                        <td colspan="5" style="text-align: left;">
                            <input type="button" class="btn btn-md" id="addrow2" value="Añadir otra persona" />
                        </td>
                    </tr>
                    @foreach($organizadores as $key => $organizador)
                        @if ($key > 0)
                            <tr>
                                <td>
                                    <input type="text" class="form-control col-sm-10" name="organizadores[]" value = "{{$organizador['organizador']}}"/>
                                </td>
                                <td>
                                    <input type="button" class="ibtnDel btn btn-md btn-danger "  value="Borrar">
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
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
                            <a type="button" class="btn btn-primary" href="{{route('extension.index')}}" role="button">Cancelar registro</a>
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





            <script>


                // Multiple Rows:

                $(document).ready(function () {
                    var counter = 0;

                    $('.date').datepicker({
                        forceparse: true,
                        autoclose: true,
                        format: 'yyyy-mm-dd',
                        uiLibrary: 'bootstrap4'
                    });


                    $("#addrow").on("click", function () {
                        var newRow = $("<tr>");
                        var cols = "";
                        cols += '<td><input type="text" class="form-control col-sm-10" name="oradores[]"/></td>';
                        cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Borrar"></td>';
                        newRow.append(cols);
                        $("#myTable.order-list").append(newRow);
                        counter++;
                    });
                    $("#addrow2").on("click", function () {
                        var newRow = $("<tr>");
                        var cols = "";

                        cols += '<td><input type="text" class="form-control col-sm-10" name="organizadores[]"/></td>';
                        cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Borrar"></td>';
                        newRow.append(cols);
                        $("#myTable2.order-list").append(newRow);
                        counter++;
                    });


                    $("table.order-list").on("click", ".ibtnDel", function (event) {
                        $(this).closest("tr").remove();
                        counter -= 1
                    });


                });

            </script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
                    crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
                    crossorigin="anonymous"></script>

        </form>
    </div>
@endsection

