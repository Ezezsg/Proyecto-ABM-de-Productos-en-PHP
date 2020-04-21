<?php  

	###########################	
	##### autentificación #####

	function login()
	{
		$usuEmail = $_POST['usuEmail'];
		$usuPass = $_POST['usuPass'];
		$link = conectar();
		//no hace falta traer el nombre o apellido con poner 1 basta
		//ya que quiero saber si hay una coincidencia
		//no me intereza traer el nombre y apellido
		$sql = "SELECT usuNombre, usuApellido
				FROM usuarios
				WHERE usuEmail = '".$usuEmail."'
					AND usuPass = '".$usuPass."'";
		$resultado = mysqli_query($link, $sql)
							or die(mysqli_error($link)); //control de errores
		$cantidad = mysqli_num_rows($resultado);
		
		if($cantidad == 0){
			// error en login -> redirección a formLogin
			header('location: formLogin.php?error=1');	
		}
		else{
			// login ok
			// autentificación con sesiones
			//session_start(); está en config.php
			$_SESSION['login'] = 1;
			//guardamos Nombre y Apellido en sessión
			$datos = mysqli_fetch_assoc($resultado);
			$_SESSION['usuNombre'] = $datos['usuNombre'];
			$_SESSION['usuApellido'] = $datos['usuApellido'];

			// redirección a admin
			header('location: admin.php');
		}	 
	}

	function logout()
	{
		session_unset();
		session_destroy();
		//redirección a index(con delay)
		header('refresh:3; url=index.php');
	}

	function autenticar()
	{
		if(!isset($_SESSION['login'])) {
			header('location: formLogin.php?error=2');	
		}	
	}