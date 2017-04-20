<?php

Class UsuarioModel {
	private $pdo;
    private static $token;

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


				$msn = "Usuario guardado correctamente";
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
				public function enviarMensaje_Contrasena(){
						$data = $_POST["data"];
						$response = $this->Umodel->readUserbyEmail($data);
						$mail = new PHPMailer();
						$mail->isSMTP();
						$mail->Host = 'smtp.gmail.com';
						$mail->SMTPAuth = true;
						$mail->Username = 'myzonescann.1@gmail.com';
						$mail->Password = '1myzonescann';

						$mail->SMTPSecure = 'tls';
						$mail->Port = 587;

						$mail->setFrom('myzonescann.1@gmail.com'); // este es el mismo del mail->username
						$mail->addAddress($data[0]);
						$mail->isHTML(true);
						$mail->Subject = 'Recupera tu Contraseña ';
						$mail->Body = 'Recuperación de contraseña MyZoneScann';
						$mail->MsgHTML('
						<a href="http://localhost:8000/MZS_App/index.php?c=usuario&a=restorePassword&acce_token='. $response["acce_token"] .'">Haz clic aquí para tu nueva contraseña</a>
						');
						$mail->CharSet = 'UTF-8';
						if ($mail->send()) {
								$msn = "Envio correctamente";
						} else {
								$msn = "Correo no invalido";
						}
				}


    public function __DESTRUCT(){

            DataBase::disconnect();
        }
}

?>
