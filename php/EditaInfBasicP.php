<?php 
require_once('../conexion/conectar.php'); 
?>

<?php 

  if (isset($_POST['codigoficha'])){
  	$NoPaciente = $_POST['NoPaciente'];
	$CodigoFicha = $_POST['codigoficha'];
	$CodigoPaciente = $_POST['codigo'];
	$fechaIngreso = $_POST['fecha'];
	$hora = $_POST['hora'];
	$primerNombre = $_POST['PNombre'];
	$segundoNombre = $_POST['SNombre'];
	$primerApellido = $_POST['PrApellido'];
	$segundoApellido = $_POST['SegApellido'];
	$apellidoCasada = $_POST['ACasada'];
	$referido = $_POST['referido'];
	$aNotificadasSN = $_POST['Anotificadas'];
	$FechaNac = $_POST['FNac'];
	$anios = $_POST['anios'];
	$meses = $_POST['meses'];
	$dias = $_POST['dias'];
	$dpi = $_POST['dpi'];
	$ocupacion = $_POST['Ocupacion'];
	$NoTelefono = $_POST['telefono'];
	$Direccion = $_POST['Direccion'];	
	$Sexo = $_POST['sexo'];
	$ContactoPaciente = $_POST['contEmer'];
	$TelContacto = $_POST['NoTelEnc'];
	$Relacion = $_POST['Relacion'];
	$perIngInfo = 1;
	$EstCivil = $_POST['estadoCivil'];
	$Etnia = $_POST['etnia'];
	$idAutoridades = $_POST['Anotificada'];	
	$Actualizar = sprintf("UPDATE infpaciente set CodigoFicha='$CodigoFicha',CodigoPaciente='$CodigoPaciente',FechaIngreso='$fechaIngreso',Hora='$hora',PrimerNombreP='$primerNombre',SegundoNombreP='$segundoNombre',PrimerApeP='$primerApellido',SegundoApeP='$segundoApellido',ApellidoCasada='$apellidoCasada',Referido='$referido', 
	AutoridadesNotificadas='$aNotificadasSN',FechaNacP='$FechaNac',AniosP='$anios',MesesP='$meses',DiasP='$dias',DPI='$dpi',Ocupacion='$ocupacion',Telefono='$NoTelefono',Direccion='$Direccion',Sexo='$Sexo',ContactoPaciente='$ContactoPaciente',
	TelContacto='$TelContacto',Relacion='$Relacion',PersonalIngInfo_idPersonalIngInfo='$perIngInfo',
		EstadoCivil_idEstadoCivil='$EstCivil',Etnia_idEtnia='$Etnia',AutoridadesNotif_idAutoridadesNotif='$idAutoridades'	WHERE idPaciente='$NoPaciente'");
	mysql_select_db($bd,$conexion);

	$resultado = mysql_query($Actualizar,$conexion)or die(mysql_error());
     //error_reporting(E_ALL);
	$id = mysql_insert_id();
	//echo 1;
	echo $id;
    }
?>