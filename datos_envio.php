<?php
session_start();
$usuario=$_SESSION["user_id"];

if($_POST){
    $cp = $_POST['cp'];
    $estado = $_POST['estado'];
    $municipio = $_POST['municipio'];
    $colonia = $_POST['colonia'];
    $calle = $_POST['calle'];
    $telefono = $_POST['telefono'];
    $exterior = $_POST['exterior'];
    $interior = $_POST['interior'];
    
        
    $doc = new domDocument("1.0", "utf-8");
    $doc -> formatOutput = true;
    $doc -> load("envios.xml");

        $raiz = $doc -> getElementsByTagName("envios") -> item(0);
        $rama = $doc -> createElement('pedido');

    //'id'=>$id_compra, 'marca'=>$marca, 'modelo'=>$modelo, 'calidad'=>$calidad, 'categoria'=>$categoria, 'cantidad'=>$cantidad, 'color'=>$color
    $xml = file_get_contents("envios.xml");
    $elem = new SimpleXMLElement($xml);
    $id_elementos=$elem->count();
    $id_envio = $id_elementos + 1;


            $hoja = $doc -> createElement('id');
            $hoja -> appendChild($doc -> createTextNode($id_envio));
            $rama -> appendChild($hoja);  

            $hoja = $doc -> createElement('cp');
            $hoja -> appendChild($doc -> createTextNode($cp));
            $rama -> appendChild($hoja);

            $hoja = $doc -> createElement('estado');
            $hoja -> appendChild($doc -> createTextNode($estado));
            $rama -> appendChild($hoja);

            $hoja = $doc -> createElement('municipio');
            $hoja -> appendChild($doc -> createTextNode($municipio));
            $rama -> appendChild($hoja);

            $hoja = $doc -> createElement('colonia');
            $hoja -> appendChild($doc -> createTextNode($colonia));
            $rama -> appendChild($hoja);

            $hoja = $doc -> createElement('calle');
            $hoja -> appendChild($doc -> createTextNode($calle));
            $rama -> appendChild($hoja);
    
            $hoja = $doc -> createElement('telefono');
            $hoja -> appendChild($doc -> createTextNode($telefono));
            $rama -> appendChild($hoja);

            $hoja = $doc -> createElement('exterior');
            $hoja -> appendChild($doc -> createTextNode($exterior));
            $rama -> appendChild($hoja);

            $hoja = $doc -> createElement('interior');
            $hoja -> appendChild($doc -> createTextNode($interior));
            $rama -> appendChild($hoja);
    
            $hoja = $doc -> createElement('user_id');
            $hoja -> appendChild($doc -> createTextNode($usuario));
            $rama -> appendChild($hoja);


        $raiz -> appendChild($rama);
        $doc -> appendChild($raiz);
        $doc -> save("envios.xml");
    
}
?>
<script>
window.location="pago.php?id=<?php echo $id_envio?>";
</script>