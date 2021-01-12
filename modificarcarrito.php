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
   				<br><br><center><a class="btn" > M O D I F I C A R </a></center><br><br>
       
			<?php 

            if(isset($_SESSION["user_id"])){

                if ($_GET){
                $id=$_GET['id'];
                echo'<div class="compra">';

                 echo '<center><h1 class="font5" >Por favor seleccione la cantidad de unidades que desea modificar de este Producto<h1><center>';
                 echo '<form name="formulario" method="POST" action="modificarcantidad.php">
                       <br>
                       <input class="fontC" type="text" name="id" value="'.$id.'" readonly="readonly">
                       <input type="number"   class="fontC"  name="cantidad" size="2" max="10" min="1" value="1">
                        <br>
                        <input type="submit" class="btn3" name="enviar" value="Modificar" id="enviarcarrito">
                       </form> 
                 ';
                 echo '<a href="carrito.php"  class="font5">Volver sin guardar</a>';
                     echo'</div>';
                }else{


                  echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=carrito.php"';

                }
            }else{
                echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=zapatos.php"';
            }
    
            ?>

	
    
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