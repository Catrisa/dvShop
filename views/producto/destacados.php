<div class="container my-5">

    <?php 
    if( isset($_SESSION["login"]) && $_SESSION["login"]["flag"] ){
        echo Utils::alert($_SESSION["login"]["message"]);
        unset($_SESSION["login"]);
    }
    if( isset($_SESSION["acceso"]) ){
        if(!$_SESSION["acceso"]["flag"] ){
            echo Utils::alert($_SESSION["acceso"]["title"],$_SESSION["acceso"]["message"],"danger");
        }
        unset($_SESSION["acceso"]);
    }
    if( isset($buscador) && $buscador ){
        $titulo = empty($productos) ? "No se encontraron productos" : "Productos encontrados";
        echo '<h3 class="mb-4 display-4 pb-3">'.$titulo.'</h3>';
    }
    ?>

    

    <div class="row">
        <?php foreach($productos as $producto):?>
        <div class="col-sm-6 ">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="<?=base_url.'uploads/images/'.$producto->imagen?>" class="card-img img-fluid" height="200" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h2 class="card-title display-4 title-productos"><?php if(strlen($producto->nombre)<22){
                                    echo ucfirst($producto->nombre);
                                }else{
                                    echo substr(ucfirst($producto->nombre),0,22)."...";
                                }?></h2>
                            <p class="card-text precio-productos">$<?=$producto->precio?></p>
                            <p class="card-text"><?=substr(ucfirst($producto->descripcion), 0, 140)."..."?></p>
                            <p class="card-text"><small class="text-muted">Descuento de hasta <?=rand(10, 40)?>%</small></p>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <?php endforeach;?>

        <?php if(isset($paginador)): ?>
            <div class="col-12 pt-4">
                <?php echo $paginador->getPaginador() ?>
            </div>
        <?php endif; ?>
    </div>
</div>