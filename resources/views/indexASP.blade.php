@extends('UCN_layout')
@section('title')Administrar Actividades Aprendizaje + Servicio
@endsection

<style>
    .column{
        widh: 30%;
        float:left;
    }
</style>

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

    <H1> <center> Administrar Actividades de Aprendizaje + Servicio <center></H1>
    <div class="container ancho p-1">
    <a class="btn btn-primary btn-block " href="{{route('registroASP')}}" role="button"><font size="6">Registrar nueva actividad</font></a>
    </div>
    <table class="table table-bordered" id="MyTable">
        <thead>
        <tr>
            <th class="text-center">ID</th>
            <th class="text-center">Nombre</th>
            <th class="text-center">Acciones</th>
        </tr>
        </thead>
        <tbody>

    @if($actividad_asp)
        <ul>
            <tr>
            @foreach($actividad_asp as $item)

                    <td class="text-center">{{ $item->id }}</td>
                    <td class="text-left">{{ $item->nombre }}</td>

                    <td class="text-center">
                    <div class = "row pl-5 ">

                        <div class="column">
                            <a href="{{route('actividad_asp.edit',$item->id)}}" class="btn btn-info btn-xs">
                                Editar</a>
                        </div>


                        <div class="column">
                            <form action="{{route('actividad_asp.destroy',$item->id)}}" method="POST">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmSubmitModal" >Eliminar</button>
                                <div class="modal fade" id="confirmSubmitModal" tabindex="-1" role="dialog" aria-labelledby="confirmSubmitModal" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="confirmSubmitModal">Confirmar Eliminación</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                ¿Esta seguro que desea elminar la actividad?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Volver</button>
                                                <button type="submit" class="btn btn-primary">Confirmar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form></div>
                    </div>
                    </td>

            </tr>

            @endforeach
        </ul>
    @else
        <p> No hay Actividades registradas </p>
    @endif

    </table>

    <div class="container ancho p-1">
        <a class="btn btn-primary btn-block " href="{{route('menu')}}" role="button"><font size="6">Volver</font></a>
    </div>

    </body>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>


    </form>
    </div>

    </body>
    </html>
@endsection