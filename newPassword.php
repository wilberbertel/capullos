<?php
require_once("includes/load.php");
if (empty($_GET['user_id']) || empty($_GET['token'])) {
    header('Location : index.php');
}
$user_id = $_GET['user_id'];
$token = $_GET['token'];

if (!verificaTokenPass($user_id, $token)) {
    echo "<script type='text/javascript'>
    alert('Error en la verificacion de datos.');
    window.location.href='index.php';
    </script>";
    exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Nueva Contraseña :: Capullos</title>
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
                    <li class="active">Nueva Contraseña</li>
                </ol>
            </div>
        </div>
        <div class="account">
            <div class="container">
                <h2>Nueva Contraseña</h2>
                <?php echo display_msg($msg); ?>
                <div class="account_grid">
                    <div class="col-md-12 login-right">

                        <form action="includes/sqlinsert/updatePassword.php" method="post">
                            <input type="hidden" id="user_id" name="user_id" value ="<?php echo $user_id; ?>" />

                            <input type="hidden" id="token" name="token" value ="<?php echo $token; ?>" />

                            <span>Contraseña</span>
                            <input type="password" name="password"  required> 
                            <span>Confirmar Contraseña</span>
                            <input type="password" name="passwordConfirmar"  required> 
                            <div class="word-in">                               
                                <input type="submit" value="Cambiar  contraseña">
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