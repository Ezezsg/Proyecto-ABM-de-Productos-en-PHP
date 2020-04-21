<?php
    require 'config/config.php'; 
    require 'funciones/autenticacion.php';
    autenticar();    
	require 'funciones/conexion.php';
	require 'funciones/productos.php';
	$producto = verProductoPorID($_GET['idProducto']);
	include 'includes/header.html';
	include 'includes/nav.php';  
?>

    <main class="container">
        <h1>Baja de un producto</h1>

        <article class="card col-6 mx-auto text-danger border-danger">
        	<div class="row">
        		<div class="col-6 p-0">
        			<img src="productos/<?= $producto['prdImagen']; ?>" class="img-thumbnail">
        		</div>
        		<div class="card-body col-6">
        			<span class="lead">
        				<?= $producto['prdNombre']; ?>
        			</span>
        			<hr>
        			Marca: <?= $producto['mkNombre']; ?>
        			<hr>
        			Categoía: <?= $producto['catNombre']; ?>
        			<hr>
        			Presentación: <?= $producto['prdPresentacion']; ?>
        			<hr>
        			Stock: <?= $producto['prdStock']; ?>
        			<hr>
        			Precio:
        			<span class="lead">
        				<?= $producto['prdPrecio']; ?>
        			</span>
        			<br><br>
        			<form action="eliminarProducto.php" method="post">
        				<button class="btn btn-danger btn-block py-2">
        					Confirmar Baja
        				</button>
        				<a href="adminProductos.php" class="btn btn-outline-secondary btn-block">
        					volver a panel de productos
        				</a>
        				<input type="hidden" name="idProducto" value="<?= $producto['idProducto']; ?>">
        			</form>
        		</div>
        	</div>
        </article>

        <script> //usamos sweet alert 2 en el head esta linkeado
                Swal.fire({
                    title: '¿Desea eliminar el producto seleccionado?',
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
                        window.location = 'adminProductos.php';    
                    }
                })
        </script>

    </main>

<?php  include 'includes/footer.php';  ?>