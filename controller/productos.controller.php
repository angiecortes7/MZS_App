<?php 
require_once("model/productos.model.php");

Class ProductosController {
	private $PRmodel;

	public function __CONSTRUCT()
	{
		$this->PRmodel = new ProductosModel();
	}
	public function mainPage()
	{
		require_once("views/include/header.php");
		require_once("views/modules/mod_productos/main_productos.php");
		require_once("views/include/footer.php");
	}
	public function viewCreate()
	{
		require_once("views/include/header.php");
		require_once("views/modules/mod_productos/inser_productos.php");
		require_once("views/include/footer.php");
	}

	public function create(){
		    $data = $_POST["data"];
            $result = $this->PRmodel->createProductos($data);
            header("Location: index.php?c=productos&msn=$result");
	}
	public function read()
	{
		require_once("views/include/header.php");
		require_once("views/modules/mod_productos/read_productos.php");
		require_once("views/include/footer.php");
	}

	public function update(){
		  $field = $_GET["rcode"];
          require_once 'views/include/header.php';
          require_once 'views/modules/mod_productos/update_productos.php';
          require_once 'views/include/footer.php';

	}
	public function updateData(){
        	$data = $_POST["data"];
            $result = $this->PRmodel->updateProductos($data);
            header("Location: index.php?c=productos&msn=$result");
    }
    public function delete(){
            $data = $_GET["rcode"];
            $result = $this->PRmodel->deleteProductos($data);
            header("Location: index.php?c=productos&msn=$result");
        }
}

?>