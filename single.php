<?php
require_once("includes/load.php");
echo is_numeric("jsha");
if(is_numeric($_GET['id_product'])){
if (isset($_GET['id_product']) && $_GET['id_product']!="") {
    $product = searchProduct($_GET['id_product']);
    $ultimos = allProducts(5);
    $categories = allCategories();
    $occasions = allOccasionsByCategory();
    $occasionsByoccasions = 	productByOccassions($product['name_ocaciones']);
    $existeProducto=existProduct($_GET['id_product']);
    if ($existeProducto['total']<1 || !is_numeric($_GET['id_product'])) {
        $session->msg('d', "No se encontro el producto");
        redirect('error.php', false);
    }

}else{
	redirect('index.php', false);

}
}else{
	$session->msg('d', "No se encontro el producto");
	redirect('error.php', false);
}
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $product['namep']?> | Capullos</title>
<link href="Assets/css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' />
<link rel="shortcut icon" href="Assets/images/favicon.ico">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="Assets/js/jquery.min.js"></script>
<!-- Custom Theme files -->
<!--theme-style-->
<link href="Assets/css/style.css" rel="stylesheet" type="text/css" media="all" />	
<link href="Assets/css/myStyle.css" rel="stylesheet" type="text/css" media="all" />	
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
<script src="Assets/js/simpleCart.min.js"> </script>
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
<!--header-->
<?php require_once('layout/header.php');?>
<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInLeft;">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Producto- <?php echo $product['namep']?></li>
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
							<div class="star-on">
								<ul>
									<li><a href="#"><i class="glyphicon glyphicon-star"> </i></a></li>
									<li><a href="#"><i class="glyphicon glyphicon-star"> </i></a></li>
									<li><a href="#"><i class="glyphicon glyphicon-star"> </i></a></li>
									<li><a href="#"><i class="glyphicon glyphicon-star"> </i></a></li>
									<li><a href="#"><i class="glyphicon glyphicon-star"> </i></a></li>
								</ul>
								<div class="review">
									<a href="#">Ocacion: <?php echo $product['name_ocaciones']; ?></a>
								
								</div>
							<div class="clearfix"> </div>
							</div>
							
								<label  class="add-to item_price">$ <?php echo numberCOP($product['price']); ?> COP</label>
							
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
          <div class="col-3">
            <p></p>
          </div>

          <div class="col-12">
		 <!--abre-->		  
		 <div class="col-md-12">
	<div class="col-md-6 grid">		
		<div class="flexslider">
			    <img style="height: 100; width: 100%; display: block;" class="img-responsive" src="uploads/product/<?php echo $product['image_product']; ?>" alt="" />			
		</div>
	</div>	

<div class="col-md-5 single-top-in">
						<div class="single-para simpleCart_shelfItem">
							<h2  ><?php echo $product['namep']; ?></h2>
							<p><?php echo $product['description']; ?></p>
							<div class="star-on">
							<div class="available">
							<input type="hidden" name="id_product"  id="id_product" class="form-control"  value="<?php echo $product['id_product'];?>">

								<h6>ESCRIBE TU MENSAJE O DEDICATORIA</h6>
								<textarea title="OPCIONAL" rows="5" cols="50" name="mensaje" placeholder="Ejemplo: De: pepito plus
								Bienvenido
								Para: Fulanito" id="mensaje" class="form-control" ></textarea>
						</div>
				
							<div class="clearfix"> </div>
							</div>							
								<label  class="add-to item_price">$ <?php echo numberCOP($product['price']); ?>COP</label>
						</div>
					</div>
			</div>
		  <!--cierre-->
          </div>
        </div>
      </div>

      <!--Footer-->
      <div class="modal-footer justify-content-center">
	  <!-- <a   href="cart.php?id_product=<?php echo $product['id_product'];?>" type="submit" name="submit"  style="cursor:pointer;"  class="cart">Agregar al carrito</a>-->
	  <!--<a  style="cursor:pointer;" data-dismiss="modal" class="cart">Cerrar</a> -->
	  
<button type="submit" class="button button1">AGREGAR AL CARRITO</button> 
<button data-dismiss="modal" class="cart">CERRAR</button> 
	  </div>

	</div>
	
    <!--/.Content-->
  </div>
  </form>
</div>
<!-- Modal: modalAbandonedCart-->


