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
   				<br><br><center><a class="btn3" > Z A P A T O S </a></center><br><br>
                
				<table id="tabla">
					<?php
                    #Conectamos con MySQL
                 // $conexion = mysqli_connect("localhost", "root", "") or die ("Fallo en la conexión");
                   $conexion = mysqli_connect("localhost", "scarpapos", "1c999b218") or die ("Fallo en la conexión");
                    
                    #Seleccionamos la base de datos a utilizar
                    mysqli_select_db($conexion, "scarpapos") or die ("Fallo en la selección de la BD");
                    $Resultado=mysqli_query($conexion, "SELECT * FROM `productos` WHERE `existencia`>5;");
                    #echo '<tr class="fontT"><th>Nombre</th><th>Precio</th><th>Imagen de muestra</th></tr>';
                    
                    while($row = mysqli_fetch_array($Resultado)){
                        if($row['tipo']=="zapato"){
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
                
 <!--________________________________________________________________________________________________________________________--> 

    <br><br><div class="container_chat_p"><br>
        <table style="width: 100%">
            <!--#¿Dudas? Escríbelas aquí mismo-->
        <center><a>&nbsp;&nbsp;&nbsp;DUDAS O COMENTARIOS</a></center>
        <?php 
            
/*_________________________________________CONEXIÓN A BD_____________________________________________________*/         
           $conexion = mysqli_connect("localhost", "scarpapos", "1c999b218") or die ("Fallo en la conexión");
          //  $conexion = mysqli_connect("localhost", "root", "") or die("Fallo en la conexión");
            #Seleccionamos la base de datos a utilizar
            mysqli_select_db($conexion, "scarpapos") or die("Fallo en la selección de la BD");
            $Resultado=mysqli_query($conexion, "SELECT * FROM `user` WHERE `id`='".$usuario."';");
             while ($row = mysqli_fetch_array($Resultado)) {

                 $nombre = $row['username'];
             }
             mysqli_close($conexion);
/*__________________________________________________________________________________________________________*/                         
            if(isset($_POST['enviar'])){//Recibimos los valores de los objetos y los asignamos a variables de PHP
                
                 $comentario=$_POST['comentario'];
                 $respuesta=" ";
                 $nombre_respuesta=" ";
                 date_default_timezone_set("America/Mexico_City");
                
                 $fecha=Date("Y-m-d H:i:s");
                 $bandera=0; 
                
                 $x=0;
                 $xml = new DOMDocument();
                 $xml->load('foro.xml');
                 $nodoslista=$xml->getElementsBYTagName("usuario");
                 for($i=0;$i<$nodoslista->length; $i++){
                 $lista=$nodoslista->item($i)->childNodes;
                 for($j=0;$j<$lista->length;$j++){
                 if (((string) $lista->item($j)->nodeName)=='id' && ((string) $lista->item($j)->nodeValue)==$usuario) {

            //echo '<h1 class="subTitulosR">ID NO DISPONIBLE</h1> <br>';
            //$x=1;
            print "<script>alert(\"Para escribir otro comentario, asegúrate de borrar el anterior\");window.location='zapatos.php';</script>";         
            
            //$bandera=1;
            $x=1;
                     
            break 2;
              }
             }
            }
            if ($x==0) {
                //Comenzamos a escribir en el xml
                $doc = new domDocument("1.0", "utf-8");
                $doc -> formatOutput = true;
                $doc -> load("foro.xml");
                
                    //Asignamos la instancia "raiz" - USUARIOS
                    $raiz = $doc -> getElementsByTagName("usuarios") -> item(0);
                    //Creamos una instancia "rama" - USUARIO
                    $rama = $doc -> createElement('usuario');
                            
                            //Creamos una instancia "hoja" - NOMBRE
                            $hoja = $doc -> createElement('id');
                            //Creamos el text de la instancia "NOMBRE"
                            $hoja -> appendChild($doc -> createTextNode($_SESSION["user_id"]));
                            //Guardar la instancia "HOJA" dentro de la instancia "RAMA"
                            $rama -> appendChild($hoja);
                
                            //Creamos una instancia "hoja" - NOMBRE
                            $hoja = $doc -> createElement('nombre');
                            //Creamos el text de la instancia "NOMBRE"
                            $hoja -> appendChild($doc -> createTextNode($nombre));
                            //Guardar la instancia "HOJA" dentro de la instancia "RAMA"
                            $rama -> appendChild($hoja);
                
                            //Creamos una instancia "hoja" - COMENTARIO
                            $hoja = $doc -> createElement('comentario');
                            //Creamos el text de la instancia "COMENTARIO"
                            $hoja -> appendChild($doc -> createTextNode($comentario));
                            //Guardar la instancia "HOJA" dentro de la instancia "RAMA"
                            $rama -> appendChild($hoja);
                
                            //Creamos una instancia "hoja" - FECHA
                            $hoja = $doc -> createElement('fecha');
                            //Creamos el text de la instancia "FECHA"
                            $hoja -> appendChild($doc -> createTextNode($fecha));
                            //Guardar la instancia "HOJA" dentro de la instancia "RAMA"
                            $rama -> appendChild($hoja);
                

                            $hoja = $doc -> createElement('respuesta');
                            //Creamos el text de la instancia "RESPUESTA"
                            $hoja -> appendChild($doc -> createTextNode($respuesta));
                            //Guardar la instancia "HOJA" dentro de la instancia "RAMA"
                            $rama -> appendChild($hoja);

                            $hoja = $doc -> createElement('nombre_respuesta');
                            //Creamos el text de la instancia "AUTORESPUESTA"
                            $hoja -> appendChild($doc -> createTextNode($nombre_respuesta));
                            //Guardar la instancia "HOJA" dentro de la instancia "RAMA"
                            $rama -> appendChild($hoja);
                            //Guardar la instancia "RAMA" dentro de la instancia "RAIZ"
                
                
                
                    //Guardar la instancia "RAMA" dentro de la instancia "RAIZ"
                    $raiz -> appendChild($rama);
                    //Guardar la instancia "RAIZ" dentro de la instancia "DOCUMENTO"
                    $doc -> appendChild($raiz);
                    //Escribir los cambios en el archivo
                    $doc -> save("foro.xml");
            }
        }
    ?>
    <?php  
    if (!$usuarios = simplexml_load_file('foro.xml')) {
        echo "Error";
    }else{
        foreach ($usuarios as $usuario) {
           
            echo '
                 <div class="container_chat">
                 <a class="nombre_chat" ><img src="img/persona.png" class="img_c" alt="descripción de la foto">&nbsp;&nbsp;&nbsp;&nbsp;'.$usuario->nombre.'</a>
                 
                 
                 <a class="fecha_chat">'.$usuario->fecha.'</a>
            
                 <br><br>Comentó: '.$usuario->comentario.'
                 
                 <br><br>
                 <a class="links_chat1" href="replica.php?nombrepregunta='.$usuario->nombre.'" id="editar">Responder</a>
                 <a class="links_chat" href="eliminarcomentario.php?nombrepregunta='.$usuario->nombre.'" id="eliminar">Borrar</a>
                ';

            
            echo '<br>
                 <div class="container_chat_r">
                 <a class="replica_chat">Respondió: '.$usuario->nombre_respuesta.'</a><br>
                 <a class="replica_chat">Comentario: '.$usuario->respuesta.'</a></div>
                 <a class="separador_chat">____________________________________________________________________________________________________________________</a></div>';
            //echo "<th>".$usuario->comentario."</td>";
            
        }
    }
    ?>      
     </table>
    </div>
    
    <div class="container_chat_a">
    <center>
       <a>&nbsp;&nbsp;&nbsp;Agregar un comentario</a><br><br>
        
       <form id="form1"  name="form1" method="post" action="zapatos.php">
<!-----Nombre-----><p><label for="comentario" class="subTitulos">Comentario:&nbsp;&nbsp;&nbsp;</label><label class="subTitulosR"></label>
                   <input autofocus type="text" name="comentario" &nbsp;&nbsp&nbsp;&nbspid="comentario" class="cajasC"/></p>
<!--Botón enviar--><p><input type="submit" name="enviar" id="enviar" value="Agregar" class="btn6"></p>
       </form>
    </center>
    </div>
  <!--________________________________________________________________________________________________________________________-->       
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
    var b = document.getElementById("zapatos"); 
    b.setAttribute("class", "active");
</script>
</body>
</html>
