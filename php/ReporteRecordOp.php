<?php

require('../fpdf/fpdf.php');
include("conectar.php");
//$conexion=conectar();

class PDF extends FPDF
{
var $widths;
var $aligns;

function SetWidths($w)
{
	//Set the array of column widths
	$this->widths=$w;
}

function SetAligns($a)
{
	//Set the array of column alignments
	$this->aligns=$a;
}

function Row($data)
{
	//Calculate the height of the row
	$nb=0;
	for($i=0;$i<count($data);$i++)
		$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
	$h=5*$nb;
	//Issue a page break first if needed
	$this->CheckPageBreak($h);
	//Draw the cells of the row
	for($i=0;$i<count($data);$i++)
	{
		$w=$this->widths[$i];
		$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
		//Save the current position
		$x=$this->GetX();
		$y=$this->GetY();
		//Draw the border
		
		$this->Rect($x,$y,$w,$h);

		$this->MultiCell($w,5,$data[$i],0,$a,'true');
		//Put the position to the right of the cell
		$this->SetXY($x+$w,$y);
	}
	//Go to the next line
	$this->Ln($h);
}

function CheckPageBreak($h)
{
	//If the height h would cause an overflow, add a new page immediately
	if($this->GetY()+$h>$this->PageBreakTrigger)
		$this->AddPage($this->CurOrientation);
}

function NbLines($w,$txt)
{
	//Computes the number of lines a MultiCell of width w will take
	$cw=&$this->CurrentFont['cw'];
	if($w==0)
		$w=$this->w-$this->rMargin-$this->x;
	$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
	$s=str_replace("\r",'',$txt);
	$nb=strlen($s);
	if($nb>0 and $s[$nb-1]=="\n")
		$nb--;
	$sep=-1;
	$i=0;
	$j=0;
	$l=0;
	$nl=1;
	while($i<$nb)
	{
		$c=$s[$i];
		if($c=="\n")
		{
			$i++;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
			continue;
		}
		if($c==' ')
			$sep=$i;
		$l+=$cw[$c];
		if($l>$wmax)
		{
			if($sep==-1)
			{
				if($i==$j)
					$i++;
			}
			else
				$i=$sep+1;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
		}
		else
			$i++;
	}
	return $nl;
}

function Header()
{
    


	/*$strConsulta = "SELECT * FROM autoridadesnotif INNER JOIN MasterRecordOperatorio ON idMasterRecordOperatorio = AutoridadesNotif_idAutoridadesNotif 
	INNER JOIN  estadocivil ON EstadoCivil_idEstadoCivil = idEstadoCivil
    INNER JOIN  etnia ON Etnia_idEtnia = idEtnia
	AND idPaciente =  '$num'";	
	$Paciente = @mysql_query($strConsulta, $link);
	$fila = mysql_fetch_array($Paciente);*/

	//$this->Image('../imagenes/salud.png' , 18 ,12, 10 , 10,'PNG');
    //$this->Image('../imagenes/LogoCR_UVA.jpg' , 18 ,25, 10 , 10,'JPG');	
	$this->SetFont('Arial','',11);
	//$this->Text(10,15,utf8_decode('MINISTERIO DE SALUD PUBLICA Y ASISTENCIA SOCIAL'),0,1,'L');
	$this->SetFont('Arial','',11);
	//$this->Text(10,20,utf8_decode('HOSPITAL NACIONAL "JOSE FELIPE FLORES" DE TOTONICAPAN'),0,1,'L');
	/*$this->SetFont('helvetica','',9);
    $this->Text(150,19, utf8_decode('Ficha de Paciete No: ' ." ".utf8_decode($fila['CodigoFicha'])) ,0,'J');
    $this->Text(150,23, utf8_decode('Codigo de paciente: ' ." ".utf8_decode($fila['CodigoPaciente'])) ,0,'J');
    $this->Text(150,27, utf8_decode('Fecha de ingreso: ' ." ".utf8_decode($fila['FechaIngreso'])) ,0,'J');
    $this->Text(150,31, utf8_decode('Hora de ingreso: ' ." ".utf8_decode($fila['Hora'])) ,0,'J');*/

	$this->Ln();
	$this->Ln(15);
}

}

