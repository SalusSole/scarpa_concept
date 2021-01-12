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
if($_GET){
?> 
    <center>
    <div class="container4">
        <br>
        <br>
        <span class="">
            El usuario ha subido el recibo de pago, verifíquelo para confirmar que el usuario ha realizado el pago y realice la confirmación.
            <br>
            Posteriormente señale que el pedido ha sido entregado una vez sea así.
        </span>
        <br>
            <form action="editar_status.php" method="post">
                <select name="estado" class="select-css">
                    <option value="pagado">
                        Pagado
                    </option>
                    <option value="entregado">
                        Entregado
                    </option>
                </select>
                <input type="text" name="id_pago" value="<?php echo $_GET['id_pago'] ?>" hidden>
                <input type="submit" value="Realizado" class="btn3">
            </form>
        <br><br><br>
    </div>
    </center>

<?php 
}else if($_POST){

   

    $pago = $_POST['estado'];
    $id_pago = $_POST['id_pago'];
    $sql = "UPDATE pago SET status='$pago' WHERE id='$id_pago'";
    $con->query($sql);

    if($pago=='pagado'){
        $archivo=file_get_contents("pedidos.json");
        $clientes=json_decode($archivo);
        
        foreach ($clientes as $cliente) {
            
            $sql = "select * from pago";
            $result = mysqli_query ($con, $sql);
            while ($datos=mysqli_fetch_array($result)){
                if($id_pago==$datos['id']){
                    $id_usuario =  $datos['id_usuario'];
                }else{
                    // echo "no coincide nombre con la base de datos";
                }
            }
            //cho "<br>db: "; echo $id_usuario;

            while($cliente->{'user_id'}==$id_usuario  && $cliente->{'status'}==0){
                    
                    $nombre = $cliente->{'nombre'};
                    $cantidad = $cliente->{'cantidad'};
                    $id_carrito = $cliente->{'id'};

                    $sql = "select * from productos";
                    $result = mysqli_query ($con, $sql);
                    while ($datos=mysqli_fetch_array($result)){
                      if($nombre==$datos['nombre_p']){
                          $existencia_actual = $datos['existencia'];
                      }else{
                          //echo "no coincide nombre con la base de datos";
                      }
                    }
                    $nueva_cantidad = $existencia_actual - $cantidad; 
                    $sql = "UPDATE productos SET existencia='$nueva_cantidad' WHERE nombre_p='$nombre'";
                    $con->query($sql);


                    $identificador = $id_carrito-1;
                    $data = file_get_contents('pedidos.json');
                    $data_array = json_decode($data, true);

                    
                    foreach ($data_array as $key => $value) {
                        $value['id'];
                        if ($value['id'] == $id_carrito) {
                            $data_array[$key]['status'] = 2;
                            $data_array[$key]['status'];
                            break;
                        }else{
                        }
                    }

                    file_put_contents('pedidos.json', json_encode($data_array));
                    
                    break;
                
                    //echo "status no es 0";
                
            }
        }
    }else if($pago=='entregado'){
        
    }

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
        <a href="fichas.php" class="btn3">Volver</a>
        <br><br><br>
    </div>
    </center>
    <?php
}
?>

</body>
</html>