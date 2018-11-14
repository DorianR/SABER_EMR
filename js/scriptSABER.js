           function InfoPaciente(){               
       	        var CodigoFicha = document.getElementById('codigoficha').value;
				var CodigoPaciente = document.getElementById('codigo').value;
				var FechaIngreso = document.getElementById('fecha').value;
				var HoraIngreso = document.getElementById('hora').value;
				var Pnombre = document.getElementById('PNombre').value;
				var Snombre = document.getElementById('SNombre').value;
				var Papellido = document.getElementById('PrApellido').value;
				var Sapellido = document.getElementById('SegApellido').value;
				var ApellidoCas = document.getElementById('ACasada').value;
				var Referido = $("input[name='referido']:checked").val();
				var AutoridadNotificada = $("input[name='Anotificadas']:checked").val();
				var Fnacimiento = document.getElementById('FNac').value;
				var Anios = document.getElementById('anios').value;
				var Meses = document.getElementById('meses').value;
				var Dias = document.getElementById('dias').value;
                var ocupacion = document.getElementById('ocupacion').value;
				var Dpi = document.getElementById('dpi').value;
		        var Ntelefono = document.getElementById('telefono').value;
				var Direccion = document.getElementById('Direccion').value;
				var Sexo = $("input[name='sexo']:checked").val();
				var ContactoPaciente = document.getElementById('contEmer').value;
				var TelContacto = document.getElementById('NoTelEnc').value;
				var Relacion = document.getElementById('Relacion').value;
				var EstadoCivil = $("input[name='estadoCivil']:checked").val();
				var Etnia = $("input[name='etnia']:checked").val();			
				var AutoNotificada = document.getElementById('Anotificada').value;
				//var DescAutoriNotificadas = document.getElementById('AutoriNotificadas').value;
				$.ajax({
					type:'POST',
					url:'../php/enviaInfPaciente.php',
					data:('codigoficha='+CodigoFicha+'&codigo='+CodigoPaciente+'&fecha='+FechaIngreso+'&hora='+HoraIngreso+
          '&PNombre='+Pnombre+'&SNombre='+Snombre+'&PrApellido='+Papellido+'&SegApellido='+Sapellido+'&ACasada='+
          ApellidoCas+'&referido='+Referido+'&Anotificadas='+AutoridadNotificada+'&FNac='+Fnacimiento+'&anios='+
          Anios+'&meses='+Meses+'&dias='+Dias+'&ocupacion='+ocupacion+'&dpi='+Dpi+'&telefono='+Ntelefono+'&Direccion='+Direccion+'&sexo='+
          Sexo+'&contEmer='+ContactoPaciente+'&NoTelEnc='+TelContacto+'&Relacion='+Relacion+'&estadoCivil='+
          EstadoCivil+'&etnia='+Etnia+'&Anotificada='+AutoNotificada),
					success:function(respuesta){
						if (respuesta!=""){
							$('#mensaje').html('Informacion basica del paciente registrada con éxito');
                            document.getElementById('NoPaciente').value=respuesta;                           
						}
						else{
							$('#mensaje').html('No se ha podido registrar la informacion intenta de nuevo....');
						}
					}

				})
			}

            
            function UpdateInfoPaciente(){  
                var NoPaciente = document.getElementById('NoPaciente').value;
                var CodigoFicha = document.getElementById('codigoficha').value;
                var CodigoPaciente = document.getElementById('codigo').value;
                var FechaIngreso = document.getElementById('fecha').value;
                var HoraIngreso = document.getElementById('hora').value;
                var Pnombre = document.getElementById('PNombre').value;
                var Snombre = document.getElementById('SNombre').value;
                var Papellido = document.getElementById('PrApellido').value;
                var Sapellido = document.getElementById('SegApellido').value;
                  var ApellidoCas = document.getElementById('ACasada').value;
                  var Referido = $("input[name='referido']:checked").val();               
                  var AutoridadNotificada = $("input[name='Anotificadas']:checked").val();
                  var Fnacimiento = document.getElementById('FNac').value;
                  var Anios = document.getElementById('anios').value;
                  var Meses = document.getElementById('meses').value;
                  var Dias = document.getElementById('dias').value;
                  var ocupacion = document.getElementById('ocupacion').value;
                  var Dpi = document.getElementById('dpi').value;
                  var Ntelefono = document.getElementById('telefono').value;
                  var Direccion = document.getElementById('Direccion').value;
                var Sexo = $("input[name='sexo']:checked").val();
                var ContactoPaciente = document.getElementById('contEmer').value;
                var TelContacto = document.getElementById('NoTelEnc').value;
                var Relacion = document.getElementById('Relacion').value;
                var EstadoCivil = $("input[name='estadoCivil']:checked").val();
                var Etnia = $("input[name='etnia']:checked").val();         
                var AutoNotificada = document.getElementById('Anotificada').value;
                //var DescAutoriNotificadas = document.getElementById('AutoriNotificadas').value;
                $.ajax({
                    type:'POST',
                    url:'../php/EditaInfBasicP.php',
                    data:('&NoPaciente='+NoPaciente+'&codigoficha='+CodigoFicha+'&codigo='+CodigoPaciente+'&fecha='+FechaIngreso+'&hora='+HoraIngreso+
          '&PNombre='+Pnombre+'&SNombre='+Snombre+'&PrApellido='+Papellido+'&SegApellido='+Sapellido+'&ACasada='+ApellidoCas+
          '&referido='+Referido+'&Anotificadas='+AutoridadNotificada+'&FNac='+Fnacimiento+'&anios='+Anios+
          '&meses='+Meses+'&dias='+Dias+'&dpi='+Dpi+'&Ocupacion='+ocupacion+'&telefono='+Ntelefono+'&Direccion='+Direccion+'&sexo='+Sexo+
          '&contEmer='+ContactoPaciente+'&NoTelEnc='+TelContacto+'&Relacion='+Relacion+'&estadoCivil='+EstadoCivil+
          '&etnia='+Etnia+'&Anotificada='+AutoNotificada),
                    success:function(respuesta){
                        if (respuesta!=""){ 
                        $('#mensaje').html('Actualizado');                           
                            swal("Info. Paciente actualizado con éxito..!","","success");
                        }
                        else{
                            $('#mensaje').html('No se ha podido Actualizar la informacion intenta de nuevo....');
                        }
                    }

                })
            }
            
