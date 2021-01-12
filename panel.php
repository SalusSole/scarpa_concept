<?php
session_start();
$usuario=$_SESSION["user_id"];
$id=0;
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Zapatos - Moda Masculina</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <link rel="stylesheet" type="text/css" href="css/barra.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Poppins|Yellowtail&display=swap" rel="stylesheet">  
    <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Special+Elite&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">   
</head>
<body>
<?php
include "nav.php";
?> 
   				<br><br><br><br><center><a class="btn" > P A N E L &nbsp; D E &nbsp;C O N T R O L  </a></center><br><br><br><br>
       
				<center><a href=reporte_productos.php class='btn8'><img class="imgmini" src="img/report.png">&nbsp;&nbsp;Ver reporte de productos</a></center><br><br>
                <center><a href=editar_stock.php class='btn8'><img class="imgmini" src="img/engrane.png">&nbsp;&nbsp;Control de STOCK</a></center><br><br>
                <center><a href=fichas.php class='btn8'><img class="imgmini" src="img/correcto.png">&nbsp;&nbsp;Fichas pagadas</a></center><br><br>
                <br>
    <footer>
        <ul>
        <div>
        <td><li><a title="Sobre nosotros" href="#"><span class="footer">About</span></a></li></td>
        <td><li><a title="Contacto" href="#"><span class="footer">Contact</span></a></li></td>
        <td><li><a title="social" href="https://www.instagram.com/scarpa_concept/"><span class="footer">Instagram</span></a></li></td>
        </div>
        </ul>
    </footer>
<script>
    var b = document.getElementById("panel"); 
    b.setAttribute("class", "active");
</script>
</body>
</html>