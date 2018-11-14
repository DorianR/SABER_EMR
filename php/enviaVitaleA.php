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
	$Soxigeno = $_POST['SatOxigeno'];
	$insert = sprintf("INSERT INTO SignosVitalesAllegada(Pulso,FR,PresionArterial,Temperatura,Hora,PO,InfPaciente_idPaciente) VALUES ('".$Pulso."','".$FR."','".$PresionArterial."','".$Temperatura."','".$Hora."','".$Soxigeno."','".$InfPaciente_idPaciente."')");
	mysql_select_db($bd,$conexion);

	$resultado = mysql_query($insert,$conexion)or die(mysql_error());
     //error_reporting(E_ALL);
	$id = mysql_insert_id();
	//echo 1;
	echo $id;
    }
?>