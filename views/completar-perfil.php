<section id="completar_perfil">
  <div class="container">
    <div id="contact" action="" method="post">
      <h2>Completa tu perfil</h2>
  <!--el enctype debe soportar subida de archivos con multipart/form-data-->
    <form enctype="multipart/form-data" class="formulario">
      <div class="col s12">
      <div class="row">
        <div class="input-field col s12">
        <!--<input name="archivo" type="file" id="imagen"/>
        <input type="button"class="boton" value="Subir"/>
        <!--div para visualizar mensajes-->
        <div class="messages"></div>
        <!--div para visualizar en el caso de imagen-->
        <div class="showImage"></div>
        <i class="fa fa-phone" aria-hidden="true"></i><input id="telefono" type="text" class="validate" placeholder="Teléfono" name="data[]" required>
        <i class="fa fa-calendar-check-o" aria-hidden="true"></i><input type="date" class="datepicker" placeholder="Fecha De Nacimiento"name="data[]" required>
        <button id="to-about-section" target="_self" class="hero-btn default">Enviar</button>
     </div>
  </form>
  </div>
</div>

</div>


</div>
</section>
<!--<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
<script>
		$(document).ready(function(){
			$('select').material_select();

	 	$('.datepicker').pickadate({
    	selectMonths: true, // Creates a dropdown to control month
    	selectYears: 15 // Creates a dropdown of 15 years to control year
  		});
      $('select').material_select();

      $(".messages").hide();
      //queremos que esta variable sea global
      var fileExtension = "";
      //función que observa los cambios del campo file y obtiene información
      $(':file').change(function()
      {
          //obtenemos un array con los datos del archivo
          var file = $("#imagen")[0].files[0];
          //obtenemos el nombre del archivo
          var fileName = file.name;
          //obtenemos la extensión del archivo
          fileExtension = fileName.substring(fileName.lastIndexOf('.') + 1);

      });

      //al enviar el formulario
     $(':button').click(function(){
         //información del formulario
         var formData = new FormData($(".formulario")[0]);
         var message = "";
         //hacemos la petición ajax
         $.ajax({
             url: 'upload.php',
             type: 'POST',
             // Form data
             //datos del formulario
             data: formData,
             //necesario para subir archivos via ajax
             cache: false,
             contentType: false,
             processData: false,
             //mientras enviamos el archivo
             beforeSend: function(){
                 message = $("<span class='before'>Subiendo la imagen, por favor espere...</span>");
                 showMessage(message)
             },
             //una vez finalizado correctamente
             success: function(data){
                 message = $("<span class='success'>La imagen ha subido correctamente.</span>");
                 showMessage(message);
                 if(isImage(fileExtension))
                 {
                     $(".showImage").html("<img src='files/"+data+"' />");
                 }
             },
             //si ha ocurrido un error
             error: function(){
                 message = $("<span class='error'>Ha ocurrido un error.</span>");
                 showMessage(message);
             }
         });
     });
		})
    //como la utilizamos demasiadas veces, creamos una función para
    //evitar repetición de código
    function showMessage(message){
        $(".messages").html("").show();
        $(".messages").html(message);
    }

    //comprobamos si el archivo a subir es una imagen
    //para visualizarla una vez haya subido
    function isImage(extension)
    {
        switch(extension.toLowerCase())
        {
            case 'jpg': case 'gif': case 'png': case 'jpeg':
                return true;
            break;
            default:
                return false;
            break;
        }
    }

</script>
-->
