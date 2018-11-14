<?php 

	class PacientesHos
	{
		private $conexion;
		public function __construct()
		{
	        require_once('../conexion/conectar.php'); 
			$this->conexion= new conexion();
			$this->conexion->conectar();
			

		}

		function InfoBasicaPaciente($valor){
        $sql="SELECT * FROM infpaciente WHERE PrimerNombreP like '%".$valor."%' or PrimerApeP like '%".$valor."%' or FechaIngreso like '%".$valor."%' or CodigoFicha like '%".$valor."%'";
		

		//$sql= "CALL BuscarPaciente('%".$valor."%')";	
			$this->conexion->conexion->set_charset('utf8');
			$resultados=$this->conexion->conexion->query($sql);
         	$arregloInfoB = array();
			while ($re=$resultados->fetch_array(MYSQL_NUM)) {
				$arregloInfoB[]=$re;
			}
			return $arregloInfoB;
			$this->conexion->cerrar();
		}

        function InfPacienteV3($valor){
            $sql="SELECT * FROM infpaciente WHERE idPaciente = '$valor'";
            $this->conexion->conexion->set_charset('utf8');
            $resultadosP=$this->conexion->conexion->query($sql);

            $arregloPAC = array();
            while ($re=$resultadosP->fetch_array(MYSQL_NUM)) {
                $arregloPAC[]=$re;
            }
            return $arregloPAC;
            $this->conexion->cerrar();
        }
function Triage($valor){
        $sql="SELECT * FROM triaje WHERE InfPaciente_idPaciente = '$valor'";
			$this->conexion->conexion->set_charset('utf8');
			$resultadosT=$this->conexion->conexion->query($sql);

         	$arregloTRIAJE = array();
			while ($re=$resultadosT->fetch_array(MYSQL_NUM)) {
				$arregloTRIAJE[]=$re;
			}
			return $arregloTRIAJE;
			$this->conexion->cerrar();
		}
function VitalesTriageP($valor){
        $sql="SELECT * FROM SignosVitalesAllegada WHERE InfPaciente_idPaciente = '$valor'";
			$this->conexion->conexion->set_charset('utf8');
			$resultadosTriaje=$this->conexion->conexion->query($sql);
         	$arregloVitalesTriage = array();
			while ($re=$resultadosTriaje->fetch_array(MYSQL_NUM)) {
				$arregloVitalesTriaje[]=$re;
			}
			return $arregloVitalesTriaje;
			$this->conexion->cerrar();
		}

function VitalesEntrandoHos($valor){
        $sql="SELECT * FROM VitalesEntrandoHos WHERE InfPaciente_idPaciente = '$valor'";
			$this->conexion->conexion->set_charset('utf8');
			$resultadosVitalesHos=$this->conexion->conexion->query($sql);
         	$arregloVitalesHos = array();
			while ($re=$resultadosVitalesHos->fetch_array(MYSQL_NUM)) {
				$arregloVitalesHos[]=$re;
			}
			return $arregloVitalesHos;
			$this->conexion->cerrar();
		}

function Evaluacion($valor){
        $sql="SELECT * FROM evaluacion WHERE InfPaciente_idPaciente = '$valor'";
			$this->conexion->conexion->set_charset('utf8');
			$resultadosEvaPlan=$this->conexion->conexion->query($sql);
         	$arregloEvaluacionPlan = array();
			while ($re=$resultadosEvaPlan->fetch_array(MYSQL_NUM)) {
				$arregloEvaluacionPlan[]=$re;
			}
			return $arregloEvaluacionPlan;
			$this->conexion->cerrar();
		}

function RevSistemas($valor){
        $sql="SELECT * FROM revsistemas WHERE InfPaciente_idPaciente = '$valor'";
			$this->conexion->conexion->set_charset('utf8');
			$resultadosRevSistemas=$this->conexion->conexion->query($sql);
         	$arregloRevSistemas = array();
			while ($re=$resultadosRevSistemas->fetch_array(MYSQL_NUM)) {
				$arregloRevSistemas[]=$re;
			}
			return $arregloRevSistemas;
			$this->conexion->cerrar();
		}

function ExFisico($valor){
        $sql="SELECT * FROM examenfisico WHERE InfPaciente_idPaciente = '$valor'";
			$this->conexion->conexion->set_charset('utf8');
			$resultadosExFisico=$this->conexion->conexion->query($sql);
         	$arregloExFisico = array();
			while ($re=$resultadosExFisico->fetch_array(MYSQL_NUM)) {
				$arregloExFisico[]=$re;
			}
			return $arregloExFisico;
			$this->conexion->cerrar();
		}
function EvaluacionPlan($valor){
        $sql="SELECT * FROM evaluacionplan WHERE InfPaciente_idPaciente = '$valor'";
			$this->conexion->conexion->set_charset('utf8');
			$resultados=$this->conexion->conexion->query($sql);
         	$arregloEvaluacion = array();
			while ($re=$resultados->fetch_array(MYSQL_NUM)) {
				$arregloEvaluacion[]=$re;
			}
			return $arregloEvaluacion;
			$this->conexion->cerrar();
		}
function Medicamentos($valor){
        $sql="SELECT * FROM medicamentossuministrados WHERE InfPaciente_idPaciente = '$valor'";
			$this->conexion->conexion->set_charset('utf8');
			$resultadosMedicamentos=$this->conexion->conexion->query($sql);
         	$arregloMedicamentos = array();
			while ($re=$resultadosMedicamentos->fetch_array(MYSQL_NUM)) {
				$arregloMedicamentos[]=$re;
			}
			return $arregloMedicamentos;
			$this->conexion->cerrar();
		}
		
function MedBitaco($valor){
$sql="SELECT * FROM bit_ModificacionesMedicina WHERE InfPaciente_idPaciente = '$valor'";
			$this->conexion->conexion->set_charset('utf8');
			$resultadosMedBitaco=$this->conexion->conexion->query($sql);
         	$arregloMedBita = array();
			while ($re=$resultadosMedBitaco->fetch_array(MYSQL_NUM)) {
				$arregloMedBita[]=$re;
			}
			return $arregloMedBita;
			$this->conexion->cerrar();

}
function Disposicion($valor){
        $sql="SELECT * FROM dispocicionpaciente WHERE InfPaciente_idPaciente = '$valor'";
			$this->conexion->conexion->set_charset('utf8');
			$resultados=$this->conexion->conexion->query($sql);
         	$arregloDisposicion = array();
			while ($re=$resultados->fetch_array(MYSQL_NUM)) {
				$arregloDisposicion[]=$re;
			}
			return $arregloDisposicion;
			$this->conexion->cerrar();
		}
		
function Residente($valor){
        $sql="SELECT * FROM InfoResidenteParaPaciente WHERE InfPaciente_idPaciente = '$valor'";
			$this->conexion->conexion->set_charset('utf8');
			$resultados=$this->conexion->conexion->query($sql);
         	$arregloInfResidente = array();
			while ($re=$resultados->fetch_array(MYSQL_NUM)) {
				$arregloInfResidente[]=$re;
			}
			return $arregloInfResidente;
			$this->conexion->cerrar();
		}

function MedicoCargo($valor){
        $sql="SELECT * FROM InfoMedicoParaPaciente WHERE InfPaciente_idPaciente = '$valor'";
			$this->conexion->conexion->set_charset('utf8');
			$resultados=$this->conexion->conexion->query($sql);
         	$arregloInfMedico = array();
			while ($re=$resultados->fetch_array(MYSQL_NUM)) {
				$arregloInfMedico[]=$re;
			}
			return $arregloInfMedico;
			$this->conexion->cerrar();
		}
		
function Imagen($valor){

	$sql="SELECT * FROM imgdir WHERE InfPaciente_idPaciente = '$valor'";
			$this->conexion->conexion->set_charset('utf8');
			$resultados=$this->conexion->conexion->query($sql);
         	$arregloImagen = array();
			while ($re=$resultados->fetch_array(MYSQL_NUM)) {
				$arregloImagen[]=$re;				
			}
			return $arregloImagen;
			$this->conexion->cerrar();
}

	}

?>