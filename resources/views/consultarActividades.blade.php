@extends('UCN_layout')

@section('title')Consultar actividades de vinculacion
@endsection
@section('header_content')
    <div class="top-right form-group links pr-5 ">
            <span>
                <a class="btn btn-secondary" href="{{route('menu')}}" role="button"><font size="5">Volver al menu</font></a>
            </span>
    </div>
    <style>
        .table-wrapper-scroll-y {
            display: block;
            max-height: 450px;
            overflow-y: auto;
            -ms-overflow-style: -ms-autohiding-scrollbar;
        }
    </style>
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
                        <select class="form-control-sm col-sm-7" id="actividadSelect" style="width: 18rem;">
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
                            <input placeholder = "Desde" id="dateLow" onkeydown="return false" class="date" name = "fechaInicio"/>
                        </div>
                        <div class="col-sm-4">
                            <input placeholder = "Hasta" id="dateTop" onkeydown="return false" class="date" name = "fechaTermino"/>
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
                <div class="table-wrapper-scroll-y">
                    <table id="actividadesTable" class="table">
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
                        @foreach($extensiones as $extension)
                            <tr>
                                <th scope="row">{{$extension->id}}</th>
                                <td>{{$extension->nombre}}</td>
                                <td>Extension</td>
                                <td>{{$extension->fecha}}</td>
                                <td><button type="button" class="btn btn-sm btn-secondary">Detalle</button></td>
                            </tr>
                        @endforeach
                        @foreach($asps as $asp)
                            <tr>
                                <th scope="row">{{$asp->id}}</th>
                                <td>{{$asp->nombre}}</td>
                                <td>Aprendizaje + Servicio</td>
                                <td>{{$asp->fecha}}</td>
                                <td><button type="button" class="btn btn-sm btn-secondary">Detalle</button></td>
                            </tr>
                        @endforeach
                        @foreach($titulaciones as $titulacion)
                            <tr>
                                <th scope="row">{{$titulacion->id}}</th>
                                <td>{{$titulacion->nombre}}</td>
                                <td>Titulacion por convenio</td>
                                <td>{{$titulacion->fecha_inicio}} a {{$titulacion->fecha_termino}} </td>
                                <td><button type="button" class="btn btn-sm btn-secondary">Detalle</button></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
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

            $('#dateLow').datepicker({
                forceparse: true,
                autoclose: true,
                format: 'yyyy-mm-dd',
                uiLibrary: 'bootstrap4'
            });

            $('#dateTop').datepicker({
                forceparse: true,
                autoclose: true,
                format: 'yyyy-mm-dd',
                uiLibrary: 'bootstrap4'
            });

            $('#filtrar1').click(function() {
                var input, filter, table, tr, td, i, txtValue,fechaLow,fechaTop
                    ,fechatd,fecharray,fechatd1,fechatd2;
                input = document.getElementById("actividadSelect");
                filter = input.value.toUpperCase();
                fechaLow = document.getElementById('dateLow').value;
                fechaTop = document.getElementById('dateTop').value;
                if(fechaLow == '') fechaLow = '1000-01-01';
                if(fechaTop == '') fechaTop = '1000-01-01';
                var fechaLowArray = fechaLow.split('-');
                var fechaTopArray = fechaTop.split('-');
                fechaLow = new Date(fechaLowArray[0],fechaLowArray[1],fechaLowArray[2]);
                fechaTop = new Date(fechaTopArray[0],fechaTopArray[1],fechaTopArray[2]);
                table = document.getElementById("actividadesTable");
                tr = table.getElementsByTagName("tr");
                // Filtrar por actividad
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[1];
                    if (td) {
                        fechatd = tr[i].getElementsByTagName("td")[2];
                        fechatd = fechatd.textContent || fechatd.innerText;
                        txtValue = td.textContent || td.innerText;
                        // Si es Titulacion por convenio usa doble fecha
                        if(txtValue == "Titulacion por convenio"){
                            fecharray = fechatd.split(' a ');
                            var fecharray1 = fecharray[0].split('-');
                            var fecharray2 = fecharray[1].split('-');
                            fechatd1 = new Date(fecharray1[0],fecharray1[1],fecharray1[2]);
                            fechatd2 = new Date(fecharray2[0],fecharray2[1],fecharray2[2]);


                        }
                        // Si es ASP Parsear periodo como fecha
                        if(txtValue == "Aprendizaje + Servicio"){
                            fecharray = fechatd.split('-');
                            fechatd1 = fecharray[0];
                            fechatd2 = fecharray[1];
                            if(fechatd2 == '1'){
                                fechatd1 = new Date(fechatd1,3,1);
                            }else{
                                fechatd1 = new Date(fechatd1,8,1);
                            }
                        }

                        if(txtValue == "Extension"){
                            fecharray = fechatd.split('-');
                            fechatd1 = new Date(fecharray[0],fecharray[1],fecharray[2]);
                        }
                        if ((txtValue.toUpperCase().indexOf(filter) > -1) || filter == "TODAS" ){
                            // Checkeo Fecha
                            if(document.getElementById("defaultCheck1").checked){
                                if (fechatd1>fechaLow && fechatd1 < fechaTop){
                                    tr[i].style.display = "";
                                }else{
                                    // Checkea si tiene fechatd2
                                    if(fechatd2 != null){
                                        if (fechatd2>fechaLow && fechatd2 < fechaTop){
                                            tr[i].style.display = "";
                                        }else{
                                            tr[i].style.display = "none";
                                        }
                                    }else{
                                        tr[i].style.display = "none";
                                    }
                                }
                            }else {
                                tr[i].style.display = "";
                            }

                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }
                //Filtrar por fecha

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