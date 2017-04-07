<?php 

Class PaginaModel {
	private $pdo;

	function __CONSTRUCT()
	{
		try {
			$this->pdo = DataBase::connect();
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}catch(PDOExepcion $e){
			die($e->getMessage()."".$e->getLine()."".$e->getFile());
		}
	}
	public function createPagina($data){
            try {
                $sql = "INSERT INTO mzscann_pagina VALUES('',?,?,?,?)";
                $query = $this->pdo->prepare($sql);
                $query->execute(array($data[0],$data[1],$data[2],$data[3]));

                $msn = "Pagina guardado correctamente";
            } catch (PDOException $e) {
                die($e->getMessage()."".$e->getLine()."".$e->getFile());
            }
            return $msn;
        }
    public function readPagina(){
        try {
            $sql = "SELECT * FROM mzscann_pagina ORDER BY pag_codigo";
            $query = $this->pdo->prepare($sql);
            $query->execute();
            $result = $query->fetchALL(PDO::FETCH_BOTH);
            return $result;
        }catch (PDOException $e) {
            die($e->getMessage()."".$e->getLine()."".$e->getFile());
        }    
    }    
    public function readPaginaByCode($field){
            try {
                $sql="SELECT * FROM mzscann_pagina WHERE pag_codigo = ?";
                $query = $this->pdo->prepare($sql);
                $query->execute(array($field));
                $result = $query->fetch(PDO::FETCH_BOTH);
                return $result;
            } catch (PDOException $e) {
                die($e->getMessage()."".$e->getLine()."".$e->getFile());
            }

        }
    public function updatePagina($data){
            try {
                $sql="UPDATE mzscann_pagina SET pag_nombre = ?, pag_menu = ?, pag_icono = ?, pag_seccion = ? WHERE pag_codigo = ?";
                $query = $this->pdo->prepare($sql);
                $query->execute(array($data[0],$data[1],$data[2],$data[3],$data[4]));

                $msn = "Modifico con exito!";
            } catch (PDOException $e) {
                die($e->getMessage()."".$e->getLine()."".$e->getFile());
            }
            return $msn;
        }

    public function deletePagina($field){
            try {
                $sql = "DELETE FROM mzscann_pagina WHERE pag_codigo = ?";
                $query = $this->pdo->prepare($sql);
                $query->execute(array($field));
                $msn = "Eliminado correctamente!";
            } catch (PDOException $e) {
                die($e->getMessage()."".$e->getLine()."".$e->getFile());
            }
            return $msn;
        }

    public function __DESTRUCT(){
    	
            DataBase::disconnect();
        }    
}

?>