$num= $_GET['NoPaciente'];
	$link = @mysql_connect("localhost", "root", "NtSistema$");
    mysql_select_db("saber2", $link);
    $strConsulta = "SELECT * FROM DescripcionOperacion INNER JOIN MasterRecordOperatorio ON idMasterRecordOperatorio = MasterRecordOperatorio_idMasterRecordOperatorio
    INNER JOIN 	Cirujano ON Cirujano_idCirujano = idCirujano
    INNER JOIN Anestesiologos ON Anestesiologos_idAnestesiologos = idAnestesiologos
    INNER JOIN Departamento ON Departamento_idDepartamento = idDepartamento
    INNER JOIN ServicioUnidad ON ServicioUnidad_idServicioUnidad = idServicioUnidad
    INNER JOIN CamaCuna ON CamaCuna_idCamaCuna = idCamaCuna WHERE InfPaciente_idPaciente = '$num'";
    $Paciente = @mysql_query($strConsulta, $link);
	$fila = mysql_fetch_array($Paciente);

$InfBpaciente = "SELECT * FROM infpaciente WHERE  idPaciente =  '$num'";
     $InfBP = @mysql_query($InfBpaciente, $link);
     $filPaciente = mysql_fetch_array($InfBP);
    
        $Configura = "SELECT DecripcionOpePracticada FROM OpePracticada WHERE  InfPaciente_idPaciente =  '$num'";
     $consulta = @mysql_query ($Configura, $link);     
        $nConfig = mysql_num_rows($consulta); 
        $resp ='sin datos';           
        if ($nConfig > 0)  
        {  
            for ($i=0; $i<=4; $i++)  
            {  
                $verConfig = mysql_fetch_array($consulta);  
                $CargaConfig[$i] = $verConfig["DecripcionOpePracticada"];          
            }                       
        }
        /*else {
$pdf->SetXY(108, 39);
$pdf->SetFont('helvetica','',6);
$pdf->MultiCell(80,2, utf8_decode($resp),0,'J');	
}  
*/
    $pdf=new PDF('P','mm','letter');
	$pdf->Open();
	$pdf->AddPage();
	$pdf->SetMargins(10,10,10,5);
	//$pdf->Ln(15); 

    $pdf->SetFont('Arial','',11);
	$pdf->Text(10,15,utf8_decode('MINISTERIO DE SALUD PUBLICA Y ASISTENCIA SOCIAL'),0,1,'L');
	$pdf->SetFont('Arial','',11);
	$pdf->Text(10,20,utf8_decode('HOSPITAL NACIONAL "JOSE FELIPE FLORES" DE TOTONICAPAN'),0,1,'L');   

$pdf->Rect(10, 21, 98, 8, 'D');
//$pdf->Line(10, 10, 15, 15);
$pdf->SetXY(10, 23);
$pdf->SetFont('helvetica','',8);

$pdf->Cell(10, 0, 'Diagnostico Preoperatorio:', 0 , 1);
$pdf->SetXY(20, 120);
$pdf->SetFont('helvetica','',11);
$pdf->SetXY(10, 23);
$pdf->SetFont('helvetica','',9);	
$pdf->MultiCell(250,6, utf8_decode($fila['DiagnosticoPreoperatorio']) ,0,'J');
	
$pdf->SetXY(20, 105);
$pdf->Rect(108, 21, 98, 8, 'D');
$pdf->SetXY(108, 23);
$pdf->Cell(0, 0, utf8_decode('Operación Planeada:'), 0 , 1);
$pdf->SetXY(108, 23);
$pdf->SetFont('helvetica','',9);
$pdf->MultiCell(250,6, utf8_decode($fila['OperacionPlaneada']) ,0,'J');


$pdf->Rect(10, 29, 98, 16, 'D');
$pdf->SetXY(10, 31);
$pdf->SetFont('helvetica','',8);
$pdf->Cell(10, 0, 'Diagnostico Postoperatorio:', 0 , 1);
$pdf->SetXY(10, 32);
$pdf->SetFont('helvetica','',9);
$pdf->MultiCell(250,6, utf8_decode($fila['DiagnosticoPostoperatorio']) ,0,'J');


