<?php 

require_once __DIR__ . "/../models/Producto.php";
require_once __DIR__ . "/../helpers/Utils.php";

class ProductoController{

    public function index(){
        if(Utils::isAdmin()){
            header("Location: ".base_url."index.php?controller=producto&action=getAll");
        }else{
            /* Muestro algunos productos */
            $producto = new Producto();
            $productos = $producto->getRandom(8);
            require_once __DIR__ . "/../views/producto/destacados.php";
        }
    }

    public function getAll(){
        if( !Utils::isAdmin() ){
            Utils::notIsAdmin();
        }
        // Buscar todos los productos
        $producto = new Producto();
        $productos = $producto->getAll();
        // Mostrar lista de productos
        require_once __DIR__ . "/../views/producto/ver.php";
        
    }

    // Mostrar por categoria
    public function getForCategoria(){
        
    }

    public function create(){
        if(!Utils::isAdmin()){
            Utils::notIsAdmin();
        }
        
        if( isset($_GET["id"]) ){
            $producto_id = $_GET["id"];
            // Busco el producto en la base de datos
            $productoDB = new Producto();
            $productoDB->setId($producto_id);
            $producto = $productoDB->getOne();
        }

        require_once __DIR__ . "/../views/producto/crear.php";
    }

    public function save(){
        if(!Utils::isAdmin()){
            Utils::notIsAdmin();
        }
        if( isset($_POST["submitCrear"]) ){
            $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : false;
            $precio = isset($_POST["precio"]) ? $_POST["precio"] : false;
            $descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"] : false;
            $categoriaId = isset($_POST["categoriaId"]) ? $_POST["categoriaId"] : false;
            $file = isset($_FILES["img"]) ? $_FILES["img"] : false;

            if($nombre && $precio && $descripcion && $file ){
                $nameImg = trim(str_replace(" ","_",$file["name"])); // Elimino los espacios
                $img = $file["tmp_name"]; //ruta
                $type = $file["type"];
                $destino = __DIR__."/../uploads/images/".$nameImg;
                
                if( $type == "image/jpg" || $type == "image/jpeg" || $type == "image/png" ){
                    // Creo el objeto Producto y setteo sus atributos
                    $producto = new Producto();
                    $producto->setNombre($nombre);
                    $producto->setPrecio($precio);
                    $producto->setDescripcion($descripcion);
                    $producto->setImagen($nameImg);
                    $producto->setCategoriaId($categoriaId);
                    // Guardo el nuevo producto en la base de datos
                    $save = $producto->save();

                    if($save){
                        move_uploaded_file($img,$destino);
                        $_SESSION["productoGuardado"] = "Se agrego un nuevo producto!";
                        header("Location: ".base_url."index.php?controller=producto&action=index");
                    }else{
                        $_SESSION["error"]["flag"] = true;
                        $_SESSION["error"]["message"] = "Hubo un error al guardar los datos, vuelva a intentarlo!";
                        header("Location: ".base_url."index.php?controller=producto&action=create");
                    }

                }else{
                    $_SESSION["error"]["flag"] = true;
                    $_SESSION["error"]["message"] = "Solo se aceptan archivos .jpg, .png y .jpeg !";
                    header("Location: ".base_url."index.php?controller=producto&action=create");
                }

            }else{
                $_SESSION["error"]["flag"] = true;
                $_SESSION["error"]["message"] = "No llegaron los campos necesarios, vuelva a intentarlo!";
                header("Location: ".base_url."index.php?controller=producto&action=create");
            }
        
        }else{
            header("Location: ".base_url."index.php?controller=producto&action=index");
        }
    }
    
    public function edit(){
        if(!Utils::isAdmin()){
            Utils::notIsAdmin();
        }
        $producto_id = $_GET["id"];
        header("Location: ".base_url."index.php?controller=producto&action=create&id=".$producto_id);
        
    }

