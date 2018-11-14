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
    $this->Image('imagenes/LogoBK_UVA.jpg' , 160 ,12, 20 , 20,'JPG');	
	$this->SetFont('Arial','',11);
	$this->Text(60,20,utf8_decode('"Hospital Departamental de Totonicapan, (UVa-GI)"'),0,'C', 0);
	$this->SetFont('Arial','',6);
	$this->Text(78,24,utf8_decode('Reporte de paciente generado por SABER-EMR, (UVa-GI).'),0,'C', 0);
	$this->Ln();
	$this->Ln();
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

     $SGeneral = "SELECT * FROM revsistemas WHERE  InfPaciente_idPaciente =  '$num' AND NombreSistemas_idNombreSistemas=1";
     $General = @mysql_query($SGeneral, $link);
     $filaGeneral = mysql_fetch_array($General);
    
     $SOjos = "SELECT * FROM revsistemas WHERE  InfPaciente_idPaciente =  '$num' AND NombreSistemas_idNombreSistemas=2";
     $Ojos = @mysql_query($SOjos, $link);
     $filaOjos = mysql_fetch_array($Ojos); 

     $SORL = "SELECT * FROM revsistemas WHERE  InfPaciente_idPaciente =  '$num' AND NombreSistemas_idNombreSistemas=3";
     $ORL = @mysql_query($SORL, $link);
     $filaORL = mysql_fetch_array($ORL);

     $SCV = "SELECT * FROM revsistemas WHERE  InfPaciente_idPaciente =  '$num' AND NombreSistemas_idNombreSistemas=4";
     $CV = @mysql_query($SCV, $link);
     $filaCV = mysql_fetch_array($CV);

     $SResp = "SELECT * FROM revsistemas WHERE  InfPaciente_idPaciente =  '$num' AND NombreSistemas_idNombreSistemas=5";
     $Resp = @mysql_query($SResp, $link);
     $filaResp = mysql_fetch_array($Resp);

     $SGI = "SELECT * FROM revsistemas WHERE  InfPaciente_idPaciente =  '$num' AND NombreSistemas_idNombreSistemas=6";
     $GI = @mysql_query($SGI, $link);
     $filaGI = mysql_fetch_array($GI);

     $SGU = "SELECT * FROM revsistemas WHERE  InfPaciente_idPaciente =  '$num' AND NombreSistemas_idNombreSistemas=7";
     $GU = @mysql_query($SGU, $link);
     $filaGU = mysql_fetch_array($GU);

     $SMSQ = "SELECT * FROM revsistemas WHERE  InfPaciente_idPaciente =  '$num' AND NombreSistemas_idNombreSistemas=8";
     $MSQ = @mysql_query($SMSQ, $link);
     $filaMSQ = mysql_fetch_array($MSQ);

     $SPiel = "SELECT * FROM revsistemas WHERE  InfPaciente_idPaciente =  '$num' AND NombreSistemas_idNombreSistemas=9";
     $Piel = @mysql_query($SPiel, $link);
     $filaPiel = mysql_fetch_array($Piel);

     $SNeuro = "SELECT * FROM revsistemas WHERE  InfPaciente_idPaciente =  '$num' AND NombreSistemas_idNombreSistemas=10";
     $Neuro = @mysql_query($SNeuro, $link);
     $filaNeuro = mysql_fetch_array($Neuro);

     $SPsiq = "SELECT * FROM revsistemas WHERE  InfPaciente_idPaciente =  '$num' AND NombreSistemas_idNombreSistemas=11";
     $Psiq = @mysql_query($SPsiq, $link);
     $filaPsiq = mysql_fetch_array($Psiq);

     $SEndoc = "SELECT * FROM revsistemas WHERE  InfPaciente_idPaciente =  '$num' AND NombreSistemas_idNombreSistemas=12";
     $Endoc = @mysql_query($SEndoc, $link);
     $filaEndoc = mysql_fetch_array($Endoc);

     $SOtros = "SELECT * FROM revsistemas WHERE  InfPaciente_idPaciente =  '$num' AND NombreSistemas_idNombreSistemas=13";
     $Otros = @mysql_query($SOtros, $link);
     $filaOtros = mysql_fetch_array($Otros);

     $VitalesExFis = "SELECT * FROM vitalesentrandohos WHERE  InfPaciente_idPaciente =  '$num'";
     $VexFis = @mysql_query($VitalesExFis, $link);
     $filaVexFis = mysql_fetch_array($VexFis);
