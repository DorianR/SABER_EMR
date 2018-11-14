function Table(){
    var ServicioP = document.getElementById('SrCio').value;
    var NombreTabla = "";
    if(ServicioP == "2"){
        NombreTabla ='infpaciente';
        return NombreTabla;
    }
    else if (ServicioP == "3"){
        NombreTabla ='traumainfpaciente';
        return NombreTabla;
    }
    else if (ServicioP == "4"){
        NombreTabla ='ciruinfpaciente';
        return NombreTabla;
    }
    else if (ServicioP == "5"){
        NombreTabla ='pediainfpaciente';
        return NombreTabla;
    }
    else if (ServicioP == "6"){
        NombreTabla ='atenvicinfpaciente';
        return NombreTabla;
    }
}
function EnviaInfpV3(OpcPac){
    var opcion = OpcPac;
    var idPac = document.getElementById('NoPaciente').value;
    var pApellido =  document.getElementById('PrApe').value;
    var sApellido = document.getElementById('SeApe').value;
    var dCasada =  document.getElementById('DeCas').value;
    var pNombre =  document.getElementById('PrNom').value;
    var sNombre = document.getElementById('SeNom').value;
    var expMedico =  document.getElementById('ExpMedico').value;
    var sexoP = document.getElementById('Sex').value;
    var edadP =  document.getElementById('Eda').value;
    var ocupaP = document.getElementById('OcuP').value;
    var pagoIG =  document.getElementById('PagIg').value;
    var direcP = document.getElementById('ProcedeDire').value;
    var telP =  document.getElementById('Tel').value;
    var eCivil = document.getElementById('EstCiv').value;
    var ServiAtendido = document.getElementById('SrCio').value;
    var FechaIngFicha = obtiene_fecha();
    var NoPer = document.getElementById('idPersonaIngInf').value;
    var TablaInfP = Table();
    if((pApellido=="") || (pNombre=="" || (ServiAtendido=="1"))){
        swal("ingresa: primer nombre, primer apellido y selecciona servicio de atencion..!","","error")
    }
    else{
        $.ajax({
            type:'POST',
            url:'../php/EnviaInfBPacV3.php',
            data:('idPaciente='+idPac+'&PrApe='+pApellido+'&SeApe='+sApellido+'&DeCas='+dCasada+'&PrNom='+pNombre+'&SeNom='+sNombre+'&ExpMedico='+expMedico+'&Sex='+sexoP+'&Eda='+edadP+'&OcuP='+ocupaP+'&PagIg='+pagoIG+'&ProcedeDire='+direcP+'&Tel='+telP+'&EstCiv='+eCivil+'&FechaIniLLenado='+FechaIngFicha+'&ServAtendido='+ServiAtendido+'&PerIngInfo='+NoPer+'&TablaNombreP='+TablaInfP+'&opcP='+opcion),
            success:function(respuesta){
                if (respuesta != ""){
                    swal("Paciente registrado..!","","success")
                    document.getElementById('NoPaciente').value=respuesta;
                    // CODIGO PARA BLOQUEAR EL BOTON DE GUARDAR EL PACIENTE,
                    $('#EnviainfbP').attr("disabled", true);
                }
                else{
                    swal("Error..!","","error");
                }
            }
        })
    }
}
function obtiene_fecha() {
    var fecha_actual = new Date()
    var dia = fecha_actual.getDate()
    var mes = fecha_actual.getMonth() + 1
    var anio = fecha_actual.getFullYear()
    if (mes < 10)
        mes = '0' + mes
    if (dia < 10)
        dia = '0' + dia
    return (anio + "/" + mes + "/" + dia)
}



function InsUpContacP(){
    var idPac = document.getElementById('NoPaciente').value;
    var conP = document.getElementById('contactPaciente').value;
    var TablaNombre = Table();
    //var opcionP = 'prueba';
    if(idPac==""){

        swal("No se ha registrado informacion basica del paciente ..!","","error")
    }
    else{
        $.ajax({
            type:'POST',
            url:'../php/OperacionesV3EME.php',
            data:('NoPaciente='+idPac+'&cPaciente='+conP+'&NomTabla='+TablaNombre+'&opc=UpContPac'),
            success:function(respuesta){
                if (respuesta != ""){
                    //alert("ok Contacto de paciente")
                }
                else{
                    swal("Error..!","","error");
                }
            }
        })
    }
}
function InsUpMotConsulta(){
    var idPac = document.getElementById('NoPaciente').value;
    var mIngreso = document.getElementById('MIngres').value;
    var ServPa = document.getElementById('SrCio').value;
    if(idPac==""){
        swal("Registre informacion basica del paciente por favor..!","","error")
    }
    else{
        $.ajax({
            type:'POST',
            url:'../php/OperacionesV3EME.php',
            data:('NoPaciente='+idPac+'&motIngreso='+mIngreso+'&ServiP='+ServPa+'&opc=motivoIng'),
            success:function(respuesta){
                if (respuesta != ""){
                    // alert("ok motivo ingreso")
                }
                else{
                    swal("Error..!","","error");
                }
            }
        })
    }
}
function InsUpAnteRcUrgen(){
    var idPac = document.getElementById('NoPaciente').value;
    var antecedentesUrg = document.getElementById('AntRCU').value;
    var ServPa = document.getElementById('SrCio').value;
    if(idPac==""){
        swal("Registre informacion basica del paciente por favor..!","","error")
    }
    else{
        $.ajax({
            type:'POST',
            url:'../php/OperacionesV3EME.php',
            data:('NoPaciente='+idPac+'&AntecedentesUrgen='+antecedentesUrg+'&ServiP='+ServPa+'&opc=AnRelConUrg'),
            success:function(respuesta){
                if (respuesta != ""){
                    //alert("ok motivo ingreso")
                }
                else{
                    swal("Error..!","","error");
                }
            }
        })
    }
}
function InsUpFechaUrgencia(){
    var idPac = document.getElementById('NoPaciente').value;
    var FechaIng = document.getElementById('FeHoIngreso').value;
    var ServPa = document.getElementById('SrCio').value;
    if(idPac==""){
        swal("Registre informacion basica del paciente por favor..!","","error")
    }
    else{
        $.ajax({
            type:'POST',
            url:'../php/OperacionesV3EME.php',
            data:('NoPaciente='+idPac+'&fechaIngUrg='+FechaIng+'&ServiP='+ServPa+'&opc=FechaIngresoU'),
            success:function(respuesta){
                if (respuesta != ""){
                    // alert("ok motivo ingreso")
                }
                else{
                    swal("Error..!","","error");
                }
            }
        })
    }
}
function InsUpCamposAll(opcion, campo){
    var idPac = document.getElementById('NoPaciente').value;
    var ServPa = document.getElementById('SrCio').value;
    if(idPac==""){
        swal("Registre informacion basica del paciente por favor..!","","error")
    }
    else{
        $.ajax({
            type:'POST',
            url:'../php/OperacionesV3EME.php',
            data:('NoPaciente='+idPac+'&cmpo='+campo+'&ServiP='+ServPa+'&opc='+opcion),
            success:function(respuesta){
                if (respuesta != ""){
                    //alert("ok motivo ingreso")
                }
                else{
                    swal("Error..!","","error");
                }
            }
        })
    }
}
function InsOrden(FechaN, NumN, OrdenN, EvolucionN ){
    var idPac = document.getElementById('NoPaciente').value;
    var FechaNe = document.getElementById(FechaN).value;
    var NumNe = document.getElementById(NumN).value;
    var OrdenNe = document.getElementById(OrdenN).value;
    var EvolucionNe = document.getElementById(EvolucionN).value;
    var ServPa = document.getElementById('SrCio').value;
    var opcion = "NtaEnfermeria";

    if(idPac==""){
        swal("Verifique información básica del paciente, y los campos de Ordenes","","error")
    }
    else{
        $.ajax({
            type:'POST',
            url:'../php/OperacionesV3EME.php',
            data:('NoPaciente='+idPac+'&FechaN='+FechaNe+'&NumN='+NumNe+'&OrdeN='+OrdenNe+'&EvolucionN='+EvolucionNe+'&ServiP='+ServPa+'&opc='+opcion),
            success:function(respuesta){
                if (respuesta != ""){
                    swal("Orden registrada con exito..!","","success")
                    $('#btnNE').attr("disabled",true);
                }
                else{
                    swal("Error..!","","error");
                }
            }
        })
    }
}