$pdf->Rect(108, 29, 98, 16, 'D');
$pdf->SetXY(108, 31);
$pdf->Cell(0, 0, utf8_decode('Operación Practicada:'), 0 , 1);
if(($CargaConfig[0]!="") and ($CargaConfig[1]!="") and ($CargaConfig[2]!="") and ($CargaConfig[3]!="") and ($CargaConfig[4]!="")){
$pdf->SetXY(108, 33);
$pdf->SetFont('helvetica','',7);
$pdf->MultiCell(80,2, utf8_decode($CargaConfig[0].", ".$CargaConfig[1]),0,'J');
$pdf->SetXY(108, 36);
$pdf->MultiCell(80,2, utf8_decode($CargaConfig[2].", ".$CargaConfig[3]),0,'J');
$pdf->SetXY(108, 39);
$pdf->MultiCell(80,2, utf8_decode($CargaConfig[4]),0,'J');
}
elseif (($CargaConfig[0]!="") and ($CargaConfig[1]!="") and ($CargaConfig[2]!="") and ($CargaConfig[3]!="")) {
	$pdf->SetXY(108, 33);
$pdf->SetFont('helvetica','',7);
$pdf->MultiCell(80,2, utf8_decode($CargaConfig[0].", ".$CargaConfig[1]),0,'J');
$pdf->SetXY(108, 35);
$pdf->MultiCell(80,2, utf8_decode($CargaConfig[2].", ".$CargaConfig[3]),0,'J');
}
elseif (($CargaConfig[0]!="") and ($CargaConfig[0]!="") and ($CargaConfig[2]!="")) {
	$pdf->SetXY(108, 33);
$pdf->SetFont('helvetica','',7);
$pdf->MultiCell(80,2, utf8_decode($CargaConfig[0].", ".$CargaConfig[1]),0,'J');
$pdf->SetXY(108, 35);
$pdf->MultiCell(80,2, utf8_decode($CargaConfig[2]),0,'J');
}
elseif (($CargaConfig[0]!="") and ($CargaConfig[1]!="")) {
	$pdf->SetXY(108, 33);
$pdf->SetFont('helvetica','',7);
$pdf->MultiCell(80,2, utf8_decode($CargaConfig[0].", ".$CargaConfig[1]),0,'J');
}
elseif ($CargaConfig[0]!="") {
	$pdf->SetXY(108, 33);
$pdf->SetFont('helvetica','',7);
$pdf->MultiCell(80,2, utf8_decode($CargaConfig[0]),0,'J');
}

//$pdf->SetXY(108, 42);
//$pdf->SetFont('helvetica','',6);
//$pdf->MultiCell(80,2, utf8_decode($CargaConfig[3].", ".$CargaConfig[4]),0,'J');


