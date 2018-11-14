<?php
include('dbconnect.php');
require_once("../php/sesion.class.php");
$sesion = new sesion();
$usuario = $sesion->get("usuario");

//session_destroy();
if( $usuario == false )
{
    header("Location: login.php");
}
else
{

    ?>
    <html xmlns="http://www.w3.org/1999/html">
    <head>
        <title>
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8"/>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link type="text/css" href="../css/bootstrap.min.css" rel="stylesheet"/>
        <link rel="stylesheet" href="../css/jquery-ui.css" type="text/css" />
        <script  src="../js/jquery-1.12.3.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/sweetalert.min.js"></script>
        <script src="../js/mousetrap.min.js"></script>
        <script src="../js/moment.js"></script>
        <script src="../js/scriptSABER-v3.js"></script>
        <script src="../js/ScriptEmergencia.js"></script>

        <link href="../css/sweetalert.css" rel="stylesheet"/>

        <script src="../js/jquery-ui.js"></script>



    </head>
    <body>
    <div class="container" id="inicioP" >
        <div class="row" >
            <div class="col-md-12" align="center">
                <div  class="well well-lg" style="background-color:#2b669a">
                    <label style="color: #FFFFFF; font-size: medium" >MINISTERIO DE SALUD PUBLICA Y ASISTENCIA SOCIAL</label><br>
                    <label style="color: #FFFFFF; font-size: medium" >HOSPITAL DEPARTAMENTAL DE TOTONICAPAN</label><br>
                    <label style="color: #FFFFFF; font-size: medium" >TOTONICAPAN, GUATEMALA</label><br>
                    <label style="color: #FFFFFF; font-size: medium" >SABER, (Sistema Basico de Archivos Electrónicos, Simple, Accesible)</label>
                </div>
            </div>
        </div>
        <div class="row" align="right">
            <div class="col-md-3" align="left">
                <b> <span class="text-info">Usuario:</span> <input type="text"  value= "<?php echo $sesion->get("usuario"); ?>" disabled class="text-info"></b>

            </div>
            <div class="col-md-4">
                <span>No. Paciente<input id="NoPaciente" name="NoPaciente" type="text" class="form-inline"  ></span>
            </div>
            <div class="col-md-5">
                <span class="glyphicon glyphicon-search" style="color: "></span><input type="text" id="BuscarPac" name="BuscarPac" placeholder="Buscar Paciente" class="form-inline" onkeyup="lista_Pacientes(this.value);"><button class="btn btn-success" onclick="cerarBP();"> <span class="glyphicon glyphicon-remove"></span></button>
            </div>
        </div><br>
        <div class="pre-scrollable">
            <div id="lista"></div>
        </div><br>
        <hr />

        <div class="row">
            <div class="col-md-4">
                <select id="SrCio" name="SrCio" class="form-control" title="Servicio en el que se atendió">
                    <option value="1" class="text-primary">Servicio de atención</option>
                    <option value="2" class="text-primary">Medicina</option>
                    <option value="3" class="text-primary">Trauma</option>
                    <option value="4" class="text-primary">Cirugia</option>
                    <option value="5" class="text-primary">Pediatria</option>
                    <option value="6" class="text-primary">Atención integral</option>
                </select>
            </div>
            <div class="col-md-2">
                <input type="text" class="form-control" value= "<?php echo $IdPersona= $_GET['Num']; ?>" id="idPersonaIngInf" name="idPersonaIngInf" style="display: none">
            </div>

            <div class="col-md-6" align="right">
                <button class="btn btn-success" onclick="AbrirModal();">Modificar</button>
            </div>
        </div><br>

        <div class="row">
            <div class="col-md-2">
                <input type="text" id="PrApe" class="form-control" placeholder="1er. Apellido" title="Primer Apellido">
            </div>
            <div class="col-md-2">
                <input type="text"  id="SeApe" name="seApe" class="form-control" placeholder="2do. Apellido" title="Segundo Apellido">
            </div>
            <div class="col-md-2">
                <input type="text"   id="DeCas"  class="form-control" placeholder="De Casada" title="De Casada">
            </div>
            <div class="col-md-2">
                <input type="text"   id="PrNom"  class="form-control" placeholder="1er. Nombre" title="Primer Nombre">
            </div>
            <div class="col-md-2">
                <input type="text"   id="SeNom"  class="form-control" placeholder="2do. Nombre"  title="Segundo Nombre">

            </div>
            <div class="col-md-2">
                <input type="text"  id="ExpMedico"  class="form-control"  placeholder="No. Expediente Médico" title="Numero De Expediente Médico" />
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-2">
                <select id="Sex" name="Sex" class="form-control" placeholder="Seleccion.!!" title="Sexo M/F">
                    <option value="NoSelect" class="text-primary">Género</option>
                    <option value="M" class="text-primary">Masculino</option>
                    <option value="F" class="text-primary">Femenino</option>
                </select>
            </div>
            <div class="col-md-2">
                <input type="text"  id="Eda" name="Eda" class="form-control" placeholder="edad" title="Edad">
            </div>
            <div class="col-md-2">
                <!--<input type="text"  id="EstCiv" class="form-control" placeholder="Estado Civil">-->
                <select id="EstCiv" name="EstCiv" class="form-control" title="Estado Civil">
                    <option value="6" class="text-primary">Estado civil</option>
                    <option value="1" class="text-primary">Soltero(a)</option>
                    <option value="2" class="text-primary">Casado(a)</option>
                    <option value="3" class="text-primary">Viudo(a)</option>
                    <option value="4" class="text-primary">Divorciado(a)</option>
                    <option value="5" class="text-primary">Unido</option>
                </select>
            </div>
            <div class="col-md-3">
                <input type="text"  id="OcuP" name="OcuP" class="form-control" placeholder="Ocupación" title="Ocupación">
                <div id="suggestions"  style="display: none;"></div>
            </div>
            <div class="col-md-3">
                <input type="text"  id="PagIg" class="form-control" placeholder="Pago I.G.S.S." title="Pago I.G.S.S.">
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-7">
                <input type="text"   id="ProcedeDire" name="ProcedeDire" class="form-control" placeholder="Procedencia    /     Dirección Habitual" title="Procedencia / Dirección">
            </div>
            <div class="col-md-2">
                <input type="text"  id="Tel" class="form-control" placeholder="Telefono" title="Teléfono">
            </div>
            <div class="col-md-3" align="right">
                <button type="button" class="btn btn-primary btn-group-lg" name="EnviainfbP" id="EnviainfbP" onclick="javascript:EnviaInfpV3('GuardarP');">Guardar</button>
                <button type="button" class=" btn btn-warning btn-group-lg" name="ActulizaIPac" id="ActulizaIPac" onclick="javascript:EnviaInfpV3('ModificarP');" style="display:none;">Actualizar</button>
            </div>
        </div><br>
        <span class="list-group-item">
            <div class="row" id="DvLlegoEn" name="DvLlegoEn" title="Llego en">
                <div class="col-md-2">
                   <span>Llegó en:</span>
                </div>
                <div class="col-md-3">
                    <label class="radio-inline">Ambulancia</label>
                    <input type="radio" id="1" value="1" name="mLLegada" class="radio-inline">
                </div>
                <div class="col-md-3">
                     <label class="radio-inline">Automovil</label>
                    <input type="radio" id="3" value="3" name="mLLegada" class="radio-inline">
                </div>
                <div class="col-md-3">
                     <label class="radio-inline">A Pie</label>
                    <input type="radio" id="4" value="4" name="mLLegada" class="radio-inline">
                </div>
            </div>
         </span><br>
        <div class="row">
            <div class="col-md-12">
                <input type="text" id="contactPaciente" placeholder="Lo(a) acompaña" class="form-control" onblur="InsUpContacP()" title="Lo acompaña">
            </div>
        </div><br>
        <span class="list-group-item">
            <div class="row">
                <div class="col-md-6">
                    <textarea class="form-control" id="MIngres" rows="4" placeholder="Motivo de Ingreso" onblur="InsUpMotConsulta()" title="Motivo De Ingreso"></textarea>
                    <span >Fecha y Hora </span>
                    <input id="FeHoIngreso" type="datetime-local" onblur="InsUpFechaUrgencia()" title="Fecha y Hora">
                </div>
                <div class="col-md-6">
                    <textarea class="form-control" id="AntRCU" rows="4"  placeholder="Antecedentes relacionados con la urgencia" onblur="InsUpAnteRcUrgen()" title="Antecedentes Relacionados Con La Urgencia"></textarea>
                </div>
            </div>
         </span><br>
        <span class="list-group-item">
    <div class="row" >
        <div class="col-md-2">
            <span>Examen físico</span>
        </div>
        <div class="col-md-1">
            <input type="text" id="PresAr" class="form-control" placeholder="P.A." onblur="InsUpCamposAll(this.id,this.value)" title="Presion Arterial">
        </div>
        <div class="col-md-1">
            <input type="text"  id="tempe" class="form-control" placeholder="TEMP." onblur="InsUpCamposAll(this.id,this.value)" title="Temperatura">
        </div>
        <div class="col-md-1">
            <input type="text" id="po" class="form-control" placeholder="P.O." onblur="InsUpCamposAll(this.id,this.value)" title="P.O.">
        </div>
        <div class="col-md-1">
            <input type="text" id="fr" class="form-control" placeholder="FR." onblur="InsUpCamposAll(this.id,this.value)" title="FR.">
        </div>
        <div class="col-md-1">
            <input type="text" id="fc" class="form-control" placeholder="FC." onblur="InsUpCamposAll(this.id,this.value)" title="FC">
        </div>
        <div class="col-md-1">
            <input type="text" id="gli" class="form-control" placeholder="GLI" onblur="InsUpCamposAll(this.id,this.value)" title="GLI">
        </div>

        <div class="col-md-3" id="DvConciente" name="DvConciente" title="Consciente">
            <span class="radio-inline">Consciente</span>
            <span class="radio-inline">si</span>
            <input type="radio" id="si" value="si" name="ConciP" class="radio-inline" >
            <span class="radio-inline">No</span>
            <input type="radio" id="no" value="no" name="ConciP" class="radio-inline" >
        </div>
    </div><br>
      <div class="row">
        <div class="col-md-2">
            <input type="text" id="talla" class="form-control" placeholder="Talla" onblur="InsUpCamposAll(this.id,this.value)" title="Talla">
        </div>
        <div class="col-md-2">
            <input type="text" id="peso" class="form-control" placeholder="Peso" onblur="InsUpCamposAll(this.id,this.value)" title="Peso">
        </div>
    </div><br>
    <div class="row">
        <div class="col-md-12" >
            <textarea rows="4" id="NotExF" class="form-control" placeholder="Describa el examen fisico por sistemas" onblur="InsUpCamposAll(this.id,this.value)"title="Examen Fisico"></textarea >
        </div>
    </div>
     </span><br>
        <div class="row">
            <div align="center">
                <span>IMPRESIÓN CLÍNICA</span>
            </div>
            <div class="col-md-6" >
                <input type="text" id="ImpC1"  name="ImpC1" class="form-control" placeholder="A)" onblur="IngImpClinica('ImpC1',this.value,'1');" title="Impresión Clínica A">
                <div id="suggestionsImC"  style="display: none;"></div>
            </div>
            <div class="col-md-6" >
                <input type="text" id="ImpC2" name="ImpC2" class="form-control" placeholder="B)" onblur="IngImpClinica('ImpC1',this.value,'2');" title="Impresión Clínica B">
                <div id="suggestionsImC2"  style="display: none;"></div>
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-6" >
                <input type="text" id="ImpC3" name="ImpC3" class="form-control" placeholder="C)" onblur="IngImpClinica('ImpC1',this.value,'3');" title="Impresión Clínica C">
                <div id="suggestionsImC3"  style="display: none;"></div>
            </div>
            <div class="col-md-6" >
                <input type="text" id="ImpC4" name="Impc4" class="form-control" placeholder="D)" onblur="IngImpClinica('ImpC1',this.value,'4');" title="Impresión Clínica D">
                <div id="suggestionsImC4"  style="display: none;"></div>
            </div>
        </div><br>
        <span class="list-group-item">
    <div class="row" >
        <div class="col-md-2">
            <span>Este caso se considera de urgencia.</span>
        </div>
        <div class="col-md-2" id="DvCasoUrg" name="DvCasoUrg" title="Este Caso Se Considera De Urgencia">
            <span class="radio-inline">si</span>
            <input type="radio" id="si" value="si" name="CasoUrg" class="radio-inline" >
            <span class="radio-inline">No</span>
            <input type="radio" id="no" value="no" name="CasoUrg" class="radio-inline" >
        </div>
          <div class="col-md-4">
            <input type="text" id="NomMedG" class="form-control" placeholder="Dr(a). Médico de Guardia" onblur="InsUpCamposAll(this.id,this.value)" title="Dr(a). Médico de Guardia">
        </div>
        <div class="col-md-4">
            <input type="text"  id="NomInter" class="form-control" placeholder="Dr(a). Interno" onblur="InsUpCamposAll(this.id,this.value)" title="Dr(a). Intern@">
        </div>
    </div>
    </span><br>
        <span class="list-group-item">
    <div class="row">
        <div class="col-lg-2">
            <label class="radio-inline">Egreso de urgencia fecha y hora:</label>
        </div>
        <div class="col-lg-3">
            <input  id="feEg" type="datetime-local" onblur="InsUpCamposAll(this.id,this.value)" title="Egreso De Urgencia Fecha Y Hora">
        </div>
        <div class="col-md-4" id="DvHospitalizado" name="Hospitalizado" title="Quedo Hospitalizado?">
            <label class="radio-inline">Quedo hospitalizado</label>
            <span class="radio-inline">si</span>
            <input type="radio" id="si" value="si" name="QuedoHos" class="radio-inline" >
            <span class="radio-inline">No</span>
            <input type="radio" id="no" value="no" name="QuedoHos" class="radio-inline" >
        </div>
        <div class="col-md-3">
            <select id="Servi" name="Servi" class="form-control" title="Servicio">
                        <option value="1" class="text-primary">Servicio</option>
                        <option value="2" class="text-primary">TM</option>
                        <option value="3" class="text-primary">TH</option>
                        <option value="4" class="text-primary">Pediatria</option>
                        <option value="5" class="text-primary">CP</option>
                        <option value="6" class="text-primary">CM</option>
                        <option value="7" class="text-primary">CH</option>
                        <option value="8" class="text-primary">Mater</option>
                    </select>
        </div>
    </div>
    </span><br>
        <span class="list-group-item">
    <div class="row">
        <div align="center">
            <span>ORDENES</span>
        </div>
        <div class="col-md-3">
           <input type="datetime-local" class="form-control" rows="1" placeholder="Fecha / Hora ordenes" title="Fecha / Hora ordenes" id="FechaNE1" name="FechaNE1">
        </div>
     </div><br>
    <div class="row">
        <div class="col-md-6">
           <textarea class="form-control" rows="5" placeholder="Ordenes." title="Ordenes" id="numNE1" name="numNE1" ></textarea>
        </div>
        <div class="col-md-6">
               <textarea class="form-control" rows="5" placeholder="Evolucion" title="Evolucion" id="OdenesNE1" name="OdenesNE1" ></textarea>
        </div>
    </div><br>
    <div class="row">
        <div class="col-md-12">
           <textarea class="form-control" rows="3" placeholder="Notas Finales" title="Notas Finales" id="EvolucionNE1" name="EvolucionNE1" ></textarea>
        </div>
    </div><br>
     <div class="row">
        <div class="col-md-12" align="center">
            <span id="msjOrden" name="msjOrden" class="text-danger"></span>
            <button type="button" id="btnNE" name="btnNE" class="btn btn-primary btn-lg" onclick="javascript:InsOrden('FechaNE1','numNE1','OdenesNE1','EvolucionNE1');  ApareceRwNota('Ord2');">Guardar Ordenes <span class="glyphicon glyphicon-ok" ></span></button>
            <button type="button" id="ActualizarOrd" name="ActualizarOrd" class="btn btn-warning btn-lg" style="display:none;" onclick="javascript:ModificarOren();">Actualizar Ordenes</button>




        </div>

    </div>
    </span><br>


        <div align="center">
            <h4 id="MostrarNtaEnf" name="MostrarNtaEnf" onclick="AbrirModalEnf();" ><span class="glyphicon glyphicon-chevron-right"  > </span> NOTA DE ENFERMERIA</h4>
            <h4 id="OcultarNtaEnf" name="OcultarNtaEnf" onclick="DesapareceNtaEnf(); DesapareceSPN(this.id); ApareceSPN('MostrarNtaEnf');" style="display: none;"><span class="glyphicon glyphicon-chevron-down"  > </span> NOTA DE ENFERMERIA</h4>
            <div class="list-group-item"  name="divEnfermeriaNtas" id="divEnfermeriaNtas" style="display: none;" >
                <!-- primera nota de enfermeria-->
                <div class="row" id="NameEnfe">
                    <div class="col-md-6">
                        <input type="text" id="NombreEnf" name="NombreEnf" class="form-control" placeholder="Nombre Efermero(a)"  title="Nombre Efermero(a)">
                    </div>
                    <div class="col-md-6" id="DvTurno" name="DvTurno" title="Elija turno.!">
                        <label class="radio-inline">Turno</label>
                        <span class="radio-inline">Mañana</span>
                        <input type="radio" id="1" value="1" name="Turn" class="radio-inline" >
                        <span class="radio-inline">Tarde</span>
                        <input type="radio" id="2" value="2" name="Turn" class="radio-inline" >
                        <span class="radio-inline">Noche</span>
                        <input type="radio" id="3" value="3" name="Turn" class="radio-inline" >
                    </div>
                </div><br>
                <div class="row" id="NtaEnf">
                    <div class="col-md-12">
                        <textarea class="form-control" rows="10" placeholder="Nota enfermeria" title="Nota enfermeria" id="Ntenfermeria" name="Ntenfermeria"></textarea>
                    </div></br>
                    <div class="col-md-12" align="center">
                        <button type="button" id="SaveNtaEnf" name="SaveNtaEnf" class="btn btn-success btn-lg" onclick="javascript:InsEnfermeriaNta();">Registrar nota de enfermeria <span class="glyphicon glyphicon-ok" > </span></button>
                    </div>
                </div><br>
                <!-- FIN primera nota de enfermeria-->
                <!-- segunda nota de enfermeria-->
                <div class="row" id="NameEnfe2">
                    <div class="col-md-6">
                        <input type="text" id="NombreEnf2" name="NombreEnf2" class="form-control" placeholder="Nombre Efermero(a)"  title="Nombre Efermero(a)">
                    </div>
                    <div class="col-md-6" id="DvTurno2" name="DvTurno2" title="Elija turno.!">
                        <label class="radio-inline">Turno</label>
                        <span class="radio-inline">Mañana</span>
                        <input type="radio" id="1" value="1" name="Turn2" class="radio-inline" >
                        <span class="radio-inline">Tarde</span>
                        <input type="radio" id="2" value="2" name="Turn2" class="radio-inline" >
                        <span class="radio-inline">Noche</span>
                        <input type="radio" id="3" value="3" name="Turn2" class="radio-inline" >
                    </div>
                </div><br>
                <div class="row" id="NtaEnf2">
                    <div class="col-md-12">
                        <textarea class="form-control" rows="10" placeholder="Nota enfermeria" title="Nota enfermeria" id="Ntenfermeria2" name="Ntenfermeria2"></textarea>
                    </div></br>
                    <div class="col-md-12" align="center">
                        <button type="button" id="SaveNtaEnf2" name="SaveNtaEnf" class="btn btn-success btn-lg" onclick="javascript:InsEnfermeriaNta2();">Registrar nota de enfermeria <span class="glyphicon glyphicon-ok" > </span></button>
                    </div>
                </div>
                <!-- FIN segunda nota de enfermeria-->
                <!-- tercera nota de enfermeria-->
                <div class="row" id="NameEnfe3">
                    <div class="col-md-6">
                        <input type="text" id="NombreEnf3" name="NombreEnf3" class="form-control" placeholder="Nombre Efermero(a)"  title="Nombre Efermero(a)">
                    </div>
                    <div class="col-md-6" id="DvTurno3" name="DvTurno3" title="Elija turno.!">
                        <label class="radio-inline">Turno</label>
                        <span class="radio-inline">Mañana</span>
                        <input type="radio" id="1" value="1" name="Turn3" class="radio-inline" >
                        <span class="radio-inline">Tarde</span>
                        <input type="radio" id="2" value="2" name="Turn3" class="radio-inline" >
                        <span class="radio-inline">Noche</span>
                        <input type="radio" id="3" value="3" name="Turn3" class="radio-inline" >
                    </div>
                </div><br>
                <div class="row" id="NtaEnf3">
                    <div class="col-md-12">
                        <textarea class="form-control" rows="10" placeholder="Nota enfermeria" title="Nota enfermeria" id="Ntenfermeria3" name="Ntenfermeri3"></textarea>
                    </div></br>
                    <div class="col-md-12" align="center">
                        <button type="button" id="SaveNtaEnf3" name="SaveNtaEnf" class="btn btn-success btn-lg" onclick="javascript:InsEnfermeriaNta3();">Registrar nota de enfermeria <span class="glyphicon glyphicon-ok" > </span></button>
                    </div>
                </div>
                <!-- FIN tercera nota de enfermeria-->

            </div><br>


            <div class="row" align="center">
                <div class="col-lg-12">
                    <button type="button" id="opcionesEM" name="opcionesEM" class="btn btn-primary btn-lg">Opciones</button>
                </div>
            </div><br>

            <!--inicio modal botones-->

            <div class="modal fade" id="modalOpci" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h3>Seleccione una opción</h3>
                        </div>
                        <div class="modal-body">
                            <button type="button" class="btn btn-warning " onclick="javascript:abrirReportePrueba();"> Imprimir</button>
                            <button type="button" class="btn btn-success " onclick="EnviaPaServicio();"> Ingresar a servicio</button>
                            <!--<button type="button" id="Npaciente" name="Npaciente" class="btn btn-info" onClick="window.location.href='#inicioP'"> Nuevo Paciente de Emergencia</button>-->
                            <button type="button" id="Npaciente" name="Npaciente" class="btn btn-info" onClick="window.open('emergencia.php')"> Nuevo Paciente de Emergencia</button>


                        </div>
                        <div class="modal-footer">
                            <a href="#" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
                        </div>

                    </div>
                </div>
            </div>
            <!-- fin modal botones-->


        </div> <!--fin de div container-->
        <!--inicio modal ingresar nota enfermeria-->
        <div class="modal fade" id="LogEnfermeros" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3>Ingrese usuario y contraseña para agregar una nota de enfermeria</h3>
                    </div>
                    <div class="modal-body">
                        <label class="text-primary">Usuario:</label>
                        <input type="text" id="UserModEnf" name="UserModEnf"  class="form-control"></br>
                        <label class="text-primary">Contraseña:</label>
                        <input type="password" id="PassModEnf" name="PassModEnf" class="form-control" ></br>
                        <span id="MsjErrEnf" name="MsjErrEnf" class="text-danger"></span></br>
                        <span id="MsjOkEnf" name="MsjOkEnf" class="text-success"></span></br>
                        <button type="button" class="btn btn-primary btn-lg" onclick="javascript:LogueoEnfNota();">Ingresar nota enfermeria</button>
                    </div>
                    <div class="modal-footer">
                        <a href="#" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- fin modal ingresar nota enfermeria-->

        <!--inicio modal MODIFICAR-->

        <div class="modal fade" id="UsuarioMod" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3>Ingrese usuario y contraseña</h3>
                    </div>
                    <div class="modal-body">
                        <label class="text-primary">Usuario:</label>
                        <input type="text" id="UserMod" name="UserMod"  class="form-control"></br>
                        <label class="text-primary">Contraseña:</label>
                        <input type="password" id="PassMod" name="PassMod" class="form-control" ></br>
                        <span id="MsjErr" name="MsjErr" class="text-danger"></span></br>
                        <span id="MsjOk" name="MsjOk" class="text-success"></span></br>
                        <button type="button" class="btn btn-primary btn-lg" onclick="javascript:LogueoModifi();">Loguearse para modificar</button>
                    </div>
                    <div class="modal-footer">
                        <a href="#" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- fin modal MODIFICAR-->

    </div>
    </div>
    </div>
    <!-- fin modal botones-->



    </body>
    </html>
    <?php
}
?>