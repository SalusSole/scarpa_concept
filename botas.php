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
    
  <script type="text/javascript">
 
function checkifempty()
    {
        if (!document.form1.condicion.checked)
      {
        document.form1.registrarse.disabled=true;
      }
        else
      {     
        document.form1.registrarse.disabled=false;
      }

    }
</script>
    
</head>
<body>

<script type="text/javascript">
 
function checkifempty()
    {
        if (!document.form1.condicion.checked)
      {
        document.form1.registrarse.disabled=true;
      }
        else
      {     
        document.form1.registrarse.disabled=false;
      }

    }
</script>
    
<?php
include "nav.php";
?> 
   				<br><br><center><a class="btn3" > B O T A S </a></center><br><br>
                
				<table id="tabla">
					<?php
                    #Conectamos con MySQL
                 //  $conexion = mysqli_connect("localhost", "root", "") or die ("Fallo en la conexión");
                     $conexion = mysqli_connect("localhost", "u850652173_scarpaposAdmin", "scarpaposAdminPassword07") or die ("Fallo en la conexión");
                    
                    #Seleccionamos la base de datos a utilizar
                    mysqli_select_db($conexion, "u850652173_scarpapos") or die ("Fallo en la selección de la BD");
                    $Resultado=mysqli_query($conexion, "SELECT * FROM `productos` WHERE `existencia`>5;");
                    #echo '<tr class="fontT"><th>Nombre</th><th>Precio</th><th>Imagen de muestra</th></tr>';
                    
                    while($row = mysqli_fetch_array($Resultado)){
                        if($row['tipo']=="bota"){
                            echo '<tr class="fontT"><td><img src="img/'.$row['imagen_p'].'" class="ImagenesP"></td>';
                            echo '<td>'.$row['nombre_p'].'</td>';
                            echo '<td>$'.$row['precio_p'].' MXN</td>';
                            #echo '<td>$'.$row['talla_p'].' MXN</td>';
                            #echo '<td>$'.$row['color_p'].' MXN</td>';
                           # echo '<td><input type="submit" name="enviar" href="agregar.php?id='.$row['id_producto'].'"></td><tr>';
                            #echo '<td><a  class="btn2" href="agregar.php?id='.$row['id_producto'].'">A ñ a d i r&nbsp;&nbsp; a l&nbsp;&nbsp;c a r r i t o</a> </td><tr>';

                            #echo '<td><a href="agregar.php?id='.$row['id_producto'].'" onclick="return theFunction();">Item</a></td><tr>';

                            echo '<td><a class="btn2" href="agregar.php?id='.$row['id_producto'].'" onclick="checkifempty()">A ñ a d i r&nbsp;&nbsp; a l&nbsp;&nbsp;c a r r i t o</a></td><tr>';
                            #echo'<a href="#" onclick="deshabilitar(this)">Dame click</a>';
                            #echo '<td><a href=agregar.php?id='.$row['id_producto'].'"><img src="img/carr.png" class="ImagenC"></a> </td><tr>';
                        }
                    }
                    mysqli_close($conexion);
                    ?> 
				</table>
  
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
    var b = document.getElementById("botas"); 
    b.setAttribute("class", "active");
</script>
</body>
</html>
