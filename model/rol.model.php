<?php

Class RolModel {
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
	public function createRol($data){
            try {
              $sql = "INSERT INTO mzscann_roles VALUES('',?,?,?)";
              $query = $this->pdo->prepare($sql);
              $query->execute(array($data[0],$data[1],$data[2]));

                $msn = "Rol guardado correctamente";
            } catch (PDOException $e) {
                die($e->getMessage()."".$e->getLine()."".$e->getFile());
            }
            return $msn;
        }
    public function readRol(){
        try {
            $sql = "SELECT * FROM mzscann_roles ORDER BY rol_codigo";
            $query = $this->pdo->prepare($sql);
            $query->execute();
            $result = $query->fetchALL(PDO::FETCH_BOTH);
            return $result;
        }catch (PDOException $e) {
            die($e->getMessage()."".$e->getLine()."".$e->getFile());
        }
    }
    public function readRolByCode($field){
            try {
                $sql="SELECT * FROM mzscann_roles WHERE rol_codigo = ?";
                $query = $this->pdo->prepare($sql);
                $query->execute(array($field));
                $result = $query->fetch(PDO::FETCH_BOTH);
                return $result;
            } catch (PDOException $e) {
                die($e->getMessage()."".$e->getLine()."".$e->getFile());
            }

        }
    public function updateRol($data){
            try {
                $sql="UPDATE mzscann_roles SET rol_nombre = ?, rol_descripcion = ?, rol_fech_creacion = ? WHERE rol_codigo = ?";
                $query = $this->pdo->prepare($sql);
                $query->execute(array($data[0],$data[1],$data[2],$data[3]));

                $msn = "Modifico con exito!";
            } catch (PDOException $e) {
                die($e->getMessage()."".$e->getLine()."".$e->getFile());
            }
            return $msn;
        }

    public function deleteRol($field){
            try {
                $sql = "DELETE FROM mzscann_roles WHERE rol_codigo = ?";
                $query = $this->pdo->prepare($sql);
                $query->execute(array($field));
                $msn = "Eliminado correctamente!";
            } catch (PDOException $e) {
                die($e->getMessage()."
                ".$e->getLine()."".$e->getFile());
            }
            return $msn;
        }

    public function __DESTRUCT(){

            DataBase::disconnect();
        }
}

?>
