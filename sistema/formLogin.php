<?php
	// en el index, login y formlogin no se nesesita autenticar   
	include 'includes/header.html';
	include 'includes/nav.php';  
?>

    <main class="container">
        <h1>Ingreso al sistema</h1>

        <div class="alert bg-light col-6 mx-auto p-3 border">
        	<form action="login.php" method="post">
        		Usuario:<br>
        		<input type="email" name="usuEmail" class="form-control" required>
        		<br>
        		Clave:<br>
        		<input type="password" name="usuPass" class="form-control" required>
        		<br>
        		<button class="btn btn-dark btn-block">ingresar</button>	
        	</form>
        </div>
        <?php
 
			If(isset($_GET['error'])) {
			$error = $_GET['error'];
			$titulo = 'Error en el login';
			$leyenda = 'Nombre de usuario y/o contraseña incorrectos';
			if( $error == 2) {
				$titulo = 'Error de ingreso';
				$leyenda = 'Debe loguearse para ingresar a sistema';
			}
    	?>        
            <!-- <div class="alert alert-danger">Usuario y/o Contraseña incorrectos</div> -->
            <script>
            Swal.fire(
                '<?= $titulo ?>',
                '<?= $leyenda ?>',
                'error'
            )
        	</script>
    	<?php
        	}
    	?>  
        
    </main>

<?php  include 'includes/footer.php';  ?>