function InsEnfermeriaNta(){
    var idPac = document.getElementById('NoPaciente').value;
    var NombreEnfermero = document.getElementById('NombreEnf').value;
    var NotaEnf = document.getElementById('Ntenfermeria').value;
    var TurnoEnf =   $('input:radio[name=Turn]:checked').val();
    var ServPa = document.getElementById('SrCio').value;

    if(idPac=="" || NombreEnfermero=="" || NotaEnf=="" || TurnoEnf== undefined ){
        swal("Verifique información básica del paciente, y los campos de notas de enfermeria","","error")
    }
    else{
        $.ajax({
            type:'POST',
            url:'../php/OperacionesV3EME.php',
            data:('NoPaciente='+idPac+'&NombEnf='+NombreEnfermero+'&Ntaenf='+NotaEnf+'&TrnEn='+TurnoEnf+'&ServiP='+ServPa+'&opc=Ntaenfermeria'),
            success:function(respuesta){
                if (respuesta != ""){
                    swal("Orden registrada con exito..!","","success")
                    $('#SaveNtaEnf').attr("disabled",true);
                }
                else{
                    swal("Error..!","","error");
                }
            }
        })
    }
}
function InsEnfermeriaNta2(){
    var idPac = document.getElementById('NoPaciente').value;
    var NombreEnfermero = document.getElementById('NombreEnf2').value;
    var NotaEnf = document.getElementById('Ntenfermeria2').value;
    var TurnoEnf =   $('input:radio[name=Turn2]:checked').val();
    var ServPa = document.getElementById('SrCio').value;
    if(idPac=="" || NombreEnfermero=="" || NotaEnf=="" || TurnoEnf== undefined ){
        swal("Verifique información básica del paciente, y los campos de notas de enfermeria","","error")
    }
    else{
        $.ajax({
            type:'POST',
            url:'../php/OperacionesV3EME.php',
            data:('NoPaciente='+idPac+'&NombEnf='+NombreEnfermero+'&Ntaenf='+NotaEnf+'&TrnEn='+TurnoEnf+'&ServiP='+ServPa+'&opc=Ntaenfermeria'),
            success:function(respuesta){
                if (respuesta != ""){
                    swal("Orden registrada con exito..!","","success")
                    $('#SaveNtaEnf2').attr("disabled",true);
                }
                else{
                    swal("Error..!","","error");
                }
            }
        })
    }
}
function InsEnfermeriaNta3(){
    var idPac = document.getElementById('NoPaciente').value;
    var NombreEnfermero = document.getElementById('NombreEnf3').value;
    var NotaEnf = document.getElementById('Ntenfermeria3').value;
    var TurnoEnf =   $('input:radio[name=Turn3]:checked').val();
    var ServPa = document.getElementById('SrCio').value;

    if(idPac=="" || NombreEnfermero=="" || NotaEnf=="" || TurnoEnf== undefined ){
        swal("Verifique información básica del paciente, y los campos de notas de enfermeria","","error")
    }
    else{
        $.ajax({
            type:'POST',
            url:'../php/OperacionesV3EME.php',
            data:('NoPaciente='+idPac+'&NombEnf='+NombreEnfermero+'&Ntaenf='+NotaEnf+'&TrnEn='+TurnoEnf+'&ServiP='+ServPa+'&opc=Ntaenfermeria'),
            success:function(respuesta){
                if (respuesta != ""){
                    swal("Orden registrada con exito..!","","success")
                    $('#SaveNtaEnf3').attr("disabled",true);
                }
                else{
                    swal("Error..!","","error");
                }
            }
        })
    }
}

function ApareceRwNota(NombreRw){

    document.getElementById(NombreRw).style.display='block';
    //document.getElementById('OcultarInfB').style.display='none';
}

