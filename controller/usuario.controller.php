<?php
require_once ('model/usuario.model.php');
require_once ('views/assets/random/random.php');

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

public function viewCreate()
	{
		$class = 'class = "registro"';
		require_once("views/include/header_movil.php");
		require_once("views/modules/mod_usuario/inser_usuario.php");
		require_once("views/include/footer.php");
	}



	public function create(){
		    $data = $_POST["data"];
				$data[2]= password_hash($data[2], PASSWORD_DEFAULT);
				$data[4]= "USU-".date('Ymd').'-'.date('i');
				$data[7]= randAlphanum(30);
				$data[6]= "Inactivo";

				//print_r($data);

				if(strlen($data[2]) < 8){
		       $msn= "La clave debe tener al menos 8 caracteres";
					 header("Location: index.php?c=usuario&a=viewCreate&msn=$msn");
					 }
					 elseif(!preg_match('`[a-z]`',$data[2])){
				      $msn = "La clave debe tener al menos una letra minúscula";
				      header("Location: index.php?c=usuario&a=viewCreate&msn=$msn");
	 					 }
						 /*elseif(!preg_match('`[/-\-*-+-%-&-@-¡-!|]`',$data[9])){
						      $msn = "La clave debe tener al menos un simbolo";
						      header("Location: index.php?c=usuario&a=viewCreate&msn=$msn");
								}*/
						 elseif(!preg_match('`[0-9]`',$data[2])){
					      $msn = "La clave debe tener al menos un numero";
					      header("Location: index.php?c=usuario&a=viewCreate&msn=$msn");
		 					 }
					 elseif($data[2]!==$data[2]){
			 		       $msn= "Las contraseñas no coinciden";
			 					 header("Location: index.php?c=usuario&a=viewCreate&msn=$msn");
							 }



					if(!isset($_SESSION["_usu_rol"])){
							$data[5] = "rol_visit_def";
						}


            $result = $this->Umodel->createUsuario($data);
						header("Location: index.php?c=usuario&a=viewCreate&msn=$result");
						echo $result;

			}


	public function read(){
		require_once("views/include/header.php");
		require_once("views/modules/mod_usuario/read_usuario.php");
		require_once("views/include/footer.php");
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
				/*
				public function phpmailer(){
		            $data = $_GET["usucode"];
		            $result = $this->Umodel->deleteUsuario($data);
		            header("Location: index.php?c=usuario&msn=$result");
		        }*/
}


?>