<?php
require_once("includes/load.php");
$user = current_user();
$tipo = page_require_tipo($user['type']);
if(isset($_SESSION['carritoCapullos']) ){
    if(isset($_POST['id_product'])){
      $arreglo = $_SESSION['carritoCapullos'];
      $encontro = false;
      $numero = 0;
      for ($i=0; $i <count($arreglo) ; $i++) { 
       if($arreglo[$i]['Id'] == $_POST['id_product']){
          $encontro =true;
          $cantidad = $i;
       }
      }
      if ($encontro==true) {
        $arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']+1;
        $_SESSION['carritoCapullos']= $arreglo;
        header("Location: cart.php");
      }else{
        //NO ESTABA EL REGISTRO
	  $nombre = "";
	  $descripcion = "";
	  $mensaje = "";
      $precio = "";
      $imagen = "";
	  $res =  searchProduct($_POST['id_product']);
      $nombre = $res['namep'];
	  $descripcion = $res['description'];
	  $mensaje = $_POST['mensaje'];
	  $precio =$res['price'];
	  $imagen = $res['image_product'];

      $arregloNuevo = array(
		'Id'=>$_POST['id_product'],
		'Nombre'=>$nombre,
		'Decripcion'=>$descripcion,
		'Mensaje'=>$mensaje,
		'Precio'=>$precio,
		'Imagen'=>$imagen,
		'Cantidad'=>1
      );
      }
      array_push($arreglo,$arregloNuevo);
      $_SESSION['carritoCapullos']=$arreglo;
      header("Location: cart.php");
    }
}else{
  if (isset($_POST['id_product'])) {
	$nombre = "";
	$descripcion ="";
	$mensaje = "";
    $precio = "";
    $imagen = "";
    $res =  searchProduct($_POST['id_product']);
 
	$nombre = $res['namep'];
	$descripcion = $res['description'];
	$mensaje = $_POST['mensaje'];
	$precio =$res['price'];
	$imagen = $res['image_product'];

    $arreglo[] = array(
      'Id'=>$_POST['id_product'],
	  'Nombre'=>$nombre,
	  'Decripcion'=>$descripcion,
	  'Mensaje'=>$mensaje,
      'Precio'=>$precio,
      'Imagen'=>$imagen,
      'Cantidad'=>1
    );
    $_SESSION['carritoCapullos']=$arreglo;
    header("Location: cart.php");
  }
}

?>
<!DOCTYPE html>
<html>
<head>
<title> Carrito de compras :: Capullos</title>
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
				<li class="active">Carrito</li>
			</ol>
		</div>
	</div>
<!---->
<div class="container">
	<div class="check-out">
		<h2>Carrito</h2>
    	    <table >
		  <tr>
			<th>Nombre/Descripcion</th>
			<th>Cantidad</th>		
			<th>Precio</th>		
			<th>Sub Total</th>
			<th>Eliminar</th>
		  </tr>
		  <tr>
		  <?php
                  $total = 0;
                  if (isset($_SESSION['carritoCapullos'])) {
                    $arreglocarritoCapullos = $_SESSION['carritoCapullos'];
                      for ($i=0; $i < count($arreglocarritoCapullos); $i++) {  
                        $total = $total + ($arreglocarritoCapullos[$i]['Precio'] * $arreglocarritoCapullos[$i]['Cantidad'])  ;
                      ?>
			<td class="ring-in"><a href="single.php?id_product=<?php echo $arreglocarritoCapullos[$i]['Id'];?>" class="at-in"><img src="uploads/product/<?php echo $arreglocarritoCapullos[$i]['Imagen'];?>" class="img-responsive" alt=""></a>
			<div class="sed">
				<h5><?php echo $arreglocarritoCapullos[$i]['Nombre'];?></h5>
				<p>(<?php echo $arreglocarritoCapullos[$i]['Decripcion'];?>) </p>
			
			</div>
			<div class="clearfix"> </div></td>
			<td class="check">  
                          <button class="btn btn-outline-primary js-btn-minus btnIncremental" type="button">&minus;</button>
                        
                        <input type="text" class="form-control text-center txtCantidad"
                        data-precio ="<?php echo $arreglocarritoCapullos[$i]['Precio'];?>" 
                        data-id ="<?php echo $arreglocarritoCapullos[$i]['Id'];?>"
                        value="<?php echo $arreglocarritoCapullos[$i]['Cantidad'];?>"
                          placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                      
                          <button class="btn btn-outline-primary js-btn-plus btnIncremental" type="button">&plus;</button>
                        </td>		
			<td>$<?php echo numberCOP($arreglocarritoCapullos[$i]['Precio']);?></td>
			<td>$<?php echo numberCOP($arreglocarritoCapullos[$i]['Precio']);?></td>
			<td><a href="#" class="to-buy btnEliminar" data-id="<?php echo $arreglocarritoCapullos[$i]['Id'];?>">X</a></td>
		  </tr>
		  <th></th>		
			<th></th>
			<th></th>
		  <?php } } ?>
		  <td><h2>Total: $<?php echo numberCOP($total);?></h2></td>
	</table>
	<a href="#" class="to-buy">Proceder con la compra $<?php echo numberCOP($total);?></a>
	<div class="clearfix"> </div>
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
          url: './includes/sqlinsert/eliminarCarrito.php',
          data:{
            id:id
          }
        }).done(function(respuesta){
          boton.parent('td').parent('tr').remove();
        });
      });
    

     
    });
  </script>
	</body>
</html>