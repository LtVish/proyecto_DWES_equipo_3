<?php
class pizzeriaDB{
    private static $server='database';
    private static $db='pizzeriaDB';
    private static $user='root';
    private static $password = 'Pass1234';
    public static function connectDB(){
        try{
            $connection=new PDO("mysql:host=".self::$server.";dbname=".self::$db.";charset=utf8",self::$user,self::$password);
        }catch(PDOException $e){
            echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
            die("Error: ".$e->getMessage());
        }
        return $connection;
    }
}
?>