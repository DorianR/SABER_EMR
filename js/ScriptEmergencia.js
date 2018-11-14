
$(document).ready(function(){
    $("input[name=mLLegada]").click(function(){
        var NoP = document.getElementById('NoPaciente').value;
        var ModLLegada =   $('input:radio[name=mLLegada]:checked').val();
        var TablaInfP = Table();
        if(NoP=="") {
            swal("No se ha registrado informacion basica del paciente ..!","","error")
        }
        else{
            $.ajax({
                type:'POST',
                url:'../php/OperacionesV3EME.php',
                data:('&NoPaciente='+NoP+'&MLLeg='+ModLLegada+'&opc=modoLL'+'&NomTabla='+TablaInfP),
                success:function(respuesta){
                    if (respuesta != ""){
                        $('#DvLlegoEn').css("border", "");
                    }
                    else{
                        alert("err");
                    }
                }
            });
        }
    });
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


    $("input[name=ConciP]").click(function(){
        var NoP = document.getElementById('NoPaciente').value;
        var ConcienteSN =   $('input:radio[name=ConciP]:checked').val();
        var ServPa = document.getElementById('SrCio').value;
        if(NoP=="") {
            swal("No se ha registrado informacion basica del paciente ..!","","error")
        }
        else{
            $.ajax({
                type:'POST',
                url:'../php/OperacionesV3EME.php',
                data:('&NoPaciente='+NoP+'&Conci='+ConcienteSN+'&ServiP='+ServPa+'&opc=Pconciente'),
                success:function(respuesta){
                    if (respuesta != ""){
                        $('#DvConciente').css("border", "");
                    }
                    else{
                        alert("err");
                    }
                }
            });
        }
    });
    $("input[name=CasoUrg]").click(function(){
        var NoP = document.getElementById('NoPaciente').value;
        var CasoUrgente =   $('input:radio[name=CasoUrg]:checked').val();
        var ServPa = document.getElementById('SrCio').value;
        if(NoP=="") {
            swal("No se ha registrado informacion basica del paciente ..!","","error")
        }
        else{
            $.ajax({
                type:'POST',
                url:'../php/OperacionesV3EME.php',
                data:('&NoPaciente='+NoP+'&Curgente='+CasoUrgente+'&ServiP='+ServPa+'&opc=CasoUrg'),
                success:function(respuesta){
                    if (respuesta != ""){
                        $('#DvCasoUrg').css("border", "");
                    }
                    else{
                        alert("err");
                    }
                }
            });
        }
    });
    $("input[name=QuedoHos]").click(function(){
        var NoP = document.getElementById('NoPaciente').value;
        var QuedoHospi =   $('input:radio[name=QuedoHos]:checked').val();
        var ServPa = document.getElementById('SrCio').value;
        if(NoP=="") {
            swal("No se ha registrado informacion basica del paciente ..!","","error")
        }
        else{
            $.ajax({
                type:'POST',
                url:'../php/OperacionesV3EME.php',
                data:('&NoPaciente='+NoP+'&QuedoHospiP='+QuedoHospi+'&ServiP='+ServPa+'&opc=Hospitalizado'),
                success:function(respuesta){
                    if (respuesta != ""){
                        $('#DvHospitalizado').css("border","");
                    }
                    else{
                        alert("err");
                    }

                }
            });
        }
    });

    $("select[name=Servi]").click(function(){
        var NoP = document.getElementById('NoPaciente').value;
        var ServicioUnidad= document.getElementById('Servi').value;
        var ServPa = document.getElementById('SrCio').value;
        if(NoP=="") {
            swal("No se ha registrado informacion basica del paciente ..!","","error")
        }
        else{
            $.ajax({
                type:'POST',
                url:'../php/OperacionesV3EME.php',
                data:('&NoPaciente='+NoP+'&ServUniPaciente='+ServicioUnidad+'&ServiP='+ServPa+'&opc=SericioPaciente'),
                success:function(respuesta){
                    if (respuesta != ""){
                        alert("ok "+NoP+" "+ModLLegada);
                    }
                    else{
                        alert("err");
                    }
                }
            });
        }
    });
    $("#opcionesEM").click(function(){
        $("#modalOpci").modal("show");
    });
    /* $('#Npaciente').click(function() {
         // Recargo la página
         location.reload();
         $("html,body").animate({ scrollTop : $("#inicioP").offset().top  }, 1500 );
     });*/
    /* $("#Npaciente").on("click", function(){
        // $("html,body").animate({ scrollTop : $("#destino").offset().top  }, 1500 );
         location.reload();
     });*/



    $( function() {
        $( document ).tooltip();
    } );

    $('#PrApe').blur(function(){
        if ($(this).val() === '') {
            $(this).css("border", "1px solid red");
        }
        else{
            $(this).css("border","");
        }
    });
    $('#SeApe').blur(function(){
        if ($(this).val() === '') {
            $(this).css("border", "1px solid red");
        }
        else{
            $(this).css("border","");
        }
    });
    $('#DeCas').blur(function(){
        if ($(this).val() === '') {
            $(this).css("border", "1px solid red");
        }
        else{
            $(this).css("border","");
        }
    });
    $('#PrNom').blur(function(){
        if ($(this).val() === '') {
            $(this).css("border", "1px solid red");
        }
        else{
            $(this).css("border","");
        }
    });
    $('#SeNom').blur(function(){
        if ($(this).val() === '') {
            $(this).css("border", "1px solid red");
        }
        else{
            $(this).css("border","");
        }
    });
    $('#ExpMedico').blur(function(){
        if ($(this).val() === '') {
            $(this).css("border", "1px solid red");
        }
        else{
            $(this).css("border","");
        }
    });
    $('#Sex').blur(function(){
        if ($(this).val() === 'NoSelect') {
            $(this).css("border", "1px solid red");
        }
        else{
            $(this).css("border","");
        }
    });
    $('#Eda').blur(function(){
        if ($(this).val() === '') {
            $(this).css("border", "1px solid red");
        }
        else{
            $(this).css("border","");
        }
    });
    $('#EstCiv').blur(function(){
        if ($(this).val() === '6') {
            $(this).css("border", "1px solid red");
        }
        else{
            $(this).css("border","");
        }
    });
    $('#OcuP').blur(function(){
        if ($(this).val() === '') {
            $(this).css("border", "1px solid red");
        }
        else{
            $(this).css("border","");
        }
    });
    $('#PagIg').blur(function(){
        if ($(this).val() === '') {
            $(this).css("border", "1px solid red");
        }
        else{
            $(this).css("border","");
        }
    })
    $('#ProcedeDire').blur(function(){
        if ($(this).val() === '') {
            $(this).css("border", "1px solid red");
        }
        else{
            $(this).css("border","");
        }
    });
    $('#Tel').blur(function(){
        if ($(this).val() === '') {
            $(this).css("border", "1px solid red");
        }
        else{
            $(this).css("border","");
        }
    });
    $('#contactPaciente').blur(function(){
        if ($(this).val() === '') {
            $(this).css("border", "1px solid red");
        }
        else{
            $(this).css("border","");
        }
    });
    $('#MIngres').blur(function(){
        if ($(this).val() === '') {
            $(this).css("border", "1px solid red");
        }
        else{
            $(this).css("border","");
        }
    });
    $('#FeHoIngreso').blur(function(){
        if ($(this).val() === '') {
            $(this).css("border", "1px solid red");
        }
        else{
            $(this).css("border","");
        }
    });
    $('#AntRCU').blur(function(){
        if ($(this).val() === '') {
            $(this).css("border", "1px solid red");
        }
        else{
            $(this).css("border","");
        }
    });
    $('#PresAr').blur(function(){
        if ($(this).val() === '') {
            $(this).css("border", "1px solid red");
        }
        else{
            $(this).css("border","");
        }
    });
    $('#tempe').blur(function(){
        if ($(this).val() === '') {
            $(this).css("border", "1px solid red");
        }
        else{
            $(this).css("border","");
        }
    });
    $('#po').blur(function(){
        if ($(this).val() === '') {
            $(this).css("border", "1px solid red");
        }
        else{
            $(this).css("border","");
        }
    });
    $('#talla').blur(function(){
        if ($(this).val() === '') {
            $(this).css("border", "1px solid red");
        }
        else{
            $(this).css("border","");
        }
    });
    $('#peso').blur(function(){
        if ($(this).val() === '') {
            $(this).css("border", "1px solid red");
        }
        else{
            $(this).css("border","");
        }
    });
    $('#NotExF').blur(function(){
        if ($(this).val() === '') {
            $(this).css("border", "1px solid red");
        }
        else{
            $(this).css("border","");
        }
    });
    $('#ImpC1').blur(function(){
        if ($(this).val() === '') {
            $(this).css("border", "1px solid red");
            $('#suggestionsImC').fadeOut(300);
        }
        else{
            $(this).css("border","");
        }
    });
    $('#ImpC2').blur(function(){
        if ($(this).val() === '') {
            $(this).css("border", "1px solid red");
            $('#suggestionsImC2').fadeOut(300);
        }
        else{
            $(this).css("border","");
        }
    });
    $('#ImpC3').blur(function(){
        if ($(this).val() === '') {
            $(this).css("border", "1px solid red");
            $('#suggestionsImC3').fadeOut(300);
        }
        else{
            $(this).css("border","");
        }
    });
    $('#ImpC4').blur(function(){
        if ($(this).val() === '') {
            $(this).css("border", "1px solid red");
            $('#suggestionsImC4').fadeOut(300);
        }
        else{
            $(this).css("border","");
        }
    });


    $('#NCasoUrg').blur(function(){
        if ($(this).val() === '') {
            $(this).css("border", "1px solid red");
        }
        else{
            $(this).css("border","");
        }
    });
    $('#CasoUrg').blur(function(){
        if ($(this).val() === '') {
            $(this).css("border", "1px solid red");
        }
        else{
            $(this).css("border","");
        }
    });
    $('#NomMedG').blur(function(){
        if ($(this).val() === '') {
            $(this).css("border", "1px solid red");
        }
        else{
            $(this).css("border","");
        }
    });
    $('#NomInter').blur(function(){
        if ($(this).val() === '') {
            $(this).css("border", "1px solid red");
        }
        else{
            $(this).css("border","");
        }
    });
    $('#feEg').blur(function(){
        if ($(this).val() === '') {
            $(this).css("border", "1px solid red");
        }
        else{
            $(this).css("border","");
        }
    });
    $('#QuedoHos').blur(function(){
        if ($(this).val() === '') {
            $(this).css("border", "1px solid red");
        }
        else{
            $(this).css("border","");
        }
    });
    $('#Servi').blur(function(){
        if ($(this).val() === '1') {
            $(this).css("border", "1px solid red");
        }
        else{
            $(this).css("border","");
        }
    });

    $('#FechaNE').blur(function(){
        if ($(this).val() === '') {
            $(this).css("border", "1px solid red");
        }
        else{
            $(this).css("border","");
        }
    });
    $('#numNE').blur(function(){
        if ($(this).val() === '') {
            $(this).css("border", "1px solid red");
        }
        else{
            $(this).css("border","");
        }
    });
    $('#OdenesNE').blur(function(){
        if ($(this).val() === '') {
            $(this).css("border", "1px solid red");
        }
        else{
            $(this).css("border","");
        }
    });
    $('#EvolucionNE').blur(function(){
        if ($(this).val() === '') {
            $(this).css("border", "1px solid red");
        }
        else{
            $(this).css("border","");
        }
    });
    $("#ImpC1").autocomplete({
        source: "../php/searchImpc1.php",
        minLength: 1
    });
    $("#ImpC2").autocomplete({
        source: "../php/searchImpc1.php",
        minLength: 1
    });
    $("#ImpC3").autocomplete({
        source: "../php/searchImpc1.php",
        minLength: 1
    });
    $("#ImpC4").autocomplete({
        source: "../php/searchImpc1.php",
        minLength: 1
    });
    $("#OcuP").autocomplete({
        source: "../php/searchOcupacion.php",
        minLength: 1
    });
    $("#ProcedeDire").autocomplete({
        source: "../php/searchDireccion.php",
        minLength: 1
    });

    $("#MIngres").autocomplete({
        source: "../php/searchMotIngreso.php",
        minLength: 1
    });

    $("#MIngres").autocomplete({
        source: "../php/searchMotIngreso.php",
        minLength: 1
    });

    /*$("#Turn").click(function() {
            //var Trn =   $('input:radio[name=Turn]:checked').val();
            if ($(this).val() === '2') {
                $('#Ntenfermeria').css({'color':'green'});
            }

        });*/
    $("input[name=Turn]").click(function(){
        //var NoP = document.getElementById('NoPaciente').value;
        var valorRadio =   $('input:radio[name=Turn]:checked').val();
        if(valorRadio=="1") {
            $('#Ntenfermeria').css({'color':'blue'});
            $('#NombreEnf').css({'color':'blue'});
        }
        else if(valorRadio=="2") {
            $('#Ntenfermeria').css({'color':'green'});
            $('#NombreEnf').css({'color':'green'});
        }
        else if(valorRadio=="3") {
            $('#Ntenfermeria').css({'color':'red'});
            $('#NombreEnf').css({'color':'red'});
        }
    });
    $("input[name=Turn2]").click(function(){
        //var NoP = document.getElementById('NoPaciente').value;
        var valorRadio =   $('input:radio[name=Turn2]:checked').val();
        if(valorRadio=="1") {
            $('#Ntenfermeria2').css({'color':'blue'});
            $('#NombreEnf2').css({'color':'blue'});
        }
        else if(valorRadio=="2") {
            $('#Ntenfermeria2').css({'color':'green'});
            $('#NombreEnf2').css({'color':'green'});
        }
        else if(valorRadio=="3") {
            $('#Ntenfermeria2').css({'color':'red'});
            $('#NombreEnf2').css({'color':'red'});
        }
    });
    $("input[name=Turn3]").click(function(){
        //var NoP = document.getElementById('NoPaciente').value;
        var valorRadio =   $('input:radio[name=Turn3]:checked').val();
        if(valorRadio=="1") {
            $('#Ntenfermeria3').css({'color':'blue'});
            $('#NombreEnf3').css({'color':'blue'});
        }
        else if(valorRadio=="2") {
            $('#Ntenfermeria3').css({'color':'green'});
            $('#NombreEnf3').css({'color':'green'});
        }
        else if(valorRadio=="3") {
            $('#Ntenfermeria3').css({'color':'red'});
            $('#NombreEnf3').css({'color':'red'});
        }
    });

    var colorEtiqueta ='1px solid skyblue';
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
    $('#PresAr').css("border",colorEtiqueta);
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


});