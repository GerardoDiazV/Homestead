@extends('UCN_layout')
@section('title')Administrar Actividades Aprendizaje + Servicio
@endsection

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

    <H1> <center> Administrar de Actividades de Aprendizaje + Servicio <center></H1>

    @if($actividad_asp)
        <ul>

            @foreach($actividad_asp as $item)
                <li> {{ $item->id}} - {{ $item->nombre}} </li>
            @endforeach

        </ul>
    @else
        <p> No hay Actividades registradas </p>
    @endif



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