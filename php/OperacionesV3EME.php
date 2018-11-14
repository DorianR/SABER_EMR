<?php
require_once('../conexion/conectar.php');
?>

<?php
$opcion= $_POST['opc'];
$idPaciente = $_POST['NoPaciente'];


if ($opcion==='modoLL'){
    $Mllegada = $_POST['MLLeg'];
    $NomTable = $_POST['NomTabla'];

    $ActualizaMllegada = sprintf("UPDATE $NomTable SET ModoArrivo_idModoArrivo='$Mllegada' WHERE idPaciente='$idPaciente'");
    mysql_select_db($bd,$conexion);
    $resultadoMllegada = mysql_query($ActualizaMllegada,$conexion)or die(mysql_error());

    $id = mysql_insert_id();
    //echo 1;
    echo $id;
}
elseif ($opcion==='UpContPac'){
    $ContactP = $_POST['cPaciente'];
    $NomTable = $_POST['NomTabla'];
    $ActualizContPac = sprintf("UPDATE $NomTable SET ContactoPaciente='$ContactP' WHERE idPaciente='$idPaciente'");
    mysql_select_db($bd,$conexion);
    $resultadoContacPac = mysql_query($ActualizContPac,$conexion)or die(mysql_error());

    $id = mysql_insert_id();
    //echo 1;
    echo $id;
}

elseif ($opcion==='motivoIng'){
    $MotivoIng = $_POST['motIngreso'];
    $ServicioPacienteTab = $_POST['ServiP'];
    //$insert = sprintf("INSERT INTO MotIngresoARCUV3(MotIngreso,InfPaciente_idPaciente,DescripcionServicio_idDescripcionServicio) VALUES ('".$MotivoIng."','".$idPaciente."','".$ServicioPacienteTab."') ON DUPLICATE KEY UPDATE MotIngreso='".$MotivoIng."', DescripcionServicio_idDescripcionServicio='".$ServicioPacienteTab."' WHERE InfPaciente_idPaciente='".$idPaciente."' AND DescripcionServicio_idDescripcionServicio='".$ServicioPacienteTab."'");
    $insUp = sprintf("CALL InsertUpdateMotIngresoV3('".$MotivoIng."','".$idPaciente."','".$ServicioPacienteTab."')");
    mysql_select_db($bd,$conexion);
    $resultado = mysql_query($insUp,$conexion)or die(mysql_error());
    //error_reporting(E_ALL);
    $id = mysql_insert_id();
    //echo 1;
    echo $resultado;
}
elseif ($opcion==='AnRelConUrg'){
    $AntRcU = $_POST['AntecedentesUrgen'];
    $ServicioPacienteTab = $_POST['ServiP'];
    // $insert = sprintf("INSERT INTO MotIngresoARCUV3(idMotIngresoARCUV3,AnteRelConUrg,InfPaciente_idPaciente,DescripcionServicio_idDescripcionServicio) VALUES ('".$idPaciente."','".$AntRcU."','".$idPaciente."','".$ServicioPacienteTab."') ON DUPLICATE KEY UPDATE AnteRelConUrg='".$AntRcU."', DescripcionServicio_idDescripcionServicio='".$ServicioPacienteTab."'");
    $insUpARCU = sprintf("CALL InsertUpdateMotIngresoARuV3('".$AntRcU."','".$idPaciente."','".$ServicioPacienteTab."')");
    mysql_select_db($bd,$conexion);
    $resultado = mysql_query($insUpARCU,$conexion)or die(mysql_error());
    //error_reporting(E_ALL);
    $id = mysql_insert_id();
    //echo 1;
    echo $resultado;
}
elseif ($opcion==='FechaIngresoU'){
    $FechIngUrg = $_POST['fechaIngUrg'];
    $ServicioPacienteTab = $_POST['ServiP'];
    // $insert = sprintf("INSERT INTO MotIngresoARCUV3(idMotIngresoARCUV3,FechaHoraMA,InfPaciente_idPaciente,DescripcionServicio_idDescripcionServicio) VALUES ('".$idPaciente."','".$FechIngUrg."','".$idPaciente."','".$ServicioPacienteTab."') ON DUPLICATE KEY UPDATE FechaHoraMA='".$FechIngUrg."'");
    $insUpFech = sprintf("CALL InsertUpdateMotIngresoFechV3('".$FechIngUrg."','".$idPaciente."','".$ServicioPacienteTab."')");
    mysql_select_db($bd,$conexion);
    $resultado = mysql_query($insUpFech,$conexion)or die(mysql_error());
    //error_reporting(E_ALL);
    $id = mysql_insert_id();
    //echo 1;
    echo $resultado;
}
elseif ($opcion==='PresAr'){
    $presArt = $_POST['cmpo'];
    $ServicioPacienteTab = $_POST['ServiP'];
    // $insert = sprintf("INSERT INTO SignosVitalesExFisV3(idSinosVitales,PA,InfPaciente_idPaciente) VALUES ('".$idPaciente."','".$presArt."','".$idPaciente."') ON DUPLICATE KEY UPDATE PA='".$presArt."'");
    $InsUpSVpa = sprintf("CALL SigVitaPA('".$presArt."','".$idPaciente."','".$ServicioPacienteTab."')");
    mysql_select_db($bd,$conexion);
    $resultado = mysql_query($InsUpSVpa,$conexion)or die(mysql_error());
    //error_reporting(E_ALL);
    $id = mysql_insert_id();
    //echo 1;*/
    echo $resultado;
}