function IngImpClinica(opcion,valorCampo,id){
    var idPac = document.getElementById('NoPaciente').value;
    var ServPa = document.getElementById('SrCio').value;
    // var ValorCamp = document.getElementById(id).value;
    if(idPac==""){
        swal("Registre informacion basica del paciente por favor..!","","error")
    }
    else{
        $.ajax({
            type:'POST',
            url:'../php/OperacionesV3EME.php',
            data:('NoPaciente='+idPac+'&ServiP='+ServPa+'&NoImp='+id+'&cmpo='+valorCampo+'&opc='+opcion),
            success:function(respuesta){
                if (respuesta != ""){
                    //document.getElementById(id).disabled = true;

                }
                else{
                    swal("Error..!","","error");
                }
            }
        })
    }
}
function lista_Pacientes(valor){
    document.getElementById('lista').style.display='block';
    $.ajax({
        url:'../php/searchPaciente.php',
        type:'POST',
        data:'Bpaciente='+valor+'&opc=buscarPacienteEM'
    }).done(function(resp){
        //alert(resp);
        var valores = eval(resp);
        html="<table class='table table-hover'><thead><tr><th>#</th><th>Opciones</th><th>Nombre.</th><th>Apellido</th><th>FechaIng</th><th>Sexo</th><th>Dirección</th><th>No. Expediente</th><th>Servicio</th></tr></thead><tbody>";
        for(i=0;i<valores.length;i++){
            datos=valores[i][0]+"*"+valores[i][1]+"*"+valores[i][2]+"*"+valores[i][3]+"*"+valores[i][4]+"*"+valores[i][5]+"*"+valores[i][6]+"*"+valores[i][7]+"*"+valores[i][8]+"*"+valores[i][9]+"*"+valores[i][10]+"*"+valores[i][11]+"*"+valores[i][12]+"*"+valores[i][13]+"*"+valores[i][14]+"*"+valores[i][15]+"*"+valores[i][16]+"*"+valores[i][17]+"*"+valores[i][18]+"*"+valores[i][19]+"*"+valores[i][20]+"*"+valores[i][21]+"*"+valores[i][22]+"*"+valores[i][23]+"*"+valores[i][24]+"*"+valores[i][25]+"*"+valores[i][26]+"*"+valores[i][27]+"*"+valores[i][28]+"*"+valores[i][29]+"*"+valores[i][30]+"*"+valores[i][31]+"*"+valores[i][32];
            html+="<tr><td>"+(i+1)+"</td><td><button class='btn btn-warning' id='modUsPas' name='modUsPas' onclick='abrirReportePrueba()' ><span class='glyphicon glyphicon-print'></span></button><button  class='btn btn-danger'  onclick='  mostrar("+'"'+datos+'"'+"); CargarInfoP();'><span class='glyphicon glyphicon-retweet'></span></button></td><td>"+valores[i][7]+"</td><td>"+valores[i][9]+"</td><td>"+valores[i][5]+"</td><td>"+valores[i][23]+"</td><td>"+valores[i][22]+"</td><td>"+valores[i][1]+"</td><td>"+valores[i][32]+"</td></tr>";
        }
        html+="</tbody></table>"
        $("#lista").html(html);
    });
}
function mostrar(datos){
    var d=datos.split("*");
    $("#NoPaciente").val(d[0]);
    $("#PrApe").val(d[9]);
    $("#SeApe").val(d[10]);
    $("#DeCas").val(d[11]);
    $("#PrNom").val(d[7]);
    $("#SeNom").val(d[8]);
    $("#ExpMedico").val(d[1]);
    $("#Sex").val(d[23]);
    $("#Eda").val(d[15]);
    $("#EstCiv").val(d[28]);
    $("#OcuP").val(d[18]);
    $("#PagIg").val(d[2]);
    $("#ProcedeDire").val(d[22]);
    $("#Tel").val(d[21]);
    $("#mLLegada").val(d[21]);
    if(d[31]==='1')
    {
        $("input[name=mLLegada][value='1']").prop("checked",true);
    }
    if(d[31]==='3')
    {
        $("input[name=mLLegada][value='3']").prop("checked",true);
    }
    if(d[31]==='4')
    {
        $("input[name=mLLegada][value='4']").prop("checked",true);
    }
    $("#contactPaciente").val(d[24]);
    $("#SrCio").val(d[32]);

}

function CargarInfoP(){
    setTimeout('limpiarAll()',100);
    setTimeout('MotIngreso()',300);
    setTimeout('BExamenF()',300);
    setTimeout('BSvitales()',300);
    setTimeout('bICl()',300);
    setTimeout('bTipoCaso()',300);
    setTimeout('bMedResponsable()',300);
    setTimeout('bEgreso()',300);
    setTimeout('OrdenesEnf()',300);
    setTimeout('BnotaEnfermeria()',300)
    setTimeout('colorEdit()',300);

    setTimeout('DesabilitarAll()',300);
}
function limpiarAll() {
    /*  $('#PrApe').val("");
      $('#SeApe').val("");
      $('#DeCas').val("");
      $('#PrNom').val("");
      $('#SeNom').val("");
      $('#ExpMedico').val("");
      $('#Sex').val("");
      $('#Eda').val("");
      $('#EstCiv').val("");
      $('#OcuP').val("");
      $('#PagIg').val("");
      $('#ProcedeDire').val("");
      $('#Tel').val("");
      $('#mLLegada').val("");*/
    // $('#contactPaciente').val("");
    $('#MIngres').val("");
    $('#FeHoIngreso').val("");
    $('#AntRCU').val("");
    $('#PresAr').val("");
    $('#tempe').val("");
    $('#po').val("");
    $('#fr').val("");
    $('#fc').val("");
    $('#gli').val("");
    $('#DvConciente').val("");
    $('#talla').val("");
    $('#peso').val("");
    $('#NotExF').val("");
    $('#ImpC1').val("");
    $('#ImpC2').val("");
    $('#ImpC3').val("");
    $('#ImpC4').val("");
    $('#NCasoUrg').val("");
    $('#DvCasoUrg').val("");
    $('#NomMedG').val("");
    $('#NomInter').val("");
    $('#feEg').val("");
    $('#DvHospitalizado').val("");
    $('#Servi').val("");
    $('#FechaNE').val("");
    $('#numNE').val("");
    $('#OdenesNE').val("");
    $('#EvolucionNE').val("");
    $('#NombreEnf').val("");
    $('#Ntenfermeria').val("");
    $('#NombreEnf2').val("");
    $('#Ntenfermeria2').val("");
    $('#NombreEnf3').val("");
    $('#Ntenfermeria3').val("");
    $('#FechaNE1').val("");
    $('#numNE1').val("");
    $('#OdenesNE1').val("");
    $('#EvolucionNE1').val("");
}

