<?php namespace App\Http\Controllers;


use Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Aula;
use App\Horario;
use Excel;
// aqui llamo a la clase request, es el q me permite captar todo lo que viene en el formulario, sin eso no se hace nd

class AulasController extends Controller {

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
		$this->middleware('auth');
	}


	//presenta el formulario para nuevo usuario
	public function agregar_nueva_aula(Request $request)
	{
// derecha los input del form_entrada
// izquierda los nombres de los campos de la BD
		$data=$request->all();
		$aulas= new Aula;
		$aulas->hora  =  $data["hora"];
		$aulas->lunes=$data["lunes"];
		$aulas->martes=$data["martes"];
		$aulas->miercoles=$data["miercoles"];
		$aulas->jueves=$data["jueves"];
		$aulas->viernes=$data["viernes"];
		$aulas->sabado=$data["sabado"];


		$resul= $aulas->save();

		if($resul){

			return view("mensajes.msj_correcto")->with("msj","Aula Registrada Correctamente");
		}
		else
		{

			return view("mensajes.msj_rechazado")->with("msj","hubo un error vuelva a intentarlo");

		}
	}//end agregar_nueva_aula

//leccion 7
	public function form_editar_usuario($id)
	{
		//funcion para cargar los datos de cada usuario en la ficha
		$usuario=User::find($id);
		$contador=count($usuario);
		if($contador>0){
			return view("formularios.form_editar_usuario")->with("usuario",$usuario);
		}
		else
		{
			return view("mensajes.msj_rechazado")->with("msj","el usuario con ese id no existe o fue borrado");
		}
	}



	public function editar_usuario(Request $request)
	{

		$data=$request->all();
		$idUsuario=$data["id_usuario"];
		$usuario=User::find($idUsuario);

		$usuario->nombres  = $data["nombres"];
		$usuario->apellidos= $data["apellidos"];
		$usuario->pais= $data["pais"];
		$usuario->ciudad= $data["ciudad"];
		$usuario->email= $data["email"];
		$usuario->institucion= $data["institucion"];
		$usuario->ocupacion= $data["ocupacion"];

		$resul= $usuario->save();

		if($resul){
			return view("mensajes.msj_correcto")->with("msj","Datos actualizados Correctamente");
		}
		else
		{
			return view("mensajes.msj_rechazado")->with("msj","hubo un error vuelva a intentarlo");
		}
	}

//leccion 8
	public function subir_imagen_usuario(Request $request)
	{

		$id=$request->input('id_usuario_foto');
		$archivo = $request->file('archivo');
		$input  = array('image' => $archivo) ;
		$reglas = array('image' => 'required|image|mimes:jpeg,jpg,bmp,png,gif|max:900');
		$validacion = Validator::make($input,  $reglas);
		if ($validacion->fails())
		{
			return view("mensajes.msj_rechazado")->with("msj","El archivo no es una imagen valida");
		}
		else
		{

			$nombre_original=$archivo->getClientOriginalName();
			$extension=$archivo->getClientOriginalExtension();
			$nuevo_nombre="userimagen-".$id.".".$extension;
			$r1=Storage::disk('fotografias')->put($nuevo_nombre,  \File::get($archivo) );
			$rutadelaimagen="../storage/fotografias/".$nuevo_nombre;

			if ($r1)
			{
				$usuario=User::find($id);
				$usuario->imagenurl=$rutadelaimagen;
				$r2=$usuario->save();
				return view("mensajes.msj_correcto")->with("msj","Imagen agregada correctamente");
			}
			else
			{
				return view("mensajes.msj_rechazado")->with("msj","no se cargo la imagen");
			}

		}

	}


	public function cambiar_password(Request $request){

		$id=$request->input("id_usuario_password");
		$email=$request->input("email_usuario");
		$password=$request->input("password_usuario");
		$usuario=User::find($id);
		$usuario->email=$email;
		$usuario->password=bcrypt($password);
		$r=$usuario->save();

		if($r){
			return view("mensajes.msj_correcto")->with("msj","password actualizado");
		}
		else
		{
			return view("mensajes.msj_rechazado")->with("msj","Error al actualizar el password");
		}
	}

	//leccion 09

// esta funcion carga el formulario, es decir la vista
	public function form_cargar_datos_aula(){

		return view("formularios.form_cargar_datos_aula");

	}

