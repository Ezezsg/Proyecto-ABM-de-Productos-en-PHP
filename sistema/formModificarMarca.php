<?php
    require 'config/config.php'; 
    require 'funciones/autenticacion.php';
    autenticar();   
    require 'funciones/conexion.php';
    require 'funciones/marcas.php';
    $marca = verMarcaPorID($_GET['idMarca']); 
	include 'includes/header.html';
	include 'includes/nav.php';  
?>

    <main class="container">
        <h1>Modificación de una marca</h1>

        <div class="alert alert-secondary">
        	<form action="modificarMarca.php" method="post">
        		Marca:
        		<hr>
        		<input type="text" name="mkNombre" value="<?= $marca['mkNombre']; ?>" class="form-control" required>
        		<br>

                <input type="hidden" name="idMarca" value="<?= $marca['idMarca']; ?>">

        		<button class="btn btn-dark">Modificar marca</button>	
        		<a href="adminMarcas.php" class="btn btn-outline-secondary">
        			volver a panel de marcas
        		</a>
        	</form>
        </div>

    </main>

<?php  include 'includes/footer.php';  ?>