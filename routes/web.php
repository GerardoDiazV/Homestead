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
Route::resource('registro', 'RegistroController');
Route::get('/',function () {
    return view('welcome');
});
Route::get('/menu', function () {
    return 'Hola mundo';
});
Route::get('/saludo/{name}/{nickname?}', function ($name, $nickname = null) {

    $name =ucfirst($name);

    if ($nickname) {
        return "Bienvenido {$name}, tu apodo es {$nickname}";
    } else {
        return "Bienvenido {$name}, no tienes apodo";
    }
});
Route::get('/usuarios',function() {
    return 'Usuarios';
});

Route::get('/usuarios/{id}',function($id) {
    return 'Usuario: {$id}';
})->where('id', '[0-9]+');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Acceso de todos los roles (Academico(user),Secretaria(secretaria),Encargado de Vinculacion(encargado), Jefe de Carrera o Director(admin))
Route::middleware(['auth', 'role:encargado' || 'role:secretaria' || 'role:user' || 'role=admin'])->group(function () {
    Route::get('/registros', 'RegistroController@menu')->name('menuRegistros');
    //Si el Usuario no es Jefe de Carrera o Director
    Route::middleware(['auth', 'role:encargado' || 'role:secretaria' || 'role:user'])->group(function () {
        //Administracion de Convenios (REG-001)
        Route::get('/registroConvenio', ['uses' => 'ConvenioController@create'])->name('registroConvenio');
        Route::post('/registroConvenio', ['uses' => 'ConvenioController@store']);

        //Administracion de Actividad de Extencsion
        Route::get('/registroExtension', 'ActividadExtensionController@create')->name('registroExtension');
        Route::post('/registroExtension', 'ActividadExtensionController@store');
        Route::get('/registroExtension/{id}/editar', 'ActividadExtensionController@edit');

        //Administracion de Actividades de Aprendizaje + Servicios (A+S)
        Route::get('/registroASP', 'ActividadASPController@create')->name('registroASP');
        Route::post('/registroASP', 'ActividadASPController@store');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', function () {
            return redirect()->route('logout');
});

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();