// esta funcion procesa el excel y lo guarda en la BD
// la variable resquest que esta como parametro, es el que va a recibirme toda la informacion extraida de ese form
	public function cargar_datos_aula(Request $request)
	{
       $archivo = $request->file('archivo');//aqui se recibe todo el archivo, se le asigna a otra varible
       $nombre_original=$archivo->getClientOriginalName();//se extrae el nmbre real de ese documento
	   	 $extension=$archivo->getClientOriginalExtension();//se extrae la extension de ese documento, por si se quiere hacer alguna validacion de ese archivo
		//  se guarda el archivo en un disco y se crea en el sistema operativo o en el servidor en esta direccion: C:\xampp\htdocs\seguimiento\storage\archivos
		// cuando se crea un archivo, es dcir se sube, se crea en esa area
		// si se va al sistema operativo, donde esta este proyecto, q es C:\xampp\htdocs\sistemalaravel\storage ahi va a ver el disco llamado archivos, ahi queda guardado todo ese documento q se importo, con el nombre y la extension q se le saco. Este disco solo aparece ahi una vez que se importa ese documento antes no va a existirs
		// $r1 es para q guarde el archivo, le dice q en el espacio o disco que se llama archivos, coloque el archivo $nombre_original que esta en la linea 182 de este controller y que lo coloque con su contenido por eso ese \File::get($archivo)
		// config se crea el dico en el archivo filesystems.php
       $r1=Storage::disk('archivos')->put($nombre_original,  \File::get($archivo) );//se crea un disco para almacenar ese archivo q se esta subiendo, porque el proceso necesita tener acceso a ese archivo
			//  este disco se creo en la carpeta config, en el archivo llamado filesystems.php ahi hay un espacio para ese archivo

			// se crea una ruta para saber en donde quedo el archivo, xke necesito esa route para procesar el EXCEL

			// con el storage_path e trae la ruta del disco archivo, ese viene predefinido por laravel ese storage_path
       $ruta  =  storage_path('archivos') ."/". $nombre_original; //la ruta donde esta el arhivo guardado en el servidor


			//   el if, es para identificar que si se realizo bien el guardado de ese archivo que entonces ejecute o declare ese excel q empieza en la linea 212 en este controller
       if($r1){
				 // Loop through all sheets
				//  $reader->each(function($sheet) {
				//
				//      // Loop through all rows
				//      $sheet->each(function($row) {
				//
				//      });
				//
				//  });
				// se declarala clase EXCEL entonces tiene q estar referenciado en este controller, con un use... , ese Excel se puede usar porque al principio en el config/app en la parte de los aliases, cuando se hace el primer paso para poder utilizar esa clase de excel en laravel

// y sele dice que cargue todas la hojas de ese excel
       	Excel::load($ruta, function($reader) {
       		$result=$reader->get ();
       		$reader->each(function($hoja){

							//crea aula
								//obtiene ultimo rregistro
								//saca el id
								// ESTA ES LA INFORMACION DE UNA TABLA, tabla aulas
       				$aula=new Aula();
								$aula->nombreAula=$hoja->getTitle();// este lo que hace es agarrar el nombre de cada pestaña de ese excel, ahi estan los nombres de las aulas, asi obtengo los nombres de las aulas
								$aula->save();

								// ESTA ES LA INFORMACION DE LA OTRA TABLA, tabla horarios
								$hoja->each(function($fila) {
									$horario=new Horario;
								// guardo en el campo hora de la base de datos, lo que esta en el excel en la columna hora y asi sucesivamente
									$horario->hora= $fila->hora;
									$horario->lunes= $fila->lunes;
									$horario->martes= $fila->martes;
									$horario->miercoles= $fila->miercoles;
									$horario->jueves= $fila->jueves;
									$horario->viernes= $fila->viernes;
									$horario->sabado= $fila->sabado;
									$consultaABaseDatos=Aula::orderBy('created_at','desc')->first();
									$horario->numeroAula=$consultaABaseDatos->id;
									$horario->save();

					});//segundo foreach
					});//$reader->each(function($sheet)
       	});

       	return view("mensajes.msj_correcto")->with("msj"," Aulas Cargadas Correctamente");

       }
       else
       {
       	return view("mensajes.msj_rechazado")->with("msj","Error al subir el archivo");
       }

   }

	/*Función para descargar el archivo xls-ods, llamada */
   public function descargar_archivo_aula()
	{
		$headers =[ 'Content-Type:application/ods'];
		return response()->download(storage_path("archivos/aulas.ods","aulas.ods",$headers));
	}

}
