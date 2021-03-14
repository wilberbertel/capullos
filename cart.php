<?php
require_once("includes/load.php");
$user = current_user();
$arreglo;
$tipo = page_require_tipo($user['type']);
$additions = productByAdditions();

if (isset($_SESSION['carritoCapullos'])) {
    if (isset($_POST['id_product'])) {
        $arreglo = $_SESSION['carritoCapullos'];
        $encontro = false;
        $numero = 0;
        for ($i = 0; $i < count($arreglo); $i++) {
            if ($arreglo[$i]['Id'] === $_POST['id_product']) {
                $encontro = true;
                $cantidad = $i;
            }
        }
        if ($encontro == true) {
            $arreglo[$numero]['Cantidad'] = $arreglo[$numero]['Cantidad'] + 1;
            $_SESSION['carritoCapullos'] = $arreglo;
            header("Location: cart.php");
        } else {
            //NO ESTABA EL REGISTRO
            $nombre = "";
            $descripcion = "";
            $de = "";
            $mensaje = "";
            $para = "";
            $precio = "";
            $imagen = "";
            $res = searchProductCarrito($_POST['id_product']);
            $nombre = $res['namep'];
            $descripcion = $res['description'];
            $de = $_POST['de'];
            $mensaje = $_POST['mensaje'];
            $para = $_POST['para'];
            $precio = $res['price'];
            $imagen = $res['image_product'];
            $arregloNuevo = array(
                'Id' => $_POST['id_product'],
                'Nombre' => $nombre,
                'Decripcion' => $descripcion,
                'De' => $de,
                'Mensaje' => $mensaje,
                'Para' => $para,
                'Precio' => $precio,
                'Imagen' => $imagen,
                'Cantidad' => 1
            );
        }
        array_push($arreglo, $arregloNuevo);
        $_SESSION['carritoCapullos'] = $arreglo;
        header("Location: cart.php");
    }
} else {
    if (isset($_POST['id_product'])) {
        $nombre = "";
        $descripcion = "";
        $de = "";
        $mensaje = "";
        $para = "";
        $precio = "";
        $imagen = "";
        $res = searchProductCarrito($_POST['id_product']);

        $nombre = $res['namep'];
        $descripcion = $res['description'];
        $de = $_POST['de'];
        $mensaje = $_POST['mensaje'];
        $para = $_POST['para'];
        $precio = $res['price'];
        $imagen = $res['image_product'];

        $arreglo[] = array(
            'Id' => $_POST['id_product'],
            'Nombre' => $nombre,
            'Decripcion' => $descripcion,
            'De' => $de,
            'Mensaje' => $mensaje,
            'Para' => $para,
            'Precio' => $precio,
            'Imagen' => $imagen,
            'Cantidad' => 1
        );
        $_SESSION['carritoCapullos'] = $arreglo;
        header("Location: cart.php");
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Carrito de comptras :: Capullos</title>
        <link href="Assets/css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' />
        <link rel="shortcut icon" href="Assets/images/favicon.ico">
        <link rel="stylesheet" type="text/css" href="Assets/css/myStyle.css">
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="Assets/js/jquery.min.js"></script>
        <!-- Custom Theme files -->
        <!--theme-style-->
        <link href="Assets/css/style.css" rel="stylesheet" type="text/css" media="all" />	
        <!--//theme-style-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Youth Fashion Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <link href='//fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
        <!-- start menu -->
        <script src="Assets/js/bootstrap.min.js"></script>
        <script src="Assets/js/simpleCart.min.js"></script>
        <!-- slide -->
        <script src="Assets/js/responsiveslides.min.js"></script>
        <script>
            $(function () {
                $("#slider").responsiveSlides({
                    auto: true,
                    speed: 500,
                    namespace: "callbacks",
                    pager: true,
                });
            });
        </script>
    </head>
    <body>
        <?php
        require_once('layout/header.php');
        ?>
        <div class="breadcrumbs">
            <div class="container">
                <ol class="breadcrumb breadcrumb1 animated wow slideInLeft animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInLeft;">
                    <li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                    <li class="active">Carrito</li>
                </ol>
            </div>
        </div>
        <!---->

        <?php
        if (isset($_SESSION['carritoCapullos'])) {
            ?>
            <div class="container">
                <div class="check-out">
                    <h2>Carrito</h2>
                    <table >
                        <tr>
                            <th>Nombre/Descripción</th>	
                            <th>Cantidad</th>	
                            <th>Precio</th>		
                            <th>Sub Total</th>
                            <th>Eliminar</th>
                        </tr>
                        <tr>
                            <?php
                            $total = 0;
                            $arreglocarritoCapullos = $_SESSION['carritoCapullos'];
                            for ($i = 0; $i < count($arreglocarritoCapullos); $i++) {
                                if ($arreglocarritoCapullos[$i]['Precio'] != 0) {
                                    $total = $total + ($arreglocarritoCapullos[$i]['Precio'] * $arreglocarritoCapullos[$i]['Cantidad']);?>
                                    <td class="ring-in"> 
                                        <form action="single.php" method="post">
                                            <input type="hidden" name="id_product"  id="id_product" class="form-control"  value="<?php echo $arreglocarritoCapullos[$i]['Id']; ?>">
                                            <button type="submit"   style="padding: 0;border: none; background: none;"class=""> 
                                             <a  class="at-in"><img src="uploads/product/<?php echo $arreglocarritoCapullos[$i]['Imagen']; ?>" class="img-responsive" alt=""></a>
                                                <div class="sed">
                                                    <h5><?php echo $arreglocarritoCapullos[$i]['Nombre']; ?></h5>
                                                    <p>(<?php echo $arreglocarritoCapullos[$i]['Decripcion']; ?>) </p></button>
                                            </div>
                                            <div class="clearfix"> </div> </form></td>
                                    <td> <?php echo $arreglocarritoCapullos[$i]['Cantidad']; ?></td>
                                    <td>$COP <?php echo numberCOP($arreglocarritoCapullos[$i]['Precio']); ?></td>
                                    <td class="cant<?php echo $arreglocarritoCapullos[$i]['Id']; ?>">
                                        $COP <?php echo numberCOP($arreglocarritoCapullos[$i]['Precio'] * $arreglocarritoCapullos[$i]['Cantidad']); ?></td>
                                    <td><a href="#" class="to-buy btnEliminar" data-id="<?php echo $arreglocarritoCapullos[$i]['Id']; ?>">X</a></td>
                                </tr>
                                <?php }  } ?>
                        		
                    
                        
                    </table>


                    <div style="margin: 0 auto;
                         width: 200px;">
                        <a href="billing.php" class="button buttonVerDetalles">Proceder con la compra $<?php echo numberCOP($total); ?></a>
                    </div>
                    <div class="clearfix"> </div>
                    <br>
                    <h3 class="cate">Adiciones</h3>
                    <div class="content-top2">
                        <br>
                        <?php foreach ($additions as $additions) : ?>
                            <div class="col-md-2 col-md2">
                                <div class="col-md1 simpleCart_shelfItem">
                                    <img class="img-responsive"   src="uploads/product/<?php echo $additions['image_product']; ?>" alt="" />						
                                    <h3><?php echo $additions['namep']; ?></h3>
                                    <form action="singleAdditions.php" method="post">
                                        <input type="hidden" name="id_product"  id="id_product" class="form-control"  value="<?php echo$additions['id_product']; ?>">

                                        <div class="price">
                                            <h5 class="item_price">$COP <?php echo numberCOP($additions['price']); ?></h5>
                                            <button type="submit"  class="button buttonVerDetalles">Ver Detalles</button>                                             <div class="clearfix"> </div>
                                        </div>
                                    </form>
                                </div>
                            </div>	
                        <?php endforeach; ?>
                        <div class="clearfix"> </div>
                    </div>		
                </div>
                <?php
            } else {
                echo "<div class='container'>
                        <div class='check-out'>
                             <h2>Aun no hay productos en el carrito</h2>
                            <a class='to-buy' href='products.php'>Ir a ver productos</a>
                        </div>
                     </div>";
            }
            ?>
        </div>
    </div>


    <?php require_once('layout/footer.php'); ?>
    <script>
        $(document).ready(function () {
            $(".btnEliminar").click(function (event) {
                event.preventDefault();
                var id = $(this).data('id');
                var boton = $(this);

                $.ajax({
                    method: 'POST',
                    url: 'eliminarCarrito.php',
                    data: {
                        id: id
                    }
                }).done(function (respuesta) {
                    boton.parent('td').parent('tr').remove();
                    location.reload();
                });
            });

        });
    </script>
</body>
</html>