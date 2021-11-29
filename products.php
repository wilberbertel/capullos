<?php
require_once("includes/load.php");
$totalProducts = countProducts();
$ultimos = allProducts(5);
$categories = allCategories();
$occasions = allOccasionsByCategory();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Productos | Capullos</title>
        <link href="Assets/css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' />
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="Assets/js/jquery.min.js"></script>
        <link rel="shortcut icon" href="Assets/images/favicon.ico">
        <link rel="stylesheet" type="text/css" href="Assets/css/myStyle.css">
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
                    <li class="active">Productos</li>
                </ol>
            </div>
        </div>
        <!--content-->
        <div class="products">
            <div class="container">
                <?php echo display_msg($msg); ?>
                <h2>Todos los productos (<?php echo $totalProducts['total']; ?>)</h2>
                <div class="col-md-9">
                    <?php
                    $limite = 12; //productos por pagina
                    $totalQuery = countProducts();
                    $totalBotones = round($totalQuery['total'] / $limite);
                    if (isset($_GET['limite']) && is_numeric($_GET['limite'])) {
                        $resultado = allProducts2($_GET['limite'], $limite);
                    } else {
                        $resultado = allProducts($limite);
                    }
                    foreach ($resultado as $productos) :?>
                        <div class="col-md-4">
                            <div class="col-md1 simpleCart_shelfItem">		
                                <img class="img-responsive" style="height: 320px; width: 90%; display: block;"
                                 src="uploads/product/<?php echo $productos['image_product']; ?>" alt="" />
                                <h3><?php echo $productos['namep']; ?></a></h3>
                                <div class="price">
                                    <form action="single.php" method="post">
                                        <input type="hidden" name="id_product"  id="id_product" class="form-control"  
                                        value="<?php echo $productos['id_product']; ?>">
                                        <h5 class="item_price">$COP <?php echo numberCOP($productos['price']); ?></h5>                       
                                        <button type="submit"  class="button buttonVerDetalles">Ver Detalles</button> 
                                        <div class="clearfix"> </div>
                                    </form>
                                </div>
                            </div>
                            <br>
                        </div>	
                    <?php endforeach;?>
                </div>


                <div class="col-md-3 product-bottom">
                    <!--categories-->
                    <div class=" rsidebar span_1_of_left">
                        <h3 class="cate">Categorías</h3>
                        <?php foreach ($categories as $categorias) : ?>
                            <ul class="menu-drop">
                                <li class="item1"><a href="productsCategory.php?name=<?php echo $categorias['name'] ?>"><?php echo $categorias['name'] ?> </a>  </li>
                            </ul>
                        <?php endforeach; ?>
                    </div>


                    <div class="product-bottom">
                        <h3 class="cate">Últimos productos</h3>
                        <?php foreach ($ultimos as $productos) : ?>
                            <form action="single.php" method="post">
                                <input type="hidden" name="id_product"  id="id_product" class="form-control"  value="<?php echo $productos['id_product']; ?>">

                                <div class="product-go">
                                    <div class=" fashion-grid">
                                        <button type="submit"  style="border: none; outline: none;" class=""><img class="img-responsive " src="uploads/product/<?php echo $productos['image_product']; ?>" alt=""></a>	
                                            </div>
                                            </form>
                                            <div class=" fashion-grid1">
                                                <h6 class="best2"><?php echo $productos['namep']; ?></h6>
                                                <h6 class="best2"><?php echo $productos['name']; ?></h6>
                                                <span class=" price-in1"> $COP <?php echo numberCOP($productos['price']); ?> </span>
                                            </div>	
                                            <div class="clearfix"> </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>						
                    </div>
                </div>
                <div class="bs-component col-md-12 text-center">	
                    <div>
                        <ul class="pagination">

                            <?php
                            if (isset($_GET['limite']) && is_numeric($_GET['limite'])) {
                                if ($_GET['limite'] > 0) {
                                    echo '<li class="page-item "><a class="page-link" href="products.php?limite=' . ($_GET['limite'] - 12) . '">«</a></li>';
                                }
                            }
                            for ($i = 0; $i < $totalBotones; $i++) {
                                echo '<li class="page-item "><a class="page-link"  href="products.php?limite=' . ($i * 12) . '">' . ($i + 1) . '</a></li>';
                            }
                            if (isset($_GET['limite']) && is_numeric($_GET['limite'])) {
                                if ($_GET['limite'] + 12 < $totalBotones * 12) {
                                    echo '
					  <li class="page-item "><a class="page-link" href="products.php?limite=' . ($_GET['limite'] + 12) . '">»</a></li>';
                                }
                            } else {
                                echo '
					<li class="page-item "><a class="page-link" href="products.php?limite=12">»</a></li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>


            </div>	
        </div>			
    </div>
</div>
<div class="clearfix"> </div>
</div>

</div>
<!--//content-->
<?php require_once('layout/footer.php'); ?>

</body>
</html>