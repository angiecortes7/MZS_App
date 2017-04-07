<?php 
require_once("model/restaurante.model.php");

Class RestauranteController {
	private $REmodel;

	public function __CONSTRUCT()
	{
		$this->REmodel = new RestauranteModel();
	}
	public function mainPage()
	{
		require_once("views/include/header.php");
		require_once("views/modules/mod_restaurante/main_restaurante.php");
		require_once("views/include/footer.php");
	}
	public function viewCreate()
	{
		require_once("views/include/header.php");
		require_once("views/modules/mod_restaurante/inser_restaurante.php");
		require_once("views/include/footer.php");
	}

	public function create(){
		    $data = $_POST["data"];
            $result = $this->REmodel->createRestaurante($data);
            header("Location: index.php?c=restaurante&msn=$result");
	}
	public function read()
	{
		require_once("views/include/header.php");
		require_once("views/modules/mod_restaurante/read_restaurante.php");
		require_once("views/include/footer.php");
	}

	public function update(){
		  $field = $_GET["rcode"];
          require_once 'views/include/header.php';
          require_once 'views/modules/mod_restaurante/update_restaurante.php';
          require_once 'views/include/footer.php';

	}
	public function updateData(){
        	$data = $_POST["data"];
            $result = $this->REmodel->updateRestaurante($data);
            header("Location: index.php?c=restaurante&msn=$result");
    }
    public function delete(){
            $data = $_GET["rcode"];
            $result = $this->REmodel->deleteRestaurante($data);
            header("Location: index.php?c=restaurante&msn=$result");
        }
}

?>