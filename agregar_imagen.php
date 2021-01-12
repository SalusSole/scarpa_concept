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
    $id_prod = $_GET['id'];
?>
<div class="envio-form">
            <div class="container1">
                <div class="envio-titulo">
                <center>
                    <span>Agregar</span><br><span>Imagen</span>
                </center>
                </div>
            </div>
            <div class="container2">
                <div  class="div-form">
                    <form action="add_photo.php" method="post" enctype="multipart/form-data">
                        <label class="label-envio" for="">Nombre de producto</label>
                        <br>
                        <input type="file" name="foto" required>
                        <br>
                        <input type="text" name="id" value="<?php echo $id_prod ?>" hidden>
                        <input type="submit" class="btn3 submit" value="Subir foto">
                </form>
            </div>
        </div>
</body>
</html>