<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <link href="//fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.css" type="text/css" > 
  <link rel="stylesheet" href="css/selectAulas.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../fonts/font-awesome.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../fonts/ionicons.min.css">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  
  <link rel="stylesheet" href="../css/tables.css">
</head>

<body class="container">
  <br>
  <div class="row">
   <table class=" info-table table-striped "><!---->
    <thead>
      <tr>
        <th scope="col">HORA</th>
        <th scope="col">LUNES</th>
        <th scope="col">MARTES</th>
        <th scope="col">MIÉRCOLES</th>
        <th scope="col">JUEVES</th>
        <th scope="col">VIERNES</th>
        <th scope="col">SÁBADO</th>
      </tr>
      <thead>
        <tbody>
          <!-- isset verifica si esta vacio o no  -->
          @if(isset($horario))
          @foreach($horario as $sacaLosDatos)
          @if($sacaLosDatos->hora!='Sigla')
          <tr>
            <td>{{$sacaLosDatos->hora}}</td>
            <td>{{$sacaLosDatos->lunes}}</td>
            <td>{{$sacaLosDatos->martes}}</td>
            <td>{{$sacaLosDatos->miercoles}}</td>
            <td>{{$sacaLosDatos->jueves}}</td>
            <td>{{$sacaLosDatos->viernes}}</td>
            <td>{{$sacaLosDatos->sabado}}</td>
          </tr>
          @else


        <!--   <tr>
            <th>Campo 1</th>
            <th colspan="3">Campos 2 y 3 5</th>
            <th>Campo 6</th>
            <th>Campo 7</th>
            <th>Campo 8</th>
        
        </tr> -->

    <tr class="siglas" scope="row">
      <th>{{$sacaLosDatos->hora}}</th>
      <th >{{$sacaLosDatos->lunes}}</th>
      <th >{{$sacaLosDatos->martes}}</th>
      <th>{{$sacaLosDatos->miercoles}}</th>
      <th>{{$sacaLosDatos->jueves}}</th>
      <th>{{$sacaLosDatos->viernes}}</th>
      <th>{{$sacaLosDatos->sabado}}</th>
    </tr>
          @endif
          @endforeach
          @endif
        </tbody>
      </table>
    </div>


  </body>
  </html>