function MotIngreso(){
    var NoPaciente = document.getElementById('NoPaciente').value;
    $.ajax({
        url:'../php/searchPaciente.php',
        type:'POST',
        data:'idPac='+NoPaciente+'&opc=buscarMotIngreso'
    }).done(function(resp){
        var valoresMingreso = eval(resp);
        for(i=0;i<valoresMingreso.length;i++){
            datMingreso=valoresMingreso[i][0]+"*"+valoresMingreso[i][1]+"*"+valoresMingreso[i][2]+"*"+valoresMingreso[i][3]+"*"+valoresMingreso[i][4];
        }
        var datIngMot=datMingreso.split("*");
        var fechaEjemplo = moment(datIngMot[3], 'YYYY/MM/DDTH:mm:ss');
        fechaEjemplo = fechaEjemplo.format('YYYY-MM-DDTH:mm:ss');
        $("#MIngres").val(datIngMot[1]);
        $("#AntRCU").val(datIngMot[2]);
        $("#FeHoIngreso").val(fechaEjemplo);
    });
}
function BExamenF(){
    var NoPaciente = document.getElementById('NoPaciente').value;
    $.ajax({
        url:'../php/searchPaciente.php',
        type:'POST',
        data:'idPac='+NoPaciente+'&opc=buscarExFisicoV3'
    }).done(function(resp){
        var valoresExfis = eval(resp);
        for(i=0;i<valoresExfis.length;i++){
            datExFis=valoresExfis[i][0]+"*"+valoresExfis[i][1]+"*"+valoresExfis[i][2]+"*"+valoresExfis[i][3]+"*"+valoresExfis[i][4];
        }
        var datEF=datExFis.split("*");
        $("#talla").val(datEF[1]);
        $("#peso").val(datEF[2]);
        $("#NotExF").val(datEF[3]);

    });
}
function BSvitales(){
    var NoPaciente = document.getElementById('NoPaciente').value;
    $.ajax({
        url:'../php/searchPaciente.php',
        type:'POST',
        data:'idPac='+NoPaciente+'&opc=SvitalesV3'
    }).done(function(resp){
        var valores = eval(resp);
        for(i=0;i<valores.length;i++){
            datArr=valores[i][0]+"*"+valores[i][1]+"*"+valores[i][2]+"*"+valores[i][3]+"*"+valores[i][4]+"*"+valores[i][5]+"*"+valores[i][6]+"*"+valores[i][7];
        }
        var DatoSP=datArr.split("*");
        $("#PresAr").val(DatoSP[1]);
        $("#tempe").val(DatoSP[2]);
        $("#po").val(DatoSP[3]);
        $("#fr").val(DatoSP[5]);
        $("#fc").val(DatoSP[6]);
        $("#gli").val(DatoSP[7]);

        if(DatoSP[4]==='si')
        {
            $("input[name=ConciP][value='si']").prop("checked",true);
        }
        else{
            $("input[name=ConciP][value='no']").prop("checked",true);
        }
    });
}
function bICl(){
    var NoPaciente = document.getElementById('NoPaciente').value;
    $.ajax({
        url:'../php/searchPaciente.php',
        type:'POST',
        data:'idPac='+NoPaciente+'&opc=SiCv3'
    }).done(function(resp){
        var valores = eval(resp);
        $("#ImpC1").val(valores[0][0]);
        $("#ImpC2").val(valores[1][0]);
        $("#ImpC3").val(valores[2][0]);
        $("#ImpC4").val(valores[3][0]);
    });
}
function bTipoCaso(){
    var NoPaciente = document.getElementById('NoPaciente').value;
    $.ajax({
        url:'../php/searchPaciente.php',
        type:'POST',
        data:'idPac='+NoPaciente+'&opc=StipoCaso'
    }).done(function(resp){
        var valores = eval(resp);
        for(i=0;i<valores.length;i++){
            datArr=valores[i][0]+"*"+valores[i][1]+"*"+valores[i][2]+"*"+valores[i][3]+"*"+valores[i][4]+"*"+valores[i][5];
        }
        var DatoSP=datArr.split("*");
        if(DatoSP[1]==='si')
        {
            $("input[name=CasoUrg][value='si']").prop("checked",true);
        }else {
            $("input[name=CasoUrg][value='no']").prop("checked",true);
        }
    });
}
function bMedResponsable(){
    var NoPaciente = document.getElementById('NoPaciente').value;
    $.ajax({
        url:'../php/searchPaciente.php',
        type:'POST',
        data:'idPac='+NoPaciente+'&opc=SMedicoRes'
    }).done(function(resp){
        var valores = eval(resp);
        for(i=0;i<valores.length;i++){
            datArr=valores[i][0]+"*"+valores[i][1]+"*"+valores[i][2]+"*"+valores[i][3];
        }
        var DatoSP2=datArr.split("*");
        $("#NomMedG").val(DatoSP2[1]);
        $("#NomInter").val(DatoSP2[2]);
    });
}
function bEgreso(){
    var NoPaciente = document.getElementById('NoPaciente').value;
    $.ajax({
        url:'../php/searchPaciente.php',
        type:'POST',
        data:'idPac='+NoPaciente+'&opc=SegresoV3'
    }).done(function(resp){
        var valoresEg = eval(resp);
        for(i=0;i<valoresEg.length;i++){
            datArrEG=valoresEg[i][0]+"*"+valoresEg[i][1]+"*"+valoresEg[i][2]+"*"+valoresEg[i][3]+"*"+valoresEg[i][4];
        }
        var DatoEg=datArrEG.split("*");
        var fechaEjemplo2 = moment(DatoEg[1], 'YYYY/MM/DDTH:mm:ss');
        fechaEjemplo2 = fechaEjemplo2.format('YYYY-MM-DDTH:mm:ss');
        $("#feEg").val(fechaEjemplo2);
        if(DatoEg[2]==='si')
        {
            $("input[name=QuedoHos][value='si']").prop("checked",true);
        }else {
            $("input[name=QuedoHos][value='no']").prop("checked",true);
        }
        $("#Servi").val(DatoEg[4]);
    });
}

