<?php
require_once('../conexion/conectar.php');
?>

<?php

if (isset($_POST['IdPac'])){
    $FechaOrd = $_POST['FechaOrd'];
    $OrdenP = $_POST['OrdenP'];
    $EvPa = $_POST['EvoP'];
    $NtaOrdPa = $_POST['NotaFinal'];
    $InfPaciente_idPaciente = $_POST['IdPac'];



    $Actualizar = sprintf("UPDATE ordenes set FechaHoraOrden='$FechaOrd',DescOrd='$OrdenP',EvolucionOrd='$EvPa',NtasFinalesOrd='$NtaOrdPa'  WHERE InfPaciente_idPaciente='$InfPaciente_idPaciente'");
    mysql_select_db($bd,$conexion);

    $resultado = mysql_query($Actualizar,$conexion)or die(mysql_error());
    error_reporting(E_ALL);
    $id = mysql_insert_id();
    //echo 1;
    //echo $id;
}
?>