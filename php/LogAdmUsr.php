<?php
header( 'Content-type: text/html; charset=iso-8859-1' );
//require('config.php');
require_once('conectar.php');


$Usr = $_POST['Usuario'];
$Pass = $_POST['Contrasenia'];

try {
    mysql_select_db($bd, $conexion);
    $query_services = mysql_query("SELECT * FROM login WHERE User = '$Usr' AND Pass = '$Pass'");
    $return_arr = array();
    while ($row_services = mysql_fetch_array($query_services, MYSQL_NUM)) {
        $return_arr[] = $row_services;
    }

}catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
if (empty($return_arr[0])){
   // $return_arr[0] = 'error';
    $responseP ='3';
    echo json_encode($responseP);
}else{
echo json_encode($return_arr);
}

?>