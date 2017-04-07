<?php

Class LoginModel{
	private $pdo;

	public function __CONSTRUCT(){
    try {
      $this->pdo = DataBase::connect();
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      die($e->getMessage()."".$e->getLine()."".$e->getFile());
    }
 }
 	public function compruebaLogin($data){
 		try{
 		  $sql="SELECT mzscann_usuarios.usu_codigo, mzscann_usuarios.usu_nombre_comp,mzscann_usuarios.usu_fech_naci,mzscann_usuarios.usu_sexo FROM mzscann_acceso INNER JOIN mzscann_usuarios ON (mzscann_acceso.usu_codigo=mzscann_usuarios.usu_codigo) WHERE mzscann_usuarios.usu_mail = ? and mzscann_acceso.acc_clave =?";
 			$query=$this->pdo->prepare($sql);
 			$query->execute(array($data[0],$data[1]));
 			$result=$query->fetch(PDO::FETCH_BOTH);
			if (count($result[0]>0)) {

				return $result;
			}else{

				return $result;
			}

 		}catch(PDOException $e){
 			die($e->getMessage()."".$e->getLine()."".$e->getFile());
 		}
 	}
}

?>
