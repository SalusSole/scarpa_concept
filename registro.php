<?php session_start(); ?>
<html>
<head>
	<title>Formulario de Registro</title>
	<link rel="stylesheet" type="text/css" href="css/forms.css">
</head>
<body>
<?php include 'nav.php' ?>
<br><br>
<h2>&bull; REGISTRO &bull;</h2>
<form action="php/registro.php" method="post">
	<div class="form-data">
		<label for="username">Nombre de usuario</label>
		<input type="text" class="form-control" id="username" name="username" placeholder="Nombre de usuario">
		<label for="fullname">Nombre Completo</label>
		<input type="text" class="form-control" id="fullname" name="fullname" placeholder="Nombre Completo">
		<label for="email">Correo Electronico</label>
		<input type="email" class="form-control" id="email" name="email" placeholder="Correo Electronico">
		<label for="password">Contrase&ntilde;a</label>
		<input type="password" class="form-control" id="password" name="password" placeholder="Contrase&ntilde;a">
		<label for="confirm_password">Confirmar Contrase&ntilde;a</label><br>
		<input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirmar Contrase&ntilde;a">
        <center>
        <input type="checkbox" id="cbox2" value="second_checkbox" required><a href=terms/Terminos.pdf class="font">&nbsp;&nbsp;Al registrarse en este sitio web, acepta nuestra Política de privacidad y Condiciones del servicio </a></center><br>

<center><button type="submit" class="btn btn-default">Registrar</button></center>
	</div>
</form>
		
<script>
    var b = document.getElementById("registro"); 
    b.setAttribute("class", "active");
</script>
<script src="js/valida_registro.js"></script>
</body>
</html>