    public function update(){
        if(!Utils::isAdmin()){
            Utils::notIsAdmin();
        }
        
        $id = isset($_POST["id"]) ? $_POST["id"] : false; 
        $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : false; 
        $precio = isset($_POST["precio"]) ? $_POST["precio"] : false; 
        $descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"] : false; 
        $categoriaId = isset($_POST["categoriaId"]) ? $_POST["categoriaId"] : false;
        $file = isset($_FILES["img"]) ? $_FILES["img"] : false;

        // File img
        $imgName = trim(str_replace(" ","_",$file["name"]));
        $img = $file["tmp_name"];
        $type = $file["type"];
        $destino = __DIR__."/../uploads/images/".$imgName;
        
        if( $id && $nombre && $precio && $descripcion && $categoriaId && $file ){
            $producto = new Producto();
            $producto->setId($id);
            $producto->setNombre($nombre);
            $producto->setPrecio($precio);
            $producto->setDescripcion($descripcion);
            $producto->setCategoriaId($categoriaId);

            // ~~~~~~~~~~~~~~~~ Condicional para ver si actualizar la imagen o no ~~~~~~~~~~~~~~~~
            if(empty($file["name"])){
                // No cambio la imagen
                $save = $producto->update(false);
            }else{
                // Actualizar la imagen
                echo "Hay una nueva imagen";
                $producto->setImagen($imgName); 

                if( $type == "image/jpg" || $type == "image/jpeg" || $type == "image/png" ){
                    // Busco la imagen que tengo que borrar
                    $productAct = new Producto();
                    $productAct->setId($id);
                    $productoActual = $productAct->getOne();
                    $nameImgActual = $productoActual->imagen;
                    //Actualizo la Base de Datos
                    $save = $producto->update();
                    // Borro la imagen del directorio uploads/images
                    unlink(__DIR__."/../uploads/images/".$nameImgActual);
                    
                }else{
                    $_SESSION["error"]["flag"] = true;
                    $_SESSION["error"]["message"] = "Solo se aceptan archivos .jpg, .png y .jpeg !";
                    header("Location: ".base_url."index.php?controller=producto&action=create&id=".$id);
                }                
            }

            // Si la imagen se guardo bien en la DB la guardo en la carpeta uploads
            if($save){
                move_uploaded_file($img,$destino);
                $_SESSION["update"]["flag"] = true;
                $_SESSION["update"]["message"] = "Se actualizo un producto!";
                header("Location: ".base_url."index.php?controller=producto&action=index");
            }else{
                $_SESSION["error"]["flag"] = true;
                $_SESSION["error"]["message"] = "No se puedieron guardar los datos en la base de datos!";
                header("Location: ".base_url."index.php?controller=producto&action=create&id=".$id);
            }
            
        }else{
            $_SESSION["error"]["flag"] = true;
            $_SESSION["error"]["message"] = "No llegaron todos los datos";
            header("Location: ".base_url."index.php?controller=producto&action=create&id=".$id);
        }

    } 
    
    public function delete(){
        if(!Utils::isAdmin()){
            Utils::notIsAdmin();
        }
        $id = $_GET["id"];
        $producto = new Producto();
        $producto->setId($id);
        // Borro el registros
        $productoDelete = new Producto();
        $productoDelete->setId($id);
        $nameImg = $productoDelete->getOne()->imagen;
        $delete = $producto->delete();
        if($delete){
            $_SESSION["delete"]["flag"] = true;
            $_SESSION["delete"]["message"] = "Se ha eliminado un producto!";
            // Borro el archivo de uploads/images
            
            unlink(__DIR__."/../uploads/images/".$nameImg);
        }else{
            $_SESSION["delete"]["flag"] = false;
            $_SESSION["delete"]["message"] = "No se pudo elimar el producto, vuelva a intentarlo!";
        }
        header("Location: ".base_url."index.php?controller=producto&action=index");
    }
}