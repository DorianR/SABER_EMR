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
    $num= $_GET['NoPaciente'];
	$link = @mysql_connect("localhost", "root", "NtSistema$");
    mysql_select_db("saber2", $link);
	$strConsulta = "SELECT * FROM autoridadesnotif INNER JOIN infpaciente ON idAutoridadesNotif = AutoridadesNotif_idAutoridadesNotif 
	INNER JOIN  estadocivil ON EstadoCivil_idEstadoCivil = idEstadoCivil
    INNER JOIN  etnia ON Etnia_idEtnia = idEtnia
	AND idPaciente =  '$num'";	
	$Paciente = @mysql_query($strConsulta, $link);
	$fila = mysql_fetch_array($Paciente);

	$this->Image('../imagenes/LogoSalud.jpeg' , 15 ,12, 25 , 25,'JPG');
	$this->SetFont('Arial','',11);
	$this->Text(57,22,utf8_decode('MINISTERIO DE SALUD PUBLICA Y ASISTENCIA SOCIAL'),0,'C', 0);
	$this->SetFont('Arial','',11);
	$this->Text(63,27,utf8_decode('HOSPITAL DEPARTAMENTAL DE TOTONICAPAN'),0,'C', 0);
    $this->SetFont('Arial','',11);
	$this->Text(80,33,utf8_decode('TOTONICAPAN, GUATEMALA'),0,'C', 0);
	$this->SetFont('helvetica','',25);
    $this->Text(170,25, utf8_decode('' ." ".utf8_decode($fila['CodigoFicha'])) ,0,'J');
	$this->Ln();
	$this->Ln(15);
}

}
$num= $_GET['NoPaciente'];
//$num = 3;
$link = @mysql_connect("localhost", "root", "NtSistema$");
mysql_select_db("saber2", $link);
	$strConsulta = "SELECT * FROM autoridadesnotif INNER JOIN infpaciente ON idAutoridadesNotif = AutoridadesNotif_idAutoridadesNotif 
	INNER JOIN  estadocivil ON EstadoCivil_idEstadoCivil = idEstadoCivil
    INNER JOIN  etnia ON Etnia_idEtnia = idEtnia
	AND idPaciente =  '$num'";	
	$Paciente = @mysql_query($strConsulta, $link);
	$fila = @mysql_fetch_array($Paciente);
//------------MOTIVO DE INGRESO---------
   /* $strConsultaMotIngreso = "SELECT * FROM
     motingresoarcuv3 INNER JOIN  infpaciente ON idPaciente = 	InfPaciente_idPaciente
     AND idPaciente =  '$num'";
     $trMotIngreso = @mysql_query($strConsultaMotIngreso, $link);
     $filaMotIngreso = @mysql_fetch_array($trMotIngreso);*/

$strConsultaMotIngreso = "SELECT * FROM motingresoarcuv3 WHERE InfPaciente_idPaciente = '$num'";
$trMotIngreso = @mysql_query($strConsultaMotIngreso, $link);
$filaMotIngreso = mysql_fetch_array($trMotIngreso);


    //------------ FINAL MOTIVO DE INGRESO---------

//------------MEDICOS DE GUARDIA---------

$strConsultaMedicos = "SELECT * FROM medinterresponsablev3 WHERE InfPaciente_idPaciente =  '$num'";
$trMedicos = @mysql_query($strConsultaMedicos, $link);
$filaMedicos = mysql_fetch_array($trMedicos);

    //------------ FINAL MEDICOS DE GUARDIA---------

//------------EGRESO---------
    $strConsultaEgreso = "SELECT * FROM
     egreso INNER JOIN  infpaciente ON idPaciente = 	InfPaciente_idPaciente
     AND idPaciente =  '$num'";
     $trEgreso = @mysql_query($strConsultaEgreso, $link);
     $filaEgreso = @mysql_fetch_array($trEgreso);
    //------------ FINAL EGRESO---------

