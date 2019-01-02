@extends('UCN_layout')

@section('title')Bienvenida
@endsection

@section('content')
    <body>
        <div class="flex-center pt-5">
            <div class="content">
                <div class="title m-b-md pt-5">
                    VINCULINK
                </div>

                <div class="links">
                    <a href="{{route('menuRegistros')}}"> Registrar Actividad</a>
                    {{--<a href="https://laracasts.com">Laracasts</a>--}}
                    {{--<a href="https://laravel-news.com">News</a>--}}
                    {{--<a href="https://nova.laravel.com">Nova</a>--}}
                    {{--<a href="https://forge.laravel.com">Forge</a>--}}
                    {{--<a href="https://github.com/laravel/laravel">GitHub</a>--}}
                </div>
            </div>
        </div>
    </body>
</html>
    @endsection