//------------EXAMEN FISICO---------
     $SGeneralFis = "SELECT * FROM examenfisico WHERE  InfPaciente_idPaciente =  '$num' AND NombreSistemas_idNombreSistemas=1";
     $GeneralFis = @mysql_query($SGeneralFis, $link);
     $filaGeneralFis = mysql_fetch_array($GeneralFis);
    
     $SOjosFis = "SELECT * FROM examenfisico WHERE  InfPaciente_idPaciente =  '$num' AND NombreSistemas_idNombreSistemas=2";
     $OjosFis = @mysql_query($SOjosFis, $link);
     $filaOjosFis = mysql_fetch_array($OjosFis); 

     $SORLFis = "SELECT * FROM examenfisico WHERE  InfPaciente_idPaciente =  '$num' AND NombreSistemas_idNombreSistemas=3";
     $ORLFis = @mysql_query($SORLFis, $link);
     $filaORLFis = mysql_fetch_array($ORLFis);

     $SCVFis = "SELECT * FROM examenfisico WHERE  InfPaciente_idPaciente =  '$num' AND NombreSistemas_idNombreSistemas=4";
     $CVFis = @mysql_query($SCVFis, $link);
     $filaCVFis = mysql_fetch_array($CVFis);

     $SRespFis = "SELECT * FROM examenfisico WHERE  InfPaciente_idPaciente =  '$num' AND NombreSistemas_idNombreSistemas=5";
     $RespFis = @mysql_query($SRespFis, $link);
     $filaRespFis = mysql_fetch_array($RespFis);

     $SGIFis = "SELECT * FROM examenfisico WHERE  InfPaciente_idPaciente =  '$num' AND NombreSistemas_idNombreSistemas=6";
     $GIFis = @mysql_query($SGIFis, $link);
     $filaGIFis = mysql_fetch_array($GIFis);

     $SGUFis = "SELECT * FROM examenfisico WHERE  InfPaciente_idPaciente =  '$num' AND NombreSistemas_idNombreSistemas=7";
     $GUFis = @mysql_query($SGUFis, $link);
     $filaGUFis = mysql_fetch_array($GUFis);

     $SMSQFis = "SELECT * FROM examenfisico WHERE  InfPaciente_idPaciente =  '$num' AND NombreSistemas_idNombreSistemas=8";
     $MSQFis = @mysql_query($SMSQFis, $link);
     $filaMSQFis = mysql_fetch_array($MSQFis);

     $SPielFis = "SELECT * FROM examenfisico WHERE  InfPaciente_idPaciente =  '$num' AND NombreSistemas_idNombreSistemas=9";
     $PielFis = @mysql_query($SPielFis, $link);
     $filaPielFis = mysql_fetch_array($PielFis);

     $SNeuroFis = "SELECT * FROM examenfisico WHERE  InfPaciente_idPaciente =  '$num' AND NombreSistemas_idNombreSistemas=10";
     $NeuroFis = @mysql_query($SNeuroFis, $link);
     $filaNeuroFis = mysql_fetch_array($NeuroFis);

     $SPsiqFis = "SELECT * FROM examenfisico WHERE  InfPaciente_idPaciente =  '$num' AND NombreSistemas_idNombreSistemas=11";
     $PsiqFis = @mysql_query($SPsiqFis, $link);
     $filaPsiqFis = mysql_fetch_array($PsiqFis);

     $SEndocFis = "SELECT * FROM examenfisico WHERE  InfPaciente_idPaciente =  '$num' AND NombreSistemas_idNombreSistemas=12";
     $EndocFis = @mysql_query($SEndocFis, $link);
     $filaEndocFis = mysql_fetch_array($EndocFis);

     $SCabezaFis = "SELECT * FROM examenfisico WHERE  InfPaciente_idPaciente =  '$num' AND NombreSistemas_idNombreSistemas=14";
     $CabezaFis = @mysql_query($SCabezaFis, $link);
     $filaCabezaFis = mysql_fetch_array($CabezaFis);

     $SCuelloFis = "SELECT * FROM examenfisico WHERE  InfPaciente_idPaciente =  '$num' AND NombreSistemas_idNombreSistemas=15";
     $CuelloFis = @mysql_query($SCuelloFis, $link);
     $filaCuelloFis = mysql_fetch_array($CuelloFis);

     $SAbdomenFis = "SELECT * FROM examenfisico WHERE  InfPaciente_idPaciente =  '$num' AND NombreSistemas_idNombreSistemas=16";
     $AbdomenFis = @mysql_query($SAbdomenFis, $link);
     $filaAbdomenFis = mysql_fetch_array($AbdomenFis);

     $SPechoFis = "SELECT * FROM examenfisico WHERE  InfPaciente_idPaciente =  '$num' AND NombreSistemas_idNombreSistemas=17";
     $PechoFis = @mysql_query($SPechoFis, $link);
     $filaPechoFis = mysql_fetch_array($PechoFis);

     $SEspaldaFis = "SELECT * FROM examenfisico WHERE  InfPaciente_idPaciente =  '$num' AND NombreSistemas_idNombreSistemas=18";
     $EspaldaFis = @mysql_query($SEspaldaFis, $link);
     $filaEspaldaFis = mysql_fetch_array($EspaldaFis);

     $SExtremidadesFis = "SELECT * FROM examenfisico WHERE  InfPaciente_idPaciente =  '$num' AND NombreSistemas_idNombreSistemas=19";
     $ExtremidadesFis = @mysql_query($SExtremidadesFis, $link);
     $filaExtremidadesFis = mysql_fetch_array($ExtremidadesFis);
