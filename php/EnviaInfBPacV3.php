<?php
require_once('../conexion/conectar.php');
?>
<?php
$OpcionPaciente = $_POST['opcP'];
$ServAtencion = $_POST['ServAtendido'];
// if ($OpcionPaciente==='GuardarP' && $ServAtencion==2){
if ($OpcionPaciente==='GuardarP'){

    $InfPaciente_idPaciente = $_POST['idPaciente'];
    $PrimerApe = $_POST['PrApe'];
    $SegApe = $_POST['SeApe'];
    $DeCasada = $_POST['DeCas'];
    $PrimerNom = $_POST['PrNom'];
    $SegundoNom = $_POST['SeNom'];
    $ExMedico = $_POST['ExpMedico'];
    $SexoP = $_POST['Sex'];
    $EdadP = $_POST['Eda'];
    $EstadoCiv = $_POST['EstCiv'];
    $OcupacionP = $_POST['OcuP'];
    $PagoIgssP = $_POST['PagIg'];
    $DirecP = $_POST['ProcedeDire'];
    $TelefonoP = $_POST['Tel'];
    $FechaLLenado = $_POST['FechaIniLLenado'];
    $ServAten = $_POST['ServAtendido'];
    $PersonaIngInfo = $_POST['PerIngInfo'];
    $Etnia = 5;
    $AutoridadesNoti = 1;
    $ModoArr = 7;
    $TablaInsertar = $_POST['TablaNombreP'];

    $insert = sprintf("INSERT INTO  $TablaInsertar (PrimerApeP,SegundoApeP,ApellidoCasada,PrimerNombreP,SegundoNombreP,NoExpMedico,Sexo,AniosP,Ocupacion,PagoIgss,Direccion,Telefono,FechaIngreso,PersonalIngInfo_idPersonalIngInfo,EstadoCivil_idEstadoCivil,Etnia_idEtnia,AutoridadesNotif_idAutoridadesNotif,ModoArrivo_idModoArrivo,DescripcionServicio_idDescripcionServicio) 
   	VALUES ('" . $PrimerApe . "','" . $SegApe . "','" . $DeCasada . "','" . $PrimerNom . "','" . $SegundoNom . "','" . $ExMedico . "','" . $SexoP . "','" . $EdadP . "','" . $OcupacionP . "','" . $PagoIgssP . "','" . $DirecP . "','" . $TelefonoP . "','" . $FechaLLenado . "','" . $PersonaIngInfo . "','" . $EstadoCiv . "','" . $Etnia . "','" . $AutoridadesNoti . "','" . $ModoArr . "','" . $ServAten ."')");
    mysql_select_db($bd, $conexion);
    $resultado = mysql_query($insert, $conexion) or die(mysql_error());
    $id = mysql_insert_id();

    echo $id;

}
/*
elseif ($OpcionPaciente==='ModificarP'){
    $InfPaciente_idPaciente = $_POST['idPaciente'];
    $PrimerApe = $_POST['PrApe'];
    $SegApe = $_POST['SeApe'];
    $DeCasada = $_POST['DeCas'];
    $PrimerNom = $_POST['PrNom'];
    $SegundoNom = $_POST['SeNom'];
    $ExMedico = $_POST['ExpMedico'];
    $SexoP = $_POST['Sex'];
    $EdadP = $_POST['Eda'];
    $EstadoCiv = $_POST['EstCiv'];
    $OcupacionP = $_POST['OcuP'];
    $PagoIgssP = $_POST['PagIg'];
    $DirecP = $_POST['ProcedeDire'];
    $TelefonoP = $_POST['Tel'];
    $FechaLLenado = $_POST['FechaIniLLenado'];
    $ServAten = $_POST['ServAtendido'];
    $PersonaIngInfo = $_POST['PerIngInfo'];
    $Etnia = 5;
    $AutoridadesNoti = 1;
    $ModoArr = 7;
    $TablaUpdate = $_POST['TablaNombreP'];

    $Actualizar = sprintf("UPDATE $TablaUpdate set PrimerApeP ='$PrimerApe',SegundoApeP='$SegApe',ApellidoCasada='$DeCasada',PrimerNombreP='$PrimerNom',SegundoNombreP='$SegundoNom',NoExpMedico='$ExMedico',Sexo='$SexoP',AniosP='$EdadP',Ocupacion='$OcupacionP',PagoIgss='$PagoIgssP',Direccion='$DirecP',Telefono='$TelefonoP',FechaIngreso='$FechaLLenado',PersonalIngInfo_idPersonalIngInfo='$PersonaIngInfo',EstadoCivil_idEstadoCivil='$EstadoCiv',Etnia_idEtnia='$Etnia',AutoridadesNotif_idAutoridadesNotif='$AutoridadesNoti',ModoArrivo_idModoArrivo='$ModoArr',DescripcionServicio_idDescripcionServicio='$ServAten' WHERE idPaciente='$InfPaciente_idPaciente'");
    mysql_select_db($bd, $conexion);
    $resultado = mysql_query($Actualizar, $conexion) or die(mysql_error());
    $id = mysql_insert_id();
    //echo 1;
    echo $id;
}
?>*/
elseif ($OpcionPaciente==='ModificarP'){
    $InfPaciente_idPaciente = $_POST['idPaciente'];
    $PrimerApe = $_POST['PrApe'];
    $SegApe = $_POST['SeApe'];
    $DeCasada = $_POST['DeCas'];
    $PrimerNom = $_POST['PrNom'];
    $SegundoNom = $_POST['SeNom'];
    $ExMedico = $_POST['ExpMedico'];
    $SexoP = $_POST['Sex'];
    $EdadP = $_POST['Eda'];
    $EstadoCiv = $_POST['EstCiv'];
    $OcupacionP = $_POST['OcuP'];
    $PagoIgssP = $_POST['PagIg'];
    $DirecP = $_POST['ProcedeDire'];
    $TelefonoP = $_POST['Tel'];
    $FechaLLenado = $_POST['FechaIniLLenado'];
    $ServAten = $_POST['ServAtendido'];
    $PersonaIngInfo = $_POST['PerIngInfo'];
    $Etnia = 5;
    $AutoridadesNoti = 1;
    $ModoArr = 7;
    $TablaUpdate = $_POST['TablaNombreP'];

    $Actualizar = sprintf("UPDATE $TablaUpdate set PrimerApeP ='$PrimerApe',SegundoApeP='$SegApe',ApellidoCasada='$DeCasada',PrimerNombreP='$PrimerNom',SegundoNombreP='$SegundoNom',NoExpMedico='$ExMedico',Sexo='$SexoP',AniosP='$EdadP',Ocupacion='$OcupacionP',PagoIgss='$PagoIgssP',Direccion='$DirecP',Telefono='$TelefonoP',FechaIngreso='$FechaLLenado',PersonalIngInfo_idPersonalIngInfo='$PersonaIngInfo',EstadoCivil_idEstadoCivil='$EstadoCiv',Etnia_idEtnia='$Etnia',AutoridadesNotif_idAutoridadesNotif='$AutoridadesNoti',ModoArrivo_idModoArrivo='$ModoArr',DescripcionServicio_idDescripcionServicio='$ServAten' WHERE idPaciente='$InfPaciente_idPaciente'");
    mysql_select_db($bd, $conexion);
    $resultado = mysql_query($Actualizar, $conexion) or die(mysql_error());

    echo $InfPaciente_idPaciente;
}
?>