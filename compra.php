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

				
                <br><a class="font6">Finalizar compra </a>
        
    <div class="compra">   
				<a class="font5">Subtotal: </a><br><br>
                <a class="font5">Total de la compra: </a><br><br>
                <a class="font5">Entrega: Gratis </a><br><br>
       
                <a class="font5">Cambios Gratis</a><br><br>
                <a class="font">¿No es tu talla, no te gustó? </a><br>
                <a class="font">No hay problema, realiza la devolución de forma gratuita dentro de un plazo de 90 días después de la fecha de compra. Podrás realizar cambios en nuestras tiendas propias (No Outlets).</a><br><br><br>

       
       
       
                <a class="font">Debido a la proliferación del virus COVID-19 y los esfuerzos para mantener seguras nuestra comunidad, los tiempos de entrega durante la contingencia, se extenderán de 6 a 8 días a  nuestros tiempos regulares de envío. </a>
                <a class="font"><u>El plazo para CAMBIOS y DEVOLUCIONES se extiende a 90 días. </u></a>
    </div>                 
   
    <footer>
        <ul>
        <div>
        <td><li><a title="Sobre nosotros" href="#"><span class="footer">About</span></a></li></td>
        <td><li><a title="Contacto" href="#"><span class="footer">Contact</span></a></li></td>
        <td><li><a title="social" href="https://www.instagram.com/scarpa_concept/"><span class="footer">Instagram</span></a></li></td>
        </div>
        </ul>
    </footer>
</body>
</html>