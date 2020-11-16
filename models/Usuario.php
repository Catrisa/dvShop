<?php 

require_once __DIR__ . "/../config/db.php";

class Usuario{

    private $id;
    private $nombre;
    private $apellido;
    private $email;
    private $password;
    private $rol;

    private $db;
    
    public function __construct(){
        $this->db = DataBase::conexion();
    }

    /* SETTERS */
    public function setId($id){
        $this->id = $id ;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    public function setRol($rol){
        $this->rol = $rol ;
    }
    
    public function save(){
        $sql = "INSERT INTO usuario VALUES(null,:nombre,:apellido,:email,:pass,:rol)";
        $query = $this->db->prepare($sql);
        $resultado = $query->execute([
            ":nombre" => $this->nombre,
            ":apellido" => $this->apellido,
            ":email" => $this->email,
            ":pass" => $this->password,
            //":pass" => password_hash($this->password,PASSWORD_BCRYPT),
            ":rol" => 'user'
        ]);
        
        return $resultado;
    }

    public function login(){            
        $email = $this->email;
        $password = $this->password;
        
        // Comprobar si existe el usuario
        $sql = "SELECT * FROM usuario WHERE email = :email";
        $queryLogin = $this->db->prepare($sql);
        $queryLogin->execute([
            ":email" => $email
        ]);
        $usuario = $queryLogin->fetch(PDO::FETCH_OBJ);
        
        if( $usuario && password_verify($password, $usuario->clave) ){
            return $usuario;
        }
        
        return false;

    }

}
