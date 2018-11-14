<?php
	require_once("sesion.class.php");
	
	$sesion = new sesion();
	$usuario = $sesion->get("usuario");
	
	if( $usuario == false )
	{	
		header("Location: login.php");		
	}
	else 
	{
	?>
	<HTML>

		<head>
			<title>
		
			</title>
			<meta charset="utf-8" />
			<link type="text/css" href="css/bootstrap.min.css" rel="stylesheet"/>
			<link type="text/css" href="sprite.css" rel="stylesheet" />
			<script src="js/jquery-1.12.3.min.js"></script>
			<script type="text/javascript">
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
         return (dia + "/" + mes + "/" + anio) 
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
        frm.CPaciente.value = frm.PNombre.value.substr(0,2) + frm.PrApellido.value.substr(0,1) + frm.FNac.value.substr(0,10); 
}
        </script>  

        <style type="text/css">
           div.scroll_vertical {    
           height: 70%;
           width: 100%;
           overflow: auto;
           background-color: #f5f5f5;
           padding: 8px;
           border-radius: 20px 20px 20px 20px;
           -moz-border-radius: 20px 20px 20px 20px;
           -webkit-border-radius: 20px 20px 20px 20px;                           }
  </style>
		</head>
			<body>
			    <div class="row">
               <div class="col-sm-5">
  	             <div class="panel panel-primary">
                   <div class="panel-heading">
                     <span class="glyphicon glyphicon-log-in" role="button"> Bienvenido, <?php echo $sesion->get("usuario"); ?>  
                   </div>
                <a href="cerrarsesion.php"> &nbsp &nbsp <span class="glyphicon glyphicon-remove"> Cerrar Sesion </a>
                   <div class="panel-body">
                      <h1 align ="center">Bienvenido:  <?php echo $sesion->get("usuario"); ?> </h1>
                   </div>
              </div>
              </div>
              <div class="col-sm-6"> 	                
         <div class="panel panel-primary">
             <div class="panel-heading">
               <span class="glyphicon glyphicon-info-sign"> Datos principales del paciente  
             </div>
          <div class="panel-body"><h1 align ="center">datos paciente: </h1></div>
       </div>
              </div>
            </div>
				        <div class="row">
                  <div class="col-sm-2">
                   <button type="button" class="btn btn-primary btn-block" onClick="window.location.href='infBasicP.php'"><span class="glyphicon  glyphicon-user"</span> info. basica de paciente</button>
                   <button type="button" class="btn btn-primary btn-block" disabled><span class="glyphicon  glyphicon-sort-by-alphabet"></span> ciclo primario del paciente</button>
                   <button type="button" class="btn btn-primary btn-block"><span class="glyphicon  glyphicon-question-sign"> Consultas de pacientes </button>
                   <button type="button" class="btn btn-primary btn-block"><span class="glyphicon  glyphicon-print"> Reportes imprimibles </button>
                   <button type="button" class="btn btn-primary btn-block"><span class="glyphicon  glyphicon-star">otro menu</button>
                   <button type="button" class="btn btn-primary btn-block"><span class="glyphicon  glyphicon-star">otro menu</button>
                   <button type="button" class="btn btn-primary btn-block"><span class="glyphicon  glyphicon-star">otro menu</button>
                   <button type="button" class="btn btn-primary btn-block"><span class="glyphicon  glyphicon-star">otro menu</button>
                </div>
  <div class="col-sm-9">
<ul class="breadcrumb">
  <li><a href="#"><span class="glyphicon glyphicon-saved"></span> Evaluación</a></li>
  <li><a href="#"><span class="glyphicon glyphicon-th-list"> Inf-Lesión</a></li>
  <li><a href="#"><span class="glyphicon glyphicon-list-alt"> Control</a></li>
  <li><a href="#"><span class="glyphicon glyphicon-indent-left"> Rayos-X</a></li>
  <li><a href="#"><span class="glyphicon glyphicon-filter"> Laboratorio</a></li> 
  <li><a href="#"><span class="glyphicon glyphicon-list-alt"> DiagnositcosProcesos</a></li>
  <li><a href="#"><span class="glyphicon glyphicon-th"> Notas</a></li>
</ul>   
    <div class="col-sm-9" > 
    <div class="scroll_vertical">   
			
       </div>
       </div>
</div>
</div>
			</body>
	</HTML>
	
<?php 
	}	
?>