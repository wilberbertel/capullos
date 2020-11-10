<?php 
include "includes/load.php";
?>
<!DOCTYPE html>
<html>
<head>
<title> Registrar | Capullos</title>
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
<?php 
require_once('layout/header.php');
?>
<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInLeft;">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Registro</li>
			</ol>
		</div>
	</div>
<div class="container">
	<div class=" ">
		<h2>Registrarme</h2>
		<?php echo display_msg($msg); ?>
				<div class="register-but">
				<form action="includes/sqlinsert/register_user.php" method="post">
				 <div class="col-md-6  register-top-grid">
					<div class="mation">
						<span>Nombres</span>
						<input  required title= "Nombres" placeholder="Ejemplo: Adrian Andres" type="text" name="firstname" required > 
					
						<span>Apellidos</span>
						<input  required title= "Apellidos" placeholder="Ejemplo: Atencia Caly" type="text" name="lastname"> 
					 
						 <span>Correo electronico</span>
						 <input  required title= "Correo" placeholder="Ejemplo: correoelectronico@gmail.com" type="text" name="email"> 
                         
                         <span>Confirmacion  de correo electronico</span>
						 <input   required title= "Confirmacion de correo" placeholder="Ejemplo: correoelectronico@gmail.com" type="text" name="emailConfi"> 

                         <span>Dirreccion 1</span>
						 <input required title= "Dirrecion" placeholder="Ejemplo: CR 19A # 32-21" type="text" name="address1"> 
						 
                         <span>Dirreccion 2 (OPCIONAL)</span>
						 <input  title= "Dirrecion 2" placeholder="Ejemplo: CR 19A # 32-21"  type="text" name="address2"> 	
						
						 <span>Pais</span>
						 <select title="Pais" name="country" id="country" class="form-control" required>   
                  <option value="Colombia" >Colombia</option> 
				  <option value="Argentina" >Argentina</option>
				  <option value="Argentina" >Argentina</option> 
				  <option value="Argentina" >Argentina</option>  
                  </select> 
					
						<span>Departamento</span>
						<input  required title= "Departamento"  type="text" name="departament"> 
					 
						 <span>Ciudad</span>
						 <input  required title= "Ciudad"  type="text" name="city"> 
                         
                         <span>Telefono / Celular</span>
						 <input required title= "Celular" placeholder="Ejemplo: 3107809210" type="text" name="phone"> 
						 
					</div>
					
					 <div class="clearfix"> </div>
					   <a class="news-letter" href="#">
						 <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>Sign Up</label>
					   </a>
					 </div>
				
				     <div class="col-md-6 register-bottom-grid">
					 
							<div class="mation">
								<span>Password</span>
								<input required type="password" name="password">
								<span>Confirmacion de Password</span>
								<input  required type="password" name="passwordConfi">
							</div>
					 </div>
					 <div class="clearfix"> </div>
				
			
				
				
				  <input type="submit" value="Registrarme">
					   <div class="clearfix"> </div>
				   </form>
				</div>
		   </div>
</div>

<?php require_once('layout/footer.php');?>

	</body>
</html>