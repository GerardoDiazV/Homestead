@extends('UCN_layout')

@section('title')Consultar actividades de vinculacion
@endsection
@section('content')
    <H1 class = "text-center">Consulta de actividades de vinculación</H1>
    <div class="container">


        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Panel de Actividades</h5>
                <div class = "justify-content-between form-group row">
                    <div class = "col-sm-4">
                        <label for = "exampleFormControlSelect1" class="col-form-label-sm pr-5">Actividades:</label>
                        <select class="form-control-sm col-sm-7" id="exampleFormControlSelect1" style="width: 18rem;">
                            <option>Todas</option>
                            <option>Extension</option>
                            <option>Aprendizaje + Servicio</option>
                            <option>Titulacion por convenio</option>
                        </select>
                </div>
                    <div class = "col-sm-8 row">
                        <label class="col-form-label-sm pr-5">Rango de Fechas:</label>
                        <div class="col-sm-1">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        </div>
                        <div class="col-sm-4">
                            <input placeholder = "Desde" id="datepicker" onkeydown="return false" class="date" name = "fechaInicio"/>
                        </div>
                        <div class="col-sm-4">
                            <input placeholder = "Hasta" id="datepicker2" onkeydown="return false" class="date" name = "fechaTermino"/>
                        </div>
                    </div>
                    </div>
                <div class="justify-content-end form-group row">

                </div>
                <div class = "justify-content-between form-group row pl-3 pr-3">
                    <button type="button" class="btn btn-secondary">Generar Informe</button>
                    <button type="button" class="btn btn-secondary">Filtrar</button>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre Actividad</th>
                        <th scope="col">Tipo Actividad</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Detalle</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td><button type="button" class="btn btn-sm btn-secondary">Secondary</button></td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        <td><button type="button" class="btn btn-sm btn-secondary">Secondary</button></td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                        <td><button type="button" class="btn btn-sm btn-secondary">Secondary</button></td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td><button type="button" class="btn btn-sm btn-secondary">Secondary</button></td>
                    </tr>
                    <tr>
                        <th scope="row">5</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        <td><button type="button" class="btn btn-sm btn-secondary">Secondary</button></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Panel de Titulados</h5>
                <div class = "justify-content-between form-group row">
                    <div class = "col-sm-4">
                        <label for = "exampleFormControlSelect1" class="col-form-label-sm pr-5">Carrera:</label>
                        <select class="form-control-sm col-sm-7" id="exampleFormControlSelect1" style="width: 18rem;">
                            <option>Todas</option>
                            <option>Extension</option>
                            <option>Aprendizaje + Servicio</option>
                            <option>Titulacion por convenio</option>
                        </select>
                    </div>
                    <div class = "col-sm-8 row">
                        <label class="col-form-label-sm pr-5">Rango de Fechas:</label>
                        <div class="col-sm-1">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        </div>
                        <div class="col-sm-4">
                            <input placeholder = "Desde" id="datepicker3" onkeydown="return false" class="date" name = "fechaInicio"/>
                        </div>
                        <div class="col-sm-4">
                            <input placeholder = "Hasta" id="datepicker4" onkeydown="return false" class="date" name = "fechaTermino"/>
                        </div>
                    </div>
                </div>
                <div class="justify-content-end form-group row">

                </div>
                <div class = "justify-content-between form-group row pl-3 pr-3">
                    <button type="button" class="btn btn-secondary">Generar Informe</button>
                    <button type="button" class="btn btn-secondary">Filtrar</button>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">Nombre Estudiante</th>
                        <th scope="col">RUT</th>
                        <th scope="col">Carrera</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">Mark</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        </tr>
                    <tr>
                        <th scope="row">Jacob</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                    </tr>
                    <tr>
                        <th scope="row">Larry</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                    </tr>
                    <tr>
                        <th scope="row">Mark</th>
                        <td>Mark</td>
                        <td>Otto</td>
                    </tr>
                    <tr>
                        <th scope="row">Jacob</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


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
            $('#datepicker3').datepicker({
                forceparse: true,
                autoclose: true,
                format: 'yyyy-mm-dd',
                uiLibrary: 'bootstrap4'
            });

            $('#datepicker4').datepicker({
                forceparse: true,
                autoclose: true,
                format: 'yyyy-mm-dd',
                uiLibrary: 'bootstrap4'
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
@endsection