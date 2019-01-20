@extends('UCN_layout')

@section('title')Registros
@endsection

@section('pre-body')
    <style>
        .ancho {
            width: 650px;
        }
    </style>
@endsection
@section('content')
    <form autocomplete="off" method="GET" action="{{route('logout')}}" enctype="multipart/form-data">
        <div class="top-right form-group links">
            <span>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#confirmSubmitModal" >Cerrar Sesión</button>
            </span>
        </div>
        <div class="modal fade" id="confirmSubmitModal" tabindex="-1" role="dialog" aria-labelledby="confirmSubmitModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmSubmitModal">Confirmar Cerrar Sesión</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ¿Esta seguro que desea cerrar la sesión?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Volver al menu</button>
                        <button type="submit" class="btn btn-primary">Confirmar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container ancho p-5">
            @if (Auth::user()->hasAnyRole(['encargado', 'secretaria','user']))
            <a class="btn btn-primary btn-block " href="{{route('registroConvenio')}}" role="button"><font size="5">Administrar Convenios de Colaboración</font></a>
            <a class="btn btn-primary btn-block " href="{{route('asp.index')}}" role="button"><font size="5">Administrar  Actividad de Aprendizaje + Servicios</font></a>
            <a class="btn btn-primary btn-block " href="{{route('extension.index')}}" role="button"><font size="5">Administrar Actividad de Extensión</font></a>
            @endif
            @if (Auth::user()->hasAnyRole(['encargado', 'secretaria']))
                <a class="btn btn-primary btn-block " href="{{route('titulacion.index')}}" role="button"><font size="5">Administrar actividades de titulacion por convenio</font></a>
                    <a class="btn btn-primary btn-block " href="{{route('indicador.index')}}" role="button"><font size="5">Consultar estado de indicadores</font></a>
            @endif
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
                crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
                crossorigin="anonymous"></script>
    </form>
@endsection