<div class="content-top1">
<?php foreach ($occasionsByoccasions as  $occasionsByoccasions) : ?>
				<div class="col-md-4 col-md4">
			
					<div class="col-md1 simpleCart_shelfItem">
						<a href="single.php?id_product=<?php echo $occasionsByoccasions['id_product'];  ?>">
							<img class="img-responsive" src="uploads/product/<?php echo $occasionsByoccasions['image_product']; ?>" alt="" />
						</a>
						<h3><a href="single.php?id_product=<?php echo $occasionsByoccasions['id_product'];  ?>"><?php echo $occasionsByoccasions['namep']; ?></a></h3>
						<div class="price">
								<h5 class="item_price">$ <?php echo numberCOP($occasionsByoccasions['price']); ?>COP</h5>
								<a href="#" class="item_add">Ver detalles</a>
								<div class="clearfix"> </div>
								
						</div>
					
					</div>
				
				</div>	
				<?php endforeach; ?>
					
			
			<div class="clearfix"> </div>
			</div>		
</div>
<div class="col-md-3 product-bottom">
			<!--categories-->
				<div class=" rsidebar span_1_of_left">
						<h3 class="cate">Ocacion por categorias</h3>
						<?php foreach ($categories as  $categorias) : ?>
							 <ul class="menu-drop">
							<li class="item1"><a href="products_category.php"><?php echo $categorias['name']?> </a>					
								<ul class="cute">
								<?php foreach ($occasions as  $occasiones) :
                                if ($occasiones['name'] ==  $categorias['name']) {
                                    ?>
									<li class="subitem1"><a href="products_occasions.php?name=<?php echo $occasiones['name_ocaciones']?>"><?php echo $occasiones['name_ocaciones']?></a></li>
									<?php
                               } 
								endforeach; ?>								
								</ul>
							</li>
						</ul>
						<?php endforeach; ?>
					</div>

				<!--initiate accordion-->
						<script type="text/javascript">
							$(function() {
							    var menu_ul = $('.menu-drop > li > ul'),
							           menu_a  = $('.menu-drop > li > a');
							    menu_ul.hide();
							    menu_a.click(function(e) {
							        e.preventDefault();
							        if(!$(this).hasClass('active')) {
							            menu_a.removeClass('active');
							            menu_ul.filter(':visible').slideUp('normal');
							            $(this).addClass('active').next().stop(true,true).slideDown('normal');
							        } else {
							            $(this).removeClass('active');
							            $(this).next().stop(true,true).slideUp('normal');
							        }
							    });
							
							});
						</script>

		<div class="product-bottom">
						<h3 class="cate">Ultimos Productos</h3>
					<?php	foreach ($ultimos as  $productos) : ?>
					<div class="product-go">
						<div class=" fashion-grid">
							<a href="single.php?id_product=<?php echo $productos['id_product'];  ?>"><img class="img-responsive " src="uploads/product/<?php echo $productos['image_product']; ?>" alt=""></a>	
						</div>
						<div class=" fashion-grid1">
							<h6 class="best2"><a href="single.php?id_product=<?php echo $productos['id_product'];  ?>" ><?php echo $productos['namep']; ?></a></h6>
							<h6 class="best2"><?php echo $productos['name']; ?></h6>
							<span class=" price-in1"> $ <?php echo numberCOP($productos['price']); ?> COP</span>
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
<?php require_once('layout/footer.php');?>
<script src="Assets/js/jquery.min.js"></script>
<script src="Assets/js/imagezoom.js"></script>
<!-- start menu -->
<script type="text/javascript" src="Assets/js/memenu.js"></script>
<script>$(document).ready(function(){$(".memenu").memenu();});</script>
<script src="Assets/js/simpleCart.min.js"> </script>
<!--initiate accordion-->
						<script type="text/javascript">
							$(function() {
							    var menu_ul = $('.menu-drop > li > ul'),
							           menu_a  = $('.menu-drop > li > a');
							    menu_ul.hide();
							    menu_a.click(function(e) {
							        e.preventDefault();
							        if(!$(this).hasClass('active')) {
							            menu_a.removeClass('active');
							            menu_ul.filter(':visible').slideUp('normal');
							            $(this).addClass('active').next().stop(true,true).slideDown('normal');
							        } else {
							            $(this).removeClass('active');
							            $(this).next().stop(true,true).slideUp('normal');
							        }
							    });
							
							});
						</script>
						<!-- FlexSlider -->
  <script defer src="Assets/js/jquery.flexslider.js"></script>
<link rel="stylesheet" href="Assets/css/flexslider.css" type="text/css" media="screen" />

<script>
// Can also be used with $(document).ready()
$(window).load(function() {
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
						$(document).ready(function() {
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
				


