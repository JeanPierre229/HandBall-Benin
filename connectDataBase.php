<?php
    class DataBase{
        private static $mysqlhost = "localhost";
        private static $dbname = "u924654367_handball";
        private static $userAdmin = "u924654367_root";
        private static $mp = "J34nP13rr3";

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