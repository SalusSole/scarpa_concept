<?php
session_start();
$usuario=$_SESSION["user_id"];
$id=0;
$id_envio = $_GET['id'];
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

$x=19;


    $envios = simplexml_load_file("envios.xml");
    $aux = 0; //var aux

    foreach($envios as $pedido){
        if($pedido->{'id'}==$id_envio){
            
            $aux= $pedido->id;
            //$hola = 0;
         //   if($pedido->{'id'}==2){
                
                $pdf->SetXY($x,0);
                $pdf->SetFont('Arial', 'B', 12);
                $pdf->Cell(0,80, utf8_decode("Nº pedido: ".$pedido->id));
             //   $pdf->Cell(0,80, utf8_decode("Nº pedido: ".$aux));
             //}
            
       }else{
           /* $pdf->SetXY($x,0);
            $pdf->SetFont('Arial', 'B', 12);
            $pdf->Cell(0,87, utf8_decode("No")); */
        }
    }

$pdf->SetXY($x,0);
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(0,95, utf8_decode("Fecha: ". date('d/m/Y')));


$pdf->SetXY($x,0);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(0,110, utf8_decode("Dirección del cliente "));


     $conexion = mysqli_connect("localhost", "scarpapos", "1c999b218") or die ("Fallo en la conexión");
      //$conexion = mysqli_connect("localhost", "root", "") or die("Fallo en la conexión");
      #Seleccionamos la base de datos a utilizar
      mysqli_select_db($conexion, "scarpapos") or die("Fallo en la selección de la BD");
      $Resultado=mysqli_query($conexion, "SELECT * FROM `user` WHERE `id`='".$usuario."';");
       while ($row = mysqli_fetch_array($Resultado)) {
                    $pdf->SetXY($x,0);
                    $pdf->SetFont('Arial', '', 9);
                    #$pdf->Cell(0,80, utf8_decode("Número de pedido: ".$pedido->id));
                    $pdf->Cell(0,128, utf8_decode("Nombre: ".$row['fullname']));
                                               #echo '<td>'.$row['nombre_p'].'</td>';
             }
       mysqli_close($conexion);


  $envios = simplexml_load_file("envios.xml");
    foreach($envios as $pedido){
        if($pedido->{'id'}==$id_envio){
            
            $pdf->SetXY($x,0);
            $pdf->SetFont('Arial', '', 9);
            $pdf->Cell(0,140, utf8_decode("Código Postal: ".$pedido->cp));
        
            $pdf->SetXY($x,0);
            $pdf->SetFont('Arial', '', 9);
            $pdf->Cell(0,150, utf8_decode("Estado: ".$pedido->estado));
            
            $pdf->SetXY($x,0);
            $pdf->SetFont('Arial', '', 9);
            $pdf->Cell(0,160, utf8_decode("Municipio: ".$pedido->municipio));
            
            $pdf->SetXY($x,0);
            $pdf->SetFont('Arial', '', 9);
            $pdf->Cell(0,170, utf8_decode("Colonia: ".$pedido->colonia));
            
            $pdf->SetXY($x,0);
            $pdf->SetFont('Arial', '', 9);
            $pdf->Cell(0,180, utf8_decode("Calle: ".$pedido->calle));
            
            $pdf->SetXY($x,0);
            $pdf->SetFont('Arial', '', 9);
            $pdf->Cell(0,190, utf8_decode("Tel. ".$pedido->telefono));
            
            $pdf->SetXY($x,0);
            $pdf->SetFont('Arial', '', 9);
            $pdf->Cell(0,200, utf8_decode("Exterior: ".$pedido->exterior));
            
            $pdf->SetXY($x,0);
            $pdf->SetFont('Arial', '', 9);
            $pdf->Cell(0,210, utf8_decode("Interior: ".$pedido->interior));
       }else{
            /*$pdf->SetXY($x,0);
            $pdf->SetFont('Arial', '', 10);
            $pdf->Cell(0,140, utf8_decode("No"));*/
        }
    }

$pdf->SetXY($x,0);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(0,230, utf8_decode("Método de envío"));

$pdf->SetXY($x,0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(0,250, utf8_decode("Gratis: Estafeta-Estafeta"));

$x=65;

$pdf->SetXY($x,0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(0,250, utf8_decode("Conserva el comprobante de pago, para cualquier aclaración puedes llamar al "));

$pdf->SetXY($x,0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(0,260, utf8_decode("800-146-6682 o enviar un correo a la siguiente dirección: contactanos@scarpapos.com"));

$x=19;

$pdf->SetXY($x,0);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(0,276, utf8_decode("Artículos pedidos"));

//Cabecera de la tabla
$pdf->SetXY(22, 150);
$pdf->SetFontSize(10);
$pdf->SetFont('Arial', '');
$pdf->SetFillColor(247,247,247);
$pdf->SetTextColor(31, 31, 31);
$pdf->SetDrawColor(88,88,88);
$pdf->Cell(50,10,'Nombre de producto',0,0,'C',1);
$pdf->Cell(35,10,'Color',0,0,'C',1);
$pdf->Cell(25,10,'Precio unitario',0,0,'C',1);
$pdf->Cell(20,10,'Cantidad',0,0,'C',1);
$pdf->Cell(30,10,'Subtotal',0,1,'C',1);


$pdf->SetDrawColor(224, 150, 150);
$pdf->SetLineWidth(1);
$pdf->Line(22.5,160,181.5,160);

//Cuerpo de la tabla
$pdf->SetLineWidth(0,2);
$pdf->SetMargins(22, 44, 11.7);
$pdf->SetY(140);
$pdf->SetFillColor(250,250,250);
$pdf->SetFont('Arial', '', 9);
$pdf->SetTextColor(40,40,40);
$pdf->SetDrawColor(255,255,255);
$pdf->Ln(20);

     $archivo=file_get_contents("pedidos.json");
         $clientes=json_decode($archivo);    
         //un dato del json
         $preciopagototal=0;
         $contador=0;
          foreach ($clientes as $cliente) {
                  while($cliente->{'user_id'}==$_SESSION["user_id"]){
                      if($cliente->{'status'}==0){
                        #
                        $pdf->Cell(50,10,''.$cliente->{'nombre'},1,0,'C',1);
                        $pdf->Cell(35,10,''.$cliente->{'color'},1,0,'C',1);
                        $pdf->Cell(25,10,'$'.$cliente->{'precio'},1,0,'C',1);
                        $pdf->Cell(20,10,''.$cliente->{'cantidad'},1,0,'C',1);
                        $pdf->Cell(30,10,'$'.$cliente->{'subTotal'},1,1,'C',1);
                      }
                      
                  break;
             }
        $contador++;
     } 

$pdf->Output('ficha_pago.pdf', 'I');
?>