function OrdenesEnf(){
    var NoPaciente = document.getElementById('NoPaciente').value;
    $.ajax({
        url:'../php/searchPaciente.php',
        type:'POST',
        data:'idPac='+NoPaciente+'&opc=SOrdenEnfV3'
    }).done(function(resp){
        var valoresNE = eval(resp);
        for(i=0;i<valoresNE.length;i++){
            datNE=valoresNE[i][0]+"*"+valoresNE[i][1]+"*"+valoresNE[i][2]+"*"+valoresNE[i][3]+"*"+valoresNE[i][4];
        }
        var DatoEnfNot=datNE.split("*");

        var fechaEjemplo3 = moment(DatoEnfNot[1], 'YYYY/MM/DDTH:mm:ss');
        fechaEjemplo3 = fechaEjemplo3.format('YYYY-MM-DDTH:mm:ss');
        $("#FechaNE1").val(fechaEjemplo3);

        // $("#FechaNE1").val(DatoEnfNot[1]);
        $("#numNE1").val(DatoEnfNot[2]);
        $("#OdenesNE1").val(DatoEnfNot[3]);
        $("#EvolucionNE1").val(DatoEnfNot[4]);

    });
}
function BnotaEnfermeria(){
    var NoPaciente = document.getElementById('NoPaciente').value;
    $.ajax({
        url:'../php/searchPaciente.php',
        type:'POST',
        data:'idPac='+NoPaciente+'&opc=SNotasE'
    }).done(function(resp){
        var valoresNtaE = eval(resp);
        /*  for(i=0;i<valoresNtaE.length;i++){
              datNtaE=valoresNtaE[i][0]+"*"+valoresNtaE[i][1]+"*"+valoresNtaE[i][2]+"*"+valoresNtaE[i][3]+"*"+valoresNtaE[i][4];
          }*/
        //var DatoNtaEnfer=datNtaE.split("*");

        $("#NombreEnf").val(valoresNtaE[0][1]);
        $("#Ntenfermeria").val(valoresNtaE[0][2]);
        //$("#NotaEnf").val(DatoNtaEnfer[2]);
        if(valoresNtaE[0][3]==='1')
        {
            $("input[name=Turn][value='1']").prop("checked",true);
            $('#Ntenfermeria').css({'color':'blue'});
            $('#NombreEnf').css({'color':'blue'});
        }
        else if(valoresNtaE[0][3]==='2')
        {
            $("input[name=Turn][value='2']").prop("checked",true);
            $('#Ntenfermeria').css({'color':'green'});
            $('#NombreEnf').css({'color':'green'});
        }else if(valoresNtaE[0][3]==='3')
        {
            $("input[name=Turn][value='3']").prop("checked",true);
            $('#Ntenfermeria').css({'color':'red'});
            $('#NombreEnf').css({'color':'red'});
        }

        $("#NombreEnf2").val(valoresNtaE[1][1]);
        $("#Ntenfermeria2").val(valoresNtaE[1][2]);
        //$("#NotaEnf").val(DatoNtaEnfer[2]);
        if(valoresNtaE[1][3]==='1')
        {
            $("input[name=Turn2][value='1']").prop("checked",true);
            $('#Ntenfermeria2').css({'color':'blue'});
            $('#NombreEnf2').css({'color':'blue'});
        }
        else if(valoresNtaE[1][3]==='2')
        {
            $("input[name=Turn2][value='2']").prop("checked",true);
            $('#Ntenfermeria2').css({'color':'green'});
            $('#NombreEnf2').css({'color':'green'});
        }else if(valoresNtaE[1][3]==='3')
        {
            $("input[name=Turn2][value='3']").prop("checked",true);
            $('#Ntenfermeria2').css({'color':'red'});
            $('#NombreEnf2').css({'color':'red'});
        }
        $("#NombreEnf3").val(valoresNtaE[2][1]);
        $("#Ntenfermeria3").val(valoresNtaE[2][2]);
        //$("#NotaEnf").val(DatoNtaEnfer[2]);
        if(valoresNtaE[2][3]==='1')
        {
            $("input[name=Turn3][value='1']").prop("checked",true);
            $('#Ntenfermeria3').css({'color':'blue'});
            $('#NombreEnf3').css({'color':'blue'});
        }
        else if(valoresNtaE[2][3]==='2')
        {
            $("input[name=Turn3][value='2']").prop("checked",true);
            $('#Ntenfermeria3').css({'color':'green'});
            $('#NombreEnf3').css({'color':'green'});
        }else if(valoresNtaE[2][3]==='3')
        {
            $("input[name=Turn3][value='3']").prop("checked",true);
            $('#Ntenfermeria3').css({'color':'red'});
            $('#NombreEnf3').css({'color':'red'});
        }


    });
}

