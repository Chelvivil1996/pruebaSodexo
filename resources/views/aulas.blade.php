<!DOCTYPE html>
<html>
<head>
  <title>Laravel</title>

  <link href="//fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
  <!--  <link rel="stylesheet" href="bootstrap/css/bootstrap.css" type="text/css" > -->
  <link rel="stylesheet" href="css/selectAulas.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="fonts/font-awesome.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="fonts/ionicons.min.css">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/sistemalaravel.css">
</head>
<body class="overlay">
  <nav class="navbar navbar-default background_nav" role="navigation">
    <div class="container-fluid container">
      <!-- Brand and toggle get grouped for better mobile display -->

      <div class="navbar-header background_nav_elements" >
        <button type="button" class="navbar-toggle botonMenu" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar "></span>
          <span class="icon-bar "></span>
          <span class="icon-bar "></span>
        </button>
       
        <a class="navbar-brand logo-h" href="#"> 
          <img src="imagenes/logo/logoH_white.png" alt="Horarios Digitales" height="42" width="42"> </a>
       
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

        <form class="navbar-form navbar-left" role="search">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
          </div>
          <button type="submit" class="btn btn-default">Submit</button>
        </form>
        <ul class="nav navbar-nav navbar-right ">
          <li class="login_element"> <a href="login">Login</a></li>
        </ul>
      </li>
    </ul>
  </div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>


<div class="container">
  <div class="ggg row ">
    <table class="fondo_blanco table table-hover table-sm ">
      <thead class="">
        <tr>
          <th colspan="12">UCR TABLAS AULAS</th>
        </tr>
        <tr>
          <th class="col-6 text-left">Aula</th>
          <th class="col-6 text-rig">Acción</th>
        </tr>
      </thead>
      <tbody>
        <!-- Para acegurarse de que la variable tiene toda la informacion que capto del select que hizo en el controller, en la function index() se utilizo un if con isser y asi saber que la variable no esta vacia -->
        <!--con el foreach agarra esa varible $aulas y se recorre de principio a fin, esa variable le pasa sus datos a la variable $aula, para luego dividir las funciones, porqu la variable $aulas su funcion era almacenar toda la informacion traida de la tabla aulas de la BD, y esta variabke $aula es para ir seleccionando solo la informacion q se necesita  -->
        <!-- como ese foreach va a recorrer la variable de principio a fin, se le coloco una fila con dos columnas, para que repita esa informacion, porque se queria una lista con los nombres de todas las aulas y a la par un href llamado ver horario -->
        <!-- por eso un <td> lo que hace es llamar la variable $aula y obtener de ella el nombre del aula y esto lo va a ir haciendo de forma continua, asi tengo todas las aulas en lista -->
          <!-- El otro <td> tiene otra ruta, la cual tiene un controller con una funcion, la ruta se crea con ese href, va por via get, pero aunque tenga otra ruta, para poder crear esa ruta necesito del function index , por eso se usa lavariable $aula y de ellase trae solo el id -->
            <!-- en la BD hay dos tablas, en esta vista se trabaja con la tabla aulas, ahi se guarda el nombreAula junto con su id, entonces cada aula tiene un identificador en el sistema, el porque viene en otra vista... -->
            @if(isset($aulas))
            @foreach($aulas as $aula)
            <tr>
              <td>{{$aula->nombreAula}}</td>
              <td>
                
            
                <a  href="horario/{{$aula->id}}"> <i class="fa fa-calendar fa-fw" aria-hidden="true"></i> &nbsp;Ver</a>

                 
       

             </td>


           </tr>

           @endforeach
           @endif


         </tbody>
       </table>
     </div>


   </section>
 </div>
<br><br>

 @include('layouts.footer')

 <!-- jQuery 2.1.4 -->
 <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
 
 <!-- Bootstrap 3.3.5 -->
 <script src="bootstrap/js/bootstrap.min.js"></script>






</body>
</html>
