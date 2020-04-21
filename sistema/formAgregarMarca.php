<?php
    require 'config/config.php'; 
    require 'funciones/autenticacion.php';
    autenticar();    
	include 'includes/header.html';
	include 'includes/nav.php';  
?>

    <main class="container">
        <h1>Alta de una nueva marca</h1>

        <div class="alert alert-secondary">
        	<form action="agregarMarca.php" method="post">
        		Marca:
        		<hr>
        		<input type="text" name="mkNombre" class="form-control" required>
        		<br>
        		<button class="btn btn-dark">Agregar Marca</button>	
        		<a href="adminMarcas.php" class="btn btn-outline-secondary">
        			volver a panel de Marcas
        		</a>
        	</form>
        </div>

    </main>

<?php  include 'includes/footer.php';  ?>