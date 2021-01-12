<?php 
session_start();
include 'php/conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Productos</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <link rel="stylesheet" type="text/css" href="css/barra.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins|Yellowtail&display=swap" rel="stylesheet">  
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
</head>
<body>
<?php 
include 'nav.php';
if($_POST){
    $nombre = strtoupper($_POST['nombre']);
    $precio = $_POST['precio'];
    $existencias = $_POST['existencias'];
    $tipo = $_POST['tipo'];
    $sql = "INSERT INTO productos (nombre_p, precio_p, existencia, tipo) VALUES ('$nombre', '$precio', '$existencias', '$tipo')";
    if (mysqli_query($con, $sql)) {
        $id_producto = mysqli_insert_id($con);
        echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=agregar_imagen.php?id=$id_producto'>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}else{
?>
<div class="envio-form">
    <div class="container1">
        <div class="envio-titulo">
        <center>
            <span>Agregar</span><br><span>Producto</span>
        </center>
        </div>
    </div>
    <div class="container2">
        <div  class="div-form">
            <form action="agregar_prod.php" method="post">
                <label class="label-envio" for="">Nombre de producto</label>
                <br>
                <input type="text" name="nombre" class="input-envio" placeholder="" required>
                <br>
                <label class="label-envio" for="">Precio</label>
                <br>
                <input type="number" name="precio" class="input-envio" placeholder="" required>
                <br>
                <label class="label-envio" for="">Existencias</label>
                <br>
                <input type="text" name="existencias" class="input-envio" placeholder="" required>
                <br>
                <label class="label-envio" for="">Tipo</label>
                <br>
                <select name="tipo" id="" class="select-envio" required>
                    <option value="bota">
                        Bota
                    </option>
                    <option value="zapato">
                        Zapato
                    </option>
                </select>
                <br>
                <input type="submit" class="btn3 submit" value="Agregar">
            </form>
        </div>
    </div>
    <?php 
}
?>
</div>
</body>
</html>