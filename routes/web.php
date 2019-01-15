<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::resource('menu', 'RegistroController');

Route::get('/', function () {
    return view('welcome');
});

//Acceso de todos los roles (Academico(user),Secretaria(secretaria),Encargado de Vinculacion(encargado), Jefe de Carrera o Director(admin))
Route::middleware(['auth', 'role:encargado' || 'role:secretaria' || 'role:user' || 'role=admin'])->group(function () {
    Route::get('/menu', 'RegistroController@menu')->name('menu');
    //Si el Usuario no es Jefe de Carrera o Director
    Route::middleware(['auth', 'role:encargado' || 'role:secretaria' || 'role:user'])->group(function () {
        //Administracion de Convenios (REG-001)
        Route::get('/registroConvenio', ['uses' => 'ConvenioController@create'])->name('registroConvenio');
        Route::post('/registroConvenio', ['uses' => 'ConvenioController@store']);

        //Administracion de Actividad de Extension
        Route::resource('actividad/extension','ActividadExtensionController');
        //Administracion de Actividades de Aprendizaje + Servicios (A+S)
        Route::get('/registroASP', 'ActividadASPController@create')->name('registroASP');
        Route::post('/registroASP', 'ActividadASPController@store');
        Route::get('/indexASP','ActividadASPController@index')->name('indexASP');
        Route::resource('actividad_asp','ActividadASPController');
        Route::get('/actividad_asp/{id}/edit', 'ActividadASPController@edit')->name('edicionASP');

        Route::middleware(['auth', 'role:encargado' || 'role:secretaria'])->group(function () {
            //Administracion de Actividades de Titulacion por Convenio
            Route::resource('actividad/titulacion','TitulacionConvenioController');
        });

    });
});

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Auth::routes();