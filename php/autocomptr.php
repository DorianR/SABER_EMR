<?php
header( 'Content-type: text/html; charset=iso-8859-1' );
//require('config.php');
require_once('../conexion/conectar.php');
?>

<?php
$opcion = $_POST['opc'];
if ($opcion==='buscarOpeP'){

$search = $_POST['service'];
    mysql_select_db($bd,$conexion);
$query_services = mysql_query("SELECT idOpePracticada, DecripcionOpePracticada FROM OpePracticada WHERE DecripcionOpePracticada like '".$search."%'",$conexion);
while ($row_services = mysql_fetch_array($query_services)) 
{
	echo '<div class="suggest-element"><a data="'.$row_services['DecripcionOpePracticada'].'" id="service'.$row_services['idOpePracticada'].'">'.utf8_encode($row_services['DecripcionOpePracticada']).'</a></div>';
   
}
}
elseif ($opcion==='buscarOcupacion') {
    $search = $_POST['ocuP'];
    mysql_select_db($bd, $conexion);
    $query_services = mysql_query("SELECT idPaciente, Ocupacion FROM InfPaciente WHERE Ocupacion like '" . $search . "%' LIMIT 10", $conexion);
    while ($row_services = mysql_fetch_array($query_services)) {
        echo '<div class="suggest-element"><a data="' . $row_services['Ocupacion'] . '" id="OcupacionPac' . $row_services['idPaciente'] . '">' . utf8_encode($row_services['Ocupacion']) . '</a></div>';
    }
}
elseif ($opcion==='ImpresonC1p') {
    $search = $_POST['ImpresionC1'];
    mysql_select_db($bd, $conexion);
    $query_services = mysql_query("SELECT idImpClinicaV3, DescripcionImpClinica FROM ImpClinicaV3 WHERE DescripcionImpClinica like '" . $search . "%' LIMIT 10", $conexion);
    while ($row_services = mysql_fetch_array($query_services)) {
        echo '<div class="suggest-element"><a data="' . $row_services['DescripcionImpClinica'] . '" id="id-' . $row_services['idImpClinicaV3'] . '">' . utf8_encode($row_services['DescripcionImpClinica']) . '</a></div>';
    }
}


?>

