  $(document).ready(function(){
  $("#enviar").click(function(){
    $("#enviarModINfo").show();
  });
 $("#enviarTriage").click(function(){
    $("#ModificaTriage").show();
  });
$("#EnviaEvaluacion").click(function(){
    $("#ModificaEnvEva").show();
  });
$("#EnviaRevSist").click(function(){
    $("#ModificaEnvaiRevS").show();
  });
$("#EnviaExFisico").click(function(){
    $("#EditaExFisico").show();
  });
$("#EnviaEvaYplan").click(function(){
    $("#EditaEvaPlan").show();
  });
$("#EnviaDispo").click(function(){
    $("#EditaEnviaDispo").show();
  });

$("#EdicionesACT").click(function(){
    $("#enviarModINfo").show();
  });
$("#EnviaMedicamentos").click(function(){
    $("#EditaMedicamentos").show();
  });
var OPraValidate =  document.getElementById('OpePracticade').value;
   if(OPraValidate!=""){
$("#EnviaRecOperatorio").click(function(){
    $("#EditaRecOperatorio").show();
  });
   }



$("#Abrmodal").click(function(){
    $("#mostrarmodal").modal("show");
  });

$("#ModalRegOpePracticada").click(function(){
    $("#mostrarmodalOpePrac").modal("show");
  });

$("#EnviaCirujano").click(function(){
    $("#SOptionCiru").load("#SOptionCiru");
  });

    //Autocompletar Ope Practicada
    $('#OpePracticade').keypress(function(){
        var service = $(this).val();
        $.ajax({
            type: "POST",
            url: "../php/autocomptr.php",
            data: ('service='+service+'&opc=buscarOpeP'),
            success: function(data) {
                //Escribimos las sugerencias que nos manda la consulta
                $('#suggestions').fadeIn(1000).html(data);
                //Al hacer click en algua de las sugerencias
                $('.suggest-element').on('click',"a",function(){
                    //Obtenemos la id unica de la sugerencia pulsada
                    var id = $(this).attr('id');
                    //Editamos el valor del input con data de la sugerencia pulsada
                    $('#OpePracticade').val($('#'+id).attr('data'));
                    //Hacemos desaparecer el resto de sugerencias
                    $('#suggestions').fadeOut(1000);
                });           
            }
        });
    });


  });

function cargarSelect(div, desde)
{
     $(div).load(desde);
}

function tooltip(ide){
 document.getElementById(ide).style.display = block;
}
function DesapareceForm(NombreFrm){

  document.getElementById(NombreFrm).style.display='none';
  //document.getElementById('OcultarInfB').style.display='none';
}

function ApareceForm(NombreFrm){

  document.getElementById(NombreFrm).style.display='block';
  //document.getElementById('OcultarInfB').style.display='none';
}

function DesapareceSPN(NombreSPNoc){

  document.getElementById(NombreSPNoc).style.display='none';
  //document.getElementById('OcultarInfB').style.display='none';
}

function ApareceSPN(NombreSPNap){

  document.getElementById(NombreSPNap).style.display='block';
  //document.getElementById('OcultarInfB').style.display='none';
}

function ocultarVentana()
{
    var ventana = document.getElementById('miVentana');
    ventana.style.display = 'none';
}

        function Tel(e)
        {
        var keynum = window.event ? window.event.keyCode : e.which;
        if ((keynum == 8) || (keynum == 46))
        return true;
         
        return /\d/.test(String.fromCharCode(keynum));
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
        function obtiene_hora() { 
        var h = new Date() 
        var hora = h.getHours() 
        var minutos = h.getMinutes()
        var segundos = h.getSeconds()
         return (hora + ":" + minutos + ":" + segundos) 
        }
        function show_hide() {
        if(document.getElementById('ambulancia').checked) {
        document.getElementById('select_ambulancia').style.display = "block";
        }else{
        document.getElementById('select_ambulancia').style.hi = "none";
        }
        }
       function ed(Fecha){
        fecha = new Date(Fecha)
        hoy = new Date()
        mes = hoy.getMonth()+1;
        an = parseInt((hoy -fecha)/365/24/60/60/1000);
        meses= parseInt((hoy -fecha)/(1000 * 60 * 60 * 24 * 30.4375));
        dias= parseInt((hoy -fecha)/(1000 * 60 * 60 * 24));
        document.getElementById('anios').value =an
        document.getElementById('meses').value =meses
        document.getElementById('dias').value =dias
        }
        function Cod(frm) {
        frm.codigo.value = frm.PNombre.value.substr(0,2) + frm.PrApellido.value.substr(0,1) + frm.fecha.value.substr(0,10);
        }