elseif ($opcion==='tempe'){
    $Temperatura = $_POST['cmpo'];
    $ServicioPacienteTab = $_POST['ServiP'];
    // $insert = sprintf("INSERT INTO SignosVitalesExFisV3(idSinosVitales,TEMP,InfPaciente_idPaciente) VALUES ('".$idPaciente."','".$Temperatura."','".$idPaciente."') ON DUPLICATE KEY UPDATE TEMP='".$Temperatura."'");
    $InsUpSVtemp = sprintf("CALL SigVitaTEMP('".$Temperatura."','".$idPaciente."','".$ServicioPacienteTab."')");
    mysql_select_db($bd,$conexion);
    $resultado = mysql_query($InsUpSVtemp,$conexion)or die(mysql_error());
    //error_reporting(E_ALL);
    $id = mysql_insert_id();
    //echo 1;*/
    echo $resultado;
}
elseif ($opcion==='po'){
    $PresionOxigeno = $_POST['cmpo'];
    $ServicioPacienteTab = $_POST['ServiP'];
    // $insert = sprintf("INSERT INTO SignosVitalesExFisV3(idSinosVitales,PO,InfPaciente_idPaciente) VALUES ('".$idPaciente."','".$PresionOxigeno."','".$idPaciente."') ON DUPLICATE KEY UPDATE PO='".$PresionOxigeno."'");
    $InsUpSVpo = sprintf("CALL SigVitaPO('".$PresionOxigeno."','".$idPaciente."','".$ServicioPacienteTab."')");
    mysql_select_db($bd,$conexion);
    $resultado = mysql_query($InsUpSVpo,$conexion)or die(mysql_error());
    //error_reporting(E_ALL);
    $id = mysql_insert_id();
    //echo 1;*/
    echo $resultado;
}
elseif ($opcion==='fr'){
    $FrecuenciaResp = $_POST['cmpo'];
    $ServicioPacienteTab = $_POST['ServiP'];
    //$insert = sprintf("INSERT INTO SignosVitalesExFisV3(idSinosVitales,FR,InfPaciente_idPaciente) VALUES ('".$idPaciente."','".$FrecuenciaResp."','".$idPaciente."') ON DUPLICATE KEY UPDATE FR='".$FrecuenciaResp."'");
    $InsUpSVfr = sprintf("CALL SigVitaFR('".$FrecuenciaResp."','".$idPaciente."','".$ServicioPacienteTab."')");
    mysql_select_db($bd,$conexion);
    $resultado = mysql_query($InsUpSVfr,$conexion)or die(mysql_error());
    //error_reporting(E_ALL);
    $id = mysql_insert_id();
    //echo 1;*/
    echo $resultado;
}
elseif ($opcion==='fc'){
    $FrecuenciaCar = $_POST['cmpo'];
    $ServicioPacienteTab = $_POST['ServiP'];
    // $insert = sprintf("INSERT INTO SignosVitalesExFisV3(idSinosVitales,FC,InfPaciente_idPaciente) VALUES ('".$idPaciente."','".$FrecuenciaCar."','".$idPaciente."') ON DUPLICATE KEY UPDATE FC='".$FrecuenciaCar."'");
    $InsUpSVfc = sprintf("CALL SigVitaFC('".$FrecuenciaCar."','".$idPaciente."','".$ServicioPacienteTab."')");
    mysql_select_db($bd,$conexion);
    $resultado = mysql_query($InsUpSVfc,$conexion)or die(mysql_error());
    //error_reporting(E_ALL);
    $id = mysql_insert_id();
    //echo 1;*/
    echo $resultado;
}
elseif ($opcion==='gli'){
    $Gli = $_POST['cmpo'];
    $ServicioPacienteTab = $_POST['ServiP'];
    //$insert = sprintf("INSERT INTO SignosVitalesExFisV3(idSinosVitales,GLI,InfPaciente_idPaciente) VALUES ('".$idPaciente."','".$Gli."','".$idPaciente."') ON DUPLICATE KEY UPDATE GLI='".$Gli."'");
    $InsUpSVgli = sprintf("CALL SigVitaGLI('".$Gli."','".$idPaciente."','".$ServicioPacienteTab."')");
    mysql_select_db($bd,$conexion);
    $resultado = mysql_query($InsUpSVgli,$conexion)or die(mysql_error());
    //error_reporting(E_ALL);
    $id = mysql_insert_id();
    //echo 1;*/
    echo $resultado;
}

