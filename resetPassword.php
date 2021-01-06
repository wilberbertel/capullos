<?php
require_once("includes/load.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Restaurar contraseña | Capullos</title>
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
                    <li><a href="account.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Iniciar session</a></li>
                    <li class="active">Restaurar Contraseña</li>
                </ol>
            </div>
        </div>
        <div class="account">
            <div class="container">
                <h2>Restaurar Contraseña</h2>
                <?php echo display_msg($msg); ?>
                <div class="account_grid">
                    <div class="col-md-12 login-right">
                    <div class="col-md-12 login-left">
                        <h4>Al restaurar la contraseña</h4>
                        <p>Se enviara un mensaje al correo electronico asociado para hacer el respectivo cambio de contraseña</p>
                    </div>
                        <form action="includes/sqlinsert/restorePassword.php" method="post">
                            <span>Dirección de correo electrónico</span>
                            <input type="text" name="email" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" required> 
                            <div class="word-in">                               
                                <input type="submit" value="Restaurar contraseña">
                            </div>
                        </form>
                    </div>	
                   
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>


        <?php require_once('layout/footer.php'); ?>

    </body>
</html>