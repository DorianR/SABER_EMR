function lista_Pacientes(valor){
	$.ajax({
		url:'../Controlador/PacientesController.php',
		type:'POST',
		data:'valor='+valor+'&boton=buscar'
	}).done(function(resp){
		//alert(resp);
		var valores = eval(resp);
		html="<table class='table table-hover'><thead><tr><th>#</th><th>Opciones</th><th>Hora ing.</th><th>No. Ficha</th><th>Nombre</th><th>Apellido</th><th>FechaIng.</th><th>Dirección</th><th>Sexo</th></tr></thead><tbody>";
		for(i=0;i<valores.length;i++){
			datos=valores[i][0]+"*"+valores[i][1]+"*"+valores[i][2]+"*"+valores[i][3]+"*"+valores[i][4]+"*"+valores[i][5]+"*"+valores[i][6]+"*"+valores[i][7]+"*"+valores[i][8]+"*"+valores[i][9]+"*"+valores[i][10]+"*"+valores[i][11]+"*"+valores[i][12]+"*"+valores[i][13]+"*"+valores[i][14]+"*"+valores[i][15]+"*"+valores[i][16]+"*"+valores[i][17]+"*"+valores[i][18]+"*"+valores[i][19]+"*"+valores[i][20]+"*"+valores[i][21]+"*"+valores[i][22]+"*"+valores[i][23]+"*"+valores[i][24]+"*"+valores[i][25]+"*"+valores[i][26]+"*"+valores[i][27]+"*"+valores[i][28];
			html+="<tr><td>"+(i+1)+"</td><td><button class='btn btn-warning' data-toggle='modal' data-target='#modallibros' onclick='imprimir("+'"'+valores[i][0]+'"'+");'><span class='glyphicon glyphicon-print'></span></button><button  class='btn btn-danger'  onclick=' MST(); mostrar("+'"'+datos+'"'+"); TriajeTime(); EvaluacionTime(); EvaluacionPlanTime(); RevSistemasTime(); ExFisicTime(); DisposicionTime(); MedicoTime(); ResidenteTime(); VitalesTriajeTime(); VitalesEntrandoHTime(); MedicamentosTime(); MedicamentosBitacoraTime(); ImagenesTime(); TagTime();'><span class='glyphicon glyphicon-pencil'></span></button></td><td>"+valores[i][4]+"</td><td>"+valores[i][1]+"</td><td>"+valores[i][5]+"</td><td>"+valores[i][7]+"</td><td>"+valores[i][3]+"</td><td>"+valores[i][20]+"</td><td>"+valores[i][21]+"</td></tr>";
		}
		html+="</tbody></table>"
		$("#lista").html(html);
	});
}


function mostrar(datos){ 
	//alert(datos);

	document.getElementById("form1").reset();


	var d=datos.split("*");
	
	//alert(d.length);
	$("#NoPaciente").val(d[0]);	
	$("#codigoficha").val(d[1]);
	$("#codigo").val(d[2]);
	$("#fecha").val(d[3]);
	$("#hora").val(d[4]);
	$("#PNombre").val(d[5]);
	$("#SNombre").val(d[6]);
	$("#PrApellido").val(d[7]);
	$("#SegApellido").val(d[8]);
	$("#ACasada").val(d[9]);
	if (d[10]=='Si'){
            $("input[name=referido][value='Si']").prop("checked",true);
            } else {
                $("input[name=referido][value='No']").prop("checked",true);
            }
     if (d[11]=='Si'){
            $("input[name=Anotificadas][value='Si']").prop("checked",true);
            } else {
                $("input[name=Anotificadas][value='No']").prop("checked",true);
            }
	$("#FNac").val(d[12]);
	$("#anios").val(d[13]);
	$("#meses").val(d[14]);
	$("#dias").val(d[15]);
	$("#ocupacion").val(d[16]);	
	$("#dpi").val(d[17]);
	$("#telefono").val(d[19]);
	$("#Direccion").val(d[20]);
	if (d[21]=='M'){
            $("input[name=sexo][value='M']").prop("checked",true);
            } else {
                $("input[name=sexo][value='F']").prop("checked",true);
            }
	$("#contEmer").val(d[22]);
	$("#NoTelEnc").val(d[23]);
	$("#Relacion").val(d[24]);
	if (d[21]=='M'){
            $("input[name=sexo][value='M']").prop("checked",true);
            } else {
                $("input[name=sexo][value='F']").prop("checked",true);
            }
if(d[26]=='1')
 {
         $("input[name=estadoCivil][value='1']").prop("checked",true);
  }
if(d[26]=='2')
 {
         $("input[name=estadoCivil][value='2']").prop("checked",true);
  }
 if(d[26]=='3')
 {
         $("input[name=estadoCivil][value='3']").prop("checked",true);
  }
 if(d[26]=='4')
 {
         $("input[name=estadoCivil][value='4']").prop("checked",true);
  }
  if(d[26]=='5')
 {
         $("input[name=estadoCivil][value='5']").prop("checked",true);
  }
  if(d[26]=='6')
 {
         $("input[name=estadoCivil][value='6']").prop("checked",true);
  }
if(d[27]=='1')
 {
         $("input[name=etnia][value='1']").prop("checked",true);
  }
  if(d[27]=='2')
 {
         $("input[name=etnia][value='2']").prop("checked",true);
  }
 if(d[27]=='3')
 {
         $("input[name=etnia][value='3']").prop("checked",true);
  }
  if(d[27]=='4')
 {
         $("input[name=etnia][value='4']").prop("checked",true);
  }
    if(d[27]=='5')
 {
         $("input[name=etnia][value='5']").prop("checked",true);
  }
	$("#Anotificada").val(d[28]);	
}

