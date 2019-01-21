@extends('UCN_layout')

@section('title')Consultar indicadores
@endsection
@section('header_content')
    <div class="top-right form-group links pr-5 ">
            <span>
                <a class="btn btn-secondary" href="{{route('menu')}}" role="button"><font size="5">Volver al menu</font></a>
            </span>
    </div>
@endsection
@section('content')
    <H1 class = "text-center">Consulta de Indicadores</H1>
    <div class="container">
        <table class="table table-sm table-bordered">
            <thead class="thead-light text-center">
            <tr>
                <th></th>
                <th></th>
                <th colspan="2">2015</th>
                <th colspan="2">2016</th>
                <th colspan="2">2017</th>
                <th colspan="2">2018</th>
                <th colspan="2">2019</th>
            </tr>
            <tr>
                <th scope="col">ID</th>
                <th>Nombre indicador</th>
                <th>Progreso</th>
                <th>Meta</th>
                <th>Progreso</th>
                <th>Meta</th>
                <th>Progreso</th>
                <th>Meta</th>
                <th>Progreso</th>
                <th>Meta</th>
                <th>Progreso</th>
                <th>Meta</th>
            </tr>
            </thead>
            <tbody>
            @foreach($indicadores as $key => $indicador)
                @if($indicador['meta_anual'] == null)
                    <tr>
                        <th scope="row">{{$indicador['id']}}</th>
                        <td>{{$indicador['nombre']}}</td>
                        @foreach($años as $año)
                            @if((($valores[$key])[$año])[2] == 'G')
                                <td class = "table-success text-center">{{(($valores[$key])[$año])[0]}}</td>
                            @else
                                <td class = "table-danger text-center">{{(($valores[$key])[$año])[0]}}</td>
                            @endif
                            <td class = "text-center">{{(($valores[$key])[$año])[1]}}</td>
                        @endforeach
                    </tr>
                @endif
            @endforeach

            </tbody>
        </table>
    </div>
@endsection