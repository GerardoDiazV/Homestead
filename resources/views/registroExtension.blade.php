@extends('UCN_layout')

@section('title')Registrar actividad de extension
@endsection

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<body>

<div class="container">
    <form autocomplete="off" method="POST" action="{{url('/registroExtension')}}">
        {{ csrf_field() }}
        <div class="form-group row">
            <label for="inputActividad" class="col-sm-2 col-form-label">Nombre de actividad</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name= "nombre" id="inputActividad" value ="{{ old('nombre') }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputLocalizacion" class="col-sm-2 col-form-label">Localización</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name= "localizacion" id="inputLocalizacion" value ="{{ old('localizacion') }}">
            </div>
        </div>
        <table id="myTable" class=" table order-list">
            <thead>
            <tr>
                <td>Orador/es</td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="col-sm-3">
                    <input type="text" name="oradores[]" class="form-control" />
                </td>
                <td class="col-sm-2"><a class="deleteRow"></a>

                </td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <td colspan="5" style="text-align: left;">
                    <input type="button" class="btn btn-lg btn-block " id="addrow" value="Añadir Fila" />
                </td>
            </tr>
            <tr>
            </tr>
            </tfoot>
        </table>
        <table id="myTable2" class=" table table-sm order-list">
            <thead>
            <tr>
                <td>Organizador/es</td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="col-sm-3">
                    <input type="text" name="organizadores[]" class="form-control" />
                </td>
                <td class="col-sm-2"><a class="deleteRow"></a>

                </td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <td colspan="5" style="text-align: left;">
                    <input type="button" class="btn btn-lg btn-block " id="addrow2" value="Añadir Fila" />
                </td>
            </tr>
            <tr>
            </tr>
            </tfoot>
        </table>

        <div class="form-group row">
            <label for="inputFecha" class="col-sm-2 col-form-label">Fecha</label>
            <div class="col-sm-3">
                <input id="datepicker" onkeydown="return false" class="date" name = "fecha" width="276" value ="{{ old('fecha') }}"/>
            </div>
        </div>

        <div class="form-group row">
            <label for="inputAsistentes" class="col-sm-2 col-form-label">Cantidad de asistentes</label>
            <div class="col-sm-3">
                <input type="number" class="form-control" name= "cant_asistentes" id="inputAsistentes"
                       min = 1 onkeypress='return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57'
                       value ="{{ old('cant_asistentes') }}">
            </div>
        </div>


        <div class="form-group row">
            <label for="inputEvidencia" class="col-sm-2 col-form-label">Evidencia</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name= "evidencia" id="inputEvidencia">
            </div>
        </div>




        <div class="form-group">
            <label for="exampleFormControlSelect1">Convenio asociado</label>
            <select class="form-control" id="convenioSelect" name= "convenio_id">
                <option value="" disabled selected>(Opcional) Seleccione convenio relacionado</option>
               @foreach($convenios as $convenio)
                   <option value="{{$convenio->id}}">Fecha inicio: {{$convenio->fecha_inicio}},
                       Empresa Convenio: {{$convenio->organizacion()->first()->nombre}},
                       Tipo Convenio: {{$convenio->tipo_convenio}}
                   </option>
                   @endforeach
            </select>
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
                        <a type="button" class="btn btn-primary" href="{{route('menuRegistros')}}" role="button">Cancelar registro</a>
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

                    cols += '<td><input type="text" class="form-control" name="oradores[]"/></td>';
                    cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Borrar Fila"></td>';
                    newRow.append(cols);
                    $("#myTable.order-list").append(newRow);
                    counter++;
                });
                $("#addrow2").on("click", function () {
                    var newRow = $("<tr>");
                    var cols = "";

                    cols += '<td><input type="text" class="form-control" name="organizadores[]"/></td>';
                    cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Borrar Fila"></td>';
                    newRow.append(cols);
                    $("#myTable2.order-list").append(newRow);
                    counter++;
                });


                $("table.order-list").on("click", ".ibtnDel", function (event) {
                    $(this).closest("tr").remove();
                    counter -= 1
                });


            });


            function calculateRow(row) {
                var price = +row.find('input[name^="price"]').val();

            }

            function calculateGrandTotal() {
                var grandTotal = 0;
                $("table.order-list").find('input[name^="price"]').each(function () {
                    grandTotal += +$(this).val();
                });
                $("#grandtotal").text(grandTotal.toFixed(2));
            }
        </script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
                crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
                crossorigin="anonymous"></script>

    </form>
</div>

</body>
</html>

    @endsection