$strConsultaServicio = "SELECT * FROM egresov3 INNER JOIN descripcionservicio 
ON DescripcionServicio_idDescripcionServicio = idDescripcionServicio and idEgresoV3 = '$num'";
     $trServicio = @mysql_query($strConsultaServicio, $link);
     $filaServicio = mysql_fetch_array($trServicio);

    //------------ FINAL SERVICIO---------

	
	$strConsultaTriage = "SELECT * FROM
     modoarrivo INNER JOIN  infpaciente ON idModoArrivo = ModoArrivo_idModoArrivo
     AND idPaciente =  '$num'";
     $trPaciente = @mysql_query($strConsultaTriage, $link);
     $filaTriage = @mysql_fetch_array($trPaciente);

     $strVitalesIniciales = "SELECT * FROM signosvitalesexfisv3 WHERE InfPaciente_idPaciente =  '$num'";
     $VitalesIniciales = @mysql_query($strVitalesIniciales, $link);
     $filaVitalesIniciales = mysql_fetch_array($VitalesIniciales);

    $strVitalesEntrando = "SELECT * FROM exfisv3 WHERE InfPaciente_idPaciente =  '$num'";
     $VitalesEntrando = @mysql_query($strVitalesEntrando, $link);
     $filaVitalesEntrando = mysql_fetch_array($VitalesEntrando);
//--------------------------new impresion cllinica
/*
    $strImpresionClinica2 = "SELECT DescripcionImpClinica FROM impclinicav3 WHERE InfPaciente_idPaciente =  '$num' LIMIT 4";
    $ImpresionClinica2 = @mysql_query($strImpresionClinica2, $link);

    $return_arr = array();

while ($row_services = mysql_fetch_array($ImpresionClinica2, MYSQL_NUM)) {

    $return_arr[] = $row_services;
}
if (isset($return_arr[0])){
    $return_arr[0] = "-------------";
    $pdf->SetXY(40, 164);
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(-10,19,(utf8_decode($return_arr[0])),0,0,'C');
}*/
/*else {
    $pdf->SetXY(40, 164);
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(-10,19,(utf8_decode($return_arr[0])),0,0,'C');
}*/

//--------------------------fin new impresion cllinica
/*$strNotasEnf = "SELECT DescripcionNE FROM notasenfermeria WHERE InfPaciente_idPaciente =  '$num'";
$NotasEnf = @mysql_query($strNotasEnf, $link);
$filaNotasEnf = mysql_fetch_array($NotasEnf);*/

    $strEvaluacionP = "SELECT * FROM evaluacion  WHERE InfPaciente_idPaciente =  '$num'";
    $EvaluacionPaci = @mysql_query($strEvaluacionP, $link);
    $filaEvaPaciente = mysql_fetch_array($EvaluacionPaci);



     $VitalesExFis = "SELECT * FROM vitalesentrandohos WHERE  InfPaciente_idPaciente =  '$num'";
     $VexFis = @mysql_query($VitalesExFis, $link);
     $filaVexFis = mysql_fetch_array($VexFis);

     $EvaluacionPlan = "SELECT * FROM evaluacionplan WHERE  InfPaciente_idPaciente =  '$num'";
     $EvaPlan = @mysql_query($EvaluacionPlan, $link);
     $filaEvaPlan = mysql_fetch_array($EvaPlan);


    $pdf=new PDF('P','mm','letter');
	$pdf->Open();
	$pdf->AddPage();
	$pdf->SetMargins(20,20,20);
	$pdf->Ln(15); 

   $pdf->Rect(15, 40, 185, 220 , 'D');

	$pdf->SetFont('Arial','B',9);
    // Centered text in a framed 20*10 mm cell and line break
    $pdf->Cell(20,10,'1er. APELLIDO',0,1,'C');
$pdf->SetFont('Arial','',9);
    

$pdf->SetFont('Arial','B',9);
    // Centered text in a framed 20*10 mm cell and line break
    $pdf->Cell(80,-10,'2do. APELLIDO',0,1,'C');

$pdf->SetFont('Arial','B',9);
    // Centered text in a framed 20*10 mm cell and line break
    $pdf->Cell(140,10,'DE CASADA',0,1,'C');

$pdf->SetFont('Arial','B',9);
    // Centered text in a framed 20*10 mm cell and line break
    $pdf->Cell(200,-10,'1er. NOMBRE',0,1,'C');

$pdf->SetFont('Arial','B',9);
    // Centered text in a framed 20*10 mm cell and line break
    $pdf->Cell(260,10,'2do. NOMBRE',0,1,'C');

$pdf->SetFont('Arial','B',9);
    // Centered text in a framed 20*10 mm cell and line break
    $pdf->Cell(320,-10,'No. EXPEDIENTE',0,1,'C');


