<?php

session_start();

require_once "./config/db.php";
require_once "./config/parameters.php";
require_once "./autoload.php";
require_once "./helpers/Utils.php";

// Para pruebas
require_once "models/Categoria.php";
require_once "models/Usuario.php";

require_once "views/layout/header.php";
?>



  <?php

  if (isset($_GET["controller"])) {
    $nombre_controlador = $_GET["controller"] . "Controller";
  }else{
    $nombre_controlador = controller_default;
  }

  if (class_exists($nombre_controlador)) {

    $controlador = new $nombre_controlador();

    if (isset($_GET["action"]) && method_exists($controlador, $_GET["action"])) {
      $action = $_GET["action"];
      $controlador->$action();
    } elseif (!isset($_GET["controller"]) && !isset($_GET["action"])) {
      $action_default = action_default;
      $controlador->$action_default();
    } else {
      echo "El action que estas buscando no existe";
    }
  } else {
    echo "El controlador que estas buscando no existe";
  }
  ?>




<?php require_once "views/layout/footer.php" ?>