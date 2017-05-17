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
		$class = 'class = "password_rec"';
		$title = "Recupera tu contraseña";

		require_once ('views/include/header_movil.php');
		require_once ('views/password.php');
		require_once ('views/include/footer.php');
			}
	public function completar_perfil(){
		$class = 'class = "completar_p"';
		$title = "Completa tu perfil";

		require_once("views/include/header_movil.php");
		require_once ("views/completar-perfil.php");
		
			}

public function viewCreate()
	{
		$class = 'class = "registro"';
		$title = "Registrate en MyZoneScann";
		require_once("views/include/header_movil.php");
		require_once("views/modules/mod_usuario/inser_usuario.php");
		require_once("views/include/footer.php");
	}
	public function restorePassword(){
		$class = 'class = "restore"';
		$title = "Modifica tu contraseña";
	  $field = $_GET["acce_token"];
	  require_once 'views/include/header_movil.php';
	  require_once 'views/recupera_cuenta.php';
	  require_once 'views/include/footer.php';
	 }
	public function updatePassword(){
	  $data = $_POST["data"];
		$data[0]= password_hash($data[0], PASSWORD_DEFAULT);
	  $result = $this->Umodel->updatePassword($data);
	  header("Location: inicio.html?&msn=$result");
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
	  $status = $_GET["status"];
	  if ($status == true) {
	      $token = $_GET["acce_token"];
	     	$responseUpdate = $this->Umodel->updateStatusByToken($token);
	     	$responseRead = $this->Umodel->readUserByToken($token);
	      $_SESSION["_token"]      = $responseRead["acce_token"];
				$msn = "El usuario se ha activado correctamente";
 				header("Location: index.php?c=usuario&a=completar_perfil&msn=$msn");
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
            $mail->MsgHTML('<!DOCTYPE html>
						<html>
						  <head>
						    <meta charset="utf-8">
						    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
						  </head>
						  <body >
						  <table width="100%"  style="border-collapse:collapse;line-height:20px;margin:0;padding:0;width:100%;font-size:20px;color:#373737;background:#f5f5f5 "><tbody><tr>  <td valign="top" style="font-family:"Helvetica Neue",Helvetica,Arial,sans-serif!important;border-collapse:collapse">
							<table width="100%"  style="border-collapse:collapse"><tbody><tr><td valign="bottom" style="font-family:"Helvetica Neue",Helvetica,Arial,sans-serif!important;border-collapse:collapse;padding:30px 16px 12px;">
						    </td>
						      </tr></tbody></table></td>
						      </tr><tr><td valign="top" font-family: "Lato", sans-serif;";border-collapse:collapse">
						      <table cellpadding="15"  align="center" style="border-collapse:collapse;background:white;border-radius:0.5rem;margin-bottom:1rem;">
						        <tr>
										<div style="text-align:center;">
						           <img src="https://fotos.subefotos.com/e8d6dd1fcb8c0df5131994e4d863ebd1o.jpg"></img>
						        </div>
						        </tr><tbody><tr><td width="640" valign="top" style=font-family: "Lato", sans-serif;";border-collapse:collapse">
						        <div style="max-width:600px;margin:0 auto">
						        <div style="background:white;border-radius:0.5rem;margin-bottom:1rem;font-family: "Lato", sans-serif;">
						           <h2 style="color:#ff2b4d;line-height:30px;margin-bottom:12px;margin:0 0 12px;text-align:center;">Recupera tu contraseña</h2>

						    <p style="font-size:20px;line-height:24px;margin:0 0 16px;font-family: "Lato", sans-serif;">
						    Si has olvidado tu contraseña de <b>MyZoneScann</b> podrás tener una nueva fácilmente, lo único que tienes que hacer es ingresar al siguiente enlace:       </p>

						<a href="http://localhost:8000/MZS_App/index.php?c=usuario&a=restorePassword&acce_token='. $response["acce_token"] .'" style="margin-left:20%;">Haz clic aquí para tu nueva contraseña</a>


						</div>
							</div>
						</td>
					</tr></tbody></table></td>
				</tr></tbody></table>
			</body>
			</html>

');
$mail->CharSet = 'UTF-8';
if ($mail->send()) {
    $msn = "Hemos enviado un correo electrónico a tu cuenta $data[0]";
    header("Location: index.php?c=usuario&a=recuperarcontrasena&msn=$msn");
} else {
    $msn = "Correo invalido";
    header("Location: index.php?c=usuario&a=recuperarcontrasena&msn=$msn");
    }
}
}
?>
