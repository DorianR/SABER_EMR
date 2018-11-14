<?php 
require_once('../conexion/conectar.php'); 
?>

<?php 

  if (isset($_POST['NombreCompleto'])){
                          
                 $NomCompleto = $_POST['NombreCompleto'];
                 $Tel = $_POST['Telefono'];
                 $Direcc = $_POST['Direccion']; 
                 $Especialidad = $_POST['Especialidad'];
                 
   $insert = sprintf("INSERT INTO Cirujano(NombreComleto,Telefono,Direccion,Especialidad) 
   	VALUES ('".$NomCompleto."','".$Tel."','".$Direcc."','".$Especialidad."')");
	
    mysql_select_db($bd,$conexion);

	$resultado = mysql_query($insert,$conexion)or die(mysql_error());
	echo $resultado;
    }
?>