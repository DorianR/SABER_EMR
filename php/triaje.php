 
 <HTML>
        <head>
            <title>     
            </title>
            <meta charset="utf-8" />
            <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet"/>
            <link type="text/css" href="sprite.css" rel="stylesheet" />
            <script src="js/jquery-1.12.3.min.js"></script>
    <style type="text/css">
  div.scroll_vertical {
  height: 70%;
  width: 100%;
  overflow: auto;
  background-color: #f5f5f5;
  padding: 8px;
  border-radius: 20px 20px 20px 20px;
    -moz-border-radius: 20px 20px 20px 20px;
    -webkit-border-radius: 20px 20px 20px 20px;
   /* border: 5px hidden #000000;*/
  }
    .positivo {
    padding-left: 8%;
         }
         .negativo {
    padding-left: 2%;
         }
         .radioP {
    padding-left: 4%;
         }
         .radioN {
    padding-left: 1%;
         }
  </style>
            </head>

            <body>
 <div id="ExFisico" name="ExFisico" >
 <h4><b>Examen Fisico</b></h4>
  <form name="formularioEva" id="formularioEva" >                       
 <label class="text-primary">Signos vitales llegando revisaron</label>
 <input type="checkbox" name="generalP" value="Si" id="generalP" tabindex="1" />&nbsp&nbsp&nbsp&nbsp&nbsp
                <label class="text-primary">Pulso</label>
                <input type="text" id="PulsoA" name="PulsoA" size="6%" tabindex="13">
                <label class="text-primary">FR</label>
                <input type="text" id="frA" name="frA"size="6%" >
                <label for="ms" class="text-primary">Presion arterial</label>
                <input type="text" id="ParterialA" name="ParterialA" size="2%" placeholder=" --/--" >                            
                <label for="Oc" class="text-primary">Temperatura:</label>
                <input type="text" name="temperaturaA" id="temperaturaA" size="10%" tabindex="14"> 
                <button type="button" value="registrarSALL" onclick="javascript:SignosVAntesLLegada();" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-ok"></span></button>                
                <button type="button" tabindex="" align="center" onclick="javascript:ocultarSA1();" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-plus"></span></button> <span id="mensajeVitales"></span> </br> 

<label class="positivo"><b><h3>+&nbsp&nbsp&nbsp-</h3></b> </label>&nbsp&nbsp&nbsp&nbsp&nbsp</b> </label><label><b>   Descripcion de los positivos</b> </label></br>
<label class="text-primary"><b>General</b> </label>
<span class="radioP"></span><input type="radio" name="generalP" value="Si" id="generalP" tabindex="1" />
<span class="radioN"></span><input type="radio" name="generalP" value="No" id="generalP" tabindex="2"/>
<input type="text" id="DescGeneral" name="DescGeneral" size="100%" placeholder="Ingrese descripción general examen fisico"></br></br>

<label class="text-primary" ><b>Ojos&nbsp&nbsp&nbsp&nbsp&nbsp</b> </label>
<span class="radioP"></span><input type="radio" name="Ojos" value="Si" id="Ojos" tabindex="1" />
<span class="radioN"></span><input type="radio" name="Ojos" value="No" id="Ojos" tabindex="2"/>
<input type="text" id="DescOjos" name="DescOjos" size="100%" placeholder="Ingrese descripción ojos examen fisico"></br></br>

<label class="text-primary" ><b>ORL&nbsp&nbsp&nbsp&nbsp&nbsp</b> </label>
<span class="radioP"></span><input type="radio" name="ORL" value="Si" id="ORL" tabindex="1" />
<span class="radioN"></span><input type="radio" name="ORL" value="No" id="ORL" tabindex="2"/>
<input type="text" id="DescORL" name="DescORL" size="100%" placeholder="Ingrese descripción ORL examen fisico"></br></br>

<label class="text-primary" ><b>CV&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b> </label> 
<span class="radioP"></span><input type="radio" name="CV" value="Si" id="CV" tabindex="1" />
<span class="radioN"></span><input type="radio" name="CV" value="No" id="CV" tabindex="2"/>
<input type="text" id="DescCV" name="DescCV" size="100%" placeholder="Ingrese descripción CV examen fisico"></br></br>

