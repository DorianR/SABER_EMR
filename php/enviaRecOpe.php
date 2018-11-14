<?php 
require_once('../conexion/conectar.php'); 
?>

<?php 

  if (isset($_POST['DiagPreOpe'])){
                $NoPaciente = $_POST['NoPaciente']; 
               //$NoPaciente = 1; 
                 $RegMedNo = $_POST['RegMedNo'];          
                 $DiagPreOpe = $_POST['DiagPreOpe'];
                 $OpePlaneada = $_POST['OpePlaneada'];
                 $DiagPostOPe = $_POST['DiagPostOPe'];            
                 //$OpePracticade = $_POST['OpePracticade'];
                 $CirujanOp = $_POST['CirujanOp'];
                 $ayudante = $_POST['ayudante']; 
                 $AnestOp = $_POST['AnestOp'];
                 $Anestesia = $_POST['Anestesia'];
                 $Instrumen =$_POST['Instrumen'];
                 $Circulant = $_POST['Circulant'];
                 $FechaOpe = $_POST['FechaOpe'];
                 $HoraIniciOpe = $_POST['HoraIniciOpe'];
                 $HoraFinOpe = $_POST['HoraFinOpe'];
                 $ReCompresas = $_POST['ReCompresas'];
                 $Drenajes = $_POST['Drenajes'];
                 $PiezasEvaPat = $_POST['PiezasEvaPat'];
                 $DescOperacion = $_POST['DescOperacion'];
                 $DepaOp = $_POST['DepaOp'];
                 $ServiUniOp = $_POST['ServiUniOp'];
                 $CamaCunaOp = $_POST['CamaCunaOp'];
                 $MedJefe = $_POST['MedJefe'];
                 echo $NoPaciente;
                 echo $CirujanOp;
                 echo $OpePlaneada;
   $insert = sprintf("INSERT INTO masterrecordoperatorio(DiagnosticoPreoperatorio,DiagnosticoPostoperatorio,OperacionPlaneada,Cirujano_idCirujano,Ayudante,Anestesiologos_idAnestesiologos,Anes,Instrumentista,Circulante,Fecha,HoraInicio,HoraFin,RecCompresas,Drenajes,PiezasEvaPatologicas,Departamento_idDepartamento,ServicioUnidad_idServicioUnidad,CamaCuna_idCamaCuna,MedicoJefe,InfPaciente_idPaciente,RegistroMedicoNo) 
   	VALUES ('".$DiagPreOpe."','".$DiagPostOPe."','".$OpePlaneada."','".$CirujanOp."','".$ayudante."','".$AnestOp."','".$Anestesia."','".$Instrumen."','".$Circulant."','".$FechaOpe."','".$HoraIniciOpe."','".$HoraFinOpe."','".$ReCompresas."','".$Drenajes."','".$PiezasEvaPat."','".$DepaOp."','".$ServiUniOp."','".$CamaCunaOp."','".$MedJefe."','".$NoPaciente."','".$RegMedNo."')");
	
    mysql_select_db($bd,$conexion);

	$resultado = mysql_query($insert,$conexion)or die(mysql_error());
	//echo 1;
	echo $resultado;
    $idRecOpeDespcipcion = mysql_insert_id();    
    $insert2 = sprintf("INSERT INTO DescripcionOperacion(DescripcionOperacion,MasterRecordOperatorio_idMasterRecordOperatorio) VALUES ('".$DescOperacion."','".$idRecOpeDespcipcion."')");
    mysql_select_db($bd,$conexion);

	$resultado2 = mysql_query($insert2,$conexion)or die(mysql_error());
    //$id = mysql_insert_id();
	//echo 1
	
    }
?>