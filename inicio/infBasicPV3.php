<?php
include('dbconnect.php'); 
	require_once("../php/sesion.class.php");	
	$sesion = new sesion();
	$usuario = $sesion->get("usuario");
	
	if( $usuario == false )
	{	
		header("Location: login.php");		
	}
	else 
	{
        $dato= $_GET['usR'];
	    ?>

  <html>
		<head>
			<title>		
			</title>
			<meta charset="utf-8"/>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>           
            <link type="text/css" href="../css/bootstrap.min.css" rel="stylesheet"/>
            <link type="text/css" href="../css/estilo.css" rel="stylesheet"/>
            <link type="text/css" href="../css/estiloIMG.css" rel="stylesheet"/> 
            <link type="text/css" href="../css/divScroll.css" rel="stylesheet"/>
            <!--<link type="text/css" href="../css/ModalCSS.css" rel="stylesheet"/>-->
            <link href="../css/sweetalert.css" rel="stylesheet"/>
            <script  src="../js/jquery-1.12.3.min.js"></script>
            <script src="../js/bootstrap.min.js"></script>
            <script src="../js/scriptSABER.js"></script>
            <script src="../js/ScriptInfBasicP.js"></script> 
            <script src="../js/upload_img.js"></script> 
            <script src="../js/sweetalert.min.js"></script> 
            <script src="../js/Pacientes.js"></script>
            <script src="../js/mousetrap.min.js"></script>
            <script src="../js/overlib.js"></script>
            
  
<script type="text/javascript">

$(document).bind('keydown',function(e){
if ( e.which == 27 ) {
//console.log("Has pulsado la tecla ESC");
elemento1 = document.getElementById("NoPaciente");
elemento1.blur();
elemento2 = document.getElementById("FirmaRS");
elemento3 = document.getElementById("FirmaMD");
elemento2.blur();
elemento3.blur();  
  };
});

 function ComndosR(){
Mousetrap.bind('alt+1', function(e) {
window.location.assign("#Info").addClass('loaded');        
    return false;
});
Mousetrap.bind('alt+2', function(e) {
window.location.assign("#Triaje").addClass('loaded');        
    return false;
});
Mousetrap.bind('alt+3', function(e) {
window.location.assign("#Evaluacion").addClass('loaded');        
    return false;
});
Mousetrap.bind('alt+4', function(e) {
window.location.assign("#HisEnfACT").addClass('loaded');        
    return false;
});
Mousetrap.bind('alt+5', function(e) {
window.location.assign("#HistoMedica").addClass('loaded');        
    return false;
});
Mousetrap.bind('alt+6', function(e) {
window.location.assign("#RevisionSistemas").addClass('loaded');        
    return false;
});
Mousetrap.bind('alt+7', function(e) {
window.location.assign("#ExFisico").addClass('loaded');        
    return false;
});
Mousetrap.bind('alt+8', function(e) {
window.location.assign("#EvaluacionPlan").addClass('loaded');        
    return false;
});
Mousetrap.bind('alt+9', function(e) {
window.location.assign("#Medicamentos").addClass('loaded');        
    return false;
});
Mousetrap.bind('alt+a', function(e) {
window.location.assign("#imglb").addClass('loaded');        
    return false;
});
Mousetrap.bind('alt+b', function(e) {
window.location.assign("#DivDisposicion").addClass('loaded');        
    return false;
});
Mousetrap.bind('alt+c', function(e) {
window.location.assign("#ConsultaP").addClass('loaded');        
    return false;
});
     Mousetrap.bind('alt+t', function(e) {
window.location.assign("#marHeridas").addClass('loaded');        
    return false;
});
Mousetrap.bind('esc', function(e) {
       
    return false;
});
Mousetrap.bind('alt+p', function(e) {
abrirReporte();        
    return false;
});

}
 </script>
		</head>
			<!--<body onload="lista_Pacientes('');">-->
      <body onload="ComndosR(); procesosLoadInfo(); DesapareceForm('formRecOpera');  DesapareceForm('formularioRevSis'); DesapareceForm('marHeridas'); DesapareceForm('subida');" >
			<div class="row"> <!--primer div que alberga datos de medico y usuario-->
              <div class="col-sm-5">
  	           <div class="panel panel-primary">
                 <div class="panel-heading">
                     <span class="glyphicon glyphicon-log-in" role="button"> </span>Bienvenido, <?php echo $sesion->get("usuario"); ?>  
                        <span class="glyphicon glyphicon-remove" style="color: orange;" role="button" ></span>
                        <span class="izquierda"> <a href="../php/cerrarsesion.php" style="color: orange;" align="right">Cerrar Sesion</a></span>
                 </div>
               </div>
              </div>

                    <div class="col-sm-6"> 	                
                      <div class="panel panel-primary">
                        <div class="panel-heading">
                            <span class="glyphicon glyphicon-info-sign"/> Datos principales del paciente
                        </div>  
                       <b> <label>No. de Paciente registrado: &nbsp&nbsp</label><input type="text" id="NoPaciente"  name="NoPaciente" value="<?php
                           echo $dato;?>">  </b>
                      <right>
     <button type="button" align="right" class="btn btn-success" onClick="window.open('infBasicP.php')"><span class="glyphicon glyphicon-new-window">  Nuevo Paciente </span></button>
                      </right>     
                                <div id="capa" name="capa">                        
                                </div> 
                          
                          </div>
                     </div>
                    </div>
            </div> <!--Termina el primer div -->
				    <div class="row"> <!--segundo div que contiene los menus del lado izquierdo-->
                      <div class="col-sm-2">
                      <left>                     
                       <button type="button" class="btn btn-primary btn-block" onClick="window.location.href='#Info'">  Info. B. De Paciente (alt+1)</button>
                      <!-- <button type="button" class="btn btn-primary btn-block" onClick="window.location.href='#Triaje' ">  Triage (alt+2)</button>-->
                       <button type="button" class="btn btn-primary btn-block" onClick="window.location.href='#Evaluacion'">  Evaluación (alt+3)</button>
                       <button type="button" class="btn btn-primary btn-block" onClick="window.location.href='#HistoriaEnfActual'">  Historia De La <br> &nbspEnfermedad Actual (alt+4)</span></button>
                       <!--<button type="button" class="btn btn-primary btn-block" onClick="window.location.href='#HistoMedica'"> Historia &nbsp &nbsp     (alt+5)</button>-->
                       <!--<button type="button" class="btn btn-primary btn-block" onClick="window.location.href='#RevisionSistemas'">  Revisión De Sistemas (alt+6)</button>-->
                       <button type="button" class="btn btn-primary btn-block" onClick="window.location.href='#ExFisico'">  Examen Fisico (alt+7)</button>
                       <!--<button type="button" class="btn btn-primary btn-block" onClick="window.location.href='#marHeridas'">  Mecanismos Y Descripción <br>De Lesiones (alt+t)</button>-->
                       <button type="button" class="btn btn-primary btn-block" onClick="window.location.href='#EvaluacionPlan'"> Evaluación Y Plan (alt+8) </button>
                       <button type="button" class="btn btn-primary btn-block" onClick="window.location.href='#Medicamentos'">  Medicamentos (alt+9)</button>
                       <!--<button type="button" class="btn btn-primary btn-block" onClick="window.location.href='#imglb'">  Agregar Imágenes (alt+a)</button>-->
                       <button type="button" class="btn btn-primary btn-block" onClick="window.location.href='#DivDisposicion'">  Disposición (alt+b)</button> 
                       <button type="button" class="btn btn-primary btn-block" onClick="window.location.href='#RecOperatorio'">  Record Operatorio (alt+o)</button>
                       <button type="button" class="btn btn-primary btn-block" onClick="window.location.href='#ConsultaP'">  Busqueda Pacientes (alt+c)</button>
                       <button type="button"  class="btn btn-warning btn-block" onclick="javascript:abrirReporte();"> <span class="glyphicon glyphicon-print">  Imprimir</span></button> 
                      <!-- <a href="javascript:imprSelec('AreaImp');" >Impresion secundaria</a> -->
                    </left>
                    </div>
                                                          <!--Termina el segundo div-->       				  
                 <div class="col-sm-9"> 
                 <div id="AreaImp" class="scroll_vertical"> 
                  <div id="Info" name="Info">
      
                <h4  id="MostrarInfB" name="MostrarInfB" onclick="ApareceForm('form1'); DesapareceSPN(this.id); ApareceSPN('OcultarInfB'); "    style="display: none;">   <b> <span class="glyphicon glyphicon-chevron-right"  > </span>  1. Info Basica de Paciente</b></h4> 
              
                <h4 id="OcultarInfB" name="OcultarInfB"  onclick="DesapareceForm('form1');  DesapareceSPN(this.id); ApareceSPN('MostrarInfB');">   <b> <span class="glyphicon glyphicon-chevron-down" id="downInfP" name="downInfP"> </span>  1. Info Basica de Paciente </b></h4> 
               
			         <form name="form1" id="form1" style="display: block;">
			           <div align="right"> 

			           <label for="CodPaciente" align ="right">Codigo Ficha:</label>
                         <input type="text" id="codigoficha" align ="right" name="codigoficha" size="15%" required placeholder="No. ficha hospital"></br>                         
                         <label for="CodPaciente" align ="right">Codigo Paciente:</label>
                         <input type="text" readonly='readonly' id="codigo" align ="right" name="codigo"  size="15%"  ></br>
                         <label for="fIngreso" align ="right" >Fecha de ingreso:</label>
                         <script type="text/javascript">
                         document.write("<input type='text' readonly='readonly' name='fecha' id='fecha' value='" + obtiene_fecha() + "'/> </br> ");
                         </script>
                         <label for="Hr">Hora:</label>
                         <script type="text/javascript">
                           document.write("<input type='text' readonly='readonly' name='hora' id='hora' value='" + obtiene_hora() + "' /> </br>");
                        </script>                   
                       </div>
                 <label for="Referido" class="text-primary">Referido:</label>
               <input type="radio" name="referido" value="Si"  id="referido"  /> <label class="text-primary">Si</label>
                <input type="radio" name="referido" value="No" id="referido" checked="" /><label class="text-primary"> No </label> &nbsp &nbsp            
            <label for="aNotificadas" class="text-primary">Autoridades notificadas:</label>
            <input type="radio" name="Anotificadas" value="Si" id="Anotificadas"/> <label class="text-primary">Si</label>
            <input type="radio" name="Anotificadas" value="No" id="Anotificadas" checked="" /> <label class="text-primary">No </label>&nbsp &nbsp
              <select id="Anotificada" name="Anotificada" class="selectpicker show-tick">
                <option value="1" class="text-primary">Ninguno</option>
                <option value="2" class="text-primary">PNC</option>
                <option value="3" class="text-primary">INACIF</option>
                <option value="4" class="text-primary">MP.</option>
                <option value="5" class="text-primary">PGN</option>
                <option value="6" class="text-primary">PDH</option>
              </select> 
              </br> </br>
            <label for="PrApellido" class="text-primary">Primer Apellido:</label>
            <input type="text" id="PrApellido" name="PrApellido" onkeyup="Cod(this.form)" size="9%" required>
             <label for="SegApellido" class="text-primary">Segundo Apellido:</label>
            <input type="text" id="SegApellido" name="SegApellido"size="9%">
            <label for="apCasada" class="text-primary">Apellido de casada:</label>
            <input type="text" id="ACasada" name="ACasada" size="9%" >
             <label for="PrimerNombre" class="text-primary">Primer Nombre:</label>
            <input type="text" id="PNombre" name="PNombre" onkeyup="Cod(this.form)" size="9%"  required></br> </br>
            <label for="SegNombre" class="text-primary">Segundo Nombre:</label>
            <input type="text" id="SNombre" name="SNombre" size="9%" > 
           
            <label for="anio" class="text-primary">años:</label>
            <input type="text" id="anios" name="anios"  size="2%" >
            <label for="ms" class="text-primary">meses:</label>
            <input type="text" id="meses" name="meses"  size="2%" >
            <label for="dd" class="text-primary">dias:</label>
            <input type="text" id="dias" name="dias" size="2%"> 
            &nbsp &nbsp
            <label class="text-primary">Ocupación:</label>
            <input type="text" name="ocupacion" id="ocupacion" size="10%" >
             <label for="FechaNaciemiento" class="text-primary" >Modo de llegada</label>
            <input type="text" id="FNac" name="FNac"  size="6%"  required></br>
            <label for="dp" class="text-primary">Dpi:</label>
            <input type="text" id="dpi" name="dpi" size="13%" placeholder="13 numeros" required onkeypress="return Tel(event);" maxlength="13">
            <label for="tel" class="text-primary">No. Tel.</label>
            <input type="text" id="telefono" name="telefono" maxlength='8' size="10%" placeholder="8 numeros" required onkeypress="return Tel(event);"> 
            </br> 
            </br>
            <label for="sexo" class="text-primary">Sexo:</label>
            <span id="BandSexo" name="BandSexo">
            <input type="radio" name="sexo" value="M" id="sexo" /> <label class="text-primary">M</label> 
            <input type="radio" name="sexo" value="F" id="sexo" /> <label class="text-primary">F</label>&nbsp &nbsp &nbsp
            </span>
            <label for="estadoC" class="text-primary">Estado civil:</label>
            <input type="radio" name="estadoCivil" value="1" id="estadoCivil" /> <label class="text-primary">S </label>
            <input type="radio" name="estadoCivil" value="2" id="estadoCivil" /> <label class="text-primary">C</label>  
            <input type="radio" name="estadoCivil" value="3" id="estadoCivil" /><label class="text-primary">V</label>
            <input type="radio" name="estadoCivil" value="4" id="estadoCivil" /><label class="text-primary">D</label>
            <input type="radio" name="estadoCivil" value="5" id="estadoCivil" /><label class="text-primary">U</label>
            <input type="radio" name="estadoCivil" value="6" id="estadoCivil" checked /><label class="text-primary">N/D</label> &nbsp &nbsp &nbsp
            <label for="etnia" class="text-primary">Etnia:</label>
            <input type="radio" name="etnia" value="1" id="etnia" /> <label class="text-primary">Indigena</label>
            <input type="radio" name="etnia" value="2" id="etnia" /><label class="text-primary"> No Indigena </label>
            <input type="radio" name="etnia" value="3" id="etnia" /> <label class="text-primary">Mestizo </label>
            <input type="radio" name="etnia" value="4" id="etnia" /> <label class="text-primary">Otro </label>
            <input type="radio" name="etnia" value="5" id="etnia"  checked /> <label class="text-primary">N/D</label></br> </br>
            <label for="etnia" class="text-primary">Dirección:</label>
            <textarea name="Direccion"  id="Direccion" class="form-control" rows="1" ></textarea> </br>        
            <label for="CtoEmergencia" class="text-primary">Contacto del paciente</br> encargado o familiar:</label>
            <input type="text" id="contEmer" name="contEmer" size="20%" > 
            <label for="telCtoEmer" class="text-primary">No. Tel:</label>
            <input type="text" id="NoTelEnc" name="NoTelEnc" size="10%" placeholder="8 numeros" maxlength='8'>
            <label for="telCtoEmer" class="text-primary">Relación:</label>
            <input type="text" id="Relacion" name="Relacion" size="30%" > </br> </br>
               <center>
                   <b><div id="mensaje" class="text-success"></div></b>
               </center>
               <center>
                   <!--<button type="button" style="display: none;" id="enviar" name="enviar" value="registrarInfoP" onclick=" javascript:InfoPaciente();  javascript:mostrarInfP();  javascript:validaInfoBasica();  javascript:DesapareceBtn(this.id); javascript:desactiva_Btn(this);" align="center" class="btn btn-primary btn-lg">Registrar información basica del paciente</button> -->
                   <button type="button" id="enviarModINfo"  name="enviarModINfo" value="registrarInfoP" onclick=' UpdateInfoPaciente(); mostrarDatosPActualizado(); validaInfoBasica(); ' align="center" class="btn btn-info btn-lg">Actualizar info. del paciente</button>
               </center>
       </form>
     </div>
 <h4  id="MostrarTria" name="MostrarTria" onclick="ApareceForm('form2'); DesapareceSPN(this.id); ApareceSPN('OcultarTria'); "    >   <b> <span class="glyphicon glyphicon-chevron-right" ></span><b> 2. Triage</b></h4>
 <h4 id="OcultarTria" name="OcultarTria"  onclick="DesapareceForm('form2');  DesapareceSPN(this.id); ApareceSPN('MostrarTria');" style="display: none;"><b> <span class="glyphicon glyphicon-chevron-down" > </span> 2. Triage </b></h4>

<div id="Triaje" name="Triaje" >
  <form name="form2" id="form2">                       
           <label class="text-primary">Modo de llegada:</label></br>
                <input type="radio" name="Mllegada" id="Mllegada" value="1" class="text-primary" />  <label class="text-primary">Ambulancia </label> &nbsp &nbsp  
                <input type="radio" name="Mllegada" id="Mllegada" value="2" class="text-primary" /><label class="text-primary">Unidad policial</label> &nbsp &nbsp 
                <input type="radio" name="Mllegada" id="Mllegada" value="3" class="text-primary" /><label class="text-primary">Transporte particular</label> &nbsp &nbsp
                <input type="radio" name="Mllegada" id="Mllegada" value="4" class="text-primary" /><label class="text-primary">Caminó</label> &nbsp &nbsp
                <input type="radio" name="Mllegada" id="Mllegada" value="5" class="text-primary" /><label class="text-primary">Bus</label> &nbsp &nbsp
                <input type="radio" name="Mllegada" id="Mllegada" value="6" class="text-primary"  checked /><label class="text-primary">N/D</label></br> &nbsp &nbsp</br>
                <label class="text-primary">Si ambulancia, Notas de los servicios emergencias antes de llega </label></br>
                <textarea name="AmbulanciaNota"  id="AmbulanciaNota" class="form-control" rows="3" ></textarea> </br> 
                <label class="text-primary">Medicaciones antes de llegada</label></br>
                <textarea name="MedicamentosAllegada"  id="MedicamentosAllegada" class="form-control" rows="3" ></textarea> </br> 
                <label class="text-primary">Intervenciones antes de llegada </label></br>
                <textarea name="IantesLLegada"  id="IantesLLegada" class="form-control" rows="3" ></textarea> </br> 
                <label class="text-primary">Signos vitales iniciales</label></br>                
                <label class="text-primary">Hora</label>
                <input type="text" id="HoraV" name="HoraV" size="6%" placeholder="24 Horas" >
                <label class="text-primary">Pulso</label>
                <input type="text" id="PulsoA" name="PulsoA" size="6%">
                <label class="text-primary">FR</label>
                <input type="text" id="frA" name="frA"size="6%" >
                <label for="ms" class="text-primary">Presion arterial</label>
                <input type="text" id="ParterialA" name="ParterialA" size="2%" placeholder=" --/--" >                            
                <label for="Oc" class="text-primary">Temperatura:</label>
                <input type="text" name="temperaturaA" id="temperaturaA" size="10%"> 
                <label class="text-primary">SaO2</label>
                <input type="text" name="POa" id="POa" size="3%" placeholder=" - - %">
                <button type="button" value="registrarSALL" onclick="javascript:SignosVAntesLLegada1(); javascript:desactiva_Btn(this);" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-ok"></span></button>                
                <button type="button"  align="center" onclick="javascript:ocultarSA1();" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-plus"></span></button> <span id="mensajeVitales"></span> </br>             
                <div id='ocultoSA1' style='display:none;'>                
                <label class="text-primary">Hora</label>
                <input type="text" id="HoraVV" name="HoraVV" size="6%" placeholder="24 Horas">
                <label class="text-primary">Pulso</label>
                <input type="text" id="PulsoAA" name="PulsoAA" size="6%">
                <label class="text-primary">FR</label>
                <input type="text" id="frAA" name="frAA"size="6%" >
                <label for="ms" class="text-primary">Presion arterial</label>
                <input type="text" id="ParterialAA" name="ParterialAA" size="2%" placeholder=" --/--" >                            
                <label for="Oc" class="text-primary">Temperatura:</label>
                <input type="text" name="temperaturaAA" id="temperaturaAA" size="10%">
                <label class="text-primary">SaO2</label>
                <input type="text" name="POaa" id="POaa" size="3%" placeholder=" - - %" > 
                <button type="button" value="registrarSAALL" onclick="javascript:SignosVAntesLLegada2(); javascript:desactiva_Btn(this);" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-ok"></span></button> 
                <button type="button"  align="center" onclick="" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-plus"></span></button><span id="mensajeVitales2"></span> </br>  
                </div>

                <label class="text-primary">Notas de triage</label></br>
                <textarea name="NotaTriage"  id="NotaTriage" class="form-control" rows="3"></textarea> </br> 
<!--
                <label class="text-primary">Signos vitales llegando</label></br>
                <label><h5><b>HHMM</b></h5></label> &nbsp &nbsp
                <label class="text-primary">Pulso</label>
                <input type="text" id="PulsoD" name="PulsoD" size="6%" tabindex="13">
                <label class="text-primary">FR</label>
                <input type="text" id="frD" name="frD"size="6%" >
                <label for="ms" class="text-primary">Presion arterial</label>
                <input type="text" id="ParterialD" name="ParterialD" size="2%" placeholder=" --/--" >                            
                <label for="Oc" class="text-primary">Temperatura:</label>
                <input type="text" name="temperaturaD" id="temperaturaD" size="10%" tabindex="14">                 
                <button type="button" tabindex="" align="center" onclick="javascript:SignosVllegando(); javascript:desactiva_Btn(this);" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-ok"></span></button> 
               <button type="button" tabindex="" align="center" onclick="" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-plus"></span></button><span id="mensajeVitalesLLegando"></span></br>
-->
                <label class="text-primary">Otra información</label></br>
                <textarea name="OtraInfo"  id="OtraInfo" class="form-control" rows="3" ></textarea> </br> 
                 <center>
                 <b><div id="mensajeTriaje" class="text-success"></div></b>
             </center> 
                <center>
                <button type="button"  id="enviarTriage" name="enviarTriage" align="center" onclick='triaje(); DesapareceBtn(this.id); validaTriage();' class="btn btn-primary btn-lg">Registrar triage</button> 
                <button type="button"  id="ModificaTriage" style="display: none;" name="ModificaTriage" align="center" onclick='UpdateTriaje(); validaTriage();' class="btn btn-info btn-lg">Actualizar triage</button>
                </center>           
        </form> 
            
        </div>
<div id="Evaluacion" name="Evaluacion" >
          <h4  id="MostrarEva" name="MostrarEva" onclick="ApareceForm('formularioEva'); DesapareceSPN(this.id); ApareceSPN('OcultarEva'); "    style="display: none;">   <b> <span class="glyphicon glyphicon-chevron-right" ></span><b> 3. Evaluación</b></h4>
          <h4 id="OcultarEva" name="OcultarEva"  onclick="DesapareceForm('formularioEva');  DesapareceSPN(this.id); ApareceSPN('MostrarEva');"><b> <span class="glyphicon glyphicon-chevron-down" > </span> 3. Evaluación </b></h4>          
  <form name="formularioEva" id="formularioEva">                       
 

<label class="text-primary">Hora de contacto con el medico </label>
                <input type="text" id="HoraContactoMedico"  name="HoraContactoMedico" size="10%" required placeholder="HH:MM">
                <label class="text-primary">Medico a cargo</label>
                <input type="text" id="MedicoAcargo" name="MedicoAcargo" size="60%" placeholder="Nombre de medico"></br></br> 
                <label class="text-primary">EPS&nbsp</label>
                <input type="text" id="Eps" name="Eps" size="60%" placeholder="Nombre EPS"></br></br>
                <label class="text-primary">Interno&nbsp</label>
                <input type="text" id="Interno" name="Interno" size="60%" placeholder="Nombre Interno"></br></br>
                <label class="text-primary">Externo</label>
                <input type="text" id="Externo" name="Externo" size="60%" placeholder="Nombre Externo"></br></br> 
                <label class="text-primary">Digitalizador</label>
                <input type="text" id="Otro" name="Otro" size="60%" placeholder="Nombre otro"></br></br> 
                <label class="text-primary">Motivo de la consulta</label>   
                <input type="text" id="MotConsulta" name="MotConsulta" class="form-control" placeholder="Motivo de consulta"></br></br>
                <label class="text-primary" id="HisEnfACT" name="HisEnfACT">Historia de la enfermedad actual</label></br> 
                <textarea name="HistoriaEnfActual"  class="form-control" id="HistoriaEnfActual" rows="3" ></textarea> </br> 
                <div class="row"> <!--div de fila-->
                       <div class="col-sm-6">  <!--div de columna-->    
                          <label class="text-primary" id="HistoMedica">Historia Medica</label></br> 
                          <textarea name="HistoriaMedica"  class="form-control" id="HistoriaMedica" rows="3" size="50%" ></textarea> </br>                
                       </div>                    
                          <div class="col-sm-6">                    
                             <label class="text-primary">Quirurgica</label></br> 
                             <textarea name="HistoriaQuirurgica"  class="form-control" id="HistoriaQuirurgica" rows="3" size="50%" ></textarea> </br>                 
                          </div>
                </div>
                <div class="row"> <!--div de fila-->
                       <div class="col-sm-6">  <!--div de columna-->    
                          <label class="text-primary">Familia</label></br> 
                          <textarea name="HistoriaFamilia"  class="form-control" id="HistoriaFamilia" rows="3" size="50%" ></textarea> </br>                
                       </div>                    
                          <div class="col-sm-6">                    
                             <label class="text-primary">Social</label></br> 
                             <textarea name="HistoriaSocial"  class="form-control" id="HistoriaSocial" rows="3" size="50%" ></textarea> </br>                 
                          </div>
                </div>
                <div class="row"> <!--div de fila-->
                       <div class="col-sm-6">  <!--div de columna-->    
                          <label class="text-primary">Medicaciones</label></br> 
                          <textarea name="HistoriaMedicaciones"  class="form-control" id="HistoriaMedicaciones" rows="3" size="50%" ></textarea> </br>                
                       </div>                    
                          <div class="col-sm-6">                    
                             <label class="text-primary">Alergias</label></br> 
                             <textarea name="HistoriaAlergias"  class="form-control" id="HistoriaAlergias" rows="3" size="50%" ></textarea> </br>                 
                          </div>
                </div>
                <center>
                 <b><div id="mensajeEvaluacion" class="text-success"></div></b>
             </center> 
                <center>
                <button type="button"  name="EnviaEvaluacion" id="EnviaEvaluacion" align="center" onclick="javascript:EvaluacionPac(); javascript:DesapareceBtn(this.id); javascript:validaEvaluacion();" class="btn btn-primary btn-lg">Registrar evaluación</button> 
                <button type="button"  style="display: none;" id="ModificaEnvEva" name="ModificaEnvEva" align="center" onclick="javascript:UpdateEvaluacionPac(); javascript:validaEvaluacion();" class="btn btn-info btn-lg">Actualizar evaluación</button> 
               </center>              
        </form>  
        </div>
<!--empieza otro div-->
<div id="RevisionSistemas" name="RevisionSistemas">

          <h4  id="MostrarRevSis" name="MostrarRevSis" onclick="ApareceForm('formularioRevSis'); DesapareceSPN(this.id); ApareceSPN('OcultarRevSis'); "    >   <b> <span class="glyphicon glyphicon-chevron-right" ></span><b> 4. Revisión de sistemas</b></h4>
          <h4 id="OcultarRevSis" name="OcultarRevSis"  onclick="DesapareceForm('formularioRevSis');  DesapareceSPN(this.id); ApareceSPN('MostrarRevSis');" style="display: none;"><b> <span class="glyphicon glyphicon-chevron-down" > </span> 4. Revisión de sistemas </b></h4>          
 <div id="FrmRevSS"><span id ="btnDropDownRS" name="btnDropDownRS"></span>
  <form name="formularioRevSis" id="formularioRevSis">                       
 
<label class="positivo"><b>+</b> </label><label class="negativo"><b>-&nbsp&nbsp&nbsp&nbsp&nbsp</b> </label><label><b>   Descripcion de los positivos</b> </label></br>
<label class="text-primary"><b>General</b> </label>
<span class="radioP"></span><input type="radio" name="generalP" id="generalP" value="Positivo"   />
<span class="radioN"></span><input type="radio" name="generalP" id="generalP" value="Negativo" checked />
<input type="text" id="DescGeneral" name="DescGeneral" size="100%" placeholder="Ingrese descripción general"></br></br>

<label class="text-primary" ><b>Ojos&nbsp&nbsp&nbsp&nbsp&nbsp</b> </label>
<span class="radioP"></span><input type="radio" name="Ojos" value="Positivo" id="Ojos"  />
<span class="radioN"></span><input type="radio" name="Ojos" value="Negativo" id="Ojos" checked/>
<input type="text" id="DescOjos" name="DescOjos" size="100%" placeholder="Ingrese descripción ojos"></br></br>

<label class="text-primary" ><b>ORL&nbsp&nbsp&nbsp&nbsp&nbsp</b> </label>
<span class="radioP"></span><input type="radio" name="ORL" value="Positivo" id="ORL"  />
<span class="radioN"></span><input type="radio" name="ORL" value="Negativo" id="ORL" checked/>
<input type="text" id="DescORL" name="DescORL" size="100%" placeholder="Ingrese descripción ORL"></br></br>

<label class="text-primary" ><b>CV&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b> </label> 
<span class="radioP"></span><input type="radio" name="CV" value='Positivo' id="CV" checked="" />
<span class="radioN"></span><input type="radio" name="CV" value='Negativo' id="CV" checked/>
<input type="text" id="DescCV" name="DescCV" size="100%" placeholder="Ingrese descripción CV"></br></br>

<label class="text-primary"><b>Resp&nbsp&nbsp&nbsp&nbsp</b> </label>
<span class="radioP"></span><input type="radio" name="RESP" value="Positivo" id="RESP"  />
<span class="radioN"></span><input type="radio" name="RESP" value="Negativo" id="RESP" checked/>
<input type="text" id="DescRESP" name="DescRESP" size="100%" placeholder="Ingrese descripción RESP"></br></br>

<label class="text-primary" ><b>GI&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b> </label>
<span class="radioP"></span><input type="radio" name="GI" value="Positivo" id="GI"  />
<span class="radioN"></span><input type="radio" name="GI" value="Negativo" id="GI" checked/>
<input type="text" id="DescGI" name="DescGI" size="100%" placeholder="Ingrese descripción GI"></br></br>

<label class="text-primary" ><b>GU&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b> </label>
<span class="radioP"></span><input type="radio" name="GU" value="Positivo" id="GU"  />
<span class="radioN"></span><input type="radio" name="GU" value="Negativo" id="GU" checked/>
<input type="text" id="DescGU" name="DescGU" size="100%" placeholder="Ingrese descripción GU"></br></br>

<label class="text-primary" ><b>MSQ&nbsp&nbsp&nbsp&nbsp&nbsp</b> </label>
<span class="radioP"></span><input type="radio" name="MSQ" value="Positivo" id="MSQ"  />
<span class="radioN"></span><input type="radio" name="MSQ" value="Negativo" id="MSQ" checked/>
<input type="text" id="DescMSQ" name="DescMSQ" size="100%" placeholder="Ingrese descripción MSQ"></br></br>

<label class="text-primary"><b>Piel&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b> </label>
<span class="radioP"></span><input type="radio" name="Piel" value="Positivo" id="Piel"  />
<span class="radioN"></span><input type="radio" name="Piel" value="Negativo" id="Piel" checked/>
<input type="text" id="DescPiel" name="DescPiel" size="100%" placeholder="Ingrese descripción Piel"></br></br>

<label class="text-primary" ><b>Neuro&nbsp&nbsp&nbsp</b> </label>
<span class="radioP"></span><input type="radio" name="Neuro" value="Positivo" id="Neuro"  />
<span class="radioN"></span><input type="radio" name="Neuro" value="Negativo" id="Neuro" checked/>
<input type="text" id="DescNeuro" name="DescNeuro" size="100%" placeholder="Ingrese descripción Neuro"></br></br>

<label class="text-primary" ><b>Psiq&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b> </label>
<span class="radioP"></span><input type="radio" name="Psiq" value="Positivo" id="Psiq"  />
<span class="radioN"></span><input type="radio" name="Psiq" value="Negativo" id="Psiq" checked/>
<input type="text" id="DescPsiq" name="DescPsiq" size="100%" placeholder="Ingrese descripción Psiq"></br></br>

<label class="text-primary" ><b>Endoc&nbsp&nbsp&nbsp</b> </label> 
<span class="radioP"></span><input type="radio" name="Endoc" value="Positivo" id="Endoc"  />
<span class="radioN"></span><input type="radio" name="Endoc" value="Negativo" id="Endoc" checked/>
<input type="text" id="DescEndoc" name="DescEndoc" size="100%" placeholder="Ingrese descripción Endoc"></br>

<label class="text-primary"><b>Otros reseña</b> </label>
<span class="radioP"></span><input type="radio" name="Otros" value="Positivo" id="Otros"  />
<span class="radioN"></span><input type="radio" name="Otros" value="Negativo" id="Otros" checked/>
<input type="text" id="DescOtros" name="DescOtros" size="100%" placeholder="Ingrese descripción Otros"></br></br>
             
                <center>
                 <b><div id="mensajeRevision" class="text-success"></div></b>
             </center> 
                <center>
                <button type="button"  name="EnviaRevSist" id="EnviaRevSist" align="center" onclick="javascript:RevSistemas(); javascript:DesapareceBtn(this.id);" class="btn btn-primary btn-lg">Registrar revisión de sistemas</button> 
                <button type="button"  id="ModificaEnvaiRevS" name="ModificaEnvaiRevS" style="display: none;"align="center" onclick="javascript:UpdateRevSistemas();" class="btn btn-info btn-lg">Actualizar revisión de sistemas</button> 
               </center>              
        </form>
     </div>       
 </div>  
<!--empieza otro div-->
<div id="ExFisico" name="ExFisico" >
          <h4  id="MostrarExFis" name="MostrarExFis" onclick="ApareceForm('formularioExFis'); DesapareceSPN(this.id); ApareceSPN('OcultarExFis'); "    style="display: none;">   <b> <span class="glyphicon glyphicon-chevron-right" ></span><b> 5. Examen Fisico</b></h4>
          <h4 id="OcultarExFis" name="OcultarExFis"  onclick="DesapareceForm('formularioExFis');  DesapareceSPN(this.id); ApareceSPN('MostrarExFis');"><b> <span class="glyphicon glyphicon-chevron-down" > </span> 5. Examen Fisico</b></h4>          

  <form name="formularioExFis" id="formularioExFis" >                       
 <label class="text-primary">Signos vitales iniciales</label>&nbsp&nbsp&nbsp&nbsp&nbsp
 <input type="checkbox" name="SiSignosEntrar" value="Si" id="SiSignosEntrar" onclick="javascript:CargaSVIniciales(); javascript:MuestraVitInicalesExF();" /></br>
 <div id="SvInciales" name="SvInciales" style='display:none;'>
                <label class="text-primary">Hora</label>
                <input type="text" id="HoraSvIniciales" name="HoraSvIniciales" size="6%" placeholder="24 Horas" >
                <label class="text-primary">Pulso</label>
                <input type="text" id="PulsoEntrarInicial" name="PulsoEntrarInicial" size="6%" >
                <label class="text-primary">FR</label>
                <input type="text" id="frEntrarInicial" name="frEntrarInicial"size="6%" >
                <label for="ms" class="text-primary">Presion arterial</label>
                <input type="text" id="ParterialEntrarInicial" name="ParterialEntrarInicial" size="2%" placeholder=" --/--" >                            
                <label for="Oc" class="text-primary">Temperatura:</label>
                <input type="text" name="temperaturaEntrarInicial" id="temperaturaEntrarInicial" size="10%" > 
 </div >
                <label class="text-primary">Signos vitales examen fisico</label></br>
                <label class="text-primary">Hora</label>
                <input type="text" id="HoraSvExFisico" name="HoraSvExFisico" size="6%" placeholder="24 Horas" >
                <label class="text-primary">Pulso</label>
                <input type="text" id="PulsoEntrar" name="PulsoEntrar" size="6%" >
                <label class="text-primary">FR</label>
                <input type="text" id="frEntrar" name="frEntrar"size="6%" >
                <label for="ms" class="text-primary">Presion arterial</label>
                <input type="text" id="ParterialEntrar" name="ParterialEntrar" size="2%" placeholder=" --/--" >                            
                <label for="Oc" class="text-primary">Temperatura:</label>
                <input type="text" name="temperaturaEntrar" id="temperaturaEntrar" size="10%" > 
                <label class="text-primary">SaO2</label>
                <input type="text" name="POsv" id="POsv" size="3%" placeholder=" - - %" > 
                <button type="button" value="registrarLlegar" onclick="javascript:SignosVExFisico(); javascript:desactiva_Btn(this);" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-ok"></span></button>                
                <button type="button" align="center" onclick="javascript:ocultarSA1();" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-plus"></span></button> <span id="mensajeVitalesEntrando"></span> </br>

<label class="positivo"><b><h3>+&nbsp&nbsp&nbsp-</h3></b> </label>&nbsp&nbsp&nbsp&nbsp&nbsp</b> </label><label><b>   Descripcion de los positivos</b> </label></br>
<label class="text-primary"><b>General</b> </label>
<span class="radioP"></span><input type="radio" name="generalFis" id="generalFis" value="Positivo"   />
<span class="radioN"></span><input type="radio" name="generalFis" id="generalFis" value="Negativo" checked="" />
<input type="text" id="DescGeneralFis" name="DescGeneralFis" size="100%" placeholder="Ingrese descripción general examen fisico"></br></br>

<label class="text-primary" ><b>Ojos&nbsp&nbsp&nbsp&nbsp&nbsp</b> </label>
<span class="radioP"></span></span><input type="radio" name="OjosFis" id="OjosFis" value="Positivo"   />
<span class="radioN"></span></span><input type="radio" name="OjosFis" id="OjosFis" value="Negativo" checked="" />
<input type="text" id="DescOjosFis" name="DescOjosFis" size="100%" placeholder="Ingrese descripción ojos examen fisico"></br></br>

<label class="text-primary" ><b>ORL&nbsp&nbsp&nbsp&nbsp&nbsp</b> </label>
<span class="radioP"></span><input type="radio" name="ORLFis" id="ORLFis" value="Positivo"   />
<span class="radioN"></span><input type="radio" name="ORLFis" id="ORLFis" value="Negativo" checked="" />

<input type="text" id="DescORLFis" name="DescORLFis" size="100%" placeholder="Ingrese descripción ORL examen fisico"></br></br>

<label class="text-primary" ><b>CV&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b> </label> 
<span class="radioP"></span><input type="radio" name="CVFis" id="CVFis" value="Positivo"   />
<span class="radioN"></span><input type="radio" name="CVFis" id="CVFis" value="Negativo" checked="" />

<input type="text" id="DescCVFis"Fis name="DescCVFis" size="100%" placeholder="Ingrese descripción CV examen fisico"></br></br>

<label class="text-primary"><b>Resp&nbsp&nbsp&nbsp&nbsp</b> </label>
<span class="radioP"></span><input type="radio" name="RESPFis" id="RESPFis" value="Positivo"   />
<span class="radioN"></span><input type="radio" name="RESPFis" id="RESPFis" value="Negativo" checked="" />

<input type="text" id="DescRESPFis" name="DescRESPFis" size="100%" placeholder="Ingrese descripción RESP examen fisico"></br></br>

<label class="text-primary" ><b>GI&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b> </label>
<span class="radioP"></span><input type="radio" name="GIFis" id="GIFis" value="Positivo"   />
<span class="radioN"></span><input type="radio" name="GIFis" id="GIFis" value="Negativo" checked="" />

<input type="text" id="DescGIFis" name="DescGIFis" size="100%" placeholder="Ingrese descripción GI examen fisico"></br></br>

<label class="text-primary" ><b>GU&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b> </label>
<span class="radioP"></span><input type="radio" name="GUFis" id="GUFis" value="Positivo"   />
<span class="radioN"></span><input type="radio" name="GUFis" id="GUFis" value="Negativo"  checked="" />
<input type="text" id="DescGUFis" name="DescGUFis" size="100%" placeholder="Ingrese descripción GU examen fisico"></br></br>

<label class="text-primary" ><b>MSQ&nbsp&nbsp&nbsp&nbsp&nbsp</b> </label>
<span class="radioP"></span><input type="radio" name="MSQFis" value="Positivo" id="MSQFis"  />
<span class="radioN"></span><input type="radio" name="MSQFis" value="Negativo" id="MSQFis" checked="" />
<input type="text" id="DescMSQFis" name="DescMSQFis" size="100%" placeholder="Ingrese descripción MSQ examen fisico"></br></br>

<label class="text-primary"><b>Piel&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b> </label>
<span class="radioP"></span><input type="radio" name="PielFis" value="Positivo" id="PielFis"  />
<span class="radioN"></span><input type="radio" name="PielFis" value="Negativo" id="PielFis" checked="" />
<input type="text" id="DescPielFis" name="DescPielFis" size="100%" placeholder="Ingrese descripción Piel examen fisico"></br></br>

<label class="text-primary" ><b>Neuro&nbsp&nbsp&nbsp</b> </label>
<span class="radioP"></span><input type="radio" name="NeuroFis" value="Positivo" id="NeuroFis"  />
<span class="radioN"></span><input type="radio" name="NeuroFis" value="Negativo" id="NeuroFis" checked="" />
<input type="text" id="DescNeuroFis" name="DescNeuroFis" size="100%" placeholder="Ingrese descripción Neuro examen fisico"></br></br>

<label class="text-primary" ><b>Psiq&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b> </label>
<span class="radioP"></span><input type="radio" name="PsiqFis" value="Positivo" id="PsiqFis"  />
<span class="radioN"></span><input type="radio" name="PsiqFis" value="Negativo" id="PsiqFis" checked="" />
<input type="text" id="DescPsiqFis" name="DescPsiqFis" size="100%" placeholder="Ingrese descripción Psiq examen fisico"></br></br>

<label class="text-primary" ><b>Endoc&nbsp&nbsp&nbsp</b> </label> 
<span class="radioP"></span><input type="radio" name="EndocFis" value="Positivo" id="EndocFis"  />
<span class="radioN"></span><input type="radio" name="EndocFis" value="Negativo" id="EndocFis" checked="" />
<input type="text" id="DescEndocFis" name="DescEndocFis" size="100%" placeholder="Ingrese descripción Endoc examen fisico"></br></br>

<label class="text-primary"><b>Cabeza&nbsp</b> </label>
<span class="radioP"></span><input type="radio" name="CabezaFis" value="Positivo" id="CabezaFis"  />
<span class="radioN"></span><input type="radio" name="CabezaFis" value="Negativo" id="CabezaFis" checked="" />
<input type="text" id="DescCabezaFis" name="DescCabezaFis" size="100%" placeholder="Ingrese descripción Otros examen fisico"></br></br>

<label class="text-primary"><b>Cuello&nbsp&nbsp</b> </label>
<span class="radioP"></span><input type="radio" name="CuelloFis" value="Positivo" id="CuelloFis"  />
<span class="radioN"></span><input type="radio" name="CuelloFis" value="Negativo" id="CuelloFis" checked="" />
<input type="text" id="DescCuelloFis" name="DescCuelloFis" size="100%" placeholder="Ingrese descripción Cuello examen fisico"></br></br>

<label class="text-primary"><b>Abdomen</b> </label>
<span class="radioP"></span><input type="radio" name="AbdomenFis" value="Positivo" id="AbdomenFis"  />
<span class="radioN"></span><input type="radio" name="AbdomenFis" value="Negativo" id="AbdomenFis" checked="" />
<input type="text" id="DescAbdomensFis" name="DescAbdomensFis" size="100%" placeholder="Ingrese descripción Abdomen examen fisico"></br></br>

<label class="text-primary"><b>Pecho&nbsp&nbsp&nbsp</b> </label>
<span class="radioP"></span><input type="radio" name="PechoFis" value="Positivo" id="PechoFis"  />
<span class="radioN"></span><input type="radio" name="PechoFis" value="Negativo" id="PechoFis" checked="" />
<input type="text" id="DescPechoFis" name="DescPechoFis" size="100%" placeholder="Ingrese descripción Pecho examen fisico"></br></br>

<label class="text-primary"><b>Espalda</b> </label>
<span class="radioP"></span><input type="radio" name="EspaldaFis" value="Positivo" id="EspaldaFis"  />
<span class="radioN"></span><input type="radio" name="EspaldaFis" value="Negativo" id="EspaldaFis" checked="" />
<input type="text" id="DescEspaldaFis" name="DescEspaldaFis" size="100%" placeholder="Ingrese descripción Espalda examen fisico"></br></br>

<label class="text-primary"><b>Extremidades</b> </label>
<span class="radioP"></span><input type="radio" name="ExtremidadesFis" value="Positivo" id="ExtremidadesFis"  />
<span class="radioN"></span><input type="radio" name="ExtremidadesFis" value="Negativo" id="ExtremidadesFis" checked="" />
<input type="text" id="DescExtremidadesFis" name="DescExtremidadesFis" size="100%" placeholder="Ingrese descripción Extremidades examen fisico"></br></br>

                <center>
                 <b><div id="mensajeExamenFisico" class="text-success"></div></b>
             </center> 
                <center>
                <button type="button"  name="EnviaExFisico" id="EnviaExFisico" align="center" value="EnviarExFisico" onclick="javascript:ExamenFisico(); javascript:DesapareceBtn(this.id);"class="btn btn-primary btn-lg">Registrar examen fisico</button> 
                <button type="button"  style="display: none;" id="EditaExFisico" name="EditaExFisico" align="center" value="EditarExFisico" onclick="javascript:UpdateExamenFisico();"class="btn btn-info btn-lg">Actualizar examen fisico</button> 
               </center>              
        </form>  
 </div> 

<!--empieza otro div-->

<!--empieza otro div-->  
<h4  id="MostrarMecLesion" name="MostrarMecLesion" onclick="ApareceForm('marHeridas'); DesapareceSPN(this.id); ApareceSPN('OcultarMecLesion'); "    >   <b> <span class="glyphicon glyphicon-chevron-right" ></span><b> 5. Mecanismos y descripción de lesiones</b></h4>
<h4 id="OcultarMecLesion" name="OcultarMecLesion"  onclick="DesapareceForm('marHeridas');  DesapareceSPN(this.id); ApareceSPN('MostrarMecLesion');"style="display: none;"><b> <span class="glyphicon glyphicon-chevron-down" > </span> 5. Mecanismos y descripción de lesiones</b></h4>          
 <div id="marHeridas" name="marHeridas" >   
    <link rel="stylesheet" href="../inicio/tagging.css" type="text/css">
           
    <script type="text/javascript">
  $(document).ready(function(){
    var counter = 0;
    var mouseX = 0;
    var mouseY = 0;
    $("#imgtag img").click(function(e) { // make sure the image is click
      var imgtag = $(this).parent(); // get the div to append the tagging list
      mouseX = ( e.pageX - $(imgtag).offset().left ) - 5; // x and y axis
      mouseY = ( e.pageY - $(imgtag).offset().top ) - 5;
      $( '#tagit' ).remove( ); // remove any tagit div first
      $( imgtag ).append( '<div id="tagit"><div class="box"></div><div class="name"><div class="text">Ingresar la Informacion</div><input type="text" name="varPaciente" id="varPaciente" hidden="true" /><input type="textarea" name="txtname" id="tagname" /><input type="button" name="btnsave" value="Guardar" id="btnsave" /><input type="button" name="btncancel" value="Cancelar" id="btncancel" /></div></div>' );
         document.getElementById('varPaciente').value = document.getElementById('NoPaciente').value;
      $( '#tagit' ).css({ top:mouseY, left:mouseX });
      
      $('#tagname').focus();
       
    });
    
	// Save button click - save tags
    $( document ).on( 'click',  '#tagit #btnsave', function(){
    
      name = $('#tagname').val();
      idPaciente = $('#varPaciente').val();
		var img = $('#imgtag').find( 'img' );
		var id = $( img ).attr( 'id' );
      $.ajax({
        type: "POST", 
        url: "savetag.php", 
        data: "pic_id=" + id + "&idPaciente=" + idPaciente + "&name=" + name + "&pic_x=" + mouseX + "&pic_y=" + mouseY + "&type=insert",
        cache: true, 
        success: function(data){
          viewtag( id );
          $('#tagit').fadeOut();
        }
      });
      
    });
    	// Cancel the tag box.
    $( document ).on( 'click', '#tagit #btncancel', function() {
      $('#tagit').fadeOut();
    });
    	// mouseover the taglist
	$('#taglist').on( 'mouseover', 'li', function() {
      id = $(this).attr("id");
      $('#view_' + id).css({ opacity: 1.0 });
    }).on( 'mouseout', 'li', function( ) {
        $('#view_' + id).css({ opacity: 0.0 });
    });
	
	// mouseover the tagboxes that is already there but opacity is 0.
	$( '#tagbox' ).on( 'mouseover', '.tagview', function() {
		var pos = $( this ).position();
		$(this).css({ opacity: 1.0 }); // div appears when opacity is set to 1.
	}).on( 'mouseout', '.tagview', function( ) {
		$(this).css({ opacity: 0.0 }); // hide the div by setting opacity to 0.
	});
    	// Remove tags.
    $( '#taglist' ).on('click', '.remove', function() {
      id = $(this).parent().attr("id");
      // Remove the tag
	  $.ajax({
        type: "POST", 
        url: "savetag.php", 
        data: "tag_id=" + id + "&type=remove",
        success: function(data) {
			var img = $('#imgtag').find( 'img' );
			var id = $( img ).attr( 'id' );
			//get tags if present
			viewtag( id );
        }
      });
    });
	
	// load the tags for the image when page loads.
    var img = $('#imgtag').find( 'img' );
	var id = $( img ).attr( 'id' );
		viewtag( id ); // view all tags available on page load
    ,00
    function viewtag( pic_id )
    {
      // get the tag list with action remove and tag boxes and place it on the image.
	  $.post( "taglist.php" ,  "idPaciente=" + idPaciente, function( data ) {
	  	$('#taglist ol').html(data.lists);
		 $('#tagbox').html(data.boxes);
	  }, "json");
	
    }
    
    
  });
</script>
        
     
   
  <div id="imgtag" style="width:550px; height:550px;" > 
    <?php 
    $sql = "SELECT * FROM picture WHERE id=1";
    $qry = mysql_query( $sql );
    $rs = mysql_fetch_array( $qry );
    ?>
    <img style="width:100%;position:relative;top:-5px;left:0px;" id="<?php echo $rs['id']; ?>" src="<?php echo $rs['name']; ?>" /> 
     
    <div id="tagbox">
    </div>
     </div> 
     <div id="taglist" > 
         <h1>Listado de lesiones</h1>
    <ol> 
    </ol> 
  </div>   
</div>
<!--empieza otro div-->
<div id="EvaluacionPlan" name="EvaluacionPlan" >
 <br/><br/><br/>
          <h4  id="MostrarEvaPlan" name="MostrarEvaPlan" onclick="ApareceForm('formularioEvaPlan'); DesapareceSPN(this.id); ApareceSPN('OcultarEvaPlan'); "    style="display: none;">   <b> <span class="glyphicon glyphicon-chevron-right" ></span><b> 6. Evaluación y plan</b></h4>
          <h4 id="OcultarEvaPlan" name="OcultarEvaPlan"  onclick="DesapareceForm('formularioEvaPlan');  DesapareceSPN(this.id); ApareceSPN('MostrarEvaPlan');"><b> <span class="glyphicon glyphicon-chevron-down" > </span> 6. Evaluación y plan</b></h4>          
        <form name="formularioEvaPlan" id="formularioEvaPlan" > 
        <div>         
              <label class="text-primary"><b>Impresión clincia</b> </label> </br> 
              <textarea name="DiagDif"  id="DiagDif" class="form-control" rows="3"></textarea> </br> 
              <label class="text-primary"><b>Evolución clinica</b> </label> </br> 
              <textarea name="EvClinica"  id="EvClinica" class="form-control" rows="3"></textarea> </br> 
              <label class="text-primary"><b>Procesos</b> </label> </br> 
              <textarea name="Proces"  id="Proces" class="form-control" rows="3"></textarea> </br>
              <label class="text-primary"><b>Laboratorios e imágenes realizados</b> </label> </br> 
              <textarea name="LabImagens"  id="LabImagens" class="form-control" rows="3"></textarea> </br>
              <label class="text-primary"><b>Interconsultas</b> </label> </br> 
              <textarea name="Consultas"  id="Consultas" class="form-control" rows="3"></textarea> </br>
        </div>           
                <center>
                 <b><div id="mensajeEvaluacionPlan" class="text-success"></div></b>
               </center> 
                <center>
                <button type="button"  name="EnviaEvaYplan" id="EnviaEvaYplan" onclick="javascript:EvaluacionPlan(); javascript:DesapareceBtn(this.id);" class="btn btn-primary btn-lg">Registrar evaluación y plan</button> 
                 <button type="button"  id="EditaEvaPlan" name="EditaEvaPlan" style="display: none;"  onclick="javascript:UpdateEvaluacionPlan();" class="btn btn-info btn-lg">Actualizar evaluación y plan</button> 
               </center>              
        </form>  
 </div>  

<div id="Medicamentos" name="Medicamentos" >

          <h4  id="MostrarMedicamentos" name="MostrarMedicamentos" onclick="ApareceForm('FormMedicamentos'); DesapareceSPN(this.id); ApareceSPN('OcultarMedicamentos'); "    style="display: none;">   <b> <span class="glyphicon glyphicon-chevron-right" ></span><b> 7. Medicamentos</b></h4>
          <h4 id="OcultarMedicamentos" name="OcultarMedicamentos"  onclick="DesapareceForm('FormMedicamentos');  DesapareceSPN(this.id); ApareceSPN('MostrarMedicamentos');"><b> <span class="glyphicon glyphicon-chevron-down" > </span> 7. Medicamentos</b></h4>            
       
        <form name="FormMedicamentos" id="FormMedicamentos" > 
        <div>         
              <label class="text-primary"><b>Medicamentos suministrados</b> </label> </br> 
              <textarea name="medSuminis"  id="medSuminis" class="form-control" rows="3"></textarea> </br>             
        </div>           
                <center>
                 <b><div id="mensajeMedicamentos" class="text-success"></div></b>
               </center> 
                <center>
                <button type="button"  name="EnviaMedicamentos" id="EnviaMedicamentos" onclick="javascript:Medicamentos(); javascript:DesapareceBtn(this.id);" class="btn btn-primary btn-lg">Registrar medicamentos</button> 
                 <button type="button"  id="EditaMedicamentos" name="EditaMedicamentos" style="display: none;"  onclick="javascript:UpdateMedicmentos();" class="btn btn-info btn-lg">Actualizar medicamentos</button> 
               </center>              
        </form>  

</div>  


                <div id = "imglb" name="imglb"> <!--Div para subir la imagen a base de datos-->
                
                <h4  id="MostrarSubirImg" name="MostrarSubirImg" onclick="ApareceForm('subida'); DesapareceSPN(this.id); ApareceSPN('OcultarSubirImg');"    >   <b> <span class="glyphicon glyphicon-chevron-right" ></span><b> 8. Imagenes del paciente</b></h4>
                <h4 id="OcultarSubirImg" name="OcultarSubirImg"  onclick="DesapareceForm('subida');  DesapareceSPN(this.id); ApareceSPN('MostrarSubirImg');" style="display: none;"><b> <span class="glyphicon glyphicon-chevron-down" > </span> 8. Imagenes del paciente</b></h4>            
                  <div>
                  <form id="subida" name="subida"> 
                  <center>
                             
                    <input type="file" id="foto" name="foto" class="clsFile" /></br>
                    
                    <textarea id="desc" name="desc" placeholder="Ingrese la descripcion de la imagen" class="form-control" rows="3"></textarea></br>
                   
                    <input type="submit" value="Agregar imágen" id="agregar" class="btn btn-success"/>                    
                    <img src="../imagenes/cargando.gif" class="cargando" id="cargando"/>                    
                   </center>
                  </form>
<!--fragmento php que muestra las imagenes subidas-->
<form id="MuestraImg" name="MuestraImg"> 
<div class="form-group">
                                <div id="ImgsList"></div> 
                            </div>

<div  onclick='ocultarVentana();' id="miVentana"  name="miVentana"  style="position: fixed; width: 100%; height: 100%; top: 0; left: 0;  display:none;  background-color: rgba(0,0,0,0.9);">
<div id="miVentanaIMG"  name="miVentanaIMG"  style="position: fixed; left: 20%;  ">   
 </div>

</div>

<ul class="fotos" id="fotos">
<Script type="text/javascript">
 var variableJS = var CodigoPaciente = document.getElementById('NoPaciente').value; </script>
      <?php
      error_reporting(0);
                include('../conexion/conectar.php');
                mysql_select_db($bd,$conexion);
        

$variablePHP = "<script type='text/javascript'> document.write(variableJS); </script>";


        $comprobar = mysql_num_rows( mysql_query("SELECT * FROM imgdir WHERE InfPaciente_idPaciente = '$variablePHP'"));
        mysql_select_db($bd,$conexion);
        
        if($comprobar>0){
          
          $fotos = mysql_query("SELECT * FROM imgdir WHERE InfPaciente_idPaciente = '$variablePHP'");
          
          while($fotos2 = mysql_fetch_array($fotos)){
           
            echo 
            '
            <img src="../ImagenesPac/'.$fotos2['ruta_img'].'" onclick="javascript:this.width=450;this.height=338"  title="'.$fotos2['desc_img'].'"></a></br>          
                <p align="left" style="font-size:12px;">'.$fotos2["desc_img"].'</p> </br>
                       ';
                }          
        }else{          
                    
        }
            ?>
</ul>
                    </form>
</div>   
               

<!--termina otro div-->
<!--empieza otro div-->
<div id="DivDisposicion" name="DivDisposicion" >
                <h4  id="MostrarDispo" name="MostrarDispo" onclick="ApareceForm('formularioDisposicion'); DesapareceSPN(this.id); ApareceSPN('OcultarDispo');"   style="display: none;">   <b> <span class="glyphicon glyphicon-chevron-right" ></span><b> 9. Disposición</b></h4>
                <h4 id="OcultarDispo" name="OcultarDispo"  onclick="DesapareceForm('formularioDisposicion');  DesapareceSPN(this.id); ApareceSPN('MostrarDispo');"  ><b> <span class="glyphicon glyphicon-chevron-down" > </span> 9. Disposición</b></h4>              
        <form name="formularioDisposicion" id="formularioDisposicion"> 
        <div> 
        <label class="text-primary">Hora disposición</label>
            <input type="text" name="HoraDispo"  id="HoraDispo" placeholder="24 Horas" /></br>
            <label class="text-primary">Dado de alta</label>
            <input type="radio" name="Dispo" value="1" id="Dispo" />&nbsp&nbsp &nbsp &nbsp &nbsp &nbsp
            <label class="text-primary"> Admitido(a) </label>
            <input type="radio" name="Dispo" value="2" id="Dispo" />&nbsp&nbsp &nbsp &nbsp &nbsp &nbsp
            <label class="text-primary">Transferido(a) </label>
            <input type="radio" name="Dispo" value="3" id="Dispo" />&nbsp&nbsp &nbsp &nbsp &nbsp &nbsp   
            <label class="text-primary">se fue contraindicado(a)</label>               
            <input type="radio" name="Dispo" value="4" id="Dispo" />&nbsp&nbsp &nbsp
            <label class="text-primary">Fugado(a)</label>             
            <input type="radio" name="Dispo" value="5" id="Dispo" />&nbsp&nbsp &nbsp
            <label class="text-primary">Murió </label>           
            <input type="radio" name="Dispo" value="6" id="Dispo" />&nbsp&nbsp &nbsp 
            <label class="text-primary">N/D </label>            
            <input type="radio" name="Dispo" value="7" id="Dispo"  checked /></br>
              <label class="text-primary"><b>Otra información de disposición(Plan educacional, Rp, etc.)</b> </label> </br> 
              <textarea name="OtraInfoDisp"  id="OtraInfoDisp" class="form-control" rows="3"></textarea> </br> 
              <h4 style="display: none;"><b>Notas finales</b></h4>
              <label class="text-primary" style="display: none;"><b>Notas del medico a cargo</b> </label> </br> 
              <textarea name="NotasMedicoCargo"  id="NotasMedicoCargo" class="form-control" rows="3" style="display: none;"></textarea></br> 
              <label class="text-primary" style="display: none"><b>Otras notas</b> </label> </br> 
              <textarea name="OtrasNotas"  id="OtrasNotas" class="form-control" rows="3" style="display: none"></textarea> </br>
              <div class="row"> <!--div de fila-->
                       <div class="col-sm-6">  <!--div de columna-->  
                        <h4><b>Interno / Externo</b></h4>    
                          <label class="text-primary" id="HistoMedica">Vi al paciente</label>&nbsp &nbsp &nbsp &nbsp &nbsp
                          <input type="checkbox" name="ViPacienteRS" value="Si" id="ViPacienteRS"/></br></br>
                          <label class="text-primary" id="HistoMedica">Tiempo del contacto</label></br>
                          <input type="text" id="TiempoContatoRS" name="TiempoContatoRS" size="10%" placeholder="ingrese tiempo"></br></br>
                          <label class="text-primary" id="HistoMedica">Firma</label></br>
                          <input type="text" id="FirmaRS" name="FirmaRS" size="30%" placeholder="ingrese firma Residente"></br></br> 
                       </div>                                           
                          <div class="col-sm-6">                    
                             <h4><b>Medico a cargo</b></h4>    
                          <label class="text-primary">Vi al paciente</label>&nbsp &nbsp &nbsp &nbsp &nbsp
                          <input type="checkbox" name="ViPacienteMD" value="Si" id="ViPacienteMD"  /></br></br>
                          <label class="text-primary">Tiempo del contacto</label></br>
                          <input type="text" id="TiempoContatoMD" name="TiempoContatoMD" size="10%" placeholder="Ingrese tiempo"></br></br>
                          <label class="text-primary">Firma</label></br>
                          <input type="text" id="FirmaMD" name="FirmaMD" size="30%" placeholder="Ingrese firma medico"></br></br>                 
                          </div>
                </div>
              
        </div>           
                <center>
                 <b><div id="mensajeDisposicion" name="mensajeDisposicion" class="text-success"></div></b>
               </center> 
                <center>

                <button type="button"  name="EnviaDispo" id="EnviaDispo" onclick="javascript:Disposicion(); javascript:DesapareceBtn(this.id);" class="btn btn-primary btn-lg">Registrar Disposición</button> 
                <button type="button"  style="display: none;" id="EditaEnviaDispo" name="EditaEnviaDispo" onclick="javascript:UpdateDisposicion();" class="btn btn-info btn-lg">Actualizar Disposición</button> 
               </center>              
        
</form>  
</div> 
                        <center>                        
                        <button type="button"  class="btn btn-warning btn-lg" onclick="javascript:abrirReporte();"> <span class="glyphicon glyphicon-print" id="btnImp" name="btnImp">Imprimir</span></button> 
                        
                        <button type="button"  class="btn btn-success btn-lg" onClick="window.open('infBasicP.php')" ><span class="glyphicon glyphicon-plus"  > Nuevo Paciente</span></button>  
                        </center>
<!--termina otro div-->
</div><br/><br/>


<div id="RecOperatorio" name="RecOperatorio" >
 <br/><br/><br/>
          <h4  id="MostrarRecOperatorio" name="MostrarRecOperatorio" onclick="ApareceForm('formRecOpera'); DesapareceSPN(this.id); ApareceSPN('OcultarRecOperatorio'); "  >   <b> <span class="glyphicon glyphicon-chevron-right" ></span><b> Record Operatorio</b></h4>
          <h4 id="OcultarRecOperatorio" name="OcultarRecOperatorio"  onclick="DesapareceForm('formRecOpera');  DesapareceSPN(this.id); ApareceSPN('MostrarRecOperatorio');" style="display: none;"><b> <span class="glyphicon glyphicon-chevron-down" > </span> Record Operatorio</b></h4>          
        
        <form name="formRecOpera" id="formRecOpera"> 
        <div>         

        <div class="row">
          <div class="col-md-4">                              
                     <label class="text-info">Registro Medico No.</label> </br> 
                     <textarea name="RegMedNo" id="RegMedNo" class="form-control" rows="1"></textarea>
                  </div>
                  <div class="col-md-4">                              
                     <label class="text-success">Diagnóstico preoperatorio </label> </br> 
                     <textarea name="DiagPreOpe" id="DiagPreOpe" class="form-control" rows="1"></textarea>
                  </div>
                  <div class="col-md-4">
                     <label class="text-success">Operación planeada </label> </br>
                     <textarea name="OpePlaneada"  id="OpePlaneada"  class="form-control" rows="1"></textarea> </br> 
                  </div>
        </div>
              <div class="row">
                  <div class="col-md-6">
                    <label class="text-success">Diagnóstico postoperatorio</label> </br> 
                     <textarea name="DiagPostOPe" id="DiagPostOPe" class="form-control" rows="1"></textarea>
                  </div>
                   
                     <div class="col-md-6">
                       <div class="form-inline">
                        <label class="text-success">Operación practicada </label> </br>
                        <input type="text" name="OpePracticade"  id="OpePracticade"  class="form-control" rows="1"  size="40%">
                        <button type="button" id="RegistrarOpePrac" name="RegistrarOpePrac" class="btn btn-primary btn-sm" onclick="javascript:OpePracticadaPaciente('OpePracticade');"><span class="glyphicon glyphicon-ok"></span></button>
                        <button type="button" id="ModalRegOpePracticada" name="ModalRegOpePracticada" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span></button><span id="mensajeOpPra" name="mensajeOpPra"></span>
                       <!--principio de ventana modal para agregar operacion practicada-->
                      
                   
                    <div class="modal fade" id="mostrarmodalOpePrac" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                      <div class="modal-dialog">
                         <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                             <h3>Agrege Descripciones de Operación Practicada</h3>
                            </div>
                                <div class="modal-body">
                                       <label class="text-muted">Operación Practicada 2:</label>
                                       </br>
                                       <input type="text" id="OpePra2" name="OpePra2" size="60%" >
<button type="button" id="RegOpePracti2" name="RegOpePracti2" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-ok" onclick="javascript:OpePracticadaPaciente('OpePra2');"></span></button><span id="mensajeOpPra2" name="mensajeOpPra2"></span>
                                       </br></br>
                                       <label class="text-muted">Operación Practicada 3:</label></br>
                                       <input type="text" id="OpePra3" name="OpePra3" size="60%" >
<button type="button" id="RegOpePracti2" name="RegOpePracti2" class="btn btn-primary btn-sm" onclick="javascript:OpePracticadaPaciente('OpePra3');"><span class="glyphicon glyphicon-ok"></span></button><span id="mensajeOpPra2" name="mensajeOpPra2"></span>
                                       </br></br>
                                       <label class="text-muted">Operación Practicada 4:</label></br>
                                       <input type="text" id="OpePra4" name="OpePra4" size="60%" >
<button type="button" id="RegOpePracti2" name="RegOpePracti2" class="btn btn-primary btn-sm" onclick="javascript:OpePracticadaPaciente('OpePra4');"><span class="glyphicon glyphicon-ok"></span></button><span id="mensajeOpPra2" name="mensajeOpPra2"></span>
                                       </br></br>
                                       <label class="text-muted">Operación Practicada 5:</label></br>
                                       <input type="text" id="OpePra5" name="OpePra5" size="60%" >
<button type="button" id="RegOpePracti2" name="RegOpePracti2" class="btn btn-primary btn-sm" onclick="javascript:OpePracticadaPaciente('OpePra5');"><span class="glyphicon glyphicon-ok"></span></button><span id="mensajeOpPra2" name="mensajeOpPra2"></span>
                                       </br></br>
                                </div>
                                            <b>
                                              <div   id="mensajeCirujano" name="mensajeCirujano" class="text-success">                                       
                                              </div>
                                            </b>
                                       <div class="modal-footer">
                                         
                                       <a href="#" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
                                       </div>
                          </div>
                      </div>
                  </div>
                       <!--finde ventana modal para agregar operacion practicada-->
                        </div>
                      <div id="suggestions"  style="display: none;"></div>
                  </div>
              </div>
                  <div class="row">
                     <div class="form-inline">
                        <div class="col-md-5" id="SOptionCiru">                          
                          <label class="text-success">Cirujano </label> </br>
                            <select class="form-control" id="CirujanOp" name="CirujanOp">
                             <?php
                             $queryCirujano = 'SELECT * FROM cirujano';
                             $resultC = mysql_query($queryCirujano) or die('Consulta fallida: ' . mysql_error());
                               while ($row = mysql_fetch_array($resultC))
                                {
                                 echo'<option value="'.$row['idCirujano'].'">'.$row['NombreComleto'].'</option>';
                                }
                             ?>
                          </select>
                          <button type="button" id="Abrmodal" name="Abrmodal" class="btn btn-primary btn-xs">+</button>
                    <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                      <div class="modal-dialog">
                         <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                             <h3>Ingrese los datos del Cirujano</h3>
                            </div>
                          <div class="modal-body">
                                <label class="text-muted">Nombre Completo:</label></br>
                                <input type="text" id="NomCirujano" name="NomCirujano" size="60%" ></br></br>
                                <label class="text-muted">Teléfono:</label></br>
                                <input type="text" id="TelCirujano" name="TelCirujano" size="60%" ></br></br>
                                <label class="text-muted">Dirección:</label></br>
                                <input type="text" id="DireCirujano" name="DireCirujano" size="60%" ></br></br>
                                <label class="text-muted">Especialidad:</label></br>
                                <input type="text" id="EspeCirujano" name="EspeCirujano" size="60%" ></br></br>
                         </div>
                         <b><div   id="mensajeCirujano" name="mensajeCirujano" class="text-success"></div></b>
                                    <div class="modal-footer">
                                      <button type="button"  name="EnviaCirujano" id="EnviaCirujano" onclick="javascript:NuevoCirujano();" class="btn btn-primary">Registrar datos del Cirujano</button> 
                                    <a href="#" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
                                    </div>
                          </div>
                      </div>
                  </div>

                          </div>
                        </div>
                        
                        <div class="col-md-7">
                           <label class="text-success">Ayudante </label> </br>
                           <textarea name="ayudante"  id="ayudante"  class="form-control" rows="1"></textarea> </br> 
                        </div>
                   </div>
                            <div class="row">
                               <div class="col-md-3">
                                 <label class="text-success">Anestesista</label> </br> 
                                  <select class="form-control" id="AnestOp" name="AnestOp"/>
                             <?php
                             $queryCirujano = 'SELECT * FROM anestesiologos';
                             $resultC = mysql_query($queryCirujano) or die('Consulta fallida: ' . mysql_error());
                               while ($row = mysql_fetch_array($resultC))
                                {
                                 echo'<option value="'.$row['idAnestesiologos'].'">'.$row['NombreAnes'].'</option>';
                                }
                             ?>
                          </select>
                             </div>
                               <div class="col-md-3">
                                  <label class="text-success">Anestesia </label> </br>
                                  <textarea name="Anestesia"  id="Anestesia"  class="form-control" rows="1"></textarea> </br> 
                               </div>
                               <div class="col-md-3">
                                  <label class="text-success">Instrumentista </label> </br>
                                  <textarea name="Instrumen"  id="Instrumen"  class="form-control" rows="1"></textarea> </br> 
                               </div>
                               <div class="col-md-3">
                                  <label class="text-success">Circulante </label> </br>
                                  <textarea name="Circulant"  id="Circulant"  class="form-control" rows="1"></textarea> </br> 
                               </div>
                           </div>
                                      <div class="row">
                                          <div class="col-md-3">
                                            <label class="small">Fecha </label> </br> 
                                             <input type="date" name="FechaOpe" id="FechaOpe" class="form-control" rows="1">
                                          </div>
                                          <div class="col-md-2">
                                             <label class="small">Hora iniciada </label> </br>
                                             <textarea name="HoraIniciOpe"  id="HoraIniciOpe"  class="form-control" rows="1"></textarea> </br> 
                                          </div>
                                          <div class="col-md-2">
                                             <label class="small">Hora finalizada </label> </br>
                                             <textarea name="HoraFinOpe"  id="HoraFinOpe"  class="form-control" rows="1"></textarea> </br> 
                                          </div>
                                          <div class="col-md-2">
                                             <label class="small">Rec. de compresas </label> </br>
                                             <textarea name="ReCompresas"  id="ReCompresas"  class="form-control" rows="1" onmouseover="return overlib('Recuento de compresas');" onmouseout="return nd();"></textarea> </br>
                                          </div>
                                          <div class="col-md-2">
                                             <label class="small">Drenajes (No. y tipo) </label> </br>
                                             <textarea name="Drenajes"  id="Drenajes"  class="form-control" rows="1"></textarea> </br> 
                                          </div>
                                          <div class="col-md-2">
                                             <label class="small">Piezas de eval. pat. </label> </br>
                                             <input type="text"  size="15%" name="PiezasEvaPat"  id="PiezasEvaPat"  class="form-control" rows="1" onmouseover="return overlib('Piezas de evaluación patológicas');" onmouseout="return nd();"> </br> 
                                          </div>
                                      </div>
                 <div class="row">                    
                    <div class="col-md-12">
                       <label class="text-success">Descripción de la operación. </label> </br>
                       <label class="small">(Posición, incisión, hallazgos, operación practicada, material de sutura, drenajes, complicaciones, condición del paciente al terminar la peración)</label> </br>
                       <textarea name="DescOperacion"  id="DescOperacion"  class="form-control" rows="12"></textarea> </br> 
                    </div>
                </div>
                         <div class="row">
                               <div class="col-md-3">
                                 <label class="text-success">Departamento</label> </br> 
                                 <select class="form-control" id="DepaOp" name="DepaOp" onmouseover="return overlib('Seleccione Departamento...');" onmouseout="return nd();"/>
                                  <?php
                                      $queryCirujano = 'SELECT * FROM departamento';
                                      $resultC = mysql_query($queryCirujano) or die('Consulta fallida: ' . mysql_error());
                                      while ($row = mysql_fetch_array($resultC))
                                       {
                                         echo'<option value="'.$row['idDepartamento'].'">'.$row['DescripcionDep'].'</option>';
                                       }
                                  ?>
                                 </select>

                               </div>
                               <div class="col-md-3">
                                  <label class="text-success">Servicio o unidad</label> </br>
                                  <select class="form-control" id="ServiUniOp" name="ServiUniOp"/>
                                  <?php
                                      $queryCirujano = 'SELECT * FROM serviciounidad';
                                      $resultC = mysql_query($queryCirujano) or die('Consulta fallida: ' . mysql_error());
                                      while ($row = mysql_fetch_array($resultC))
                                       {
                                         echo'<option value="'.$row['idServicioUnidad'].'">'.$row['DescripcionServ'].'</option>';
                                       }
                                  ?>
                                 </select>
                               </div>
                               <div class="col-md-3">
                                  <label class="text-success">Cama o cuna </label> </br>
                                  <select class="form-control" id="CamaCunaOp" name="CamaCunaOp" />
                                  <?php
                                      $queryCirujano = 'SELECT * FROM camacuna';
                                      $resultC = mysql_query($queryCirujano) or die('Consulta fallida: ' . mysql_error());
                                      while ($row = mysql_fetch_array($resultC))
                                       {
                                         echo'<option value="'.$row['idCamaCuna'].'">'.$row['DescripcionCamaCu'].'</option>';
                                       }
                                  ?>
                                 </select>
                               </div>
                               <div class="col-md-3">
                                  <label class="text-success">Medico jefe </label> </br>
                                  <textarea name="MedJefe"  id="MedJefe"  class="form-control" rows="1"></textarea> </br> 
                               </div>
                           </div>              
        </div>           
                <center>
                 <b><div id="mensajeREcOperatorio" class="text-success"></div></b>
               </center> 
                <center>
                <button type="button"  name="EnviaRecOperatorio" id="EnviaRecOperatorio" onclick="javascript:EnviaRecord();" class="btn btn-primary btn-lg">Registrar record operatorio</button> 
                <button type="button"  name="ImprimeRec" id="ImprimeRec" onclick="javascript:abrirReporteRecodrd();" class="btn btn-warning btn-lg" style="display: none;"><span class="glyphicon glyphicon-print"> </span> Imprimir record operatorio</button> 
                 <button type="button"  id="EditaRecOperatorio" name="EditaRecOperatorio"  onclick="javascript:UpdateEvaluacionPlan();" style="display: none;"  class="btn btn-info btn-lg">Actualizar record operatorio</button> 
               </center>              
        </form>  
 </div>  
            <div id="ConsultaP" name="ConsultaP">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="form-group">
                            <h4><b> 10. Pacientes Existentes</b></h4>
                                <div class="col-xs-2  text-right">
                                    <label for="buscar" class="control-label">Buscar paciente por fecha:</label>
                                </div>
                                <div class="col-xs-4">
                                    <input  type="date" name="buscar" id="buscar" class="form-control" onkeyup="lista_Pacientes(this.value);" placeholder="Ingrese nombre o descripcion"/>
                                </div>
                            </div>
                            <div class="col-xs-2  text-right">
                                    <label for="buscar" class="control-label">Buscar paciente por nombre, apellido, edad, direccion:</label>
                                </div>
                                <div class="col-xs-4">
                                    <input  type="text" name="buscar" id="buscar" class="form-control" onkeyup="lista_Pacienteslista_Pacientes(this.value);" placeholder="Ingrese nombre o descripcion"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div id="lista"></div> 
                            </div>
                        </div>
            </div>
                    </div>
                </div>
  </div>
</div>
</body>
	</html>
<?php 
	}	
?>