<HTML>
        <head>
            <title>     
            </title>
            <meta charset="utf-8" />
            <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet"/>
            <link type="text/css" href="sprite.css" rel="stylesheet" />
            <script src="js/jquery-1.12.3.min.js"></script>
    <style type="text/css">
   </style>
            </head>

            <body>
 <div id="DivDisposicion" name="DivDisposicion" >
 <h4><b>Disposición</b></h4>
   
        <form name="formularioDisposicion" id="formularioDisposicion" > 
        <div> 
            <label class="text-primary">Descargado</label>
            <input type="radio" name="Dispo" value="1" id="Dispo" tabindex="23"/>&nbsp&nbsp &nbsp &nbsp &nbsp &nbsp
            <label class="text-primary"> Aceptado </label>
            <input type="radio" name="Dispo" value="2" id="Dispo" tabindex="24"/>&nbsp&nbsp &nbsp &nbsp &nbsp &nbsp
            <label class="text-primary">Transferido </label>
            <input type="radio" name="Dispo" value="3" id="Dispo" tabindex="25"/>&nbsp&nbsp &nbsp &nbsp &nbsp &nbsp   
            <label class="text-primary">Murió </label>
            <input type="radio" name="Dispo" value="4" id="Dispo" tabindex="26"/>&nbsp&nbsp &nbsp &nbsp &nbsp &nbsp    
            <label class="text-primary">Infiltrados en conta del consejo </label> 
            <input type="radio" name="Dispo" value="4" id="Dispo" tabindex="26"/>  </br>

              <label class="text-primary"><b>Otra información de disposición</b> </label> </br> 

              <textarea name="OtraInfoDisp"  id="OtraInfoDisp" class="form-control" rows="3"></textarea> </br> 
              <h4><b>Testimonios</b></h4>
              <label class="text-primary"><b>Notas del medico a cargo</b> </label> </br> 
              <textarea name="NotasMedicoCargo"  id="NotasMedicoCargo" class="form-control" rows="3"></textarea> </br> 
              <label class="text-primary"><b>Otras notas</b> </label> </br> 
              <textarea name="OtrasNotas"  id="OtrasNotas" class="form-control" rows="3"></textarea> </br>
              <div class="row"> <!--div de fila-->
                       <div class="col-sm-6">  <!--div de columna-->  
                        <h4><b>Residente</b></h4>    
                          <label class="text-primary" id="HistoMedica">Vi al paciente</label>&nbsp &nbsp &nbsp &nbsp &nbsp
                          <input type="checkbox" name="ViPacienteRS" value="Si" id="ViPacienteRS" tabindex="25"/></br></br>
                          <label class="text-primary" id="HistoMedica">Tiempo del contacto</label>
                          <input type="text" id="TiempoContatoRS" name="TiempoContatoRS" size="60%" placeholder="ingrese tiempo"></br></br>
                          <label class="text-primary" id="HistoMedica">Firma</label>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
                          <input type="text" id="FirmaRS" name="FirmaRS" size="60%" placeholder="ingrese firma Residente"></br></br> 
                       </div>                                           
                          <div class="col-sm-6">                    
                             <h4><b>Medico a cargo</b></h4>    
                          <label class="text-primary">Vi al paciente</label>&nbsp &nbsp &nbsp &nbsp &nbsp
                          <input type="checkbox" name="ViPacienteMD" value="Si" id="ViPacienteMD" tabindex="25"/></br></br>
                          <label class="text-primary">Tiempo del contacto</label>
                          <input type="text" id="TiempoContatoMD" name="TiempoContatoMD" size="60%" placeholder="Ingrese tiempo"></br></br>
                          <label class="text-primary">Firma</label>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
                          <input type="text" id="FirmaMD" name="FirmaMD" size="60%" placeholder="Ingrese firma medico"></br></br>                 
                          </div>
                </div>
              
        </div>           
                <center>
                 <b><div id="mensajeEvaluacionPlan" class="text-success"></div></b>
               </center> 
                <center>
                <button type="button" tabindex="37"  onclick="javascript:EvaluacionPlan();" class="btn btn-primary btn-lg">Registrar Disposición</button> 
               </center>              
        </form>  
 </div>    
 </body>    
 </HTML>    