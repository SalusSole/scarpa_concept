<?php
include 'php/conexion.php';

if($_FILES){
    $id_prod = $_POST['id'];
    $nombre = $_FILES['foto']['name'];
    $guardado = $_FILES['foto']['tmp_name'];

    if(file_exists('img')){
        if(move_uploaded_file($guardado, 'img/'.$nombre)){
            
            echo $id_prod;
            $sql = "UPDATE productos SET imagen_p='$nombre' WHERE id_producto='$id_prod'";
            $con->query($sql);

            echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=editar_stock.php">';

        }else{
            
        }
    }
}

?>