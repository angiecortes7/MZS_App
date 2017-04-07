<?php

    class DataBase{
        private static $db_host = "localhost";
        private static $db_name = "mzscann";
        private static $db_user = "root";
        private static $db_pass = "";
        private static $db_conn = null;

        public static function connect(){
            if(self::$db_conn==null){
                try {
                    self::$db_conn = new PDO("mysql:host=".self::$db_host.";dbname=".self::$db_name,self::$db_user,self::$db_pass);
                    self::$db_conn->exec("SET CHARACTER SET utf8");
                } catch (PDOException $e) {
                    die($e->getMessage()."".$e->getLine()."".$e->getFile());
                }
            }
            return self::$db_conn;
        }

        public static function disconnect(){
            self::$db_conn=null;
        }
    }

?>
