$(function(){
  $('#subida').submit(function(){    
    var comprobar = $('#foto').val().length * $('#desc').val().length;    
    if(comprobar>0){      
      var formulario = $('#subida');
      var NoPaciente = document.getElementById('NoPaciente').value;
      var datos = formulario.serialize();
      var archivos = new FormData();        
      var url = '../php/subir_foto.php';      
        for (var i = 0; i < (formulario.find('input[type=file]').length); i++) {         
                 archivos.append((formulario.find('input[type="file"]:eq('+i+')').attr("name")),((formulario.find('input[type="file"]:eq('+i+')')[0]).files[0]));
              }
        $.ajax({        
        url: url+'?'+datos+('&NoPaciente='+NoPaciente),        
        type: 'POST',        
        contentType: false,         
              data: archivos,        
                processData:false,        
        beforeSend : function (){          
          $('#cargando').show(300);         
        },
        success: function(data){          
          $('#cargando').hide(300);          
          $('#fotos').append(data);          
          $('#subida')[0].reset();          
          return false;
        }        
      });      
      return false;      
    }else{     
      return false;      
    }
  });
});