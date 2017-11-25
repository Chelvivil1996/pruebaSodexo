<div class="col-md-12">


    <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Cargar Datos de las Aulas</h3>
      </div><!-- /.box-header -->

      <!-- a este div le cambie el nombre -->
      <div id="notificacion_resul_fcda"></div>

      <form  id="f_cargar_datos_aula" name="f_cargar_datos_aula" method="post"  action="cargar_datos_aula" class="formarchivo" enctype="multipart/form-data" >
        <!--la clase formarchivo es la que es capaz de enviar mediante ajax, archivos -->

        <input type="hidden" name="_token" id="_token"  value="<?= csrf_token(); ?>">
        <div class="box-body">



            <div class="form-group col-xs-12"  >
               <label>Agregar Archivo de Excel </label>
               <input name="archivo" id="archivo" type="file" class="archivo form-control" style="margin-left: 0px;padding-top: 5px;padding-right: 11px;padding-bottom: 39px;padding-left: 10px;" required/>
               <br/><br />
           </div>

       


        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Cargar Datos</button>
        </div>




    </div>

</form>

</div>

</div>

<script>
    'use strict';

    $('.fileinput').each(function (i, el) {

        var $widget = $(el);

        var $input = $widget.children('.fileinput__input').eq(0);

        var $button = $widget.find('.fileinput__button').eq(0);

        var $statusText = $widget.find('.fileinput__status-text').eq(0);

        $button.click(function (e) {
            return $input.trigger(e);
        });

        $input.change(function (e) {
            return $statusText.text(e.target.value);
        });
    });
</script>