function procesosLoadInfo() {
    setTimeout('PacienteInicialInf()',300);
    setTimeout('Triaje()',300);
    setTimeout('Evaluacion()',300);
    setTimeout('RevSistemasEDICION()',300);
}
function PacienteInicialInf(){

       var NoPaciente = document.getElementById('NoPaciente').value;
    $.ajax({
        url:'../Controlador/PacientesController.php',
        type:'POST',
        data:'valor='+NoPaciente+'&boton=buscar'
    }).done(function(resp) {
        //alert(resp);
        var valoresP = eval(resp);
        //html="<table class='table table-hover'><thead><tr><th>#</th><th>Codiogo Paciente</th><th>No. Ficha</th><th>Nombre</th><th>Apellido</th><th>Telefono</th><th>Dirección</th><th>Sexo</th><th>Opciones</th></tr></thead><tbody>";
        for (i = 0; i < valoresP.length; i++) {
            datosPaci = valoresP[i][0] + "*" + valoresP[i][1] + "*" + valoresP[i][2] + "*" + valoresP[i][3] + "*" + valoresP[i][4] + "*" + valoresP[i][5] + "*" + valoresP[i][6] + "*" + valoresP[i][7]+ "*" + valoresP[i][8]+ "*" + valoresP[i][9]+ "*" + valoresP[i][10]+ "*" + valoresP[i][11]+ "*" + valoresP[i][12]+ "*" + valoresP[i][13]+ "*" + valoresP[i][14]+ "*" + valoresP[i][15]+ "*" + valoresP[i][16]+ "*" + valoresP[i][17]+ "*" + valoresP[i][18]+ "*" + valoresP[i][19]+ "*" + valoresP[i][20]+ "*" + valoresP[i][21]+ "*" + valoresP[i][22]+ "*" + valoresP[i][23]+ "*" + valoresP[i][24]+ "*" + valoresP[i][25]+ "*" + valoresP[i][26]+ "*" + valoresP[i][27]+ "*" + valoresP[i][28]+ "*" + valoresP[i][29]+ "*" + valoresP[i][30]+ "*" + valoresP[i][31]+ "*" + valoresP[i][32] ;
            //html+="<tr><td>"+(i+1)+"</td><td>"+valores[i][2]+"</td><td>"+valores[i][1]+"</td><td>"+valores[i][5]+"</td><td>"+valores[i][7]+"</td><td><button class='btn btn-warning' data-toggle='modal' data-target='#modallibros' onclick='imprimir("+'"'+valores[i][0]+'"'+");'><span class='glyphicon glyphicon-print'></span></button><button  class='btn btn-danger' onclick='MST(); mostrar("+'"'+datos+'"'+"); '><span class='glyphicon glyphicon-print'></span></button></td></tr>";
        }
        var datPA = datosPaci.split("*");
        $("#NoPaciente").val(datPA[0]);
        $("#codigoficha").val(datPA[3]);
        $("#codigo").val(datPA[4]);
        $("#fecha").val(datPA[5]);
       // $("#hora").val(datPA[4]);
        $("#PNombre").val(datPA[7]);
        $("#SNombre").val(datPA[8]);
        $("#PrApellido").val(datPA[9]);
        $("#SegApellido").val(datPA[10]);
        $("#ACasada").val(datPA[11]);
        if (datPA[12]=='Si'){
            $("input[name=referido][value='Si']").prop("checked",true);
        } else {
            $("input[name=referido][value='No']").prop("checked",true);
        }
        if (datPA[13]=='Si'){
            $("input[name=Anotificadas][value='Si']").prop("checked",true);
        } else {
            $("input[name=Anotificadas][value='No']").prop("checked",true);
        }
        $("#FNac").val(datPA[14]);
        $("#anios").val(datPA[15]);
        $("#meses").val(datPA[16]);
        $("#dias").val(datPA[17]);
        $("#ocupacion").val(datPA[18]);
        $("#dpi").val(datPA[19]);
        $("#telefono").val(datPA[21]);
        $("#Direccion").val(datPA[22]);
        if (datPA[23]=='M'){
            $("input[name=sexo][value='M']").prop("checked",true);
        } else {
            $("input[name=sexo][value='F']").prop("checked",true);
        }
        $("#contEmer").val(datPA[24]);
        $("#NoTelEnc").val(datPA[25]);
        $("#Relacion").val(datPA[26]);
        if(datPA[28]=='1')
        {
            $("input[name=estadoCivil][value='1']").prop("checked",true);
        }
        if(datPA[28]=='2')
        {
            $("input[name=estadoCivil][value='2']").prop("checked",true);
        }
        if(datPA[28]=='3')
        {
            $("input[name=estadoCivil][value='3']").prop("checked",true);
        }
        if(datPA[28]=='4')
        {
            $("input[name=estadoCivil][value='4']").prop("checked",true);
        }
        if(datPA[28]=='5')
        {
            $("input[name=estadoCivil][value='5']").prop("checked",true);
        }
        if(datPA[28]=='6')
        {
            $("input[name=estadoCivil][value='6']").prop("checked",true);
        }
        if(datPA[29]=='1')
        {
            $("input[name=etnia][value='1']").prop("checked",true);
        }
        if(datPA[29]=='2')
        {
            $("input[name=etnia][value='2']").prop("checked",true);
        }
        if(datPA[29]=='3')
        {
            $("input[name=etnia][value='3']").prop("checked",true);
        }
        if(datPA[29]=='4')
        {
            $("input[name=etnia][value='4']").prop("checked",true);
        }
        if(datPA[29]=='5')
        {
            $("input[name=etnia][value='5']").prop("checked",true);
        }
        $("#Anotificada").val(d[30]);
        $("#Anotificada").val(d[32]);

    });
}

