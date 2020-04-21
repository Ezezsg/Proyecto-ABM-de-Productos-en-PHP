<?php
    require 'config/config.php'; 
    require 'funciones/autenticacion.php';
    autenticar();    
	require 'funciones/conexion.php';
	require 'funciones/categorias.php';
	$chequeo = agregarCategoria();
	include 'includes/header.html';
	include 'includes/nav.php';  
?>

    <main class="container">
        <h1>Alta de una nueva categoría</h1>
        <?php
        	$clase = 'danger';
        	$mensaje = 'No se pudo agregar la categoía';
        	if($chequeo)
        	{
        		$clase = 'success';
        		$mensaje = 'categoría agregada correctamente';
        	}
        ?>
        <div class="alert alert-<?= $clase ?>">
        	<?= $mensaje ?>
            <a href="adminCategorias.php" class="btn btn-outline-secondary mx-2">volver a panel de categorias</a>
        </div>
    </main>

<?php  include 'includes/footer.php';  ?>