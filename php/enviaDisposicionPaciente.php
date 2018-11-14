<?php 
require_once('../conexion/conectar.php'); 
?>

<?php 

  if (isset($_POST['NoPaciente'])){
	$Dispo = $_POST['Dispo'];
	$Hora = $_POST['HoraDispo'];
	$OtraInfoDisp = $_POST['OtraInfoDisp'];
	$NotasMedicoCargo = $_POST['NotasMedicoCargo'];
	$OtrasNotas = $_POST['OtrasNotas'];
	$ViPacienteRS = $_POST['ViPacienteRS'];
	$TiempoContatoRS = $_POST['TiempoContatoRS'];
	$FirmaRS = $_POST['FirmaRS'];
	$ViPacienteMD = $_POST['ViPacienteMD'];
	$TiempoContatoMD = $_POST['TiempoContatoMD'];
	$FirmaMD = $_POST['FirmaMD'];
	$InfPaciente_idPaciente = $_POST['NoPaciente'];
	$insertDispPac = sprintf("INSERT INTO DispocicionPaciente(OtraInfoDisposicion,NotasMedicoCargo,OtrasNotas,Hora,DescDisposicionPac_idDescDisposicionPac,InfPaciente_idPaciente) VALUES ('".$OtraInfoDisp."','".$NotasMedicoCargo."','".$OtrasNotas."','".$Hora."','".$Dispo."','".$InfPaciente_idPaciente."')");
	mysql_select_db($bd,$conexion);
	$resultadoDespPac = mysql_query($insertDispPac,$conexion)or die(mysql_error());

	$insertInfoRes = sprintf("INSERT INTO InfoResidenteParaPaciente(TiempoDelContacto,Firma,VioPacienteRes,InfPaciente_idPaciente) VALUES ('".$TiempoContatoRS."','".$FirmaRS."','".$ViPacienteRS."','".$InfPaciente_idPaciente."')");
	mysql_select_db($bd,$conexion);
	$resultadoInfoRes = mysql_query($insertInfoRes,$conexion)or die(mysql_error());

	$insertInfoMedicoPac = sprintf("INSERT INTO InfoMedicoParaPaciente(TiempoDelContacto,Firma,VioPacienteMed,InfPaciente_idPaciente) VALUES ('".$TiempoContatoMD."','".$FirmaMD."','".$ViPacienteMD."','".$InfPaciente_idPaciente."')");
	mysql_select_db($bd,$conexion);
	$resultadoInfoMed = mysql_query($insertInfoMedicoPac,$conexion)or die(mysql_error());
     //error_reporting(E_ALL);
	$id = mysql_insert_id();
	//echo 1;
	echo $id;
    }
?>