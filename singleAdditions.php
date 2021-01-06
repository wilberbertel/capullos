<?php
require_once("includes/load.php");
//if(is_numeric($_POST['id_product'])){
if (isset($_POST['id_product']) /* && $_POST['id_product']!="" */) {
    $product = searchProductByAdditions($_POST['id_product']);
    $ultimos = allProducts(5);
    $categories = allCategories();
    $occasions = allOccasionsByCategory();
    $occasionsByoccasions = productByOccassions('MAMA');
$additions = productByAdditions();
    $existeProducto = existProduct($_POST['id_product']);
    if ($existeProducto['total'] < 1 || !is_numeric($_POST['id_product'])) {
        $session->msg('d', "No se encontro el producto 1");
        redirect('error.php', false);
    }
} else {
    redirect('index.php', false);
}
/* }else{
  $session->msg('d', "No se encontro el producto 2");
  redirect('error.php', false);
  } */
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $product['namep'] ?> | Capullos</title>
        <link href="Assets/css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' />
        <link rel="shortcut icon" href="Assets/images/favicon.ico">

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="Assets/js/jquery.min.js"></script>
        <!-- Custom Theme files -->
        <!--theme-style-->
        <link href="Assets/css/style.css" rel="stylesheet" type="text/css" media="all" />	
        <link rel="stylesheet" type="text/css" href="Assets/css/myStyle.css">
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
     
    </head>
    <body>
        <!--header-->
<?php require_once('layout/header.php'); ?>
        <div class="breadcrumbs">
            <div class="container">
                <ol class="breadcrumb breadcrumb1 animated wow slideInLeft animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInLeft;">
                    <li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                    <li class="active">Producto- <?php echo $product['namep'] ?></li>
                </ol>
            </div>
        </div>

        <div class="single">

            <div class="container">
                <div class="col-md-9">
                    <div class="col-md-5 grid">		
                        <div class="flexslider">
                            <ul class="slides">
                                <li data-thumb="uploads/product/<?php echo $product['image_product']; ?>">
                                    <div class="thumb-image"> <img src="uploads/product/<?php echo $product['image_product']; ?>" data-imagezoom="true" class="img-responsive"> </div>
                                </li>
                                <li data-thumb="uploads/product/<?php echo $product['image_product']; ?>">
                                    <div class="thumb-image"> <img src="uploads/product/<?php echo $product['image_product']; ?>" data-imagezoom="true" class="img-responsive"> </div>
                                </li>
                                <li data-thumb="uploads/product/<?php echo $product['image_product']; ?>">
                                    <div class="thumb-image"> <img src="uploads/product/<?php echo $product['image_product']; ?>" data-imagezoom="true" class="img-responsive"> </div>
                                </li> 
                            </ul>
                        </div>
                    </div>	

                    <div class="col-md-7 single-top-in">
                        <div class="single-para simpleCart_shelfItem">
                            <h2><?php echo $product['namep']; ?></h2>
                            <p><?php echo $product['description']; ?></p>

                        
                            <label  class="add-to item_price">$COP <?php echo numberCOP($product['price']); ?> </label>

                            <a  style="cursor:pointer;" data-toggle="modal" data-target="#modalAbandonedCart" class="cart">Añadir al carrito</a>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                    <!-- Modal: modalAbandonedCart-->
                    <div class="modal fade right" id="modalAbandonedCart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                         aria-hidden="true" data-backdrop="false">
                        <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-info" role="document">
                            <!--Content-->
                            <div class="modal-content">
                                <!--Header-->
                                <form action="cart.php" method="POST" enctype="multipart/form-data">
                                    <div class="modal-header">
                                        <div class="single-para simpleCart_shelfItem">
                                            <h2>DESEA AÑADIR AL  CARRITO<?php echo $product['namep']; ?> ? </h2>
                                        </div>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true" class="white-text">&times;</span>
                                        </button>
                                    </div>

                                    <!--Body-->
                                    <div class="modal-body">

                                        <div class="row">

                                            <div class="col-12">
                                                <!--abre-->		  
                                                <div class="col-md-12">
                                                    <div class="col-md-6 grid">		
                                                        <div class="flexslider">
                                                            <img style="height: 100; width: 100%; display: block;" class="img-responsive" src="uploads/product/<?php echo $product['image_product']; ?>" alt="" />			
                                                        </div>
                                                        <label  class="add-to item_price">$ <?php echo numberCOP($product['price']); ?> COP</label>

                                                    </div>	

                                                    <div class="col-md-5 single-top-in">
                                                        <div class="single-para simpleCart_shelfItem">
                                                            <h2  ><?php echo $product['namep']; ?></h2>
                                                            <p><?php echo $product['description']; ?></p>
                                                            <div class="star-on">
                                                                <div class="available">
                                                                
                                                                <input type="hidden" name="id_product"  id="id_product" class="form-control"  value="<?php echo $product['id_product']; ?>">          
                                                                <input type="hidden" name="de"  id="de" class="form-control"  value="">          
                                                                <input type="hidden" name="mensaje"  id="mensaje" class="form-control"  value="">          
                                                                <input type="hidden" name="para"  id="para" class="form-control"  value=">">          


                                                                </div>
                                                            </div>							
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--cierre-->
                                            </div>
                                        </div>
                                    </div>

                                    <!--Footer-->
                                    <div class="modal-footer justify-content-center">
                                        <!-- <a   href="cart.php?id_product=<?php echo $product['id_product']; ?>" type="submit" name="submit"  style="cursor:pointer;"  class="cart">Agregar al carrito</a>-->
                                        <!--<a  style="cursor:pointer;" data-dismiss="modal" class="cart">Cerrar</a> -->

                                        <button type="submit" class="button buttonVerDetalles" >AGREGAR AL CARRITO</button> 
                                        <button data-dismiss="modal"class="buttonCerrar">CERRAR</button> 
                                    </div>

                            </div>

                            <!--/.Content-->
                        </div>
                        </form>
                    </div>
                    <!-- Modal: modalAbandonedCart-->


                    <div class="content-top1">
