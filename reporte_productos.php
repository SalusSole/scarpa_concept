<?php
session_start();
$usuario=$_SESSION["user_id"];
$id=0;
?>

<?php

require('fpdf/fpdf.php');
$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 14);
$pdf->SetFillColor(10, 10, 101);
$pdf->SetDrawColor(255,255,255);
$pdf->SetTextColor(0,0,0);
//inserto la cabecera poniendo una imagen dentro de una celda
$pdf->Cell(0,0,$pdf->Image('./img/Scarpapos.png',19,9,72),0,0,'C');

$x=125;

$pdf->SetXY($x,0);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0,41, utf8_decode("Scarpapos S.A. de C.V."));

$pdf->SetXY($x,0);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(0,52, utf8_decode("RFC: SCRP943SC933"));

$pdf->SetXY($x,0);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(0,62, utf8_decode("2750 Av. Ignacio L. Vallarta Guadalajara, Jalisco"));

$pdf->SetXY($x,0);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(0,72, utf8_decode("Tel: 8356-5200"));


$x=75;

$pdf->SetXY($x,0);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(0,156, utf8_decode("REPORTE DE STOCK"));

//Cabecera de la tabla
$pdf->SetXY(20, 90);
$pdf->SetFontSize(10);
$pdf->SetFont('Arial', '');
$pdf->SetFillColor(247,247,247);
$pdf->SetTextColor(31, 31, 31);
$pdf->SetDrawColor(88,88,88);
$pdf->Cell(32,10,'ID de producto',0,0,'C',1);
$pdf->Cell(32,10,'Nombre de producto',0,0,'C',1);
$pdf->Cell(32,10,'Precio unitario',0,0,'C',1);
$pdf->Cell(37,10,'Existencias disponibles',0,0,'C',1);
$pdf->Cell(32,10,'Tipo de calzado',0,0,'C',1);

$pdf->SetDrawColor(224, 150, 150);
$pdf->SetLineWidth(1);
$pdf->Line(22.5,100,181.5,100);

//Cuerpo de la tabla
$pdf->SetLineWidth(0,2);
$pdf->SetMargins(20, 44, 11.7);
$pdf->SetY(80);
$pdf->SetFillColor(250,250,250);
$pdf->SetFont('Arial', '', 9);
$pdf->SetTextColor(40,40,40);
$pdf->SetDrawColor(255,255,255);
$pdf->Ln(20);
    

       #Conectamos con MySQL
                    // $conexion = mysqli_connect("localhost", "root", "") or die ("Fallo en la conexión");
                     $conexion = mysqli_connect("localhost", "scarpapos", "1c999b218") or die ("Fallo en la conexión");
                    
                    #Seleccionamos la base de datos a utilizar
                    mysqli_select_db($conexion, "scarpapos") or die ("Fallo en la selección de la BD");
                    $Resultado=mysqli_query($conexion, "SELECT * FROM `productos` WHERE `existencia`>5;");
                    #echo '<tr class="fontT"><th>Nombre</th><th>Precio</th><th>Imagen de muestra</th></tr>';
                    
                    while($row = mysqli_fetch_array($Resultado)){
                       
                            
                            $pdf->Cell(32,10,''.$row['id_producto'],1,0,'C',1);
                            $pdf->Cell(32,10,''.$row['nombre_p'],1,0,'C',1);
                            $pdf->Cell(32,10,''.$row['precio_p'],1,0,'C',1);
                            $pdf->Cell(37,10,''.$row['existencia'],1,0,'C',1);
                            $pdf->Cell(32,10,''.$row['tipo'],1,1,'C',1);
                           //S $pdf->Cell(2,10,$pdf->Image('./img/'.$row['imagen_p'],1,1, 5),0,1,'C', 1);
                           // $pdf->Cell(32,10,''.$row['imagen_p'],1,1,'C',1);
                        
                        // $ee = $row['imagen_p'];
                            //$pdf->Image($ee,0,0,100,100,JPG); 
                           // $pdf->Image(120, 5, 'img src=./img/',$row['imagen_p'], 1,0,'C');
                       
                    }
     mysqli_close($conexion);
                      

$pdf->Output('prueba.pdf', 'I');
?>