function TriajeTime(){
    setTimeout('Triaje()',150)
}
function Triaje(){

	document.getElementById("form2").reset();
	var NoPaciente = document.getElementById('NoPaciente').value;
	$.ajax({
		url:'../Controlador/TriajeController.php',
		type:'POST',
		data:'valor='+NoPaciente+'&boton=buscar'
	}).done(function(resp){
		//alert(resp);
		var valoresT = eval(resp);
		//html="<table class='table table-hover'><thead><tr><th>#</th><th>Codiogo Paciente</th><th>No. Ficha</th><th>Nombre</th><th>Apellido</th><th>Telefono</th><th>Dirección</th><th>Sexo</th><th>Opciones</th></tr></thead><tbody>";
		for(i=0;i<valoresT.length;i++){
			datosTriaje=valoresT[i][0]+"*"+valoresT[i][1]+"*"+valoresT[i][2]+"*"+valoresT[i][3]+"*"+valoresT[i][4]+"*"+valoresT[i][5]+"*"+valoresT[i][6]+"*"+valoresT[i][7];
			//html+="<tr><td>"+(i+1)+"</td><td>"+valores[i][2]+"</td><td>"+valores[i][1]+"</td><td>"+valores[i][5]+"</td><td>"+valores[i][7]+"</td><td><button class='btn btn-warning' data-toggle='modal' data-target='#modallibros' onclick='imprimir("+'"'+valores[i][0]+'"'+");'><span class='glyphicon glyphicon-print'></span></button><button  class='btn btn-danger' onclick='MST(); mostrar("+'"'+datos+'"'+"); '><span class='glyphicon glyphicon-print'></span></button></td></tr>";
		}
		//html+="</tbody></table>"
		//$("#lista").html(html);
		var datTria=datosTriaje.split("*");
		//alert(datTria);
		$("#AmbulanciaNota").val(datTria[1]);
		$("#MedicamentosAllegada").val(datTria[2]);
		$("#IantesLLegada").val(datTria[3]);
		$("#NotaTriage").val(datTria[4]);
		$("#OtraInfo").val(datTria[5]);
if(datTria[7]==='1')
 {
         $("input[name=Mllegada][value='1']").prop("checked",true);
  }		
if(datTria[7]==='2')
 {
         $("input[name=Mllegada][value='2']").prop("checked",true);
  }		
if(datTria[7]==='3')
 {
         $("input[name=Mllegada][value='3']").prop("checked",true);
  }	
if(datTria[7]==='4')
 {
         $("input[name=Mllegada][value='4']").prop("checked",true);
  }	
if(datTria[7]==='5')
 {
         $("input[name=Mllegada][value='5']").prop("checked",true);
  }	
if(datTria[7]==='6')
 {
         $("input[name=Mllegada][value='6']").prop("checked",true);
  }	
	});
}

function VitalesTriajeTime(){
    setTimeout('VitalesTriaje()',150)
}
function VitalesTriaje(){
	
	var NoPaciente = document.getElementById('NoPaciente').value;
	$.ajax({
		url:'../Controlador/VitalesTriajeController.php',
		type:'POST',
		data:'valor='+NoPaciente+'&boton=buscar'
	}).done(function(resp){
		//alert(resp);
		var valoresVitalesT = eval(resp);
		//html="<table class='table table-hover'><thead><tr><th>#</th><th>Codiogo Paciente</th><th>No. Ficha</th><th>Nombre</th><th>Apellido</th><th>Telefono</th><th>Dirección</th><th>Sexo</th><th>Opciones</th></tr></thead><tbody>";
		for(i=0;i<valoresVitalesT.length;i++){
			datVitalesTriaje=valoresVitalesT[i][0]+"*"+valoresVitalesT[i][1]+"*"+valoresVitalesT[i][2]+"*"+valoresVitalesT[i][3]+"*"+valoresVitalesT[i][4]+"*"+valoresVitalesT[i][5]+"*"+valoresVitalesT[i][6];
			//html+="<tr><td>"+(i+1)+"</td><td>"+valores[i][2]+"</td><td>"+valores[i][1]+"</td><td>"+valores[i][5]+"</td><td>"+valores[i][7]+"</td><td><button class='btn btn-warning' data-toggle='modal' data-target='#modallibros' onclick='imprimir("+'"'+valores[i][0]+'"'+");'><span class='glyphicon glyphicon-print'></span></button><button  class='btn btn-danger' onclick='MST(); mostrar("+'"'+datos+'"'+"); '><span class='glyphicon glyphicon-print'></span></button></td></tr>";
		}
		var datVitTria=datVitalesTriaje.split("*");
		$("#HoraV").val(datVitTria[5]);
		$("#PulsoA").val(datVitTria[1]);
		$("#frA").val(datVitTria[2]);
		$("#ParterialA").val(datVitTria[3]);
		$("#temperaturaA").val(datVitTria[4]);
		$("#POa").val(datVitTria[6]);

	});
}

