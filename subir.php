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
    <link href="https://fonts.googleapis.com/css?family=Poppins|Yellowtail&display=swap" rel="stylesheet">  
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">   
</head>
<body>
<?php
include "nav.php";
?> 
    <center>
     <div class="container4">
    <?php
    $SubidaDarchivos="true"; //Bandera para saber si el archivo es correcto
    $PesoDarchivo=$_FILES['ParaSubir']['size'];//Peso del archivo
    if($_FILES['ParaSubir']['size']>700000)
        {
           $msg=$msg."<br><a>El archivo es mayor que 700KB, debes reducirlo antes de subir</a><br>";
           $SubidaDarchivos="false";
        }
    else{
        if(!($_FILES['ParaSubir']['type'] == "image/jpeg" OR $_FILES['ParaSubir']['type'] =="application/pdf"))
        {
            $msg=$msg."<a><br>Tu archivo tiene que ser JPG o PDF. Otros archivos no son permitidos</a><br>";
            $SubidaDarchivos="false";
        }
        else{
            $Tipo=$_FILES['ParaSubir']['type']; //Tipo o extención del archivo
            if($Tipo=="image/jpeg")
                $Extencion=substr($Tipo,-4);
            else
                $Extencion=substr($Tipo,-3);
            }
        //Crear carpeta
        $nombre_carpeta = "./Subidas";
        if(!is_dir($nombre_carpeta)){
            @mkdir($nombre_carpeta, 0700);
        }else{
            echo '<br><a class="fontT" >Guardado en el directorio anteriormente creado</a><br>';
        }
        }
/*_________________________________________CONEXIÓN A BD_____________________________________________________*/         
           $conexion = mysqli_connect("localhost", "scarpapos", "1c999b218") or die ("Fallo en la conexión");
         //   $conexion = mysqli_connect("localhost", "root", "") or die("Fallo en la conexión");
            #Seleccionamos la base de datos a utilizar
            mysqli_select_db($conexion, "scarpapos") or die("Fallo en la selección de la BD");
            $Resultado=mysqli_query($conexion, "SELECT * FROM `user` WHERE `id`='".$usuario."';");
             while ($row = mysqli_fetch_array($Resultado)) {
                 
                        //echo '<a>'.$row['fullname'].'</a>';
                        $nombre = $row['fullname'];
                        $nombre_lang =str_replace(' ', '-', $nombre);
                        //$nombre_lang = preg_replace("/[^a-zA-Z0-9\_\-]+/", "", $nombre_lang);
                        //echo "Usuario: ".$nombre;
                        
                        $fechaHora=Date("F_j_Y");
                        $usuario=$_SESSION["user_id"];
                        
                    /*_________________TILDES_______________*/  
                    function eliminar_tildes($cadena){

                        //Codificamos la cadena en formato utf8 en caso de que nos de errores
                        $cadena = utf8_encode($cadena);

                        //Ahora reemplazamos las letras
                        $cadena = str_replace(
                            array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
                            array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
                            $cadena
                        );

                        $cadena = str_replace(
                            array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
                            array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
                            $cadena );

                        $cadena = str_replace(
                            array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
                            array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
                            $cadena );

                        $cadena = str_replace(
                            array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
                            array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
                            $cadena );

                        $cadena = str_replace(
                            array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
                            array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
                            $cadena );

                        $cadena = str_replace(
                            array('ñ', 'Ñ', 'ç', 'Ç'),
                            array('n', 'N', 'c', 'C'),
                            $cadena
                        );

                        return $cadena;
                    }
                 $nombre_lang= eliminar_tildes($nombre_lang);
                         /*___________________________________________________*/ 
                        //$ruta=$usuario.$fechaHora;
                        #echo "Usuario de imagen: ".$ruta;
                        //$add="Subidas/usuario1.".$Extencion;//Ruta y nombre del archivo en el servidor
                        $ruta = $nombre_lang."_id". $usuario."_". $fechaHora;
                        $add="Subidas/".$ruta.".".$Extencion;//Ruta y nombre del archivo en el servidor
                        if($SubidaDarchivos=="true"){
                            
                            if(move_uploaded_file ($_FILES['ParaSubir']['tmp_name'], $add)){
                                echo '<br><br><br><br>';
                                echo '<a class="font3" >Ha sido subido satisfactoriamente</a><br><br>';
                                echo '<img src="img/correcto.png" width="120px" height="120px"><br>';


                                //guardar en la base de datos los datos del envío
                                if (!$cesta = simplexml_load_file('envios.xml')) {//leer el archivo xml y guardarlo en $cesta y si no no lee manda mensaje de error
                                    echo "Error algo salio mal";
                                }else{
                                    foreach ($cesta as $datos_envio){//recorre el archivo xml
                                        if($usuario==$datos_envio->user_id){
                                            //guarda datos del xml en variables
                                            $id=$datos_envio->id;
                                            $cp = $datos_envio->cp;
                                            $estado = $datos_envio->estado;
                                            $municipio = $datos_envio->municipio;
                                            $colonia = $datos_envio->colonia;
                                            $calle = $datos_envio->calle;
                                            $telefono = $datos_envio->telefono;
                                            $exterior = $datos_envio->exterior;
                                            $interior = $datos_envio->interior; 
                                            
                            
                                            $sql = "INSERT INTO envio (cp, estado, municipio, colonia, calle, telefono, exterior, interior) VALUES ('$cp','$estado','$municipio','$colonia','$calle','$telefono','$exterior','$interior')";
                                    
                                            if (mysqli_query($conexion, $sql)) {
                                            } else {
                                                echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
                                            }  

                                            // $sql = "INSERT INTO envio (cp, estado, municipio, colonia, calle, telefono, exterior, interior) VALUES ('$cp','$estado','$municipio','$colonia','$calle','$telefono','$exterior','$interior')";
                                    
                                            // if (mysqli_query($conexion, $sql)) {
                                            // } else {
                                            //     echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
                                            // }  
                                        }
                                        
                                      } 
                                  }

                                //se agrega el pago a la base de datos
                                $sql = "INSERT INTO pago (id_usuario, id_pedido, ruta_factura, status) VALUES ('$usuario', '$id', '$ruta', 'pendiente')";
                                if (mysqli_query($conexion, $sql)) {
                                    $envio_id = mysqli_insert_id($conexion);
                                } else {
                                    echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
                                }



                            }else{
                                echo '<a class="fontT" >Error al subir el archivo</a><br>';}
                        }else{ echo $msg; }


                    }
            mysqli_close($conexion);
/*___________________________________________________________________________________________________________*/      
        


    
    ?>
    </div>
        </center>
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