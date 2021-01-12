<?php
include 'php/conexion.php';
if($_GET){
    $id = $_GET['id'];
    $sql = "DELETE FROM productos WHERE id_producto='$id'";

    if ($con->query($sql) === TRUE) {
        echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=editar_stock.php">';
    }else{
        echo ":(";
    }
        
}

?>