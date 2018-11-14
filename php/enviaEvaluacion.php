<?php 
require_once('../conexion/conectar.php'); 
?>

<?php 

  if (isset($_POST['NoPaciente'])){
	$HoraContactoMed = $_POST['HoraContactoMedico'];
	$MedicoAcargo = $_POST['MedicoAcargo'];
	$Eps= $_POST['Eps'];
	$Interno = $_POST['Interno'];
	$Externo = $_POST['Externo'];
	$Otro = $_POST['Otro'];
	$MotivoDeConsulta = $_POST['MotConsulta'];
	$HistoriaEnfActual = $_POST['HistoriaEnfActual'];
	$HistoriaMed = $_POST['HistoriaMedica'];
	$Quirurgica = $_POST['HistoriaQuirurgica'];
	$Familiar = $_POST['HistoriaFamilia'];
	$Social = $_POST['HistoriaSocial'];
	$Medicaciones = $_POST['HistoriaMedicaciones'];
	$Alergias = $_POST['HistoriaAlergias'];
	$InfPaciente_idPaciente = $_POST['NoPaciente'];	
	$insert = sprintf("INSERT INTO evaluacion(HoraContactoMed,MedicoAcargo,EPS,Interno,Externo,Otro,MotivoDeConsulta,HistoriaEnfActual,HistoriaMed,Quirurgica,Familiar,Social,Medicaciones,Alergias,InfPaciente_idPaciente) VALUES ('".$HoraContactoMed."','".$MedicoAcargo."','".$Eps."','".$Interno."','".$Externo."','".$Otro."','".$MotivoDeConsulta."','".$HistoriaEnfActual."','".$HistoriaMed."','".$Quirurgica."','".$Familiar."','".$Social."','".$Medicaciones."','".$Alergias."','".$InfPaciente_idPaciente."')");
	mysql_select_db($bd,$conexion);

	$resultado = mysql_query($insert,$conexion)or die(mysql_error());
     error_reporting(E_ALL);
	$id = mysql_insert_id();
	//echo 1;
	echo $id;
    }
?>