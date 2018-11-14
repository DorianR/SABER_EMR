<?php 
	require_once("../Models/PacienteModel.php");
	$boton= $_POST['boton'];
	if($boton==='buscar')
	{
		$valor=$_POST['valor'];
		$inst = new PacientesHos();
		$r=$inst -> MedicoCargo($valor);
		echo json_encode($r);
			}
?>