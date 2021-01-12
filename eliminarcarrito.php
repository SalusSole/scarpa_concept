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
   				<br><br><center><a class="btn3" > E L I M I N A R &nbsp; D E L &nbsp; C A R R I T O </a></center><br><br>
       

    <?php 

        if(isset($_SESSION["user_id"])){

           # if ($_GET){
           # $nombreproducto=$_GET['nombre'];
                if ($_POST) {
                $confirmacion= $_POST['Confirmacion'];
                
                if ($confirmacion=="No") {
                echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=carrito.php">';
                }else{
                    $id_prod=$_POST['id'];
                    //Leer el JSON
                    $data = file_get_contents('pedidos.json');
                    $data_array = json_decode($data, true);

                    
                    foreach ($data_array as $key => $value) {
                        // echo $id_prod;
                        if ($value['id'] == $id_prod) {
                            $data_array[$key]['status'] = 1;
                            // echo "éxito";
                            break;
                        }else{
                            //echo "nada";
                            break;
                        }
                    }

                    file_put_contents('pedidos.json', json_encode($data_array));

                    echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=carrito.php"';
                }       
            }else{//Aquí llega el if

              if ($_GET){
                $id_prod=$_GET['id'];

                $archivo=file_get_contents("pedidos.json");
                $clientes=json_decode($archivo);    
                //un dato del json
                $contador=0;
                foreach ($clientes as $cliente) {
                    if($cliente->{'id'}==$id_prod){

                        $nombre = $cliente->{'nombre'};
                        break;
                    }
                }

                echo '<div class="compra">
                        <center>
                        <form name="formulario" method="POST" action="eliminarcarrito.php">
                                    <p> 
                                       <label class="font2">¿Desea eliminar el elemento</label>  
                                       <span class="font2" id="eliminar"></span><input type="text" name="nombre" class="fontB" style="text-align:center;" value="'.$nombre.'" readonly="readonly" />
                                       <label class="font2"> del carrito de compras?</label>  <br><br>
                                    </p>  
                                    <p> 

                                        <input type="radio" name="Confirmacion" value="Si" ><label class="font2">&nbsp;&nbsp;SI&nbsp;&nbsp;</label> 
                                        <input type="radio" class="font2" name="Confirmacion" value="No" checked><label class="font2">&nbsp;&nbsp;NO&nbsp;&nbsp;</label><br><br><br>
                                        <input type="text" name="id" value="'.$id_prod.'" hidden>
                                        <input type="submit" name="confirma" value="Confirmar"  class="btn6" id="enviar"><br><br>
                                    </p>

                        </form>
                       <a href="carrito.php" class="btn">Volver sin guardar</a> <center><br><br>
                     </div>';
                }

            }
        }else{
            echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=productos.php"';
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