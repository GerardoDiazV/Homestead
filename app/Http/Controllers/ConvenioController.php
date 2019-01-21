<?php

namespace App\Http\Controllers;

use App\Convenio;
use App\Organizacion;
use Illuminate\Routing\Redirector;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;


class ConvenioController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $convenios = Convenio::OrderBy('id')->get();
        foreach($convenios as $convenio){
            $nombres[] = $convenio->organizacion()->first()->nombre;
        }
        return view('indexConvenio',['convenio'=>$convenios,'nombres'=>$nombres]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $organizacions = Organizacion::all();
        return view('registroConvenio',['organizacions'=> $organizacions]);//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $data = request()->all();
        $this->validate(request(),[
            'tipo_convenio' => 'required',
            'fecha_inicio' => 'required',
            'fecha_termino' => 'required',
            'inputEvidencia' => 'required|file|image|mimes:jpeg,png,gif,webp,pdf|max:2048',
            'convenio_id' => 'required',
        ]);
        $statement = \DB::select("SHOW TABLE STATUS LIKE 'convenios'");
        $id = $statement[0]->Auto_increment;
        $filename = 'evidencia-convenios-' . $id  . '.' . $data['inputEvidencia']->getClientOriginalExtension();
        $file = $request->file('inputEvidencia')->storeAs('public/Convenios/'.$id.'/Evidencia',$filename);
        $evidenciaURL = \Storage::url($file);

        Convenio::create([

            'fecha_inicio' => $data['fecha_inicio'],
            'fecha_termino' => $data['fecha_termino'],
            'tipo_convenio' => $data['tipo_convenio'],
            'evidencia' => $evidenciaURL,
            'organizacion_id' => $data['convenio_id'],
        ]);

        return $this->index();

        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Organizacion $empresa
     * @return \Illuminate\Http\RedirectResponse
     */
    public function show(Organizacion $empresa)
    {
        return $this->redirect->route('convenio.create');//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $organizacions = Organizacion::all();

        $convenio = Convenio::findOrfail($id);

        $id_organizacion = $convenio->organizacion_id;
        $fecha_inicio = $convenio->fecha_inicio;
        $fecha_termino = $convenio->fecha_termino;
        $tipo_convenio = $convenio->tipo_convenio;

        return view('edicionConvenio',compact("convenio","id_organizacion","fecha_inicio","fecha_termino","tipo_convenio"),['organizacions'=> $organizacions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param $id
     * @return void
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {

        $data = request()->all();

        $this->validate(request(),[
            'tipo_convenio' => 'required',
            'fecha_inicio' => 'required',
            'fecha_termino' => 'required',
            'inputEvidencia' => 'required|file|image|mimes:jpeg,png,gif,webp,pdf|max:2048',
            'convenio_id' => 'required',
        ]);

        $convenio = Convenio::findOrfail($id);

        $convenio->tipo_convenio = $data['tipo_convenio'];
        $convenio->fecha_inicio = $data['fecha_inicio'];
        $convenio->fecha_termino = $data['fecha_termino'];
        $convenio->organizacion_id = $data['convenio_id'];

        if(Arr::exists($data, 'inputEvidencia')){
            //Encontrar la direcion url guardada
            $url = $convenio->evidencia;
            // Transformar la direccion URL en direccion de directorio y borrar
            $location = str_replace("/storage","public",$url);
            \Storage::delete($location);

            // Crear nuevo archivo
            $filename = 'evidencia-convenio-' . $id  . '.' . $data['inputEvidencia']->getClientOriginalExtension();
            $file = $request->file('inputEvidencia')->storeAs('public/Convenio/'.$id.'/Evidencia',$filename);
            $evidenciaURL = \Storage::url($file);
            $convenio->evidencia = $evidenciaURL;
        }

        $convenio->save();

        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Organizacion $empresa
     * @return void
     */
    public function destroy($id)
    {
        $convenio = Convenio::get()->find($id);
        $directory = '/public/Convenio/'.$id;
        \Storage::deleteDirectory($directory);
        $convenio->delete();
        return back();
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
