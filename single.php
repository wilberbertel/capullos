<?php
require_once("includes/load.php");
if(isset($_GET['id_product']) && $_GET['id_product']!=""){
	$product = searchProduct($_GET['id_product']);
	$ultimos = allProducts(5);
	$categories = allCategories();
	$occasions = allOccasionsByCategory();
}else{
	redirect('index.php', false);

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
			   <!-- <li data-thumb="uploads/product/<?php echo $product['image_product']; ?>">
			         <div class="thumb-image"> <img src="uploads/product/<?php echo $product['image_product']; ?>" data-imagezoom="true" class="img-responsive"> </div>
			    </li>
			    <li data-thumb="uploads/product/<?php echo $product['image_product']; ?>">
			       <div class="thumb-image"> <img src="uploads/product/<?php echo $product['image_product']; ?>" data-imagezoom="true" class="img-responsive"> </div>
			    </li> -->
			  </ul>
		</div>
	</div>	
<div class="col-md-7 single-top-in">
						<div class="single-para simpleCart_shelfItem">
							<h2><?php echo $product['namep']; ?></h2>
							<p><?php echo $product['description']; ?></p>
							<div class="star-on">
							<p>Ocacion: <?php echo $product['name_ocaciones']; ?></p>
								<div class="review">
									<!--<a href="#"> 3 reviews </a>/
									<a href="#">  Write a review</a>-->
								</div>
							<div class="clearfix"> </div>
							</div>
							
								<label  class="add-to item_price">$ <?php echo $product['price']; ?></label>
							
							<div class="available">
								<h6>ESCRIBE TU MENSAJE O DEDICATORIA</h6>
							
								<textarea title="mensaje" rows="4" cols="50" name="mensaje" placeholder="Mensaje" id="mensaje" class="form-control" required></textarea>
								<!--<ul>
									
								<li>Size:<select>
									<option>Large</option>
									<option>Medium</option>
									<option>small</option>
									<option>Large</option>
									<option>small</option>
								</select></li>
								<li>Cost:
										<select>
										<option>U.S.Dollar</option>
										<option>Euro</option>
									</select></li>
							</ul>-->
						</div>
								<a href="#" class="cart">Añadir al carrito</a>
						</div>
					</div>			
</div>
<!----->
<div class="col-md-3 product-bottom">
			<!--categories-->
				<div class=" rsidebar span_1_of_left">
						<h3 class="cate">Categorias</h3>
						<?php foreach ($categories as  $categorias) : ?>
							 <ul class="menu-drop">
							<li class="item1"><a href="#"><?php echo $categorias['name']?> </a>
							
								<ul class="cute">
								<?php foreach ($occasions as  $occasiones) :
                                if ($occasiones['name'] ==  $categorias['name']) {
                                    ?>
									<li class="subitem1"><a href="single.html"><?php echo $occasiones['name_ocaciones']?></a></li>
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
							<span class=" price-in1"> $ <?php echo $productos['price']; ?> COP</span>
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
	
</body>
</html>
				


