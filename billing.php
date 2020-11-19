<?php 
require_once("includes/load.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Pagar :: Capullos floristeria</title>
<link rel="shortcut icon" href="Assets/images/favicon.ico">
<link rel="stylesheet" type="text/css" href="Assets/css/myStyle.css">
<link href="Assets/css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' />
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
<!--//header-->
<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInLeft;">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li><a href="cart.php">Carrito</a></li>
				<li class="active">Pagar</li>
			</ol>
		</div>
	</div>
	<div class="account">
	<form action="pruebas.php" method="post">
	<div class="container">
		<h2>Iniciar sesion</h2>
		<?php echo display_msg($msg); ?>
		<?php if ($session->isUserLoggedIn(true)) { ?>
			<div class="account_grid">
			   <div class="col-md-4 login-right">					
				   <h4>DATOS DEL COMPRADO</h4>
				   <br>	
				   <input type="hidden" name="id_user"  id="id_user" class="form-control"  value="<?php echo $user['id_users'];?>">

				   <div class="col-md-6">	
					<span>NOMBRES *</span>
					<input type="text" name="namesC"   value= "<?php echo $user['name']?>"  disabled> 
					</div>
					<div class="col-md-6">	
					<span>APELLIDOS *</span>
					<input type="text" name="lastNamesC"   value= "<?php echo $user['surname']?>" disabled> 
					</div>
					<div class="col-md-6">	
					<span>TELEFONO *</span>
					<input type="text" name="phoneC"   value= "<?php echo $user['phone']?>"  pattern="[0-9]{10}" disabled> 
					</div>
					<div class="col-md-6">	
					<span>CORREO *</span>
					<input type="text" name="emailC"   value= "<?php echo $user['email']?>"  pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" disabled> 
					
					</div>
					<h4><hr>.</h4>
					<hr>
					<br>
					<h4>DATOS DE ENVIO</h4>
					<span>NOMBRES * </span>
					<input type="text" name="namesE" required> 
				
					
					<span>APELLIDOS *</span>
					<input type="text" name="lastNamesE" required> 
				
					<span>Pais *</span>
					<input type="text" name="lastNamesE" required> 	
					<span>REGIÓN / PROVINCIA *</span>
					<input type="text" name="lastNamesE" required> 	
					<span>LOCALIDAD / CIUDAD *</span>
					<input type="text" name="lastNamesE" required> 	
					<span>TELÉFONO *</span>
					<input type="text" name="lastNamesE" required> 	
		</div>	
		<?php }else{ ?>
		<div class="account_grid">
			   <div class="col-md-4 login-right">					
				   <h4>DATOS DEL COMPRADO</h4>
				   <br>	
				   <div class="col-md-6">	
					<span>NOMBRES *</span>
					<input type="text" name="namesC" required> 
					</div>
					<div class="col-md-6">	
					<span>APELLIDOS *</span>
					<input type="text" name="lastNamesC" required> 
					</div>
					<div class="col-md-6">	
					<span>TELEFONO *</span>
					<input type="text" name="phoneC" pattern="[0-9]{10}" required> 
					</div>
					<div class="col-md-6">	
					<span>CORREO *</span>
					<input type="text" name="emailC"  pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" required> 
					</div>
					<div class="word-in">
				  		<a class="forgot"  style="cursor:pointer;"  data-toggle="modal" data-target=".bd-example-modal-lg">¿Inicie sesion para llenar datos?</a>	
					  </div>
					  <br>
					  <h4>DATOS DE ENVIO</h4>
					
					<span>NOMBRES * </span>
					<input type="text" name="namesE" required> 
				
					
					<span>APELLIDOS *</span>
					<input type="text" name="lastNamesE" required> 
				
					<span>Pais *</span>
					<input type="text" name="lastNamesE" required> 	
					<span>REGIÓN / PROVINCIA *</span>
					<input type="text" name="lastNamesE" required> 	
					<span>LOCALIDAD / CIUDAD *</span>
					<input type="text" name="lastNamesE" required> 	
					<span>TELÉFONO *</span>
					<input type="text" name="lastNamesE" required> 	
		</div>	

		<?php } ?>
			   <div class="col-md-4 login-right">
			   <h4>DETALLES DEL PEDIDO</h4>
			   <?php 
if (isset($_SESSION['carritoCapullos'])) {
?>
    	
		  <?php
                  $total = 0;
                  
                    $arreglocarritoCapullos = $_SESSION['carritoCapullos'];
                      for ($i=0; $i < count($arreglocarritoCapullos); $i++) {  
						  
                        $total = $total + ($arreglocarritoCapullos[$i]['Precio'] * $arreglocarritoCapullos[$i]['Cantidad'])  ;
					  ?>
  <table style=" border: 1px solid #ddd;">
					  
		<tr>
          <th>Producto</th>		
			<th>Sub Total</th>
			<th>Eliminar</th>
		  </tr>
		  <tr>
			<td class="ring-in"><?php echo $arreglocarritoCapullos[$i]['Nombre'];?><img style="width:70px; height:70px;" src="uploads/product/<?php echo $arreglocarritoCapullos[$i]['Imagen'];?>" class="img-responsive" alt=""></a>
			<div class="clearfix"> </div></td>
			<td class="cant<?php echo $arreglocarritoCapullos[$i]['Id'];?>">$COP <?php echo numberCOP($arreglocarritoCapullos[$i]['Precio']*$arreglocarritoCapullos[$i]['Cantidad']);?></td>
			<td><a href="#" class="to-buy btnEliminar" data-id="<?php echo $arreglocarritoCapullos[$i]['Id'];?>">X</a></td>
		  </tr>	
		  <tr>
          <th>DE: </th>		
			<th>MENSAJE: </th>
			<th>PARA:</th>
		  </tr>
		  <tr>
			<td><?php echo $arreglocarritoCapullos[$i]['De'];?></td>
			<td><?php echo $arreglocarritoCapullos[$i]['Mensaje'];?></td>
			<td><?php echo $arreglocarritoCapullos[$i]['Para'];?></td>
		  </tr>			  
		  </table>
		  
  <?php }?>
  <table style=" border: 1px solid #ddd;">
  <tr>
          <th><span>Sub total: </span> </th>		
			<th> </th>
			<th><span> $ COP <?php echo numberCOP($total);?> </span></th>
		  </tr>
		  <tr>
          <th><span>Envio: </span> </th>		
			<th> </th>
			<th><span> $ COP <?php echo numberCOP($total);?> </span></th>
		  </tr>
		  <tr>
          <th><span>Total: </span> </th>		
			<th> </th>
			<th><span> $ COP <?php echo numberCOP($total);?> </span></th>
		  </tr> 
		  </table>

			
<?php }else{
  	echo	"
   
      <h2>Aun no hay productos en el carrito</h2>
      <a class='to-buy' href='products.php'>Ir a ver productos</a>
    ";
}  ?>
  	   </div>	


			    <div class="col-md-4 login-left">
				   <h4>MÉTODO DE PAGO</h4>
				   <br>
					<table >
					<tr>	
					<th><h5> <input type="radio" id="tranferBanco" name="tranferBanco" value="tranferBanco">
					<label for="tranferBanco">TRANSFERENCIA BANCARIA DIRECTA </label></h5> </th>		
					</tr>
					<tr>	
					<th><h5> <input type="radio" id="tranferBanco" name="tranferBanco" value="tranferBanco">
					<label for="tranferBanco">TARJETAS DÉBITO  O CRÉDITO DE COLOMBIA</label></h5> </th>		 
					</tr>
					<tr>	
					<th><h5> <input type="radio" id="tranferBanco" name="tranferBanco" value="tranferBanco">
					<label for="tranferBanco">CUENTA PAYPAL</label></h5> </th>		 
					</tr>
					</table>
					<button type="submit"  class="button buttonVerDetalles">PAGAR</button> 

			   </div>
			
			   <div class="clearfix"> </div>
			   
			 </div>
			 
	</div>
	</form>
</div>

	<!--MODAL INICIAR SESSION-->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
	<div class="modal-body">
	<div class="contact-form">
	<div class="contact">
				<h3>Iniciar sesion</h3>			
								<div class="contact-bottom">
									<div class="col-md-12 ">
									<div class="col-md-12 login-right">
				<form action="auth2billign.php" method="post">

					<span>Dirección de correo electrónico</span>
					<input type="text" name="email" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" required> 
				
					<span>Password</span>
					<input type="password" name="password" required> 
					<div class="word-in">
				  		<a class="forgot" href="#">¿Olvidó su contraseña?</a>
				 		 <input type="submit" value="Ingresar">
				  	</div>
			    </form>
			   </div>
									</div>
									
									<div class="clearfix"> </div>
								</div>
								
						</div>
						</div>
      </div>
	  <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>		
      </div>
    </div>
  </div>
</div>


<?php require_once('layout/footer.php');?>
<script>
    $(document).ready(function(){
      $(".btnEliminar").click(function(event){
        event.preventDefault();
        var id = $(this).data('id');
        var boton = $(this);
      
        $.ajax({
          method: 'POST',
          url: 'eliminarCarrito.php',
          data:{
            id:id
          }
        }).done(function(respuesta){
          boton.parent('td').parent('tr').remove();
          location.reload();
        });
      });
     
    });
  </script>
	</body>
</html>