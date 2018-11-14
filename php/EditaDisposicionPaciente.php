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
	$ActualizaDispPac = sprintf("UPDATE DispocicionPaciente SET OtraInfoDisposicion='$OtraInfoDisp',NotasMedicoCargo='$NotasMedicoCargo',OtrasNotas='$OtrasNotas',Hora='$Hora',DescDisposicionPac_idDescDisposicionPac='$Dispo' WHERE InfPaciente_idPaciente='$InfPaciente_idPaciente'");
	mysql_select_db($bd,$conexion);
	$resultadoDespPac = mysql_query($ActualizaDispPac,$conexion)or die(mysql_error());

	$ActualizaInfoRes = sprintf("UPDATE InfoResidenteParaPaciente SET TiempoDelContacto='$TiempoContatoRS',Firma='$FirmaRS' WHERE InfPaciente_idPaciente='$InfPaciente_idPaciente'");
	mysql_select_db($bd,$conexion);
	$resultadoInfoRes = mysql_query($ActualizaInfoRes,$conexion)or die(mysql_error());

	$ActualizaInfoMedicoPac = sprintf("UPDATE InfoMedicoParaPaciente SET TiempoDelContacto='$TiempoContatoMD',Firma='$FirmaMD' WHERE InfPaciente_idPaciente='$InfPaciente_idPaciente'");
	mysql_select_db($bd,$conexion);
	$resultadoInfoMed = mysql_query($ActualizaInfoMedicoPac,$conexion)or die(mysql_error());
     //error_reporting(E_ALL);
	$id = mysql_insert_id();
	//echo 1;
	echo $id;
    }
?>