@extends('UCN_layout')

@section('title')Registrar convenio
@endsection

@section('content')
<title>Registro de convenios</title>
<body>
<div class="container">
<form autocomplete="off" method="POST" action="{{url('/registroConvenio')}}">
    {{ csrf_field() }}
    <div class="form-group row">
        <label for="inputOrganizacion" class="col-sm-2 col-form-label">Nombre de organización</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" name= "nombre" id="inputOrganizacion">
        </div>
    </div>
    <div class="form-group row">
        <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Tipo de convenio</label>
        <div class="col-sm-3">
        <select class="form-control" name = "tipo_convenio" id="exampleFormControlSelect1">
            <option>Capstone</option>
            <option>Marco</option>
            <option>Especifico</option>
            <option>Aprendizaje + Servicio</option>
        </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputFechaInicio" class="col-sm-2 col-form-label">Fecha Inicio</label>
        <div class="col-sm-3">
    <input id="datepicker" onkeydown="return false" class="date" name = "fecha_inicio" width="276" />
        </div>
    </div>

    <div class="form-group row">
        <label for="inputFechaTermino" class="col-sm-2 col-form-label">Fecha Término</label>
        <div class="col-sm-3">
            <input onkeydown="return false" id="datepicker" class="date" name = "fecha_termino"width="276" />
        </div>
    </div>

    <div class="form-group row">
        <label for="inputEvidencia" class="col-sm-2 col-form-label">Evidencia</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" name= "evidencia" id="inputEvidencia">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-2">
        <span class="border">
          <button type="submit" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal" >Confirmar</button>
        </span>
        </div>
        <div class="col-sm-3">
        <span class="border">
            <a class="btn btn-secondary" href="{{route('menuRegistros')}}" role="button">Cancelar</a>
        </span>
        </div>
    </div>

    <script>
        $(document).on('focus', ".date", function() {
            $(this).datepicker({
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
</body>
</html>

    @endsection