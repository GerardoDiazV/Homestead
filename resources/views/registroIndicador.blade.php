@extends('UCN_layout')

@section('title')Registrar actividad de extension
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

        <style>
            table {
                margin-top: -7px;
                margin-left: 2px;
            }
            .table > thead > tr:first-child > td,
            .table > tbody > tr:first-child > td {
                border: none;
            }</style>
    @endif
@endsection
@section('content')
    <H1> <center> Registrar Indicador </center></H1>
    <div class="container">
        <form autocomplete="off" method="POST" action="{{route('indicador.store')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group row">
                <label for="inputNombre" class="col-sm-2 col-form-label">Nombre del Indicador</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name= "nombre" id="inputNombre" value ="{{ old('nombre') }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputDescripcion" class="col-sm-2 col-form-label">Descripcion</label>
                <div class="col-sm-3">
                    <textarea class="form-control" name="descripcion" id="inputDescripcion" rows="3">{{ old('descripcion') }}</textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputFormula" class="col-sm-2 col-form-label">Formula de Calculo</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name= "formula" id="inputFormula" value ="{{ old('formula') }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputEvidencia" class="col-sm-2 col-form-label">Tipo de evidencia solicitada</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name= "evidencia" id="inputEvidencia" value ="{{ old('evidencia') }}">
                </div>
            </div>


            <div class="form-group row">
                <label for="inputInicio" class="col-sm-2 col-form-label">Año Inicio</label>
                <div class="col-sm-3">
                    <input type="number" class="form-control" name= "year_inicio" id="inputInicio"
                           min = 2010 onkeypress='return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57'
                           value ="{{ old('year_inicio') }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputTermino" class="col-sm-2 col-form-label">Año Termino</label>
                <div class="col-sm-3">
                    <input type="number" class="form-control" name= "year_termino" id="inputTermino"
                           min = 2010 onkeypress='return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57'
                           value ="{{ old('year_termino') }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputMeta" class="col-sm-2 col-form-label">Meta anual</label>
                <div class="col-sm-3">
                    <input type="number" class="form-control" name= "meta" id="inputMeta"
                           min = 0 onkeypress='return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57'
                           value ="{{ old('meta') }}">
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
                            <a type="button" class="btn btn-primary" href="{{route('indicador.index')}}" role="button">Cancelar registro</a>
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

