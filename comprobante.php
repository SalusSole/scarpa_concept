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
    <link href="https://fonts.googleapis.com/css?family=Poppins|Yellowtail&display=swap" rel="stylesheet">  
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">   
</head>
<body>
<?php
include "nav.php";
?> 
        <center>
        <div class="container3">
            <div  class="div-form">
                <center><a class="font3">Sube aquí tu comprobante de pago</a></center><br><br>
                <form enctype="multipart/form-data" action="subir.php" method="POST">
                
                    <img src="img/up.png" width="120px" height="120px"><br>
                    <input name="ParaSubir" type="file" placeholder="" class="btn3" required>
                    <br>
                    
                    <input type="submit" value="Subir archivo" class="btn3 submit" >
                    
               </form>
            </div>
        </div>
       </center>
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
    var b = document.getElementById("comprobante"); 
    b.setAttribute("class", "active");
</script>
</body>
</html>
