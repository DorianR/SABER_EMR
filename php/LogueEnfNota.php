<?php
header( 'Content-type: text/html; charset=iso-8859-1' );
//require('config.php');
require_once('conectar.php');
?>
<?php

$Usr = $_POST['Usuario'];
$Pass = $_POST['Contrasenia'];
$TipoUsr = '3';
try {

    $conexion = new mysqli("localhost", "root", "NtSistema$", "saber2");
    $consulta = "select * from Login where User = '$Usr';";

    $result = $conexion->query($consulta);

    if ($result->num_rows > 0) {
        $fila = $result->fetch_assoc();
        $dbHash = $fila["Pass"];
        if (crypt($Pass, $dbHash) == $dbHash AND strcmp($TipoUsr, $fila["TipoUsuario_idTipoUsuario"]) == 0)
            $respon = 1;
        else
            $respon = 2;
    }
}
catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
echo json_encode($respon);

?>