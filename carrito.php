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
   				<br><br><center><a class="btn" > C A R R I T O &nbsp;&nbsp; D E&nbsp;&nbsp;C O M P R A S  </a></center><br><br>
       
					<?php
                      #<span class="mensajebienvenidacarrito"> Hola '.$_SESSION["user_id"].' esto es lo que has guardado en tu carrito: </span>
                    echo '
                    <div class="compra">
                     <center>

                     <table>
                     <tr>  
                            <th>
                                Modelo
                            </th> 
                            <th>
                                 Talla
                            </th>
                            <th>
                                Color
                            </th>
                            <th>
                                Precio unitario
                            </th>
                            <th>
                                Cantidad
                            </th>
                            <th>
                                SubTotal
                            </th>
                            <th>
                                Modificar cantidad
                            </th>
                            <th>
                                Eliminar
                            </th>
                    </tr>';
                
                    //Leer el JSON
                    $archivo=file_get_contents("pedidos.json");
                    $clientes=json_decode($archivo);    
                    //un dato del json
                    $preciopagototal=0;
                    $contador=0;
                    foreach ($clientes as $cliente) {
                        while($cliente->{'user_id'}==$_SESSION["user_id"]){
                            if($cliente->{'status'}==0){
                                echo "<tr>";

                                echo '<td>'.$cliente->{'nombre'}.'</td>';
                                echo '<td>'.$cliente->{'talla'}.'</td>';
                                echo '<td>'.$cliente->{'color'}.'</td>';
                                echo '<td>$'.$cliente->{'precio'}.'</td>';
                                echo '<td>'.$cliente->{'cantidad'}.'</td>';
                                echo '<td>$'.$cliente->{'subTotal'}.'</td>';
                                
                            
                            
                                echo'<td><a href="modificarcarrito.php?id='.$cliente->{'id'}.'"><img class="imgmini" src="img/i.png"></a></td>';
                                echo'<td><a href="eliminarcarrito.php?id='.$cliente->{'id'}.'"><img src="img/eliminar.png"></a></td>';
                            
                                echo "<tr>";
                                $preciopagototal=$preciopagototal+$cliente->{'subTotal'};
                                break;
                            }else{
                                break;
                            }
                        }
                        $contador++;
                    }
                   
    
                    echo'
                        <table> </table> 
                        </center>  ';
                    echo'
                                <a class="font5">Total de la compra: $'.$preciopagototal.'&nbsp;$MXN</a><br><br>
                                <a class="font5">Entrega: Gratis </a><br><br>

                                <a class="font5">Cambios Gratis</a><br><br>';
                                
                                echo "<center><a href=envio.php class='btn3'>Comprar ahora</a></center>
                                <br><br>";
                                echo "<center><a href=comprobante.php class='btn3'>Subir comprobante de pago</a></center>
                                <br><br>";
                                echo '
                                <a class="font">¿No es tu talla, no te gustó? </a><br>
                                <a class="font">No hay problema, realiza la devolución de forma gratuita dentro de un plazo de 90 días después de la fecha de compra. Podrás realizar cambios en nuestras tiendas propias (No Outlets).</a><br><br><br>


                                <a class="font">Debido a la proliferación del virus COVID-19 y los esfuerzos para mantener seguras nuestra comunidad, los tiempos de entrega durante la contingencia, se extenderán de 6 a 8 días a  nuestros tiempos regulares de envío. </a>
                                <a class="font"><u>El plazo para CAMBIOS y DEVOLUCIONES se extiende a 90 días. </u></a>
                    </div>   ';
    
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
<script>
    var b = document.getElementById("carrito"); 
    b.setAttribute("class", "active");
</script>
</body>
</html>
