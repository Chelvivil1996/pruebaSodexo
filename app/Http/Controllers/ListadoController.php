<?php namespace App\Http\Controllers;

use App\User;
use App\Aula;
use App\Horario;
use DB;


class ListadoController extends Controller {

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

	// ESTE CONTROLADOR MANEJA TODOS LOS LISTADOS

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}


	//presenta el listado para los usuarios
		public function listado_usuarios()
   {
        $usuarios= User::paginate(25);

        return view('listados.listado_usuarios')->with("usuarios", $usuarios );
				//es un array con todos los usuarios y se le envia a la vista en la carpeta listados en una clase llamada listado_usuarios.php
	}

//presenta el listado para los aulas
	public function listado_aulas()
 {
			$aulas= Aula::all();

			return view('listados.listado_aulas')->with(["aulas"=> $aulas]);
			// es un array con todas las info de la aulas
}

public function ver_detalleHorario($id){
	// $horarioAula=Horario::all()->where('numeroAula','=',$id);
	$horarioAula=DB::table('horarios')->where('numeroAula','=',$id)->get();
	//el horario del with tiene que ser el mismo en horario.blade.php, q es donde se va a renderizar o mostrar la infromacion
	return view('horarios.horario')->with(['horario'=>$horarioAula]);
}//end ver_detalleHorario


}//end class