function triaje(){
                var NoPaciente = document.getElementById('NoPaciente').value;
                var Mllegada = $("input[name='Mllegada']:checked").val(); 
                var AmbulanciaNota = document.getElementById('AmbulanciaNota').value;
                var MedicamentosAllegada = document.getElementById('MedicamentosAllegada').value;
                var IantesLLegada = document.getElementById('IantesLLegada').value;
                var NotaTriage = document.getElementById('NotaTriage').value;
                var OtraInfo = document.getElementById('OtraInfo').value;                                
                $.ajax({
                    type:'POST',
                    url:'../php/enviaTriaje1.php',
                    data:('NoPaciente='+NoPaciente+'&Mllegada='+Mllegada+'&AmbulanciaNota='+AmbulanciaNota+'&MedicamentosAllegada='+MedicamentosAllegada+'&IantesLLegada='+IantesLLegada+'&NotaTriage='+NotaTriage+'&OtraInfo='+OtraInfo),
                    success:function(respuesta){
                        if (respuesta!=""){
                            $('#mensajeTriaje').html('Triaje registrado con exito');
                        }
                        else{
                            $('#mensajeTriaje').html('No se ha podido registrar el triaje....');
                        }
                    }

                })
            }
            function UpdateTriaje(){
                var NoPaciente = document.getElementById('NoPaciente').value;
                var Mllegada = $("input[name='Mllegada']:checked").val(); 
                var AmbulanciaNota = document.getElementById('AmbulanciaNota').value;
                var MedicamentosAllegada = document.getElementById('MedicamentosAllegada').value;
                var IantesLLegada = document.getElementById('IantesLLegada').value;
                var NotaTriage = document.getElementById('NotaTriage').value;
                var OtraInfo = document.getElementById('OtraInfo').value;                                
                $.ajax({
                    type:'POST',
                    url:'../php/EditaEnviaTriage.php',
                    data:('NoPaciente='+NoPaciente+'&Mllegada='+Mllegada+'&AmbulanciaNota='+AmbulanciaNota+'&MedicamentosAllegada='+MedicamentosAllegada+'&IantesLLegada='+IantesLLegada+'&NotaTriage='+NotaTriage+'&OtraInfo='+OtraInfo),
                    success:function(respuesta){
                        if (respuesta!=""){
                            $('#mensajeTriaje').html('Actualizado');
                            swal("Triage actualizado con éxito..!","","success")
                        }
                        else{
                            $('#mensajeTriaje').html('No se ha podido actualizar el triaje....');
                        }
                    }

                })
            }
function SignosVAntesLLegada1(){
                var NoPaciente = document.getElementById('NoPaciente').value;
                var PulsoA = document.getElementById('PulsoA').value;
                var frA = document.getElementById('frA').value;
                var ParterialA = document.getElementById('ParterialA').value;
                var temperaturaA = document.getElementById('temperaturaA').value;
                var HoraV = document.getElementById('HoraV').value;  
                var SatOxigeno = document.getElementById('POa').value;                                              
                $.ajax({
                    type:'POST',
                    url:'../php/enviaVitaleA.php',
                    data:('NoPaciente='+NoPaciente+'&PulsoA='+PulsoA+'&frA='+frA+'&ParterialA='+ParterialA+'&temperaturaA='+temperaturaA+'&HoraV='+HoraV+'&SatOxigeno='+SatOxigeno),
                    success:function(respuesta){
                        if (respuesta!=""){
                            $('#mensajeVitales').html('registrado');
                        }
                        else{
                            $('#mensajeVitales').html('no registrado');
                        }
                    }
                })
            }
function ActualizaSignosVAntesLLegada1(){
                var NoPaciente = document.getElementById('NoPaciente').value;
                var PulsoA = document.getElementById('PulsoA').value;
                var frA = document.getElementById('frA').value;
                var ParterialA = document.getElementById('ParterialA').value;
                var temperaturaA = document.getElementById('temperaturaA').value;
                var HoraV = document.getElementById('HoraV').value;  
                var SatOxigeno = document.getElementById('POa').value;                                                
                $.ajax({
                    type:'POST',
                    url:'../php/enviaVitaleA.php',
                    data:('NoPaciente='+NoPaciente+'&PulsoA='+PulsoA+'&frA='+frA+'&ParterialA='+ParterialA+'&temperaturaA='+temperaturaA+'&HoraV='+HoraV+'&SatOxigeno='+SatOxigeno),
                    success:function(respuesta){
                        if (respuesta!=""){
                            $('#mensajeVitales').html('registrado');
                        }
                        else{
                            $('#mensajeVitales').html('no registrado');
                        }
                    }
                })
            }


function SignosVAntesLLegada2(){
                var NoPaciente = document.getElementById('NoPaciente').value;
                var PulsoAA = document.getElementById('PulsoAA').value;
                var frAA = document.getElementById('frAA').value;
                var ParterialAA = document.getElementById('ParterialAA').value;
                var temperaturaAA = document.getElementById('temperaturaAA').value;
                var HoraVV = document.getElementById('HoraVV').value;
                var SatOxigenoAA = document.getElementById('POaa').value;                                                
                $.ajax({
                    type:'POST',
                    url:'../php/enviaVitaleAA.php',
                    data:('NoPaciente='+NoPaciente+'&PulsoAA='+PulsoAA+'&frAA='+frAA+'&ParterialAA='+ParterialAA+'&temperaturaAA='+temperaturaAA+'&HoraVV='+HoraVV+'&SatOxigenoAA='+SatOxigenoAA),
                    success:function(respuesta){
                        if (respuesta!=""){
                            $('#mensajeVitales2').html('registrado');
                        }
                        else{
                            $('#mensajeVitales2').html('no registrado');
                        }
                    }
                })
            }
function SignosVllegando(){
                var NoPaciente = document.getElementById('NoPaciente').value;
                var PulsoD = document.getElementById('PulsoD').value;
                var frD = document.getElementById('frD').value;
                var ParterialD = document.getElementById('ParterialD').value;
                var temperaturaD = document.getElementById('temperaturaD').value;                                                
                $.ajax({
                    type:'POST',
                    url:'../php/enviaVitaleD.php',
                    data:('NoPaciente='+NoPaciente+'&PulsoD='+PulsoD+'&frD='+frD+'&ParterialD='+ParterialD+'&temperaturaD='+temperaturaD),
                    success:function(respuesta){
                        if (respuesta!=""){
                            $('#mensajeVitalesLLegando').html('registrado');
                        }
                        else{
                            $('#mensajeVitalesLLegando').html('no registrado');
                        }
                    }
                })
            }
            function SignosVExFisico(){
                var NoPaciente = document.getElementById('NoPaciente').value; 
                var HoraSvExFisico = document.getElementById('HoraSvExFisico').value;               
                var Revisaron = $("input[name='SiSignosEntrar']:checked").val(); 
                var PulsoD = document.getElementById('PulsoEntrar').value;
                var frD = document.getElementById('frEntrar').value;
                var ParterialD = document.getElementById('ParterialEntrar').value;
                var temperaturaD = document.getElementById('temperaturaEntrar').value; 
                var SatOxD = document.getElementById('POsv').value;                                               
                $.ajax({
                    type:'POST',
                    url:'../php/EnviaVitalesEntrandoH.php',
                    data:('NoPaciente='+NoPaciente+'&HoraSvExFisico='+HoraSvExFisico+'&Revisaron='+Revisaron+'&PulsoD='+PulsoD+'&frD='+frD+'&ParterialD='+ParterialD+'&temperaturaD='+temperaturaD+'&SatOxD='+SatOxD),
                    success:function(respuesta){
                        if (respuesta!=""){
                            $('#mensajeVitalesEntrando').html('registrado');
                        }
                        else{
                            $('#mensajeVitalesEntrando').html('no registrado');
                        }
                    }
                })
            }
            function SignosVDespuesEntrarHospital(){
                var NoPaciente = document.getElementById('NoPaciente').value;            
                var PulsoD = document.getElementById('PulsoDEntrar1').value;
                var frD = document.getElementById('frDEntrar1').value;
                var ParterialD = document.getElementById('ParterialDEntrar1').value;
                var temperaturaD = document.getElementById('temperaturaDEntrar1').value;                                                
                $.ajax({
                    type:'POST',
                    url:'../php/enviaVitalesDespuesEntrarH.php',
                    data:('NoPaciente='+NoPaciente+'&PulsoD='+PulsoD+'&frD='+frD+'&ParterialD='+ParterialD+'&temperaturaD='+temperaturaD),
                    success:function(respuesta){
                        if (respuesta!=""){
                            $('#mensajeVitalesDespuesEntrar').html('registrado');
                        }
                        else{
                            $('#mensajeVitalesDespuesEntrar').html('no registrado');
                        }
                    }
                })
            }
                       function SignosVDespuesEntrarHospita2(){
                var NoPaciente = document.getElementById('NoPaciente').value;            
                var PulsoD = document.getElementById('PulsoDEntrar2').value;
                var frD = document.getElementById('frDEntrar2').value;
                var ParterialD = document.getElementById('ParterialDEntrar2').value;
                var temperaturaD = document.getElementById('temperaturaDEntrar2').value;                                                
                $.ajax({
                    type:'POST',
                    url:'../php/enviaVitalesDespuesEntrarH2.php',
                    data:('NoPaciente='+NoPaciente+'&PulsoD='+PulsoD+'&frD='+frD+'&ParterialD='+ParterialD+'&temperaturaD='+temperaturaD),
                    success:function(respuesta){
                        if (respuesta!=""){
                            $('#mensajeVitalesDespuesEntrar2').html('registrado');
                        }
                        else{
                            $('#mensajeVitalesDespuesEntrar2').html('no registrado');
                        }
                    }
                })
            }
