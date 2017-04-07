<?php 

Class CategoriaModel {
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
	public function createCategoria($data){
            try {
                $sql = "INSERT INTO mzscann_categoria VALUES('',?,?)";
                $query = $this->pdo->prepare($sql);
                $query->execute(array($data[0],$data[1]));

                $msn = "Categoria guardado correctamente";
            } catch (PDOException $e) {
                die($e->getMessage()."".$e->getLine()."".$e->getFile());
            }
            return $msn;
        }
    public function readCategoria(){
        try {
            $sql = "SELECT * FROM mzscann_categoria ORDER BY categ_codigo";
            $query = $this->pdo->prepare($sql);
            $query->execute();
            $result = $query->fetchALL(PDO::FETCH_BOTH);
            return $result;
        }catch (PDOException $e) {
            die($e->getMessage()."".$e->getLine()."".$e->getFile());
        }    
    }    
    public function readCategoriaByCode($field){
            try {
                $sql="SELECT * FROM mzscann_categoria WHERE categ_codigo = ?";
                $query = $this->pdo->prepare($sql);
                $query->execute(array($field));
                $result = $query->fetch(PDO::FETCH_BOTH);
                return $result;
            } catch (PDOException $e) {
                die($e->getMessage()."".$e->getLine()."".$e->getFile());
            }

        }
    public function updateCategoria($data){
            try {
                $sql="UPDATE mzscann_categoria SET categ_nombre = ?, categ_imagen = ? WHERE categ_codigo = ?";
                $query = $this->pdo->prepare($sql);
                $query->execute(array($data[0],$data[1],$data[2]));

                $msn = "Modifico con exito!";
            } catch (PDOException $e) {
                die($e->getMessage()."".$e->getLine()."".$e->getFile());
            }
            return $msn;
        }

    public function deleteCategoria($field){
            try {
                $sql = "DELETE FROM mzscann_categoria WHERE categ_codigo = ?";
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