$pdf->SetFont('Arial','',9);
 $pdf->Cell(20,18, (utf8_decode($fila['PrimerApeP'])),0,0,'C');
 $pdf->Cell(40,18, (utf8_decode($fila['SegundoApeP'])),0,0,'C');
 $pdf->Cell(20,18, (utf8_decode($fila['ApellidoCasada'])),0,0,'C');
 $pdf->Cell(40,18, (utf8_decode($fila['PrimerNombreP'])),0,0,'C');
 $pdf->Cell(20,18, (utf8_decode($fila['SegundoNombreP'])),0,0,'C');

 $pdf->Line(15, 52, 200, 52);

 $pdf->Line(43, 52, 43, 62);
 $pdf->Line(65, 52, 65, 62);
 $pdf->Line(105, 52, 105, 62);
 $pdf->Line(165, 40, 165, 72);


$pdf->SetFont('Arial','B',9);
    // Centered text in a framed 20*10 mm cell and line break
    $pdf->Cell(-260,30,'SEXO',0,1,'C');

$pdf->SetFont('Arial','B',9);
    // Centered text in a framed 20*10 mm cell and line break
    $pdf->Cell(67,-30,'EDAD',0,1,'C');

$pdf->SetFont('Arial','B',9);
    // Centered text in a framed 20*10 mm cell and line break
    $pdf->Cell(130,30,'ESTADO CIVIL',0,1,'C');

$pdf->SetFont('Arial','B',9);
    // Centered text in a framed 20*10 mm cell and line break
    $pdf->Cell(230,-30,'OCUPACION',0,1,'C');

$pdf->SetFont('Arial','B',9);
    // Centered text in a framed 20*10 mm cell and line break
    $pdf->Cell(325,30,'PAGO IGSS',0,1,'C');

$pdf->SetFont('Arial','',9);
 $pdf->Cell(20,-20, (utf8_decode($fila['Sexo'])),0,0,'C');
 $pdf->Cell(25,-20, (utf8_decode($fila['AniosP'])),0,0,'C');
 $pdf->Cell(40,-20, (utf8_decode($fila['NombEstadoCivil'])),0,0,'C');
 $pdf->Cell(57,-20, (utf8_decode($fila['Ocupacion'])),0,0,'C');
 $pdf->Cell(40,-20, (utf8_decode($fila['PagoIgss'])),0,0,'C');
 

 $pdf->Line(15, 62, 200, 62);


$pdf->SetFont('Arial','B',9);
    // Centered text in a framed 20*10 mm cell and line break
    $pdf->Cell(-340,-10,'PROCEDENCIA',0,1,'C');

$pdf->SetFont('Arial','B',9);
    // Centered text in a framed 20*10 mm cell and line break
    $pdf->Cell(150,10,'DIRECCION HABITUAL',0,1,'C');

$pdf->SetFont('Arial','B',9);
    // Centered text in a framed 20*10 mm cell and line break
    $pdf->Cell(325,-10,'TELEFONO',0,1,'C');

$pdf->SetFont('Arial','',9);
 $pdf->Cell(50,20,(utf8_decode($fila['Direccion'])),0,0,'C');
 $pdf->Cell(225,20,(utf8_decode($fila['Telefono'])),0,0,'C');


$pdf->Line(15, 72, 200, 72);

$pdf->SetFont('Arial','B',9);
    // Centered text in a framed 20*10 mm cell and line break
    $pdf->Cell(-520,30,'MODO DE LLEGADA',0,1,'C');

$pdf->SetFont('Arial','',9);
 $pdf->Cell(50,-20,(utf8_decode($filaTriage['DescripcionArrivo'])),0,0,'C');
$pdf->Line(15, 92, 200, 92);

$pdf->Line(15, 82, 200, 82);

$pdf->SetFont('Arial','B',9);
    // Centered text in a framed 20*10 mm cell and line break
    $pdf->Cell(-75,-10,utf8_decode('LO ACOMPAÑAN'),0,1,'C');

$pdf->SetFont('Arial','',9);
 $pdf->Cell(50,20,(utf8_decode($fila['ContactoPaciente'])),0,0,'C');
$pdf->Line(15, 92, 200, 92);




$pdf->SetFont('Arial','B',9);
    // Centered text in a framed 20*10 mm cell and line break
    $pdf->Cell(145,30,'ANTECEDENTES RELACIONADOS CON LA URGENCIA',0,1,'C');