<?php foreach ($occasionsByoccasions as $occasionsByoccasions) : ?>

                            <div class="col-md-4 col-md4">

                                <div class="col-md1 simpleCart_shelfItem">
                                    <img class="img-responsive" src="uploads/product/<?php echo $occasionsByoccasions['image_product']; ?>" alt="" />						
                                    <h3><?php echo $occasionsByoccasions['namep']; ?></h3>
                                    <form action="single.php" method="post">
                                        <input type="hidden" name="id_product"  id="id_product" class="form-control"  value="<?php echo$occasionsByoccasions['id_product']; ?>">

                                        <div class="price">
                                            <h5 class="item_price">$COP <?php echo numberCOP($occasionsByoccasions['price']); ?></h5>
                                            <button type="submit"  class="button buttonVerDetalles">Ver Detalles</button> 
                                            <div class="clearfix"> </div>
                                        </div>
                                    </form>
                                </div>

                            </div>	

<?php endforeach; ?>


                        <div class="clearfix"> </div>
                    </div>		
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
                        <h3 class="cate">Ultimos Productos</h3>
                        <?php foreach ($ultimos as $productos) : ?>
                            <form action="single.php" method="post">
                                <input type="hidden" name="id_product"  id="id_product" class="form-control"  value="<?php echo $productos['id_product']; ?>">

                                <div class="product-go">
                                    <div class=" fashion-grid">
                                        <button type="submit"  class=""><img class="img-responsive " src="uploads/product/<?php echo $productos['image_product']; ?>" alt=""></a>	
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

                    <div class="clearfix"> </div>
                </div>
            </div>



            <!--footer-->
            <?php require_once('layout/footer.php'); ?>
            <script src="Assets/js/jquery.min.js"></script>
            <script src="Assets/js/imagezoom.js"></script>
            <!-- start menu -->
            <script type="text/javascript" src="Assets/js/memenu.js"></script>
            <script>$(document).ready(function () {
                                                        $(".memenu").memenu();
                                                    });</script>
            <script src="Assets/js/simpleCart.min.js"></script>
      
            <!-- FlexSlider -->
            <script defer src="Assets/js/jquery.flexslider.js"></script>
            <link rel="stylesheet" href="Assets/css/flexslider.css" type="text/css" media="screen" />

            <script>
            // Can also be used with $(document).ready()
                                                                $(window).load(function () {
                                                                    $('.flexslider').flexslider({
                                                                        animation: "slide",
                                                                        controlNav: "thumbnails"
                                                                    });
                                                                });
            </script>
            <!---pop-up-box---->
            <link href="Assets/css/popuo-box.css" rel="stylesheet" type="text/css" media="all"/>
            <script src="Assets/js/jquery.magnific-popup.js" type="text/javascript"></script>
            <!---//pop-up-box---->
            <script>
                       $(document).ready(function () {
                           $('.popup-with-zoom-anim').magnificPopup({
                               type: 'inline',
                               fixedContentPos: false,
                               fixedBgPos: true,
                               overflowY: 'auto',
                               closeBtnInside: true,
                               preloader: false,
                               midClick: true,
                               removalDelay: 300,
                               mainClass: 'my-mfp-zoom-in'
                           });

                       });

            </script>	
    </body>
</html>



