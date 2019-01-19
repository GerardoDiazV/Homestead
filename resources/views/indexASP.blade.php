@extends('UCN_layout')
@section('title')Administrar Actividades Aprendizaje + Servicio
@endsection

@section('header_content')
    <div class="top-right form-group links pr-5 ">
            <span>
                <a class="btn btn-secondary" href="{{route('menu')}}" role="button"><font size="5">Volver al menu</font></a>
            </span>
    </div>
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
        .column{
            widh: 30%;
            float:left;
        }
    </style>

@endsection
@section('content')

    <H1> <center> Administrar Actividades de Aprendizaje + Servicio </center></H1>
    <div class="container pb-5" style = "text-align: center; ">
        <a class="btn btn-secondary" href="{{route('asp.create')}}" role="button"><font size="6">Registrar nueva actividad</font></a>
    </div>
    <div class = "container">
        <table class="table table-bordered  table-striped table-hover" id="MyTable">
            <thead>
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Titulo de Actividad</th>
                <th class="text-center">Acciones</th>
            </tr>
            </thead>
            <tbody>

    @if($actividad_asp)
        <ul>
            <tr>
            @foreach($actividad_asp as $item)

                <tr>
                    <td class="text-center" id="{{ $item->id }}">{{ $item->id }}</td>
                    <td class="text-left">{{ $item->nombre }}</td>
                    <td class="text-center" width="20%">
                        <div class = "btn-group">
                            <form action="{{route('asp.destroy',$item->id)}}" method="POST">
                                {{csrf_field()}}
                                <a class="btn btn-secondary" role="button"href="{{route('extension.edit',$item->id)}}" >
                                    Editar
                                </a>

                                <input type="hidden" name="_method" value="DELETE">
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal{{ $item->id }}" >Eliminar</button>



                                <!-- Modals --->

                                <div class="modal fade" id="modal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modal{{ $item->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="confirmSubmitModal">Confirmar Eliminación</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                ¿Esta seguro que desea eliminar la actividad?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Volver</button>
                                                <button type="submit" class="btn btn-primary">Confirmar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </ul>
    @else
        <p> No hay Actividades registradas </p>
            @endif
        </table>
    </div>

    </body>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>


    </form>
    </div>

@endsection