function cerarBP() {
    BuscarPac.value="";
    //lista.setvi.style.display='none';
    document.getElementById('lista').style.display='none';

}
function colorEdit() {
    // var colorEtiqueta = dato;
    var colorEtiqueta = "1px solid DimGray";
    $('#PrApe').css("border", colorEtiqueta);
    $('#SeApe').css("border", colorEtiqueta);
    $('#DeCas').css("border", colorEtiqueta);
    $('#PrNom').css("border", colorEtiqueta);
    $('#SeNom').css("border", colorEtiqueta);
    $('#ExpMedico').css("border", colorEtiqueta);
    $('#Sex').css("border", colorEtiqueta);
    $('#Eda').css("border", colorEtiqueta);
    $('#EstCiv').css("border", colorEtiqueta);
    $('#OcuP').css("border", colorEtiqueta);
    $('#PagIg').css("border", colorEtiqueta);
    $('#ProcedeDire').css("border", colorEtiqueta);
    $('#Tel').css("border", colorEtiqueta);
    $('#DvLlegoEn').css("border", colorEtiqueta);
    $('#contactPaciente').css("border", colorEtiqueta);
    $('#MIngres').css("border", colorEtiqueta);
    $('#FeHoIngreso').css("border", colorEtiqueta);
    $('#AntRCU').css("border", colorEtiqueta);
    $('#PresAr').css("border", colorEtiqueta);
    $('#tempe').css("border", colorEtiqueta);
    $('#po').css("border", colorEtiqueta);
    $('#DvConciente').css("border", colorEtiqueta);
    $('#talla').css("border", colorEtiqueta);
    $('#peso').css("border", colorEtiqueta);
    $('#NotExF').css("border", colorEtiqueta);
    $('#ImpC1').css("border", colorEtiqueta);
    $('#ImpC2').css("border", colorEtiqueta);
    $('#ImpC3').css("border", colorEtiqueta);
    $('#ImpC4').css("border", colorEtiqueta);
    $('#NCasoUrg').css("border", colorEtiqueta);
    $('#DvCasoUrg').css("border", colorEtiqueta);
    $('#NomMedG').css("border", colorEtiqueta);
    $('#NomInter').css("border", colorEtiqueta);
    $('#feEg').css("border", colorEtiqueta);
    $('#DvHospitalizado').css("border", colorEtiqueta);
    $('#Servi').css("border", colorEtiqueta);
    $('#FechaNE').css("border", colorEtiqueta);
    $('#numNE').css("border", colorEtiqueta);
    $('#OdenesNE').css("border", colorEtiqueta);
    $('#EvolucionNE').css("border", colorEtiqueta);


}
function ColorModif() {
    // var colorEtiqueta = dato;
    var idPac = document.getElementById('NoPaciente').value;
    if(idPac ===""){
        alert('no se puede modificar, eliga un paciente.!');
        $("#UserMod").val("");
        $("#PassMod").val("");
        $('#MsjOk').html('');
        $('#MsjErr').html('');
        $("#UsuarioMod .close").click();
    }
    else{
        var colorEtiqueta = "1px solid orange";
        $('#PrApe').css("border", colorEtiqueta);
        $('#SeApe').css("border", colorEtiqueta);
        $('#DeCas').css("border", colorEtiqueta);
        $('#PrNom').css("border", colorEtiqueta);
        $('#SeNom').css("border", colorEtiqueta);
        $('#ExpMedico').css("border", colorEtiqueta);
        $('#Sex').css("border", colorEtiqueta);
        $('#Eda').css("border", colorEtiqueta);
        $('#EstCiv').css("border", colorEtiqueta);
        $('#OcuP').css("border", colorEtiqueta);
        $('#PagIg').css("border", colorEtiqueta);
        $('#ProcedeDire').css("border", colorEtiqueta);
        $('#Tel').css("border", colorEtiqueta);
        $('#DvLlegoEn').css("border", colorEtiqueta);
        $('#contactPaciente').css("border", colorEtiqueta);
        $('#MIngres').css("border", colorEtiqueta);
        $('#FeHoIngreso').css("border", colorEtiqueta);
        $('#AntRCU').css("border", colorEtiqueta);
        $('#PresAr').css("border", colorEtiqueta);
        $('#tempe').css("border", colorEtiqueta);
        $('#po').css("border", colorEtiqueta);
        $('#DvConciente').css("border", colorEtiqueta);
        $('#talla').css("border", colorEtiqueta);
        $('#peso').css("border", colorEtiqueta);
        $('#NotExF').css("border", colorEtiqueta);
        $('#ImpC1').css("border", colorEtiqueta);
        $('#ImpC2').css("border", colorEtiqueta);
        $('#ImpC3').css("border", colorEtiqueta);
        $('#ImpC4').css("border", colorEtiqueta);
        $('#NCasoUrg').css("border", colorEtiqueta);
        $('#DvCasoUrg').css("border", colorEtiqueta);
        $('#NomMedG').css("border", colorEtiqueta);
        $('#NomInter').css("border", colorEtiqueta);
        $('#feEg').css("border", colorEtiqueta);
        $('#DvHospitalizado').css("border", colorEtiqueta);
        $('#Servi').css("border", colorEtiqueta);
        $('#FechaNE').css("border", colorEtiqueta);
        $('#numNE').css("border", colorEtiqueta);
        $('#OdenesNE').css("border", colorEtiqueta);
        $('#EvolucionNE').css("border", colorEtiqueta);
    }


}
function DesabilitarAll() {
    $('#PrApe').attr('disabled','disabled');
    $('#SeApe').attr('disabled','disabled');
    $('#DeCas').attr('disabled','disabled');
    $('#PrNom').attr('disabled','disabled');
    $('#SeNom').attr('disabled','disabled');
    $('#ExpMedico').attr('disabled','disabled');
    $('#Sex').attr('disabled','disabled');
    $('#Eda').attr('disabled','disabled');
    $('#EstCiv').attr('disabled','disabled');
    $('#OcuP').attr('disabled','disabled');
    $('#PagIg').attr('disabled','disabled');
    $('#ProcedeDire').attr('disabled','disabled');
    $('#Tel').attr('disabled','disabled');
    $('#DvLlegoEn').attr('disabled','disabled');
    $('#contactPaciente').attr('disabled','disabled');
    $('#MIngres').attr('disabled','disabled');
    $('#FeHoIngreso').attr('disabled','disabled');
    $('#AntRCU').attr('disabled','disabled');
    $('#PresAr').attr('disabled','disabled');
    $('#tempe').attr('disabled','disabled');
    $('#po').attr('disabled','disabled');
    $('#fr').attr('disabled','disabled');
    $('#fc').attr('disabled','disabled');
    $('#gli').attr('disabled','disabled');
    $('#DvConciente').attr('disabled','disabled');
    $('#talla').attr('disabled','disabled');
    $('#peso').attr('disabled','disabled');
    $('#NotExF').attr('disabled','disabled');
    $('#ImpC1').attr('disabled','disabled');
    $('#ImpC2').attr('disabled','disabled');
    $('#ImpC3').attr('disabled','disabled');
    $('#ImpC4').attr('disabled','disabled');
    $('#NCasoUrg').attr('disabled','disabled');
    $('#DvCasoUrg').attr('disabled','disabled');
    $('#NomMedG').attr('disabled','disabled');
    $('#NomInter').attr('disabled','disabled');
    $('#feEg').attr('disabled','disabled');
    $('#DvHospitalizado').attr('disabled','disabled');
    $('#Servi').attr('disabled','disabled');
    $('#FechaNE').attr('disabled','disabled');
    $('#numNE').attr('disabled','disabled');
    $('#OdenesNE').attr('disabled','disabled');
    $('#EvolucionNE').attr('disabled','disabled');
    $('#NombreEnf').attr('disabled','disabled');
    $('#Ntenfermeria').attr('disabled','disabled');
    $('#NombreEnf2').attr('disabled','disabled');
    $('#Ntenfermeria2').attr('disabled','disabled');
    $('#NombreEnf3').attr('disabled','disabled');
    $('#Ntenfermeria3').attr('disabled','disabled');
    $('#FechaNE1').attr('disabled','disabled');
    $('#numNE1').attr('disabled','disabled');
    $('#OdenesNE1').attr('disabled','disabled');
    $('#EvolucionNE1').attr('disabled','disabled');

}
function EnviaPaServicio()
{
//valores de los inputs
    var NoPaciente = document.getElementById('NoPaciente').value;
    //windows.open("../inicio/infBascP.php?usuario='"+NoPaciente+"'");
    window.location.href = "../inicio/infBasicPV3.php?usR="+NoPaciente+"";
}