elseif ($opcion==='Pconciente'){
    $PacienteConcienteSN = $_POST['Conci'];
    $ServicioPacienteTab = $_POST['ServiP'];
    //$insert = sprintf("INSERT INTO SignosVitalesExFisV3(idSinosVitales,Consiente,InfPaciente_idPaciente) VALUES ('".$idPaciente."','".$PacienteConcienteSN."','".$idPaciente."') ON DUPLICATE KEY UPDATE Consiente='".$PacienteConcienteSN."'");
    $InsUpSVconciente = sprintf("CALL SigVitaConsi('".$PacienteConcienteSN."','".$idPaciente."','".$ServicioPacienteTab."')");
    mysql_select_db($bd,$conexion);
    $resultado = mysql_query($InsUpSVconciente,$conexion)or die(mysql_error());
    //error_reporting(E_ALL);
    $id = mysql_insert_id();
    //echo 1;*/
    echo $resultado;
}
elseif ($opcion==='talla'){
    $TallaP = $_POST['cmpo'];
    $ServicioPacienteTab = $_POST['ServiP'];
    //$insert = sprintf("INSERT INTO ExFisV3(idExFisV3,Talla,InfPaciente_idPaciente) VALUES ('".$idPaciente."','".$TallaP."','".$idPaciente."') ON DUPLICATE KEY UPDATE Talla='".$TallaP."'");
    $InsUpSVtalla = sprintf("CALL ExFisicoTalla('".$TallaP."','".$idPaciente."','".$ServicioPacienteTab."')");
    mysql_select_db($bd,$conexion);
    $resultado = mysql_query($InsUpSVtalla,$conexion)or die(mysql_error());
    //error_reporting(E_ALL);
    $id = mysql_insert_id();
    //echo 1;*/
    echo $resultado;
}
elseif ($opcion==='peso'){
    $PesoP = $_POST['cmpo'];
    $ServicioPacienteTab = $_POST['ServiP'];
    //$insert = sprintf("INSERT INTO ExFisV3(idExFisV3,Peso,InfPaciente_idPaciente) VALUES ('".$idPaciente."','".$PesoP."','".$idPaciente."') ON DUPLICATE KEY UPDATE Peso='".$PesoP."'");
    $InsUpSVpeso = sprintf("CALL ExFisicoPeso('".$PesoP."','".$idPaciente."','".$ServicioPacienteTab."')");
    mysql_select_db($bd,$conexion);
    $resultado = mysql_query($InsUpSVpeso,$conexion)or die(mysql_error());
    //error_reporting(E_ALL);
    $id = mysql_insert_id();
    //echo 1;*/
    echo $resultado;
}
elseif ($opcion==='NotExF'){
    $NotaExFisico = $_POST['cmpo'];
    $ServicioPacienteTab = $_POST['ServiP'];
    //$insert = sprintf("INSERT INTO ExFisV3(idExFisV3,NotaExFisico,InfPaciente_idPaciente,DescripcionServicio_idDescripcionServicio) VALUES ('".$idPaciente."','".$NotaExFisico."','".$idPaciente."','".$ServicioPacienteTab."') ON DUPLICATE KEY UPDATE NotaExFisico='".$NotaExFisico."'");
    $InsUpSVnota = sprintf("CALL ExFisicoNota('".$NotaExFisico."','".$idPaciente."','".$ServicioPacienteTab."')");
    mysql_select_db($bd,$conexion);
    $resultado = mysql_query($InsUpSVnota,$conexion)or die(mysql_error());
    //error_reporting(E_ALL);
    $id = mysql_insert_id();
    //echo 1;*/
    echo $resultado;
}
elseif ($opcion==='ImpC1'){
    $ImpresionClinic1 = $_POST['cmpo'];
    $NoImpresion = $_POST['NoImp'];
    $ServicioPacienteTab = $_POST['ServiP'];
    //$insert = sprintf("INSERT INTO ImpClinicaV3(DescripcionImpClinica,NoImp,InfPaciente_idPaciente,DescripcionServicio_idDescripcionServicio) VALUES ('".$ImpresionClinic1."','".$NoImpresion."','".$idPaciente."','".$ServicioPacienteTab."')");
    $InsUpImpC = sprintf("CALL ImpClinica('".$ImpresionClinic1."','".$NoImpresion."','".$idPaciente."','".$ServicioPacienteTab."')");
    mysql_select_db($bd,$conexion);
    $resultado = mysql_query($InsUpImpC,$conexion)or die(mysql_error());
    //error_reporting(E_ALL);
    $id = mysql_insert_id();
    //echo 1;*/
    echo $id;
}
elseif ($opcion==='CasoUrg'){
    $CasoUrgenteP = $_POST['Curgente'];
    $ServicioPacienteTab = $_POST['ServiP'];
    //$insert = sprintf("INSERT INTO TipoCasoV3(idTipoCasoV3,CasoUrgente,InfPaciente_idPaciente) VALUES ('".$idPaciente."','".$CasoUrgenteP."','".$idPaciente."') ON DUPLICATE KEY UPDATE CasoUrgente='".$CasoUrgenteP."'");
    $InsUpCasoUrg = sprintf("CALL InsertUpdateCasoUrg('".$CasoUrgenteP."','".$idPaciente."','".$ServicioPacienteTab."')");
    mysql_select_db($bd,$conexion);
    $resultado = mysql_query($InsUpCasoUrg,$conexion)or die(mysql_error());
    //error_reporting(E_ALL);
    $id = mysql_insert_id();
    //echo 1;*/
    echo $id;
}
elseif ($opcion==='NomMedG'){
    $DraResponsable = $_POST['cmpo'];
    $ServicioPacienteTab = $_POST['ServiP'];
    // $insert = sprintf("INSERT INTO MedInterResponsableV3(idMedInterResponsableV3,NombreMed,InfPaciente_idPaciente) VALUES ('".$idPaciente."','".$DraResponsable."','".$idPaciente."') ON DUPLICATE KEY UPDATE NombreMed='".$DraResponsable."'");
    $InsUpNmedico = sprintf("CALL InsertUpdateMedR('".$DraResponsable."','".$idPaciente."','".$ServicioPacienteTab."')");
    mysql_select_db($bd,$conexion);
    $resultado = mysql_query($InsUpNmedico,$conexion)or die(mysql_error());
    //error_reporting(E_ALL);
    $id = mysql_insert_id();
    //echo 1;*/
    echo $id;
}
elseif ($opcion==='NomInter'){
    $InterResp = $_POST['cmpo'];
    $ServicioPacienteTab = $_POST['ServiP'];
    // $insert = sprintf("INSERT INTO MedInterResponsableV3(idMedInterResponsableV3,NombreInterno,InfPaciente_idPaciente) VALUES ('".$idPaciente."','".$InterResp."','".$idPaciente."') ON DUPLICATE KEY UPDATE NombreInterno='".$InterResp."'");
    $InsUpNinter = sprintf("CALL InsertUpdateInterR('".$InterResp."','".$idPaciente."','".$ServicioPacienteTab."')");
    mysql_select_db($bd,$conexion);
    $resultado = mysql_query($InsUpNinter,$conexion)or die(mysql_error());
    //error_reporting(E_ALL);
    $id = mysql_insert_id();
    //echo 1;*/
    echo $id;
}
elseif ($opcion==='feEg'){
    $FechHoraEgreso = $_POST['cmpo'];
    $ServicioPacienteTab = $_POST['ServiP'];
    // $insert = sprintf("INSERT INTO EgresoV3(idEgresoV3,FechaHoraEgreso,InfPaciente_idPaciente) VALUES ('".$idPaciente."','".$FechHoraEgreso."','".$idPaciente."') ON DUPLICATE KEY UPDATE FechaHoraEgreso='".$FechHoraEgreso."'");
    $InsUpFechaEU = sprintf("CALL InsertUpdateEgreUFecha('".$FechHoraEgreso."','".$idPaciente."','".$ServicioPacienteTab."')");
    mysql_select_db($bd,$conexion);
    $resultado = mysql_query($InsUpFechaEU,$conexion)or die(mysql_error());
    //error_reporting(E_ALL);
    $id = mysql_insert_id();
    //echo 1;*/
    echo $id;
}
elseif ($opcion==='Hospitalizado'){
    $PacHopitalizado = $_POST['QuedoHospiP'];
    $ServicioPacienteTab = $_POST['ServiP'];

    // $ServiVariable = $_POST['IdServi'];
    $InsUpQuedoH = sprintf("CALL InsertUpdateEgreQuedoHospi('".$PacHopitalizado."','".$idPaciente."','".$ServicioPacienteTab."')");

    //$insert2 = sprintf("INSERT INTO EgresoV3(idEgresoV3,DescripcionServicio_idDescripcionServicio,InfPaciente_idPaciente) VALUES ('".$idPaciente."','".$ServiVariable."','".$idPaciente."') ON DUPLICATE KEY UPDATE DescripcionServicio_idDescripcionServicio='".$ServiVariable."'");
    mysql_select_db($bd,$conexion);
    $resultado2 = mysql_query($InsUpQuedoH,$conexion)or die(mysql_error());
    //error_reporting(E_ALL);
    $id = mysql_insert_id();
    //echo 1;*/
    echo $id;


}
elseif ($opcion==='SericioPaciente'){
    $ServicioUnidad = $_POST['ServUniPaciente'];
    $ServicioPacienteTab = $_POST['ServiP'];
    // $insert = sprintf("INSERT INTO EgresoV3(idEgresoV3,DescripcionServicio_idDescripcionServicio,InfPaciente_idPaciente) VALUES ('".$idPaciente."','".$ServicioPac."','".$idPaciente."') ON DUPLICATE KEY UPDATE DescripcionServicio_idDescripcionServicio='".$ServicioPac."'");
    $InsUpServUnP = sprintf("CALL InsertUpdateEgreServiUnidad('".$ServicioUnidad."','".$idPaciente."','".$ServicioPacienteTab."')");
    mysql_select_db($bd,$conexion);
    $resultado = mysql_query($InsUpServUnP,$conexion)or die(mysql_error());
    //error_reporting(E_ALL);
    $id = mysql_insert_id();
    //echo 1;*/
    echo $id;
}

