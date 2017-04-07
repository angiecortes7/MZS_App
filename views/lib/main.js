/***************************************************
 ** VALIDAMOS QUE EXISTA EL CORREO                **
 ***************************************************/

$("#pass").focus(function(){
  $("#email").siblings("span").remove();
  var email = $("#email").val();
  $.post("acceso/validoEmail",{email:email},function(data){
          var data = JSON.parse(data);
          $("#email").siblings("input").after("<span class='error'>"+data[0]+"</span>");

          if(data[1] == false){
            $("#to-about-section").attr("disabled",true);
          }else{
            $("#to-about-section").attr("disabled",false);
          }
  });
})

$("#email").focus(function(){
  $(this).siblings("span").remove();
})

/***************************************************
 ** INICIAMOS SESION SI EL USUARIO EXISTE         **
 ***************************************************/


$("#contact").submit(function(e) {
        e.preventDefault();
        if ($(this).parsley().isValid()) {
            var email= $("#email").val();
            var pass= $("#pass").val();
            $.post("acceso",{email:email, pass:pass},function(data){
                var data = JSON.parse(data);

                if(data[0] == true){
                  document.location.href="dashboard-practice";
                }else{
                  alert(data[1]);
                }
            })
        }
});
