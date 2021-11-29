<?php
require_once("includes/load.php");
$user = current_user();

if ($_POST['tranferBanco'] != "PAYPAL" && $_POST['tranferBanco'] != "EPAYCO") {
    $session->msg('w', "Seleccione un metodo de pago");
    echo "<script >javascript:history.back()</script>";
}

?>
<!DOCTYPE html>
<html>

<head>
    <title> Carrito de compras | Capullos</title>
    <link href="Assets/css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' />
    <link rel="shortcut icon" href="Assets/images/favicon.ico">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="Assets/js/jquery.min.js"></script>
    <!-- Custom Theme files -->
    <!--theme-style-->
    <link href="Assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!--//theme-style-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords"
        content="Youth Fashion Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript">
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    </script>
    <link href='//fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
    <!-- start menu -->
    <script src="Assets/js/bootstrap.min.js"></script>
    <script src="Assets/js/simpleCart.min.js"></script>
    <!-- slide -->
    <script src="Assets/js/responsiveslides.min.js"></script>
    <script>
    $(function() {
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
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft animated" data-wow-delay=".5s"
                style="visibility: visible; animation-delay: 0.5s; animation-name: slideInLeft;">
                <li><a href="cart.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Carrito</a></li>
                <li class="active">Confirmación de productos a comprar.</li>
            </ol>
        </div>
    </div>
    <!---->
    <?php
    if (isset($_SESSION['carritoCapullos'])) {
    ?>
    <div class="container">
        <div class="check-out">
            <h2>Confirmación de productos a comprar.</h2>
            <table>
                <tr>
                    <th>Nombre/Descripción</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Total</th>

                </tr>
                <tr>
                    <?php
                        $total = 0;
                        $nombre = "";
                        $fechaEntrega = "";
                        $horaEntrega = "";
                        $arreglocarritoCapullos = $_SESSION['carritoCapullos'];
                        for ($i = 0; $i < count($arreglocarritoCapullos); $i++) {
                            if ($arreglocarritoCapullos[$i]['Precio'] != 0) {
                                $total = $total + ($arreglocarritoCapullos[$i]['Precio'] * $arreglocarritoCapullos[$i]['Cantidad']);
                                $nombre = $nombre . " " . $arreglocarritoCapullos[$i]['Nombre'];
                                $fechaEntrega = $arreglocarritoCapullos[$i]['Fecha'];
                                $horaEntrega  = $arreglocarritoCapullos[$i]['Hora'];
                        ?>
                    <td class="ring-in">
                        <form action="single.php" method="post">
                            <input type="hidden" name="id_product" id="id_product" class="form-control"
                                value="<?php echo $arreglocarritoCapullos[$i]['Id']; ?>">

                            <button type="submit" style="padding: 0;border: none; background: none;" class=""> <a
                                    class="at-in"><img
                                        src="uploads/product/<?php echo $arreglocarritoCapullos[$i]['Imagen']; ?>"
                                        class="img-responsive" alt=""></a>
                                <div class="sed">
                                    <h5><?php echo $arreglocarritoCapullos[$i]['Nombre']; ?></h5>
                                    <p>(<?php echo $arreglocarritoCapullos[$i]['Decripcion']; ?>) </p>
                            </button>

        </div>
        <div class="clearfix"> </div>
        </form>
        </td>
        <td> <?php echo $arreglocarritoCapullos[$i]['Cantidad']; ?></td>

        <td>$COP <?php echo numberCOP($arreglocarritoCapullos[$i]['Precio']); ?></td>
        <td class="cant<?php echo $arreglocarritoCapullos[$i]['Id']; ?>">
            $COP
            <?php echo numberCOP($arreglocarritoCapullos[$i]['Precio'] * $arreglocarritoCapullos[$i]['Cantidad']); ?>
        </td>

        </tr>

        <?php }
                        } ?>
        <td>
            <h2>Total: $COP <?php echo numberCOP($total); ?></h2>
        </td>

        <th></th>
        <!--<th></th>-->


        <td><?php if ($_POST['tranferBanco'] == "EPAYCO") { ?>
            <h2>Presione el botón para finalizar con el pago.</h2>
            <h2>
                <form method="POST">
                    <input type="hidden" name="id_user" id="id_user" class="form-control"
                        value=" <?php echo $_POST['id_user']; ?>">
                    <input type="hidden" name="namesC" id="namesC" class="form-control"
                        value=" <?php echo $_POST['namesC']; ?>">
                    <input type="hidden" name="lastNamesC" id="lastNamesC" class="form-control"
                        value=" <?php echo $_POST['lastNamesC']; ?>">
                    <input type="hidden" name="phoneC" id="phoneC" class="form-control"
                        value=" <?php echo $_POST['phoneC']; ?>">
                    <input type="hidden" name="emailC" id="emailC" class="form-control"
                        value=" <?php echo $_POST['emailC']; ?>">
                    <input type="hidden" name="namesE" id="namesE" class="form-control"
                        value=" <?php echo $_POST['namesE']; ?>">
                    <input type="hidden" name="lastNamesE" id="lastNamesE" class="form-control"
                        value=" <?php echo $_POST['lastNamesE']; ?>">
                    <input type="hidden" name="countryE" id="countryE" class="form-control" value="Colombia">
                    <input type="hidden" name="stateE" id="stateE" class="form-control"
                        value=" <?php echo $_POST['stateE']; ?>">
                    <input type="hidden" name="cityE" id="cityE" class="form-control"
                        value=" <?php echo $_POST['cityE']; ?>">
                    <input type="hidden" name="addressE1" id="addressE1" class="form-control"
                        value=" <?php echo $_POST['addressE1']; ?>">
                    <input type="hidden" name="addressE2" id="addressE2" class="form-control"
                        value=" <?php echo $_POST['addressE2']; ?>">
                    <input type="hidden" name="phoneE" id="phoneE" class="form-control"
                        value=" <?php echo $_POST['phoneE']; ?>">
                    <input type="hidden" name="notaE" id="notaE" class="form-control"
                        value=" <?php echo $_POST['notaE']; ?>">
                    <?php
                    $PUBLIC_KEY = '640a5d2c00e66441cc139c071e23f983';

                    $PRIVATE_KEY = '56b59064715c0c415b9255b8a7e48dde';

                    echo "
        <script
        
            src='https://checkout.epayco.co/checkout.js'
            class='epayco-button'
            data-epayco-key='$PUBLIC_KEY'
            data-epayco-private-key='$PUBLIC_KEY'
            data-epayco-amount='$total'
            data-epayco-name='$nombre'
            data-epayco-description='$nombre'
            data-epayco-currency='cop'
            data-epayco-country='co'
            data-epayco-test='false'
            data-epayco-external='false'  
            data-epayco-extra1='EPAYCO'   
             data-epayco-extra2='" . $_POST['namesE'] . " " . $_POST['lastNamesE'] . "'  
             data-epayco-extra3='Colombia'  
             data-epayco-extra4='" . $_POST['stateE'] . "'  
             data-epayco-extra5='" . $_POST['cityE'] . "'  
             data-epayco-extra6='" . $_POST['addressE1'] . "'   
             data-epayco-extra7='" . $_POST['addressE2'] . "'  
             data-epayco-extra8='" . $_POST['phoneE'] . "'  
             data-epayco-extra9='" . $_POST['notaE'] . "'  
             data-epayco-extra10='" . $_POST['id_user'] . "'  
             data-epayco-extra11='" . $fechaEntrega . "'  
             data-epayco-extra12='" . $horaEntrega . "'  
             data-epayco-button='Assets/images/button_ir-al-banco (2).png'
             data-epayco-name-billing='" . $_POST['namesC'] . "'  
             data-epayco-mobilephone-billing='" . $_POST['phoneC'] . "'  
             data-epayco-email-billing='" . $_POST['emailC'] . "'  

            data-epayco-response='http://localhost/capullos/responseTransaction.php'
        </script>
        <script src='' async defer></script>"
                    ?>
                </form>
            </h2>
            <?php } ?>
            <?php if ($_POST['tranferBanco'] == "PAYPAL") { ?>
            <h2>Pagar con paypal</h2>
            </h2>
            <?php } ?>
        </td>
        </table>
        <a class="acount-btn" href="javascript:history.back()"> Ir atrás </a>
        <div class="clearfix"> </div>
        <img>
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

</body>

</html>