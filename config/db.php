<?php 

/*
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=crudposts
DB_USERNAME=root
DB_PASSWORD=
*/

class DataBase {

    public static function conexion(){
        try{

            $baseDatos = "dvshop";
            $host = "127.0.0.1";
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