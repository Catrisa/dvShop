<?php 



class DataBase {

    public static function conexion(){
        try{

            $baseDatos = "dv-produccion_web-tienda";
            $host = "localhost";
            $port = 3306;
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