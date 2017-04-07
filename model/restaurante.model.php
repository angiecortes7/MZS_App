<?php 

Class RestauranteModel {
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
	public function createRestaurante($data){
            try {
                $sql = "INSERT INTO mzscann_restaurante VALUES('',?,?,?,?,?)";
                $query = $this->pdo->prepare($sql);
                $query->execute(array($data[0],$data[1],$data[2],$data[3],$data[4]));

                $msn = "restaurante guardado correctamente";
            } catch (PDOException $e) {
                die($e->getMessage()."".$e->getLine()."".$e->getFile());
            }
            return $msn;
        }
    public function readRestaurante(){
        try {
            $sql = "SELECT * FROM mzscann_restaurante ORDER BY restau_codigo";
            $query = $this->pdo->prepare($sql);
            $query->execute();
            $result = $query->fetchALL(PDO::FETCH_BOTH);
            return $result;
        }catch (PDOException $e) {
            die($e->getMessage()."".$e->getLine()."".$e->getFile());
        }    
    }    
    public function readRestauranteByCode($field){
            try {
                $sql="SELECT * FROM mzscann_restaurante WHERE restau_codigo = ?";
                $query = $this->pdo->prepare($sql);
                $query->execute(array($field));
                $result = $query->fetch(PDO::FETCH_BOTH);
                return $result;
            } catch (PDOException $e) {
                die($e->getMessage()."".$e->getLine()."".$e->getFile());
            }

        }
    public function updateRestaurante($data){
            try {
                $sql="UPDATE mzscann_restaurante SET restau_nombre = ?, restau_telefono = ?, restau_direccion = ?, restau_horario = ?, restau_cant_mesas = ? WHERE restau_codigo = ?";
                $query = $this->pdo->prepare($sql);
                $query->execute(array($data[0],$data[1],$data[2],$data[3],$data[4],$data[5]));

                $msn = "Modifico con exito!";
            } catch (PDOException $e) {
                die($e->getMessage()."".$e->getLine()."".$e->getFile());
            }
            return $msn;
        }

    public function deleteRestaurante($field){
            try {
                $sql = "DELETE FROM mzscann_restaurante WHERE restau_codigo = ?";
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