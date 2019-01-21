@extends('UCN_layout')

@section('title')Registrar Titulados DISC
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
    <H1> <center> Editar Registro Titulados DISC </center> </H1>
    <div class="container">
        <form autocomplete="off" method="POST" action="{{route('titulados.update',$registroTitulado['id'])}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group row">
                <label for="inputNombre" class="col-sm-2 col-form-label">Nombre Titulado</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name= "nombre" id="inputNombre" value ="{{ $registroTitulado['nombre'] }}">
                </div>
            </div>


            <div class="form-group row">
                <label for="inputRut" class="col-sm-2 col-form-label">Rut</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name= "rut" id="inputRut" value ="{{ $registroTitulado['rut'] }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputTelefono" class="col-sm-2 col-form-label">Telefono</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name= "telefono" id="inputTelefono" value ="{{ $registroTitulado['telefono'] }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputemail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name= "email" id="inputEmail" value ="{{ $registroTitulado['email'] }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputEmpresa" class="col-sm-2 col-form-label">Nombre Empresa</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name= "empresa" id="inputEmpresa" value ="{{ $registroTitulado['empresa'] }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputAnio" class="col-sm-2 col-form-label">Año de Titulación</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name= "titulacion_year" id="inputAnio" value ="{{ $registroTitulado['titulacion_year'] }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Carrera</label>
                <div class="col-sm-3">
                    <select class="form-control" name = "carrera" id="exampleFormControlSelect1">
                        <option value="" disabled selected> Seleccione Carrera</option>
                        @if($registroTitulado['carrera']=='ICCI')
                            <option selected>ICCI</option>
                        @else
                            <option>ICCI</option>
                        @endif
                        @if($registroTitulado['carrera']=='IECI')
                            <option selected>IECI</option>
                        @else
                            <option>IECI</option>
                        @endif
                    </select>
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
                            <a type="button" class="btn btn-primary" href="{{route('titulados.index')}}" role="button">Cancelar registro</a>
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