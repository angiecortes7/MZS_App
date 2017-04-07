<?php 
require_once("model/pagina.model.php");

Class PaginaController {
	private $Pmodel;

	public function __CONSTRUCT()
	{
		$this->Pmodel = new PaginaModel();
	}
	public function mainPage()
	{
		require_once("views/include/header.php");
		require_once("views/modules/mod_pagina/main_pagina.php");
		require_once("views/include/footer.php");
	}
	public function viewCreate()
	{
		require_once("views/include/header.php");
		require_once("views/modules/mod_pagina/inser_pagina.php");
		require_once("views/include/footer.php");
	}

	public function create(){
		    $data = $_POST["data"];
            $result = $this->Pmodel->createPagina($data);
            header("Location: index.php?c=pagina&msn=$result");
	}
	public function read()
	{
		require_once("views/include/header.php");
		require_once("views/modules/mod_pagina/read_pagina.php");
		require_once("views/include/footer.php");
	}

	public function update(){
		  $field = $_GET["rcode"];
          require_once 'views/include/header.php';
          require_once 'views/modules/mod_pagina/update_pagina.php';
          require_once 'views/include/footer.php';

	}
	public function updateData(){
        	$data = $_POST["data"];
            $result = $this->Pmodel->updatePagina($data);
            header("Location: index.php?c=pagina&msn=$result");
    }
    public function delete(){
            $data = $_GET["rcode"];
            $result = $this->Pmodel->deletePagina($data);
            header("Location: index.php?c=pagina&msn=$result");
        }
}

?>