function EvaluacionPac(){
                var NoPaciente = document.getElementById('NoPaciente').value;
                var HoraContactoMedico = document.getElementById('HoraContactoMedico').value;
                var MedicoAcargo = document.getElementById('MedicoAcargo').value;
                var Eps = document.getElementById('Eps').value;
                var Interno = document.getElementById('Interno').value;
                var Externo = document.getElementById('Externo').value;
                var Otro = document.getElementById('Otro').value;
                var MotConsulta = document.getElementById('MotConsulta').value;
                var HistoriaEnfActual = document.getElementById('HistoriaEnfActual').value;
                var HistoriaMedica = document.getElementById('HistoriaMedica').value;
                var HistoriaQuirurgica = document.getElementById('HistoriaQuirurgica').value;
                var HistoriaFamilia = document.getElementById('HistoriaFamilia').value;
                var HistoriaSocial = document.getElementById('HistoriaSocial').value;
                var HistoriaMedicaciones = document.getElementById('HistoriaMedicaciones').value;
                var HistoriaAlergias = document.getElementById('HistoriaAlergias').value;                               
                $.ajax({
                    type:'POST',
                    url:'../php/enviaEvaluacion.php',
                    data:('NoPaciente='+NoPaciente+'&HoraContactoMedico='+HoraContactoMedico+'&MedicoAcargo='+MedicoAcargo+'&Eps='+Eps+'&Interno='+Interno+'&Externo='+Externo+'&Otro='+Otro+'&MotConsulta='+MotConsulta+'&HistoriaEnfActual='+HistoriaEnfActual+'&HistoriaMedica='+HistoriaMedica+'&HistoriaQuirurgica='+HistoriaQuirurgica+'&HistoriaFamilia='+HistoriaFamilia+'&HistoriaSocial='+HistoriaSocial+'&HistoriaMedicaciones='+HistoriaMedicaciones+'&HistoriaAlergias='+HistoriaAlergias),
                    success:function(respuesta){
                        if (respuesta!=""){
                            $('#mensajeEvaluacion').html('Evaluacion registrada con exito');
                        }
                        else{
                            $('#mensajeEvaluacion').html('No se ha podido registrar la evaluacion....'+respuesta);
                        }
                    }

                })
            } 
function UpdateEvaluacionPac(){
                var NoPaciente = document.getElementById('NoPaciente').value;
                var HoraContactoMedico = document.getElementById('HoraContactoMedico').value;
                var MedicoAcargo = document.getElementById('MedicoAcargo').value;
                var Eps = document.getElementById('Eps').value;
                var Interno = document.getElementById('Interno').value;
                var Externo = document.getElementById('Externo').value;
                var Otro = document.getElementById('Otro').value;
                var MotConsulta = document.getElementById('MotConsulta').value;
                var HistoriaEnfActual = document.getElementById('HistoriaEnfActual').value;
                var HistoriaMedica = document.getElementById('HistoriaMedica').value;
                var HistoriaQuirurgica = document.getElementById('HistoriaQuirurgica').value;
                var HistoriaFamilia = document.getElementById('HistoriaFamilia').value;
                var HistoriaSocial = document.getElementById('HistoriaSocial').value;
                var HistoriaMedicaciones = document.getElementById('HistoriaMedicaciones').value;
                var HistoriaAlergias = document.getElementById('HistoriaAlergias').value;                               
                $.ajax({
                    type:'POST',
                    url:'../php/EditaEnviaEvaluacion.php',
                    data:('NoPaciente='+NoPaciente+'&HoraContactoMedico='+HoraContactoMedico+'&MedicoAcargo='+MedicoAcargo+'&Eps='+Eps+'&Interno='+Interno+'&Externo='+Externo+'&Otro='+Otro+'&MotConsulta='+MotConsulta+'&HistoriaEnfActual='+HistoriaEnfActual+'&HistoriaMedica='+HistoriaMedica+'&HistoriaQuirurgica='+HistoriaQuirurgica+'&HistoriaFamilia='+HistoriaFamilia+'&HistoriaSocial='+HistoriaSocial+'&HistoriaMedicaciones='+HistoriaMedicaciones+'&HistoriaAlergias='+HistoriaAlergias),
                    success:function(respuesta){
                        if (respuesta!=""){
                             $('#mensajeEvaluacion').html('Actualizado');
                            swal("Evaluación paciente actualizada con éxito..!","","success")
                        }
                        else{
                            $('#mensajeEvaluacion').html('No se ha podido Actualizar la evaluacion....'+respuesta);
                        }
                    }

                })
            }  
