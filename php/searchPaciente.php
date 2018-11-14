<?php
header( 'Content-type: text/html; charset=iso-8859-1' );
//require('config.php');
require_once('conectar.php');
?>
<?php
$opcion= $_POST['opc'];
if ($opcion==='buscarPacienteEM'){
    $valor = $_POST['Bpaciente'];
    try {
        mysql_select_db($bd,$conexion);
        $query_services = mysql_query("SELECT * FROM infpaciente WHERE PrimerNombreP like '".$valor."%' or SegundoNombreP like '".$valor."%' or PrimerApeP like '".$valor."%' or SegundoApeP like '".$valor."%' or NoExpMedico like '".$valor."%' or FechaIngreso like '".$valor."%' or idPaciente like '".$valor."%' LIMIT 50");
        $return_arr = array();
        while ($row_services = mysql_fetch_array($query_services,MYSQL_NUM))
        {
            $return_arr[] =  $row_services;
        }

        $query_servicesT = mysql_query("SELECT * FROM traumainfpaciente WHERE PrimerNombreP like '".$valor."%' or SegundoNombreP like '".$valor."%' or PrimerApeP like '".$valor."%' or SegundoApeP like '".$valor."%' or NoExpMedico like '".$valor."%' or FechaIngreso like '".$valor."%' or idPaciente like '".$valor."%' LIMIT 50");
        $return_arrT = array();
        while ($row_servicesT = mysql_fetch_array($query_servicesT,MYSQL_NUM))
        {
            $return_arrT[] =  $row_servicesT;
        }

        $query_servicesC = mysql_query("SELECT * FROM ciruinfpaciente WHERE PrimerNombreP like '".$valor."%' or SegundoNombreP like '".$valor."%' or PrimerApeP like '".$valor."%' or SegundoApeP like '".$valor."%' or NoExpMedico like '".$valor."%' or FechaIngreso like '".$valor."%' or idPaciente like '".$valor."%' LIMIT 50");
        $return_arrC = array();
        while ($row_servicesC = mysql_fetch_array($query_servicesC,MYSQL_NUM))
        {
            $return_arrC[] =  $row_servicesC;
        }

        $query_servicesA = mysql_query("SELECT * FROM atenvicinfpaciente WHERE PrimerNombreP like '".$valor."%' or SegundoNombreP like '".$valor."%' or PrimerApeP like '".$valor."%' or SegundoApeP like '".$valor."%' or NoExpMedico like '".$valor."%' or FechaIngreso like '".$valor."%' or idPaciente like '".$valor."%' LIMIT 50");
        $return_arrA = array();
        while ($row_servicesA = mysql_fetch_array($query_servicesA,MYSQL_NUM))
        {
            $return_arrA[] =  $row_servicesA;
        }


        $query_servicesP = mysql_query("SELECT * FROM pediainfpaciente WHERE PrimerNombreP like '".$valor."%' or SegundoNombreP like '".$valor."%' or PrimerApeP like '".$valor."%' or SegundoApeP like '".$valor."%' or NoExpMedico like '".$valor."%' or FechaIngreso like '".$valor."%' or idPaciente like '".$valor."%' LIMIT 50");
        $return_arrP = array();
        while ($row_servicesP = mysql_fetch_array($query_servicesP,MYSQL_NUM))
        {
            $return_arrP[] =  $row_servicesP;
        }






        $resultadoJson = array_merge($return_arr,$return_arrT,$return_arrC,$return_arrA,$return_arrP);

    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
    echo json_encode($resultadoJson);
//echo json_encode($return_arrT);

}
elseif ($opcion==='buscarMotIngreso'){
    $idPaciente = $_POST['idPac'];
    try {
        mysql_select_db($bd, $conexion);
        $query_services = mysql_query("SELECT * FROM motingresoarcuv3 WHERE InfPaciente_idPaciente = '$idPaciente'");
        $return_arr = array();
        while ($row_services = mysql_fetch_array($query_services, MYSQL_NUM)) {
            $return_arr[] = $row_services;
        }
    }catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
    echo json_encode($return_arr);
}
elseif ($opcion==='buscarExFisicoV3'){
    $idPaciente = $_POST['idPac'];
    try {
        mysql_select_db($bd, $conexion);
        $query_services = mysql_query("SELECT * FROM exfisv3 WHERE InfPaciente_idPaciente = '$idPaciente'");
        $return_arr = array();
        while ($row_services = mysql_fetch_array($query_services, MYSQL_NUM)) {
            $return_arr[] = $row_services;
        }
    }catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
    echo json_encode($return_arr);
}
elseif ($opcion==='SvitalesV3'){
    $idPaciente = $_POST['idPac'];
    try {
        mysql_select_db($bd, $conexion);
        $query_services = mysql_query("SELECT * FROM signosvitalesexfisv3 WHERE InfPaciente_idPaciente = '$idPaciente'");
        $return_arr = array();
        while ($row_services = mysql_fetch_array($query_services, MYSQL_NUM)) {
            $return_arr[] = $row_services;
        }
    }catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
    echo json_encode($return_arr);
}
elseif ($opcion==='SiCv3'){
    $idPaciente = $_POST['idPac'];
    try {
        mysql_select_db($bd, $conexion);
        $query_services = mysql_query("SELECT DescripcionImpClinica FROM impclinicav3 WHERE InfPaciente_idPaciente = '$idPaciente' LIMIT 4");
        $return_arr = array();
        while ($row_services = mysql_fetch_array($query_services, MYSQL_NUM)) {
            $return_arr[] = $row_services;
        }
    }catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }

    echo json_encode($return_arr);
}
elseif ($opcion==='StipoCaso'){
    $idPaciente = $_POST['idPac'];
    try {
        mysql_select_db($bd, $conexion);
        $query_services = mysql_query("SELECT * FROM tipocasov3 WHERE InfPaciente_idPaciente = '$idPaciente'");
        $return_arr = array();
        while ($row_services = mysql_fetch_array($query_services, MYSQL_NUM)) {
            $return_arr[] = $row_services;
        }
    }catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
    echo json_encode($return_arr);
}
elseif ($opcion==='SMedicoRes'){
    $idPaciente = $_POST['idPac'];
    try {
        mysql_select_db($bd, $conexion);
        $query_services = mysql_query("SELECT * FROM medinterresponsablev3 WHERE InfPaciente_idPaciente = '$idPaciente'");
        $return_arr = array();
        while ($row_services = mysql_fetch_array($query_services, MYSQL_NUM)) {
            $return_arr[] = $row_services;
        }
    }catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
    echo json_encode($return_arr);
}
elseif ($opcion==='SegresoV3'){
    $idPaciente = $_POST['idPac'];
    try {
        mysql_select_db($bd, $conexion);
        $query_services = mysql_query("SELECT * FROM egresov3 WHERE InfPaciente_idPaciente = '$idPaciente'");
        $return_arr = array();
        while ($row_services = mysql_fetch_array($query_services, MYSQL_NUM)) {
            $return_arr[] = $row_services;
        }
    }catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
    echo json_encode($return_arr);
}

elseif ($opcion==='SOrdenEnfV3'){
    $idPaciente = $_POST['idPac'];
    try {
        mysql_select_db($bd, $conexion);
        $query_services = mysql_query("SELECT * FROM ordenes WHERE InfPaciente_idPaciente = '$idPaciente'" );
        $return_arr = array();
        while ($row_services = mysql_fetch_array($query_services, MYSQL_NUM)) {
            $return_arr[] = $row_services;
        }
    }catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
    echo json_encode($return_arr);
}

elseif ($opcion==='SNotasE'){
    $idPaciente = $_POST['idPac'];
    try {
        mysql_select_db($bd, $conexion);
        $query_services = mysql_query("SELECT * FROM Enfermeria WHERE InfPaciente_idPaciente = '$idPaciente'");
        $return_arr = array();
        while ($row_services = mysql_fetch_array($query_services, MYSQL_NUM)) {
            $return_arr[] = $row_services;
        }
    }catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
    echo json_encode($return_arr);
}

?>