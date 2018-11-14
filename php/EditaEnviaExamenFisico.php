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
 	$CabezaId=14;
 	$CuelloId=15;
 	$AbdomenId=16;
 	$PechoId=17;
 	$EspaldaId=18;
 	$ExtremidadesId=19;
 
	$generalP = $_POST['generalFis'];
	$DescGeneral = $_POST['DescGeneralFis'];
	$Ojos = $_POST['OjosFis'];
	$DescOjos = $_POST['DescOjosFis'];
	$ORL = $_POST['ORLFis'];
	$DescORL = $_POST['DescORLFis'];
	$CV = $_POST['CVFis'];
	$DescCV = $_POST['DescCVFis'];
	$RESP = $_POST['RESPFis'];
	$DescRESP = $_POST['DescRESPFis'];
	$GI = $_POST['GIFis'];
	$DescGI = $_POST['DescGIFis'];
	$GU = $_POST['GUFis'];
	$DescGU = $_POST['DescGUFis'];
	$MSQ = $_POST['MSQFis'];
	$DescMSQ = $_POST['DescMSQFis'];
	$Piel = $_POST['PielFis'];
	$DescPiel = $_POST['DescPielFis'];
	$Neuro = $_POST['NeuroFis'];
	$DescNeuro = $_POST['DescNeuroFis'];
	$Psiq = $_POST['PsiqFis'];
	$DescPsiq = $_POST['DescPsiqFis'];
	$Endoc = $_POST['EndocFis'];
	$DescEndoc = $_POST['DescEndocFis'];
	$Cabeza = $_POST['CabezaFis'];
	$DescCabeza = $_POST['DescCabezaFis'];    
    $CuelloFis = $_POST['CuelloFis'];
	$DescCuello = $_POST['DescCuelloFis'];
	$Abdomen = $_POST['AbdomenFis'];
	$DescAbdomen = $_POST['DescAbdomensFis'];
	$Pecho = $_POST['PechoFis'];
	$DescPecho = $_POST['DescPechoFis'];
	$Espalda = $_POST['EspaldaFis'];
	$DescEspalda = $_POST['DescEspaldaFis'];
	$Extremidades = $_POST['ExtremidadesFis'];
	$DescExtremidades = $_POST['DescExtremidadesFis'];
	$InfPaciente_idPaciente = $_POST['NoPaciente'];
	
	$UpdateGen = sprintf("UPDATE ExamenFisico set PosNeg='$generalP',Descripcion='$DescGeneral' WHERE InfPaciente_idPaciente='$InfPaciente_idPaciente' AND NombreSistemas_idNombreSistemas='$General'");
	mysql_select_db($bd,$conexion);
	$resultadoGen = mysql_query($UpdateGen,$conexion)or die(mysql_error());

    $UpdateOjos = sprintf("UPDATE ExamenFisico set PosNeg='$Ojos',Descripcion='$DescOjos' WHERE InfPaciente_idPaciente='$InfPaciente_idPaciente'AND NombreSistemas_idNombreSistemas='$OjosId'");
	mysql_select_db($bd,$conexion);
	$resultadoOjos = mysql_query($UpdateOjos,$conexion)or die(mysql_error());

	$UpdateORL = sprintf("UPDATE ExamenFisico set PosNeg='$ORL',Descripcion='$DescORL' WHERE InfPaciente_idPaciente='$InfPaciente_idPaciente' AND NombreSistemas_idNombreSistemas='$ORLId'");
	mysql_select_db($bd,$conexion);
	$resultadoORL = mysql_query($UpdateORL,$conexion)or die(mysql_error());

	$UpdateCV = sprintf("UPDATE ExamenFisico set PosNeg='$CV',Descripcion='$DescCV' WHERE InfPaciente_idPaciente='$InfPaciente_idPaciente' AND NombreSistemas_idNombreSistemas='$CVId'");
	mysql_select_db($bd,$conexion);
	$resultadoCV = mysql_query($UpdateCV,$conexion)or die(mysql_error());

	$UpdateResp = sprintf("UPDATE ExamenFisico set PosNeg='$RESP', Descripcion='$DescRESP' WHERE InfPaciente_idPaciente= '$InfPaciente_idPaciente' AND NombreSistemas_idNombreSistemas='$RespId'");
	mysql_select_db($bd,$conexion);
	$resultadoResp = mysql_query($UpdateResp,$conexion)or die(mysql_error());

    $UpdateGI = sprintf("UPDATE ExamenFisico set PosNeg='$GI',Descripcion='$DescGI' WHERE InfPaciente_idPaciente='$InfPaciente_idPaciente' AND NombreSistemas_idNombreSistemas='$GIId'");
	mysql_select_db($bd,$conexion);
	$resultadoGI = mysql_query($UpdateGI,$conexion)or die(mysql_error());

	$UpdateGU = sprintf("UPDATE ExamenFisico set PosNeg='$GU',Descripcion='$DescGU' WHERE InfPaciente_idPaciente='$InfPaciente_idPaciente' AND NombreSistemas_idNombreSistemas='$GUId'");
	mysql_select_db($bd,$conexion);
	$resultadoGU = mysql_query($UpdateGU,$conexion)or die(mysql_error());

	$UpdateMSQ = sprintf("UPDATE ExamenFisico set PosNeg='$MSQ',Descripcion='$DescMSQ' WHERE InfPaciente_idPaciente='$InfPaciente_idPaciente' AND NombreSistemas_idNombreSistemas='$MSQId'");
	mysql_select_db($bd,$conexion);
	$resultadoMSQ = mysql_query($UpdateMSQ,$conexion)or die(mysql_error());

	$UpdatePiel = sprintf("UPDATE ExamenFisico set PosNeg='$Piel',Descripcion='$DescPiel' WHERE InfPaciente_idPaciente='$InfPaciente_idPaciente' AND NombreSistemas_idNombreSistemas='$PielId'");
	mysql_select_db($bd,$conexion);
	$resultadoPiel = mysql_query($UpdatePiel,$conexion)or die(mysql_error());

	$UpdateNeuro = sprintf("UPDATE ExamenFisico set PosNeg='$Neuro',Descripcion='$DescNeuro' WHERE InfPaciente_idPaciente='$InfPaciente_idPaciente' AND NombreSistemas_idNombreSistemas='$NeuroId'");
	mysql_select_db($bd,$conexion);
	$resultadoNeuro = mysql_query($UpdateNeuro,$conexion)or die(mysql_error());

	$UpdatePsiq = sprintf("UPDATE ExamenFisico set PosNeg='$Psiq',Descripcion='$DescPsiq' WHERE InfPaciente_idPaciente='$InfPaciente_idPaciente' AND NombreSistemas_idNombreSistemas='$PsiqId'");
	mysql_select_db($bd,$conexion);
	$resultadoPsiq = mysql_query($UpdatePsiq,$conexion)or die(mysql_error());

	$UpdateEndoc = sprintf("UPDATE ExamenFisico set PosNeg='$Endoc',Descripcion='$DescEndoc' WHERE InfPaciente_idPaciente='$InfPaciente_idPaciente' AND NombreSistemas_idNombreSistemas='$EndocId'");
	mysql_select_db($bd,$conexion);
	$resultadoEndoc = mysql_query($UpdateEndoc,$conexion)or die(mysql_error());

	$UpdateCabeza = sprintf("UPDATE ExamenFisico set PosNeg='$Cabeza',Descripcion='$DescCabeza' WHERE InfPaciente_idPaciente='$InfPaciente_idPaciente' AND NombreSistemas_idNombreSistemas='$CabezaId'");
	mysql_select_db($bd,$conexion);
    $resultadoCabeza = mysql_query($UpdateCabeza,$conexion)or die(mysql_error());

	$UpdateCuello = sprintf("UPDATE ExamenFisico set PosNeg='$CuelloFis',Descripcion='$DescCuello' WHERE InfPaciente_idPaciente='$InfPaciente_idPaciente' AND NombreSistemas_idNombreSistemas='$CuelloId'");
	mysql_select_db($bd,$conexion);
	$resultadoCuello = mysql_query($UpdateCuello,$conexion)or die(mysql_error());

	$UpdateAbdomen = sprintf("UPDATE ExamenFisico set PosNeg='$Abdomen',Descripcion='$DescAbdomen' WHERE InfPaciente_idPaciente='$InfPaciente_idPaciente' AND NombreSistemas_idNombreSistemas='$AbdomenId'");
	mysql_select_db($bd,$conexion);
	$resultadoAbdomen = mysql_query($UpdateAbdomen,$conexion)or die(mysql_error());

	$UpdatePecho = sprintf("UPDATE ExamenFisico set PosNeg='$Pecho',Descripcion='$DescPecho' WHERE InfPaciente_idPaciente='$InfPaciente_idPaciente' AND NombreSistemas_idNombreSistemas='$PechoId'");
	mysql_select_db($bd,$conexion);
	$resultadoPecho = mysql_query($UpdatePecho,$conexion)or die(mysql_error());

	$UpdateEspalda = sprintf("UPDATE ExamenFisico set PosNeg='$Espalda',Descripcion='$DescEspalda' WHERE InfPaciente_idPaciente='$InfPaciente_idPaciente' AND NombreSistemas_idNombreSistemas='$EspaldaId'");
	mysql_select_db($bd,$conexion);
	$resultadoEspalda = mysql_query($UpdateEspalda,$conexion)or die(mysql_error());

	$UpdateExtremidades = sprintf("UPDATE ExamenFisico set PosNeg='$Extremidades',Descripcion='$DescExtremidades' WHERE InfPaciente_idPaciente='$InfPaciente_idPaciente' AND NombreSistemas_idNombreSistemas='$ExtremidadesId'");
	mysql_select_db($bd,$conexion);
	$resultadoExtremidades = mysql_query($UpdateExtremidades,$conexion)or die(mysql_error());

	$id = mysql_insert_id();
	
	//echo 1;
	echo $id;
    }
?>