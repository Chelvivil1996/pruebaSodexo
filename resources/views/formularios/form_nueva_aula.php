<div class="box box-primary col-xs-12">

                <div class="box-header">
                  <h3 class="box-title">Nueva Aula del Sistema UCR, Sede del Pacífico</h3>
                </div><!-- /.box-header -->

<div id="notificacion_resul_fanu"></div>



<form  id="f_nueva_aula"  method="post"  action="agregar_nueva_aula" class="form-horizontal form_entrada" >

  <!--es el toquen de seguridad para recibir los datos  -->
  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">


<div class="box-body col-xs-12">
<div class="form-group col-xs-6">
                      <label for="hora">Hora*</label>
                      <input type="text" class="form-control" id="hora" name="hora" placeholder="Hora" >
</div>

<div class="form-group col-xs-6">
                      <label for="lunes">Lunes</label>
                      <input type="text" class="form-control" id="lunes" name="lunes" placeholder="Lunes" >
</div>

<div class="form-group col-xs-6">
                      <label for="martes">Martes</label>
                      <input type="text" class="form-control" id="martes" name="martes" placeholder="Martes" >

</div>

<div class="form-group col-xs-6">
                      <label for="miercoles">Miercoles</label>
                      <input type="text" class="form-control" id="miercoles" name="miercoles" placeholder="Miercoles" >
</div>
<div class="form-group col-xs-12">
                      <label for="jueves">Jueves</label>
                      <input type="text" class="form-control" id="jueves" name="jueves" placeholder="Jueves" >
</div>
<div class="form-group col-xs-12">
                      <label for="viernes">Viernes</label>
                      <input type="text" class="form-control" id="viernes" name="viernes" placeholder="Viernes" >
</div>
<div class="form-group col-xs-12">
                      <label for="sabado">Sabado*</label>
                      <input type="text" class="form-control" id="sabado" name="sabado" placeholder="Sabado" >
</div>

</div>




<div class="box-footer col-xs-12 ">
                    <button type="submit" class="btn btn-primary">Guardar</button>
</div>


</form>

</div>
