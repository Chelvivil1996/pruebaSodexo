function cargarformulario(arg){
//funcion que carga todos los formularios del sistema
// este function recibe un parametro llamado arg, ese parametro es un numero q identifica a un formulario asi va y revisa cual es el formulario que ocupa con esos if y le dala ruta de donde puedo encontrar ese metodo, q es fijo esta en uno de los controller de laravel

		if(arg==1){ var url = "form_nuevo_usuario"; }
		if(arg==2){ var url = "form_nueva_aula"; }
		if(arg==3){ var url = "form_cargar_datos_usuarios"; }
		if(arg==4){ var url = "form_cargar_datos_aula"; }
    

		$("#contenido_principal").html($("#cargador_empresa").html());

// este me presenta el resultado de ese url
		$.get(url,function(resul){
      $("#contenido_principal").html(resul);
    })


}//end cargarformulario




// carga todos los listados, pero hay q ir al home para agregarle este enlace
function cargarlistado(listado){

    //funcion para cargar los diferentes  en general

if(listado==1){ var url = "listado_usuarios"; }
if(listado==2){ var url = "listado_aulas"; }
console.log(url);
// alert("url");
$("#contenido_principal").html($("#cargador_empresa").html());

// es una funcion de jquery q permite solicitar la direccion url y tener los resultados y mostrarlo en pantalla
    $.get(url,function(resul){

			console.log(resul);
        $("#contenido_principal").html(resul);

   })

}//end cargarlistado




 $(document).on("submit",".form_entrada",function(e){

//funcion para atrapar los formularios y enviar los datos x ajax

       e.preventDefault();

        $('html, body').animate({scrollTop: '0px'}, 200);

        var formu=$(this);
        var quien=$(this).attr("id");

				// descrimina cual es el formu

				// usuario
        if(quien=="f_nuevo_usuario"){ var varurl="agregar_nuevo_usuario"; var divresul="notificacion_resul_fanu"; }
        if(quien=="f_editar_usuario"){ var varurl="editar_usuario"; var divresul="notificacion_resul_feu"; }
        if(quien=="f_cambiar_password"){ var varurl="cambiar_password"; var divresul="notificacion_resul_fcp"; }
				// aula
				if(quien=="f_nueva_aula"){ var varurl="agregar_nueva_aula"; var divresul="notificacion_resul_fanu"; }
				if(quien=="f_editar_aula"){ var varurl="editar_aula"; var divresul="notificacion_resul_feu"; }

        $("#"+divresul+"").html($("#cargador_empresa").html());
              $.ajax({
                    type: "POST",
                    url : varurl,
                    datatype:'json',
                    data : formu.serialize(),
                    success : function(resul){
                        $("#"+divresul+"").html(resul);
                        if(quien=="f_nuevo_usuario"){
                         $('#'+quien+'').trigger("reset");
                        }

												if(quien=="f_nueva_aula"){
												 $('#'+quien+'').trigger("reset");
												}



                    }

                });


})

// me atrapa el procedimiento adentro de la plantilla, en el listado, donde puede pasar del indice 1 al dos y asi... y la siguiente pagina tambn estara adentro del sistema de la plantilla
$(document).on("click",".pagination li a",function(e){
//me atrapa el evento, no me lleva afuera
 e.preventDefault();
 // obtiene la ruta
 var url =$( this).attr("href");
 // y me lo presenta dentro de la plantilla
 $("#contenido_principal").html($("#cargador_empresa").html());
 // me envia la ruta con jquery y me lo presenta
 $.get(url,function(resul){
    $("#contenido_principal").html(resul); //aqui me la presenta
 })

})


  //leccion 7
function mostrarficha(id_usuario) {
  //funcion para mostrar y etditar la informacion del usuario
  $("#capa_modal").show();
  $("#capa_para_edicion").show();
  var url = "form_editar_usuario/"+id_usuario+"";
  $("#capa_para_edicion").html($("#cargador_empresa").html());
  $.get(url,function(resul){
      $("#capa_para_edicion").html(resul);
  })
}



function mostrarfichaHorario(id_horario) {
  //funcion para mostrar y etditar la informacion del horario
  $("#capa_modalHorario").show();
  $("#capa_para_edicionHorario").show();

  var url = "vista_horario/"+id_horario+"";
  
  $("#capa_para_edicionHorario").html($("#cargador_empresa").html());
  $.get(url,function(resul){
      $("#capa_para_edicionHorario").html(resul);
  })
}



// es para q me oculte la ventana de la vista cuando edito
$(document).on("click",".div_modal",function(e){
 //funcion para ocultar las capas modales
 $("#capa_modal").hide();
 $("#capa_para_edicion").hide();
 $("#capa_para_edicion").html("");

 $("#capa_modalHorario").hide();
 $("#capa_para_edicionHorario").hide();
 $("#capa_para_edicionHorario").html("");

})





  //leccion 8 y 9




// aqui atrapa al formarchivo, la clase q esta en la vista del formulario form_cargar_datos_aula
// cuando me envien un formulario q tiene la clase formarchivo me haga este proceso
  $(document).on("submit",".formarchivo",function(e){


        e.preventDefault();
        var formu=$(this);
        var nombreform=$(this).attr("id");
				// aqui se identifica cual es el form con el id que se le coloco en la etique <form> y aqui le doy la url de donde tengo que ir a dejar esos datos
        if(nombreform=="f_subir_imagen" ){ var miurl="subir_imagen_usuario";  var divresul="notificacion_resul_fci"}
        if(nombreform=="f_cargar_datos_usuarios" ){ var miurl="cargar_datos_usuarios";  var divresul="notificacion_resul_fcdu"}
				if(nombreform=="f_cargar_datos_aula" ){ var miurl="cargar_datos_aula";  var divresul="notificacion_resul_fcda"}

        //información del formulario
				// me atrapa todo ese archivo, todo esos datos del formulario con ese array
        var formData = new FormData($("#"+nombreform+"")[0]);

        //hacemos la petición ajax
        $.ajax({
            url: miurl,
						// que me envie esos datos por el metodo POST
            type: 'POST',

            // Form data
            //datos del formulario
            data: formData,

            //necesario para subir archivos via ajax
            cache: false,
            contentType: false,
            processData: false,
            //mientras enviamos el archivo que ponga el .gif que representa q la funcion se esta procesando o realizando por esos un cargador de tiempo
            beforeSend: function(){
              $("#"+divresul+"").html($("#cargador_empresa").html());
            },
            //una vez finalizado correctamente... cuando resive el resultado me lo muestre en el div
						// que se selecciono
            success: function(data){
              $("#"+divresul+"").html(data);

							//esta funcion lo que hace es refrescar la nueva url de la img
              $("#fotografia_usuario").attr('src', $("#fotografia_usuario").attr('src') + '?' + Math.random() );

							// alert("esoo"+data.id);
            },
            //si ha ocurrido un error
            error: function(data){

               alert("ha ocurrido un error") ;
							// console.log(data);

            }
        });
    });