elseif ($opcion==='NtaEnfermeria'){
    $idPac = $_POST['NoPaciente'];
    $Fecha = $_POST['FechaN'];
    $Numero = $_POST['NumN'];
    $Orden = $_POST['OrdeN'];
    $Evolucion = $_POST['EvolucionN'];
    $ServicioPacienteTab = $_POST['ServiP'];
    $insert = sprintf("INSERT INTO Ordenes(FechaHoraOrden, DescOrd, EvolucionOrd, NtasFinalesOrd, InfPaciente_idPaciente,DescripcionServicio_idDescripcionServicio) VALUES ('".$Fecha."','".$Numero."','".$Orden."','".$Evolucion."','".$idPac."','".$ServicioPacienteTab."')");
    // $InsUpServUnP = sprintf("CALL InsertOrden('".$Fecha."','".$Numero."','".$Orden."','".$Evolucion."','".$idPac.",'".$ServicioPacienteTab."')");
    mysql_select_db($bd,$conexion);
    $resultado = mysql_query($insert,$conexion)or die(mysql_error());
    //error_reporting(E_ALL);
    $id = mysql_insert_id();
    //echo 1;*/
    echo $id;
}

elseif ($opcion==='buscarPacienteEM'){
    $valor = $_POST['Bpaciente'];
    try {
        mysql_select_db($bd,$conexion);
        $query_services = mysql_query("SELECT idPaciente, PrimerNombreP,PrimerApeP FROM infpaciente WHERE PrimerNombreP like '".$valor."%'LIMIT 10");
        $return_arr = array();
        while ($row_services = mysql_fetch_array($query_services,MYSQL_NUM))
        {
            $return_arr[] =  $row_services;
        }
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
    echo json_encode($return_arr);
}
elseif ($opcion==='Ntaenfermeria'){
    $idPac = $_POST['NoPaciente'];
    $NombEnf = $_POST['NombEnf'];
    $NtaEnf = $_POST['Ntaenf'];
    $Turno = $_POST['TrnEn'];
    $ServicioPacienteTab = $_POST['ServiP'];

    $insert = sprintf("INSERT INTO Enfermeria(NomEnfer, NotaEnf, TurnoEnfermeria_idTurnoEnfermeria, InfPaciente_idPaciente,DescripcionServicio_idDescripcionServicio)VALUES ('".$NombEnf."','".$NtaEnf."','".$Turno."','".$idPac."','".$ServicioPacienteTab."')");
    mysql_select_db($bd,$conexion);
    $resultado = mysql_query($insert,$conexion)or die(mysql_error());
    //error_reporting(E_ALL);
    $id = mysql_insert_id();
    //echo 1;*/
    echo $id;
}
?>
