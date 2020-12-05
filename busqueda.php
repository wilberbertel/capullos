
<?php
require_once("includes/load.php");
if (!isset($_POST['busqueda'])) {
    redirect('index.php', false);
    $resultadoBusqueda = $_POST['busqueda'];
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Capullos floristeria</title>
        <link rel="shortcut icon" href="Assets/images/favicon.ico">
        <link href="Assets/css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' />
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="Assets/js/jquery.min.js"></script>
        <!-- Custom Theme files -->
        <!--theme-style-->
        <link href="Assets/css/style.css" rel="stylesheet" type="text/css" media="all" />	
        <link rel="stylesheet" type="text/css" href="Assets/css/myStyle.css">
        <!-- Font-icon css-->
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
             auto: false,
             speed: 500,
             namespace: "callbacks",
             pager: true,
         });
     });
        </script>
        <!-- animation-effect -->
        <link href="Assets/css/animate.min.css" rel="stylesheet"> 
        <script src="Assets/js/wow.min.js"></script>
        <script>
        new WOW().init();
        </script>
        <!-- //animation-effect -->
    </head>
    <body>


        <?php
        require_once('layout/header.php');
        ?>
        <!--banner-->
        <div class="banner">
            <div class="matter-banner">
                <div class="slider">

                    <div class="col-md-6 top-footer animated wow fadeInLeft" data-wow-delay=".5s">
                        <h3>Resultado para:</h3>
                        <div class="social-icons">
                            <h1><?php echo $_POST['busqueda']; ?></h1>
                            <div class="clearfix"></div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
        <!--//banner-->
        <!--content-->
        <br>
        <div class="con-tp">

            <!--//content-->
            <div class="container">
                <div class="c-btm">
                    <div class="content-top1">	
                        <div class="container">
                            <?php
                            $resultado = allProductsSearch($_POST['busqueda']);
                            if (mysqli_num_rows($resultado) > 0) {
                                foreach ($resultado as $productos) :
                                    ?>

                                    <div class="col-md-3  animated wow fadeInLeft" data-wow-delay=".5s">
                                        <div class="col-md1 simpleCart_shelfItem">

                                            <img class="img-responsive" src="uploads/product/<?php echo $productos['image_product']; ?>" alt="" />
                                            </a>

                                            <h3><?php echo $productos['namep']; ?></a></h3>
                                            <div class="price">
                                                <form action="single.php" method="post">
                                                    <input type="hidden" name="id_product"  id="id_product" class="form-control"  value="<?php echo $productos['id_product']; ?>">

                                                    <h5 class="item_price">$ <?php echo numberCOP($productos['price']); ?> COP</h5>
                                                    <!--<a  style="cursor:pointer;" type="submit" class="enviar"  data-id="<?php echo $productos['id_product']; ?>"
                                                    
                                                    >Ver detalles</a>-->
                                                    <button type="submit"  class="button buttonVerDetalles">Ver Detalles</button> 
                                                    <div class="clearfix"> </div>
                                                </form>
                                            </div>
                                        </div>
                                        <br>
                                    </div>	
                                    <?php
                                endforeach;
                            }else {
                                echo '<h1>Sin resultados</h1>';
                            }
                            ?>
                        </div>	
                    </div>			
                </div>
            </div>
            <!--CIERRE-->	   

            <?php require_once('layout/footer.php'); ?>

    </body>
</html>