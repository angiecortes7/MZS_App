<?php 
require_once("model/categoria.model.php");

Class CategoriaController {
	private $Cmodel;

	public function __CONSTRUCT()
	{
		$this->Cmodel = new CategoriaModel();
	}
	public function mainPage()
	{
		require_once("views/include/header.php");
		require_once("views/modules/mod_categoria/main_categoria.php");
		require_once("views/include/footer.php");
	}
	public function viewCreate()
	{
		require_once("views/include/header.php");
		require_once("views/modules/mod_categoria/inser_categoria.php");
		require_once("views/include/footer.php");
	}

	public function create(){
		    $data = $_POST["data"];
            $result = $this->Cmodel->createCategoria($data);
            header("Location: index.php?c=categoria&msn=$result");
	}
	public function read()
	{
		require_once("views/include/header.php");
		require_once("views/modules/mod_categoria/read_categoria.php");
		require_once("views/include/footer.php");
	}

	public function update(){
		  $field = $_GET["rcode"];
          require_once 'views/include/header.php';
          require_once 'views/modules/mod_categoria/update_categoria.php';
          require_once 'views/include/footer.php';

	}
	public function updateData(){
        	$data = $_POST["data"];
            $result = $this->Cmodel->updateCategoria($data);
            header("Location: index.php?c=categoria&msn=$result");
    }
    public function delete(){
            $data = $_GET["rcode"];
            $result = $this->Cmodel->deleteCategoria($data);
            header("Location: index.php?c=categoria&msn=$result");
        }
}

?>