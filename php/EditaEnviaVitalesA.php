<?php 
require_once('../conexion/conectar.php'); 
?>

<?php
   if (isset($_POST['NoPaciente'])){
	$Pulso = $_POST['PulsoA'];
	$FR = $_POST['frA'];
	$PresionArterial = $_POST['ParterialA'];
	$Temperatura = $_POST['temperaturaA'];
	$Hora = $_POST['HoraV'];             
	$InfPaciente_idPaciente = $_POST['NoPaciente'];
	
	$insert = sprintf("UPDATE SignosVitalesAllegada SET Pulso='$Pulso',FR='$FR',PresionArterial='$PresionArterial',Temperatura='$Temperatura',Hora='$Hora' WHERE InfPaciente_idPaciente = '$InfPaciente_idPaciente'");
	mysql_select_db($bd,$conexion);

	$resultado = mysql_query($insert,$conexion)or die(mysql_error());
     //error_reporting(E_ALL);
	$id = mysql_insert_id();
	//echo 1;
	echo $id;
    }
?>