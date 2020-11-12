<?php 

require_once __DIR__ . "/../config/db.php";

class Categoria {

    private $id;
    private $nombre;

    private $db;

    function __construct(){
        $this->db = DataBase::conexion();
    }

    /* SETTERS */
    function setId($id){
        $this->id = $id;
    }
    
    function setNombre($nombre){
        $this->nombre = $nombre;
    }

    function getAll(){
        $sql = "SELECT * FROM categoria";   
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function save(){
        $sql = "INSERT INTO categoria VALUES(null, :nombre)";
        $query = $this->db->prepare($sql);
        $save = $query->execute([
            ":nombre" => $this->nombre
        ]);
        $result = $save ? true : false;

        return $result;
    }

    function delete(){
        $sql = "DELETE FROM categoria WHERE id = :id";
        $query = $this->db->prepare($sql);
        $save = $query->execute([
            ":id" => $this->id
        ]);
        $result = $save ? true : false;

        return $result;
    }
}