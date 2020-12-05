<?php
require_once("includes/load.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Iniciar sesion| Capullos</title>
        <link href="Assets/css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' />
        <link rel="shortcut icon" href="Assets/images/favicon.ico">
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="jAssets/s/jquery.min.js"></script>
        <!-- Custom Theme files -->
        <!--theme-style-->
        <link href="Assets/css/style.css" rel="stylesheet" type="text/css" media="all" />	
        <!--//theme-style-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Youth Fashion Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
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
                    <li class="active">Iniciar sesion</li>
                </ol>
            </div>
        </div>
        <div class="account">
            <div class="container">
                <h2>Iniciar sesion</h2>
                <?php echo display_msg($msg); ?>
                <div class="account_grid">
                    <div class="col-md-6 login-right">
                        <form action="auth.php" method="post">

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
                    <div class="col-md-6 login-left">
                        <h4>NUEVO CLIENTE</h4>
                        <p>Al crear una cuenta en nuestra tienda, podrá realizar el proceso de compra más rápidamente, almacenar múltiples direcciones de envío, ver y hacer un seguimiento de sus pedidos en su cuenta y mucho más.</p>
                        <a class="acount-btn" href="register.php">Crear cuenta</a>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>


        <?php require_once('layout/footer.php'); ?>

    </body>
</html>