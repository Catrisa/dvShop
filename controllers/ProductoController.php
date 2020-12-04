<?php 

require_once __DIR__ . "/../models/Producto.php";
require_once __DIR__ . "/../models/Categoria.php";
require_once __DIR__ . "/../helpers/Utils.php";

class ProductoController{

    private const RESULTADOS_POR_PAGINA = 6;
    private const RESULTADOS_POR_PAGINA_ADMIN = 10;

    public function index(){
        if(Utils::isAdmin()){
            header("Location: ".base_url."index.php?controller=producto&action=getAll");
        }else{
            /* Muestro algunos productos */
            $producto = new Producto();
            $cantProductos = ($producto->count())->cantidad;

            // Numero de pagina actual
            $pagina = $_GET['pagina'] ?? 1;

            // Cantidad de botones de paginacion
            $cantBotonesPaginacion = ceil($cantProductos / self::RESULTADOS_POR_PAGINA);

            $productos = $producto->getAll(self::RESULTADOS_POR_PAGINA, $pagina);
            $paginador = new Paginator($cantBotonesPaginacion, base_url."index.php?controller=producto&action=index"); 

            require_once __DIR__ . "/../views/producto/destacados.php";
        }
    }

    public function getAll(){
        if( !Utils::isAdmin() ){
            Utils::notIsAdmin();
        }
        // Numero de pagina actual
        $pagina = $_GET['pagina'] ?? 1;

        // Buscar todos los productos
        $producto = new Producto();
        $cantProductos = ($producto->count())->cantidad;
        
        $cantBotonesPaginacion = ceil($cantProductos / self::RESULTADOS_POR_PAGINA_ADMIN);
        
        $productos = $producto->getAll(self::RESULTADOS_POR_PAGINA_ADMIN, $pagina);
        $paginador = new Paginator($cantBotonesPaginacion, base_url."index.php?controller=producto&action=getAll");
        
        // Mostrar lista de productos
        require_once __DIR__ . "/../views/producto/ver.php";
    }

    public function getForCategoria(){

        $id_categoria = $_GET["categoria"];
        // Obtengo el nombre de la categoria por el ID
        $categoria = new Categoria();
        $categoria->setId($id_categoria);
        $nombreCategoria = $categoria->getOne();

        $producto = new Producto();
        $producto->setCategoriaId($id_categoria);

        // Obtengo los productos de esa categoria
        $productos = $producto->getForCategoria();

        // Muestro los productos
        require_once __DIR__ . "/../views/producto/destacados.php";
    }

    public function search(){
        if( isset($_POST["submitBuscador"]) ){
            $nombreProducto = $_POST["producto"];

            $producto = new Producto();
            $producto->setNombre($nombreProducto);
            $productos = $producto->search();
            
            $buscador = true;
            
            require_once __DIR__ . "/../views/producto/destacados.php";
            
        }
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

                $img = $file["tmp_name"]; //ruta
                $type = $file["type"];
                
                if( $type == "image/jpg" || $type == "image/jpeg" || $type == "image/png" ){

                    //$nameImg = trim(str_replace(" ","_",$file["name"])); // Elimino los espacios
                    $nameImg = uniqid() . "." . str_replace("image/","",$type); // Id unico 

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
                        // Destino de la imagen
                        $destino = __DIR__."/../uploads/images/".$nameImg;
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
        $img = $file["tmp_name"];
        $type = $file["type"];
        $imgName = ""; // Si todo se valida bien abajo piso su valor
        
        if( $id && $nombre && $precio && $descripcion && $categoriaId && $file ){
            $producto = new Producto();
            $producto->setId($id);
            $producto->setNombre($nombre);
            $producto->setPrecio($precio);
            $producto->setDescripcion($descripcion);
            $producto->setCategoriaId($categoriaId);

            /* ~~~~~~~~~~~~~~~~ Condicional para ver si actualizo la imagen o no ~~~~~~~~~~~~~~~~ */
            if(empty($file["name"])){
                // No cambio la imagen
                $save = $producto->update(false);
            }else{
                // Actualizar la imagen - Hay una nueva imagen
                if( $type == "image/jpg" || $type == "image/jpeg" || $type == "image/png" ){
                    $imgName = uniqid() . "." . str_replace("image/","",$type); // Id unico                     
                }else{
                    $_SESSION["error"]["flag"] = true;
                    $_SESSION["error"]["message"] = "Solo se aceptan archivos .jpg, .png y .jpeg !";
                    header("Location: ".base_url."index.php?controller=producto&action=create&id=".$id);
                }

                // Setteo el atributo para posteriormente acualizarlo
                $producto->setImagen($imgName);          

                // Busco la imagen que tengo que borrar
                $productAct = new Producto();
                $productAct->setId($id);
                $productoActual = $productAct->getOne();
                $nameImgActual = $productoActual->imagen;

                //Actualizo la imagen de la Base de Datos
                $save = $producto->update();
                
                // Borro la imagen del directorio uploads/images
                unlink(__DIR__."/../uploads/images/".$nameImgActual);
            }

            // Si la imagen se guardo bien en la DB la guardo en la carpeta uploads
            if($save){
                // Destino de la imagen
                $destino = __DIR__."/../uploads/images/".$imgName;
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