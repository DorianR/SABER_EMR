<?php 
require_once('../conexion/conectar.php'); 
?>

<?php 

  if (isset($_POST['codigo']) && ($_POST['codigo']!="")){
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
	$ocupacion = $_POST['ocupacion'];
	$dpi = $_POST['dpi'];
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
	$insert = sprintf("INSERT INTO infpaciente(CodigoFicha,CodigoPaciente,FechaIngreso,Hora,PrimerNombreP,SegundoNombreP,PrimerApeP,SegundoApeP,
		ApellidoCasada,Referido,AutoridadesNotificadas,FechaNacP,AniosP,MesesP,DiasP,Ocupacion,DPI,Telefono,Direccion,Sexo,ContactoPaciente,TelContacto,Relacion,PersonalIngInfo_idPersonalIngInfo,
		EstadoCivil_idEstadoCivil,Etnia_idEtnia,AutoridadesNotif_idAutoridadesNotif) VALUES ('".$CodigoFicha."','".$CodigoPaciente."','".$fechaIngreso."',
		'".$hora."','".$primerNombre."','".$segundoNombre."','".$primerApellido."','".$segundoApellido."','".$apellidoCasada."','".$referido."',
		'".$aNotificadasSN."','".$FechaNac."','".$anios."','".$meses."','".$dias."','".$ocupacion."','".$dpi."','".$NoTelefono."','".$Direccion."','".$Sexo."',
		'".$ContactoPaciente."','".$TelContacto."','".$Relacion."','".$perIngInfo."','".$EstCivil."','".$Etnia."','".$idAutoridades."')");

	mysql_select_db($bd,$conexion);

	$resultado = mysql_query($insert,$conexion)or die(mysql_error());
     //error_reporting(E_ALL);
	$id = mysql_insert_id();
	//echo 1;
	echo $id;
    }
?>