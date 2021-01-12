<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Zapatos - Moda Masculina</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300|Yellowtail&display=swap" rel="stylesheet"> 
</head>
<body>
    <header>
        <div id="title">
            <a class="title">Scarpa</a><a class="title2"> Concept</a>
        </div>
    </header>
    
    <!-- <nav class="navv">    
        <ul class="nav">
            <li><a title="Home" href="index.php"><span class="nav1">HOME</span></a></li>
            <li><a title="Botas" href="botas.php"><span class="nav1">BOTAS</span></a></li>
            <li><a title="Zapatos" href="zapatos.php"><span class="nav1">ZAPATOS</span></a></li>
            <li><a title="Carrito" href="carrito.php"><span class="nav2">CARRITO</span></a></li>
            <li><a title="Panel" href="panel.php"><span class="nav2">PANEL DE CONTROL</span></a></li>
            <li><a title="Login" href="php/logout.php"><span class="nav2">LOGOUT</span></a></li>
        </ul>
    </nav> -->

<nav>
    <div>
        <?php if (!isset($_SESSION["user_id"])) { //en caso de que el usuario no haya iniciado sesión?>
            <ul>
                <li>
                    <a href="index.php" id="home">
                        <span class="nav1">HOME</span>
                    </a>
                </li>
                <li>
                    <a href="login.php" id="login">
                        <span class="nav2">LOGIN</span>
                    </a>
                </li>
                <li>
                    <a href="registro.php" id="registro">
                        <span class="nav2">REGISTRATE</span>
                    </a>
                </li>
            </ul>
        <?php }else if($_SESSION['user_id']>1){ //en caso de que el usuario haya iniciado sesión tipo usuario?>
            <ul>
                <li>
                    <a href="index.php" id="home">
                        <span class="nav2">HOME</span>
                    </a>
                </li> 
                <li>
                    <a href="botas.php" id="botas">
                        <span class="nav2">BOTAS</span>
                    </a>
                </li> 
                <li>
                    <a href="zapatos.php" id="zapatos">
                        <span class="nav2">ZAPATOS</span>
                    </a>
                </li> 
                <li>
                    <a href="carrito.php" id="carrito">
                        <span class="nav2">CARRITO</span>
                    </a>
                </li> 
                <li>
                    <a href="comprobante.php" id="comprobante">
                        <span class="nav2">COMPROBANTE</span>
                    </a>
                </li> 
                <li>
                    <a href="php/logout.php">
                        <span class="nav2">LOGOUT</span>
                    </a>
                </li> 
            </ul>
        <?php }else if($_SESSION['user_id']==1){ //en caso de que el administrador haya iniciado sesión?>
            <ul>
                <li>
                    <a href="panel.php" id="panel">
                        <span class="nav2">PANEL DE CONTROL</span>
                    </a>
                </li>
                <li>
                    <a href="reporte_productos.php" >
                        <span class="nav2">REPORTE DE PRODUCTOS</span>
                    </a>
                </li>
                <li>
                    <a href="editar_stock.php" id="editar_stock">
                        <span class="nav2">CONTROL DE STOCK</span>
                    </a>
                </li>
                <li>
                    <a href="fichas.php" id="fichas">
                        <span class="nav2">FICHAS PAGADAS</span>
                    </a>
                </li>
                <li>
                    <a href="php/logout.php">
                        <span class="nav2">LOGOUT</span>
                    </a>
                </li> 
            </ul>
            <?php } ?>

        </ul>
    </div>
</nav>

</body>