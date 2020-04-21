<?php
    require 'config/config.php'; 
    require 'funciones/autenticacion.php';
    autenticar();    
	require 'funciones/conexion.php';
	require 'funciones/marcas.php';
	$cantidad = productoPorMarca();
    if($cantidad == 0)
    {
        $marca = verMarcaPorID();
    }
	include 'includes/header.html';
	include 'includes/nav.php';  
?>

    <main class="container">
        <h1>Baja de una marca</h1>

        <?php 
            if ($cantidad > 0) {
        ?>
        <div class="alert alert-danger">
            No se puede eliminar la marca seleccionada,
            ya que tiene productos relacionados.

            <a href="adminMarcas.php" class="btn btn-outline-secondary mx-2">
                volver a panel de marcas
            </a>
        </div>
        <?php  
            }
            else {
        ?>

            <article class="card col-4 mx-auto text-danger border-danger">
        	
        	   <div class="card-body">

        		  Marca: <?= $marca['mkNombre']; ?>
        		  <br><br>
        		  <form action="eliminarMarca.php" method="post">
        			 <button class="btn btn-danger btn-block py-2">
        				Confirmar Baja
        			 </button>
        			 <a href="adminMarcas.php" class="btn btn-outline-secondary btn-block">
        				    volver a panel de marcas
        			 </a>
        			 <input type="hidden" name="idMarca" value="<?= $marca['idMarca']; ?>">
        		  </form>
        	   </div>
        	
            </article>

            <script> //usamos sweet alert 2 en el head esta linkeado
                Swal.fire({
                    title: '¿Desea eliminar la marca seleccionada?',
                    text: "Esta acción no se puede deshacer",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#22262B',
                    confirmButtonText: 'Si, la quiero eliminar!',
                    cancelButtonText: 'No la quiero eliminar'
                }).then((result) => {
                    if (!result.value) {
                        //redirección a admin si se cancela
                        window.location = 'adminMarcas.php';    
                    }
                })
            </script>
        <?php  
            }
        ?>

    </main>

<?php  include 'includes/footer.php';  ?>