<?php

Class UsuarioModel {
	private $pdo;

	function __CONSTRUCT()
	{
		try {
			$this->pdo = DataBase::connect();
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}catch(PDOExepcion $e){
			$code = $e->getCode();
			$text = $e->getMessage();
			$file = $e->getFile();
			$line = $e->getLine();
			DataBase::createLog($code, $text, $file, $line);
		}
	}
	public function createUsuario($data){
    	try {
        $sql = "INSERT INTO mzscann_usuarios (usu_codigo,usu_nombre_comp,usu_mail,rol_codigo) VALUES(?,?,?,?)";
        $query = $this->pdo->prepare($sql);
        $query->execute(array($data[4],$data[0],$data[1],$data[5]));

				$sql = "INSERT INTO mzscann_acceso (acce_token,acc_clave,acc_intento_fallido,acc_estado,usu_codigo)  VALUES(?,?,0,?,?)";
        $query = $this->pdo->prepare($sql);
        $query->execute(array($data[7],$data[2],$data[6],$data[4]));


				$msn = "Usuario guardado correctamente, hemos enviado un correo a $data[1] para activarla.";


    } catch (PDOException $e) {
				$code = $e->getCode();
				$text = $e->getMessage();
				$file = $e->getFile();
				$line = $e->getLine();

				$msn = "Su registro no se pudo realizar satisfactoriamente, favor notificarle al administrador";
				DataBase::createLog($code, $text, $file, $line);
    }
		return $msn;

}



	public function readUserbyEmail($data){
			try{

				$sql = "SELECT mzscann_usuarios.usu_codigo, usu_nombre_comp, acce_token, acc_clave FROM mzscann_usuarios INNER JOIN mzscann_acceso ON mzscann_acceso.usu_codigo = mzscann_usuarios.usu_codigo WHERE usu_mail = ?";
				$query = $this->pdo->prepare($sql);
				$query->execute(array($data[0]));
				$result = $query->fetch(PDO::FETCH_BOTH);

			}catch (PDOException $e) {
				$code = $e->getCode();
				$text = $e->getMessage();
				$file = $e->getFile();
				$line = $e->getLine();
				DataBase::createLog($code, $text, $file, $line);
		}

		return $result;
	}
	public function readUserByToken($field){
            try {
                $sql="SELECT * FROM mzscann_acceso WHERE acce_token = ?";
                $query = $this->pdo->prepare($sql);
                $query->execute(array($field));
                $result = $query->fetch(PDO::FETCH_BOTH);

            } catch (PDOException $e) {
							$code = $e->getCode();
							$text = $e->getMessage();
							$file = $e->getFile();
							$line = $e->getLine();
							DataBase::createLog($code, $text, $file, $line);
					}
					return $result;
        }

					public function readUserbyEmailRe($data){
							try{

								$sql = "SELECT mzscann_usuarios.usu_codigo, usu_nombre_comp, acce_token, acc_clave FROM mzscann_usuarios INNER JOIN mzscann_acceso ON mzscann_acceso.usu_codigo = mzscann_usuarios.usu_codigo WHERE usu_mail = ?";
								$query = $this->pdo->prepare($sql);
								$query->execute(array($data[1]));
								$result = $query->fetch(PDO::FETCH_BOTH);

							}catch (PDOException $e) {
								$code = $e->getCode();
								$text = $e->getMessage();
								$file = $e->getFile();
								$line = $e->getLine();
								DataBase::createLog($code, $text, $file, $line);
						}

						return $result;
					}

					public function updateUserFail($data){
						try{

							 $sql = "UPDATE mzscann_acceso SET acc_intento_fallido = (acc_intento_fallido + 1) WHERE usu_codigo = (SELECT usu_codigo FROM mzscann_usuarios WHERE usu_mail = ?) ";
							 $query = $this->pdo->prepare($sql);
							 $query->execute(array($data));
							 }catch (PDOException $e) {
								 $code = $e->getCode();
								$text = $e->getMessage();
								$file = $e->getFile();
								$line = $e->getLine();
								DataBase::createLog($code, $text, $file, $line);
							 }

						}

					public function updatePassword($data){
					try {
							$sql = "UPDATE mzscann_acceso SET acc_clave = ? WHERE acce_token = ?";
							$query = $this->pdo->prepare($sql);
							$query->execute(array($data[0],$data[1]));
							$msn = "Modifico contraseña con exito";
					} catch (PDOException $e) {
						$code = $e->getCode();
					 $text = $e->getMessage();
					 $file = $e->getFile();
					 $line = $e->getLine();
					 DataBase::createLog($code, $text, $file, $line);
					}
					return $msn;
			}


    public function readRol(){
            try {
                $sql="SELECT * FROM mzscann_roles ORDER BY rol_nombre";
                $query = $this->pdo->prepare($sql);
                $query->execute();
                $result = $query->fetchALL(PDO::FETCH_BOTH);

                return $result;
            } catch (PDOException $e) {
							$code = $e->getCode();
							$text = $e->getMessage();
							$file = $e->getFile();
							$line = $e->getLine();
							DataBase::createLog($code, $text, $file, $line);

            }
        }
    public function readUsuario(){
        try {
            $sql = "SELECT * FROM mzscann_usuarios ORDER BY usu_codigo";
            $query = $this->pdo->prepare($sql);
            $query->execute();
            $result = $query->fetchALL(PDO::FETCH_BOTH);
            return $result;
        }catch (PDOException $e) {
					$code = $e->getCode();
					$text = $e->getMessage();
					$file = $e->getFile();
					$line = $e->getLine();
					DataBase::createLog($code, $text, $file, $line);
    }
	}
    public function readUsuarioByCode($field){
            try {
                $sql="SELECT * FROM mzscann_usuarios WHERE usu_codigo = ?";
                $query = $this->pdo->prepare($sql);
                $query->execute(array($field));
                $result = $query->fetch(PDO::FETCH_BOTH);
                return $result;
            } catch (PDOException $e) {
							$code = $e->getCode();
							$text = $e->getMessage();
							$file = $e->getFile();
							$line = $e->getLine();
							DataBase::createLog($code, $text, $file, $line);
            }

        }
    public function updateUsuario($data){
            try {
                $sql="UPDATE mzscann_usuarios SET usu_nombre_comp = ?, usu_fech_naci = ?, usu_sexo = ?, usu_tel_cel = ?, usu_mail = ?, rol_codigo = ? WHERE usu_codigo = ?";
                $query = $this->pdo->prepare($sql);
                $query->execute(array($data[0],$data[1],$data[2],$data[3],$data[4],$data[5],$data[6]));

                $msn = "Modifico con exito!";
            } catch (PDOException $e) {
							$code = $e->getCode();
							$text = $e->getMessage();
							$file = $e->getFile();
							$line = $e->getLine();
							DataBase::createLog($code, $text, $file, $line);
            }
            return $msn;
        }

				public function updateStatusByToken($data){
            try {
                $sql="UPDATE mzscann_acceso SET acc_estado = 'Activo' WHERE acce_token = ?";
                $query = $this->pdo->prepare($sql);
                $query->execute(array($data));
                $msn = "Estado modificado con exito!";
            } catch (PDOException $e) {
                die($e->getMessage()."".$e->getLine()."".$e->getFile());
            }
            return $msn;
        }

    public function deleteUsuario($field){
            try {
                $sql = "DELETE FROM mzscann_usuarios WHERE usu_codigo = ?";
                $query = $this->pdo->prepare($sql);
                $query->execute(array($field));
                $msn = "Eliminado correctamente!";
            } catch (PDOException $e) {
							$code = $e->getCode();
							$text = $e->getMessage();
							$file = $e->getFile();
							$line = $e->getLine();
							DataBase::createLog($code, $text, $file, $line);
            }
            return $msn;
        }


				public function sendEmailActiveAccount($data){
					$mail = new PHPMailer();
					$mail->isSMTP();
					$mail->Host = 'smtp.gmail.com';
					$mail->SMTPAuth = true;
					$mail->Username = 'myzonescann.1@gmail.com';
					$mail->Password = 'adsamyzone';

					$mail->SMTPSecure = 'tls';
					$mail->Port = 587;

					$mail->setFrom('myzonescann.1@gmail.com'); // este es el mismo del mail->username
					$mail->addAddress($data[1]);
					$mail->isHTML(true);
					$mail->Subject = 'Activa tu cuenta ';
					$mail->Body = 'Activación de cuenta MyZoneScann';
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
						        </tr><tbody><tr><td width="640" valign="top" style=font-family: "Lato", sans-serif;";border-collapse:collapse">
						        <div style="max-width:600px;margin:0 auto">
						        <div style="background:white;border-radius:0.5rem;margin-bottom:1rem;font-family: "Lato", sans-serif;">
						           <h2 style="color:#ff2b4d;line-height:30px;margin-bottom:12px;margin:0 0 12px;text-align:center;">Activa tu cuenta en MyZoneScann</h2>
						    <div style="background: #fff; padding: 12px;font-family: "Lato", sans-serif;">
						      Hola <strong>'.$data[1].'</strong>,
						    </p>
						    <p style="font-size:20px;line-height:24px;margin:0 0 16px;font-family: "Lato", sans-serif;">
						    Tu cuenta se ha registrado correctamente, pero en estos momentos estás inactivo y no podrás ingresar nuestra app de <b>MyZoneScann</b> Para activarla ingresa al siguiente enlace:       </p>

						      <a href="http://localhost:8000/App_MZScann1/index.php?c=usuario&a=updateStatus&acce_token='.$response["acce_token"].'" style="margin-left:30%;">Clic aquí para activar tu cuenta </a>
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
                $msn = "Envio correctamente";
                header("Location: index.php?c=views&a=forgetPass&msn=$msn");
            } else {
                $msn = "Correo invalido";
                header("Location: index.php?c=views&a=forgetPass&msn=$msn");
            }
        }


    public function __DESTRUCT(){

            DataBase::disconnect();
        }
}

?>