function VitalesEntrandoHTime(){
    setTimeout('VitalesEntrandoH()',150)
}
function VitalesEntrandoH(){
	
	var NoPaciente = document.getElementById('NoPaciente').value;
	$.ajax({
		url:'../Controlador/VitalesEntrandoHosController.php',
		type:'POST',
		data:'valor='+NoPaciente+'&boton=buscar'
	}).done(function(resp){
		//alert(resp);
		var valoresVitalesH = eval(resp);
		//html="<table class='table table-hover'><thead><tr><th>#</th><th>Codiogo Paciente</th><th>No. Ficha</th><th>Nombre</th><th>Apellido</th><th>Telefono</th><th>Dirección</th><th>Sexo</th><th>Opciones</th></tr></thead><tbody>";
		for(i=0;i<valoresVitalesH.length;i++){
			datVitalesEntHos=valoresVitalesH[i][0]+"*"+valoresVitalesH[i][1]+"*"+valoresVitalesH[i][2]+"*"+valoresVitalesH[i][3]+"*"+valoresVitalesH[i][4]+"*"+valoresVitalesH[i][5]+"*"+valoresVitalesH[i][6]+"*"+valoresVitalesH[i][7];
			//html+="<tr><td>"+(i+1)+"</td><td>"+valores[i][2]+"</td><td>"+valores[i][1]+"</td><td>"+valores[i][5]+"</td><td>"+valores[i][7]+"</td><td><button class='btn btn-warning' data-toggle='modal' data-target='#modallibros' onclick='imprimir("+'"'+valores[i][0]+'"'+");'><span class='glyphicon glyphicon-print'></span></button><button  class='btn btn-danger' onclick='MST(); mostrar("+'"'+datos+'"'+"); '><span class='glyphicon glyphicon-print'></span></button></td></tr>";
		}
		//html+="</tbody></table>"
		//$("#lista").html(html);
		var datVitHos=datVitalesEntHos.split("*");
		//alert(datTria);
		$("#HoraSvExFisico").val(datVitHos[6]);
		$("#PulsoEntrar").val(datVitHos[2]);
		$("#frEntrar").val(datVitHos[3]);
		$("#ParterialEntrar").val(datVitHos[4]);
		$("#temperaturaEntrar").val(datVitHos[5]);  
		$("#POsv").val(datVitHos[7]);
	});
}
function EvaluacionTime(){
    setTimeout('Evaluacion()',150)
}
function Evaluacion(){
document.getElementById("formularioEva").reset();

	var NoPaciente = document.getElementById('NoPaciente').value;
	$.ajax({
		url:'../Controlador/EvaluacionController.php',
		type:'POST',
		data:'valor='+NoPaciente+'&boton=buscar'
	}).done(function(resp){
		//alert(resp);
		var valoresEva = eval(resp);
		//html="<table class='table table-hover'><thead><tr><th>#</th><th>Codiogo Paciente</th><th>No. Ficha</th><th>Nombre</th><th>Apellido</th><th>Telefono</th><th>Dirección</th><th>Sexo</th><th>Opciones</th></tr></thead><tbody>";
		for(i=0;i<valoresEva.length;i++){
			datosEvaluacion=valoresEva[i][0]+"*"+valoresEva[i][1]+"*"+valoresEva[i][2]+"*"+valoresEva[i][3]+"*"+valoresEva[i][4]+"*"+valoresEva[i][5]+"*"+valoresEva[i][6]+"*"+valoresEva[i][7]+"*"+valoresEva[i][8]+"*"+valoresEva[i][9]+"*"+valoresEva[i][10]+"*"+valoresEva[i][11]+"*"+valoresEva[i][12]+"*"+valoresEva[i][13]+"*"+valoresEva[i][14]+"*"+valoresEva[i][15];
			}		
		var datEval=datosEvaluacion.split("*")		
		$("#HoraContactoMedico").val(datEval[1]);
		$("#MedicoAcargo").val(datEval[2]);
		$("#Eps").val(datEval[3]);
		$("#Interno").val(datEval[4]);
		$("#Externo").val(datEval[5]);
		$("#Otro").val(datEval[6]);			
		$("#MotConsulta").val(datEval[7]);
		$("#HistoriaEnfActual").val(datEval[8]);
		$("#HistoriaMedica").val(datEval[9]);
		$("#HistoriaQuirurgica").val(datEval[10]);	
		$("#HistoriaFamilia").val(datEval[11]);
		$("#HistoriaSocial").val(datEval[12]);
		$("#HistoriaMedicaciones").val(datEval[13]);
		$("#HistoriaAlergias").val(datEval[14]);					
	});
}

function RevSistemasTime(){
    setTimeout('RevSistemasEDICION()',150)
}

function RevSistemasEDICION(){
	document.getElementById("formularioRevSis").reset();
	var NoPaciente = document.getElementById('NoPaciente').value;
	$.ajax({
		url:'../Controlador/RevSistemasController.php',
		type:'POST',
		data:'valor='+NoPaciente+'&boton=buscar'
	}).done(function(resp){
		//alert(resp);
		var valoresRevSis = eval(resp);
		//html="<table class='table table-hover'><thead><tr><th>#</th><th>Codiogo Paciente</th><th>No. Ficha</th><th>Nombre</th><th>Apellido</th><th>Telefono</th><th>Dirección</th><th>Sexo</th><th>Opciones</th></tr></thead><tbody>";
		for(i=0;i<valoresRevSis.length;i++){
			datosRevSistemas=valoresRevSis[i][0]+"*"+valoresRevSis[i][1]+"*"+valoresRevSis[i][2]+"*"+valoresRevSis[i][3]+"*"+valoresRevSis[i][4]+"*"+valoresRevSis[i][5];
			}		
		var datRevSistemas=datosRevSistemas.split("*")	
if(valoresRevSis[0][1] == 'Positivo'){
$("input[name=generalP][value='Positivo']").prop("checked",true);
}
else {
                $("input[name=generalP][value='Negativo']").prop("checked",true);
            }
$("#DescGeneral").val(valoresRevSis[0][2]);

if(valoresRevSis[1][1] == 'Positivo'){
$("input[name=Ojos][value='Positivo']").prop("checked",true);
}
else {
                $("input[name=Ojos][value='Negativo']").prop("checked",true);
            }
$("#DescOjos").val(valoresRevSis[1][2]);

if(valoresRevSis[2][1] == 'Positivo'){
$("input[name=ORL][value='Positivo']").prop("checked",true);
}
else {
                $("input[name=ORL][value='Negativo']").prop("checked",true);
            }
$("#DescORL").val(valoresRevSis[2][2]);

if(valoresRevSis[3][1] == 'Positivo'){
$("input[name=CV][value='Positivo']").prop("checked",true);
}
else {
                $("input[name=CV][value='Negativo']").prop("checked",true);
            }
$("#DescCV").val(valoresRevSis[3][2]);

if(valoresRevSis[4][1] == 'Positivo'){
$("input[name=RESP][value='Positivo']").prop("checked",true);
}
else {
                $("input[name=RESP][value='Negativo']").prop("checked",true);
            }
$("#DescRESP").val(valoresRevSis[4][2]);

if(valoresRevSis[5][1] == 'Positivo'){
$("input[name=GI][value='Positivo']").prop("checked",true);
}
else {
                $("input[name=GI][value='Negativo']").prop("checked",true);
            }
$("#DescGI").val(valoresRevSis[5][2]);

if(valoresRevSis[6][1] == 'Positivo'){
$("input[name=GU][value='Positivo']").prop("checked",true);
}
else {
                $("input[name=GU][value='Negativo']").prop("checked",true);
            }
$("#DescGU").val(valoresRevSis[6][2]);

if(valoresRevSis[7][1] == 'Positivo'){
$("input[name=MSQ][value='Positivo']").prop("checked",true);
}
else {
                $("input[name=MSQ][value='Negativo']").prop("checked",true);
            }
$("#DescMSQ").val(valoresRevSis[7][2]);

if(valoresRevSis[8][1] == 'Positivo'){
$("input[name=Piel][value='Positivo']").prop("checked",true);
}
else {
                $("input[name=Piel][value='Negativo']").prop("checked",true);
            }
$("#DescPiel").val(valoresRevSis[8][2]);

if(valoresRevSis[9][1] == 'Positivo'){
$("input[name=Neuro][value='Positivo']").prop("checked",true);
}
else {
                $("input[name=Neuro][value='Negativo']").prop("checked",true);
            }
$("#DescNeuro").val(valoresRevSis[9][2]);

if(valoresRevSis[10][1] == 'Positivo'){
$("input[name=Psiq][value='Positivo']").prop("checked",true);
}
else {
                $("input[name=Psiq][value='Negativo']").prop("checked",true);
            }
$("#DescPsiq").val(valoresRevSis[10][2]);

if(valoresRevSis[11][1] == 'Positivo'){
$("input[name=Endoc][value='Positivo']").prop("checked",true);
}
else {
                $("input[name=Endoc][value='Negativo']").prop("checked",true);
            }
$("#DescEndoc").val(valoresRevSis[11][2]);

if(valoresRevSis[12][1] == 'Positivo'){
$("input[name=Otros][value='Positivo']").prop("checked",true);
}
else {
                $("input[name=Otros][value='Negativo']").prop("checked",true);
            }
$("#DescOtros").val(valoresRevSis[12][2]);
			
			
	});
}