function RevSistemas(){
                var NoPaciente = document.getElementById('NoPaciente').value;
                var generalP = $("input[name='generalP']:checked").val();  
                var DescGeneral = document.getElementById('DescGeneral').value;
                var Ojos = $("input[name='Ojos']:checked").val(); 
                var DescOjos = document.getElementById('DescOjos').value;
                var ORL = $("input[name='ORL']:checked").val(); 
                var DescORL = document.getElementById('DescORL').value;
                var CV = $("input[name='CV']:checked").val(); 
                var DescCV = document.getElementById('DescCV').value;
                var RESP = $("input[name='RESP']:checked").val(); 
                var DescRESP = document.getElementById('DescRESP').value;
                var GI = $("input[name='GI']:checked").val(); 
                var DescGI = document.getElementById('DescGI').value;
                var GU = $("input[name='GU']:checked").val(); 
                var DescGU = document.getElementById('DescGU').value; 
                var MSQ = $("input[name='MSQ']:checked").val();                
                var DescMSQ = document.getElementById('DescMSQ').value;
                var Piel = $("input[name='Piel']:checked").val(); 
                var DescPiel = document.getElementById('DescPiel').value;
                var Neuro = $("input[name='Neuro']:checked").val(); 
                var DescNeuro = document.getElementById('DescNeuro').value;  
                var Psiq = $("input[name='Psiq']:checked").val(); 
                var DescPsiq = document.getElementById('DescPsiq').value;                
                var Endoc = $("input[name='Endoc']:checked").val(); 
                var DescEndoc = document.getElementById('DescEndoc').value; 
                var Otros = $("input[name='Otros']:checked").val(); 
                var DescOtros = document.getElementById('DescOtros').value;  
                $.ajax({
                    type:'POST',
                    url:'../php/enviaRevSis.php',
                    data:('NoPaciente='+NoPaciente+'&generalP='+generalP+'&DescGeneral='+DescGeneral+'&Ojos='+Ojos+'&DescOjos='+DescOjos+
                        '&ORL='+ORL+'&DescORL='+DescORL+'&CV='+CV+'&DescCV='+DescCV+'&RESP='+RESP+'&DescRESP='+DescRESP+'&GI='+GI+
                        '&DescGI='+DescGI+'&GU='+GU+'&DescGU='+DescGU+'&MSQ='+MSQ+'&DescMSQ='+DescMSQ+'&Piel='+Piel+'&DescPiel='+DescPiel+'&Neuro='+Neuro+
                        '&DescNeuro='+DescNeuro+'&Psiq='+Psiq+'&DescPsiq='+DescPsiq+'&Endoc='+Endoc+'&DescEndoc='+DescEndoc+'&Otros='+Otros+'&DescOtros='+DescOtros),
                    success:function(respuesta){
                        if (respuesta!=""){
                            $('#mensajeRevision').html('Revisión registrada con exito');
                        }
                        else{
                            $('#mensajeRevision').html('No se ha podido registrar la revision....'+respuesta);
                        }
                    }

                })
            } 
            function UpdateRevSistemas(){
                var NoPaciente = document.getElementById('NoPaciente').value;
                var generalP = $("input[name='generalP']:checked").val();  
                var DescGeneral = document.getElementById('DescGeneral').value;
                var Ojos = $("input[name='Ojos']:checked").val(); 
                var DescOjos = document.getElementById('DescOjos').value;
                var ORL = $("input[name='ORL']:checked").val(); 
                var DescORL = document.getElementById('DescORL').value;
                var CV = $("input[name='CV']:checked").val(); 
                var DescCV = document.getElementById('DescCV').value;
                var RESP = $("input[name='RESP']:checked").val(); 
                var DescRESP = document.getElementById('DescRESP').value;
                var GI = $("input[name='GI']:checked").val(); 
                var DescGI = document.getElementById('DescGI').value;
                var GU = $("input[name='GU']:checked").val(); 
                var DescGU = document.getElementById('DescGU').value; 
                var MSQ = $("input[name='MSQ']:checked").val();                
                var DescMSQ = document.getElementById('DescMSQ').value;
                var Piel = $("input[name='Piel']:checked").val(); 
                var DescPiel = document.getElementById('DescPiel').value;
                var Neuro = $("input[name='Neuro']:checked").val(); 
                var DescNeuro = document.getElementById('DescNeuro').value;  
                var Psiq = $("input[name='Psiq']:checked").val(); 
                var DescPsiq = document.getElementById('DescPsiq').value;                
                var Endoc = $("input[name='Endoc']:checked").val(); 
                var DescEndoc = document.getElementById('DescEndoc').value; 
                var Otros = $("input[name='Otros']:checked").val(); 
                var DescOtros = document.getElementById('DescOtros').value;  
                $.ajax({
                    type:'POST',
                    url:'../php/EditaEnviaRevSis.php',
                    data:('NoPaciente='+NoPaciente+'&generalP='+generalP+'&DescGeneral='+DescGeneral+'&Ojos='+Ojos+'&DescOjos='+DescOjos+
                        '&ORL='+ORL+'&DescORL='+DescORL+'&CV='+CV+'&DescCV='+DescCV+'&RESP='+RESP+'&DescRESP='+DescRESP+'&GI='+GI+
                        '&DescGI='+DescGI+'&GU='+GU+'&DescGU='+DescGU+'&MSQ='+MSQ+'&DescMSQ='+DescMSQ+'&Piel='+Piel+'&DescPiel='+DescPiel+'&Neuro='+Neuro+
                        '&DescNeuro='+DescNeuro+'&Psiq='+Psiq+'&DescPsiq='+DescPsiq+'&Endoc='+Endoc+'&DescEndoc='+DescEndoc+'&Otros='+Otros+'&DescOtros='+DescOtros),
                    success:function(respuesta){
                        if (respuesta!=""){
                            swal("Rev. Sistemas actualizada con éxito..!","","success")
                        }
                        else{
                            $('#mensajeRevision').html('No se ha podido actualizada la revision....'+respuesta);
                        }
                    }

                })
            } 
function SignosVEntrandoHos(){
                var NoPaciente = document.getElementById('NoPaciente').value;
                var PulsoEntrar = document.getElementById('PulsoEntrar').value;
                var frEntrar = document.getElementById('frEntrar').value;
                var ParterialEntrar = document.getElementById('ParterialEntrar').value;
                var temperaturaEntrar = document.getElementById('temperaturaEntrar').value;                                                
                $.ajax({
                    type:'POST',
                    url:'../php/EnviaValesEntrandoH.php',
                    data:('NoPaciente='+NoPaciente+'&PulsoEntrar='+PulsoEntrar+'&frEntrar='+frEntrar+'&ParterialEntrar='+ParterialEntrar+'&temperaturaEntrar='+temperaturaEntrar),
                    success:function(respuesta){
                        if (respuesta!=""){
                            $('#mensajeVitalesEntrando').html('registrado');
                        }
                        else{
                            $('#mensajeVitalesEntrando').html('no registrado');
                        }
                    }
                })
            }
