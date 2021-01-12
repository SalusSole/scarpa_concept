<?php
session_start();
$usuario=$_SESSION["user_id"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formulario de envío</title>
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
    $envios = simplexml_load_file("envios.xml");
    // foreach($envios as $pedido){
    //     if($pedido->{'user_id'}==$_SESSION["user_id"]){
            
    //         echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=pago_procesado.php">';
            
    //    }else{
            echo '
    <div class="envio-form">
        <div class="container1">
            <div class="envio-titulo">
               <center>
                   <span>Agregar un</span><br><span>Domicilio</span>
               </center>
            </div>
        </div>
        <div class="container2">
            <div  class="div-form">
                <form action="datos_envio.php" method="post">
                    <label class="label-envio" for="">Código postal</label>
                    <br>
                    <input type="text"name="cp" class="input-envio" placeholder="" required>
                    <br>
                    <label class="label-envio" for="">Estado</label>
                    <br>
                    <input type="text"name="estado" class="input-envio" placeholder="" required>
                    <br>
                    <label class="label-envio" for="">Delegación / Municipio</label>
                    <br>
                    <input type="text"name="municipio" class="input-envio" placeholder="" required>
                    <br> 
                    <label class="label-envio" for="">Colonia</label>
                    <br> 
                    <input type="text"name="colonia" class="input-envio" placeholder="" required>
                    <br>
                    <label class="label-envio" for="">Calle</label>
                    <br>
                    <input type="text"name="calle" class="input-envio" placeholder="" required>
                    <br>
                    <label class="label-envio" for="">Telefono</label>
                    <br>
                    <input type="number"name="telefono" class="input-envio" pattern="[0-9]{10}" placeholder="" required>
                    <br>
                    <label class="label-envio" for="">N° exterior</label>
                    <br>
                    <input type="text"name="exterior" class="input-envio" placeholder="" required>
                    <br>
                    <label class="label-envio" for="">N° interior (opcional)</label>
                    <br>
                    <input type="text"name="interior" class="input-envio" placeholder="">
                    <br>

                    <!--label del precio-->
                    <!--<input hidden type="text"name="precio" value="<?php echo $_GET["precio"]?>">-->
                    <a href="carrito.php" class="btn2" >Volver</a>
                    <input type="submit" class="btn3 submit" value="Continuar">
               </form>
            </div>
           
        </div>
    </div>
    <br><br>';
    //     }
    // }

    ?>
    
</body>
</html>