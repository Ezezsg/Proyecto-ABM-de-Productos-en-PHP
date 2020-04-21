<?php

###########################
#### CRUD DE PRODUCTOS ####
###########################
	
	/** 
	 * @return bool | mysqli_result $resultado  
	*/

	function listarProductos()
	{
		$link = conectar();
		$sql = "SELECT p.idProducto, p.prdNombre, p.prdPrecio, p.idMarca, m.mkNombre, p.idCategoria, c.catNombre, p.prdPresentacion, p.prdStock, p.prdImagen FROM productos p, marcas m, categorias c 
				WHERE p.idMarca = m.idMarca AND p.idCategoria = c.idCategoria";
        $resultado = mysqli_query($link,$sql)
        					or die(mysqli_error($link)); //control de errores
        return $resultado;
	}

	function subirArchivo()
	{
		$ruta = 'productos/';
		$prdImagen = 'noDisponible.jpg'; //en agregar
		
		if(isset($_POST['imagenAnterior'])) //en modificar
		{
			$prdImagen = $_POST['imagenAnterior'];
		}

		if($_FILES['prdImagen']['error'] == 0){
			$prdImagen = $_FILES['prdImagen']['name']; //nombre del archivo
			$temp = $_FILES['prdImagen']['tmp_name']; //ruta que se guarda temporalmente

			move_uploaded_file($temp, $ruta.$prdImagen);
		}

		return $prdImagen;
	}

	function agregarProducto()
	{
		$prdNombre = $_POST['prdNombre'];
		$prdPrecio = $_POST['prdPrecio'];
		$idMarca = $_POST['idMarca'];
		$idCategoria = $_POST['idCategoria'];
		$prdPresentacion = $_POST['prdPresentacion'];
		$prdStock = $_POST['prdStock'];
		$prdImagen = subirArchivo();
		$link = conectar();
		$sql = "INSERT INTO productos
				VALUES 
				( 	DEFAULT , 
					'".$prdNombre."',
					".$prdPrecio.",
					".$idMarca.",
					".$idCategoria.",
					'".$prdPresentacion."',
					".$prdStock.",
					'".$prdImagen."'
				)"; //nunca poner una variable dentro de comillas!!! pero un string va dentro de comilla simples, si es numero no, por eso se CONCATENA 
		$resultado = mysqli_query($link, $sql)
							or die(mysqli_error($link)); //control de errores 
		return $resultado;
	}

	function verProductoPorID($idProducto)
	{
		$link = conectar();
		$sql = "SELECT p.idProducto, p.prdNombre, p.prdPrecio, p.idMarca, m.mkNombre, p.idCategoria, c.catNombre, p.prdPresentacion, p.prdStock, p.prdImagen FROM productos p, marcas m, categorias c 
				WHERE p.idMarca = m.idMarca AND p.idCategoria = c.idCategoria AND p.idProducto = ".$idProducto;
		$resultado = mysqli_query($link, $sql)
							or die(mysqli_error($link));
		$producto = mysqli_fetch_assoc($resultado);
		return $producto; //
	}

	function modificarProducto()
	{
		$idProducto = $_POST['idProducto'];
		$prdNombre = $_POST['prdNombre'];
		$prdPrecio = $_POST['prdPrecio'];
		$idMarca = $_POST['idMarca'];
		$idCategoria = $_POST['idCategoria'];
		$prdPresentacion = $_POST['prdPresentacion'];
		$prdStock = $_POST['prdStock'];
		$prdImagen = subirArchivo();

		$link = conectar();
		$sql = "UPDATE productos 
					SET 
						prdNombre = '".$prdNombre."',
						prdPrecio = ".$prdPrecio.",
						idMarca = ".$idMarca.",
						idCategoria = ".$idCategoria.",
						prdPresentacion = '".$prdPresentacion."',
						prdStock = ".$prdStock.",
						prdImagen = '".$prdImagen."'
					WHERE idProducto = ".$idProducto;
		$resultado = mysqli_query($link, $sql)
							or die(mysqli_error($link)); //control de errores 
		return $resultado;
	}

	function eliminarProducto()
	{
		$idProducto = $_POST['idProducto'];

		$link = conectar();
		$sql = "DELETE FROM productos
				WHERE idProducto = ".$idProducto;
		$resultado = mysqli_query($link, $sql)
							or die(mysqli_error($link)); //control de errores 
		return $resultado;
	}
