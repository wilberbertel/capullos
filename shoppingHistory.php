<?php
require_once("includes/load.php");
$user = current_user();
if (!$session->isUserLoggedIn(true)) :
    redirect('index.php', false);
endif;
$shopping = historyShopping($user['id_users']);
?>


<!DOCTYPE html>
<html>
    <head>
        <title> Historial de compras ::  Capullos</title>
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
                    <li><a href="profile.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Perfil</a></li>
                    <li class="active">Historial de compras</li>
                </ol>
            </div>
        </div>
        <!---->
        <
        <div class="container">
            <div class="check-out">
                <h2>Historial de compras</h2>
                <table >
                    <tr>
                        <th>Nombre/Descripción </th>	           	
                        <th>Total</th>
                        <th>Fecha</th>
                        <th>Estado del pedido</th>
                        <th>Ver detalles</th>                           



                    </tr>
                    <tr>

                        <?php
                        if (sizeof($shopping) <= 0) {
                            echo "<div class='container'>
                        <div class='check-out'>
                          <h2>Aun no haz realizado compras.</h2>
                          <a class='to-buy' href='products.php'>Ir a ver productos</a>
                          </div>
                          </div>";
                        }
                        foreach ($shopping as $shopping) :
                            ?>
                            <td class="ring-in"> 
                                <form action="single.php" method="post">
                                    <input type="hidden" name="id_product"  id="id_product" class="form-control"  value="<?php echo $shopping['id_product']; ?>">
                                    <button type="submit"   style="padding: 0;border: none; background: none;"class="">  <a  class="at-in"><img src="uploads/product/<?php echo $shopping['image_product']; ?>" class="img-responsive" alt=""></a>
                                        <div class="sed">
                                            <h5><?php echo $shopping['namep']; ?></h5>
                                            <p>(<?php echo $shopping['description']; ?>) </p></button>
                                    </div>
                                    <div class="clearfix"> </div> </form></td>
                            <td>$COP <?php echo numberCOP($shopping['price']); ?></td>
                            <td ><?php echo $shopping['date']; ?></td>
                            <td ><?php echo $shopping['request_status']; ?></td>
                            <td><button  title="Ver Detalles" class="btn btn-primary btnEditar" 
                                         data-id="<?php echo $shopping['id_product']; ?>"
                                         data-nombreproducto="<?php echo $shopping['namep']; ?>"
                                         data-imagen="<?php echo $shopping['image_product']; ?>"
                                         data-descripcion="<?php echo $shopping['description']; ?>"
                                         data-precio="<?php echo $shopping['price']; ?>"
                                         data-ocaciones="<?php echo $shopping['secondary_sentences']; ?>"
                                         data-pais="<?php echo $shopping['country']; ?>"
                                         data-departamento="<?php echo $shopping['state']; ?>"
                                         data-ciudad="<?php echo $shopping['city']; ?>"
                                         data-dirrecion1="<?php echo $shopping['address1']; ?>" 
                                         data-dirrecion2="<?php echo $shopping['address2']; ?>"  
                                         data-nombres="<?php echo $shopping['names']; ?>"  
                                         data-telefono="<?php echo $shopping['phone']; ?>"  
                                         data-estadopedido="<?php echo $shopping['request_status']; ?>"
                                         data-de="<?php echo $shopping['from']; ?>"   
                                         data-para="<?php echo $shopping['for']; ?>"   
                                         data-mensaje="<?php echo $shopping['message']; ?>"      
                                         data-fecha="<?php echo $shopping['date']; ?>"   
                                         data-cantidad="<?php echo $shopping['quantity']; ?>"   
                                         data-subtotal="<?php echo $shopping['subtotal']; ?>"   
                                         data-monto="<?php echo $shopping['amount']; ?>"   
                                         data-codigoorden="<?php echo $shopping['order_code']; ?>"  
                                         data-status="<?php echo $shopping['status']; ?>"  
                                         data-metodopago="<?php echo $shopping['payment_method']; ?>"  
                                         data-toggle="modal" data-target=".bd-example-modal-lg">Ver Detalles</td>
                        </tr>
                    <?php endforeach; ?>

                    <th></th>		
                    <th></th>
                    <th></th>

                </table>


            </div>
        </div>

        <!--MODAL EDITAR DATOS-->
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="contact-form">
                            <div class="contact">
                                <h3>Detalles de la compra</h3>			

                                <input type="hidden" id="idEdit" name="idEdit">
                                <div class="contact-bottom">
                                    <div class="col-md-4 ">
                                        <span>Imagen del producto</span>
                                        <img id="imgSalida" style="height: 300px; width: 100%; display: block;" src="" alt="Card image">
                                    </div>
                                    <div class="col-md-8 ">
                                        <span>Nombre del producto</span>
                                        <input type="text" name="nameProduct" id="nameProduct"  disabled>
                                    </div>

                                    <div class="col-md-8 in-contact">
                                        <span>Nombre del destinatario</span>
                                        <input type="text" name="nombres" id="nombres"  disabled>
                                    </div>
                                    <div class="col-md-4 in-contact">
                                        <span>De</span>
                                        <input type="text" name="de"  id="de" disabled >
                                    </div>
                                    <div class="col-md-4 in-contact">
                                        <span>Para</span>
                                        <input type="text" name="para"  id="para" disabled >
                                    </div>
                                    <div class="col-md-8 in-contact">
                                        <span>Mensaje</span>
                                        <textarea title="Mensaje"  name="mensaje" id="mensaje" rows="4" cols="50" class="form-control" disabled></textarea>

                                    </div>
                                    <div class="col-md-4 in-contact">
                                        <span>Pais</span>
                                        <input type="text" name="pais"  id="pais" disabled >
                                    </div>
                                    <div class="col-md-4 in-contact">
                                        <span>Departamento</span>
                                        <input type="text" name="departamento" id="departamento"  disabled>
                                    </div>
                                    <div class="col-md-4 in-contact">
                                        <span>Ciudad</span>
                                        <input type="text" name="ciudad" id="ciudad"  disabled>
                                    </div>
                                    <div class="col-md-4 in-contact">
                                        <span>Telefono</span>
                                        <input type="text" name="telefono" id="telefono"  required>
                                    </div>
                                    <div class="col-md-4 in-contact">
                                        <span>Dirreccion 1</span>
                                        <input type="text" name="dirrecion1" id="dirrecion1"  disabled>
                                    </div>
                                    <div class="col-md-4 in-contact">
                                        <span>Dirreccion 2</span>
                                        <input type="text" name="dirrecion2"  id = "dirrecion2" disabled>
                                    </div>
                                    <div class="col-md-4 in-contact">
                                        <span>Estado del producto</span>
                                        <input type="text" name="estadoProducto"  id="estadoProducto" disabled>
                                    </div>
                                    <div class="col-md-4 in-contact">
                                        <span>Estado de la transaccion</span>
                                        <input type="text" name="estadoTransaccion" id="estadoTransaccion"  disabled>
                                    </div>
                                    <div class="col-md-4 in-contact">
                                        <span>Fecha</span>
                                        <input type="text" name="fecha" id="fecha"  disabled>
                                    </div>
                                    <div class="col-md-4 in-contact">
                                        <span>Codigo de orden</span>
                                        <input type="text" name="codigoOrden"  id="codigoOrden" disabled>
                                    </div>

                                    <div class="col-md-4 in-contact">
                                        <span>Metodo de pago</span>
                                        <input type="text" name="metodoPago" id="metodoPago" disabled>
                                    </div>
                                    <div class="col-md-4 in-contact">
                                        <span>Precio</span>
                                        <input type="text" name="precio" id="precio"  disabled>
                                    </div>
                                    <div class="col-md-4 in-contact">
                                        <span>Cantidad</span>
                                        <input type="text" name="cantidad" id="cantidad" disabled>
                                    </div>
                                    <div class="col-md-4 in-contact">
                                        <span>Sub Total</span>
                                        <input type="text" name="subTotal" id="subTotal"  required>
                                    </div>
                                    <div class="col-md-12S in-contact">
                                        <span>Total</span>
                                        <input type="text" name="total" id="total"  required>
                                    </div>
                                    <div class="clearfix"> </div> <div class="clearfix"> </div>
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
                //Editar
                $(".btnEditar").click(function () {
                    idEditar = $(this).data('id');
                    var nombre = $(this).data('nombreproducto');
                    var nombres = $(this).data('nombres');
                    var fecha = $(this).data('fecha');
                    var pais = $(this).data('pais');
                    var departamento = $(this).data('departamento');
                    var ciudad = $(this).data('ciudad');
                    var dirrecion1 = $(this).data('dirrecion1');
                    var dirrecion2 = $(this).data('dirrecion2');
                    var de = $(this).data('de');
                    var imagen = $(this).data('imagen');
                    var para = $(this).data('para');
                    var mensaje = $(this).data('mensaje');
                    var precio = $(this).data('precio');
                    var telefono = $(this).data('telefono');
                    var estadoProducto = $(this).data('estadopedido');
                    var estadoTransaccion = $(this).data('status');
                    var codigoOrden = $(this).data('codigoorden');
                    var metodoPago = $(this).data('metodopago');
                    var cantidad = $(this).data('cantidad');
                    var subTotal = $(this).data('subtotal');
                    var total = $(this).data('monto');
                    $("#nameProduct").val(nombre);
                    $("#nombres").val(nombres);
                    $("#pais").val(pais);
                    $("#departamento").val(departamento);
                    $("#ciudad").val(ciudad);
                    $("#dirrecion1").val(dirrecion1);
                    $("#dirrecion2").val(dirrecion2);
                    $("#de").val(de);
                    $("#fecha").val(fecha);
                    $("#para").val(para);
                    $("#mensaje").append(mensaje);
                    $("#precio").val(precio);
                    $("#telefono").val(telefono);
                    $("#estadoProducto").val(estadoProducto);
                    $("#estadoTransaccion").val(estadoTransaccion);
                    $("#codigoOrden").val(codigoOrden);
                    $("#metodoPago").val(metodoPago);
                    $("#cantidad").val(cantidad);
                    $("#subTotal").val(subTotal);
                    $("#total").val(total);
                    $("#idEdit").val(idEditar);
                    document.getElementById("imgSalida").src = "uploads/product/" + imagen;
        //document.getElementById("imgEdit").src = "../uploads/product/" + imagen;
        //document.getElementById("imgEditar").src = "../uploads/product/" + imagen;
        //$("#idEditarImg").val(idEditar);
                });
            });



        </script>
    </body>
</html>