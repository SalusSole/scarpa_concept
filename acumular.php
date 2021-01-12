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
   				<br><br><center><a class="btn3" > A G R E G A R  </a></center><br><br>
       
					<?php
                    #Conectamos con MySQL
                    if($_POST){
                        #$usuario=$_SESSION["user_id"];
                        
                        $nombre=$_POST['producto'];
                        $precio=$_POST['precio'];
                        $cantidad=$_POST['cantidad'];
                        
                        $talla=$_POST['talla'];
                        $color=$_POST['color'];
                        
                        $subTotal=$precio*$cantidad;
                        
                        $preciopagototal=0;
                        $contador=0;
                        
                        #$fechaHora=Date("F_j_Y");
                        #session_start();
                        $usuario=$_SESSION["user_id"];
                        
                        $pedido=array();
                        #$ruta=$usuario."_pedido.json";
                        $ruta="pedidos.json";
                        
                        if(file_exists($ruta)){
                            #Leer el archivo JSON
                            $archivo=file_get_contents($ruta);
                            $pedido=json_decode($archivo,true);

                            $id = count($pedido);
                            
                            $pedido[] = array(
                                'id'=>$id+1,
                                'user_id'=>$usuario,
                                'nombre'=>$nombre, 
                                'precio'=>$precio, 
                                'cantidad'=>$cantidad, 
                                'talla'=>$talla, 
                                'color'=>$color, 
                                'subTotal'=>$subTotal, 
                                'preciototal'=>$preciopagototal,
                                'status'=>0
                            );
                            #Creamos la cadena JSON
                            $json_string = json_encode($pedido);
                            echo $json_string;
                            #Guardar los datos en el archivo JSON
                            $file = $ruta;
                            file_put_contents($file, $json_string);
                            echo'<META HTTP-EQUIV="REFRESH" CONTENT="0; URL=carrito.php">';
                        }else{
                            $id = count($archivo);
                            $pedido[]=array(
                                'id'=>$id+1,
                                'user_id'=>$usuario,
                                'nombre'=>$nombre, 
                                'precio'=>$precio, 
                                'cantidad'=>$cantidad, 
                                'talla'=>$talla, 
                                'color'=>$color, 
                                'subTotal'=>$subTotal, 
                                'preciototal'=>$preciopagototal,
                                'status'=>0
                            );
                            #Creamos la cadena JSON
                            $json_string = json_encode($pedido);
                            echo $json_string;
                            #Guardar los datos en el archivo JSON
                            $file = $ruta;
                            file_put_contents($file, $json_string);
                            echo'<META HTTP-EQUIV="REFRESH" CONTENT="0; URL=carrito.php">';
                        }
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
