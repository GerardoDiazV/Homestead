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
        Route::resource('convenio', 'ConvenioController');
        Route::resource('organizacion','OrganizacionController');
        //Administracion de Actividad de Extension
        Route::resource('actividad/extension','ActividadExtensionController');
        //Administracion de Actividades de Aprendizaje + Servicios (A+S)
        Route::resource('actividad/asp','ActividadASPController');
        // Consultar Actividades de vinculacion
        Route::get('/actividad/consultar','ConsultarActividadesController@create')->name('consultar.create');
        Route::middleware(['auth', 'role:encargado' || 'role:secretaria'])->group(function () {
            //Administracion de Actividades de Titulacion por Convenio
            Route::resource('actividad/titulacion','TitulacionConvenioController');
        });

        Route::middleware(['auth','role:secretaria'])->group(function () {
            //Administracion de Registro de Titulados
            Route::resource('actividad/titulados','TituladoDISCController');
        });



    });
});

Route::group(['middleware' => 'disablePreventBack'],function(){
    Auth::routes();
    Route::get('/', [
        'as' => '',
        'uses' => 'RegistroController@inicio'
    ]);
});

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Auth::routes();