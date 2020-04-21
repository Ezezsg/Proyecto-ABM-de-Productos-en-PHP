<?php

############################
#### CRUD DE CATEGORIAS ####
############################

	/** 
	 * @return bool | mysqli_result $resultado  
	*/

	function listarCategorias()
	{
		$link = conectar();
		$sql = "SELECT idCategoria, catNombre FROM categorias";
		$resultado = mysqli_query($link, $sql)
							or die(mysqli_error($link)); //control de errores
		return $resultado;
	}

	function agregarCategoria()
	{
		$catNombre = $_POST['catNombre'];
		$link = conectar();
		$sql = "INSERT INTO categorias
				VALUES 
				( DEFAULT , '".$catNombre."')"; //nunca poner una variable dentro de comillas!!! por eso esta asi escrito 
		$resultado = mysqli_query($link, $sql)
							or die(mysqli_error($link));
		return $resultado;
	}

	function verCategoriaPorID()
	{
		$idCategoria = $_GET['idCategoria'];
		$link = conectar();
		$sql = "SELECT idCategoria, catNombre FROM categorias WHERE idCategoria = ".$idCategoria;
		$resultado = mysqli_query($link, $sql)
							or die(mysqli_error($link));
		$categoria = mysqli_fetch_assoc($resultado);
		return $categoria;
	}

	function modificarCategoria()
	{
		$idCategoria = $_POST['idCategoria'];
		$catNombre = $_POST['catNombre'];
		$link = conectar();
		$sql = "UPDATE categorias  
					SET 
						catNombre = '".$catNombre."'
					WHERE idCategoria = ".$idCategoria;
		$resultado = mysqli_query($link, $sql)
							or die(mysqli_error($link)); //control de errores 
		return $resultado;
	}

	function eliminarCategoria()
	{
		$idCategoria = $_POST['idCategoria'];

		$link = conectar();
		$sql = "DELETE FROM categorias
				WHERE idCategoria = ".$idCategoria;
		$resultado = mysqli_query($link, $sql)
							or die(mysqli_error($link)); //control de errores 
		return $resultado;
	}

	/*
	* chequear si hay productos de una categoria
	*/
	function productoPorCategoria()
	{
		$idCategoria = $_GET['idCategoria'];
		$link = conectar();
		$sql = "SELECT 1 FROM productos 
				WHERE idCategoria = ".$idCategoria;
		$resultado = mysqli_query($link, $sql)
							or die(mysqli_error($link)); //control de errores
		$cantidad = mysqli_num_rows($resultado);
		return $cantidad; 
	}