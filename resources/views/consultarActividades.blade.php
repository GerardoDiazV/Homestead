@extends('UCN_layout')

@section('title')Consultar actividades de vinculacion
@endsection
@section('header_content')
    <div class="top-right form-group links pr-5 ">
            <span>
                <a class="btn btn-secondary" href="{{route('menu')}}" role="button"><font size="5">Volver al menu</font></a>
            </span>
    </div>
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
                    <button id = "filtrar1" type="button" class="btn btn-secondary">Filtrar</button>
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
                        <label for = "carreraSelect" class="col-form-label-sm pr-5">Carrera:</label>
                        <select class="form-control-sm col-sm-7" id="carreraSelect" style="width: 18rem;">
                            <option>Todas</option>
                            <option>ICCI</option>
                            <option>IECI</option>
                        </select>
                    </div>
                    <div class = "col-sm-8 row">
                        <label class="col-form-label-sm pr-5">Rango de años:</label>
                        <div class="col-sm-1">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                        </div>
                        <div class="col-sm-4">
                            <input placeholder = "Ingrese año inferior" type="number" class="form-control"  id="fechaLow"
                                   min = 1 onkeypress='return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57'
                                   >
                        </div>
                        <div class="col-sm-4">
                            <input placeholder = "Ingrese año superior" type="number" class="form-control"  id="fechaTop"
                                   min = 1 onkeypress='return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57'
                            >
                        </div>
                    </div>
                </div>
                <div class="justify-content-end form-group row">

                </div>
                <div class = "justify-content-between form-group row pl-3 pr-3">
                    <button type="button" class="btn btn-secondary">Generar Informe</button>
                    <button id = "filtrar2" type="button" class="btn btn-secondary">Filtrar</button>
                </div>
            </div>
            <div class="card-body">
                <table id= "tituladosTable" class="table">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">Nombre Estudiante</th>
                        <th scope="col">RUT</th>
                        <th scope="col">Año de titulacion</th>
                        <th scope="col">Carrera</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($titulados as $titulado)
                        <tr>
                            <th scope="row">{{$titulado->nombre}}</th>
                            <td>{{$titulado->rut}}</td>
                            <td>{{$titulado->titulacion_year}}</td>
                            <td>{{$titulado->carrera}}</td>
                        </tr>
                    @endforeach
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

            $('#filtrar2').click(function() {
                var input, filter, table, tr, td, i, txtValue,fechaLow,fechaTop, intValue;
                input = document.getElementById("carreraSelect");
                filter = input.value.toUpperCase();
                fechaLow = Number(document.getElementById('fechaLow').value);
                fechaTop = Number(document.getElementById('fechaTop').value);
                table = document.getElementById("tituladosTable");
                tr = table.getElementsByTagName("tr");
                // Filtrar por carrera
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[1];
                    td2 = tr[i].getElementsByTagName("td")[2];
                    if (td2) {
                        txtValue = td2.textContent || td2.innerText;
                        if ((txtValue.toUpperCase().indexOf(filter) > -1) || filter == "TODAS" ){
                            // Checkeo Fecha
                            if(document.getElementById("defaultCheck2").checked){
                                txtValue = td.textContent || td.innerText;
                                intValue = Number(txtValue);
                                if (intValue > fechaLow && intValue < fechaTop){
                                    tr[i].style.display = "";
                                }else{
                                    tr[i].style.display = "none";
                                }
                            }else{
                                tr[i].style.display = "";
                            }

                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }
                //Filtrar por fecha

            });

        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
@endsection