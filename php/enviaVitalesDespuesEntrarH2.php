<?php 
require_once('../conexion/conectar.php'); 
?>

<?php 

   if (isset($_POST['NoPaciente'])){
   	$Pulso = $_POST['PulsoD'];
	$FR = $_POST['frD'];
	$PresionArterial = $_POST['ParterialD'];
	$Temperatura = $_POST['temperaturaD'];
	$InfPaciente_idPaciente = $_POST['NoPaciente'];
	
	$insert = sprintf("INSERT INTO SignosVitalesDesEntrar2(Pulso,FR,PresionArterial,Temperatura,InfPaciente_idPaciente) VALUES ('".$Pulso."','".$FR."','".$PresionArterial."','".$Temperatura."','".$InfPaciente_idPaciente."')");
	mysql_select_db($bd,$conexion);

	$resultado = mysql_query($insert,$conexion)or die(mysql_error());
     //error_reporting(E_ALL);
	$id = mysql_insert_id();
	//echo 1;
	echo $id;
    }
?>