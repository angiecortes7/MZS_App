<?php

require_once("model/login.model.php");

Class MainController{
	private $Lmodel;

	public function __CONSTRUCT(){
		$this->Lmodel = new LoginModel();
	}

	public function mainPage(){
		$class= 'class ="login"';

	if(isset($_SESSION["_usu_codigo"])){
			header("Location: index.php?c=main&a=dashboard");
		}

		require_once("views/include/header_movil.php");
    require_once("views/login.php");
		require_once("views/include/footer.php");
	}

	public function dashboard(){
		require_once("views/include/header_movil.php");
		if(!isset($_SESSION["_usu_codigo"])){
          header("Location: inicio.html");
      }else{
          require_once ("views/dashboard.php");
      }

		require_once("views/include/footer.php");
	}

	public function login(){
		$data=$_POST["data"];
		$result = $this->Lmodel->compruebaLogin($data);
		if ($result==true) {
			$_SESSION["_usu_codigo"] = $result["usu_codigo"];
			$_SESSION["_usu_nombre"] = $result["usu_nombre_comp"];
			$_SESSION["_usu_rol"]		= $result["rol_codigo"];

		header("Location:index.php?c=main&a=dashboard");
		}else{
			$msn="Correo o contraseña invalido";
			header("Location:index.php?c=main&msn=$msn");
		}
	}
}

?>