//------------FIN EXAMEN FISICO     
     $EvaluacionPlan = "SELECT * FROM evaluacionplan WHERE  InfPaciente_idPaciente =  '$num'";
     $EvaPlan = @mysql_query($EvaluacionPlan, $link);
     $filaEvaPlan = mysql_fetch_array($EvaPlan);

	 $DispocicionPac = "SELECT * FROM descdisposicionpac INNER JOIN dispocicionpaciente ON 
	 idDescDisposicionPac = DescDisposicionPac_idDescDisposicionPac 
	 AND  InfPaciente_idPaciente =  '$num'";
     $DispoP = @mysql_query($DispocicionPac, $link);
     $filaDispoP = mysql_fetch_array($DispoP);

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
	$pdf->Ln();
    $pdf->SetFont('helvetica','U',11);
	$pdf->MultiCell(250,8,'Si ambulancia, Notas de los servicios de emergencias antes de llega. ',0);
   	
    $pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(180,5, utf8_decode(utf8_decode($filaTriage['SiAmbulancia'])) ,0,'J');
    
	$pdf->SetFont('helvetica','U',11);
	$pdf->MultiCell(180,8,'Medicaciones antes de llegada. ',0);
	
    $pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(180,6, utf8_decode(utf8_decode($filaTriage['MedicacionesAllegada'])) ,0,'J');
	$pdf->SetFont('helvetica','U',11);
	$pdf->MultiCell(180,8,'Intervenciones antes de llegada. ',0);

	
    $pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(180,6, utf8_decode(utf8_decode($filaTriage['IntervencionesAllegada'])) ,0,'J');

	$pdf->MultiCell(180,8,'Signos vitales iniciales. ',0);	
	
    $pdf->SetFont('helvetica','',11);
	$pdf->Cell(25,6, utf8_decode('Hora: ' ." ".utf8_decode($filaVitalesIniciales['Hora']).",") ,0,'J');
	

    $pdf->SetFont('helvetica','',11);
	$pdf->Cell(25,6, utf8_decode('Pulso: ' ." ".utf8_decode($filaVitalesIniciales['Pulso']).",") ,0,'J');
	
    $pdf->SetFont('helvetica','',11);
	$pdf->Cell(25,6, utf8_decode('FR: ' ." ".utf8_decode($filaVitalesIniciales['FR']).",") ,0,'J');
    $pdf->SetFont('helvetica','',11);
    $pdf->Cell(45,6, utf8_decode('Presion arterial: ' ." ".utf8_decode($filaVitalesIniciales['PresionArterial']).",") ,0,'J');
    $pdf->SetFont('helvetica','',11);
    $pdf->Cell(25,6, utf8_decode('Temperatura: ' ." ".utf8_decode($filaVitalesIniciales['Temperatura'])."°"."C") ,0,'J');
    $pdf->Ln();
    $pdf->SetFont('helvetica','U',11);
    $pdf->MultiCell(180,8,'Notas de triage. ',0);
	$pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(180,6, utf8_decode(utf8_decode($filaTriage['NotasTriage']).",") ,0,'J');
       $pdf->Ln();
       $pdf->SetFont('helvetica','U',11);
       $pdf->MultiCell(180,8,'Otra informacion. ',0);	
	   
       $pdf->SetFont('helvetica','',11);
	   $pdf->MultiCell(180,6, utf8_decode(utf8_decode($filaTriage['OtraInfo']).",") ,0,'J');
	   $pdf->SetFont('helvetica','B',11);
       $pdf->MultiCell(180,8,'Evaluacion. ',0);
       
       $pdf->SetFont('helvetica','',11);
	   $pdf->MultiCell(180,6, utf8_decode('Hora de contacto con el medico: ' ." ".utf8_decode($filaEvaPaciente['HoraContactoMed'])) ,0,'J');
	  
       $pdf->SetFont('helvetica','',11);
	   $pdf->MultiCell(180,6, utf8_decode('Medico a cargo: ' ." ".utf8_decode($filaEvaPaciente['MedicoAcargo'])) ,0,'J');
		 $pdf->SetFont('helvetica','',11);
		 $pdf->MultiCell(180,6, utf8_decode('EPS: ' ." ".utf8_decode($filaEvaPaciente['Residente'])) ,0,'J');
		 $pdf->SetFont('helvetica','',11);
		 $pdf->MultiCell(180,6, utf8_decode('Externo: ' ." ".utf8_decode($filaEvaPaciente['Estudiante'])) ,0,'J');
	 	 $pdf->SetFont('helvetica','',11);
	 	 $pdf->MultiCell(180,6, utf8_decode('Otro: ' ." ".utf8_decode($filaEvaPaciente['Otro'])) ,0,'J');
                  $pdf-> Ln();
				 $pdf->SetFont('helvetica','U',11);
                 $pdf->MultiCell(100,8,'Motivo de consulta. ',0);
	             $pdf->SetFont('helvetica','',11);
	             $pdf->MultiCell(180,6, utf8_decode(utf8_decode($filaEvaPaciente['MotivoDeConsulta'])) ,0,'J');
	             $pdf->Ln();
	             $pdf->SetFont('helvetica','U',11);
	             $pdf->MultiCell(100,4,'Historia de la enfermedad actual.',0);
	             
                 $pdf->SetFont('helvetica','',11);
	             $pdf->MultiCell(180,6, utf8_decode(utf8_decode($filaEvaPaciente['HistoriaEnfActual'])) ,0,'J');
	             $pdf->Ln();
	             $pdf->SetFont('helvetica','U',11);
	             $pdf->MultiCell(100,4,'Historia Medica.',0);
	             
                 $pdf->SetFont('helvetica','',11);
	             $pdf->MultiCell(180,6, utf8_decode(utf8_decode($filaEvaPaciente['HistoriaMed'])) ,0,'J');
	             $pdf->Ln();
	             $pdf->SetFont('helvetica','U',11);
	             $pdf->MultiCell(100,4,'Historia Quirurgica.',0);
	             
                 $pdf->SetFont('helvetica','',11);
	             $pdf->MultiCell(180,6, utf8_decode(utf8_decode($filaEvaPaciente['Quirurgica'])) ,0,'J');
	             $pdf->Ln();
	             $pdf->SetFont('helvetica','U',11);
	             $pdf->MultiCell(100,4,'Historia Familiar.',0);
	             
                 $pdf->SetFont('helvetica','',11);
	             $pdf->MultiCell(180,6, utf8_decode(utf8_decode($filaEvaPaciente['Familiar'])) ,0,'J');
	             $pdf->Ln();
	             $pdf->SetFont('helvetica','U',11);
	             $pdf->MultiCell(100,4,'Historia Social.',0);
	             
                 $pdf->SetFont('helvetica','',11);
	             $pdf->MultiCell(180,6, utf8_decode(utf8_decode($filaEvaPaciente['Social'])) ,0,'J');
	             $pdf->Ln();
	             $pdf->SetFont('helvetica','U',11);
	             $pdf->MultiCell(100,4,'Medicaciones.',0);
	             
                 $pdf->SetFont('helvetica','',11);
	             $pdf->MultiCell(180,6, utf8_decode(utf8_decode($filaEvaPaciente['Medicaciones'])) ,0,'J');
	             $pdf->Ln();
	             $pdf->SetFont('helvetica','U',11);
	             $pdf->MultiCell(100,4,'Alergias.',0);
	             
                 $pdf->SetFont('helvetica','',11);
	             $pdf->MultiCell(180,6, utf8_decode(utf8_decode($filaEvaPaciente['Medicaciones'])) ,0,'J');

                             $pdf->SetFont('helvetica','B',11);
                             $pdf->MultiCell(100,8,'Revision de sistemas. ',0);
                             $pdf->Ln();
                             $pdf->SetFont('helvetica','',11);
	                         $pdf->MultiCell(170,5, utf8_decode('General: ' ." ".utf8_decode($filaGeneral['PosNeg'].", ") .utf8_decode($filaGeneral['Descripcion'])) ,0,'J');
	                         $pdf->Ln();
                             $pdf->SetFont('helvetica','',11);
	                         $pdf->MultiCell(170,5, utf8_decode('Ojos: ' ." ".utf8_decode($filaOjos['PosNeg'].", ") .utf8_decode($filaOjos['Descripcion'])) ,0,'J');
	                         $pdf->Ln();
                             $pdf->SetFont('helvetica','',11);
	                         $pdf->MultiCell(170,5, utf8_decode('ORL: ' ." ".utf8_decode($filaORL['PosNeg'].", ") .utf8_decode($filaORL['Descripcion'])) ,0,'J');
	                         $pdf->Ln();
                             $pdf->SetFont('helvetica','',11);
	                         $pdf->MultiCell(170,5, utf8_decode('CV: ' ." ".utf8_decode($filaCV['PosNeg'].", ") .utf8_decode($filaCV['Descripcion'])) ,0,'J');
	                         $pdf->Ln();
                             $pdf->SetFont('helvetica','',11);
	                         $pdf->MultiCell(170,5, utf8_decode('Resp: ' ." ".utf8_decode($filaResp['PosNeg'].", ") .utf8_decode($filaResp['Descripcion'])) ,0,'J');
	                         $pdf->Ln();
                             $pdf->SetFont('helvetica','',11);
	                         $pdf->MultiCell(170,5, utf8_decode('GI: ' ." ".utf8_decode($filaGI['PosNeg'].", ") .utf8_decode($filaGI['Descripcion'])) ,0,'J');
	                         $pdf->Ln();
                             $pdf->SetFont('helvetica','',11);
	                         $pdf->MultiCell(170,5, utf8_decode('GU: ' ." ".utf8_decode($filaGU['PosNeg'].", ") .utf8_decode($filaGU['Descripcion'])) ,0,'J');
	                         $pdf->Ln();
                             $pdf->SetFont('helvetica','',11);
	                         $pdf->MultiCell(170,5, utf8_decode('MSQ: ' ." ".utf8_decode($filaMSQ['PosNeg'].", ") .utf8_decode($filaMSQ['Descripcion'])) ,0,'J');
	                         $pdf->Ln();
                             $pdf->SetFont('helvetica','',11);
	                         $pdf->MultiCell(170,5, utf8_decode('Piel: ' ." ".utf8_decode($filaPiel['PosNeg'].", ") .utf8_decode($filaPiel['Descripcion'])) ,0,'J');
	                         $pdf->Ln();
                             $pdf->SetFont('helvetica','',11);
	                         $pdf->MultiCell(170,5, utf8_decode('Neuro: ' ." ".utf8_decode($filaNeuro['PosNeg'].", ") .utf8_decode($filaNeuro['Descripcion'])) ,0,'J');
	                         $pdf->Ln();
                             $pdf->SetFont('helvetica','',11);
	                         $pdf->MultiCell(170,5, utf8_decode('Psiq: ' ." ".utf8_decode($filaPsiq['PosNeg'].", ") .utf8_decode($filaPsiq['Descripcion'])) ,0,'J');
	                         $pdf->Ln();
                             $pdf->SetFont('helvetica','',11);
	                         $pdf->MultiCell(170,5, utf8_decode('Endoc: ' ." ".utf8_decode($filaEndoc['PosNeg'].", ") .utf8_decode($filaEndoc['Descripcion'])) ,0,'J');
                             $pdf->Ln();
                             $pdf->SetFont('helvetica','',11);
	                         $pdf->MultiCell(170,5, utf8_decode('Otros: ' ." ".utf8_decode($filaOtros['PosNeg'].", ") .utf8_decode($filaOtros['Descripcion'])) ,0,'J');

