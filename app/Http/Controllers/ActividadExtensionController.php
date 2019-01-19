<?php

namespace App\Http\Controllers;

use App\ActividadExtension;
use App\ActividadExtensionOrador;
use App\ActividadExtensionOrganizador;
use App\ActividadExtensionFotografia;
use App\Http\Controllers;
use App\Convenio;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ActividadExtensionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $indexASP = ActividadExtension::orderBy('id')->get();
        return view('indexExtension',['actividad_extension'=>$indexASP]);
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
        $statement = \DB::select("SHOW TABLE STATUS LIKE 'actividad_extensions'");
        $idActividad = $statement[0]->Auto_increment;
        $filename = 'evidencia-extension-' . $idActividad  . '.' . $data['inputEvidencia']->getClientOriginalExtension();
        $file = $request->file('inputEvidencia')->storeAs('public/Extension/'.$idActividad.'/Evidencia',$filename);
        $evidenciaURL = \Storage::url($file);

        $oradores = $data['oradores'];
        $organizadores = $data['organizadores'];
        $fotos = $request->file('inputFotos');
        $convenioid = null;
        if(Arr::exists($data, 'convenio_id')) $convenioid = $data['convenio_id'];
        ActividadExtension::create([
        'nombre' => $data['nombre'],
        'localizacion' => $data['localizacion'],
        'fecha' => $data['fecha'],
        'cant_asistentes' => $data['cant_asistentes'],
        'evidencia' => $evidenciaURL,
        'convenio_id' => $convenioid
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
            $path = $foto->storeAs('public/Extension/'.$idActividad.'/Fotografias',$filename);
            $fotografiaURL = \Storage::url($path);
            ActividadExtensionFotografia::create([
                'actividad_extension_id' => $idActividad,
                'fotografia' => $fotografiaURL,
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
    public function edit($id)
    {
        $actividadExtension = ActividadExtension::findOrFail($id);
        $fotografias = $actividadExtension->fotografias()->get();
        $nombresFotos =[];
        foreach ($fotografias as $foto){
            $name = explode('/',$foto['fotografia']);
            array_push($nombresFotos,$name[5]);
        }

        $oradores = $actividadExtension->oradores()->get();
        $organizadores = $actividadExtension->organizadores()->get();
        $convenios = Convenio::all();

        return view('edicionExtension',compact("actividadExtension","convenios",'fotografias',
            'oradores','organizadores','nombresFotos'));
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
        $data = request()->all();
        $request->validate([
            'nombre' => 'required|regex:/^[\pL\s\-]+$/u',
            'localizacion' => 'required',
            'fecha' => 'required',
            'cant_asistentes' => 'required',
            'convenio_id' => 'nullable',
            'oradores.*' => 'bail|required|regex:/^[\pL\s\-]+$/u',
            'organizadores.*' => 'bail|required|regex:/^[\pL\s\-]+$/u',
            'inputEvidencia' => 'nullable|file|image|mimes:jpeg,png,gif,webp,pdf|max:2048',
            'inputFotos.*' => 'nullable|file|image|mimes:jpeg,png,gif,webp|max:2048',
        ]);
        $convenioid = null;
        if(Arr::exists($data, 'convenio_id')) $convenioid = $data['convenio_id'];


        $actividadExtension->nombre = $data['nombre'];
        $actividadExtension->localizacion = $data['localizacion'];
        $actividadExtension->fecha = $data['fecha'];
        $actividadExtension->cant_asistentes = $data['cant_asistentes'];
        if(Arr::exists($data, 'evidencia')){
          \Storage::delete($actividadExtension->evidencia);
            $idActividad = $actividadExtension->id;
            $filename = 'evidencia-extension-' . $idActividad  . '.' . $data['inputEvidencia']->getClientOriginalExtension();
            $file = $request->file('inputEvidencia')->storeAs('public/Extension/'.$idActividad.'/Evidencia',$filename);
            $evidenciaURL = \Storage::url($file);
            $actividadExtension->evidencia = $evidenciaURL;
        }
        $actividadExtension->convenio_id = $convenioid;
        $actividadExtension->save();

        return view('menu');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ActividadExtension  $actividadExtension
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $actividad = ActividadExtension::get()->find($id);
        $actividad->delete();
        return back();
        //
    }

}
