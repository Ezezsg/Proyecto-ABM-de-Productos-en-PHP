<?php
    require 'config/config.php'; 
    require 'funciones/autenticacion.php';
    autenticar();    
	include 'includes/header.html';
	include 'includes/nav.php';  
?>

    <main class="container">
        <h1>Alta de una nueva categoría</h1>

        <div class="alert alert-secondary">
        	<form action="agregarCategoria.php" method="post">
        		Categoría:
        		<hr>
        		<input type="text" name="catNombre" class="form-control" required>
        		<br>
        		<button class="btn btn-dark">Agregar categoría</button>	
        		<a href="adminCategorias.php" class="btn btn-outline-secondary">
        			volver a panel de categorías
        		</a>
        	</form>
        </div>

    </main>

<?php  include 'includes/footer.php';  ?>