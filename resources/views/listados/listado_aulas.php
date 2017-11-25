

<div class="box box-primary">
  <div class="box-header">
    <h3 class="box-title">Aulas UCR 2017</h3>
  </div>

  <div class="box-body">
    <?php
// aqui se recibe todos los datos del array del controlador y se recorre
    if( count($aulas) >0){
      ?>
      <!-- esta tabla es agarrada de la plantilla, sele dio clic derecho insoeccionar y se busco el codigo de la tabla que necesitaba -->
      <table id="tabla_aulas" class="display table table-hover" cellspacing="0" width="100%">
        <!-- estos son los encabezados -->
        <thead>
          <tr>
            <th>Aula</th>
            <th>Acción</th>
          </tr>
        </thead>
        <tbody>


          <?php
// se recorre el array de aulas
          foreach($aulas as $aula){
            ?>

            <tr role="row" class="odd">
              <!-- <td class="mailbox-messages mailbox-name" ><a href="javascript:void(0);" onclick="mostrarficha();"  style="display:block"><i class="fa fa-user"></i>&nbsp;&nbsp; </a></td> -->
              <td><?= $aula->nombreAula;  ?></td>
              <td><button class="btn  btn-skin-green btn-xs" onclick="mostrarfichaHorario(<?= $aula->id; ?>);" ><i class="fa fa-fw fa-eye"></i>Ver</button></td>
            </tr>

            <?php
          }
          ?>
        </table>
        <?php

// este render se utiliza para mostrar la paginacion de //esta esa tabla, es un elemento donde el usuario puede cliclear y pasar a las siguientes aulas
// esto solo funciona cuando no se tiene activado en el servidor ese /, pero como esta activado se remplaza... con esto se quita en la ruta q captan, si le da clic derecha inpeccionar en la pagina se vera q no se encuenta ese simbolo

      }
      else
      {

        ?>


        <br/><div class='rechazado'><label style='color:#FA206A'>...No se ha encontrado ninguna Aula...</label>  </div>

        <?php
      }

      ?>
    </div>
