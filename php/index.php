<!DOCTYPE html>
<html>
<head>
	<title>Enviar y asignar datos con ajax</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/jquery-1.12.3.min.js"></script>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
	<div class="container">
		<h1>Tutorial - Envío de datos con Ajax</h1>
		<hr />

		<div class="formulario">
			<form method="post" action="controlador/envia.php">
				<label>Nombre:</label><br/>
				<input type="text" name="nombre" id="nombre" size="40%"><br/>
				<label>Pregunta:</label><br/>
				<textarea name="pregunta" id="pregunta" rows="5" cols="32"></textarea><br/>
				<input type="button" value="Realizar pregunta" onclick="javascript:EnviarDatos();"><br/>
			</form>
			<div id="mensaje">Escribe una pregunta</div>
		</div>
		<script type="text/javascript">
			function EnviarDatos(){
				var nombre = document.getElementById('nombre').value;
				var pregunta = document.getElementById('pregunta').value;

				$.ajax({
					type:'POST',
					url:'controlador/envia.php',
					data:('nombre='+nombre+'&pregunta='+pregunta),
					success:function(respuesta){
						if (respuesta==1){
							$('#mensaje').html('Tu mensaje se ha enviado correctamente');
							document.getElementById('nombre').value="";
							document.getElementById('pregunta').value="";
						}
						else{
							$('#mensaje').html('Tu mensaje no se ha podido enviar, inténtalo de nuevo...');
						}
					}

				})
			}
		</script>
	</div>
</body>
</html>