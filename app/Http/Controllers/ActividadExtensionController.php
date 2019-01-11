<?php

namespace App\Http\Controllers;

use App\ActividadExtension;
use App\ActividadExtensionOrador;
use App\ActividadExtensionOrganizador;
use App\ActividadExtensionFotografia;
use App\Convenio;
use Illuminate\Http\Request;

class ActividadExtensionController extends Controller
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
        return view('registroExtension',['convenios'=> $convenios]);//
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
            'localizacion' => 'required',
            'fecha' => 'required',
            'cant_asistentes' => 'required',
            'convenio_id' => 'nullable',
            'oradores.*' => 'bail|required|regex:/^[\pL\s\-]+$/u',
            'organizadores.*' => 'bail|required|regex:/^[\pL\s\-]+$/u',
            'inputEvidencia' => 'required|file|image|mimes:jpeg,png,gif,webp,pdf|max:2048',
            'inputFotos.*' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048',
        ]);
        $idActividad = (ActividadExtension::orderby('id','DESC')->first()->id) + 1;
        $filename = 'evidencia-extension-' . $idActividad  . '.' . $data['inputEvidencia']->getClientOriginalExtension();
        $file = $request->file('inputEvidencia')->storeAs('Registros Extension/Evidencias',$filename);

        $oradores = $data['oradores'];
        $organizadores = $data['organizadores'];
        $fotos = $request->file('inputFotos');

        ActividadExtension::create([
        'nombre' => $data['nombre'],
        'localizacion' => $data['localizacion'],
        'fecha' => $data['fecha'],
        'cant_asistentes' => $data['cant_asistentes'],
        'evidencia' => $file,
        'convenio_id' => $data['convenio_id']
        ]);

        $idActividad = ActividadExtension::latest()->first()->id;
        foreach ($oradores as $orador){
            ActividadExtensionOrador::create([
                'actividad_extension_id' => $idActividad,
                'orador' => $orador,
            ]);
        }

        foreach ($organizadores as $organizador){
            ActividadExtensionOrganizador::create([
                'actividad_extension_id' => $idActividad,
                'organizador' => $organizador,
            ]);
        }

        $contFotos = 0;
        foreach ($fotos as $foto){
            $contFotos ++;
            $filename = 'fotografia-extension-' . $idActividad . '-' . $contFotos  . '.' . $foto->getClientOriginalExtension();
            $path = $foto->storeAs('Registros Extension/Fotografias',$filename);
            ActividadExtensionFotografia::create([
                'actividad_extension_id' => $idActividad,
                'fotografia' => $path,
            ]);
        }
        return view('menu');
        //
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\ActividadExtension  $actividadExtension
     * @return \Illuminate\Http\Response
     */
    public function show(ActividadExtension $actividadExtension)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ActividadExtension  $actividadExtension
     * @return \Illuminate\Http\Response
     */
    public function edit(ActividadExtension $actividadExtension)
    {
        return view('edicionExtension');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ActividadExtension  $actividadExtension
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ActividadExtension $actividadExtension)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ActividadExtension  $actividadExtension
     * @return \Illuminate\Http\Response
     */
    public function destroy(ActividadExtension $actividadExtension)
    {
        //
    }

}
