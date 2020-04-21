<?php

    require 'config/config.php'; 
    require 'funciones/autenticacion.php';
    autenticar();  
	require 'funciones/conexion.php';
	require 'funciones/categorias.php';
	$categorias = listarCategorias();
	include 'includes/header.html';
	include 'includes/nav.php';  
?>

    <main class="container">
        <h1>Panel de administración de categorías</h1>

        <a href="admin.php" class="btn btn-outline-secondary mb-3">
        	Volver a dashboard
        </a>

        <table class="table table-bordered table-striped table-hover">
        	<thead class="thead-dark">
        		<tr>
        			<th>Id</th>
        			<th>Nombre</th>
        			<th colspan="2">
        				<a href="formAgregarCategoria.php" class="btn btn-dark">
        					Agregar
        				</a> 
        			</th>
        		</tr>
        	</thead>
        	<tbody>
        		<?php  
        			while($categoria = mysqli_fetch_assoc($categorias)){
        		?>
        		<tr>
        			<td><?= $categoria['idCategoria']; ?></td>
                    <td><?= $categoria['catNombre']; ?></td>
                    <td>
                        <a href="formModificarCategoria.php?idCategoria=<?= $categoria['idCategoria'] ?>" class="btn btn-outline-secondary">
                            Modificar
                        </a><!-- le mandamos la id por get en la url porque en este archivo no hay ningun form-->
                    </td>
                    <td>
                        <a href="formEliminarCategoria.php?idCategoria=<?= $categoria['idCategoria'] ?>" class="btn btn-outline-secondary">
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