<label class="text-primary"><b>Resp&nbsp&nbsp&nbsp&nbsp</b> </label>
<span class="radioP"></span><input type="radio" name="RESP" value="Si" id="RESP" tabindex="1" />
<span class="radioN"></span><input type="radio" name="RESP" value="No" id="RESP" tabindex="2"/>
<input type="text" id="DescRESP" name="DescRESP" size="100%" placeholder="Ingrese descripción RESP examen fisico"></br></br>

<label class="text-primary" ><b>GI&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b> </label>
<span class="radioP"></span><input type="radio" name="GI" value="Si" id="GI" tabindex="1" />
<span class="radioN"></span><input type="radio" name="GI" value="No" id="GI" tabindex="2"/>
<input type="text" id="DescGI" name="DescGI" size="100%" placeholder="Ingrese descripción GI examen fisico"></br></br>

<label class="text-primary" ><b>GU&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b> </label>
<span class="radioP"></span><input type="radio" name="GU" value="Si" id="GU" tabindex="1" />
<span class="radioN"></span><input type="radio" name="GU" value="No" id="GU" tabindex="2"/>
<input type="text" id="DescGU" name="DescGU" size="100%" placeholder="Ingrese descripción GU examen fisico"></br></br>

<label class="text-primary" ><b>MSQ&nbsp&nbsp&nbsp&nbsp&nbsp</b> </label>
<span class="radioP"></span><input type="radio" name="MSQ" value="Si" id="MSQ" tabindex="1" />
<span class="radioN"></span><input type="radio" name="MSQ" value="No" id="MSQ" tabindex="2"/>
<input type="text" id="DescMSQ" name="DescMSQ" size="100%" placeholder="Ingrese descripción MSQ examen fisico"></br></br>

<label class="text-primary"><b>Piel&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b> </label>
<span class="radioP"></span><input type="radio" name="Piel" value="Si" id="Piel" tabindex="1" />
<span class="radioN"></span><input type="radio" name="Piel" value="No" id="Piel" tabindex="2"/>
<input type="text" id="DescPiel" name="DescPiel" size="100%" placeholder="Ingrese descripción Piel examen fisico"></br></br>

<label class="text-primary" ><b>Neuro&nbsp&nbsp&nbsp</b> </label>
<span class="radioP"></span><input type="radio" name="Neuro" value="Si" id="Neuro" tabindex="1" />
<span class="radioN"></span><input type="radio" name="Neuro" value="No" id="Neuro" tabindex="2"/>
<input type="text" id="DescNeuro" name="DescNeuro" size="100%" placeholder="Ingrese descripción Neuro examen fisico"></br></br>

<label class="text-primary" ><b>Psiq&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b> </label>
<span class="radioP"></span><input type="radio" name="Psiq" value="Si" id="Psiq" tabindex="1" />
<span class="radioN"></span><input type="radio" name="Psiq" value="No" id="Psiq" tabindex="2"/>
<input type="text" id="DescPsiq" name="DescPsiq" size="100%" placeholder="Ingrese descripción Psiq examen fisico"></br></br>

<label class="text-primary" ><b>Endoc&nbsp&nbsp&nbsp</b> </label> 
<span class="radioP"></span><input type="radio" name="Endoc" value="Si" id="Endoc" tabindex="1" />
<span class="radioN"></span><input type="radio" name="Endoc" value="No" id="Endoc" tabindex="2"/>
<input type="text" id="DescEndoc" name="DescEndoc" size="100%" placeholder="Ingrese descripción Endoc examen fisico"></br></br>

<label class="text-primary"><b>Cabeza&nbsp</b> </label>
<span class="radioP"></span><input type="radio" name="Otros" value="Si" id="Otros" tabindex="1" />
<span class="radioN"></span><input type="radio" name="Otros" value="No" id="Otros" tabindex="2"/>
<input type="text" id="DescOtros" name="DescOtros" size="100%" placeholder="Ingrese descripción Otros examen fisico"></br></br>

<label class="text-primary"><b>Cuello&nbsp&nbsp</b> </label>
<span class="radioP"></span><input type="radio" name="Cuello" value="Si" id="Cuello" tabindex="1" />
<span class="radioN"></span><input type="radio" name="Cuello" value="No" id="Cuello" tabindex="2"/>
<input type="text" id="DescCuello" name="DescCuello" size="100%" placeholder="Ingrese descripción Cuello examen fisico"></br></br>

