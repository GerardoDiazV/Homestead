@extends('UCN_layout')

@section('title')Registros
@endsection

@section('content')
<body>

<div class="container p-5">
    <a class="btn btn-primary btn-lg btn-block p-5" href="{{route('registroConvenio')}}" role="button"><font size="50">Registrar Convenios de Colaboración</font></a>
    <a class="btn btn-primary btn-lg btn-block p-5" href="{{route('registroASP')}}" role="button"><font size="50">Registrar  Actividad de Aprendizaje + Servicios</font></a>
    <a class="btn btn-primary btn-lg btn-block p-5" href="{{route('registroExtension')}}" role="button"><font size="50">Registrar Actividad de Extensión</font></a>
</div>
</body>
</html>
    @endsection