$pdf->SetFont('Arial','B',9);
    // Centered text in a framed 20*10 mm cell and line break
    $pdf->Cell(55,-30,'MOTIVO DE INGRESO',0,1,'C');

$pdf->SetFont('Arial','',9);
$pdf->Ln(20);
$pdf->MultiCell(50, 4,(utf8_decode($filaMotIngreso['MotIngreso'])) ,0,'J',0);
//$pdf->Ln(20);
$pdf->SetXY(90, 100);
$pdf-> MultiCell(100, 4,(utf8_decode($filaMotIngreso['AnteRelConUrg'])) ,0,'J',0);



$pdf->Line(15, 97, 200, 97);
$pdf->SetFont('Arial','B',8);
$pdf->SetXY(20, 115);
$pdf->Cell(15,19,utf8_decode('FECHA Y HORA'),0,1,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(68,-19,(utf8_decode($filaMotIngreso['FechaHoraMA'])),0,0,'C');


$pdf->Line(80, 92, 80, 127);
$pdf->SetXY(33, 120);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(-10,19,utf8_decode('EXAMEN FISICO'),0,1,'C');
$pdf->SetXY(73, 120);
$pdf->Cell(-10,19,utf8_decode('P.A.'),0,1,'C');
$pdf->SetFont('Arial','',8);
$pdf->SetXY(73, 127.5);
$pdf->MultiCell(100, 4,(utf8_decode($filaVitalesIniciales['PA'])) ,0,'J',0);
$pdf->SetXY(103, 120);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(-10,19,utf8_decode('TEMP.'),0,1,'C');
$pdf->SetFont('Arial','',8);
$pdf->SetXY(110, 127.5);
$pdf->MultiCell(100, 4,(utf8_decode($filaVitalesIniciales['TEMP'])) ,0,'J',0);
$pdf->SetXY(133, 120);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(-10,19,utf8_decode('P.O.'),0,1,'C');
$pdf->SetFont('Arial','',8);
$pdf->SetXY(140, 127.5);
$pdf->MultiCell(100, 4,(utf8_decode($filaVitalesIniciales['PO'])) ,0,'J',0);
$pdf->SetXY(173, 120);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(-10,19,utf8_decode('CONSCIENTE'),0,1,'C');
$pdf->SetFont('Arial','',8);
$pdf->SetXY(185, 127.5);
$pdf->MultiCell(100, 4,(utf8_decode($filaVitalesIniciales['Consiente'])) ,0,'J',0);

$pdf->Line(15, 140, 200, 140);
$pdf->Line(15, 147, 200, 147);
$pdf->Line(15, 154, 200, 154);
$pdf->Line(15, 161, 200, 161);

$pdf->SetFont('Arial','',8);
$pdf->Cell(55,14,(utf8_decode($filaVitalesEntrando['Talla'])),0,0,'C');

$pdf->SetFont('Arial','',8);
$pdf->Cell(65,14,(utf8_decode($filaVitalesEntrando['Peso'])),0,0,'C');

$pdf->SetFont('Arial','',9);
$pdf->SetXY(25, 142);
$pdf-> MultiCell(150, 6,(utf8_decode($filaVitalesEntrando['NotaExFisico'])) ,0,'J',0);

$pdf->SetFont('Arial','',8);
$pdf->SetXY(28, 129);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(-10,19,utf8_decode('TALLA'),0,1,'C');

$pdf->SetXY(80, 129);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(-10,19,utf8_decode('PESO'),0,1,'C');

$pdf->SetXY(110, 155);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(-10,19,utf8_decode('IMPRESION CLINICA'),0,1,'C');

$pdf->Line(15, 127, 200, 127);
$pdf->Line(15, 167, 200, 167);

$pdf->SetXY(60, 165);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(-10,19,utf8_decode('A) ________________________________________'),0,1,'C');

$strImpresionClinica2 = "SELECT DescripcionImpClinica FROM impclinicav3 WHERE InfPaciente_idPaciente =  '$num' LIMIT 4";
$ImpresionClinica2 = @mysql_query($strImpresionClinica2, $link);

$return_arr = array();

while ($row_services = mysql_fetch_array($ImpresionClinica2, MYSQL_NUM)) {
    $return_arr[] = $row_services;
}
if (empty($return_arr[0])){
    $return_arr[0] = "------  N/D  -------";
    $pdf->SetXY(40, 164);
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(-10,19,(utf8_decode($return_arr[0])),0,0,'C');
}
else {
    $pdf->SetXY(40, 164);
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(-10,19,(utf8_decode(implode($return_arr[0]))),0,0,'C');
}
if (empty($return_arr[1])){
    $return_arr[1] = "------  N/D  -------";
    $pdf->SetXY(145, 164);
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(-10,19,(utf8_decode($return_arr[1])),0,0,'C');
}
else {
    $pdf->SetXY(145, 164);
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(-10,19,(utf8_decode(implode($return_arr[1]))),0,0,'C');
}
if (empty($return_arr[2])){
    $return_arr[2] = "------  N/D  -------";
    $pdf->SetXY(40, 174);
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(-10,19,(utf8_decode($return_arr[2])),0,0,'C');
}
else {
    $pdf->SetXY(40, 174);
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(-10,19,(utf8_decode(implode($return_arr[2]))),0,0,'C');
}
if (empty($return_arr[3])){
    $return_arr[3] = "------  N/D  -------";
    $pdf->SetXY(145, 174);
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(-10,19,(utf8_decode($return_arr[3])),0,0,'C');
}
else {
    $pdf->SetXY(145, 174);
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(-10,19,(utf8_decode(implode($return_arr[3]))),0,0,'C');
}
$pdf->SetXY(60, 175);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(-10,19,utf8_decode('C) ________________________________________'),0,1,'C');
$pdf->SetXY(145, 164);
$pdf->SetFont('Arial','',8);
//$pdf->Cell(-10,19,(utf8_decode(implode($return_arr[1]))),0,0,'C');

$pdf->SetXY(165, 165);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(-10,19,utf8_decode('B) ________________________________________'),0,1,'C');
$pdf->SetXY(40, 174);
$pdf->SetFont('Arial','',8);
//$pdf->Cell(-10,19,(utf8_decode(implode($return_arr[2]))),0,0,'C');

$pdf->SetXY(165, 175);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(-10,19,utf8_decode('D) ________________________________________'),0,1,'C');
$pdf->SetXY(145, 174);
$pdf->SetFont('Arial','',8);
//$pdf->Cell(-10,19,(utf8_decode(implode($return_arr[3]))),0,0,'C');

$pdf->SetXY(57, 182);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(-10,19,utf8_decode('ESTE CASO SE CONSIDERA DE URGENCIA'),0,1,'C');

$pdf->SetXY(36, 188);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(-10,19,utf8_decode('RESPONSABLE:'),0,1,'C');


$pdf->SetXY(60, 198);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(-10,19,utf8_decode('Dr. ________________________________________'),0,1,'C');

$pdf->SetXY(60, 201);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(-10,19,utf8_decode('Médico de Guardia'),0,1,'C');

$pdf->SetXY(165, 198);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(-10,19,utf8_decode('F.) ________________________________________'),0,1,'C');

$pdf->SetXY(60, 210);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(-10,19,utf8_decode('Dr. ________________________________________'),0,1,'C');

$pdf->SetXY(60, 213);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(-10,19,utf8_decode('Interno'),0,1,'C');

$pdf->SetFont('Arial','',11);
//$pdf->Ln(20);
$pdf->SetXY(40, 204);
$pdf->MultiCell(100, 4,(utf8_decode($filaMedicos['NombreMed'])) ,0,'J',0);
//$pdf->Ln(20);
$pdf->SetXY(40, 216);
$pdf-> MultiCell(100, 4,(utf8_decode($filaMedicos['NombreInterno'])) ,0,'J',0);


$pdf->SetXY(165, 210);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(-10,19,utf8_decode('F). ________________________________________'),0,1,'C');

$pdf->SetXY(113, 220);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(-10,19,utf8_decode('EGRESO DE URGENCIA FECHA Y HORA: ____________________________/_____________________________________'),0,1,'C');

$pdf->SetXY(42, 228);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(-10,19,utf8_decode('QUEDO HOSPITALIZADO'),0,1,'C');

$pdf->SetFont('Arial','',11);
//$pdf->Ln(20);
$pdf->SetXY(110, 226);
$pdf->MultiCell(100, 4,(utf8_decode($filaServicio['FechaHoraEgreso'])) ,0,'J',0);
//$pdf->Ln(20);
$pdf->SetXY(145, 226);
$pdf-> MultiCell(100, 4,(utf8_decode($filaEgreso['HoraEgreso'])) ,0,'J',0);
$pdf->SetXY(75, 236);
$pdf-> MultiCell(100, 4,(utf8_decode($filaEgreso['QuedoHospitalizado'])) ,0,'J',0);



$pdf->SetXY(161, 228);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(-10,19,utf8_decode('SERVICIO: ______________________________________'),0,1,'C');

$pdf->SetFont('Arial','',9);
$pdf->SetXY(151, 235);
$pdf-> MultiCell(100, 4,(utf8_decode($filaServicio['DescripcionServP'])) ,0,'J',0);


$pdf->SetXY(18, 242);
$pdf->SetFont('Arial','',8);
$pdf->MultiCell(75,2,utf8_decode('Dejo constancia con mi nombre y firma o huella digital de que el tratamiento instituído a mi persona no se ha determinado y que mi caso sigue siendo delicado, pero es mi deseo retirarme de este servicio y eximo de por ello de toda responsabilidad al Hospital Departamental y personal que labora en el, de lo que me sucediera fuera de dicha institución.'),0,'J',0);


$pdf->SetXY(151, 250    );
$pdf->SetFont('Arial','B',9);
$pdf->Cell(10,0,utf8_decode('______________________________________'),0,1,'C');

$pdf->SetXY(151, 253);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(10,0,utf8_decode('FIRMA'),0,1,'C');



//Inicio de reverso de hoja



$pdf->SetXY(32  , 645);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(5,22,utf8_decode('FECHA Y HORA'),0,1,'C');

//---------------Inicio del codigo de notas de evolucion
/*
$strNotaEvoluciones = "SELECT * FROM notasenfermeria WHERE InfPaciente_idPaciente =  '$num'";
$NtaEvo= @mysql_query($strNotaEvoluciones, $link);
while ($fila = mysql_fetch_array($NtaEvo, MYSQL_NUM)) {
    $pdf->SetX(18);
    $pdf->SetFont('Arial','',8);
    $pdf-> Cell(30, 4,(utf8_decode($fila[1])) ,0,'J','L');

    $pdf->SetX(65);
    $pdf->SetFont('Arial','',8);
    $pdf-> Cell(5, 4,(utf8_decode($fila[2])) ,0,'J',0);

    $pdf->SetX(85);
    $pdf->SetFont('Arial','',8);
    $pdf-> Cell(10, 4,(utf8_decode($fila[3])) ,0,'J','L');

    $pdf->SetX(135);
    $pdf-> MultiCell(60,4,(utf8_decode($fila[4])) ,0,'J',0);
    $pdf->Ln();
}*/
//del codigo de notas de Evolucion

$pdf->SetXY(65, 35);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(5,22,utf8_decode('No.'),0,1,'C');

$pdf->SetXY(105, 35);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(5,22,utf8_decode('ORDENES'),0,1,'C');

//$pdf->SetXY(105, 55);


$pdf->SetXY(165, 35);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(5,22,utf8_decode('EVOLUCION'),0,1,'C');

$pdf->Line(55, 40, 55, 260);
$pdf->Line(80, 40, 80, 260);
$pdf->Line(135, 40, 135, 260);

$pdf->Line(15, 50, 200, 50);
$pdf->Line(15, 60, 200, 60);
$pdf->Line(15, 70, 200, 70);
$pdf->Line(15, 80, 200, 80);
$pdf->Line(15, 90, 200, 90);
$pdf->Line(15, 100, 200, 100);
$pdf->Line(15, 110, 200, 110);
$pdf->Line(15, 120, 200, 120);
$pdf->Line(15, 130, 200, 130);
$pdf->Line(15, 140, 200, 140);
$pdf->Line(15, 150, 200, 150);
$pdf->Line(15, 160, 200, 160);
$pdf->Line(15, 170, 200, 170);
$pdf->Line(15, 180, 200, 180);
$pdf->Line(15, 190, 200, 190);
$pdf->Line(15, 200, 200, 200);
$pdf->Line(15, 210, 200, 210);
$pdf->Line(15, 220, 200, 220);
$pdf->Line(15, 230, 200, 230);
$pdf->Line(15, 240, 200, 240);
$pdf->Line(15, 250, 200, 250);

$pdf->Rect(15, 40, 185, 220 , 'D');

$pdf->Output();
?>

