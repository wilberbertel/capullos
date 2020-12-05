<?php
require_once("includes/load.php");
$states = allStateActive();
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
            <form action="pay.php" method="POST">
                <div class="container">
                    <h2>Iniciar sesion</h2>
                    <?php echo display_msg($msg); ?>
                    <?php if ($session->isUserLoggedIn(true)) { ?>
                        <div class="account_grid">
                            <div class="col-md-4 login-right">					
                                <h4>DATOS DEL COMPRADO</h4>
                                <br>	
                                <input type="hidden" name="id_user"  id="id_user" class="form-control"  value="<?php echo $user['id_users']; ?>">

                                <div class="col-md-6">	
                                    <span>NOMBRES *</span>
                                    <input type="text" name="namesC"   value= "<?php echo $user['name'] ?>"  disabled> 
                                </div>
                                <div class="col-md-6">	
                                    <span>APELLIDOS *</span>
                                    <input type="text" name="lastNamesC"   value= "<?php echo $user['surname'] ?>" disabled> 
                                </div>
                                <div class="col-md-6">	
                                    <span>TELEFONO *</span>
                                    <input type="text" name="phoneC"   value= "<?php echo $user['phone'] ?>"  pattern="[0-9]{10}" disabled> 
                                </div>
                                <div class="col-md-6">	
                                    <span>CORREO *</span>
                                    <input type="text" name="emailC"   value= "<?php echo $user['email'] ?>"  pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" disabled> 

                                </div>
                                <h4><hr>.</h4>
                                <hr>
                                <b>
                                <h4>DATOS DE ENVIO</h4>
                                <div class="col-md-12">	
                                    <span>NOMBRES * </span>
                                <input type="text" name="namesE" required> 


                                <span>APELLIDOS *</span>
                                <input type="text" name="lastNamesE" required> 

                                <span>Pais *</span>
                                    <select  style="width:310px;" title="Pais" name="countryE" id="countryE" class="form-control" disabled>   
                                        <option value="COL" >Colombia</option> 
                                    </select> 
                                    <span>REGIÓN / PROVINCIA *</span>
                                    <select  style="width:310px;" name="stateE" id="stateE" class="form-control"    required>
                                   
                                        <?php foreach ($states as $state): ?>
                                            <option value="<?php echo $state['id']; ?>"><?php echo $state['name_state']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <span>LOCALIDAD / CIUDAD *</span>
                                    <select  style="width:310px;" id="cityE" class="form-control" name="cityE" required>
                                        <option value="">-- SELECCIONE --</option>
                                    </select>
                                    <span>Dirrecion  *</span>
                                <input type="text" name="addressE1" required> 	
                                <span>Dirrecion 2 (OPCIONAL)</span>
                                <input type="text" name="addressE2" > 	
                                <span>TELÉFONO *</span>
                                <input type="text" name="phoneE"   pattern="[0-9]{10}" required> 	
                                </div>
                                <div class="col-md-12">	
                                <span>NOTAS DEL PEDIDO (OPCIONAL)</span>
                                <textarea  style="width:310px;" id="notaE" name="notaE" rows="4" cols="50" required>	</textarea>
                                </div>
                            </div>	
                        <?php } else { ?>
                            <div class="account_grid">
                                <div class="col-md-4 login-right">					
                                    <h4>DATOS DEL COMPRADO</h4>
                                    <br>	
                                    <input type="hidden" name="id_user"  id="id_user" class="form-control"  value="INVALIDO">

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
                                    <div class="col-md-12">	
                                    <span>NOMBRES * </span>
                                <input type="text" name="namesE" required> 


                                <span>APELLIDOS *</span>
                                <input type="text" name="lastNamesE" required> 

                                <span>Pais *</span>
                                    <select  style="width:310px;" title="Pais" name="countryE" id="countryE" class="form-control" disabled>   
                                        <option value="COL" >Colombia</option> 
                                    </select> 
                                    <span>REGIÓN / PROVINCIA *</span>
                                    <select  style="width:310px;" name="stateE" id="stateE" class="form-control"   required>
                                    <option value="" >SELECCIONE UN DEPARTAMENTO</option>
                                        <?php foreach ($states as $state): ?>
                                            <option value="<?php echo $state['id']; ?>"><?php echo $state['name_state']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <span>LOCALIDAD / CIUDAD *</span>
                                    <select  style="width:310px;" id="cityE" class="form-control" name="cityE" required>
                                        <option value="">-- SELECCIONE --</option>
                                    </select>
                                    <span>Dirrecion  *</span>
                                <input type="text" name="addressE1" required> 	
                                <span>Dirrecion 2 (OPCIONAL)</span>
                                <input type="text" name="addressE2" > 	
                                <span>TELÉFONO *</span>
                                <input type="text" name="phoneE"   pattern="[0-9]{10}" required> 	
                                </div>
                                <div class="col-md-12">	
                                <span>NOTAS DEL PEDIDO (OPCIONAL)</span>
                                <textarea  style="width:310px;" id="notaE" name="notaE" rows="4" cols="50" required>	</textarea>
                                </div>
                                </div>	

                            <?php } ?>
                            <div class="col-md-4 login-right">
                                <h4>DETALLES DEL PEDIDO</h4>
                                <?php
                                if (isset($_SESSION['carritoCapullos'])) {
                                    ?>

                                    <?php
                                    $total = 0;
                                    $arrayidProduct = Array();
                                    $arreglocarritoCapullos = $_SESSION['carritoCapullos'];
                                    $_SESSION['carritoCapullosCopia'] =       $arreglocarritoCapullos;
                                    for ($i = 0; $i < count($arreglocarritoCapullos); $i++) {
                                      
                                  
                                        $total = $total + ($arreglocarritoCapullos[$i]['Precio'] * $arreglocarritoCapullos[$i]['Cantidad']);
                                        ?>
                                        <table style=" border: 1px solid #ddd;">

                                            <tr>
                                                <th>Producto</th>		
                                                <th>Sub Total</th>
                                                <th>Eliminar</th>
                                            </tr>
                                            <tr>
                                                <td class="ring-in"><?php echo $arreglocarritoCapullos[$i]['Nombre']; ?><img style="width:70px; height:70px;" src="uploads/product/<?php echo $arreglocarritoCapullos[$i]['Imagen']; ?>" class="img-responsive" alt=""></a>
                                                    <div class="clearfix"> </div></td>
                                                <td class="cant<?php echo $arreglocarritoCapullos[$i]['Id']; ?>">$COP <?php echo numberCOP($arreglocarritoCapullos[$i]['Precio'] * $arreglocarritoCapullos[$i]['Cantidad']); ?></td>
                                                <td><a href="#" class="to-buy btnEliminar" data-id="<?php echo $arreglocarritoCapullos[$i]['Id']; ?>">X</a></td>
                                            </tr>	
                                            <tr>
                                                <th>DE: </th>		
                                                <th>MENSAJE: </th>
                                                <th>PARA:</th>
                                            </tr>
                                            <tr>
                                                <td><?php echo $arreglocarritoCapullos[$i]['De']; ?></td>
                                                <td><?php echo $arreglocarritoCapullos[$i]['Mensaje']; ?></td>
                                                <td><?php echo $arreglocarritoCapullos[$i]['Para']; ?></td>
                                            </tr>			  
                                        </table>

                                    <?php } ?>
                                    <table style=" border: 1px solid #ddd;">
                                        <tr>
                                            <th><span>Sub total: </span> </th>		
                                            <th> </th>
                                            <th><span> $ COP <?php echo numberCOP($total); ?> </span></th>
                                        </tr>
                                        <tr>
                                            <th><span>Envio: </span> </th>		
                                            <th> </th>
                                            <th><span> $ COP <?php echo numberCOP($total); ?> </span></th>
                                        </tr>
                                        <tr>
                                            <th><span>Total: </span> </th>		
                                            <th> </th>
                                            <th><span> $ COP <?php echo numberCOP($total); ?> </span></th>
                                        </tr> 
                                    </table>


                                <?php
                                } else {
                                    echo "   
                                <h2>Aun no hay productos en el carrito</h2>
                                <a class='to-buy' href='products.php'>Ir a ver productos</a>
                                ";
                                }
                                ?>
                            </div>	


                            <div class="col-md-4 login-left">
                                <h4>MÉTODO DE PAGO</h4>
                                <br>
                                <table >
                                    <tr>	
                                        <th> <input type="radio" id="tranferBancoEpayco" name="tranferBanco" value="EPAYCO" >                                    
                                        <label for="tranferBanco1">TRANSFERENCIA BANCARIA DIRECTA </label>                                                                                                                            
                                         Pague con Giros en Efecty o Super Giros, Wester Union / Transferencia en Bancolombia, DaviPlata, Nequi o BBVA.	
                                         </th>	 
                                          </tr>  
                                                                     
                                    <tr>	
                                    <th> <input type="radio" id="tranferBancoPaypal" name="tranferBanco" value="PAYPAL" >                                    
                                  <label for="tranferBanco2">CUENTA PAYPAL </label>                                                                                                                   
                                         </th>		 
                                    </tr>
                                </table>  
             
                                <button type="submit"  class="button buttonVerDetalles">PAGAR</button>                                                        
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


