<?php 

	$bd = "saber2";
	$host = "localhost";
	$user = "root";
	$pass = "NtSistema$";
	$conexion = @mysql_connect($host,$user,$pass) or trigger_error(mysql_error(),E_USER_ERROR);
?>