<?php
 session_start();
 $usuario=$_SESSION["user_id"];
 include 'php/conexion.php';
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
    <link href="https://fonts.googleapis.com/css?family=Poppins|Yellowtail&display=swap" rel="stylesheet">  
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">   -->
</head>
<body>
<?php
include "nav.php";
?> 
<div class="container">
    <center>
    <div class="container4">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">N° pedido</th>
                    <th scope="col">Estado de pedido</th>
                    <th scope="col">Archivo</th>
                </tr>
            </thead>
            <tbody>
    <?php
 /*____________________________________Mostrar fichas pagadas:_____________________________________________*/     
         
                        echo '<br><a class="font3" >Fichas pagadas:</a><br>';
                        echo '<img src="img/seguro.png" width="120px" height="120px"><br>';
                        $directorio = opendir("./Subidas"); //Ruta actual
                        // while($archivo = readdir($directorio)) //Obtenemos un archivo y luego otro sucesivamente
                        // {
                            // if(!is_dir($archivo)){ //Verificamos si es o no un directorio
                                $sql = "select * from pago";
                                $result = mysqli_query ($con, $sql);
                                while ($datos=mysqli_fetch_array($result)){
                                    $id_pedido = $datos['id_pedido'];
                                    $status = $datos['status'];
                                    $id_pago = $datos['id'];
                                    $name_archivo = $datos['ruta_factura'];
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $id_pago ?>
                                        </td>
                                        <td>
                                            <a class="fontT" href="editar_status.php?id_pago=<?php echo $id_pago ?>"><?php echo $status ?></a>
                                        </td>
                                        <td>
                                            <?php echo '<a class="fontT" href=./Subidas/'.$name_archivo.'.pdf>'.$name_archivo.'.pdf</a><br><br><br />'; ?>
                                        </td>
                                    </tr>
                                <?php
                                }
                            
                            
                                
                            
                            // }else{
                            // }
                        // }
                    
        
/*___________________________________________________________________________________________________________*/      
        
    
    ?>
                </tbody>
            </table>
    </div>
        <a href="panel.php" class="btn3" id="Regresar">Regresar</a><br><br><br><br>
    </center>
</div>
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
    var b = document.getElementById("fichas"); 
    b.setAttribute("class", "active");
</script>
</body>
</html>