<?php
session_start();
$usuario=$_SESSION["user_id"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Su pago esta siendo procesado</title>
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
    <div class="compra pago-proceso">
        <h3>Su pago esta siendo procesado, por favor realice el pago del recibo que se le proporcionó por la platafoma. En caso de que ya lo haya pagado, suba la ficha en la sección de comprovante para que su pedido pueda ser completado.</h3>
        <br><br>
        <a class="btn3" href="carrito.php">Volver al carrito</a>
    </div>
</body>
</html>