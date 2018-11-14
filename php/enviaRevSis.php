<?php 
require_once('../conexion/conectar.php'); 
?>

<?php 

  if (isset($_POST['NoPaciente'])){
    $General=1;
    $OjosId=2;
    $ORLId=3;
    $CVId=4;
    $RespId=5;
    $GIId=6;
    $GUId=7;
    $MSQId=8;
    $PielId=9;
    $NeuroId=10;
    $PsiqId=11;
    $EndocId=12;
    $OtrosId=13;
 

	$generalP = utf8_encode($_POST['generalP']);
	$DescGeneral = $_POST['DescGeneral'];
	$Ojos = $_POST['Ojos'];
	$DescOjos = $_POST['DescOjos'];
	$ORL = $_POST['ORL'];
	$DescORL = $_POST['DescORL'];
	$CV = $_POST['CV'];
	$DescCV = $_POST['DescCV'];
	$RESP = $_POST['RESP'];
	$DescRESP = $_POST['DescRESP'];
	$GI = $_POST['GI'];
	$DescGI = $_POST['DescGI'];
	$GU = $_POST['GU'];
	$DescGU = $_POST['DescGU'];
	$MSQ = $_POST['MSQ'];
	$DescMSQ = $_POST['DescMSQ'];
	$Piel = $_POST['Piel'];
	$DescPiel = $_POST['DescPiel'];
	$Neuro = $_POST['Neuro'];
	$DescNeuro = $_POST['DescNeuro'];
	$Psiq = $_POST['Psiq'];
	$DescPsiq = $_POST['DescPsiq'];
	$Endoc = $_POST['Endoc'];
	$DescEndoc = $_POST['DescEndoc'];
	$Otros = $_POST['Otros'];
	$DescOtros = $_POST['DescOtros'];
	$InfPaciente_idPaciente = $_POST['NoPaciente'];
	
	$insertGen = sprintf("INSERT INTO RevSistemas(PosNeg,Descripcion,InfPaciente_idPaciente,NombreSistemas_idNombreSistemas) VALUES ('".$generalP."','".$DescGeneral."','".$InfPaciente_idPaciente."','".$General."')");
	mysql_select_db($bd,$conexion);
	$resultadoGen = mysql_query($insertGen,$conexion)or die(mysql_error());

    $insertOjos = sprintf("INSERT INTO RevSistemas(PosNeg,Descripcion,InfPaciente_idPaciente,NombreSistemas_idNombreSistemas) VALUES ('".$Ojos."','".$DescOjos."','".$InfPaciente_idPaciente."','".$OjosId."')");
	mysql_select_db($bd,$conexion);
	$resultadoOjos = mysql_query($insertOjos,$conexion)or die(mysql_error());

	$insertORL = sprintf("INSERT INTO RevSistemas(PosNeg,Descripcion,InfPaciente_idPaciente,NombreSistemas_idNombreSistemas) VALUES ('".$ORL."','".$DescORL."','".$InfPaciente_idPaciente."','".$ORLId."')");
	mysql_select_db($bd,$conexion);
	$resultadoORL = mysql_query($insertORL,$conexion)or die(mysql_error());

	$insertCV = sprintf("INSERT INTO RevSistemas(PosNeg,Descripcion,InfPaciente_idPaciente,NombreSistemas_idNombreSistemas) VALUES ('".$CV."','".$DescCV."','".$InfPaciente_idPaciente."','".$CVId."')");
	mysql_select_db($bd,$conexion);
	$resultadoCV = mysql_query($insertCV,$conexion)or die(mysql_error());

	$insertResp = sprintf("INSERT INTO RevSistemas(PosNeg,Descripcion,InfPaciente_idPaciente,NombreSistemas_idNombreSistemas) VALUES ('".$RESP."','".$DescRESP."','".$InfPaciente_idPaciente."','".$RespId."')");
	mysql_select_db($bd,$conexion);
	$resultadoResp = mysql_query($insertResp,$conexion)or die(mysql_error());

    $insertGI = sprintf("INSERT INTO RevSistemas(PosNeg,Descripcion,InfPaciente_idPaciente,NombreSistemas_idNombreSistemas) VALUES ('".$GI."','".$DescGI."','".$InfPaciente_idPaciente."','".$GIId."')");
	mysql_select_db($bd,$conexion);
	$resultadoGI = mysql_query($insertGI,$conexion)or die(mysql_error());

	$insertGU = sprintf("INSERT INTO RevSistemas(PosNeg,Descripcion,InfPaciente_idPaciente,NombreSistemas_idNombreSistemas) VALUES ('".$GU."','".$DescGU."','".$InfPaciente_idPaciente."','".$GUId."')");
	mysql_select_db($bd,$conexion);
	$resultadoGU = mysql_query($insertGU,$conexion)or die(mysql_error());

	$insertMSQ = sprintf("INSERT INTO RevSistemas(PosNeg,Descripcion,InfPaciente_idPaciente,NombreSistemas_idNombreSistemas) VALUES ('".$MSQ."','".$DescMSQ."','".$InfPaciente_idPaciente."','".$MSQId."')");
	mysql_select_db($bd,$conexion);
	$resultadoMSQ = mysql_query($insertMSQ,$conexion)or die(mysql_error());

	$insertPiel = sprintf("INSERT INTO RevSistemas(PosNeg,Descripcion,InfPaciente_idPaciente,NombreSistemas_idNombreSistemas) VALUES ('".$Piel."','".$DescPiel."','".$InfPaciente_idPaciente."','".$PielId."')");
	mysql_select_db($bd,$conexion);
	$resultadoPiel = mysql_query($insertPiel,$conexion)or die(mysql_error());

	$insertNeuro = sprintf("INSERT INTO RevSistemas(PosNeg,Descripcion,InfPaciente_idPaciente,NombreSistemas_idNombreSistemas) VALUES ('".$Neuro."','".$DescNeuro."','".$InfPaciente_idPaciente."','".$NeuroId."')");
	mysql_select_db($bd,$conexion);
	$resultadoNeuro = mysql_query($insertNeuro,$conexion)or die(mysql_error());

	$insertPsiq = sprintf("INSERT INTO RevSistemas(PosNeg,Descripcion,InfPaciente_idPaciente,NombreSistemas_idNombreSistemas) VALUES ('".$Psiq."','".$DescPsiq."','".$InfPaciente_idPaciente."','".$PsiqId."')");
	mysql_select_db($bd,$conexion);
	$resultadoPsiq = mysql_query($insertPsiq,$conexion)or die(mysql_error());

	$insertEndoc = sprintf("INSERT INTO RevSistemas(PosNeg,Descripcion,InfPaciente_idPaciente,NombreSistemas_idNombreSistemas) VALUES ('".$Endoc."','".$DescEndoc."','".$InfPaciente_idPaciente."','".$EndocId."')");
	mysql_select_db($bd,$conexion);
	$resultadoEndoc = mysql_query($insertEndoc,$conexion)or die(mysql_error());

	$insertOtros = sprintf("INSERT INTO RevSistemas(PosNeg,Descripcion,InfPaciente_idPaciente,NombreSistemas_idNombreSistemas) VALUES ('".$Otros."','".$DescOtros."','".$InfPaciente_idPaciente."','".$OtrosId."')");
	mysql_select_db($bd,$conexion);
	$resultadoOtros = mysql_query($insertOtros,$conexion)or die(mysql_error());

	$id = mysql_insert_id();
	//echo 1;
	echo $id;
    }
?>