<label class="text-primary"><b>Abdomen</b> </label>
<span class="radioP"></span><input type="radio" name="Abdomen" value="Si" id="Abdomen" tabindex="1" />
<span class="radioN"></span><input type="radio" name="Abdomen" value="No" id="Abdomen" tabindex="2"/>
<input type="text" id="DescAbdomen" name="DescAbdomens" size="100%" placeholder="Ingrese descripción Abdomen examen fisico"></br></br>

<label class="text-primary"><b>Pecho&nbsp&nbsp&nbsp</b> </label>
<span class="radioP"></span><input type="radio" name="Pecho" value="Si" id="Pecho" tabindex="1" />
<span class="radioN"></span><input type="radio" name="Pecho" value="No" id="Pecho" tabindex="2"/>
<input type="text" id="DescPecho" name="DescPecho" size="100%" placeholder="Ingrese descripción Pecho examen fisico"></br></br>

<label class="text-primary"><b>Espalda</b> </label>
<span class="radioP"></span><input type="radio" name="Espalda" value="Si" id="Espalda" tabindex="1" />
<span class="radioN"></span><input type="radio" name="Espalda" value="No" id="Espalda" tabindex="2"/>
<input type="text" id="DescEspalda" name="DescEspalda" size="100%" placeholder="Ingrese descripción Espalda examen fisico"></br></br>

<label class="text-primary"><b>Extremidades</b> </label>
<span class="radioP"></span><input type="radio" name="Extremidades" value="Si" id="Extremidades" tabindex="1" />
<span class="radioN"></span><input type="radio" name="Extremidades" value="No" id="Extremidades" tabindex="2"/>
<input type="text" id="DescExtremidades" name="DescExtremidades" size="100%" placeholder="Ingrese descripción Extremidades examen fisico"></br></br>

<label> <b>Signos vitales a llegada</b></label></br>
                <label class="text-primary">Pulso</label>
                <input type="text" id="PulsoA" name="PulsoA" size="6%" tabindex="13">
                <label class="text-primary">FR</label>
                <input type="text" id="frA" name="frA"size="6%" >
                <label for="ms" class="text-primary">Presion arterial</label>
                <input type="text" id="ParterialA" name="ParterialA" size="2%" placeholder=" --/--" >                            
                <label for="Oc" class="text-primary">Temperatura:</label>
                <input type="text" name="temperaturaA" id="temperaturaA" size="10%" tabindex="14"> 
                <button type="button" value="registrarSALL" onclick="javascript:SignosVAntesLLegada();" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-ok"></span></button>                
                <button type="button" tabindex="" align="center" onclick="javascript:ocultarSA1();" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-plus"></span></button> <span id="mensajeVitales"></span> </br> </br>
             <div id="vitalesExFisico2">
                <label><b>HHMM</b></label></br>
                <label class="text-primary">Pulso</label>
                <input type="text" id="PulsoA" name="PulsoA" size="6%" tabindex="13">
                <label class="text-primary">FR</label>
                <input type="text" id="frA" name="frA"size="6%" >
                <label for="ms" class="text-primary">Presion arterial</label>
                <input type="text" id="ParterialA" name="ParterialA" size="2%" placeholder=" --/--" >                            
                <label for="Oc" class="text-primary">Temperatura:</label>
                <input type="text" name="temperaturaA" id="temperaturaA" size="10%" tabindex="14"> 
                <button type="button" value="registrarSALL" onclick="javascript:SignosVAntesLLegada();" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-ok"></span></button>                
                <button type="button" tabindex="" align="center" onclick="javascript:ocultarSA1();" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-plus"></span></button> <span id="mensajeVitales"></span> </br> </br></br>
             </div>
                <center>
                 <b><div id="mensajeEvaluacion" class="text-success"></div></b>
             </center> 
                <center>
                <button type="button" tabindex="37" align="center" onclick="javascript:EvaluacionPac();" class="btn btn-primary btn-lg">Registrar evaluación</button> 
               </center>              
        </form>  
 </div>    
 </body>    
 </HTML>    