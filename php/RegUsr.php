<?php
require_once('../conexion/conectar.php');
?>

<?php
$opcion= $_POST['opc'];


if ($opcion==='InsNwUser'){
    $PnombreU = $_POST['Nombre'];
    $SnombreU = $_POST['Snombre'];
    $ApellidosU = $_POST['Apellidos'];
    $EdadU = $_POST['Edad'];
    $CorreoU = $_POST['Correo'];
    $TelefonoU = $_POST['Telefono'];
    $CargoU = $_POST['Cargo'];

    $insert = sprintf("INSERT INTO PersonalIngInfo(PrimerNombre,SegundoNombre,PrimerApellido,Edad,Email,Telefono,CargoEnHospital_idCargoEnHospital) 
   	VALUES ('" . $PnombreU . "','" . $SnombreU . "','" . $ApellidosU . "','" . $EdadU . "','" . $CorreoU . "','" . $TelefonoU . "','" . $CargoU . "')");
    mysql_select_db($bd, $conexion);
    $resultado = mysql_query($insert, $conexion) or die(mysql_error());
//error_reporting(E_ALL);
    $id = mysql_insert_id();
    //echo 1;
    echo $id;

}
if ($opcion==='UsrLog'){

    $tipoUsr = $_POST['Tusr'];
    $LoginUsr = $_POST['LogU'];
    $PassUsr = $_POST['PasU'];
    $IdUsr = $_POST['IdUsr'];

    $salt = substr(base64_encode(openssl_random_pseudo_bytes('30')), 0, 22);
    $salt = strtr($salt, array('+' => '.'));
    $hash = crypt($PassUsr, '$2y$10$' . $salt);
    $insert = sprintf("INSERT INTO Login(User,Pass,TipoUsuario_idTipoUsuario,PersonalIngInfo_idPersonalIngInfo) 
   	VALUES ('" . $LoginUsr . "','" . $hash . "','" . $tipoUsr . "','" . $IdUsr . "')");
    mysql_select_db($bd, $conexion);
    $resultado = mysql_query($insert, $conexion) or die(mysql_error());
//error_reporting(E_ALL);
    $id = mysql_insert_id();
    //echo 1;
    echo $id;

}

?>