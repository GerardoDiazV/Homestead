@extends('UCN_layout')
@section('title')Registrar actividad aprendizaje + servicio
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
            }</style>

@endsection
@section('content')

    <H1> <center> Registrar Actividad de Aprendizaje + Servicio </center> </H1>
<div class="container">
    <form autocomplete="off" method="POST" action="{{route('asp.store')}}" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group row">
            <label for="exampleFormControlSelect1"class="col-sm-2 col-form-label">Asignatura</label>
            <div class="col-sm-3">
            <select class="form-control" id="asignaturasSelect" name= "nombre_asign">
                <option value="" disabled selected> Seleccione asignatura</option>
                @foreach($asignaturas as $asignatura)
                    @if($asignatura->nombre_asign == old('nombre_asign'))
                        <option selected value="{{$asignatura->nombre_asign}}">{{$asignatura->nombre_asign}}
                    @else
                        <option value="{{$asignatura->nombre_asign}}">{{$asignatura->nombre_asign}}
                    @endif
                    </option>
                @endforeach
            </select>
            </div>
        </div>


        <div class="form-group row">
            <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Periodo</label>
            <div class="col-sm-3">
                <select class="form-control" name = "periodo" id="exampleFormControlSelect1">
                    <option value="" disabled selected> Seleccione año/semestre</option>
                    @if('2018-2' == old('periodo'))
                        <option selected>2018-2</option>
                    @else
                        <option>2018-2</option>
                    @endif
                    @if('2018-1' == old('periodo'))
                        <option selected>2018-1</option>
                    @else
                        <option>2018-1</option>
                    @endif
                    @if('2017-2' == old('periodo'))
                        <option selected>2017-2</option>
                    @else
                        <option>2017-2</option>
                    @endif
                    @if('2017-1' == old('periodo'))
                        <option selected>2017-1</option>
                    @else
                        <option>2017-1</option>
                    @endif
                    @if('2016-2' == old('periodo'))
                        <option selected>2016-2</option>
                    @else
                        <option>2016-2</option>
                    @endif
                    @if('2016-1' == old('periodo'))
                        <option selected>2016-1</option>
                    @else
                        <option>2016-1</option>
                    @endif
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="inputEstudiantes" class="col-sm-2 col-form-label">Cantidad de estudiantes</label>
            <div class="col-sm-3">
                <input value = "{{old('cant_estudiantes')}}" type="number" class="form-control" name= "cant_estudiantes" id="inputEstudiantes"
                       min = 0 onkeypress='return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57'>
            </div>
        </div>




        <div class="form-group row">
            <table id="myTable" class=" table order-list " style="width: 40.0%">
                <thead>
                <tr>
                    <td class = "col-sm-12  border-bottom">Profesor/es</td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <select class="form-control" id="profesorSelect" name= "nombre_profesor[]">
                            <option value= ""  selected> Seleccione profesor</option>
                            @foreach($profesores as $profesor)
                                <option value="{{$profesor->nombre_profesor}}">{{$profesor->nombre_profesor}}
                                </option>
                            @endforeach
                        </select>
                    </td>
                    <td colspan="5" style="text-align: left;">
                        <input type="button" class="btn btn-md" id="addrow" value="Añadir otra persona" />
                    </td>
                </tr>

                </tbody>
                <tfoot>
                <tr>
                </tr>
                </tfoot>
            </table>
        </div>

        <div class = "form-group row border-bottom">
            <label for="nombreEstudiante" class="col-sm-1 col-form-label">Socios Comunitarios:</label>
        </div>
        <div class="form-group row">
            <label for="nombreEstudiante" class="col-sm-1 col-form-label">Socio</label>
            <div class="col-sm-3">
                <select class="form-control" id="organizacionesSelect" name= "organizacion_id[]">
                    <option value=""  selected> Seleccione socio comunitario</option>
                    @foreach($organizaciones as $socio)
                        <option value="{{$socio->id}}">{{$socio->nombre}}
                        </option>
                    @endforeach
                </select>
            </div>
            <label for="inputEvidencia" class="col-sm-1 col-form-label">Evidencia</label>
            <div class="col-sm-3">
                <input value = null type="file" class="form-control file" name="inputEvidencia[]" id="inputEvidencia">
            </div>
        </div>
        <div class = "dinamicInputSpace" id="tableDinamicInput2"></div>
        <div class="form-group row col-sm-3 pt-2 pb-5">
            <button id = "addrow2" class="col-sm-8 col-form label btn btn-default btn-add" type="button">
                Añadir otra persona
            </button>
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
                        <a type="button" class="btn btn-primary" href="{{route('asp.index')}}" role="button">Cancelar registro</a>
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
    <script>

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
                cols += '                     <td>\n' +
                    '                        <select class="form-control" id="profesorSelect" name= "nombre_profesor[]">\n' +
                    '                            <option value="" selected> Seleccione profesor</option>\n' +
                    '                            @foreach($profesores as $profesor)\n' +
                    '                                <option value="{{$profesor->nombre_profesor}}">{{$profesor->nombre_profesor}}\n' +
                    '                                </option>\n' +
                    '                            @endforeach\n' +
                    '                        </select>\n' +
                    '                    </td>\n' +
                    '                    <td colspan="5" style="text-align: left;">\n' +
                    '                        <input type="button" class="ibtnDel btn btn-md btn-danger" value="Borrar" />\n' +
                    '                    </td>';
                newRow.append(cols);
                $("#myTable").append(newRow);
                counter++;
            });

            $("#addrow2").on("click", function () {
                var newRow = $('<div class = "DinamicInput pt-4" >');
                var cols = "";
                cols += '</div>\n' +
                    '        <div class="form-group row">\n' +
                    '            <label for="nombreEstudiante" class="col-sm-1 col-form-label">Socio</label>\n' +
                    '            <div class="col-sm-3">\n' +
                    '                <select class="form-control" id="organizacionesSelect" name= "organizacion_id[]">\n' +
                    '                    <option value="" selected> Seleccione socio comunitario</option>\n' +
                    '                    @foreach($organizaciones as $socio)\n' +
                    '                        <option value="{{$socio->id}}">{{$socio->nombre}}\n' +
                    '                        </option>\n' +
                    '                    @endforeach\n' +
                    '                </select>\n' +
                    '            </div>\n' +
                    '            <label for="inputEvidencia" class="col-sm-1 col-form-label">Evidencia</label>\n' +
                    '            <div class="col-sm-3">\n' +
                    '                <input type="file" class="form-control file" name="inputEvidencia[]" id="inputEvidencia">\n' +
                    '            </div>\n' +
                    '                <input type="button" class="ibtnDel btn btn-md btn-danger"  value="Borrar">\n' +
                    '            </div>';
                newRow.append(cols);
                $("#tableDinamicInput2").append(newRow);
            });


            $("table.order-list").on("click", ".ibtnDel", function (event) {
                $(this).closest("tr").remove();
            });

            $("#tableDinamicInput2").on("click", ".ibtnDel", function (event) {
                $(this).closest(".DinamicInput").remove();
            });

        });

    </script>
@endsection