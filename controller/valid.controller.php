<?php
 require_once 'model/usuario.model.php';
 require_once 'controller/main.controller.php';
  Class ValidController{
    private $users;

    public function __CONSTRUCT(){
        $this->users = new UsuarioModel();
    }

    public function validEmailLogin(){
        $email[0] = $_POST["email"];
        $response = $this->users->readUserbyEmail($email);


        if(count($response[0])==0){
          $return = array("El correo no existe",false);
        }else{
          $return = array("",true);
        }
        echo json_encode($return);
    }


    public function validEmailRegistro(){
        $email[1] = $_POST["email"];
        $response = $this->users->readUserbyEmailRe($email);


        if(count($response[1])!=1){
          $return = array("",true);
        }else{
            $return = array("El Correo ya existe en nuestra base de datos",false);
        }
        echo json_encode($return);
    }

    public function validEmailPassword(){
        $email[0] = $_POST["email"];
        $response = $this->users->readUserbyEmail($email);


        if(count($response[0])==0){
          $return = array("El correo no existe en nuestra aplicación",false);
        }else{
          $return = array("",true);
        }
        echo json_encode($return);
    }

    public function cerrarsession(){
      session_destroy();
      header("Location: inicio.html");
  }

    public function userValid(){
      $data[0] = $_POST["email"];
      $data[1] = $_POST["pass"];

      $result = $this->users->readUserbyEmail($data);


      if(password_verify($data[1],$result["acc_clave"])){
         $return = array(true,"Bienvenido al Sistema");

         //  Creamos las variables de Sesion
         $_SESSION["_usu_codigo"] = $result["usu_codigo"];
         /*$_SESSION["_usu_nombre"] = $result["usu_nombre_comp"];
         $_SESSION["_usu_rol"]		= $result["rol_codigo"];*/
         $_SESSION["_usu_mail"]["email"] = $_POST["email"];

      }else{
         $result = $this->users->updateUserFail($data[0]);

         if($result[0] >= 3){
           $return = array(false,"Su cuenta se encuentra bloqueada por numero de intentos fallidos");
           $this->users->userLockedByToken($result[1]);
         }else{
           //  Calculamos cuantos intentos nos quedan.
           $numIntent = 3 - $result[0];
           $return = array(false,"La contraseña no es la correcta, le queda ".$numIntent." intentos antes de bloquearse la cuenta.");
         }
      }

      echo json_encode($return);

    }
  }
 ?>
