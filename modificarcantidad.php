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
   				<br><br><center><a class="btn3" > M O D I F I C A R </a></center><br><br>
       
					
               <?php 

                if(isset($_SESSION["user_id"])){

                    if (isset($_POST['enviar'])){
                    $id_prod=$_POST['id'];
                    $nuevacantidad=$_POST['cantidad'];

                     //Leer el JSON
                        $archivo=file_get_contents("pedidos.json");
                        $clientes=json_decode($archivo);    
                        //un dato del json
                        foreach ($clientes as $cliente) {
                        if($cliente->{'id'}==$id_prod){

                                echo $cliente->{'nombre'};
                                echo $precio = $cliente->{'precio'};
                                echo $cliente->{'cantidad'};
                                echo $cliente->{'talla'};
                                echo $cliente->{'color'};
                                echo $cliente->{'subTotal'};
                                $nuevo_precio = $precio*$nuevacantidad;
                                break;
                         }
                         }
                         $identificador = $id_prod-1;
                         $clientes=json_decode($archivo,true);
                         $clientes[$identificador]['cantidad']=$nuevacantidad;
                         $clientes[$identificador]['subTotal']=$nuevo_precio;
                         $json_string=json_encode($clientes);

                         $file='pedidos.json';
                         file_put_contents($file, $json_string);

                        echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=carrito.php"'; 

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