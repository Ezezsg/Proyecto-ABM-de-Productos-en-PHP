<?php
    require 'config/config.php'; 
    require 'funciones/autenticacion.php';
    autenticar();  
    require 'funciones/conexion.php';
    require 'funciones/usuarios.php';  
    $chequeo = agregarUsuario();
	include 'includes/header.html';
	include 'includes/nav.php';  
?>

    <main class="container">
        <h1>Alta de un nuevo usuario</h1>

        <?php
            $clase = 'danger';
            $mensaje = 'No se pudo agregar el usuario';
            if($chequeo)
            {
                $clase = 'success';
                $mensaje = 'usuario agregado correctamente';
            }
        ?>
        <div class="alert alert-<?= $clase ?>">
            <?= $mensaje ?>
            <a href="adminUsuarios.php" class="btn btn-outline-secondary mx-2">volver a panel de usuarios</a>
        </div>

    </main>

<?php  include 'includes/footer.php';  ?>