<?php

namespace App\Http\Controllers;

use App\ActividadASP;
use App\ActividadASPProfesor;
use App\Organizacion;
use App\Asignatura;
use App\ActividadASP_Organizacion;
use App\Profesor;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use function PHPSTORM_META\type;

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
            'nombre_asign' => 'required',
            'periodo' => 'required',
            'cant_estudiantes'=> 'required',
            'nombre_profesor' => 'required',
            'nombre_profesor.*' => 'required',
            'organizacion_id.*' => 'required',
            'inputEvidencia.*' => 'required|required_with:organizacion_id.*|file|image|mimes:jpeg,png,gif,webp,pdf|max:2048',

        ]);
        $statement = \DB::select("SHOW TABLE STATUS LIKE 'actividad_a_s_ps'");
        $idActividad = $statement[0]->Auto_increment;
        // Uploading every file
        foreach($data['inputEvidencia'] as $key => $evidencia){
            $filename = 'evidencia-asp-' . $idActividad  .'-'. ($key+1). '.' . $evidencia->getClientOriginalExtension();
            $file = $evidencia->storeAs('public/AprendisajeServicio/'.$idActividad.'/Evidencia',$filename);
            $evidenciaURL = \Storage::url($file);
            $evidenciasURLS[] = $evidenciaURL;
        }

        ActividadASP::create([
            'asignatura' => $data['nombre_asign'],
            'periodo' => $data['periodo'],
            'cant_estudiantes' => $data['cant_estudiantes'],
            'periodo' => $data['periodo']
        ]);


        $idActividad = ActividadASP::latest()->first()->id;

        foreach ($data['nombre_profesor'] as $profesor){
            ActividadASPProfesor::create([
                'actividad_asp_id' => $idActividad,
                'nombre_profesor' => $profesor,
            ]);
        }
        foreach($evidenciasURLS as $key => $URLEVI){
            ActividadASP_Organizacion::create([
                'actividadasp_id' => $idActividad,
                'organizacion_id' => (($data['organizacion_id'])[$key]),
                'evidencia' => $URLEVI,
            ]);
        }

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
        $organizacionesMine = $actividadASP->organizaciones()->get();
        $contOrganizaciones = $organizacionesMine->count();
        foreach($organizacionesMine as $org){
            $evidencias[] =  $org->pivot->evidencia;
        }
        $profesoresMine = $actividadASP->profesores()->get();
        $contProfesores = $profesoresMine->count();
        $asignaturas = Asignatura::orderBy('nombre_asign')->get();
        $organizaciones= Organizacion::OrderBy('nombre')->get();
        $profesores= Profesor::OrderBy('nombre_profesor')->get();
        return view('edicionASP',compact("actividadASP",'evidencias','organizaciones','organizacionesMine','contOrganizaciones','profesores','profesoresMine','contProfesores','asignaturas'));

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
            'nombre_asign' => 'required',
            'periodo' => 'required',
            'cant_estudiantes'=> 'required',
            'nombre_profesor' => 'required',
            'nombre_profesor.*' => 'required',
            'organizacion_id.*' => 'required',
            'inputEvidencia.*' => 'required|required_with:organizacion_id.*|file|image|mimes:jpeg,png,gif,webp,pdf|max:2048',

        ]);
        $actividadASP= ActividadASP::findOrFail($id);

        $actividadASP->asignatura= $data['nombre_asign'];
        $actividadASP->periodo = $data['periodo'];
        $actividadASP->cant_estudiantes = $data['cant_estudiantes'];

        //Borrar los arreglos actuales y subirlos denuevo

        $actividadASP->profesores()->delete();
        foreach ($data['nombre_profesor'] as $profesor){
            ActividadASPProfesor::create([
                'actividad_asp_id' => $id,
                'nombre_profesor' => $profesor,
            ]);
        }

        //Borrar el listado de fotos y subirlo denuevo

        $contEvidencias = 0;
        // Borrar Archivos antiguos basandose en sus direcciones

        // Borrar las Relaciones a la tabla fotografias
        if(Arr::exists($data, 'inputEvidencia')) {
            $organizacionesMine = $actividadASP->organizaciones()->get();
            foreach($organizacionesMine as $org){
                $evidencias[] =  $org->pivot->evidencia;
                //Encontrar la direcion url guardada
                $url = $org->pivot->evidencia;
                // Transformar la direccion URL en direccion de directorio y borrar
                $location = str_replace("/storage","public",$url);
                \Storage::delete($location);
            }

            $actividadASP->organizaciones()->detach();
            // Re subir los archivos

            foreach ($data['inputEvidencia'] as $key => $evidencia) {
                $filename = 'evidencia-asp-' . $id . '-' . ($key + 1) . '.' . $evidencia->getClientOriginalExtension();
                $file = $evidencia->storeAs('public/AprendisajeServicio/' . $id . '/Evidencia', $filename);
                $evidenciaURL = \Storage::url($file);
                $evidenciasURLS[] = $evidenciaURL;
            }

            foreach ($evidenciasURLS as $key => $URLEVI) {
                ActividadASP_Organizacion::create([
                    'actividadasp_id' => $id,
                    'organizacion_id' => (($data['organizacion_id'])[$key]),
                    'evidencia' => $URLEVI,
                ]);
            }
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
        $directory = '/public/AprendisajeServicio/'.$id;
        \Storage::deleteDirectory($directory);
        $actividad->organizaciones()->detach();
        $actividad->delete();
        return back();
    }



}
