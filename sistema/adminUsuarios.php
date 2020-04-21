<?php
	
    require 'config/config.php'; 
    require 'funciones/autenticacion.php';
    autenticar();
	require 'funciones/conexion.php';
	require 'funciones/usuarios.php';
	$usuarios = listarUsuarios();  
	include 'includes/header.html';
	include 'includes/nav.php';  
?>

    <main class="container">
        <h1>Panel de administración de usuarios</h1>

        <a href="admin.php" class="btn btn-outline-secondary mb-3">
        	Volver a dashboard
        </a>

        <table class="table table-bordered table-striped table-hover">
        	<thead class="thead-dark">
        		<tr>
        			<th>Nombre</th>
        			<th>Apellido</th>
        			<th>Email</th>
        			<th>Password</th>
        			<th>Estado</th>
        			<th colspan="2">
        				<a href="formAgregarUsuario.php" class="btn btn-dark">
        					Agregar
        				</a> 
        			</th>
        		</tr>
        	</thead>
        	<tbody>
        		<?php  
        			while($usuario = mysqli_fetch_assoc($usuarios)){
        		?>
        		<tr>
        			<td><?= $usuario['usuNombre']; ?></td>
                    <td><?= $usuario['usuApellido']; ?></td>
                    <td><?= $usuario['usuEmail']; ?></td>
                    <td><?= $usuario['usuPass']; ?></td>
                    <td><?= $usuario['usuEstado']; ?></td>
                    <td>
                        <a href="formModificarUsuario.php?idUsuario=<?= $usuario['idUsuario'] ?>" class="btn btn-outline-secondary">
                            Modificar
                        </a><!-- le mandamos la id por get en la url porque en este archivo no hay ningun form-->
                    </td>
                    <td>
                        <a href="formEliminarUsuario.php?idUsuario=<?= $usuario['idUsuario'] ?>" class="btn btn-outline-secondary">
                            Eliminar
                        </a>
                    </td>
        		</tr>
        		<?php
        			} 	 	
        		?>
        	</tbody>
        </table>

        <a href="admin.php" class="btn btn-outline-secondary mb-3">
        	Volver a dashboard
        </a>
    </main>

<?php  include 'includes/footer.php';  ?>