function ExamenFisico(){
                var NoPaciente = document.getElementById('NoPaciente').value;             
                var generalFis = $("input[name='generalFis']:checked").val(); 
                var DescGeneralFis = document.getElementById('DescGeneralFis').value;
                var OjosFis = $("input[name='OjosFis']:checked").val(); 
                var DescOjosFis = document.getElementById('DescOjosFis').value;
                var ORLFis = $("input[name='ORLFis']:checked").val(); 
                var DescORLFis = document.getElementById('DescORLFis').value;
                var CVFis = $("input[name='CVFis']:checked").val(); 
                var DescCVFis = document.getElementById('DescCVFis').value;
                var RESPFis = $("input[name='RESPFis']:checked").val(); 
                var DescRESPFis = document.getElementById('DescRESPFis').value;
                var GIFis = $("input[name='GIFis']:checked").val(); 
                var DescGIFis = document.getElementById('DescGIFis').value;
                var GUFis = $("input[name='GUFis']:checked").val(); 
                var DescGUFis = document.getElementById('DescGUFis').value; 
                var MSQFis = $("input[name='MSQFis']:checked").val();                 
                var DescMSQFis = document.getElementById('DescMSQFis').value;
                var PielFis = $("input[name='PielFis']:checked").val(); 
                var DescPielFis = document.getElementById('DescPielFis').value;
                var NeuroFis = $("input[name='NeuroFis']:checked").val(); 
                var DescNeuroFis = document.getElementById('DescNeuroFis').value;  
                var PsiqFis = $("input[name='PsiqFis']:checked").val(); 
                var DescPsiqFis = document.getElementById('DescPsiqFis').value;                
                var EndocFis = $("input[name='EndocFis']:checked").val(); 
                var DescEndocFis = document.getElementById('DescEndocFis').value; 
                var CabezaFis = $("input[name='CabezaFis']:checked").val(); 
                var DescCabezaFis = document.getElementById('DescCabezaFis').value; 
                var CuelloFis = $("input[name='CuelloFis']:checked").val(); 
                var DescCuelloFis = document.getElementById('DescCuelloFis').value;
                var AbdomenFis = $("input[name='AbdomenFis']:checked").val(); 
                var DescAbdomensFis = document.getElementById('DescAbdomensFis').value;
                var PechoFis = $("input[name='PechoFis']:checked").val(); 
                var DescPechoFis = document.getElementById('DescPechoFis').value;
                var EspaldaFis = $("input[name='EspaldaFis']:checked").val(); 
                var DescEspaldaFis = document.getElementById('DescEspaldaFis').value;
                var ExtremidadesFis = $("input[name='ExtremidadesFis']:checked").val(); 
                var DescExtremidadesFis = document.getElementById('DescExtremidadesFis').value; 
                $.ajax({
                    type:'POST',
                    url:'../php/EnviaExamenFisico.php',
                    data:('NoPaciente='+NoPaciente+'&generalFis='+generalFis+'&DescGeneralFis='+DescGeneralFis+'&OjosFis='+OjosFis+'&DescOjosFis='+DescOjosFis+
                        '&ORLFis='+ORLFis+'&DescORLFis='+DescORLFis+'&CVFis='+CVFis+'&DescCVFis='+DescCVFis+'&RESPFis='+RESPFis+'&DescRESPFis='+DescRESPFis+'&GIFis='+GIFis+
                        '&DescGIFis='+DescGIFis+'&GUFis='+GUFis+'&DescGUFis='+DescGUFis+'&MSQFis='+MSQFis+'&DescMSQFis='+DescMSQFis+'&PielFis='+PielFis+'&DescPielFis='+DescPielFis+'&NeuroFis='+NeuroFis+
                        '&DescNeuroFis='+DescNeuroFis+'&PsiqFis='+PsiqFis+'&DescPsiqFis='+DescPsiqFis+'&EndocFis='+EndocFis+'&DescEndocFis='+DescEndocFis+'&CabezaFis='+CabezaFis+'&DescCabezaFis='+DescCabezaFis+
                        '&CuelloFis='+CuelloFis+'&DescCuelloFis='+DescCuelloFis+'&AbdomenFis='+AbdomenFis+'&DescAbdomensFis='+DescAbdomensFis+'&PechoFis='+PechoFis+'&DescPechoFis='+DescPechoFis+
                        '&EspaldaFis='+EspaldaFis+'&DescEspaldaFis='+DescEspaldaFis+'&ExtremidadesFis='+ExtremidadesFis+'&DescExtremidadesFis='+DescExtremidadesFis),
                    success:function(respuesta){
                        if (respuesta!=""){
                            $('#mensajeExamenFisico').html('Ex. Fisico registrado con exito');
                        }
                        else{
                            $('#mensajeExamenFisico').html('No se ha podido registrar Ex. Fisico'+respuesta);
                        }
                    }

                })
            }
            function UpdateExamenFisico(){
                var NoPaciente = document.getElementById('NoPaciente').value;             
                var generalFis = $("input[name='generalFis']:checked").val(); 
                var DescGeneralFis = document.getElementById('DescGeneralFis').value;
                var OjosFis = $("input[name='OjosFis']:checked").val(); 
                var DescOjosFis = document.getElementById('DescOjosFis').value;
                var ORLFis = $("input[name='ORLFis']:checked").val(); 
                var DescORLFis = document.getElementById('DescORLFis').value;
                var CVFis = $("input[name='CVFis']:checked").val(); 
                var DescCVFis = document.getElementById('DescCVFis').value;
                var RESPFis = $("input[name='RESPFis']:checked").val(); 
                var DescRESPFis = document.getElementById('DescRESPFis').value;
                var GIFis = $("input[name='GIFis']:checked").val(); 
                var DescGIFis = document.getElementById('DescGIFis').value;
                var GUFis = $("input[name='GUFis']:checked").val(); 
                var DescGUFis = document.getElementById('DescGUFis').value; 
                var MSQFis = $("input[name='MSQFis']:checked").val();                 
                var DescMSQFis = document.getElementById('DescMSQFis').value;
                var PielFis = $("input[name='PielFis']:checked").val(); 
                var DescPielFis = document.getElementById('DescPielFis').value;
                var NeuroFis = $("input[name='NeuroFis']:checked").val(); 
                var DescNeuroFis = document.getElementById('DescNeuroFis').value;  
                var PsiqFis = $("input[name='PsiqFis']:checked").val(); 
                var DescPsiqFis = document.getElementById('DescPsiqFis').value;                
                var EndocFis = $("input[name='EndocFis']:checked").val(); 
                var DescEndocFis = document.getElementById('DescEndocFis').value; 
                var CabezaFis = $("input[name='CabezaFis']:checked").val(); 
                var DescCabezaFis = document.getElementById('DescCabezaFis').value; 
                var CuelloFis = $("input[name='CuelloFis']:checked").val(); 
                var DescCuelloFis = document.getElementById('DescCuelloFis').value;
                var AbdomenFis = $("input[name='AbdomenFis']:checked").val(); 
                var DescAbdomensFis = document.getElementById('DescAbdomensFis').value;
                var PechoFis = $("input[name='PechoFis']:checked").val(); 
                var DescPechoFis = document.getElementById('DescPechoFis').value;
                var EspaldaFis = $("input[name='EspaldaFis']:checked").val(); 
                var DescEspaldaFis = document.getElementById('DescEspaldaFis').value;
                var ExtremidadesFis = $("input[name='ExtremidadesFis']:checked").val(); 
                var DescExtremidadesFis = document.getElementById('DescExtremidadesFis').value; 
                $.ajax({
                    type:'POST',
                    url:'../php/EditaEnviaExamenFisico.php',
                    data:('NoPaciente='+NoPaciente+'&generalFis='+generalFis+'&DescGeneralFis='+DescGeneralFis+'&OjosFis='+OjosFis+'&DescOjosFis='+DescOjosFis+
                        '&ORLFis='+ORLFis+'&DescORLFis='+DescORLFis+'&CVFis='+CVFis+'&DescCVFis='+DescCVFis+'&RESPFis='+RESPFis+'&DescRESPFis='+DescRESPFis+'&GIFis='+GIFis+
                        '&DescGIFis='+DescGIFis+'&GUFis='+GUFis+'&DescGUFis='+DescGUFis+'&MSQFis='+MSQFis+'&DescMSQFis='+DescMSQFis+'&PielFis='+PielFis+'&DescPielFis='+DescPielFis+'&NeuroFis='+NeuroFis+
                        '&DescNeuroFis='+DescNeuroFis+'&PsiqFis='+PsiqFis+'&DescPsiqFis='+DescPsiqFis+'&EndocFis='+EndocFis+'&DescEndocFis='+DescEndocFis+'&CabezaFis='+CabezaFis+'&DescCabezaFis='+DescCabezaFis+
                        '&CuelloFis='+CuelloFis+'&DescCuelloFis='+DescCuelloFis+'&AbdomenFis='+AbdomenFis+'&DescAbdomensFis='+DescAbdomensFis+'&PechoFis='+PechoFis+'&DescPechoFis='+DescPechoFis+
                        '&EspaldaFis='+EspaldaFis+'&DescEspaldaFis='+DescEspaldaFis+'&ExtremidadesFis='+ExtremidadesFis+'&DescExtremidadesFis='+DescExtremidadesFis),
                    success:function(respuesta){
                        if (respuesta!=""){
                            swal("Ex. Fisico actualizado con éxito..!","","success")
                        }
                        else{
                            $('#mensajeExamenFisico').html('No se ha podido actualizar Ex. Fisico'+respuesta);
                        }
                    }

                })
            }
