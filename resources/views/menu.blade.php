@extends('UCN_layout')

@section('title')Registros
@endsection

@section('content')
    <head>
        <style>
            .ancho {
                width: 650px;
            }
        </style>
    </head>
    <body>
        <div class="top-right links">
                <a href="{{ route('logout') }}"><font color="white">Cerrar Sesión</font></a>
        </div>
        <div class="container ancho p-5">
            <a class="btn btn-primary btn-block " href="{{route('registroConvenio')}}" role="button"><font size="5">Administrar Convenios de Colaboración</font></a>
            <a class="btn btn-primary btn-block " href="{{route('indexASP')}}" role="button"><font size="5">Administrar  Actividad de Aprendizaje + Servicios</font></a>
            <a class="btn btn-primary btn-block " href="{{route('registroExtension')}}" role="button"><font size="5">Administrar Actividad de Extensión</font></a>
        </div>
    </body>
</html>
@endsection