<?php require_once('layout/footer.php'); ?>
        <script>
            $(document).ready(function () {
                $("#stateE").change(function () {
                    $.get("includes/sqlinsert/get_cities.php", "stateE=" + $("#stateE").val(), function (data) {
                        $("#cityE").html(data);
                        console.log(data);
                    });
                });
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

         /*   var checkbox = document.getElementById('tranferBancoPaypal');
checkbox.addEventListener( 'change', function() {
    if(this.checked) {
       alert('checkbox esta paypal');
    }
});

var checkbox2 = document.getElementById('tranferBancoEpayco');
checkbox2.addEventListener( 'change', function() {
    if(this.checked) {
       alert('checkbox epayco');
    }

});*/
        </script>
 <!--initiate accordion-->
 <script type="text/javascript">
                        $(function () {
                            var menu_ul = $('.menu-drop > li > ul'),
                                    menu_a = $('.menu-drop > li > a');
                            menu_ul.hide();
                            menu_a.click(function (e) {
                                e.preventDefault();
                                if (!$(this).hasClass('active')) {
                                    menu_a.removeClass('active');
                                    menu_ul.filter(':visible').slideUp('normal');
                                    $(this).addClass('active').next().stop(true, true).slideDown('normal');
                                } else {
                                    $(this).removeClass('active');
                                    $(this).next().stop(true, true).slideUp('normal');
                                }
                            });

                        });
                    </script>
              
    </body>
</html>