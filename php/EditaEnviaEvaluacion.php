<?php 
require_once('../conexion/conectar.php.'); 
?>

<?php 

  if (isset($_POST['NoPaciente'])){
	$HoraContactoMed = $_POST['HoraContactoMedico'];
	$MedicoAcargo = $_POST['MedicoAcargo'];
	$Eps = $_POST['Eps'];
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
	$insert = sprintf("UPDATE evaluacion set HoraContactoMed='$HoraContactoMed',MedicoAcargo='$MedicoAcargo',EPS='$Eps',Interno='$Interno',Externo='$Externo',Otro='$Otro',MotivoDeConsulta='$MotivoDeConsulta',HistoriaEnfActual='$HistoriaEnfActual',HistoriaMed='$HistoriaMed',Quirurgica='$Quirurgica',Familiar='$Familiar',Social='$Social',Medicaciones='$Medicaciones',Alergias='$Alergias' WHERE InfPaciente_idPaciente='$InfPaciente_idPaciente'");
	mysql_select_db($bd,$conexion);

	$resultado = mysql_query($insert,$conexion)or die(mysql_error());
     //error_reporting(E_ALL);
	$id = mysql_insert_id();
	//echo 1;
	echo $id;
    }
?>