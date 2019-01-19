<?php

namespace App\Http\Controllers;

use App\ActividadASP;
use App\Organizacion;
use App\Asignatura;
use App\ActividadASP_Organizacion;
use App\Profesor;
use Illuminate\Http\Request;

class ActividadASPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $indexASP = ActividadASP::orderBy('id')->get();
        return view('indexASP',['actividad_asp'=>$indexASP]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // $asignaturas = Asignatura::all();
        $asignaturas = Asignatura::orderBy('nombre_asign')->get();
        $organizaciones= Organizacion::OrderBy('nombre')->get();
        $profesores= Profesor::OrderBy('nombre_profesor')->get();
        return view('registroASP',['asignaturas'=> $asignaturas,'organizaciones'=>$organizaciones,'profesores'=>$profesores]);//
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
            'nombre_asign' => 'required',
            'nombre_profesor' => 'required',
            'periodo' => 'required',
            'cant_estudiantes'=> 'required',
            'organizacion_id' => 'required',
            'inputEvidencia' => 'nullable|file|image|mimes:jpeg,png,gif,webp,pdf|max:2048',

        ]);

        $file = $request->file('inputEvidencia')->store('Evidencias');

        ActividadASP::create([
            'nombre' => $data['nombre'],
            'asignatura' => $data['nombre_asign'],
            'profesor' => $data['nombre_profesor'],
            'periodo' => $data['periodo'],
            'cant_estudiantes' => $data['cant_estudiantes'],
            'evidencia' => $file,
        ]);
        $socioComunitario = $data['organizacion_id'];
        $organizacionId = Organizacion::where('nombre',$socioComunitario)->first()->id;
        $actividadId = ActividadASP::where('nombre',$request->nombre)->first()->id;
        ActividadASP_Organizacion::create([
            'actividadasp_id' => $actividadId,
            'organizacion_id' => $organizacionId,
        ]);

        return view('menu');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ActividadASP  $actividadASP
     * @return \Illuminate\Http\Response
     */
    public function show(ActividadASP $actividadASP)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ActividadASP  $actividadASP
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $actividadASP= ActividadASP::findOrFail($id);

        $asignaturas = Asignatura::orderBy('nombre_asign')->get();
        $organizaciones= Organizacion::OrderBy('nombre')->get();
        $profesores= Profesor::OrderBy('nombre_profesor')->get();


        return view('edicionASP',['asignaturas'=> $asignaturas,'organizaciones'=>$organizaciones,'profesores'=>$profesores],compact("actividadASP"));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ActividadASP  $actividadASP
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $data = request()->all();
        $request->validate([
            'nombre' => 'required|regex:/^[\pL\s\-]+$/u',
            'nombre_asign' => 'required',
            'nombre_profesor' => 'required',
            'periodo' => 'required',
            'cant_estudiantes'=> 'required',
            'organizacion_id' => 'required',
            'inputEvidencia' => 'nullable|file|image|mimes:jpeg,png,gif,webp,pdf|max:2048',

        ]);


        $socioComunitario = $data['organizacion_id'];
        $organizacionId = Organizacion::where('nombre',$socioComunitario)->first()->id;
        $actividadId = ActividadASP::where('nombre',$request->nombre)->first()->id;
        ActividadASP_Organizacion::create([
            'actividadasp_id' => $actividadId,
            'organizacion_id' => $organizacionId,
        ]);

        $actividadASP= ActividadASP::findOrFail($id);

        $actividadASP->nombre = $data['nombre'];
        $actividadASP->asignatura_id = $data['nombre_asign'];
        $actividadASP->profesor = $data['nombre_profesor'];
        $actividadASP->periodo = $data['periodo'];
        $actividadASP->cant_estudiantes = $data['cant_estudiantes'];

        if(Arr::exists($data, 'inputEvidencia')){

            //Encontrar la direcion url guardad
            $url = $actividadASP->evidencia;
            // Transformar la direccion URL en direccion de directorio y borrar
            $location = str_replace("/storage","public",$url);
            \Storage::delete($location);

            // Crear nuevo archivo
            $filename = 'evidencia-extension-' . $id  . '.' . $data['inputEvidencia']->getClientOriginalExtension();
            $file = $request->file('inputEvidencia')->storeAs('public/Extension/'.$id.'/Evidencia',$filename);
            $evidenciaURL = \Storage::url($file);
            $actividadASP->evidencia = $evidenciaURL;
        }

        $actividadASP->save();
        return $this->index();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ActividadASP  $actividadASP
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $actividad = ActividadASP::get()->find($id);
        $actividad->actividadesASPOrganizacion()->detach();
        $actividad->delete();
        return back();

    }



}
