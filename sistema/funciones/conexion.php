<?php  

	const SERVER = 'localhost';
	const USUARIO = 'root';
	const CLAVE = '';
	const BASE = 'catalogo';
	
	/** @return mysqli $link */

	function conectar()
	{
		$link = mysqli_connect(
		SERVER,
		USUARIO,
		CLAVE,
		BASE
		);
		return $link;
	}