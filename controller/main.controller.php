<?php

Class MainController{

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
	

}

?>
