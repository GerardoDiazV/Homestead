@extends('layouts.app')

@section('content')

    <div>
        <p> Hola mundo este es un nuevo registro</p>

        <form action="{{route('registrarConvenio')}}">
            Nombre: <input type="text" name="nombreConvenio"><br>
            Rut: <input type="text" name="rutConvenio"><br>
            <button type="submit"> Enviar</button>
        </form>

    </div>

    @endsection