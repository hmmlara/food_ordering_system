<?php
class Database{
    private static $host="localhost";
    private static $dbname="fos";
    private static $username="root";
    private static $password="";
    private static $cont="";

    public static function connect(){
        try{
            self::$cont=new PDO("mysql:host=".self::$host.";dbname=".self::$dbname,self::$username,self::$password);
        }
        catch(PDOException $e){
            echo $e->getMesssage();
        }
        return self::$cont;
    }
    public static function disconnect(){
        self::$cont=null;
    }
}
?>