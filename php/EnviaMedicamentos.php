<?php 
require_once('../conexion/conectar.php'); 
?>

<?php 

  if (isset($_POST['NoPaciente'])){
	$MedDesc = $_POST['MedSuministrado'];

	$InfPaciente_idPaciente = $_POST['NoPaciente'];

	
	
	$insert = sprintf("INSERT INTO MedicamentosSuministrados(DescMedicamentos,InfPaciente_idPaciente) VALUES ('".$MedDesc."','".$InfPaciente_idPaciente."')");
	mysql_select_db($bd,$conexion);

	$resultado = mysql_query($insert,$conexion)or die(mysql_error());
     //error_reporting(E_ALL);
	$id = mysql_insert_id();
	//echo 1;
	echo $resultado;
    }
?>