<?php

class Utils {

  public static function alert($titulo,$mensaje="",$color="warning"){
      return "<div class='alert alert-$color alert-dismissible fade show' role='alert'>
      <strong>$titulo</strong> $mensaje
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button>
    </div>";
  }

  public static function showCategorias(){
    require_once __DIR__ . "/../models/Categoria.php";
    
    $categorias = new Categoria();
    return $categorias->getAll();
  }

  public static function isAdmin(){
    if( isset($_SESSION["identity"]) && $_SESSION["identity"]->rol == "admin" ){
      return true;
    }
    return false;
  }

  public static function notIsAdmin(){
    $_SESSION["acceso"]["flag"] = false;
    $_SESSION["acceso"]["title"] = "NO TIENE PERMISOS!";
    $_SESSION["acceso"]["message"] = "Necesita permisos de Administrador para acceder a esa seccion";
    header("Location: ".base_url."index.php?controller=producto&action=index");
  }

}