<?php
header( 'Content-type: text/html; charset=iso-8859-1' );
//require('config.php');
require_once('conectar.php');
?>
<?php
if (isset($_GET['term'])){
    $return_arr = array();
    try {
        mysql_select_db($bd,$conexion);
        $query_services = mysql_query("SELECT Direccion FROM infpaciente WHERE Direccion like '".$_GET['term']."%' LIMIT 10");
        while ($row_services = mysql_fetch_array($query_services))
        {
            $return_arr[] =  $row_services['Direccion'];

        }
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
    echo json_encode($return_arr);
}
?>