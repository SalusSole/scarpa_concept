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
    
<?php
include "nav.php";
?> 
<br><br><center>
<div class="container_chat_r">
<section id="borde">
<header>
<a class="nombre_chat">Replica</a>
</header>
<?php
if(isset($_SESSION["user_id"])){
if ($_GET){
$nombrepregunta=$_GET['nombrepregunta'];
$xml = new DOMDocument();
$xml->load('foro.xml');
$nodoslista=$xml->getElementsBYTagName("usuario");
for($i=0;$i<$nodoslista->length; $i++){
	$lista=$nodoslista->item($i)->childNodes;
	for($j=0;$j<$lista->length;$j++){
		if (((string) $lista->item($j)->nodeName)=='nombre' && ((string) $lista->item($j)->nodeValue)==$nombrepregunta) {
			echo '<form name="formulario" method="POST" action="replica.php">';
            $atributo=$lista->item(1)->nodeValue;
            
            
            echo '<center><span id="respondiendo">Respondiendo a:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><input type="text" class="caja_f" name="nombre" value="'.$atributo.'" readonly="readonly" /><br><br></center>';
            $atributo=$lista->item(2)->nodeValue;
            echo '<center><span id="respondiendo">Comentó:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span id="respondiendo">'.$atributo.'<span/><br><br></center>';
            echo '<center><span id="respondiendo">Responder:</span>
                  <input type="text" class="cajasCo" name="respuesta" required/></center>';
            echo '<center><a href="zapatos.php" class="btn2" id="Regresar">Regresar</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="enviar" class="btn3" value="Responder" id="enviar"><br><br></center>';
            
            
			break 2;
			echo '</form>';
            
		}
	}
}
}
/*_________________________________________CONEXIÓN A BD_____________________________________________________*/         
            $conexion = mysqli_connect("localhost", "scarpapos", "1c999b218") or die ("Fallo en la conexión");
          //  $conexion = mysqli_connect("localhost", "root", "") or die("Fallo en la conexión");
            #Seleccionamos la base de datos a utilizar
            mysqli_select_db($conexion, "scarpapos") or die("Fallo en la selección de la BD");
            $Resultado=mysqli_query($conexion, "SELECT * FROM `user` WHERE `id`='".$usuario."';");
             while ($row = mysqli_fetch_array($Resultado)) {

                $name= $row['fullname'];
             }
             mysqli_close($conexion);
/*__________________________________________________________________________________________________________*/       
 if(isset($_POST['enviar'])){
                //Recibimos los valores de los objetos y los asignamos a variables de PHP
                $nombre= $_POST['nombre'];
                $responder= $_POST['respuesta'];
                $xml = new DOMDocument();
                $xml->load('foro.xml');
                $nodoslista=$xml->getElementsBYTagName("usuario");
                $modificar=null;
                for($i=0;$i<$nodoslista->length; $i++){
                $lista=$nodoslista->item($i)->childNodes;
                for($j=0;$j<$lista->length;$j++){
                if (((string) $lista->item($j)->nodeName)=='nombre' && ((string) $lista->item($j)->nodeValue)==$nombre){
                
                $lista->item(4)->nodeValue=$responder;
                $lista->item(5)->nodeValue=$name;

                $modificar=1;
                break 2;

            }//aqui termina el if de busqueda
        }
    }//aqui termina el for de busqueda
    if ($modificar!==null) {
        $xml->save('foro.xml');
       echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=zapatos.php">';
    }

    }
}
?>
</section>
    </section>
    </div></center>
</body>
</html>