<?php
require_once("model/rol.model.php");

Class RolController {
	private $Rmodel;

	public function __CONSTRUCT()
	{
		$this->Rmodel = new RolModel();
	}
	public function mainPage()
	{
		require_once("views/include/header.php");
		require_once("views/modules/mod_rol/main_rol.php");
		require_once("views/include/footer.php");
	}
	public function viewCreate()
	{
		require_once("views/include/header.php");
		require_once("views/modules/mod_rol/inser_rol.php");
		require_once("views/include/footer.php");
	}

	public function create(){
		    $data = $_POST["data"];
            $result = $this->Rmodel->createRol($data);
            header("Location: index.php?c=rol&msn=$result");
	}
	public function read()
	{
		require_once("views/include/header.php");
		require_once("views/modules/mod_rol/read_rol.php");
		require_once("views/include/footer.php");
	}

	public function update(){
		  $field = $_GET["rcode"];
          require_once ("views/include/header.php");
          require_once ("views/modules/mod_rol/update_rol.php");
          require_once ("views/include/footer.php");

	}
	public function updateData(){
        	$data = $_POST["data"];
            $result = $this->Rmodel->updateRol($data);
            header("Location: index.php?c=rol&msn=$result");
    }
    public function delete(){
            $data = $_GET["rcode"];
            $result = $this->Rmodel->deleteRol($data);
            header("Location: index.php?c=rol&msn=$result");
        }
}

?>