function ExFisicTime(){	
    setTimeout('ExFisico()',150)
}

function ExFisico(){
	document.getElementById("formularioExFis").reset();
	
	var NoPaciente = document.getElementById('NoPaciente').value;
	$.ajax({
		url:'../Controlador/ExFisicoController.php',
		type:'POST',
		data:'valor='+NoPaciente+'&boton=buscar'
	}).done(function(resp){
		//alert(resp);
		var valoresExFisico = eval(resp);
		//html="<table class='table table-hover'><thead><tr><th>#</th><th>Codiogo Paciente</th><th>No. Ficha</th><th>Nombre</th><th>Apellido</th><th>Telefono</th><th>Dirección</th><th>Sexo</th><th>Opciones</th></tr></thead><tbody>";
		for(i=0;i<valoresExFisico.length;i++){
			datosExFisico=valoresExFisico[i][0]+"*"+valoresExFisico[i][1]+"*"+valoresExFisico[i][2]+"*"+valoresExFisico[i][3]+"*"+valoresExFisico[i][4];
			}		
		var datExFisico=datosExFisico.split("*")	
if(valoresExFisico[0][1] == 'Positivo'){
$("input[name=generalFis][value='Positivo']").prop("checked",true);
}
else {
                $("input[name=generalFis][value='Negativo']").prop("checked",true);
            }
$("#DescGeneralFis").val(valoresExFisico[0][2]);

if(valoresExFisico[1][1] == 'Positivo'){
$("input[name=OjosFis][value='Positivo']").prop("checked",true);
}
else {
                $("input[name=OjosFis][value='Negativo']").prop("checked",true);
            }
$("#DescOjosFis").val(valoresExFisico[1][2]);

if(valoresExFisico[2][1] == 'Positivo'){
$("input[name=ORLFis][value='Positivo']").prop("checked",true);
}
else {
                $("input[name=ORLFis][value='Negativo']").prop("checked",true);
            }
$("#DescORLFis").val(valoresExFisico[2][2]);

if(valoresExFisico[3][1] == 'Positivo'){
$("input[name=CVFis][value='Positivo']").prop("checked",true);
}
else {
                $("input[name=CVFis][value='Negativo']").prop("checked",true);
            }
$("#DescCVFis").val(valoresExFisico[3][2]);

if(valoresExFisico[4][1] == 'Positivo'){
$("input[name=RESPFis][value='Positivo']").prop("checked",true);
}
else {
                $("input[name=RESPFis][value='Negativo']").prop("checked",true);
            }
$("#DescRESPFis").val(valoresExFisico[4][2]);

if(valoresExFisico[5][1] == 'Positivo'){
$("input[name=GIFis][value='Positivo']").prop("checked",true);
}
else {
                $("input[name=GIFis][value='Negativo']").prop("checked",true);
            }
$("#DescGIFis").val(valoresExFisico[5][2]);

if(valoresExFisico[6][1] == 'Positivo'){
$("input[name=GUFis][value='Positivo']").prop("checked",true);
}
else {
                $("input[name=GUFis][value='Negativo']").prop("checked",true);
            }
$("#DescGUFis").val(valoresExFisico[6][2]);

if(valoresExFisico[7][1] == 'Positivo'){
$("input[name=MSQFis][value='Positivo']").prop("checked",true);
}
else {
                $("input[name=MSQFis][value='Negativo']").prop("checked",true);
            }
$("#DescMSQFis").val(valoresExFisico[7][2]);

if(valoresExFisico[8][1] == 'Positivo'){
$("input[name=PielFis][value='Positivo']").prop("checked",true);
}
else {
                $("input[name=PielFis][value='Negativo']").prop("checked",true);
            }
$("#DescPielFis").val(valoresExFisico[8][2]);

if(valoresExFisico[9][1] == 'Positivo'){
$("input[name=NeuroFis][value='Positivo']").prop("checked",true);
}
else {
                $("input[name=NeuroFis][value='Negativo']").prop("checked",true);
            }
$("#DescNeuroFis").val(valoresExFisico[9][2]);

if(valoresExFisico[10][1] == 'Positivo'){
$("input[name=PsiqFis][value='Positivo']").prop("checked",true);
}
else {
                $("input[name=PsiqFis][value='Negativo']").prop("checked",true);
            }
$("#DescPsiqFis").val(valoresExFisico[10][2]);

if(valoresExFisico[11][1] == 'Positivo'){
$("input[name=EndocFis][value='Positivo']").prop("checked",true);
}
else {
                $("input[name=EndocFis][value='Negativo']").prop("checked",true);
            }
$("#DescEndocFis").val(valoresExFisico[11][2]);

if(valoresExFisico[12][1] == 'Positivo'){
$("input[name=CabezaFis][value='Positivo']").prop("checked",true);
}
else {
                $("input[name=CabezaFis][value='Negativo']").prop("checked",true);
            }
$("#DescCabezaFis").val(valoresExFisico[12][2]);
			
if(valoresExFisico[13][1] == 'Positivo'){
$("input[name=CuelloFis][value='Positivo']").prop("checked",true);
}
else {
                $("input[name=CuelloFis][value='Negativo']").prop("checked",true);
            }
$("#DescCuelloFis").val(valoresExFisico[13][2]);

if(valoresExFisico[14][1] == 'Positivo'){
$("input[name=AbdomenFis][value='Positivo']").prop("checked",true);
}
else {
                $("input[name=AbdomenFis][value='Negativo']").prop("checked",true);
            }
$("#DescAbdomensFis").val(valoresExFisico[14][2]);

if(valoresExFisico[15][1] == 'Positivo'){
$("input[name=PechoFis][value='Positivo']").prop("checked",true);
}
else {
                $("input[name=PechoFis][value='Negativo']").prop("checked",true);
            }
$("#DescPechoFis").val(valoresExFisico[15][2]);

if(valoresExFisico[16][1] == 'Positivo'){
$("input[name=EspaldaFis][value='Positivo']").prop("checked",true);
}
else {
                $("input[name=EspaldaFis][value='Negativo']").prop("checked",true);
            }
$("#DescEspaldaFis").val(valoresExFisico[16][2]);

if(valoresExFisico[17][1] == 'Positivo'){
$("input[name=ExtremidadesFis][value='Positivo']").prop("checked",true);
}
else {
                $("input[name=ExtremidadesFis][value='Negativo']").prop("checked",true);
            }
$("#DescExtremidadesFis").val(valoresExFisico[17][2]);
	});
}

