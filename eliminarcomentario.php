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
<br><br><br><br><br> 
<center>
<div class="container_chat">
<header>
<a class="nombre_chat">Eliminar comentario</a>
</header>
	<?php
    
/*_________________________________________CONEXIÓN A BD_____________________________________________________*/         
            $conexion = mysqli_connect("localhost", "scarpapos", "1c999b218") or die ("Fallo en la conexión");
         //   $conexion = mysqli_connect("localhost", "root", "") or die("Fallo en la conexión");
            #Seleccionamos la base de datos a utilizar
            mysqli_select_db($conexion, "scarpapos") or die("Fallo en la selección de la BD");
            $Resultado=mysqli_query($conexion, "SELECT * FROM `user` WHERE `id`='".$usuario."';");
             while ($row = mysqli_fetch_array($Resultado)) {

                $nombre = $row['username'];
             }
             mysqli_close($conexion);
/*__________________________________________________________________________________________________________*/    
	if ($_POST) {
		$id= $_POST['id'];
        $confirmacion= $_POST['Confirmacion'];
        
		if ($confirmacion=="No") {
			echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=zapatos.php">';
		}else{

$xml = new DOMDocument();
$xml->load('foro.xml');
$nodoslista=$xml->getElementsBYTagName("usuario");
$remover=null;
for($i=0;$i<$nodoslista->length; $i++){
	$lista=$nodoslista->item($i)->childNodes;
	for($j=0;$j<$lista->length;$j++){
		if (((string) $lista->item($j)->nodeName)=='nombre' && ((string) $lista->item($j)->nodeValue)==$id) {
			
			$remover=$nodoslista->item($i);
			break 2;
			
			
		}
	}
}
if ($remover!==null) {
	$remover->parentNode->removeChild($remover);
	$xml->save('foro.xml');
	echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=zapatos.php">';
}
}
	}else{
if(isset($_SESSION["user_id"])){
if ($_GET){
$nombrepregunta=$_GET['nombrepregunta'];
if ($nombre==$nombrepregunta) {
	echo '
          <form name="formulario" method="POST" action="eliminarcomentario.php">
            
            <p> 
                <br><center>¿<input type="text" name="id" class="caja_f"  value="'.$nombrepregunta.'", readonly="readonly" /><span id="eliminar">deseas eliminar el comenario?</span><br><br>
                <input type="radio" name="Confirmacion" value="Si" checked class="radio"><label>SI</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                <input type="radio" name="Confirmacion" value="No" class="radio"><label>NO</label><br><br></center>
                <center><input type="submit" class="btn3" name="confirma" value="Eliminar" id="enviar">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                <a href="zapatos.php" class="btn2" id="Regresar">Regresar</a></center>
               
               
            </p>
           
           </form>
           </div> </center>';
}else{
	echo '<center><h1 id="noautor">No eres autor de este comentario</h1></center>';
	 echo '<META HTTP-EQUIV="REFRESH" CONTENT="3;URL=zapatos.php">';
}

}
}
}
?>
</body>
</html>