function EvaluacionPlan(){
                var NoPaciente = document.getElementById('NoPaciente').value;
                var DiagDif = document.getElementById('DiagDif').value;
                var LabImagens = document.getElementById('LabImagens').value;
                var EvClinica = document.getElementById('EvClinica').value;
                var Proces = document.getElementById('Proces').value; 
                var Consultas = document.getElementById('Consultas').value;                                               
                $.ajax({
                    type:'POST',
                    url:'../php/EnviaEvaluacionPlan.php',
                    data:('NoPaciente='+NoPaciente+'&DiagDif='+DiagDif+'&LabImagens='+LabImagens+'&EvClinica='+EvClinica+'&Proces='+Proces+'&Consultas='+Consultas),
                    success:function(respuesta){
                        if (respuesta!=""){
                            $('#mensajeEvaluacionPlan').html('Evaluación y plan registrado con exito');
                        }
                        else{
                            $('#mensajeEvaluacionPlan').html('no registrado');
                        }
                    }
                })
            }
            function UpdateEvaluacionPlan(){
                var NoPaciente = document.getElementById('NoPaciente').value;
                var DiagDif = document.getElementById('DiagDif').value;
                var LabImagens = document.getElementById('LabImagens').value;
                var EvClinica = document.getElementById('EvClinica').value;
                var Proces = document.getElementById('Proces').value; 
                var Consultas = document.getElementById('Consultas').value;                                               
                $.ajax({
                    type:'POST',
                    url:'../php/EditaEnviaEvaluacionPlan.php',
                    data:('NoPaciente='+NoPaciente+'&DiagDif='+DiagDif+'&LabImagens='+LabImagens+'&EvClinica='+EvClinica+'&Proces='+Proces+'&Consultas='+Consultas),
                    success:function(respuesta){
                        if (respuesta!=""){
                          swal("Ev. Plan actualizado con éxito..!","","success")
                        }
                        else{
                            $('#mensajeEvaluacionPlan').html('no Actualizada');
                        }
                    }
                })
            }
function Disposicion(){
                var NoPaciente = document.getElementById('NoPaciente').value; 
                var HoraDispo  = document.getElementById('HoraDispo').value;             
                var Dispo = $("input[name='Dispo']:checked").val(); 
                var OtraInfoDisp = document.getElementById('OtraInfoDisp').value;
                var NotasMedicoCargo = document.getElementById('NotasMedicoCargo').value;
                var OtrasNotas = document.getElementById('OtrasNotas').value;
                var ViPacienteRS = $("input[name='ViPacienteRS']:checked").val(); 
                var TiempoContatoRS = document.getElementById('TiempoContatoRS').value;
                var FirmaRS = document.getElementById('FirmaRS').value;
                var ViPacienteMD = $("input[name='ViPacienteMD']:checked").val();
                var TiempoContatoMD = document.getElementById('TiempoContatoMD').value;
                var FirmaMD = document.getElementById('FirmaMD').value;
                   $.ajax({
                    type:'POST',
                    url:'../php/enviaDisposicionPaciente.php',
                    data:('NoPaciente='+NoPaciente+'&HoraDispo='+HoraDispo+'&Dispo='+Dispo+'&OtraInfoDisp='+OtraInfoDisp+'&NotasMedicoCargo='+NotasMedicoCargo+'&OtrasNotas='+OtrasNotas+'&ViPacienteRS='+ViPacienteRS+'&TiempoContatoRS='+TiempoContatoRS+'&FirmaRS='+FirmaRS+'&ViPacienteMD='+ViPacienteMD+'&TiempoContatoMD='+TiempoContatoMD+'&FirmaMD='+FirmaMD),
                    success:function(respuesta){
                        if (respuesta!=""){
                            $('#mensajeDisposicion').html('Disposicion registrada con exito');
                        }
                        else{
                            $('#mensajeDisposicion').html('no registrado');
                        }
                    }
                })
            }
            function UpdateDisposicion(){
                var NoPaciente = document.getElementById('NoPaciente').value;
                var HoraDispo  = document.getElementById('HoraDispo').value;                  
                var Dispo = $("input[name='Dispo']:checked").val(); 
                var OtraInfoDisp = document.getElementById('OtraInfoDisp').value;
                var NotasMedicoCargo = document.getElementById('NotasMedicoCargo').value;
                var OtrasNotas = document.getElementById('OtrasNotas').value;
                var ViPacienteRS = $("input[name='ViPacienteRS']:checked").val(); 
                var TiempoContatoRS = document.getElementById('TiempoContatoRS').value;
                var FirmaRS = document.getElementById('FirmaRS').value;
                var ViPacienteMD = $("input[name='ViPacienteMD']:checked").val();
                var TiempoContatoMD = document.getElementById('TiempoContatoMD').value;
                var FirmaMD = document.getElementById('FirmaMD').value;
                   $.ajax({
                    type:'POST',
                    url:'../php/EditaDisposicionPaciente.php',
                    data:('NoPaciente='+NoPaciente+'&HoraDispo='+HoraDispo+'&Dispo='+Dispo+'&OtraInfoDisp='+OtraInfoDisp+'&NotasMedicoCargo='+NotasMedicoCargo+'&OtrasNotas='+OtrasNotas+'&ViPacienteRS='+ViPacienteRS+'&TiempoContatoRS='+TiempoContatoRS+'&FirmaRS='+FirmaRS+'&ViPacienteMD='+ViPacienteMD+'&TiempoContatoMD='+TiempoContatoMD+'&FirmaMD='+FirmaMD),
                    success:function(respuesta){
                        if (respuesta!=""){
                            swal("Disposición actualizado con éxito..!","","success")
                        }
                        else{
                            $('#mensajeDisposicion').html('no Actualizado');
                        }
                    }
                })
            }
            function CargaSVIniciales(){
                var HoraVini = document.getElementById('HoraV').value;                
                var PulsoIni = document.getElementById('PulsoA').value; 
                var FrIni = document.getElementById('frA').value;
                var PreArIni = document.getElementById('ParterialA').value;
                var TempeIni = document.getElementById('temperaturaA').value;
                document.getElementById('HoraSvIniciales').value=HoraVini;
                document.getElementById('PulsoEntrarInicial').value=PulsoIni;
                document.getElementById('frEntrarInicial').value=FrIni;
                document.getElementById('ParterialEntrarInicial').value=PreArIni;
                document.getElementById('temperaturaEntrarInicial').value=TempeIni;
                   
            }

