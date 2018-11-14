<?php 
require_once('../conexion/conectar.php'); 
?>

<?php 

  if (isset($_POST['NoPaciente'])){
	$SiAmbulancia = $_POST['AmbulanciaNota'];
	$MedicacionesAllegada = $_POST['MedicamentosAllegada'];
	$IntervencionesAllegada = $_POST['IantesLLegada'];
	$NotasTriage = $_POST['NotaTriage'];
	$OtraInfo = $_POST['OtraInfo'];
	$InfPaciente_idPaciente = $_POST['NoPaciente'];
	$ModoArrivo_idModoArrivo = $_POST['Mllegada'];
	
	
	$Actualizar = sprintf("UPDATE Triaje set SiAmbulancia='$SiAmbulancia',MedicacionesAllegada='$MedicacionesAllegada',IntervencionesAllegada='$IntervencionesAllegada',NotasTriage='$NotasTriage',OtraInfo='$OtraInfo',ModoArrivo_idModoArrivo='$ModoArrivo_idModoArrivo' WHERE InfPaciente_idPaciente='$InfPaciente_idPaciente'");
	mysql_select_db($bd,$conexion);

	$resultado = mysql_query($Actualizar,$conexion)or die(mysql_error());
     error_reporting(E_ALL);
	$id = mysql_insert_id();
	//echo 1;
	//echo $id;
    }
?>