<?php

########################
#### CRUD DE MARCAS ####
########################
	
	/** 
	 * @return bool | mysqli_result $resultado  
	*/
	function listarMarcas()
	{
		$link = conectar();
		$sql = "SELECT idMarca, mkNombre FROM marcas";
		$resultado = mysqli_query($link, $sql)
							or die(mysqli_error($link)); //control de errores
		return $resultado;
	}

	function agregarMarca()
	{
		$mkNombre = $_POST['mkNombre'];
		$link = conectar();
		$sql = "INSERT INTO marcas
				VALUES 
				( DEFAULT , '".$mkNombre."')"; //nunca poner una variable dentro de comillas!!! por eso esta asi escrito 
		$resultado = mysqli_query($link, $sql)
							or die(mysqli_error($link));
		return $resultado;
	}

	function verMarcaPorID()
	{
		$idMarca = $_GET['idMarca'];
		$link = conectar();
		$sql = "SELECT idMarca, mkNombre FROM marcas WHERE idMarca = ".$idMarca;
		$resultado = mysqli_query($link, $sql)
							or die(mysqli_error($link));
		$marca = mysqli_fetch_assoc($resultado);
		return $marca;
	}

	function modificarMarca()
	{
		$idMarca = $_POST['idMarca'];
		$mkNombre = $_POST['mkNombre'];
		$link = conectar();
		$sql = "UPDATE marcas  
					SET 
						mkNombre = '".$mkNombre."'
					WHERE idMarca = ".$idMarca;
		$resultado = mysqli_query($link, $sql)
							or die(mysqli_error($link)); //control de errores 
		return $resultado;
	}

	function eliminarMarca()
	{
		$idMarca = $_POST['idMarca'];

		$link = conectar();
		$sql = "DELETE FROM marcas
				WHERE idMarca = ".$idMarca;
		$resultado = mysqli_query($link, $sql)
							or die(mysqli_error($link)); //control de errores 
		return $resultado;
	}

	function productoPorMarca()
	{
		$idMarca = $_GET['idMarca'];
		$link = conectar();
		$sql = "SELECT 1 FROM productos 
				WHERE idMarca = ".$idMarca;
		$resultado = mysqli_query($link, $sql)
							or die(mysqli_error($link)); //control de errores
		$cantidad = mysqli_num_rows($resultado);
		return $cantidad;
	}
/**
 * listarMarcas()
 * agregarMarca()
 * verMarcaPorID()
 * modificarMarca()
 * eliminarMarca()
*/