<?php 
require_once('../conexion/conectar.php'); 
?>

<?php 

   if (isset($_POST['NoPaciente'])){
	$DiagDif = $_POST['DiagDif'];
	$LabImagens = $_POST['LabImagens'];
	$EvClinica = $_POST['EvClinica'];
	$Proces = $_POST['Proces'];
	$Consultas = $_POST['Consultas'];
	$InfPaciente_idPaciente = $_POST['NoPaciente'];
	
	$Actualizar = sprintf("UPDATE EvaluacionPlan set DiagnosticoDiferencial='$DiagDif',LaboratoriosImagenes='$LabImagens',EvolucionClinica='$EvClinica',Procesos='$Proces',Consultas='$Consultas' WHERE  InfPaciente_idPaciente='$InfPaciente_idPaciente'");
	mysql_select_db($bd,$conexion);

	$resultado = mysql_query($Actualizar,$conexion)or die(mysql_error());
     //error_reporting(E_ALL);
	$id = mysql_insert_id();
	//echo 1;
	echo $id;
    }
?>