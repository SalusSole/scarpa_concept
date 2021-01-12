<?php session_start(); ?>
<html>
<head>
	<title>Formulario de Registro</title>
	<link rel="stylesheet" type="text/css" href="css/forms.css">
</head>
<body>
<?php include 'nav.php' ?>

<div class="login-content">
<br><br>
  	<h2>&bull; LOG IN &bull;</h2>
	<form action="php/login.php" method="post">
		<div class="form-data">
			<label for="username">Nombre de usuario o email</label>
			<input type="text" class="form-control" id="username" name="username" placeholder="Nombre de usuario">
			<label for="password">Contrase&ntilde;a</label>
			<input type="password" class="form-control" id="password" name="password" placeholder="Contrase&ntilde;a">
			<center><button type="submit" class="btn3">Acceder</button></center>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</div>
	</form>
</div>

<script src="js/valida_login.js"></script>
<script>
    var b = document.getElementById("login"); 
    b.setAttribute("class", "active");
</script>
	</body>
</html>