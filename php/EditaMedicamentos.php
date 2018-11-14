<?php 
require_once('../conexion/conectar.php'); 
?>

<?php 

  if (isset($_POST['NoPaciente'])){
	$MedDesc = $_POST['MedSuministrado'];
	$InfPaciente_idPaciente = $_POST['NoPaciente'];


	$ActualizaMedicamentos = sprintf("UPDATE MedicamentosSuministrados SET DescMedicamentos='$MedDesc' WHERE InfPaciente_idPaciente='$InfPaciente_idPaciente'");
	mysql_select_db($bd,$conexion);
	$resultadoMedicamentos = mysql_query($ActualizaMedicamentos,$conexion)or die(mysql_error());

	$id = mysql_insert_id();
	//echo 1;
	echo $id;
    }
?>

