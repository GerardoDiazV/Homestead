@extends('UCN_layout')

@section('title')Registro Organizacion
@endsection

@section('pre-body')
    @if ($errors->any())
        <div class="alert alert-danger">
            <p><strong>ERROR:</strong> Por favor corregir los siguientes errores</p>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
@section('content')
    <div class="container">
    <form autocomplete="off" method="POST" action="{{route('organizacion.store')}}" enctype="multipart/form-data" >
        {{ csrf_field() }}
        <div class="form-group row">
            <label for="inputOrganizacion" class="col-sm-2 col-form-label">Nombre de la Organizacion</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name= "nombre" id="inputOrganizacion">
            </div>
        </div>

        <div class="form-group row">
            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-3">
                <input type="email" class="form-control" name= "email" id="inputEmail">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-2">
        <span class="border">
          <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#confirmSubmitModal" >Confirmar</button>
        </span>
            </div>
            <div class="col-sm-3">
        <span class="border">
            <button type="button" class="btn btn-secondary"  data-toggle="modal" data-target="#confirmCancelModal"  role="button">Cancelar</button>
        </span>
            </div>
        </div>

        <!-- Cancel Modal -->
        <div class="modal fade" id="confirmCancelModal" tabindex="-1" role="dialog" aria-labelledby="confirmCancelModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmCancelModal">Confirmar cancelacion</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ¿Desea cancelar el registro y volver al menu de registros?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Volver al formulario</button>
                        <a type="button" class="btn btn-primary" href="{{route('convenio.create')}}" role="button">Cancelar registro</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Confirmar Modal -->
        <div class="modal fade" id="confirmSubmitModal" tabindex="-1" role="dialog" aria-labelledby="confirmSubmitModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmSubmitModal">Confirmar envio</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ¿Esta seguro que desea confirmar el registro?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Volver al formulario</button>
                        <button type="submit" class="btn btn-primary">Confirmar</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
                crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
                crossorigin="anonymous"></script>
    </form>
    </div>

@endsection