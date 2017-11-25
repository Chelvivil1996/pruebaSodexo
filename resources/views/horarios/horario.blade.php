<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="css/tables2.css">
</head>
<body>
  <table class="fondo_blanco info-table table-striped  ">
  <th>HORA</th>
  <th>LUNES</th>
  <th>MARTES</th>
  <th>MIÉRCOLES</th>
  <th>JUEVES</th>
  <th>VIERNES</th>
  <th>SÁBADO</th>
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
          <tr class="siglas">
            <td>{{$sacaLosDatos->hora}}</td>
            <td>{{$sacaLosDatos->lunes}}</td>
            <td>{{$sacaLosDatos->martes}}</td>
            <td>{{$sacaLosDatos->miercoles}}</td>
            <td>{{$sacaLosDatos->jueves}}</td>
            <td>{{$sacaLosDatos->viernes}}</td>
            <td>{{$sacaLosDatos->sabado}}</td>
          </tr>
        @endif
      @endforeach
    @endif
  </tbody>
</table>

</body>
</html>

