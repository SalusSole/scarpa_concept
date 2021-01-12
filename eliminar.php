<DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8"/>
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
<section id="borde">
<header>
</header>
<section id="Contenedor">
	<?php
			//echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=canasta.php">';
	
if ($_GET){
$id=$_GET['id'];
    
            $data = file_get_contents('carrito.json');
            $data_array = json_decode($data, true);

            
            foreach ($data_array as $key => $value) {
                
                if ($value['id'] == $_GET['id']) {
                    $data_array[$key]['eliminado'] = 1;
                }else{
                    echo "nada";
                }
            }

            file_put_contents('carrito.json', json_encode($data_array));
}

?>
</section>
<section>
	
</section>
</section>
<footer>
    <center>
        <br><br>
        <h3>Salvador Solís Iñiguez | Centro de enseñanza tecnica industrial | Trabajo academico CETI tonala 2020</h3>
    </center>
</footer>
</body>
</html>