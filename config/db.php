<?php 



class DataBase {

    public static function conexion(){
        try{

            $baseDatos = "nameDataBase";
            $host = "localhost";
            $port = 3308;
            $user = "root";
            $password = "";
        
            return new PDO("mysql:dbname=$baseDatos;chartset=UTF-8;host=$host;port=$port",$user,$password);
        
        }catch( Exception $e ){
        
            echo "Erro en la conexion con la base de datos <br>";
            echo $e->getMessage();
            exit();
        }
    }

}