function Medicamentos(){
               var NoPaciente = document.getElementById('NoPaciente').value; 
                var MedSuministrado = document.getElementById('medSuminis').value;
                   $.ajax({
                    type:'POST',
                    url:'../php/EnviaMedicamentos.php',
                    data:('NoPaciente='+NoPaciente+'&MedSuministrado='+MedSuministrado),
                    success:function(respuesta){
                        if (respuesta!=""){
                            $('#mensajeMedicamentos').html('Medicamentos registrado con exito');
                        }
                        else{
                            $('#mensajeMedicamentos').html('No se ha podido registrar los Medicamentos....');
                        }
                    }
                })                
            }

function UpdateMedicmentos(){
                var NoPaciente = document.getElementById('NoPaciente').value; 
                var MedSuministrado = document.getElementById('medSuminis').value;                 
                   $.ajax({
                    type:'POST',
                    url:'../php/EditaMedicamentos.php',
                     data:('NoPaciente='+NoPaciente+'&MedSuministrado='+MedSuministrado),
                    success:function(respuesta){
                        if (respuesta!=""){
                            swal("Medicamentos actualizado con éxito..!","","success")
                        }
                        else{
                            $('#mensajeDisposicion').html('no Actualizado');
                        }
                    }
                })
            }

function desactiva_Btn(enlace)
{
      enlace.disabled='disabled';
}
function cargarDiv(div,url)
{
      $(div).load(url);
}

function mostrarInfP(){
    setTimeout(function(){cargarDiv('#capa','../php/datoPac.php')},300); // 3000ms = 3s
}
function mostrarDatosPActualizado(){
    setTimeout(function(){cargarDiv('#capa','../php/ActualizaDatoPac.php?+NoPaciente='+NoPaciente.value)},300); // 3000ms = 3s
}
		function ocultarSA1(){
document.getElementById('ocultoSA1').style.display = 'block';
}
  function MuestraVitInicalesExF(){
document.getElementById('SvInciales').style.display = 'block';
}
function DesapareceBtn(DtoBtn){
document.getElementById(DtoBtn).style.display = 'none';
}
function APARECEmodificarBtn(idBoton){
document.getElementById(idBoton).style.display = 'block';
}
function modINfBpaciente(){
document.getElementById("#enviarModINfo").style.display = 'block';
}
function verificaFecha(){
alert("Verifica la fecha de nacimiento");
}
function OpenInNewTab() {
  var win = window.open(infBasicP.php, '_blank');
  win.focus();
}
function abrirReporte() {
  var win = window.open('../php/Reporte1.php?+NoPaciente='+NoPaciente.value, '_blank');
  win.focus();
}

function abrirReporteRecodrd() {
  var win = window.open('../php/ReporteRecordOp.php?+NoPaciente='+NoPaciente.value, '_blank');
  win.focus();
}
function validaInfoBasica() {
var CodigoFich = document.getElementById("codigoficha");
var Prnombre = document.getElementById('PNombre');
var Senombre = document.getElementById('SNombre');
var Prapellido = document.getElementById('PrApellido');
var Seapellido = document.getElementById('SegApellido');
var ApellidoCasada = document.getElementById('ACasada');
var Referidoo = document.getElementById('referido');
var asegurado = document.getElementById('aasegurado');
var autoNorific = document.getElementById('Anotificadas');
var FechNac = document.getElementById('FNac');
var Ocupac =  document.getElementById('ocupacion');
var dpi = document.getElementById('dpi');
var Ntelefono = document.getElementById('telefono');
var Direccion = document.getElementById('Direccion');
var Sexo = $("input[name='sexo']:checked");
var ContactoPaciente = document.getElementById('contEmer');
var TelContacto = document.getElementById('NoTelEnc');
var Relacion = document.getElementById('Relacion');
var EstadoCivil = $("input[name='estadoCivil']:checked");
var Etnia = $("input[name='etnia']:checked");         
var AutoNotificada = document.getElementById('Anotificada');
if(CodigoFich.value== "" ) {
CodigoFich.style.border = "1px solid orange";
}
else{
  CodigoFich.style.border = "";  
}
if(Prnombre.value== "" ) {
Prnombre.style.border = "1px solid orange";
}
else{
  Prnombre.style.border = "";  
}
if(Senombre.value ==""){
Senombre.style.border = "1px solid orange";
}
else{
  Senombre.style.border = "";  
}
if(Prapellido.value ==""){
Prapellido.style.border = "1px solid orange";
}
else{
  Prapellido.style.border = "";  
}
if(Seapellido.value ==""){
Seapellido.style.border = "1px solid orange";
}
else{
  Seapellido.style.border = "";  
}
if(ApellidoCasada.value ==""){
ApellidoCasada.style.border = "1px solid orange";
}
else{
  ApellidoCasada.style.border = "";  
}
if(FechNac.value ==""){
FechNac.style.border = "1px solid orange";
}
else{
  FechNac.style.border = "";  
}
if(Ocupac.value ==""){
Ocupac.style.border = "1px solid orange";
}
else{
  Ocupac.style.border = "";  
}
if(dpi.value ==""){
dpi.style.border = "1px solid orange";
}
else{
  dpi.style.border = "";  
}
if(Ntelefono.value ==""){
Ntelefono.style.border = "1px solid orange";
}
else{
  Ntelefono.style.border = "";  
}
if(Direccion.value ==""){
Direccion.style.border = "1px solid orange";
}
else{
  Direccion.style.border = "";  
}
if(ContactoPaciente.value ==""){
ContactoPaciente.style.border = "1px solid orange";
}
else{
  ContactoPaciente.style.border = "";  
}
if(TelContacto.value ==""){
TelContacto.style.border = "1px solid orange";
}
else{
  TelContacto.style.border = "";  
}
if(Relacion.value ==""){
Relacion.style.border = "1px solid orange";
}
else{
  Relacion.style.border = "";  
}
if(AutoNotificada.value ==""){
AutoNotificada.style.border = "1px solid orange";
}
else{
  AutoNotificada.style.border = "";  
}

}

function validaTriage() {      
       var Mllegada = $("input[name='Mllegada']:checked").val(); 
       var AmbulanciaNota = document.getElementById('AmbulanciaNota');
       var MedicamentosAllegada = document.getElementById('MedicamentosAllegada');
       var IantesLLegada = document.getElementById('IantesLLegada');
       var NotasTriaje = document.getElementById('NotaTriage');
       var OtraInfo = document.getElementById('OtraInfo');
  if(AmbulanciaNota.value== "" ) {
AmbulanciaNota.style.border = "1px solid orange";
}
else{
  AmbulanciaNota.style.border = "";  
}     
if(MedicamentosAllegada.value== "" ) {
MedicamentosAllegada.style.border = "1px solid orange";
}
else{
  MedicamentosAllegada.style.border = "";  
}  
if(IantesLLegada.value== "" ) {
IantesLLegada.style.border = "1px solid orange";
}
else{
  IantesLLegada.style.border = "";  
}
if(OtraInfo.value== "" ) {
OtraInfo.style.border = "1px solid orange";
}
else{
  OtraInfo.style.border = "";  
}
if(NotasTriaje.value== "" ) {
NotasTriaje.style.border = "1px solid orange";
}
else{
  NotasTriaje.style.border = "";  
}
}

