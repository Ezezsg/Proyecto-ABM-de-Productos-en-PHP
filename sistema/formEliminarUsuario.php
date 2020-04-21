<?php
    require 'config/config.php'; 
    require 'funciones/autenticacion.php';
    autenticar();    
	require 'funciones/conexion.php';
	require 'funciones/usuarios.php';
	$usuario = verUsuarioPorID($_GET['idUsuario']);
	include 'includes/header.html';
	include 'includes/nav.php';  
?>

    <main class="container">
        <h1>Baja de un usuario</h1>

        <article class="card col-4 mx-auto text-danger border-danger">
        	
        	<div class="card-body">

        		Nombre: <?= $usuario['usuNombre']; ?>
        		<hr>
        		Apellido: <?= $usuario['usuApellido']; ?>
        		<hr>
        		Email: <?= $usuario['usuEmail']; ?>
        		<hr>
        		password: <?= $usuario['usuPass']; ?>
        		<hr>
        		Estado: <?= $usuario['usuEstado']; ?>
        		<br><br>
        		<form action="eliminarUsuario.php" method="post">
        			<button class="btn btn-danger btn-block py-2">
        				Confirmar Baja
        			</button>
        			<a href="adminUsuarios.php" class="btn btn-outline-secondary btn-block">
        				volver a panel de usuarios
        			</a>
        			<input type="hidden" name="idUsuario" value="<?= $usuario['idUsuario']; ?>">
        		</form>
        	</div>
        	
        </article>

        <script> //usamos sweet alert 2 en el head esta linkeado
                Swal.fire({
                    title: '¿Desea eliminar el usuario seleccionado?',
                    text: "Esta acción no se puede deshacer",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#22262B',
                    confirmButtonText: 'Si, lo quiero eliminar!',
                    cancelButtonText: 'No lo quiero eliminar'
                }).then((result) => {
                    if (!result.value) {
                        //redirección a admin si se cancela
                        window.location = 'adminUsuarios.php';    
                    }
                })
        </script>

    </main>

<?php  include 'includes/footer.php';  ?>