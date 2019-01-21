@extends('UCN_layout')

@section('title')Registrar actividad de titulacion por convenio
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
    <H1> <center> Registrar Actividad de Titulacion por Convenio </center> </H1>
    <div class="container">
        <form autocomplete="off" method="POST" action="{{route('titulacion.store')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group row">
                <label for="inputActividad" class="col-sm-2 col-form-label">Titulo de actividad</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name= "nombre" id="inputActividad" value ="{{ old('nombre') }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputFecha" class="col-sm-2 col-form-label">Fecha Inicio</label>
                <div class="col-sm-3">
                    <input id="datepicker" onkeydown="return false" class="date" name = "fechaInicio" width="292" value ="{{ old('fechaInicio') }}"/>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputFecha2" class="col-sm-2 col-form-label">Fecha Termino</label>
                <div class="col-sm-3">
                    <input id="datepicker2" onkeydown="return false" class="date" name = "fechaTermino" width="292" value ="{{ old('fechaTermino') }}"/>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputEvidencia" class="col-sm-2 col-form-label">Evidencia de formulario de inscripcion</label>
                <div class="col-sm-3">
                    <input type="file" class="form-control file" name="inputEvidencia" id="inputEvidencia">
                </div>
            </div>

            <div class="form-group row">
                <label for="exampleFormControlSelect1" class = "col-sm-2 col-form-label">Convenio asociado</label>
                <div class = "col-sm-3">
                <select class="form-control" id="convenioSelect" name= "convenio_id">
                    <option value="" disabled selected>Seleccione convenio relacionado</option>
                    @foreach($convenios as $convenio)
                        <option value="{{$convenio->id}}">Fecha inicio: {{$convenio->fecha_inicio}},
                            Empresa Convenio: {{$convenio->organizacion()->first()->nombre}},
                            Tipo Convenio: {{$convenio->tipo_convenio}}
                        </option>
                    @endforeach
                </select>
                </div>
            </div>

            <div class = "form-group row">
                <label for="nombreProfesor" class="col-sm-1 col-form-label">Profesor/es Guia:</label>
            </div>
            <div class="form-group row">
                <label for="profesores" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name= "profesores[]" id="profesores">
                </div>
            </div>
            <div class = "dinamicInputSpace" id="tableDinamicInput1"></div>
            <div class="form-group row col-sm-3 pt-2">
                <button id = "addrow" class="col-sm-8 col-form label btn btn-default btn-add" type="button">
                    Añadir otra persona
                </button>
            </div>



            <div class = "form-group row">
                <label for="nombreEstudiante" class="col-sm-1 col-form-label">Estudiantes:</label>
            </div>
            <div class="form-group row">
                <label for="nombreEstudiante" class="col-sm-1 col-form-label">Nombre</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name= "nombresEstudiantes[]" id="nombreEstudiante">
                </div>
                <label for="rutEstudiante" class="col-sm-1 col-form-label">Rut</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name= "rutsEstudiantes[]" id="rutEstudiante">
                </div>
                <label for="carreraEstudiante" class="col-sm-1 col-form-label">Carrera</label>
                <div class="col-sm-3">
                    <select class="form-control" name= "carrerasEstudiantes[]" id="carreraEstudiante">
                        <option value="" disabled selected>Seleccione Carrera</option>
                        <option>ICCI</option>
                        <option>IeCI</option>
                    </select>
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
                            <a type="button" class="btn btn-primary" href="{{route('titulacion.index')}}" role="button">Cancelar registro</a>
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
                            ¿Esta seguro que desea confirmar el registro??
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
                    var counter1 = 0;
                    var counter2 = 0;
                    var hidden1 = false;
                    var hidden2 = false;

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




                    $("#addrow").on("click", function () {

                        if(counter1<1){
                        var newRow = $('<div class = "DinamicInput pt-4" >');
                        var cols = "";
                        cols += '             <div class="form-group row">\n' +
                            '                <label for="profesores" class="col-sm-2 col-form-label">Nombre</label>\n' +
                            '                <div class="col-sm-3">\n' +
                            '                    <input type="text" class="form-control" name= "profesores[]" id="profesores">\n' +
                            '                </div>\n' +
                            '                <input type="button" class="ibtnDel btn btn-md btn-danger"  value="Borrar">\n' +
                            '            </div>'
                        newRow.append(cols);
                        $("#tableDinamicInput1").append(newRow);
                        counter1++;
                        document.getElementById('addrow').style.visibility = 'hidden';

                        }else{};
                    });
                    $("#addrow2").on("click", function () {
                        if(counter2 < 3) {
                            var newRow = $('<div class = "DinamicInput pt-4" >');
                            var cols = "";
                            cols += '            <div class="form-group row">\n' +
                                '                <label for="nombreEstudiante" class="col-sm-1 col-form-label">Nombre</label>\n' +
                                '                <div class="col-sm-2">\n' +
                                '                    <input type="text" class="form-control" name= "nombresEstudiantes[]" id="nombreEstudiante">\n' +
                                '                </div>\n' +
                                '                <label for="rutEstudiante" class="col-sm-1 col-form-label">Rut</label>\n' +
                                '                <div class="col-sm-2">\n' +
                                '                    <input type="text" class="form-control" name= "rutsEstudiantes[]" id="rutEstudiante">\n' +
                                '                </div>\n' +
                                '                <label for="carreraEstudiante" class="col-sm-1 col-form-label">Carrera</label>\n' +
                                '                <div class="col-sm-2">\n' +
                                '                    <input type="text" class="form-control" name= "carrerasEstudiantes[]" id="carreraEstudiante">\n' +
                                '                </div>\n' +
                                '                <input type="button" class="ibtnDel btn btn-md btn-danger"  value="Borrar">\n' +
                                '            </div>'
                            newRow.append(cols);
                            $("#tableDinamicInput2").append(newRow);
                            counter2++;
                            if(counter2 == 3){
                                document.getElementById('addrow2').style.visibility = 'hidden';
                            }
                        }

                    });


                    $("#tableDinamicInput1").on("click", ".ibtnDel", function (event) {
                        $(this).closest(".DinamicInput").remove();
                        document.getElementById('addrow').style.visibility = 'visible';
                        counter1 -= 1
                    });

                    $("#tableDinamicInput2").on("click", ".ibtnDel", function (event) {
                        $(this).closest(".DinamicInput").remove();
                        if(counter2 == 3){
                            document.getElementById('addrow2').style.visibility = 'visible';
                        }
                        counter2 -= 1
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

