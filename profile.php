<?php
require_once("includes/load.php");
$user = current_user();
if (!$session->isUserLoggedIn(true)) {
    redirect('index.php', false);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Perfil :: Capullos floristeria</title>
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
                    <li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                    <li class="active">Perfil</li>
                </ol>
            </div>
        </div>
        <?php echo display_msg($msg); ?>
        <div class="contact">
            <div class="container">
                <h3>Datos del perfil</h3>

                <div class="contact-grids">
                    <div class="contact-form">
                        <!--<form action="#" method="post">-->
                        <div class="contact-bottom">
                            <div class="col-md-6 ">
                                <span>Nombres</span>
                                <input type="text" name="names" value="<?php echo $user['name']; ?>" disabled>
                            </div>
                            <div class="col-md-6 in-contact">
                                <span>Apellidos</span>
                                <input type="text" name="surname" value="<?php echo $user['surname']; ?>" disabled>
                            </div>
                            <div class="col-md-6 in-contact">
                                <span>Correo</span>
                                <input type="text" name="email" value="<?php echo $user['email']; ?>" disabled >
                            </div>
                            <div class="col-md-6 in-contact">
                                <span>Phone</span>
                                <input type="text" name="phonenumber" value="<?php echo $user['phone']; ?>" disabled>
                            </div>
                            <div class="col-md-6 in-contact">
                                <span>Dirreccion 1</span>
                                <input type="text" name="phonenumber" value="<?php echo $user['address']; ?>" disabled>
                            </div>
                            <div class="col-md-6 in-contact">
                                <span>Dirreccion 2</span>
                                <input type="text" name="phonenumber" value="<?php echo $user['address2']; ?>" disabled>
                            </div>
                            <div class="col-md-4 in-contact">
                                <span>Ciudad</span>
                                <input type="text" name="phonenumber" value="<?php echo $user['city']; ?>" disabled>
                            </div>
                            <div class="col-md-4 in-contact">
                                <span>Departamento</span>
                                <input type="text" name="phonenumber" value="<?php echo $user['departament']; ?>" disabled>
                            </div>
                            <div class="col-md-4 in-contact">
                                <span>Pais</span>
                                <input type="text" name="phonenumber" value="<?php echo $user['country']; ?>" disabled>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <input type="submit" value="Editar datos" data-toggle="modal" data-target=".bd-example-modal-lg">
                        <!--</form>-->
                    </div>
                    <div class="clearfix"> </div>	<div class="clearfix"> </div>



                </div>
            </div>
        </div>
        <!--MODAL EDITAR DATOS-->
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="contact-form">
                            <div class="contact">
                                <h3>Datos del perfil</h3>			
                                <form action="includes/sqlinsert/update_profile.php" method="post">
                                    <input type="hidden" id="idEdit" name="idEdit" value="<?php echo $user['id_users']; ?>">
                                    <div class="contact-bottom">
                                        <div class="col-md-6 ">
                                            <span>Nombres</span>
                                            <input type="text" name="namesEdit" value="<?php echo $user['name']; ?>" required>
                                        </div>
                                        <div class="col-md-6 in-contact">
                                            <span>Apellidos</span>
                                            <input type="text" name="lasNamesEdit" value="<?php echo $user['surname']; ?>" required>
                                        </div>
                                        <div class="col-md-6 in-contact">
                                            <span>Correo</span>
                                            <input type="text" name="emailEdit" value="<?php echo $user['email']; ?>" required >
                                        </div>
                                        <div class="col-md-6 in-contact">
                                            <span>Phone</span>
                                            <input type="text" name="phoneEdit" value="<?php echo $user['phone']; ?>" required>
                                        </div>
                                        <div class="col-md-6 in-contact">
                                            <span>Dirreccion 1</span>
                                            <input type="text" name="addressEdit" value="<?php echo $user['address']; ?>" required>
                                        </div>
                                        <div class="col-md-6 in-contact">
                                            <span>Dirreccion 2</span>
                                            <input type="text" name="address2Edit" value="<?php echo $user['address2']; ?>" required>
                                        </div>
                                        <div class="col-md-4 in-contact">
                                            <span>Ciudad</span>
                                            <input type="text" name="cityEdit" value="<?php echo $user['city']; ?>" required>
                                        </div>
                                        <div class="col-md-4 in-contact">
                                            <span>Departamento</span>
                                            <input type="text" name="departamentEdit" value="<?php echo $user['departament']; ?>" required>
                                        </div>
                                        <div class="col-md-4 in-contact">
                                            <span>Pais</span>
                                            <input type="text" name="countryEdit" value="<?php echo $user['country']; ?>" required>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                    <input type="submit" value="Actualizar mis datos">
                                </form>
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

    </body>
</html>