function imprSelec(nombre) {
    var ficha = document.getElementById(nombre);
    var ventimp = window.open('','_blank');
    ventimp.document.write( ficha.innerHTML );
    ventimp.document.close();
    ventimp.print( );
    //ventimp.close();
  }
function validaEvaluacion() {
                var HoraContactoMedico = document.getElementById('HoraContactoMedico');
                var MedicoAcargo = document.getElementById('MedicoAcargo');
                var Residente = document.getElementById('Eps');
                var Interno = document.getElementById('Interno');
                var Estudiante = document.getElementById('Externo');
                var Otro = document.getElementById('Otro');
                var MotConsulta = document.getElementById('MotConsulta');
                var HistoriaEnfActual = document.getElementById('HistoriaEnfActual');
                var HistoriaMedica = document.getElementById('HistoriaMedica');
                var HistoriaQuirurgica = document.getElementById('HistoriaQuirurgica');
                var HistoriaFamilia = document.getElementById('HistoriaFamilia');
                var HistoriaSocial = document.getElementById('HistoriaSocial');
                var HistoriaMedicaciones = document.getElementById('HistoriaMedicaciones');
                var HistoriaAlergias = document.getElementById('HistoriaAlergias'); 
if(HoraContactoMedico.value== "" ) {
HoraContactoMedico.style.border = "1px solid orange";
}
else{
  HoraContactoMedico.style.border = "";  
}
if(MedicoAcargo.value== "" ) {
MedicoAcargo.style.border = "1px solid orange";
}
else{
  MedicoAcargo.style.border = "";  
}
if(Residente.value== "" ) {
Residente.style.border = "1px solid orange";
}
else{
  Residente.style.border = "";  
}
if(Interno.value== "" ) {
Interno.style.border = "1px solid orange";
}
else{
  Interno.style.border = "";  
}
if(Estudiante.value== "" ) {
Estudiante.style.border = "1px solid orange";
}
else{
  Estudiante.style.border = "";  
}
if(Otro.value== "" ) {
Otro.style.border = "1px solid orange";
}
else{
  Otro.style.border = "";  
}
if(MotConsulta.value== "" ) {
MotConsulta.style.border = "1px solid orange";
}
else{
  MotConsulta.style.border = "";
}
if(HistoriaEnfActual.value== "" ) {
HistoriaEnfActual.style.border = "1px solid orange";
}
else{
  HistoriaEnfActual.style.border = "";
}
if(HistoriaMedica.value== "" ) {
HistoriaMedica.style.border = "1px solid orange";
}
else{
  HistoriaMedica.style.border = "";
}
if(HistoriaQuirurgica.value== "" ) {
HistoriaQuirurgica.style.border = "1px solid orange";
}
else{
  HistoriaQuirurgica.style.border = "";
}
if(HistoriaFamilia.value== "" ) {
HistoriaFamilia.style.border = "1px solid orange";
}
else{
  HistoriaFamilia.style.border = "";
}
if(HistoriaSocial.value== "" ) {
HistoriaSocial.style.border = "1px solid orange";
}
else{
  HistoriaSocial.style.border = "";
}
if(HistoriaMedicaciones.value== "" ) {
HistoriaMedicaciones.style.border = "1px solid orange";
}
else{
  HistoriaMedicaciones.style.border = "";
}
if(HistoriaAlergias.value== "" ) {
HistoriaAlergias.style.border = "1px solid orange";
}
else{
  HistoriaAlergias.style.border = "";
}
}

function EnviaRecord(){   
   
   var OPraValidate =  document.getElementById('OpePracticade').value;
   var PrimerApe = document.getElementById('PrApellido').value;
   var PrimerNombre = document.getElementById('PNombre').value;
   if((OPraValidate=="") && (PrimerApe=="") && (PrimerNombre="")){
alert("ingresa: primer nombre, primer apellido u operacion practicada");
   }
   else{
                var NoPaciente = document.getElementById('NoPaciente').value;
                var DiagPreOpe = document.getElementById('DiagPreOpe').value;
                var OpePlaneada = document.getElementById('OpePlaneada').value;
                var DiagPostOPe = document.getElementById('DiagPostOPe').value;
                //var OpePracticade = document.getElementById('OpePracticade').value;
                var CirujanOp = document.getElementById('CirujanOp').value;
                var ayudante = document.getElementById('ayudante').value;
                var AnestOp = document.getElementById('AnestOp').value;
                var Anestesia = document.getElementById('Anestesia').value;
                var Instrumen = document.getElementById('Instrumen').value;
                var Circulant = document.getElementById('Circulant').value;
                var FechaOpe = document.getElementById('FechaOpe').value;
                var HoraIniciOpe = document.getElementById('HoraIniciOpe').value;
                var HoraFinOpe = document.getElementById('HoraFinOpe').value;
                var ReCompresas = document.getElementById('ReCompresas').value;
                var Drenajes = document.getElementById('Drenajes').value;
                var PiezasEvaPat = document.getElementById('PiezasEvaPat').value;
                var DescOperacion = document.getElementById('DescOperacion').value;
                var DepaOp = document.getElementById('DepaOp').value;
                var ServiUniOp = document.getElementById('ServiUniOp').value;
                var CamaCunaOp = document.getElementById('CamaCunaOp').value;
                var MedJefe = document.getElementById('MedJefe').value;
                $.ajax({
                    type:'POST',
                    url:'../php/enviaRecOpe.php',
                    data:  $("#formRecOpera").serialize()+'&NoPaciente='+NoPaciente,
                    success:function(respuesta){
                        if (respuesta!=""){
                            $('#mensajeREcOperatorio').html('Record operatorio registrado con exito');
                        }
                        else{
                            $('#mensajeREcOperatorio').html('No se ha podido registrar record operatorio'+respuesta);
                        }
                    }
                })
                document.getElementById('EnviaRecOperatorio').style.display = 'none';
                document.getElementById('ImprimeRec').style.display='block';
                }
            }
    function NuevoCirujano(){    
                var NombreCompleto = document.getElementById('NomCirujano').value;            
                var Telefono = document.getElementById('TelCirujano').value;
                var Direccion = document.getElementById('DireCirujano').value;
                var Especialidad = document.getElementById('EspeCirujano').value;            
                            
                
                $.ajax({
                    type:'POST',
                    url:'../php/enviaCirujano.php',
                   data:('NombreCompleto='+NombreCompleto+'&Telefono='+Telefono+'&Direccion='+Direccion+'&Especialidad='+Especialidad),
                    success:function(respuesta){
                        if (respuesta!=""){
                            $('#mensajeCirujano').html('Datos ingresados con éxito');
                        }
                        else{
                            $('#mensajeCirujano').html('Error');
                        }
                    }

                })
            }


    function OpePracticadaPaciente(idInptOpePra){
                var NoPaciente = document.getElementById('NoPaciente').value;                
                var DescOpePracticada = document.getElementById(idInptOpePra).value;                   
                $.ajax({
                    type:'POST',
                    url:'../php/enviaOpePractiaca.php',
                   data:('NoPaciente='+NoPaciente+'&DescOpePracticada='+DescOpePracticada),
                    success:function(respuesta){
                        if (respuesta!=""){
                            swal("Listo..!","","success")
                        }
                        else{
                            swal("Error..!","","error");
                        }
                    }

                })
            }
