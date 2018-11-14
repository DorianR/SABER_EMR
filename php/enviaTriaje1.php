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
	
	
	$insert = sprintf("INSERT INTO Triaje(SiAmbulancia,MedicacionesAllegada,IntervencionesAllegada,NotasTriage,OtraInfo,InfPaciente_idPaciente,ModoArrivo_idModoArrivo) VALUES ('".$SiAmbulancia."','".$MedicacionesAllegada."','".$IntervencionesAllegada."','".$NotasTriage."','".$OtraInfo."','".$InfPaciente_idPaciente."','".$ModoArrivo_idModoArrivo."')");
	mysql_select_db($bd,$conexion);

	$resultado = mysql_query($insert,$conexion)or die(mysql_error());
     //error_reporting(E_ALL);
	$id = mysql_insert_id();
	//echo 1;
	echo $id;
    }
?>