function abrirReportePrueba() {
    var win = window.open('../php/Reporte4.php?+NoPaciente='+NoPaciente.value, '_blank');
    win.focus();
}

function AbrirModal() {
    $("#UsuarioMod").modal("show");
}
function AbrirModalEnf() {
    $("#LogEnfermeros").modal("show");
}

function LogueoModifi() {
    var Usr = document.getElementById('UserMod').value;
    var Pas = document.getElementById('PassMod').value;
    if(Usr == "" || Pas==""){
        alert('error, ingrese usuario y contraseña');
    }
    else{
        $.ajax({
            type: "POST",
            url: "../php/LogueoModif.php",
            data: ('Usuario='+Usr+'&Contrasenia='+Pas),
            success: function(data){
                if (data == '1') {
                    $('#MsjOk').html('Bienvenido, puede modificar la informacion');
                    HabilitarAll();
                    ColorModif();
                }
                else{
                    $('#MsjErr').html('Error al loguearse, verifique su usuario y contraseña');
                }
            },
        });
    }
}
function LogueoEnfNota() {
    var Usr = document.getElementById('UserModEnf').value;
    var Pas = document.getElementById('PassModEnf').value;
    if(Usr == "" || Pas==""){
        alert('error, ingrese usuario y contraseña');
    }
    else{
        $.ajax({
            type: "POST",
            url: "../php/LogueEnfNota.php",
            data: ('Usuario='+Usr+'&Contrasenia='+Pas),
            success: function(data){
                if (data == '1') {
                    //$('#MsjOkEnf').html('Bienvenido, puede agregar una nota de enfermeria');
                    ApareceNtaEnf();
                    DesapareceSPN('MostrarNtaEnf');
                    ApareceSPN('OcultarNtaEnf');
                    $("#LogEnfermeros .close").click();
                }
                else{
                    $('#MsjErrEnf').html('Error al loguearse, verifique su usuario y contraseña');
                }
            },
        });
        $('#MsjErrEnf').html("");
        $("#UserModEnf").val("");
        $("#PassModEnf").val("");
    }
}

