<HTML>
<head>
            <link rel="stylesheet" type="text/css" href="../css/jquery.fancybox.css" />   
            <script  src="../js/jquery-1.12.3.min.js"></script>
            <script type="text/javascript" src="../js/jquery.fancybox.pack.js"></script>       
<script type="text/javascript">  
$(document).ready(function(){  
    $(".ejemplo_1").fancybox({ });  
});  
</script>            
</head>
<body>
<?php


require_once('../conexion/conectar.php'); 
$NoPac = $_GET['NoPaciente'];
$descripcion = $_GET['desc'];


$foto = date('Y-m-d').date('H-i-s').trim($_FILES['foto']['name']);

$ingresar = sprintf("INSERT INTO ImgDir (InfPaciente_idPaciente,desc_img,ruta_img)VALUES('".$NoPac."','".$descripcion."','".$foto."')");
mysql_select_db($bd,$conexion);
$resultado = mysql_query($ingresar,$conexion)or die(mysql_error());
move_uploaded_file($_FILES['foto']['tmp_name'], '../ImagenesPac/'.$foto);

$subida = mysql_query("SELECT * FROM ImgDir ORDER BY idImgDir DESC LIMIT 1");


while($subida2 = mysql_fetch_array($subida)){

	echo '<lu>
				<a class="ejemplo_1" href="../ImagenesPac/'.$subida2['ruta_img'].'" target="_blank" ><img src="../ImagenesPac/'.$subida2['ruta_img'].'" class="img-subida"  title="'.$subida2['desc_img'].'"></a>
			 </lu></br>' ;

}

?>
</body>
</HTML>