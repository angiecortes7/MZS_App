<?php
//  require_once 'model/usuario.model.php';

  Class ValidController{
    private $users;

    public function __CONSTRUCT(){
        $this->users = new UsuarioModel();
    }

    public function validEmail(){
        $email[0] = $_POST["email"];
        $response = $this->users->Umodel->readUserbyEmail($email);

        if(count($response[0])<=0){
          $return = array("El correo no existe en nuestra aplicación",false);
        }else{
          $return = array("",true);
        }
        echo json_encode($return);
    }

    public function userValid(){
      $data[0] = $_POST["email"];
      $data[1] = $_POST["pass"];

      $userData = $this->users->readUserbyEmail($data);


      if(password_verify($data[1],$result["acc_clave"])){
         $return = array(true,"Bienvenido al Sistema");

         //  Creamos las variables de Sesion
         $_SESSION["_usu_codigo"] = $result["usu_codigo"];
         $_SESSION["_usu_nombre"] = $result["usu_nombre_comp"];
         $_SESSION["_usu_rol"]		= $result["rol_codigo"];
         $_SESSION["_usu_mail"]["email"] = $_POST["email"];

      }else{
         $this->users->updateUserFail($data[0]);
         $return = array(false,"La contraseña no es la correcta");
      }

      echo json_encode($return);

    }
  }
 ?>
