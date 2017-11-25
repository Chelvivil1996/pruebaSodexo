<?php namespace App\Http\Controllers;

use App\User;
use App\Aula;
use DB;
use Illuminate\Http\Request;
class HomeController extends Controller {

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
	 *
	 * @return void
	 */
	public function __construct()
	{
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		//dd(request()->ip());
		$aulas=Aula::all();//llama a todas las Aulas de la TABLA EN LA BD.
		return view('aulas')->with(['aulas'=>$aulas]);//Retorna una vista, pasando un arreflo mediante ->with.
	}//end index

	public function ver_detalleHorario($id){
		$horarioAula=DB::table('horarios')->where('numeroAula','=',$id)->get();
		//el horario del with tiene que ser el mismo en horario.blade.php, q es donde se va a renderizar o mostrar la infromacion
		return view('detalleHorario')->with(['horario'=>$horarioAula]);
	}//end ver_detalleHorario

}//end class
