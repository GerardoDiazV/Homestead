<?php

namespace App\Http\Controllers;

use App\Indicador;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class IndicadorController extends Controller
{
    protected $redirect;

    public function __construct(Redirector $redirect)
    {
        $this->redirect = $redirect;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $indicadores = Indicador::all();
        return view('indexIndicador',['indicador' => $indicadores]);
    }

    /**
     * Desplegar Consulta
     *
     * @return \Illuminate\Http\Response
     */
    public function consulta()
    {
        // Todos los indicadores
        $indicadores = Indicador::all();
        $valores = [];
        $años = ['2015','2016','2017','2018','2019'];
        foreach($indicadores as $indicadorKey => $indicador){
            // Para cada año
            foreach($años as $año){
                // Consigue La meta y el Progreso de ese año
                $valorProgreso = '';
                $valorMeta = '';
                $color = 'G';
                foreach($indicador->metas()->get()->where('year',$año) as $key => $meta){
                    $progreso = $indicador->progresos()->get()->where('year',$año)->where('nombre',$meta->nombre)->first();
                    if($progreso['valor_progreso'] < $meta['valor_meta']){
                        $color = 'R';
                    }
                    if((string)$valorProgreso == ''){
                        $valorProgreso = $progreso['valor_progreso'];
                        $valorMeta = $meta['valor_meta'];
                    }else{
                        $valorProgreso = $valorProgreso.'/'.$progreso['valor_progreso'];
                        $valorMeta = $valorMeta.'/'.$meta['valor_meta'];
                    }
                }
                $DiccionarioYears[$año] = [$valorProgreso,$valorMeta,$color];
            }
            $valores[] = $DiccionarioYears;
        }
        return view('consultarIndicadores',['indicadores'=>$indicadores, 'valores'=>$valores,
            'años'=>$años]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registroIndicador');
        //
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
            'descripcion' => 'required',
            'formula' => 'required',
            'evidencia' => 'required|regex:/^[\pL\s\-]+$/u',
            'year_inicio' => 'required|numeric',
            'year_termino' => 'required|numeric|gt:year_inicio',
            'meta' => 'required|numeric'
        ]);
        Indicador::create([
            'nombre' => $data['nombre'],
            'descripcion' => $data['descripcion'],
            'formula' => $data['formula'],
            'tipo_evidencia' => $data['evidencia'],
            'year_inicio' => $data['year_inicio'],
            'year_termino' => $data['year_termino'],
            'meta_anual' => $data['meta'],
        ]);

        return $this->redirect->route('indicador.index');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Indicador  $indicador
     * @return \Illuminate\Http\Response
     */
    public function show(Indicador $indicador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Indicador  $indicador
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $indicador = Indicador::findOrFail($id);
        return view('edicionIndicador',compact("indicador"));//
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Indicador  $indicador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = request()->all();
        $request->validate([
            'nombre' => 'required|regex:/^[\pL\s\-]+$/u',
            'descripcion' => 'required',
            'formula' => 'required',
            'evidencia' => 'required|regex:/^[\pL\s\-]+$/u',
            'year_inicio' => 'required|numeric',
            'year_termino' => 'required|numeric|gt:year_inicio',
            'meta' => 'required|numeric'
        ]);

        // Encontrar Objeto Actividad
        $indicador = Indicador::findOrFail($id);

        $indicador->nombre = $data['nombre'];
        $indicador->descripcion = $data['descripcion'];
        $indicador->formula = $data['formula'];
        $indicador->tipo_evidencia = $data['evidencia'];
        $indicador->year_inicio = $data['year_inicio'];
        $indicador->year_termino = $data['year_termino'];
        $indicador->meta_anual = $data['meta'];
        $indicador->save();

        return $this->redirect->route('indicador.index');
        ////
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Indicador  $indicador
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $indicador = Indicador::get()->find($id);;
        $indicador->delete();
        return back();
        // //
    }
}
