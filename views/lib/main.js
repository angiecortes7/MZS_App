/***************************************************
                    ** LOGIN **
 ***************************************************/

$("#pass").focus(function(){
  $("#email").siblings("span").remove();
  var email = $("#email").val();

  $.post("validoEmail",{email:email},function(data){
           var data = JSON.parse(data);

          $("#email").after("<span class='error'>"+data[0]+"</span>")


  });
})

$("#email").focus(function(){
  $(this).siblings("span").remove();
})

/***************************************************
 ** INICIAMOS SESION SI EL USUARIO EXISTE         **
 ***************************************************/

$("#to-about-section").click(function(){
  $("#pass").siblings("span").remove();

})
$("#login_principal #contact").submit(function(e) {
  e.preventDefault();
        if ($(this).parsley().isValid()) {
            var email= $("#email").val();
            var pass= $("#pass").val();
           $.post("acceso",{email:email, pass:pass},function(data){
             var data = JSON.parse(data);
             if(data[0] == true){
                  document.location.href="dashboard";
                }else{
                  $("#pass").after("<span class='error'>"+data[1]+"</span>");
                }
            })
        }
});

/***************************************************
                  ** REGISTRO  **
 ***************************************************/

$("#pass1r").focus(function(){
  $("#email").siblings("span").remove();
  var email = $("#email").val();

  $.post("validoEmailRegistro",{email:email},function(data){
           var data = JSON.parse(data);

          $("#email").after("<span class='error'>"+data[0]+"</span>")

  });
})

$("#email").focus(function(){
  $(this).siblings("span").remove();
})


/*$("#pass2r").keyup(function(){
  if (pass1 == pass2) {
    span.addClass("las contraseñas coinciden");

  }else{
  span.addClass("las contraseñas no coinciden");
  }
});*/



  /***************************************************
                  ** CLAVE  **
 ***************************************************/

 	//variables
 	var pass1 = $("#pass1r");
 	var pass2 = $("#pass2r");
 	var confirmacion = "Las contraseñas si coinciden";
 	var longitud = "La contraseña debe estar formada entre 6-10 carácteres (ambos inclusive)";
 	var negacion = "No coinciden las contraseñas";
 	var vacio = "La contraseña no puede estar vacía";
 	//oculto por defecto el elemento span
 	var span = $('<span></span>').insertAfter(pass2);
 	//función que comprueba las dos contraseñas
 	function coincidePassword(){
 	var valor1 = pass1.val();
 	var valor2 = pass2.val();
 	//muestro el span
 	span.show().removeClass();
 	//condiciones dentro de la función
 	if(valor1 != valor2){
 	span.text(negacion).addClass('negacion');
 	}
 	if(valor1.length==0 || valor1==""){
 	span.text(vacio).addClass('negacion');
 	}
 	if(valor1.length<6 || valor1.length>10){
 	span.text(longitud).addClass('negacion');
 	}
 	if(valor1.length!=0 && valor1==valor2){
 	span.text(confirmacion).removeClass("negacion").addClass('confirmacion');
 	}
 	}
 	//ejecuto la función al soltar la tecla
 	pass2.keyup(function(){
 	coincidePassword();
});
