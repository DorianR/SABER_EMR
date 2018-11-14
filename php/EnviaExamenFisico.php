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
	
	$insertGen = sprintf("INSERT INTO ExamenFisico(PosNeg,Descripcion,InfPaciente_idPaciente,NombreSistemas_idNombreSistemas) VALUES ('".$generalP."','".$DescGeneral."','".$InfPaciente_idPaciente."','".$General."')");
	mysql_select_db($bd,$conexion);
	$resultadoGen = mysql_query($insertGen,$conexion)or die(mysql_error());

    $insertOjos = sprintf("INSERT INTO ExamenFisico(PosNeg,Descripcion,InfPaciente_idPaciente,NombreSistemas_idNombreSistemas) VALUES ('".$Ojos."','".$DescOjos."','".$InfPaciente_idPaciente."','".$OjosId."')");
	mysql_select_db($bd,$conexion);
	$resultadoOjos = mysql_query($insertOjos,$conexion)or die(mysql_error());

	$insertORL = sprintf("INSERT INTO ExamenFisico(PosNeg,Descripcion,InfPaciente_idPaciente,NombreSistemas_idNombreSistemas) VALUES ('".$ORL."','".$DescORL."','".$InfPaciente_idPaciente."','".$ORLId."')");
	mysql_select_db($bd,$conexion);
	$resultadoORL = mysql_query($insertORL,$conexion)or die(mysql_error());

	$insertCV = sprintf("INSERT INTO ExamenFisico(PosNeg,Descripcion,InfPaciente_idPaciente,NombreSistemas_idNombreSistemas) VALUES ('".$CV."','".$DescCV."','".$InfPaciente_idPaciente."','".$CVId."')");
	mysql_select_db($bd,$conexion);
	$resultadoCV = mysql_query($insertCV,$conexion)or die(mysql_error());

	$insertResp = sprintf("INSERT INTO ExamenFisico(PosNeg,Descripcion,InfPaciente_idPaciente,NombreSistemas_idNombreSistemas) VALUES ('".$RESP."','".$DescRESP."','".$InfPaciente_idPaciente."','".$RespId."')");
	mysql_select_db($bd,$conexion);
	$resultadoResp = mysql_query($insertResp,$conexion)or die(mysql_error());

    $insertGI = sprintf("INSERT INTO ExamenFisico(PosNeg,Descripcion,InfPaciente_idPaciente,NombreSistemas_idNombreSistemas) VALUES ('".$GI."','".$DescGI."','".$InfPaciente_idPaciente."','".$GIId."')");
	mysql_select_db($bd,$conexion);
	$resultadoGI = mysql_query($insertGI,$conexion)or die(mysql_error());

	$insertGU = sprintf("INSERT INTO ExamenFisico(PosNeg,Descripcion,InfPaciente_idPaciente,NombreSistemas_idNombreSistemas) VALUES ('".$GU."','".$DescGU."','".$InfPaciente_idPaciente."','".$GUId."')");
	mysql_select_db($bd,$conexion);
	$resultadoGU = mysql_query($insertGU,$conexion)or die(mysql_error());

	$insertMSQ = sprintf("INSERT INTO ExamenFisico(PosNeg,Descripcion,InfPaciente_idPaciente,NombreSistemas_idNombreSistemas) VALUES ('".$MSQ."','".$DescMSQ."','".$InfPaciente_idPaciente."','".$MSQId."')");
	mysql_select_db($bd,$conexion);
	$resultadoMSQ = mysql_query($insertMSQ,$conexion)or die(mysql_error());

	$insertPiel = sprintf("INSERT INTO ExamenFisico(PosNeg,Descripcion,InfPaciente_idPaciente,NombreSistemas_idNombreSistemas) VALUES ('".$Piel."','".$DescPiel."','".$InfPaciente_idPaciente."','".$PielId."')");
	mysql_select_db($bd,$conexion);
	$resultadoPiel = mysql_query($insertPiel,$conexion)or die(mysql_error());

	$insertNeuro = sprintf("INSERT INTO ExamenFisico(PosNeg,Descripcion,InfPaciente_idPaciente,NombreSistemas_idNombreSistemas) VALUES ('".$Neuro."','".$DescNeuro."','".$InfPaciente_idPaciente."','".$NeuroId."')");
	mysql_select_db($bd,$conexion);
	$resultadoNeuro = mysql_query($insertNeuro,$conexion)or die(mysql_error());

	$insertPsiq = sprintf("INSERT INTO ExamenFisico(PosNeg,Descripcion,InfPaciente_idPaciente,NombreSistemas_idNombreSistemas) VALUES ('".$Psiq."','".$DescPsiq."','".$InfPaciente_idPaciente."','".$PsiqId."')");
	mysql_select_db($bd,$conexion);
	$resultadoPsiq = mysql_query($insertPsiq,$conexion)or die(mysql_error());

	$insertEndoc = sprintf("INSERT INTO ExamenFisico(PosNeg,Descripcion,InfPaciente_idPaciente,NombreSistemas_idNombreSistemas) VALUES ('".$Endoc."','".$DescEndoc."','".$InfPaciente_idPaciente."','".$EndocId."')");
	mysql_select_db($bd,$conexion);
	$resultadoEndoc = mysql_query($insertEndoc,$conexion)or die(mysql_error());

	$insertCabeza = sprintf("INSERT INTO ExamenFisico(PosNeg,Descripcion,InfPaciente_idPaciente,NombreSistemas_idNombreSistemas) VALUES ('".$Cabeza."','".$DescCabeza."','".$InfPaciente_idPaciente."','".$CabezaId."')");
	mysql_select_db($bd,$conexion);
    $resultadoCabeza = mysql_query($insertCabeza,$conexion)or die(mysql_error());

	$insertCuello = sprintf("INSERT INTO ExamenFisico(PosNeg,Descripcion,InfPaciente_idPaciente,NombreSistemas_idNombreSistemas) VALUES ('".$CuelloFis."','".$DescCuello."','".$InfPaciente_idPaciente."','".$CuelloId."')");
	mysql_select_db($bd,$conexion);
	$resultadoCuello = mysql_query($insertCuello,$conexion)or die(mysql_error());

	$insertAbdomen = sprintf("INSERT INTO ExamenFisico(PosNeg,Descripcion,InfPaciente_idPaciente,NombreSistemas_idNombreSistemas) VALUES ('".$Abdomen."','".$DescAbdomen."','".$InfPaciente_idPaciente."','".$AbdomenId."')");
	mysql_select_db($bd,$conexion);
	$resultadoAbdomen = mysql_query($insertAbdomen,$conexion)or die(mysql_error());

	$inserPecho = sprintf("INSERT INTO ExamenFisico(PosNeg,Descripcion,InfPaciente_idPaciente,NombreSistemas_idNombreSistemas) VALUES ('".$Pecho."','".$DescPecho."','".$InfPaciente_idPaciente."','".$PechoId."')");
	mysql_select_db($bd,$conexion);
	$resultadoPecho = mysql_query($inserPecho,$conexion)or die(mysql_error());

	$insertEspalda = sprintf("INSERT INTO ExamenFisico(PosNeg,Descripcion,InfPaciente_idPaciente,NombreSistemas_idNombreSistemas) VALUES ('".$Espalda."','".$DescEspalda."','".$InfPaciente_idPaciente."','".$EspaldaId."')");
	mysql_select_db($bd,$conexion);
	$resultadoEspalda = mysql_query($insertEspalda,$conexion)or die(mysql_error());

	$insertExtremidades = sprintf("INSERT INTO ExamenFisico(PosNeg,Descripcion,InfPaciente_idPaciente,NombreSistemas_idNombreSistemas) VALUES ('".$Extremidades."','".$DescExtremidades."','".$InfPaciente_idPaciente."','".$ExtremidadesId."')");
	mysql_select_db($bd,$conexion);
	$resultadoExtremidades = mysql_query($insertExtremidades,$conexion)or die(mysql_error());

	$id = mysql_insert_id();
	//echo 1;
	echo $id;
    }
?>