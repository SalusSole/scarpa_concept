<?php
    $count=0;
    $count2=0;
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
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Poppins|Yellowtail&display=swap" rel="stylesheet">  
    <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Special+Elite&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Yellowtail&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Spartan&display=swap" rel="stylesheet"> 
</head>
<body>
<?php
include "nav.php";
?>
    
    <?php
           /*if(!$zapatos = simplexml_load_file('carrito.xml')){ #Convierte el documento XML a un objeto
               echo "No se ha podido cargar el archivo";}
           else{
                foreach($zapatos as $data){
                $count+=1;
                $count2+=1;*/
    
    $data = file_get_contents('carrito.json');
    $data = json_decode($data);
    
    
    
    
    
    ?>
<form>
    <div class="cesta">
                <table>
                    
                   <td>
                   <?php  
                    /*echo '<a class="font4">'.$data->na.'</a><br>'; 
                   
                    echo '<a class="font2">Precio:</a>&nbsp;&nbsp;MXN$'; 
                    echo $data->precio; 

                    echo '<br><a class="font2">Talla:</a>&nbsp;&nbsp;'; 
                    echo $data->talla; 

                    echo '<br><a class="font2">Color:</a>&nbsp;&nbsp;'; 
                    echo $data->color; 

                    echo '<br><a class="font2">ID artículo:</a>&nbsp;&nbsp;'; 
                    echo $data->id; */
                       
                       
                foreach($data as $row){
                       
                if($row->eliminado==0){
                
                    echo '<br><br><a class="font4">'.$row->na.'</a><br>'; 
                   
                    echo '<a class="font2">Precio:</a>&nbsp;&nbsp;MXN$'; 
                    echo $row->precio; 

                    echo '<br><a class="font2">Talla:</a>&nbsp;&nbsp;'; 
                    echo $row->talla; 

                    echo '<br><a class="font2">Color:</a>&nbsp;&nbsp;'; 
                    echo $row->color; 

                    echo '<br><a class="font2">ID artículo:</a>&nbsp;&nbsp;'; 
                    echo $row->id;
                       
                   ?>
                        
                        <?php 
                          
                        /*if($data->id==1){
                            echo '<a class="eliminar" href="eliminar.php?id='.$data->id.'">x</a>';
                        }  
                        if($data->id==2){
                            echo '<a class="eliminar" href="eliminar.php?id='.$data->id.'">x</a>';
                        }  
                        if($data->id==3){
                            echo '<a class="eliminar" href="eliminar.php?id='.$data->id.'">x</a>';
                        }  
                        if($data->id==4){
                            echo '<a class="eliminar" href="eliminar.php?id='.$data->id.'">x</a>';
                        }  
                        if($data->id==5){
                            echo '<a class="eliminar" href="eliminar.php?id='.$data->id.'">x</a>';
                        }  
                        if($data->id==6){
                            echo '<a class="eliminar" href="eliminar.php?id='.$data->id.'">x</a>';
                        }  
                        if($data->id==7){
                            echo '<a class="eliminar" href="eliminar.php?id='.$data->id.'">x</a>';
                        }  
                        if($data->id==8){
                            echo '<a class="eliminar" href="eliminar.php?id='.$data->id.'">x</a>';
                        }  
                        if($data->id==9){
                            echo '<a class="eliminar" href="eliminar.php?id='.$data->id.'">x</a>';
                        }  
                        if($data->id==10){
                            echo '<a class="eliminar" href="eliminar.php?id='.$data->id.'">x</a>';
                        }  
                        if($data->id==11){
                            echo '<a class="eliminar" href="eliminar.php?id='.$data->id.'">x</a>';
                        }  
                        if($data->id==12){
                            echo '<a class="eliminar" href="eliminar.php?id='.$data->id.'">x</a>';
                        }  
                        if($data->id==13){
                            echo '<a class="eliminar" href="eliminar.php?id='.$data->id.'">x</a>';
                        }  
                        if($data->id==14){
                            echo '<a class="eliminar" href="eliminar.php?id='.$data->id.'">x</a>';
                        }  
                        if($data->id==15){
                            echo '<a class="eliminar" href="eliminar.php?id='.$data->id.'">x</a>';
                        }  
                        if($data->id==16){
                            echo '<a class="eliminar" href="eliminar.php?id='.$data->id.'">x</a>';
                        }*/
                        
                       
                       if($row->id==1){
                            echo '<a class="eliminar" href="eliminar.php?id='.$row->id.'">x</a>';
                        }  
                        if($row->id==2){
                            echo '<a class="eliminar" href="eliminar.php?id='.$row->id.'">x</a>';
                        }  
                        if($row->id==3){
                            echo '<a class="eliminar" href="eliminar.php?id='.$row->id.'">x</a>';
                        }  
                        if($row->id==4){
                            echo '<a class="eliminar" href="eliminar.php?id='.$row->id.'">x</a>';
                        }  
                        if($row->id==5){
                            echo '<a class="eliminar" href="eliminar.php?id='.$row->id.'">x</a>';
                        }  
                        if($row->id==6){
                            echo '<a class="eliminar" href="eliminar.php?id='.$row->id.'">x</a>';
                        }  
                        if($row->id==7){
                            echo '<a class="eliminar" href="eliminar.php?id='.$row->id.'">x</a>';
                        }  
                        if($row->id==8){
                            echo '<a class="eliminar" href="eliminar.php?id='.$row->id.'">x</a>';
                        }  
                        if($row->id==9){
                            echo '<a class="eliminar" href="eliminar.php?id='.$row->id.'">x</a>';
                        }  
                        if($row->id==10){
                            echo '<a class="eliminar" href="eliminar.php?id='.$row->id.'">x</a>';
                        }  
                        if($row->id==11){
                            echo '<a class="eliminar" href="eliminar.php?id='.$row->id.'">x</a>';
                        }  
                        if($row->id==12){
                            echo '<a class="eliminar" href="eliminar.php?id='.$row->id.'">x</a>';
                        }  
                        if($row->id==13){
                            echo '<a class="eliminar" href="eliminar.php?id='.$row->id.'">x</a>';
                        }  
                        if($row->id==14){
                            echo '<a class="eliminar" href="eliminar.php?id='.$row->id.'">x</a>';
                        }  
                        if($row->id==15){
                            echo '<a class="eliminar" href="eliminar.php?id='.$row->id.'">x</a>';
                        }  
                        if($row->id==16){
                            echo '<a class="eliminar" href="eliminar.php?id='.$row->id.'">x</a>';
                        }
                }
                }
                        ?>
                    </td>
                </table> 
                <br>
                <br>
                <a class="btn" href="compra.php">Proceder con la compra</a>   
    </div>
</form>
               <?php
                
                
           
           ?>

		<script src="js/valida_login.js"></script>
	</body>
        <footer>
        <ul>
        <div>
        <td><li><a title="Sobre nosotros" href="#"><span class="footer">About</span></a></li></td>
        <td><li><a title="Contacto" href="#"><span class="footer">Contact</span></a></li></td>
        <td><li><a title="social" href="https://www.instagram.com/scarpa_concept/"><span class="footer">Instagram</span></a></li></td>
        </div>
        </ul>
    </footer>
</html>