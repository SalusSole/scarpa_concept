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
   				<br><br><center><a class="btn" > A G R E G A R  </a></center><br><br>
       
					<?php
                    #Conectamos con MySQL
                    if (isset($_GET['id'])) {
                        $id=$_GET['id'];
                        
                        $conexion = mysqli_connect("localhost", "u850652173_scarpaposAdmin", "scarpaposAdminPassword07") or die ("Fallo en la conexión");
                        // $conexion = mysqli_connect("localhost", "root", "") or die("Fallo en la conexión");
                        #Seleccionamos la base de datos a utilizar
                        mysqli_select_db($conexion, "u850652173_scarpapos") or die("Fallo en la selección de la BD");
                        $Resultado=mysqli_query($conexion, "SELECT * FROM `productos` WHERE `id_producto`='".$id."';");
                       
                        while ($row = mysqli_fetch_array($Resultado)) {
                            $existencias = $row['existencia'];
                            $exist_for_v = $existencias - 5;
                            echo '<img src="img/'.$row['imagen_p'].'" class="img" >';
                            echo '<aside>';
                            echo '<form action="acumular.php" method="post" class="form1" name="AgregarCarrito"><br><br><br>';
                            echo '<input class="font2" type="text" name="producto" value="'.$row['nombre_p'].'" readonly="readonly"><br><br><br>';
                            echo '$<input type="text" class="font2" name="precio" size="3" value="'.$row['precio_p'].'" readonly="readonly">MXN<br><br><br>';
                            echo '<label class="font">C A N T I D A D:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                            ';
                            echo "<input type='number' class='font2' name='cantidad' size='2' max='$exist_for_v' min='1' value='1'><br><br><br>";
                            echo '<label for="talla" class="font">S E L E C C I O N A &nbsp; T U  &nbsp;  T A L L A:</label>
                                         <select name="talla" class="font2">
                                            <option value="25">25</option>
                                            <option value="25.5">25.5</option>
                                            <option value="26">26</option>
                                            <option value="26.5">26.5</option>
                                            <option value="27">27</option>
                                            <option value="27.5">27.5</option>
                                            <option value="28">28</option>
                                            <option value="28.5">28.5</option>
                                            <option value="29">29</option>
                                         </select><br><br><br>';

                            echo '<label for="color" class="font">S E L E C C I O N A &nbsp;&nbsp;C O L O R:</label>&nbsp
                                         <select name="color"  class="font2">

                                            <option value="Negro">Negro</option>
                                            <option value="Camel">Camel</option>
                                            <option value="Vino">Vino</option>
                                         </select><br><br><br>';
                            echo '<input name="Agregar" type="submit" id="btnagregar" class="btn6" value="A g r e g a r"><br><br><br>';
                            #echo ' <input type="button" name="Agregar" class="btn4"  value="Agregar">';
                            # echo ' <a class="btn2" href="https://vinkula.com">Soy un botón</a>';
                            #echo '<input name="Agregar" class="btn4" type="submit"  value="Agregar"><br><br><br>';
                            # echo '<a class="btn3" name="Agregar" type="submit"  value="Agregar"> A G R E G A R  </a>';
                            echo '</aside>';
                            echo '</form>';
                           
                        }
                        mysqli_close($conexion);
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
