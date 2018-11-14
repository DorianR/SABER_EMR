<?php 
require_once('../conexion/conectar.php'); 
?>

<?php 

   if (isset($_POST['NoPaciente'])){
	$Pulso = $_POST['PulsoAA'];
	$FR = $_POST['frAA'];
	$PresionArterial = $_POST['ParterialAA'];
	$Temperatura = $_POST['temperaturaAA'];
	$Hora = $_POST['HoraVV'];
	$InfPaciente_idPaciente = $_POST['NoPaciente'];
	
	$insert = sprintf("INSERT INTO SignosVitalesAllegada(Pulso,FR,PresionArterial,Temperatura,Hora,InfPaciente_idPaciente) VALUES ('".$Pulso."','".$FR."','".$PresionArterial."','".$Temperatura."','".$Hora."','".$InfPaciente_idPaciente."')");
	mysql_select_db($bd,$conexion);

	$resultado = mysql_query($insert,$conexion)or die(mysql_error());
     //error_reporting(E_ALL);
	$id = mysql_insert_id();
	//echo 1;
	echo $id;
    }
?>