$pdf->Rect(10, 45, 70, 10, 'D');
$pdf->SetXY(10, 47);
$pdf->SetFont('helvetica','',8);
$pdf->Cell(10, 0, 'Cirujano:', 0 , 1);
$pdf->SetXY(10, 48);
$pdf->SetFont('helvetica','',9);
$pdf->MultiCell(250,6, utf8_decode($fila['NombreComleto']) ,0,'J');
//////////////////////////////////////
$pdf->Rect(80, 45, 126, 10, 'D');
$pdf->SetXY(80, 47);
$pdf->SetFont('helvetica','',8);
$pdf->Cell(0, 0, utf8_decode('Ayudante:'), 0 , 1);
$pdf->SetXY(80, 48);
$pdf->SetFont('helvetica','',9);
$pdf->MultiCell(250,6, utf8_decode($fila['Ayudante']) ,0,'J');
/////////////////////////////////
$pdf->Rect(10, 55, 49, 10, 'D');
$pdf->SetXY(10, 57);
$pdf->SetFont('helvetica','',8);
$pdf->Cell(0, 0, utf8_decode('Anestesista:'), 0 , 1);
$pdf->SetXY(10, 58);
$pdf->SetFont('helvetica','',9);
$pdf->MultiCell(250,6, utf8_decode($fila['NombreAnes']) ,0,'J');
////////////////////////////////////
$pdf->Rect(59, 55, 30, 10, 'D');
$pdf->SetXY(59, 57);
$pdf->Cell(0, 0, utf8_decode('Anestesia:'), 0 , 1);
$pdf->SetXY(59, 58);
$pdf->SetFont('helvetica','',9);
$pdf->MultiCell(250,6, utf8_decode($fila['Anes']) ,0,'J');
///////////////////////////////
$pdf->Rect(89, 55, 53, 10, 'D');
$pdf->SetXY(89, 57);
$pdf->Cell(0, 0, utf8_decode('Instrumentista:'), 0 , 1);
$pdf->SetXY(89, 58);
$pdf->SetFont('helvetica','',9);
$pdf->MultiCell(250,6, utf8_decode($fila['Instrumentista']) ,0,'J');
//////////////////////
$pdf->Rect(142, 55, 64, 10, 'D');
$pdf->SetXY(142, 57);
$pdf->SetFont('helvetica','',8);
$pdf->Cell(0, 0, utf8_decode('Circulante:'), 0 , 1);
$pdf->SetXY(142, 58);
$pdf->SetFont('helvetica','',9);
$pdf->MultiCell(250,6, utf8_decode($fila['Circulante']) ,0,'J');
///////////////////////////////
$pdf->Rect(10, 65, 30, 10, 'D');
$pdf->SetXY(10, 67);
$pdf->SetFont('helvetica','',8);
$pdf->Cell(0, 0, utf8_decode('Fecha:'), 0 , 1);
$pdf->SetXY(10, 68);
$pdf->SetFont('helvetica','',9);
$pdf->MultiCell(250,6, utf8_decode($fila['Fecha']) ,0,'J');
///////////////////////////////
$pdf->Rect(40, 65, 20, 10, 'D');
$pdf->SetXY(40, 67);
$pdf->SetFont('helvetica','',8);
$pdf->Cell(0, 0, utf8_decode('Hora Iniciada:'), 0 , 1);
$pdf->SetXY(40, 68);
$pdf->SetFont('helvetica','',9);
$pdf->MultiCell(250,6, utf8_decode($fila['HoraInicio']) ,0,'J');
///////////////////////////////
$pdf->Rect(60, 65, 22, 10, 'D');
$pdf->SetXY(60, 67);
$pdf->SetFont('helvetica','',8);
$pdf->Cell(0, 0, utf8_decode('Hora Finalizada:'), 0 , 1);
$pdf->SetXY(60, 68);
$pdf->SetFont('helvetica','',9);
$pdf->MultiCell(250,6, utf8_decode($fila['HoraFin']) ,0,'J');
///////////////////////////////
$pdf->Rect(82, 65, 35, 10, 'D');
$pdf->SetXY(82, 67);
$pdf->SetFont('helvetica','',8);
$pdf->Cell(0, 0, utf8_decode('Recuento de Compresas:'), 0 , 1);
$pdf->SetXY(82, 68);
$pdf->SetFont('helvetica','',9);
$pdf->MultiCell(250,6, utf8_decode($fila['RecCompresas']) ,0,'J');
///////////////////////////////
$pdf->Rect(117, 65, 35, 10, 'D');
$pdf->SetXY(117, 67);
$pdf->SetFont('helvetica','',8);
$pdf->Cell(0, 0, utf8_decode('Drenajes (No. Y tipo)'), 0 , 1);
$pdf->SetXY(117, 68);
$pdf->SetFont('helvetica','',9);
$pdf->MultiCell(250,6, utf8_decode($fila['Drenajes']) ,0,'J');
///////////////////////////////
$pdf->Rect(152, 65, 54, 10, 'D');
$pdf->SetXY(152, 67);
$pdf->SetFont('helvetica','',8);
$pdf->Cell(0, 0, utf8_decode('Piezas de evaluación Patológicas:'), 0 , 1);
$pdf->SetXY(152, 68);
$pdf->SetFont('helvetica','',9);
$pdf->MultiCell(250,6, utf8_decode($fila['PiezasEvaPatologicas']) ,0,'J');
///////////////////////////////
$pdf->Rect(10, 65, 196, 175, 'D');
$pdf->SetXY(10, 78);
$pdf->SetFont('helvetica','B',9);
$pdf->Cell(0, 0, utf8_decode('DESCRIPCIÓN DE LA OPERACIÓN'), 0 , 1);
$pdf->Ln();
$pdf->SetFont('helvetica','',8);
$pdf->Cell(0, 7, utf8_decode('(Posición, insición, operación praccticada, material de sutura, drenajes, complicaciones, condición del paciente al terminar la operación)'), 0 , 1);
$pdf->SetXY(10, 83);
$pdf->SetFont('helvetica','',9);
$pdf->MultiCell(195,6, utf8_decode($fila['DescripcionOperacion']) ,0,'J');
$pdf->SetXY(65, 229);
$pdf->SetFont('helvetica','',10);
$pdf->MultiCell(195,6, utf8_decode($fila['NombreComleto']) ,0,'J');
$pdf->SetXY(50, 233);
$pdf->SetFont('helvetica','',9);
$pdf->Cell(0, 0, utf8_decode('Nombre:__________________________________________Firma:_________________________________'), 0 , 1);
$pdf->SetXY(55, 237);
$pdf->SetFont('helvetica','',8);
$pdf->Cell(0, 0, utf8_decode('(CONTINUAR EN EL DORSO SI ES NECESARIO)'), 0 , 1);
////////////////////////////////
$pdf->Rect(10, 240, 35, 8, 'D');
$pdf->SetXY(10, 242);
$pdf->SetFont('helvetica','',8);
$pdf->Cell(0, 0, utf8_decode('Departamento:'), 0 , 1);
$pdf->SetXY(10, 242);
$pdf->SetFont('helvetica','',9);
$pdf->MultiCell(250,6, utf8_decode($fila['DescripcionDep']) ,0,'J');
////////////////////////////////
$pdf->Rect(45, 240, 35, 8, 'D');
$pdf->SetXY(45, 242);
$pdf->SetFont('helvetica','',8);
$pdf->Cell(0, 0, utf8_decode('Servicio o Unidad:'), 0 , 1);
$pdf->SetXY(45, 242);
$pdf->SetFont('helvetica','',9);
$pdf->MultiCell(250,6, utf8_decode($fila['DescripcionServ']) ,0,'J');
////////////////////////////////
$pdf->Rect(80, 240, 35, 8, 'D');
$pdf->SetXY(80, 242);
$pdf->SetFont('helvetica','',8);
$pdf->Cell(0, 0, utf8_decode('Cama o Cuna:'), 0 , 1);
$pdf->SetXY(80, 242);
$pdf->SetFont('helvetica','',9);
$pdf->MultiCell(250,6, utf8_decode($fila['DescripcionCamaCu']) ,0,'J');
///////////////////////////////
$pdf->Rect(115, 240, 91, 8, 'D');
$pdf->SetXY(115, 242);
$pdf->SetFont('helvetica','',8);
$pdf->Cell(0, 0, utf8_decode('Medico Jefe:'), 0 , 1);
$pdf->SetXY(115, 242);
$pdf->SetFont('helvetica','',9);
$pdf->MultiCell(250,6, utf8_decode($fila['NombreComleto']) ,0,'J');
///////////////////////////////
$pdf->Rect(10, 248, 150, 8, 'D');
$pdf->SetXY(10, 250);
$pdf->SetFont('helvetica','',8);
$pdf->Cell(0, 0, utf8_decode('1er. Apellido'), 0 , 1);
$pdf->SetXY(10, 250);
$pdf->SetFont('helvetica','',9);
$pdf->MultiCell(250,6, utf8_decode($filPaciente['PrimerApeP']) ,0,'J');
///////////////////////////////

