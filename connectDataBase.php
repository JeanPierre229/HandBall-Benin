<?php
    class DataBase{
        private static $mysqlhost = "localhost";
        private static $dbname = "handball";
        private static $userAdmin = "root";
        private static $mp = "";

        public static $connect = null;

        public static function connect(){
            try{
                self::$connect = new PDO("mysql: host=".self::$mysqlhost. "; dbname=" .self::$dbname, self::$userAdmin, self::$mp);
            }catch(PDOException $e){
                die($e->getMessage());
            }
            return self::$connect;
        }
    }
?>