<?php
    require 'config/config.php'; 
    require 'funciones/autenticacion.php';
    autenticar();    
	include 'includes/header.html';
	include 'includes/nav.php';  
?>

    <main class="container">
        <h1>Alta de un nuevo usuario</h1>

        <div class="alert alert-secondary">
        	<form action="agregarUsuario.php" method="post">
        		
                <div class="form-group">
                    <label for="usuNombre">Nombre del Usuario</label>
                    <input type="text" name="usuNombre" class="form-control" id="usuNombre" required>
                </div>

                <div class="form-group">
                    <label for="usuApellido">Apellido del Usuario</label>
                    <input type="text" name="usuApellido" class="form-control" id="usuApellido" required>
                </div>

                <div class="form-group">
                    <label for="usuEmail">Email</label>
                    <input type="email" name="usuEmail" class="form-control" id="usuEmail" placeholder="tú@ejemplo.com" required>
                </div>

                <div class="form-group">
                    <label for="usuPass">Contraseña</label>
                    <input type="text" name="usuPass" class="form-control" id="usuPass" required>
                </div>

                <div class="form-group">
                    <label for="usuEstado">Estado del Usuario</label>
                    <input type="number" name="usuEstado" class="form-control" id="usuEstado" required>
                </div>

        		<button class="btn btn-dark">Agregar Usuario</button>	
        		<a href="adminUsuarios.php" class="btn btn-outline-secondary">
        			volver a panel de Usuarios
        		</a>
        	</form>
        </div>

    </main>

<?php  include 'includes/footer.php';  ?>