function EvaluacionPlanTime(){
    setTimeout('EvaluacionPlanP()',150)
}

function EvaluacionPlanP(){
	document.getElementById("formularioEvaPlan").reset();
	var NoPaciente = document.getElementById('NoPaciente').value;
	$.ajax({
		url:'../Controlador/EvaluacionPlanController.php',
		type:'POST',
		data:'valor='+NoPaciente+'&boton=buscar'
	}).done(function(resp){
		//alert(resp);
		var valoresEvaPlan = eval(resp);
		//html="<table class='table table-hover'><thead><tr><th>#</th><th>Codiogo Paciente</th><th>No. Ficha</th><th>Nombre</th><th>Apellido</th><th>Telefono</th><th>Dirección</th><th>Sexo</th><th>Opciones</th></tr></thead><tbody>";
		for(i=0;i<valoresEvaPlan.length;i++){
			datosEvaluacionPlan=valoresEvaPlan[i][0]+"*"+valoresEvaPlan[i][1]+"*"+valoresEvaPlan[i][2]+"*"+valoresEvaPlan[i][3]+"*"+valoresEvaPlan[i][4]+"*"+valoresEvaPlan[i][5]+"*"+valoresEvaPlan[i][6];
			}		
		var datEvalPlan=datosEvaluacionPlan.split("*")		
		$("#DiagDif").val(datEvalPlan[1]);
		$("#EvClinica").val(datEvalPlan[3]);
		$("#Proces").val(datEvalPlan[4]);
		$("#Consultas").val(datEvalPlan[5]);
        $("#LabImagens").val(datEvalPlan[2]);

	});
}
function MedicamentosTime(){
    setTimeout('MedicamentosP()',150)
}
function MedicamentosP(){
	document.getElementById("FormMedicamentos").reset();
	var NoPaciente = document.getElementById('NoPaciente').value;
	$.ajax({
		url:'../Controlador/MedicamentosController.php',
		type:'POST',
		data:'valor='+NoPaciente+'&boton=buscar'
	}).done(function(resp){
		//alert(resp);
		var valoresMedicamentos = eval(resp);
		//html="<table class='table table-hover'><thead><tr><th>#</th><th>Codiogo Paciente</th><th>No. Ficha</th><th>Nombre</th><th>Apellido</th><th>Telefono</th><th>Dirección</th><th>Sexo</th><th>Opciones</th></tr></thead><tbody>";
		for(i=0;i<valoresMedicamentos.length;i++){
			datMedicamentos=valoresMedicamentos[i][0]+"*"+valoresMedicamentos[i][1]+"*"+valoresMedicamentos[i][2];
			//html+="<tr><td>"+(i+1)+"</td><td>"+valores[i][2]+"</td><td>"+valores[i][1]+"</td><td>"+valores[i][5]+"</td><td>"+valores[i][7]+"</td><td><button class='btn btn-warning' data-toggle='modal' data-target='#modallibros' onclick='imprimir("+'"'+valores[i][0]+'"'+");'><span class='glyphicon glyphicon-print'></span></button><button  class='btn btn-danger' onclick='MST(); mostrar("+'"'+datos+'"'+"); '><span class='glyphicon glyphicon-print'></span></button></td></tr>";
		}
		//html+="</tbody></table>"
		//$("#lista").html(html);
		var datMed=datMedicamentos.split("*");
		//alert(datTria);
		$("#medSuminis").val(datMed[1]);
		

	});
}
function MedicamentosBitacoraTime(){
    setTimeout('MedicamentosBitacora()',150)
}
function MedicamentosBitacora(){
	//document.getElementById("FormMedicamentos").reset();
	var NoPaciente = document.getElementById('NoPaciente').value;
	$.ajax({
		url:'../Controlador/MedicamentosBitacora.php',
		type:'POST',
		data:'valor='+NoPaciente+'&boton=buscar'
	}).done(function(resp){
		//alert(resp);
		var valoresMedBita = eval(resp);
		//html="<table class='table table-hover'><thead><tr><th>#</th><th>Codiogo Paciente</th><th>No. Ficha</th><th>Nombre</th><th>Apellido</th><th>Telefono</th><th>Dirección</th><th>Sexo</th><th>Opciones</th></tr></thead><tbody>";
		for(i=0;i<valoresMedBita.length;i++){
			datMedicamentosBi=valoresMedBita[i][0]+"*"+valoresMedBita[i][1]+"*"+valoresMedBita[i][2]+"*"+valoresMedBita[i][3]+"*"+valoresMedBita[i][4]+"*"+valoresMedBita[i][5]+"*"+valoresMedBita[i][6]+"*"+valoresMedBita[i][7];
			//html+="<tr><td>"+(i+1)+"</td><td>"+valores[i][2]+"</td><td>"+valores[i][1]+"</td><td>"+valores[i][5]+"</td><td>"+valores[i][7]+"</td><td><button class='btn btn-warning' data-toggle='modal' data-target='#modallibros' onclick='imprimir("+'"'+valores[i][0]+'"'+");'><span class='glyphicon glyphicon-print'></span></button><button  class='btn btn-danger' onclick='MST(); mostrar("+'"'+datos+'"'+"); '><span class='glyphicon glyphicon-print'></span></button></td></tr>";
		}
		//html+="</tbody></table>"
		//$("#lista").html(html);
		var datMedBi=datMedicamentosBi.split("*");
		//alert(datTria);
	//$("#resBitacora").val(datMed[1]);
		
if(datMedBi[3]!=""){
//alert("hay un dato midificado"+datMedBi[3]);
document.FormMedicamentos.medSuminis.style.background='#A9DDF7' 
}
	});
}


