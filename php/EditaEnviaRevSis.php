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
	
	$UpdateGen = sprintf("UPDATE RevSistemas set PosNeg='$generalP',Descripcion='$DescGeneral' WHERE InfPaciente_idPaciente='$InfPaciente_idPaciente' AND NombreSistemas_idNombreSistemas='$General'");
	mysql_select_db($bd,$conexion);
	$resultadoGen = mysql_query($UpdateGen,$conexion)or die(mysql_error());

    $UpdateOjos = sprintf("UPDATE RevSistemas set PosNeg='$Ojos',Descripcion='$DescOjos' WHERE InfPaciente_idPaciente='$InfPaciente_idPaciente' AND NombreSistemas_idNombreSistemas='$OjosId'");
	mysql_select_db($bd,$conexion);
	$resultadoOjos = mysql_query($UpdateOjos,$conexion)or die(mysql_error());

	$UpdateORL = sprintf("UPDATE RevSistemas set PosNeg='$ORL',Descripcion='$DescORL' WHERE InfPaciente_idPaciente='$InfPaciente_idPaciente'  AND NombreSistemas_idNombreSistemas='$ORLId'");
	mysql_select_db($bd,$conexion);
	$resultadoORL = mysql_query($UpdateORL,$conexion)or die(mysql_error());

	$UpdateCV = sprintf("UPDATE RevSistemas set PosNeg='$CV',Descripcion='$DescCV' WHERE InfPaciente_idPaciente='$InfPaciente_idPaciente' AND NombreSistemas_idNombreSistemas='$CVId'");
	mysql_select_db($bd,$conexion);
	$resultadoCV = mysql_query($UpdateCV,$conexion)or die(mysql_error());

	$UpdateResp = sprintf("UPDATE RevSistemas set PosNeg='$RESP',Descripcion='$DescRESP' WHERE InfPaciente_idPaciente='$InfPaciente_idPaciente' AND NombreSistemas_idNombreSistemas='$RespId'");
	mysql_select_db($bd,$conexion);
	$resultadoResp = mysql_query($UpdateResp,$conexion)or die(mysql_error());

    $UpdateGI = sprintf("UPDATE RevSistemas set PosNeg='$GI',Descripcion='$DescGI' WHERE InfPaciente_idPaciente='$InfPaciente_idPaciente' AND NombreSistemas_idNombreSistemas='$GIId'");
	mysql_select_db($bd,$conexion);
	$resultadoGI = mysql_query($UpdateGI,$conexion)or die(mysql_error());

	$UpdateGU = sprintf("UPDATE RevSistemas set PosNeg='$GU',Descripcion='$DescGU'  WHERE InfPaciente_idPaciente='$InfPaciente_idPaciente' AND NombreSistemas_idNombreSistemas='$GUId'");
	mysql_select_db($bd,$conexion);
	$resultadoGU = mysql_query($UpdateGU,$conexion)or die(mysql_error());

	$UpdateMSQ = sprintf("UPDATE RevSistemas set PosNeg='$MSQ',Descripcion='$DescMSQ' WHERE InfPaciente_idPaciente='$InfPaciente_idPaciente' AND NombreSistemas_idNombreSistemas='$MSQId'");
	mysql_select_db($bd,$conexion);
	$resultadoMSQ = mysql_query($UpdateMSQ,$conexion)or die(mysql_error());

	$UpdatePiel = sprintf("UPDATE RevSistemas set PosNeg='$Piel',Descripcion='$DescPiel' WHERE InfPaciente_idPaciente='$InfPaciente_idPaciente' AND NombreSistemas_idNombreSistemas='$PielId'");
	mysql_select_db($bd,$conexion);
	$resultadoPiel = mysql_query($UpdatePiel,$conexion)or die(mysql_error());

	$UpdateNeuro = sprintf("UPDATE RevSistemas set PosNeg='$Neuro',Descripcion='$DescNeuro' WHERE InfPaciente_idPaciente='$InfPaciente_idPaciente' AND NombreSistemas_idNombreSistemas='$NeuroId'");
	mysql_select_db($bd,$conexion);
	$resultadoNeuro = mysql_query($UpdateNeuro,$conexion)or die(mysql_error());

	$UpdatePsiq = sprintf("UPDATE RevSistemas set PosNeg='$Psiq',Descripcion='$DescPsiq' WHERE InfPaciente_idPaciente='$InfPaciente_idPaciente' AND NombreSistemas_idNombreSistemas='$PsiqId'");
	mysql_select_db($bd,$conexion);
	$resultadoPsiq = mysql_query($UpdatePsiq,$conexion)or die(mysql_error());

	$UpdateEndoc = sprintf("UPDATE RevSistemas set PosNeg='$Endoc',Descripcion='$DescEndoc' WHERE InfPaciente_idPaciente='$InfPaciente_idPaciente' AND NombreSistemas_idNombreSistemas='$EndocId'");
	mysql_select_db($bd,$conexion);
	$resultadoEndoc = mysql_query($UpdateEndoc,$conexion)or die(mysql_error());

	$UpdateOtros = sprintf("UPDATE RevSistemas set PosNeg='$Otros',Descripcion='$DescOtros' WHERE InfPaciente_idPaciente='$InfPaciente_idPaciente' AND NombreSistemas_idNombreSistemas='$OtrosId'");
	mysql_select_db($bd,$conexion);
	$resultadoOtros = mysql_query($UpdateOtros,$conexion)or die(mysql_error());

	$id = mysql_insert_id();
	//echo 1;
	echo $id;
    }
?>