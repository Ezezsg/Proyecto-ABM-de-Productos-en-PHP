<?php
    require 'config/config.php'; 
    require 'funciones/autenticacion.php';
    autenticar();    
	require 'funciones/conexion.php';
    require 'funciones/categorias.php';  
    $chequeo = eliminarCategoria();
	include 'includes/header.html';
	include 'includes/nav.php';  
?>

    <main class="container">
        <h1>Baja de una categoría</h1>

        <?php
            $clase = 'danger';
            $mensaje = 'No se pudo eliminar la categoria';
            if($chequeo)
            {
                $clase = 'success';
                $mensaje = 'categoria eliminada correctamente';
            }
        ?>
        <div class="alert alert-<?= $clase ?>">
            <?= $mensaje ?>
            <a href="adminCategorias.php" class="btn btn-outline-secondary mx-2">volver a panel de categorias</a>
        </div>

    </main>

<?php  include 'includes/footer.php';  ?>