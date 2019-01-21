<?php

namespace App\Http\Controllers;

use App\Organizacion;

use Illuminate\Routing\Redirector;
use Illuminate\Http\Request;

class OrganizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
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
        return view('registroOrganizacion');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store()
    {
        $data = request()->all();
        $this->validate(request(),[
            'nombre' => 'required',
            'email' => 'required',
        ]);
        Organizacion::create([

            'nombre' => $data['nombre'],
            'email' => $data['email'],
        ]);
        return $this->redirect->route('convenio.create');
    }

    /**
     * Display the specified resource.
     *
     * @return void
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return void
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @return void
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return void
     */
    public function destroy()
    {
        //
    }
    protected $redirect;
    public function __construct(Redirector $redirect)
    {
        $this->redirect = $redirect;
    }
}
