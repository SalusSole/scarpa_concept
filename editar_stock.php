<?php
session_start();
include 'php/conexion.php';
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
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">    -->
</head>
<body>
<?php
include "nav.php";
if($_POST){
    
    $id_producto = $_POST['id_producto'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];

    $sql = "UPDATE productos SET existencia='$cantidad', precio_p='$precio' WHERE id_producto='$id_producto'";
    $con->query($sql);
    
    ?>
    <center>
    <div class="container4">
        <br>
        <br>
        <br>
        <span class="">
            El cambio se realizó con éxito.
        </span>
        <br><br><br>
        <a href="editar_stock.php" class="btn3">Volver</a>
        <br><br><br>
    </div>
    </center>
    <?php

}else if($_GET){
    $id_producto = $_GET['id'];
    $sql = "select * from productos";
    $result = mysqli_query ($con, $sql);
    while ($datos=mysqli_fetch_array($result)){
        if($id_producto == $datos['id_producto']){
            $nombre = $datos['nombre_p'];
            ?>
            <center>
                <br><br><br>
                <h4><?php echo $nombre ?></h4>
            </center>
                
        <div class="envio-form">
            <div class="container1">
                <div class="envio-titulo">
                <center>
                    <span>Editar</span><br><span>Producto</span>
                </center>
                </div>
            </div>
            <div class="container2">
                <div  class="div-form">
                    <form action="editar_stock.php" method="post">
                        <label class="label-envio" for="">Cantidad</label>
                        <br>
                        <input type="number" name="cantidad" class="input-envio" placeholder="" required>
                        <br>
                        <label class="label-envio" for="">Precio</label>
                        <br>
                        <input type="number" name="precio" class="input-envio" placeholder="" required>
                        <input type="text" name="id_producto" value="<?php echo $id_producto ?>" hidden>
                        <br>
                        <input type="submit" class="btn3 submit" value="Continuar">
                        <a href="eliminar_prod.php?id=<?php echo $id_producto ?>" class="btn4">Eliminar</a>
                        
                </form>
            </div>
        </div>
            <?php
            
        }
    }
}else{
?> 
<br>
<br>
<center>
<div class="container4">
    <br>
    <table>
        <tr>
            <th>
                ID producto
            </th>
            <th>
                Nombre
            </th>
            <th>
                Tipo
            </th>
            <th>
                Precio
            </th>
            <th>
                Cantidad
            </th>
            <th>
                Editar
            </th>
        </tr>
        <?php
        $sql = "select * from productos";
        $result = mysqli_query ($con, $sql);
        while ($datos=mysqli_fetch_array($result)){
            $id = $datos['id_producto'];
            $nombre = $datos['nombre_p'];
            $precio = $datos['precio_p'];
            $tipo = $datos['tipo'];
            $cantidad = $datos['existencia'];
            ?>
            <tr>
                <td>
                    <?php echo $id ?>
                </td>
                <td>
                    <?php echo $nombre ?>
                </td>
                <td>
                    <?php echo $tipo ?>
                </td>
                <td>
                    $<?php echo $precio ?>
                </td>
                <td>
                    <?php echo $cantidad ?>
                </td>
                <td>
                    <a href="editar_stock.php?id=<?php echo $id ?>"><img class="imgmini" src="img/i.png" alt="Editar"></a>
                </td>
            </tr>
            <?php
        }
    
        ?>

    </table>
    <br>
</div>
<a href="agregar_prod.php" class="btn3">Agregar producto</a>
<a href="panel.php" class="btn2" id="Regresar">Regresar</a>
</center>
<?php
}
?>
<script>
    var b = document.getElementById("editar_stock"); 
    b.setAttribute("class", "active");
</script>
</body>
</html>