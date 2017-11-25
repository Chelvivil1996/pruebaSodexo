<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('login2', function () {
  return view('login2');
});
// Registration routes...
// Route::get('register', 'Auth\AuthController@getRegister');
Route::get('register',function(){
  return redirect('/');
});
// Route::post('register', ['as' => 'auth/register', 'uses' => 'Auth\AuthController@postRegister']);

Route::get('home', 'UsuariosController@index');

//rutas de form usuario
Route::get('form_nuevo_usuario', 'FormulariosController@form_nuevo_usuario');
Route::post('agregar_nuevo_usuario', 'UsuariosController@agregar_nuevo_usuario');

//rutas de form aula
Route::get('form_nueva_aula', 'FormulariosController@form_nueva_aula');
Route::post('agregar_nueva_aula', 'AulasController@agregar_nueva_aula');

// rutas de las listas
Route::get('listado_usuarios/{page?}', 'ListadoController@listado_usuarios');



Route::get('form_editar_usuario/{id}', 'UsuariosController@form_editar_usuario');
Route::post('editar_usuario', 'UsuariosController@editar_usuario');
Route::post('subir_imagen_usuario', 'UsuariosController@subir_imagen_usuario');
Route::post('cambiar_password', 'UsuariosController@cambiar_password');



// rutas de cargar datos con excel
// ruta para usuarios
Route::get('form_cargar_datos_usuarios', 'UsuariosController@form_cargar_datos_usuarios');
Route::post('cargar_datos_usuarios', 'UsuariosController@cargar_datos_usuarios');

// ruta para aulas



// ROUTES DEL LOGIN
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', ['as' =>'login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);

// RUTA PARA MOSTRAR LA VISTA PARA PODER IMPORTAR EL EXCEL
Route::get('form_cargar_datos_aula', 'AulasController@form_cargar_datos_aula');
// RUTA PARA PROCESAR Y GUARDA EL EXCEL EN LA BASE DE DATOS
// aqui van los datos ajax
Route::post('cargar_datos_aula', 'AulasController@cargar_datos_aula');



// RUTA
Route::get('/', 'HomeController@index');

//RUTAS PARA LISTAR AULAS
//route para listar aulas
//primero la route del navegador
//luego, controlador y luego el metodo q esta en el controller

//RUTA DE LA LISTA CUANDO EL USUARIO ESTA LOGEADO
Route::get('listado_aulas/{page?}', 'ListadoController@listado_aulas');
Route::get('vista_horario/{id}', 'ListadoController@ver_detalleHorario');
//RUTA DE LA LISTA CUANDO EL USUARIO NO ESTA LOGEADO
Route::get('horario/{id}', 'HomeController@ver_detalleHorario');


Route::get('form_descargar_datos_aulas','AulasController@descargar_archivo_aula');