$pdf->SetXY(35, 250);
$pdf->SetFont('helvetica','',8);
$pdf->Cell(0, 0, utf8_decode('2do. Apellido'), 0 , 1);
$pdf->SetXY(35, 250);
$pdf->SetFont('helvetica','',9);
$pdf->MultiCell(250,6, utf8_decode($filPaciente['SegundoApeP']) ,0,'J');
///////////////////////////////

$pdf->SetXY(60, 250);
$pdf->SetFont('helvetica','',8);
$pdf->Cell(0, 0, utf8_decode('De casada'), 0 , 1);
$pdf->SetXY(60, 250);
$pdf->SetFont('helvetica','',9);
$pdf->MultiCell(250,6, utf8_decode($filPaciente['ApellidoCasada']) ,0,'J');
///////////////////////////////
$pdf->SetXY(85, 250);
$pdf->SetFont('helvetica','',8);
$pdf->Cell(0, 0, utf8_decode('1er Nombre'), 0 , 1);
$pdf->SetXY(85, 250);
$pdf->SetFont('helvetica','',9);
$pdf->MultiCell(250,6, utf8_decode($filPaciente['PrimerNombreP']) ,0,'J');
///////////////////////////////
$pdf->SetXY(110, 250);
$pdf->SetFont('helvetica','',8);
$pdf->Cell(0, 0, utf8_decode('2do. Nombre'), 0 , 1);
$pdf->SetXY(110, 250);
$pdf->SetFont('helvetica','',9);
$pdf->MultiCell(250,6, utf8_decode($filPaciente['SegundoNombreP']) ,0,'J');
///////////////////////////////
$pdf->Rect(160, 248, 46, 8, 'D');
$pdf->SetXY(160, 250);
$pdf->SetFont('helvetica','',8);
$pdf->Cell(0, 0, utf8_decode('Registro Médico No.'), 0 , 1);
$pdf->SetXY(160, 250);
$pdf->SetFont('helvetica','',9);
$pdf->MultiCell(250,6, utf8_decode($fila['RegistroMedicoNo']) ,0,'J');
///////////////////////////////
$pdf->SetXY(140, 259);
$pdf->SetFont('helvetica','',15);
$pdf->Cell(0, 0, utf8_decode('REGISTRO OPERATORIO'), 0 , 1);
$pdf->AddPage();
                     
   //$pdf->SetXY(10, 260);  
$pdf->SetXY(75, 15);
$pdf->SetFont('helvetica','B',11);
$pdf->Cell(0, 0, utf8_decode('ESQUEMA DE LA OPERACIÓN'), 0 , 1);
$pdf->Rect(10, 10, 196, 260, 'D');

$pdf->Output();
?>