function Loguin() {
    var Usr = document.getElementById('usuario').value;
    var Pas = document.getElementById('contrasenia').value;
    if(Usr == "" || Pas==""){
        alert('error, ingrese usuario y contraseña');
    }
    else{
        $.ajax({
            type: "POST",
            url: "../php/LogAdmUsr.php",
            data: ('Usuario='+Usr+'&Contrasenia='+Pas),
            success: function(data){
                var RsespLg = eval(data);
                if (RsespLg == '3' ) {
                    alert("no existen sus datos");
                }

                if ( RsespLg[0][3] == '2') {
                    window.location.href = "../inicio/dashboard.php";
                }
                if(RsespLg[0][3] == '1'){
                    window.location.href = "../inicio/DashboardAdmin.php";
                }
            },
        });
    }
}
function HabilitarAll() {

    $('#ActulizaIPac').css('display', 'block');



    $("#UsuarioMod .close").click();
    $('#PrApe').removeAttr('disabled');
    $('#SeApe').removeAttr('disabled');
    $('#DeCas').removeAttr('disabled');
    $('#PrNom').removeAttr('disabled');
    $('#SeNom').removeAttr('disabled');
    $('#ExpMedico').removeAttr('disabled');
    $('#Sex').removeAttr('disabled');
    $('#Eda').removeAttr('disabled');
    $('#EstCiv').removeAttr('disabled');
    $('#OcuP').removeAttr('disabled');
    $('#PagIg').removeAttr('disabled');
    $('#ProcedeDire').removeAttr('disabled');
    $('#Tel').removeAttr('disabled');
    $('#DvLlegoEn').removeAttr('disabled');
    $('#contactPaciente').removeAttr('disabled');
    $('#MIngres').removeAttr('disabled');
    $('#FeHoIngreso').removeAttr('disabled');
    $('#AntRCU').removeAttr('disabled');
    $('#PresAr').removeAttr('disabled');
    $('#tempe').removeAttr('disabled');
    $('#po').removeAttr('disabled');
    $('#fr').removeAttr('disabled');
    $('#fc').removeAttr('disabled');
    $('#gli').removeAttr('disabled');
    $('#DvConciente').removeAttr('disabled');
    $('#talla').removeAttr('disabled');
    $('#peso').removeAttr('disabled');
    $('#NotExF').removeAttr('disabled');
    $('#ImpC1').removeAttr('disabled');
    $('#ImpC2').removeAttr('disabled');
    $('#ImpC3').removeAttr('disabled');
    $('#ImpC4').removeAttr('disabled');
    $('#NCasoUrg').removeAttr('disabled');
    $('#DvCasoUrg').removeAttr('disabled');
    $('#NomMedG').removeAttr('disabled');
    $('#NomInter').removeAttr('disabled');
    $('#feEg').removeAttr('disabled');
    $('#DvHospitalizado').removeAttr('disabled');
    $('#Servi').removeAttr('disabled');
    $('#FechaNE').removeAttr('disabled');
    $('#numNE').removeAttr('disabled');
    $('#OdenesNE').removeAttr('disabled');
    $('#EvolucionNE').removeAttr('disabled');
    $('#NombreEnf').removeAttr('disabled');
    $('#Ntenfermeria').removeAttr('disabled');
    $('#NombreEnf2').removeAttr('disabled');
    $('#Ntenfermeria2').removeAttr('disabled');
    $('#NombreEnf3').removeAttr('disabled');
    $('#Ntenfermeria3').removeAttr('disabled');
    $('#FechaNE1').removeAttr('disabled');
    $('#numNE1').removeAttr('disabled');
    $('#OdenesNE1').removeAttr('disabled');
    $('#EvolucionNE1').removeAttr('disabled');
    HabilitarBtnModOrden();
}
function HabilitarBtnModOrden() {

    var FechaOpa = document.getElementById('FechaNE1').value;
    var OrdenesPa = document.getElementById('numNE1').value;
    var EvolucionPa = document.getElementById('OdenesNE1').value;
    var NtaFinalPa = document.getElementById('EvolucionNE1').value;
    if (FechaOpa == "" && OrdenesPa == "" && EvolucionPa == "" && NtaFinalPa == "") {
        $('#msjOrden').html('registre una orden, para despues modificar');
    }
    else{
        $('#btnNE').css('display', 'none');
        $('#ActualizarOrd').css('display', 'block');
    }
}
function ModificarOren() {
    var idPac = document.getElementById('NoPaciente').value;
    var Fechapaciente = document.getElementById('FechaNE1').value;
    var OrdenesPaciente = document.getElementById('numNE1').value;
    var EvolucionPaciente = document.getElementById('OdenesNE1').value;
    var NtaFinalPaciente = document.getElementById('EvolucionNE1').value;


    $.ajax({
        type:'POST',
        url:'../php/ModiOrdenes.php',
        data:('IdPac='+idPac+'&FechaOrd='+Fechapaciente+'&OrdenP='+OrdenesPaciente+'&EvoP='+EvolucionPaciente+'&NotaFinal='+NtaFinalPaciente),
        success:function(respuesta){
            if (respuesta != ""){
                //alert("ok Contacto de paciente")
                $('#msjOrden').html('Se modificaron las ordenes');

            }
            else{
                $('#msjOrden').html('error');
            }
        }
    })
}
function InsPersonaInfo(){
    var NombreUsr = document.getElementById('PNombreU').value;
    var NombreUsrSeg = document.getElementById('SnombreU').value;
    var ApellidosUsr = document.getElementById('ApellidosU').value;
    var EdadUsr = document.getElementById('EdadU').value;
    var CorreoUsr = document.getElementById('EmailU').value;
    var TelefonoUsr = document.getElementById('CelularU').value;
    var CargoUsr = document.getElementById('CargoUsuarioU').value;
    $.ajax({
        type:'POST',
        url:'../php/RegUsr.php',
        data:('Nombre='+NombreUsr+'&Snombre='+NombreUsrSeg+'&Apellidos='+ApellidosUsr+'&Edad='+EdadUsr+'&Correo='+CorreoUsr+'&Telefono='+TelefonoUsr+'&Cargo='+CargoUsr+'&opc=InsNwUser'),
        success:function(respuesta){
            if (respuesta != ""){
                //alert("ok Contacto de paciente")
                document.getElementById('NoNewUsr').value=respuesta;
                alert("Informacion registrada correctamente");
                // CODIGO PARA BLOQUEAR EL BOTON DE GUARDAR EL PACIENTE,
                // $('#EnviainfbP').attr("disabled", true);
            }
            else{
                // swal("Error..!","","error");
            }
        }
    })
}
function InsUsrPass(){
    var idUsr = document.getElementById('NoNewUsr').value;
    var TipoUsr = document.getElementById('TipoUsuario').value;
    var LoginU = document.getElementById('Usuario').value;
    var PassU = document.getElementById('PassUsuario').value;

    $.ajax({
        type:'POST',
        url:'../php/RegUsr.php',
        data:('Tusr='+TipoUsr+'&LogU='+LoginU+'&PasU='+PassU+'&IdUsr='+idUsr+'&opc=UsrLog'),
        success:function(respuesta){
            if (respuesta != ""){
                //alert("ok Contacto de paciente")

                alert("Login crado correctamente..!");
                // CODIGO PARA BLOQUEAR EL BOTON DE GUARDAR EL PACIENTE,
                // $('#EnviainfbP').attr("disabled", true);
            }
            else{
                // swal("Error..!","","error");
            }
        }
    })
}
function ApareceNtaEnf(){
    document.getElementById('divEnfermeriaNtas').style.display='block';
}
function DesapareceNtaEnf(){
    document.getElementById('divEnfermeriaNtas').style.display='none';
}
function DesapareceSPN(NombreSPNoc){
    document.getElementById(NombreSPNoc).style.display='none';
}

function ApareceSPN(NombreSPNap){
    document.getElementById(NombreSPNap).style.display='block';
}