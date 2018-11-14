<?php

require('../fpdf/fpdf.php');
include("../conexion/conectar.php");
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
    $this->Image('imagenes/LogoBK_UVA.jpg' , 160 ,12, 20 , 20,'JPG');
	/*$this->Image('imagenes/letras3.jpg' , 45 ,13, 117 , 20,'JPG');
	$this->Image('imagenes/dgeti.jpg' , 20 ,33, 22 , 21,'JPG');
	$this->Image('imagenes/images.jpg' , 163 ,10, 35 , 20,'JPG');*/
	
	$this->SetFont('Arial','',11);
	$this->Text(60,20,utf8_decode('"Hospital Departamental de Totonicapan, (UVa-GI)"'),0,'C', 0);
	$this->SetFont('Arial','',6);
	$this->Text(78,24,utf8_decode('Reporte de paciente generado por SABER-EMR, (UVa-GI).'),0,'C', 0);
	
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
	$fila = mysql_fetch_array($Paciente);
	
	$strConsultaTriage = "SELECT * FROM
     triaje INNER JOIN  modoarrivo ON ModoArrivo_idModoArrivo = idModoArrivo
     AND InfPaciente_idPaciente =  '$num'";
     $trPaciente = @mysql_query($strConsultaTriage, $link);
     $filaTriage = mysql_fetch_array($trPaciente);

     $strVitalesIniciales = "SELECT * FROM signosvitalesallegada WHERE InfPaciente_idPaciente =  '$num'";
     $VitalesIniciales = @mysql_query($strVitalesIniciales, $link);
     $filaVitalesIniciales = mysql_fetch_array($VitalesIniciales);

    $strEvaluacionP = "SELECT * FROM evaluacion  WHERE InfPaciente_idPaciente =  '$num'";
     $EvaluacionPaci = @mysql_query($strEvaluacionP, $link);
     $filaEvaPaciente = mysql_fetch_array($EvaluacionPaci); 

    $pdf=new PDF('P','mm','letter');
	$pdf->Open();
	$pdf->AddPage();
	$pdf->SetMargins(20,20,20);
	$pdf->Ln(55); 
   
	$pdf->SetXY(130, 40);
	$pdf->SetFont('helvetica','',11);	
	$pdf->MultiCell(250,6, utf8_decode('Ficha de Paciete No: ' ." ".utf8_decode($fila['CodigoFicha'])) ,0,'J');
	$pdf->SetXY(130, 45);
	$pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(250,6, utf8_decode('Codigo de paciente: ' ." ".utf8_decode($fila['CodigoPaciente'])) ,0,'J');
	$pdf->SetXY(130, 50);
	$pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(250,6, utf8_decode('Fecha de ingreso: ' ." ".utf8_decode($fila['FechaIngreso'])) ,0,'J');
	$pdf->SetXY(130, 55);
	$pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(250,6, utf8_decode('Hora de ingreso: ' ." ".utf8_decode($fila['Hora'])) ,0,'J');
	$pdf->SetFont('helvetica','B',11);
	$pdf->Cell(31,8,'Informacion basica del paciente. ',0);
	$pdf->SetXY(20, 67);
	$pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(250,6, utf8_decode('Referido: ' ." ".utf8_decode($fila['Referido']).",") ,0,'J');
	$pdf->SetXY(50, 67);
	$pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(250,6, utf8_decode('Autoridades Notificadas: ' ." ".utf8_decode($fila['AutoridadesNotificadas']).",") ,0,'J');
	$pdf->SetXY(105, 67);
	$pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(250,6, utf8_decode('Nomb. Autoridad: ' ." ".utf8_decode($fila['NombreAutoridad'])) ,0,'J');
	$pdf->SetXY(20, 75);
	$pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(250,6, utf8_decode('Apellidos: ' ." ".utf8_decode($fila['PrimerApeP'])." ".utf8_decode($fila['SegundoApeP']).",") ,0,'J');
    $pdf->SetXY(70, 75);
	$pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(250,6, utf8_decode('Nombres: ' ." ".utf8_decode($fila['PrimerNombreP'])." ".utf8_decode($fila['SegundoNombreP']).",") ,0,'J');
	$pdf->SetXY(120, 75);
	$pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(250,6, utf8_decode('Fecha de nacimiento: ' ." ".utf8_decode($fila['FechaNacP'])) ,0,'J');
	$pdf->SetXY(20, 85);
	$pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(250,6, utf8_decode('Edad: ' ." ".utf8_decode($fila['AniosP'])." años,") ,0,'J');
	$pdf->SetXY(50, 85);
	$pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(250,6, utf8_decode('Sexo: ' ." ".utf8_decode($fila['Sexo'])) ,0,'J');
	$pdf->SetXY(70, 85);
	$pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(250,6, utf8_decode('Dpi: ' ." ".utf8_decode($fila['DPI']).",") ,0,'J');
	$pdf->SetXY(110, 85);
	$pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(130,6, utf8_decode('No. Telefono: ' ." ".utf8_decode($fila['Telefono']).",") ,0,'J');
	$pdf->SetXY(157, 85);
	$pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(190,6, utf8_decode(utf8_decode($fila['NombEstadoCivil']).",") ,0,'J');
	$pdf->SetXY(170, 85);
	$pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(175,6, utf8_decode(utf8_decode($fila['NombreEtnia']).",") ,0,'J');
    $pdf->SetXY(20, 95);
	$pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(250,6, utf8_decode('Dirección: ' ." ".utf8_decode($fila['Direccion'])) ,0,'J');
	$pdf->SetXY(20, 105);
	$pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(250,6, utf8_decode('Contacto del paciente: ' ." ".utf8_decode($fila['ContactoPaciente']).", ".'Telefono: '." ".utf8_decode($fila['TelContacto']).", ".'Relación: '." ".utf8_decode($fila['Relacion']) ) ,0,'J');
    $pdf->SetFont('helvetica','B',11);
    $pdf->Cell(31,8,'Triage. ',0);
    $pdf->SetXY(20, 120);
    $pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(250,6, utf8_decode('Modo Arrivo: ' ." ".utf8_decode($filaTriage['DescripcionArrivo'])) ,0,'J');
    $pdf->SetFont('helvetica','I',11);
	$pdf->Cell(31,8,'Si ambulancia, Notas de los servicios de emergencias antes de llega. ',0);
	$pdf->SetXY(20, 135);
    $pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(180,5, utf8_decode(utf8_decode($filaTriage['SiAmbulancia'])) ,0,'J');
	$pdf->SetFont('helvetica','I',11);
	$pdf->Cell(31,8,'Medicaciones antes de llegada. ',0);
	$pdf->SetXY(20, 147);
    $pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(190,6, utf8_decode(utf8_decode($filaTriage['MedicacionesAllegada'])) ,0,'J');
	$pdf->SetFont('helvetica','I',11);
	$pdf->Cell(31,8,'Intervenciones antes de llegada. ',0);
	$pdf->SetXY(20, 160);
    $pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(190,6, utf8_decode(utf8_decode($filaTriage['IntervencionesAllegada'])) ,0,'J');
	$pdf->Cell(31,8,'Signos vitales iniciales. ',0);	
	$pdf->SetXY(20, 173);
    $pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(190,6, utf8_decode('Hora: ' ." ".utf8_decode($filaVitalesIniciales['Hora']).",") ,0,'J');
	$pdf->SetXY(50, 173);
    $pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(190,6, utf8_decode('Pulso: ' ." ".utf8_decode($filaVitalesIniciales['Pulso']).",") ,0,'J');
	$pdf->SetXY(70, 173);
    $pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(190,6, utf8_decode('FR: ' ." ".utf8_decode($filaVitalesIniciales['FR']).",") ,0,'J');
	$pdf->SetXY(85, 173);
    $pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(190,6, utf8_decode('Presion arterial: ' ." ".utf8_decode($filaVitalesIniciales['PresionArterial']).",") ,0,'J');
	$pdf->SetXY(130, 173);
    $pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(190,6, utf8_decode('Temperatura: ' ." ".utf8_decode($filaVitalesIniciales['Temperatura'])."°"."C") ,0,'J');
	$pdf->Cell(31,8,'Notas de triage. ',0);	
	$pdf->SetXY(20, 185);
    $pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(190,6, utf8_decode(utf8_decode($filaTriage['NotasTriage']).",") ,0,'J');
	$pdf->Cell(31,8,'Otra informacion. ',0);	
	$pdf->SetXY(20, 198);
    $pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(190,6, utf8_decode(utf8_decode($filaTriage['OtraInfo']).",") ,0,'J');
	$pdf->SetFont('helvetica','B',11);
    $pdf->Cell(31,8,'Evaluacion. ',0);
    $pdf->SetXY(20, 210);
    $pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(190,6, utf8_decode('Hora de contacto con el medico: ' ." ".utf8_decode($filaEvaPaciente['HoraContactoMed'])) ,0,'J');
	$pdf->SetXY(20, 215);
    $pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(190,6, utf8_decode('Medico a cargo: ' ." ".utf8_decode($filaEvaPaciente['MedicoAcargo'])) ,0,'J');
	$pdf->SetXY(20, 220);
    $pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(190,6, utf8_decode('EPS: ' ." ".utf8_decode($filaEvaPaciente['Residente'])) ,0,'J');
	$pdf->SetXY(20, 225);
    $pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(190,6, utf8_decode('Externo: ' ." ".utf8_decode($filaEvaPaciente['Estudiante'])) ,0,'J');
	$pdf->SetXY(20, 230);
    $pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(190,6, utf8_decode('Otro: ' ." ".utf8_decode($filaEvaPaciente['Otro'])) ,0,'J');
	$pdf->Cell(31,8,'Motivo de consulta. ',0);
	$pdf->SetXY(20, 243);
    $pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(190,6, utf8_decode(utf8_decode($filaEvaPaciente['MotivoDeConsulta'])) ,0,'J');
	$pdf->SetXY(20, 300);
	$pdf->MultiCell(40,4,'Historia de la enfermedad actual.',0);
	$pdf->SetXY(20, 30);
    $pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(190,6, utf8_decode(utf8_decode($filaEvaPaciente['HistoriaEnfActual'])) ,0,'J');
	$pdf->SetXY(20, 40);
	$pdf->MultiCell(40,4,'Historia Medica.',0);
	$pdf->SetXY(20, 45);
    $pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(190,6, utf8_decode(utf8_decode($filaEvaPaciente['HistoriaMed'])) ,0,'J');
	$pdf->SetXY(20, 55);
	$pdf->MultiCell(40,4,'Historia Quirurgica.',0);
	$pdf->SetXY(20, 60);
    $pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(190,6, utf8_decode(utf8_decode($filaEvaPaciente['Quirurgica'])) ,0,'J');
	$pdf->SetXY(20, 70);
	$pdf->MultiCell(40,4,'Historia Familiar.',0);
	$pdf->SetXY(20, 75);
    $pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(190,6, utf8_decode(utf8_decode($filaEvaPaciente['Familiar'])) ,0,'J');
	$pdf->SetXY(20, 85);
	$pdf->MultiCell(40,4,'Historia Social.',0);
	$pdf->SetXY(20, 90);
    $pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(190,6, utf8_decode(utf8_decode($filaEvaPaciente['Social'])) ,0,'J');
	$pdf->SetXY(20, 100);
	$pdf->MultiCell(40,4,'Medicaciones.',0);
	$pdf->SetXY(20, 105);
    $pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(190,6, utf8_decode(utf8_decode($filaEvaPaciente['Medicaciones'])) ,0,'J');
	$pdf->SetXY(20, 115);
	$pdf->MultiCell(40,4,'Alergias.',0);
	$pdf->SetXY(20, 120);
    $pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(190,6, utf8_decode(utf8_decode($filaEvaPaciente['Medicaciones'])) ,0,'J');
$pdf->Output();
$pdf->Output();
?>