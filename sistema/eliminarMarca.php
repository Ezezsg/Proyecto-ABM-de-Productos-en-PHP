<?php 
    require 'config/config.php'; 
    require 'funciones/autenticacion.php';
    autenticar();   
	require 'funciones/conexion.php';
    require 'funciones/marcas.php';  
    $chequeo = eliminarMarca();
	include 'includes/header.html';
	include 'includes/nav.php';  
?>

    <main class="container">
        <h1>Baja de una marca</h1>

        <?php
            $clase = 'danger';
            $mensaje = 'No se pudo eliminar la marca';
            if($chequeo)
            {
                $clase = 'success';
                $mensaje = 'marca eliminada correctamente';
            }
        ?>
        <div class="alert alert-<?= $clase ?>">
            <?= $mensaje ?>
            <a href="adminMarcas.php" class="btn btn-outline-secondary mx-2">volver a panel de marcas</a>
        </div>

    </main>

<?php  include 'includes/footer.php';  ?>