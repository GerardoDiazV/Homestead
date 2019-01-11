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
    return redirect()->route('logout');
});

Route::group(['middleware' => 'disablepreventback'],function(){
    Auth::routes();
    Route::get('/', [
        'as' => 'menu',
        'uses' => 'RegistroController@inicio'
    ]);
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
        Route::get('/registroExtension', 'ActividadExtensionController@create')->name('registroExtension');
        Route::post('/registroExtension', 'ActividadExtensionController@store');
        Route::get('/registroExtension/{id}/editar', 'ActividadExtensionController@edit');

        //Administracion de Actividades de Aprendizaje + Servicios (A+S)
        Route::get('/registroASP', 'ActividadASPController@create')->name('registroASP');
        Route::post('/registroASP', 'ActividadASPController@store');
        Route::get('/indexASP','ActividadASPController@index')->name('indexASP');

        Route::middleware(['auth', 'role:encargado' || 'role:secretaria'])->group(function () {
            Route::get('/registroTitulacion', ['uses' => 'TitulacionConvenioController@create'])->name('registroTitulacion');
            Route::post('/registroTitulacion', ['uses' => 'TitulacionConvenioController@store']);
        });

    });
    Route::middleware(['auth', 'role:encargado' || 'role:secretaria' ])->group(function () {
    });
});

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Auth::routes();