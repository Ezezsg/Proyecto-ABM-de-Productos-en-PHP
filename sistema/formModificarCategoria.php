<?php
    require 'config/config.php'; 
    require 'funciones/autenticacion.php';
    autenticar();   
    require 'funciones/conexion.php';
    require 'funciones/categorias.php';
    $categoria = verCategoriaPorID($_GET['idCategoria']); 
	include 'includes/header.html';
	include 'includes/nav.php';  
?>

    <main class="container">
        <h1>Modificación de una categoría</h1>

        <div class="alert alert-secondary">
        	<form action="modificarCategoria.php" method="post">
        		Categoría:
        		<hr>
        		<input type="text" name="catNombre" value="<?= $categoria['catNombre']; ?>" class="form-control" required>
        		<br>

                <input type="hidden" name="idCategoria" value="<?= $categoria['idCategoria']; ?>">

        		<button class="btn btn-dark">Modificar categoría</button>	
        		<a href="adminCategorias.php" class="btn btn-outline-secondary">
        			volver a panel de categorías
        		</a>
        	</form>
        </div>

    </main>

<?php  include 'includes/footer.php';  ?>