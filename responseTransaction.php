<?php
require_once("includes/load.php");
$user = current_user();
$categories = allCategories();
$occasions = allOccasions();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Respuesta epayco | Capullos floristeria</title>
    <link rel="shortcut icon" href="Assets/images/favicon.ico">
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
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <link href='//fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>

<body>
    <div class="header">
        <div class="header-top">
            <div class="container">
                <div class="col-sm-4 logo animated wow fadeInLeft" data-wow-delay=".5s">
                    <h1><a href="index.php">Floristeria <span>Capullos</span></a></h1>
                </div>
                <div class="col-sm-4 world animated wow fadeInRight" data-wow-delay=".5s">
                    <div class="cart box_1">
                        <a href="cart.php">
                            <h3>
                                <div class="total">
                                    <?php
                                    $total = 0;
                                    if (isset($_SESSION['carritoCapullos'])) {
                                        $arreglocarritoCapullos = $_SESSION['carritoCapullos'];
                                        for ($i = 0; $i < count($arreglocarritoCapullos); $i++) {
                                            $total = $total + ($arreglocarritoCapullos[$i]['Precio'] * $arreglocarritoCapullos[$i]['Cantidad']);
                                        }
                                        echo "$ COP " . numberCOP($total) . " ";
                                    } else {
                                        echo "$ COP " . numberCOP(0) . " ";
                                    }
                                    ?></div>
                                <img src="Assets/images/cart.png" alt="" />
                            </h3>
                        </a>
                        <p><a href="cart.php">Ver carrito</a></p>

                    </div>
                </div>
                <div class="col-sm-2 number animated wow fadeInRight" data-wow-delay=".5s">
                    <div class="btn-whatsapp">
                        <a href="https://api.whatsapp.com/send?phone=+573226163368" target="_blank">
                            <img src="Assets/images/whatsapp (1).png" alt="">
                        </a>


                    </div>

                </div>
                <div class="col-sm-2 search animated wow fadeInRight" data-wow-delay=".5s">
                    <a class="play-icon popup-with-zoom-anim" href="#small-dialog"><i class="glyphicon glyphicon-search"> </i> </a>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="container">
            <div class="head-top">
                <div class="n-avigation">

                    <nav class="navbar nav_bottom" role="navigation">

                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header nav_2">
                            <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#"></a>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                            <ul class="nav navbar-nav nav_1">
                                <li><a href="index.php">Home</a></li>
                                <!--<li class="dropdown mega-dropdown active">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Categorias<span class="caret"></span></a>				
                                            <div class="dropdown-menu mega-dropdown-menu">
                                                    <div class="container-fluid">
                                    <!-- Tab panes -->
                                <!--	<div class="tab-content">
                                      <div class="tab-pane active" id="men">
                                            <ul class="nav-list list-inline">
                                                    <li><a href="women.html"><img src="Assets/images/ramillete.jpeg" class="img-responsive" alt=""/></a></li>
                                                    <li><a href="women.html"><img src="Assets/images/ramillete.jpeg" class="img-responsive" alt=""/></a></li>
                                                    <li><a href="women.html"><img src="Assets/images/ramillete.jpeg" class="img-responsive" alt=""/></a></li>
                                                    <li><a href="women.html"><img src="Assets/images/ramillete.jpeg" class="img-responsive" alt=""/></a></li>
                                                    <li><a href="women.html"><img src="Assets/images/ramillete.jpeg" class="img-responsive" alt=""/></a></li>
                                                    <li><a href="women.html"><img src="Assets/images/ramillete.jpeg" class="img-responsive" alt=""/></a></li>
                                            </ul>
                                            
                                      </div>
                               </div>
                            </div>
                            
                                            
                    </div>				
            </li>-->

                                <li class="dropdown mega-dropdown active">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Categorías<span class="caret"></span></a>
                                    <div class="dropdown-menu mega-dropdown-menu">

                                        <!-- Tab panes -->

                                        <ul class="nav-list list">
                                            <?php foreach ($categories as $categorias) : ?>
                                                <li><a href="productsCategory.php?name=<?php echo $categorias['name'] ?>"><?php echo $categorias['name']; ?></a></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </li>
                                <li class="dropdown mega-dropdown active">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Ocasión<span class="caret"></span></a>
                                    <div class="dropdown-menu mega-dropdown-menu">

                                        <!-- Tab panes -->

                                        <ul class="nav-list list">
                                            <?php foreach ($occasions as $ocaciones) : ?>
                                                <li><a href="productsOccasions.php?name=<?php echo $ocaciones['name_ocaciones'] ?>"><?php echo $ocaciones['name_ocaciones']; ?></a><br></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </li>
                                <li><a href="products.php">Productos</a></li>
                                <?php if (!$session->isUserLoggedIn(true)) : ?>
                                    <?php echo "<li><a href='account.php'>Iniciar sesión</a></li>" ?>
                                <?php endif; ?>
                                <li class="last"><a href="contact.php">Contáctanos</a></li>
                                <?php if ($session->isUserLoggedIn(true)) : ?>

                                    <li class="dropdown mega-dropdown active">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $user['name']; ?><span class="caret"></span></a>
                                        <div class="dropdown-menu mega-dropdown-menu">
                                            <div class="container-fluid">
                                                <!-- Tab panes -->

                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="men">
                                                        <ul class="nav-list list-inline">
                                                            <li><a href="profile.php"><img src="Assets/images/users.png" class="img-responsive" alt="" />Perfil</a></li>
                                                            <li><a href="shoppingHistory.php"><img src="Assets/images/browsing.png" class="img-responsive" alt="" />Historial de compras</a></li>
                                                            <?php if ($user['type'] == "SUPER" || $user['type'] == "ADMINISTRADOR") { ?>
                                                                <li><a href="admin/dashboard.php"><img src="Assets/images/member.png" class="img-responsive" alt="" />Administrar Tienda</a></li>
                                                            <?php } ?>
                                                            <li><a href="logout.php"><img src="Assets/images/log-out.png" class="img-responsive" alt="" />Salir</a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- Nav tabs -->

                                        </div>
                                    </li>
                                <?php endif; ?>
                            </ul>

                        </div><!-- /.navbar-collapse -->

                    </nav>
                </div>





            </div>
        </div>
    </div>
    <?php echo display_msg($msg); ?>
    <div class='container'>
        <div class='row' style='margin-top:20px'>
            <div class='col-lg-8 col-lg-offset-2 '>
                <h4 style='text-align:left'> Respuesta de la Transacción</h4>
                <hr>
            </div>
            <div class='col-lg-8 col-lg-offset-2'>
                <div class='table-responsive'>
                    <table class='table table-bordered'>
                        <tbody>
                            <tr>
                                <td>Referencia </td>
                                <td id="referencia"> </td>
                            </tr>
                            <tr>
                                <td class='bold'> Fecha/Hora </td>
                                <td id="fecha" class=""></td>
                            </tr>
                            <tr>
                                <td> Respuesta (Estado Transacción)</td>
                                <td id="respuesta"> </td>
                            </tr>
                            <tr>
                                <td> Estado </td>
                                <td id="motivo"> </td>
                            </tr>
                            <tr>
                                <td class='bold'> Banco </td>
                                <td class="" id="banco">
                            </tr>
                            <tr>
                                <td class='bold'> Recibo </td>
                                <td id="recibo"> </td>
                            </tr>
                            <tr>
                                <td class='bold'> Total </td>
                                <td class="" id="total">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class='col-lg-8 col-lg-offset-2 '>
                <h4 style='text-align:left'> Datos del envio</h4>
                <hr>
            </div>
            <div class='col-lg-8 col-lg-offset-2'>
                <div class='table-responsive'>
                    <table class='table table-bordered'>
                        <tbody>
                            <tr>
                                <td>Nombres </td>
                                <td id="nombres"> </td>
                            </tr>
                            <tr>
                                <td class='bold'> Pais/Estado/Ciudad </td>
                                <td id="city" class=""></td>
                            </tr>
                            <tr>
                                <td> Dirreccion 1</td>
                                <td id="dirreccion1"> </td>
                            </tr>
                            <tr>
                                <td> Dirreccion 2 </td>
                                <td id="dirreccion1"> </td>
                            </tr>
                            <tr>
                                <td class='bold'> Telefono </td>
                                <td class="" id="telefono">
                            </tr>
                            <tr>
                                <td class='bold'> Fecha  y hora de entrega </td>
                                <td class="" id="datehour">
                            </tr>
                            
                            <tr>
                                <td class='bold'> Notas </td>
                                <td id="notas"> </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class='row'>
        <div class='container'>
            <div class='col-lg-8 col-lg-offset-2'>
                <img src='https://369969691f476073508a-60bf0867add971908d4f26a64519c2aa.ssl.cf5.rackcdn.com/btns/epayco/pagos_procesados_por_epayco_260px.png' style='margin-top:10px; float:left'>
            </div>
        </div>


        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js'></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
        <script>
            function getQueryParam(param) {
                location.search.substr(1)
                    .split('&')
                    .some(function(item) { // returns first occurence and stops
                        return item.split('=')[0] == param && (param = item.split('=')[1])
                    })
                return param
            }
            $(document).ready(function() {

                //llave publica del comercio
                //Referencia de payco que viene por url
                var ref_payco = getQueryParam('ref_payco');
                //Url Rest Metodo get, se pasa la llave y la ref_payco como paremetro
                var urlapp = 'https://secure.epayco.co/validation/v1/reference/' + ref_payco;
                $.get(urlapp, function(response) {
                    if (response.success) {
                        if (response.data.x_cod_response == 1) {
                            //Codigo personalizado
                            //alert('Transaccion Aprobada');
                            console.log('transacción aceptada');
                            alert("transacción aceptada");
                        } //Transaccion Rechazada
                        if (response.data.x_cod_response == 2) {
                            console.log('transacción rechazada');
                            alert("transacción rechazada");
                            window.location = 'cart.php';
                        }
                        //Transaccion Pendiente
                        if (response.data.x_cod_response == 3) {
                            c
                        }
                        //Transaccion Fallida
                        if (response.data.x_cod_response == 4) {
                            console.log('');
                            alert("transacción fallida");
                            window.location = 'cart.php';
                        }

                        $('#fecha').html(response.data.x_transaction_date);
                        $('#respuesta').html(response.data.x_response);
                        $('#referencia').text(response.data.x_id_invoice);
                        $('#motivo').text(response.data.x_response_reason_text);
                        $('#recibo').text(response.data.x_transaction_id);
                        $('#banco').text(response.data.x_bank_name);
                        $('#autorizacion').text(response.data.x_approval_code);
                        $('#total').text(response.data.x_amount + ' ' + response.data.x_currency_code);

                        $('#nombres').html(response.data.x_extra2);
                        $('#city').html(response.data.x_extra4);
                        $('#dirreccion1').text(response.data.x_extra6);
                        $('#dirreccion2').text(response.data.x_extra7);
                        $('#telefono').text(response.data.x_extra8);
                        $('#notas').text(response.data.x_extra9);
                        $('#datehour').text(response.data.x_extra11 +" " +  response.data.x_extra12);
                        //var arrelogCarrito = response.data.x_extra1;
                        var nombres = response.data.x_extra2;
                        var pais = response.data.x_extra3;
                        var departamento = response.data.x_extra4;
                        var ciudad = response.data.x_extra5;
                        var dir1 = response.data.x_extra6;
                        var dir2 = response.data.x_extra7;
                        var metodoPago = response.data.x_extra1;
                        var telefono = response.data.x_extra8;
                        var nota = response.data.x_extra9;
                        var idUser = response.data.x_extra10;
                        var estado = response.data.x_response;
                        var banco = response.data.x_bank_name;
                        var fecha = response.data.x_transaction_date;
                        var referencia = response.data.x_id_invoice;
                        var total = response.data.x_amount;
                        var recibo = response.data.x_transaction_id;
                        var banco = response.data.x_bank_name;
                        //alert(idUser);
                        $.ajax({
                            type: "POST",
                            url: "includes/sqlinsert/add_datos.php",
                            data: {
                                recibo: recibo,
                                idUser: idUser,
                                nombres: nombres,
                                pais: pais,
                                departamento: departamento,
                                ciudad: ciudad,
                                dir1: dir1,
                                dir2: dir2,
                                telefono: telefono,
                                nota: nota,
                                estado: estado,
                                banco: banco,
                                fecha: fecha,
                                referencia: referencia,
                                total: total,
                                metodoPago: metodoPago,
                                banco: banco,
                            },
                            cache: false,
                            success: function() {
                                // alert("OK");

                            }
                        });
                        //window.location.reload();
                    } else {
                        alert('Error consultando la información');
                    }
                });
            });
        </script>
        <script>
            document.onkeydown = function(e) {
                tecla = (document.all) ? e.keyCode : e.which;
                //alert(tecla)
                if (tecla == 116) {
                    if (confirm("Seguro que quieres refrescar la página ") == true) {
                        return true;
                    } else {
                        return false;
                    }
                }
            }
        </script>

        <?php require_once('layout/footer.php'); ?>
</body>

</html>