
<?php
session_start();	
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
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital@1&display=swap" rel="stylesheet"> 

</head>
<body>
   
<?php 
include "nav.php";
if(isset($_SESSION["user_id"])){
    if($_SESSION['user_id']==1){
        echo '<script>window.location="panel.php";</script>';
    }
}

?>

    <div class="portada">
        <img src="img/foto.jpg">
        <div class="centrado" ><a class="tipografia">ENCUENTRA TU ESTILO</a><br><a class="tipografia_uno">SÉ TÚ MISMO</a></div>
    </div>
    
    <section id="Sectiontabla"> 
				
				<table id="tabla">
					<tr>
						<td>
                            <div class="port">
                                <img src="img/chelsea.jpg">
                                <div class="centrado">
                                <?php
                                if (isset($_SESSION["user_id"])) {
                                    echo '<a href="botas.php" class="tipografia_dos">Botas</a>';
                                }else{
                                    echo '<a class="tipografia_dos">Botas</a>';
                                }
                                ?>
                                </div>
                            </div>
                        </td>
						<td>
                            <div class="port">
                                <img src="img/derby.jpg">
                                <div class="centrado">
                                    <?php
                                if (isset($_SESSION["user_id"])) {
                                    echo '<a href="zapatos.php" class="tipografia_dos">Zapatos</a>';
                                }else{
                                    echo '<a class="tipografia_dos">Zapatos</a>';
                                }
                                ?>
                                </div>
                            </div>
                        </td>
					</tr>
				</table>

			</section>

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
    var b = document.getElementById("home"); 
    b.setAttribute("class", "active");
</script>
</body>
</html>


