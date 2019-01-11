<?php

namespace App\Http\Controllers;

use App\TitulacionConvenio;
use App\Convenio;
use App\TitulacionConvenioEstudiante;
use App\TitulacionConvenioProfesor;
use Illuminate\Http\Request;

class TitulacionConvenioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $convenios = Convenio::all();
        return view('registroTitulacion',['convenios'=> $convenios]);////
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = request()->all();
        $request->validate([
            'nombre' => 'required|regex:/^[\pL\s\-]+$/u',
            'fechaInicio' => 'required',
            'fechaTermino' => 'required|after:fechaInicio',
            'inputEvidencia' => 'required|file|image|mimes:jpeg,png,gif,webp,pdf|max:2048',
            'convenio_id' => 'required',
            'profesores.*' => 'bail|required|regex:/^[\pL\s\-]+$/u',
            'nombresEstudiantes.*' => 'bail|required|regex:/^[\pL\s\-]+$/u',
            'rutsEstudiantes.*' => 'bail|required',
            'carrerasEstudiantes.*' => 'bail|required|regex:/^[\pL\s\-]+$/u',
        ]);
        $idActividad = (TitulacionConvenio::orderby('id','DESC')->first()->id) + 1;
        $filename = 'evidencia-titulacion-' . $idActividad  . '.' . $data['inputEvidencia']->getClientOriginalExtension();
        $file = $request->file('inputEvidencia')->storeAs('Registros Titulacion/Evidencias',$filename);

        $profesores = $data['profesores'];
        $nombres = $data['nombresEstudiantes'];
        $ruts = $data['rutsEstudiantes'];
        $carreras = $data['carrerasEstudiantes'];

        TitulacionConvenio::create([
            'nombre' => $data['nombre'],
            'fecha_inicio' => $data['fechaInicio'],
            'fecha_termino' => $data['fechaTermino'],
            'evidencia' => $file,
            'convenio_id' => $data['convenio_id']
        ]);

        $idActividad = TitulacionConvenio::latest()->first()->id;
        foreach ($nombres as $index => $code){
            TitulacionConvenioEstudiante::create([
                'titulacion_convenio_id' => $idActividad,
                'nombre' => $nombres[$index],
                'rut' => $ruts[$index],
                'carrera' => $carreras[$index],
            ]);
        }

        foreach ($profesores as $profesor){

            TitulacionConvenioProfesor::create([
                'titulacion_convenio_id' => $idActividad,
                'nombre_profesor' => $profesor,
            ]);
        }

        return view('menu');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TitulacionConvenio  $titulacionConvenio
     * @return \Illuminate\Http\Response
     */
    public function show(TitulacionConvenio $titulacionConvenio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TitulacionConvenio  $titulacionConvenio
     * @return \Illuminate\Http\Response
     */
    public function edit(TitulacionConvenio $titulacionConvenio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TitulacionConvenio  $titulacionConvenio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TitulacionConvenio $titulacionConvenio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TitulacionConvenio  $titulacionConvenio
     * @return \Illuminate\Http\Response
     */
    public function destroy(TitulacionConvenio $titulacionConvenio)
    {
        //
    }
}