$pdf->Ln();
    $pdf->SetFont('helvetica','B',11);
    $pdf->MultiCell(100,8,'Examen Fisico. ',0);
    $pdf->SetFont('helvetica','',11);
    
    $pdf->Ln();
    $pdf->SetFont('helvetica','U',11);
    $pdf->MultiCell(100,8,'Signos vitales examen fisico. ',0);
    
    $pdf->SetFont('helvetica','',11);    
	$pdf->MultiCell(180,5, utf8_decode('Hora: ' ." ".utf8_decode($filaVexFis['Hora'].", ") .' Pulso: ' .utf8_decode($filaVexFis['Pulso'])."  ". ' FR: ' .utf8_decode($filaVexFis['FR']) ."  ". ' Presion arterial: ' .utf8_decode($filaVexFis['PresionArterial'])."  ". ' Temperatura: ' .utf8_decode($filaVexFis['Temperatura'])."°C "   ) ,0,'J');
//-------------OUT EXAMEN FISICO

    $pdf->Ln();
    $pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(170,5, utf8_decode('General: ' ." ".utf8_decode($filaGeneralFis['PosNeg'].", ") .utf8_decode($filaGeneralFis['Descripcion'])) ,0,'J');
    $pdf->Ln();
    $pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(170,5, utf8_decode('Ojos: ' ." ".utf8_decode($filaOjosFis['PosNeg'].", ") .utf8_decode($filaOjosFis['Descripcion'])) ,0,'J');
    $pdf->Ln();
    $pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(170,5, utf8_decode('ORL: ' ." ".utf8_decode($filaORLFis['PosNeg'].", ") .utf8_decode($filaORLFis['Descripcion'])) ,0,'J');
    $pdf->Ln();
    $pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(170,5, utf8_decode('CV: ' ." ".utf8_decode($filaCVFis['PosNeg'].", ") .utf8_decode($filaCVFis['Descripcion'])) ,0,'J');
    $pdf->Ln();
    $pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(170,5, utf8_decode('Resp: ' ." ".utf8_decode($filaRespFis['PosNeg'].", ") .utf8_decode($filaRespFis['Descripcion'])) ,0,'J');
    $pdf->Ln();
    $pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(170,5, utf8_decode('GI: ' ." ".utf8_decode($filaGIFis['PosNeg'].", ") .utf8_decode($filaGIFis['Descripcion'])) ,0,'J');
    $pdf->Ln();
    $pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(170,5, utf8_decode('GU: ' ." ".utf8_decode($filaGUFis['PosNeg'].", ") .utf8_decode($filaGUFis['Descripcion'])) ,0,'J');
    $pdf->Ln();
    $pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(170,5, utf8_decode('MSQ: ' ." ".utf8_decode($filaMSQFis['PosNeg'].", ") .utf8_decode($filaMSQFis['Descripcion'])) ,0,'J');
    $pdf->Ln();
    $pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(170,5, utf8_decode('Piel: ' ." ".utf8_decode($filaPielFis['PosNeg'].", ") .utf8_decode($filaPielFis['Descripcion'])) ,0,'J');
    $pdf->Ln();
    $pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(170,5, utf8_decode('Neuro: ' ." ".utf8_decode($filaNeuroFis['PosNeg'].", ") .utf8_decode($filaNeuroFis['Descripcion'])) ,0,'J');
    $pdf->Ln();
    $pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(170,5, utf8_decode('Psiq: ' ." ".utf8_decode($filaPsiqFis['PosNeg'].", ") .utf8_decode($filaPsiqFis['Descripcion'])) ,0,'J');
    $pdf->Ln();
    $pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(170,5, utf8_decode('Endoc: ' ." ".utf8_decode($filaEndocFis['PosNeg'].", ") .utf8_decode($filaEndocFis['Descripcion'])) ,0,'J');
    $pdf->Ln();
    $pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(170,5, utf8_decode('Cabeza: ' ." ".utf8_decode($filaCabezaFis['PosNeg'].", ") .utf8_decode($filaCabezaFis['Descripcion'])) ,0,'J');
    $pdf->Ln();
    $pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(170,5, utf8_decode('Cuello: ' ." ".utf8_decode($filaCuelloFis['PosNeg'].", ") .utf8_decode($filaCuelloFis['Descripcion'])) ,0,'J');
    $pdf->Ln(); 
    $pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(170,5, utf8_decode('Abdomen: ' ." ".utf8_decode($filaAbdomenFis['PosNeg'].", ") .utf8_decode($filaAbdomenFis['Descripcion'])) ,0,'J');
    $pdf->Ln();
    $pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(170,5, utf8_decode('Pecho: ' ." ".utf8_decode($filaPechoFis['PosNeg'].", ") .utf8_decode($filaPechoFis['Descripcion'])) ,0,'J');
    $pdf->Ln();
    $pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(170,5, utf8_decode('Espalda: ' ." ".utf8_decode($filaEspaldaFis['PosNeg'].", ") .utf8_decode($filaEspaldaFis['Descripcion'])) ,0,'J');
    $pdf->Ln();
    $pdf->SetFont('helvetica','',11);
	$pdf->MultiCell(170,5, utf8_decode('Extremidades: ' ." ".utf8_decode($filaExtremidadesFis['PosNeg'].", ") .utf8_decode($filaExtremidadesFis['Descripcion'])) ,0,'J');
                     
                    $pdf->Ln(); 
                    $pdf->SetFont('helvetica','B',11);
                    
    	            $pdf->MultiCell(100,8,'Evaluacion y plan. ',0);
    	            
    	            $pdf->SetFont('helvetica','U',11);                    
                    $pdf->MultiCell(100,8,'Diagnostico diferencial:',0);
                    
                    $pdf->SetFont('helvetica','',11);
	                $pdf->MultiCell(170,5, utf8_decode(utf8_decode($filaEvaPlan['DiagnosticoDiferencial']." ")) ,0,'J');
	                
	                $pdf->Ln();
	                $pdf->SetFont('helvetica','U',11); 
                    $pdf->MultiCell(100,8,'Laboratorios e imagenes:',0);
                    
                    $pdf->SetFont('helvetica','',11);
	                $pdf->MultiCell(170,5, utf8_decode(utf8_decode($filaEvaPlan['LaboratoriosImagenes']." ")) ,0,'J');
	               
	                $pdf->Ln();
	                $pdf->SetFont('helvetica','U',11); 
                    $pdf->Cell(31,8,'Evolucion clinica:  ',0);
                    
                    $pdf->SetFont('helvetica','',11);
	                $pdf->MultiCell(170,5, utf8_decode(utf8_decode($filaEvaPlan['EvolucionClinica']." ")) ,0,'J');
	                
	                $pdf->Ln();
	                $pdf->SetFont('helvetica','U',11); 
                    $pdf->MultiCell(31,8,'Procesos:',0);
                    
                    $pdf->SetFont('helvetica','',11);
	                $pdf->MultiCell(170,5, utf8_decode(utf8_decode($filaEvaPlan['Procesos']."")) ,0,'J');
	                
	                $pdf->Ln();
	                $pdf->SetFont('helvetica','U',11); 
                    $pdf->Cell(31,8,'Consultas:  ',0);
                    
                    $pdf->SetFont('helvetica','',11);
	                $pdf->MultiCell(170,5, utf8_decode(utf8_decode($filaEvaPlan['Consultas']." ")) ,0,'J');
                    $pdf->SetFont('helvetica','B',11);
                    
                    $pdf->Ln();
	                $pdf->SetFont('helvetica','U',11);
    	            $pdf->MultiCell(100,8,'Disposicion.',0);
    	            $pdf->SetFont('helvetica','',11);
                    
                    $pdf->Ln();
	                $pdf->SetFont('helvetica','',11);
                    $pdf->MultiCell(170,5, utf8_decode('Hora dispsicion: ' ." ".utf8_decode($filaDispoP['Hora'].", ") ."   ".utf8_decode($filaDispoP['DiscripcionDisPac'])) ,0,'J');
                    
                    $pdf->Ln();
	                $pdf->SetFont('helvetica','U',11);
                    $pdf->Cell(31,8,'Otra informacion de disposicion  :  ',0);
                   
                    $pdf->Ln();
	                
                    $pdf->SetFont('helvetica','',11);
	                $pdf->MultiCell(170,5, utf8_decode(utf8_decode($filaDispoP['OtraInfoDisposicion']." ")) ,0,'J');
	               
	                $pdf->Ln();
	                $pdf->SetFont('helvetica','U',11);
                    $pdf->Cell(31,8,'Notas del medico a cargo:  ',0);
                    
                    $pdf->Ln();
	                
                    $pdf->SetFont('helvetica','',11);
	                $pdf->MultiCell(170,5, utf8_decode(utf8_decode($filaDispoP['NotasMedicoCargo']." ")) ,0,'J');
	                
	                $pdf->Ln();
	                $pdf->SetFont('helvetica','U',11);
                    $pdf->Cell(31,8,'Otras notas:  ',0);
                    
                    $pdf->Ln();	                
                    $pdf->SetFont('helvetica','',11);
	                $pdf->MultiCell(170,5, utf8_decode(utf8_decode($filaDispoP['OtrasNotas']." ")) ,0,'J');


$pdf->Output();
?>