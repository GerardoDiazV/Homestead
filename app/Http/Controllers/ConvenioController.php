<?php

namespace App\Http\Controllers;

use App\Convenio;
use App\Organizacion;
use Illuminate\Routing\Redirector;
use Illuminate\Http\Request;


class ConvenioController extends Controller
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
        return view('registroConvenio');//
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


        Convenio::create([
            'fecha_inicio' => $data['fecha_inicio'],
            'fecha_termino' => $data['fecha_termino'],
            'tipo_convenio' => $data['tipo_convenio'],
            'organizacion_id' => Organizacion::where('nombre',$data['nombre'])->first()->id,
            'evidencia' => $data['evidencia'],
        ]);

        return view('registros');

        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Organizacion  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Organizacion $empresa)
    {
        return $this->redirect->route('registroConvenio');//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Organizacion  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit(Organizacion $empresa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Organizacion  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organizacion $empresa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Organizacion  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organizacion $empresa)
    {
        //
    }
    protected $redirect;

    public function __construct(Redirector $redirect)
    {
        $this->redirect = $redirect;
    }

    public function registroConvenio(Request $request)
    {


        return view('registroConvenio');
    }
    public function registrarConvenio(Request $request)
    {


        return view('registroConvenio');
    }

}