function ImagenesTime(){
    setTimeout('ImagenesP()',150)

}
function ImagenesP(){
	document.getElementById("subida").reset();
	
	var NoPaciente = document.getElementById('NoPaciente').value;
	$.ajax({
		url:'../Controlador/ImagenController.php',
		type:'POST',
		data:'valor='+NoPaciente+'&boton=buscar'
	}).done(function(resp){
		//alert(resp);

		var valoresImg = eval(resp);
		var ruta = '../ImagenesPac/';
		//alert(ruta);
		html="<table class='table table-hover'><thead><tr><th>#</th><th>Descipción</th><th>Imagen</th></tr></thead><tbody>";
		for(i=0;i<valoresImg.length;i++){
			datImg=valoresImg[i][0]+"*"+valoresImg[i][1]+"*"+valoresImg[i][2]+"*"+valoresImg[i][3];
			$("#ImgsList").val(valoresImg[i][2]);

			html+="<tr><td>"+(i+1)+"</td><td>"+valoresImg[i][2]+"</td><td>"+"<img src="+ruta+valoresImg[i][3]+" width='100 'height='100' onclick='mostrarImagen("+'"'+ruta+valoresImg[i][3]+'"'+");'   >"+"</td><td>";
		}
		
		html+="</tbody></table>"
		$("#ImgsList").html(html);
		//var datImg=datImagenes.split("*");
//alert(ruta+datImg[3]);
		//alert(datTria);
		//$("#medSuminis").val(datMed[1]);
		

	});
}

function mostrarImagen(ruta){
	document.getElementById("MuestraImg").reset();
	
//alert(ruta);
html="<img src="+ruta+" width='600px' height='600px' >";
var ventana = document.getElementById('miVentana');
    ventana.style.marginTop = "0%";
    ventana.style.left = "0%";
    ventana.style.display = 'block';
     ventana.style.background = 'rgba(0,0,0,0.5)';
    $("#miVentanaIMG").html(html);
 var ImgVentana = document.getElementById('miVentanaIMG');
     ImgVentana.style.marginTop = "5%";
     ImgVentana.style.left = "30%"; 
}


function DisposicionTime(){
    setTimeout('DisposicionP()',150)
}
function DisposicionP(){
	document.getElementById("formularioDisposicion").reset();

	var NoPaciente = document.getElementById('NoPaciente').value;
	$.ajax({
		url:'../Controlador/DisposicionController.php',
		type:'POST',
		data:'valor='+NoPaciente+'&boton=buscar'
	}).done(function(resp){
		//alert(resp);
		var valoresDispo = eval(resp);
		//html="<table class='table table-hover'><thead><tr><th>#</th><th>Codiogo Paciente</th><th>No. Ficha</th><th>Nombre</th><th>Apellido</th><th>Telefono</th><th>Dirección</th><th>Sexo</th><th>Opciones</th></tr></thead><tbody>";
		for(i=0;i<valoresDispo.length;i++){
			datosDispo=valoresDispo[i][0]+"*"+valoresDispo[i][1]+"*"+valoresDispo[i][2]+"*"+valoresDispo[i][3]+"*"+valoresDispo[i][4]+"*"+valoresDispo[i][5]+"*"+valoresDispo[i][6];
			}
		var datDispo=datosDispo.split("*")		
		$("#OtraInfoDisp").val(datDispo[1]);
		$("#NotasMedicoCargo").val(datDispo[2]);
		$("#OtrasNotas").val(datDispo[3]);
		$("#HoraDispo").val(datDispo[4]);

if(datDispo[6] == '1'){
$("input[name=Dispo][value='1']").prop("checked",true);
}
if(datDispo[6] == '2'){
$("input[name=Dispo][value='2']").prop("checked",true);
}
if(datDispo[6] == '3'){
$("input[name=Dispo][value='3']").prop("checked",true);
}		
if(datDispo[6] == '4'){
$("input[name=Dispo][value='4']").prop("checked",true);
}
if(datDispo[6] == '5'){
$("input[name=Dispo][value='5']").prop("checked",true);
}	
if(datDispo[6] == '6'){
$("input[name=Dispo][value='6']").prop("checked",true);
}
if(datDispo[6] == '7'){
$("input[name=Dispo][value='7']").prop("checked",true);
}					
		});		
}

