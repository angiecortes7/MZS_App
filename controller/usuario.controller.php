<?php
require_once ('model/usuario.model.php');
require_once ('views/assets/random/random.php');
require_once ('PHPMailer/PHPMailerAutoload.php');


class UsuarioController{
	private $Umodel;

	public function __CONSTRUCT(){
		$this->Umodel = new UsuarioModel();
	}

	public function mainPage(){
		require_once ('views/include/header.php');
		require_once ('views/modules/mod_usuario/main_usuario.php');
		require_once ('views/include/footer.php');

	}

	public function recuperarcontrasena(){
		$class = 'class = "olvido"';
		require_once ('views/include/header_movil.php');
		require_once ('views/password.php');
		require_once ('views/include/footer.php');
			}

public function viewCreate()
	{
		$class = 'class = "registro"';
		require_once("views/include/header_movil.php");
		require_once("views/modules/mod_usuario/inser_usuario.php");
		require_once("views/include/footer.php");
	}
	public function restorePassword(){
		$class = 'class = "restore"';
	  $field = $_GET["acce_token"];
	  require_once 'views/include/header_movil.php';
	  require_once 'views/recupera_cuenta.php';
	  require_once 'views/include/footer.php';
	 }

	public function updatePassword(){
	  $data = $_POST["data"];
		$data[0]= password_hash($data[0], PASSWORD_DEFAULT);
	  $result = $this->Umodel->updatePassword($data);
	  header("Location: index.php?c=usuario&msn=$result");
	  }

		public function create(){
			$data = $_POST["data"];
					//print_r($data);
		if(!isset($_SESSION["_usu_rol"])){
				$data[5] = "rol_visit_def";
		}
		//contraseña
					if(strlen($data[2]) <= 8){
			       $msn= "La clave debe tener al menos 8 caracteres";
						 header("Location: index.php?c=usuario&a=viewCreate&msn=$msn");
						 }
						 elseif(!preg_match('`[a-z]`',$data[2])){
					      $msn = "La clave debe tener al menos una letra";
					      header("Location: index.php?c=usuario&a=viewCreate&msn=$msn");
		 					 }

							 elseif(!preg_match('`[0-9]`',$data[2])){
						      $msn = "La clave debe tener al menos un numero";
						      header("Location: index.php?c=usuario&a=viewCreate&msn=$msn");
			 					 }
								 else if(!preg_match('/(?=[@#%&]|-|_)/', $data[2])){
									 $msn = " contener al menos uno de los siguientes simbolos: @#%&-_";
									 header("Location: index.php?c=usuario&a=viewCreate&msn=$msn");
								 }

						  elseif($data[2]!== $data[3]){
				 		    	$msn= "Las contraseñas no coinciden";
				 					 header("Location: index.php?c=usuario&a=viewCreate&msn=$msn");
								  }

								else {
									$data[2]= password_hash($data[2], PASSWORD_DEFAULT);
	 								$data[4]= "USU-".date('Ymd').'-'.date('i');
	 								$data[7]= randAlphanum(30);
	 								$data[6]= "Inactivo";
									$result = $this->Umodel->createUsuario($data);
									$response = $this->Umodel->readUserbyEmail($data);
								 	$response = $this->Umodel->sendEmailActiveAccount($data);
										header("Location: index.php?c=usuario&a=viewCreate&msn=$result");
										echo $result;

								 }
								}

	public function read(){
		require_once("views/include/header.php");
		require_once("views/modules/mod_usuario/read_usuario.php");
		require_once("views/include/footer.php");
	}

	public function updateStatus(){
            $status = $_GET["acc_estado"];
            if ($status == true) {
                $token = $_GET["token"];
              	$response = $this->Umodel->updateStatusByToken($token);
              	$response = $this->Umodel->readUserByToken($token);
                $_SESSION["_token"] = $result["acce_token"];
                $_SESSION["_usu_codigo"] = $result["usu_codigo"];
                $_SESSION["_usu_nombre"] = $result["usu_nombre_comp"];
              	$_SESSION["_usu_mail"] = $result["usu_mail"];
                $msn = "Soy el puto amo";
                header("Location: index.php?c=views&a=completeProfile&msn=$msn");
            }
        }

	public function update(){
		  $field = $_GET["usucode"];
          require_once 'views/include/header.php';
          require_once 'views/modules/mod_usuario/update_usuario.php';
          require_once 'views/include/footer.php';

	}
	public function updateData(){
        	$data = $_POST["data"];
            $result = $this->Umodel->updateUsuario($data);
            header("Location: index.php?c=usuario&msn=$result");
    }
    public function delete(){
            $data = $_GET["usucode"];
            $result = $this->Umodel->deleteUsuario($data);
            header("Location: index.php?c=usuario&msn=$result");
        }
				public function enviarMensaje_Contrasena(){
						$data = $_POST["data"];
						$response = $this->Umodel->readUserbyEmail($data);
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'myzonescann.1@gmail.com';
            $mail->Password = 'adsamyzone';

            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('myzonescann.1@gmail.com'); // este es el mismo del mail->username
            $mail->addAddress($data[0]);
            $mail->isHTML(true);
            $mail->Subject = 'Recupera tu Contraseña ';
						$mail->Body = 'Recuperación de contraseña MyZoneScann';
            $mail->MsgHTML('
						<a href="http://localhost:8000/App_MZScann1/index.php?c=usuario&a=restorePassword&acce_token='. $response["acce_token"] .'">Haz clic aquí para tu nueva contraseña</a>
            ');
            $mail->CharSet = 'UTF-8';
            if ($mail->send()) {
                $msn = "Envio correctamente";
            } else {
                $msn = "Correo no invalido";
            }
        }

			}


?>
