<?php 
	require_once("../Models/PacienteModel.php");
	$boton= $_POST['boton'];
	if($boton==='buscar')
	{
		$valor=$_POST['valor'];
		$inst = new PacientesHos();
		$r=$inst -> ExFisico($valor);
		echo json_encode($r);
	}
?>