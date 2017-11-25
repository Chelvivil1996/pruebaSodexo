<?php namespace App\Http\Controllers;

class FormulariosController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *  AQUI SE CARGAN TODOS LOS FORMULARIOS, ests funciones nos permite mostrar el formulario en pantalla
	 * @return void
	 */
	// ESTE CONTROLADOR MANEJA TODOS LOS FORMULARIOS
	public function __construct()
	{
		$this->middleware('auth');
	}


	//presenta el formulario para nuevo usuario
	public function form_nuevo_usuario()
	{
		return view('formularios.form_nuevo_usuario');
	}

	//presenta el formulario para nueva aula
	public function form_nueva_aula()
	{
		return view('formularios.form_nueva_aula');
	}

}
