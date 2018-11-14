<?php 
require_once('../conexion/conectar.php'); 
?>

<?php 

   if (isset($_POST['NoPaciente'])){
	$NoPaciente = $_POST['NoPaciente'];
	$DescOpePracticada = $_POST['DescOpePracticada'];
	
	$insert = sprintf("INSERT INTO OpePracticada(DecripcionOpePracticada,InfPaciente_idPaciente) VALUES ('".$DescOpePracticada."','".$NoPaciente."')");
	mysql_select_db($bd,$conexion);

	$resultado = mysql_query($insert,$conexion)or die(mysql_error());
     //error_reporting(E_ALL);
	$id = mysql_insert_id();
}
	//echo 1;
	
	$resIns="ok";
	echo $resIns;
?>