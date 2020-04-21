<?php
    require 'config/config.php'; 
    require 'funciones/autenticacion.php';
    autenticar();    
	require 'funciones/conexion.php';
    require 'funciones/productos.php';  
    $chequeo = eliminarProducto();
	include 'includes/header.html';
	include 'includes/nav.php';  
?>

    <main class="container">
        <h1>Baja de un producto</h1>

        <?php
            $clase = 'danger';
            $mensaje = 'No se pudo eliminar el producto';
            if($chequeo)
            {
                $clase = 'success';
                $mensaje = 'producto eliminado correctamente';
            }
        ?>
        <div class="alert alert-<?= $clase ?>">
            <?= $mensaje ?>
            <a href="adminProductos.php" class="btn btn-outline-secondary mx-2">volver a panel de productos</a>
        </div>

    </main>

<?php  include 'includes/footer.php';  ?>