<?php

namespace App\Http\Controllers;

use App\ActividadASP;
use App\Organizacion;
use App\Asignatura;
use App\ActividadASP_Organizacion;
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
        return view('registroASP',['asignaturas'=> $asignaturas]);//
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
            'nombre' => 'required|alpha',
            'asignatura_id' => 'required',
            'profesor' => 'required',
            'periodo' => 'required',
            'cant_estudiantes'=> 'required',
            'nombre_organizacion' => 'required|regex:/^[\pL\s\-]+$/u',
            'inputEvidencia' => 'required|file:pdf',

        ]);

        $file = $request->file('inputEvidencia')->store('Evidencias');

        ActividadASP::create([
            'nombre' => $data['nombre'],
            'asignatura' => $data['asignatura_id'],
            'profesor' => $data['profesor'],
            'periodo' => $data['periodo'],
            'cant_estudiantes' => $data['cant_estudiantes'],
            'evidencia' => $file,
        ]);
        $socioComunitario = $data['nombre_organizacion'];
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
        return view('edicionASP',compact("actividadASP","asignaturas"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ActividadASP  $actividadASP
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ActividadASP $actividadASP)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ActividadASP  $actividadASP
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $actividadASP= ActividadASP::find($id)->delete();
        return back();

    }



}
