<?php 
require_once('../conexion/conectar.php'); 
?>

<?php 

   if (isset($_POST['NoPaciente'])){
   	$Hora = $_POST['HoraSvExFisico'];
   	$Revisaron = $_POST['Revisaron'];
	$Pulso = $_POST['PulsoD'];
	$FR = $_POST['frD'];
	$PresionArterial = $_POST['ParterialD'];
	$Temperatura = $_POST['temperaturaD'];
	$InfPaciente_idPaciente = $_POST['NoPaciente'];
	$SatOxD = $_POST['SatOxD'];                                                
	
	$insert = sprintf("INSERT INTO VitalesEntrandoHos(Revisaron,Pulso,FR,PresionArterial,Temperatura,Hora,PO,InfPaciente_idPaciente) VALUES ('".$Revisaron."','".$Pulso."','".$FR."','".$PresionArterial."','".$Temperatura."','".$Hora."','".$SatOxD."','".$InfPaciente_idPaciente."')");
	mysql_select_db($bd,$conexion);

	$resultado = mysql_query($insert,$conexion)or die(mysql_error());
     //error_reporting(E_ALL);
	$id = mysql_insert_id();
	//echo 1;
	echo $id;
    }
?>