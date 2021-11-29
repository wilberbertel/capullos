<?php
require_once("includes/load.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Iniciar sesion | Capullos</title>
        <link href="Assets/css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' />
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="Assets/js/jquery.min.js"></script>
        <link rel="shortcut icon" href="Assets/images/favicon.ico">
        <link rel="stylesheet" type="text/css" href="Assets/css/myStyle.css">
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
            function mostrarContrasena() {
                var tipo = document.getElementById("password");
                if (tipo.type == "password") {
                    tipo.type = "text";
                } else {
                    tipo.type = "password";
                }
            }
        </script>
        <script>
            $(document).ready(function () {
                $('#mostrar_contrasena').click(function () {
                    if ($('#mostrar_contrasena').is(':checked')) {
                        $('#password').attr('type', 'text');
                    } else {
                        $('#password').attr('type', 'password');
                    }
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
                <h2>Iniciar sesión</h2>
                <?php echo display_msg($msg); ?>
                <div class="account_grid">
                    <div class="col-md-6 login-right">
                        <form action="auth.php" method="post">
                            <span>Dirección de correo electrónico</span>
                            <input type="text" name="email"
                            pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" required> 
                            <span>Contraseña</span>
                            <input type="password" id = "password" name="password" required> 
                            <div style="margin-top:5px;">           
                                <input style="margin-left:20px;" type="checkbox" id="mostrar_contrasena" value="" title="clic para mostrar contraseña"/>       
                                Mostrar Contraseña </div>
                            <div class="word-in">
                                <a class="forgot" href="resetPassword.php">¿Olvidó su contraseña?</a>
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