function MedicoTime(){
    setTimeout('Medico()',150)
}
function Medico(){
document.getElementById("formularioDisposicion").reset();
	var NoPaciente = document.getElementById('NoPaciente').value;
	$.ajax({
		url:'../Controlador/MedicoController.php',
		type:'POST',
		data:'valor='+NoPaciente+'&boton=buscar'
	}).done(function(resp){
		//alert(resp);
		var valoresMedico = eval(resp);
		//html="<table class='table table-hover'><thead><tr><th>#</th><th>Codiogo Paciente</th><th>No. Ficha</th><th>Nombre</th><th>Apellido</th><th>Telefono</th><th>Dirección</th><th>Sexo</th><th>Opciones</th></tr></thead><tbody>";
		for(i=0;i<valoresMedico.length;i++){
			datosMedico=valoresMedico[i][0]+"*"+valoresMedico[i][1]+"*"+valoresMedico[i][2]+"*"+valoresMedico[i][3]+"*"+valoresMedico[i][4]+"*"+valoresMedico[i][5]+"*"+valoresMedico[i][6];
			}
		var datMedico=datosMedico.split("*")		
		$("#TiempoContatoMD").val(datMedico[1]);
		$("#FirmaMD").val(datMedico[2]);
	if(datMedico[3] == 'Si'){
$("input[name=ViPacienteMD][value='Si']").prop("checked",true);
}	
else{
$("input[name=ViPacienteMD][value='Si']").prop("checked",false);
}			
		});		
}
function ResidenteTime(){
    setTimeout('Residente()',150)
}
function Residente(){
	document.getElementById("formularioDisposicion").reset();
	var NoPaciente = document.getElementById('NoPaciente').value;
	$.ajax({
		url:'../Controlador/ResidenteController.php',
		type:'POST',
		data:'valor='+NoPaciente+'&boton=buscar'
	}).done(function(resp){
		//alert(resp);
		var valoresResidente = eval(resp);
		//html="<table class='table table-hover'><thead><tr><th>#</th><th>Codiogo Paciente</th><th>No. Ficha</th><th>Nombre</th><th>Apellido</th><th>Telefono</th><th>Dirección</th><th>Sexo</th><th>Opciones</th></tr></thead><tbody>";
		for(i=0;i<valoresResidente.length;i++){
			datosResidente=valoresResidente[i][0]+"*"+valoresResidente[i][1]+"*"+valoresResidente[i][2]+"*"+valoresResidente[i][3]+"*"+valoresResidente[i][4]+"*"+valoresResidente[i][5]+"*"+valoresResidente[i][6];
			}
		var datResidente=datosResidente.split("*")		
		$("#TiempoContatoRS").val(datResidente[1]);
		$("#FirmaRS").val(datResidente[2]);
	if(datResidente[3] == 'Si'){
$("input[name=ViPacienteRS][value='Si']").prop("checked",true);
}	
else{
$("input[name=ViPacienteRS][value='Si']").prop("checked",false);
}	
		});				
}
function Limpiar(){
$("#codigoficha").val("");
$("#codigo").val("");
$("#fecha").val("");
$("#hora").val("");
$("#referido").val("");
$("#Anotificadas").val("");
$("#codigoficha").val("");
$("#codigoficha").val("");
$("#codigoficha").val("");
$("#codigoficha").val("");


}
function TagTime(){
 
    setTimeout('viewtag()',350);
    //alert("Prueba");
}

//Funcion para cargar etiquetas en imagen

  function viewtag( pic_id )
    {
      // get the tag list with action remove and tag boxes and place it on the image.
        var idPaciente = document.getElementById('NoPaciente').value;
	  $.post( "../inicio/taglist.php" ,  "idPaciente=" + idPaciente, function( data ) {
	  	$('#taglist ol').html(data.lists);
		 $('#tagbox').html(data.boxes);
	  }, "json");
	
    }





function imprimir(id){
var win = window.open('../php/Reporte1.php?+NoPaciente='+id, '_blank');
  win.focus();
}

function MST(){
document.getElementById('enviarModINfo').style.display = 'block';
document.getElementById('enviar').style.display = 'none';

document.getElementById('enviarTriage').style.display = 'none';
document.getElementById('ModificaTriage').style.display = 'block';

document.getElementById('EnviaEvaluacion').style.display = 'none';
document.getElementById('ModificaEnvEva').style.display = 'block';

document.getElementById('EnviaRevSist').style.display = 'none';
document.getElementById('ModificaEnvaiRevS').style.display = 'block';

document.getElementById('EnviaExFisico').style.display = 'none';
document.getElementById('EditaExFisico').style.display = 'block';

document.getElementById('EnviaEvaYplan').style.display = 'none';
document.getElementById('EditaEvaPlan').style.display = 'block';

document.getElementById('EnviaDispo').style.display = 'none';
document.getElementById('EditaEnviaDispo').style.display = 'block';

document.getElementById('EnviaDispo').style.display = 'none';
document.getElementById('EditaEnviaDispo').style.display = 'block';

document.getElementById('EnviaMedicamentos').style.display = 'none';
document.getElementById('EditaMedicamentos').style.display = 'block';
}

function copiaridpaciente() {
    document.getElementById('varPaciente').value = document.getElementById('NoPaciente').value;
  
}
