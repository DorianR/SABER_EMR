<?php 
	require_once("../Models/PacienteModel.php");
	$boton= $_POST['boton'];
	if($boton==='buscar')
	{
		$valor=$_POST['valor'];
		$inst = new PacientesHos();
		$r=$inst -> InfPacienteV3($valor);
		echo json_encode($r);
    }
	if ($boton==='actualizar') {
		$inst = new PacientesHos();
		$id=$_POST['idlib'];
		$isbn=$_POST['isbn'];
		$titulo=$_POST['titulo'];
		$autor=$_POST['autor'];
		$añop=$_POST['añop'];
		$nrop=$_POST['nrop'];
		$ediccion=$_POST['ediccion'];
		$idioma=$_POST['idioma'];
		
		if($inst->actualizar($id,$isbn,$titulo,$autor,$añop,$nrop,$ediccion,$idioma)){
			echo 'exito';
		}
		else{
			echo "No se Actualizo los datos";
		}
	}
		if($boton==='eliminar')
	{
		$idlib=$_POST['idlib'];
		$inst = new PacientesHos();
		if($inst->eliminar($idlib)){
			echo 'Se elimino correctamente';
		}
		else{
			echo "No se eliminar los datos";
		}
	}
	
?>