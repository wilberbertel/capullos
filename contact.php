<?php
require_once("includes/load.php");
$manageData = manageData();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Contacto :: Capullos floristeria</title>
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
                    <li class="active">Contactanos</li>
                </ol>
            </div>
        </div>
        <div class="contact">
            <div class="container">
                <h3>Contact</h3>

                <div class="contact-grids">
                    <div class="contact-form">
                        <form action="#" method="post">
                            <div class="contact-bottom">
                                <div class="col-md-4 in-contact">
                                    <span>Nombres</span>
                                    <input type="text" name="name">
                                </div>
                                <div class="col-md-4 in-contact">
                                    <span>Correo</span>
                                    <input type="text" name="email" >
                                </div>
                                <div class="col-md-4 in-contact">
                                    <span>Telefono</span>
                                    <input type="text" name="phonenumber">
                                </div>
                                <div class="clearfix"> </div>
                            </div>

                            <div class="contact-bottom-top">
                                <span>Mensaje</span>
                                <textarea  name="message"> </textarea>								
                            </div>
                            <input type="submit" value="Enviar">
                        </form>
                    </div>
                    <div class="address">
                        <div class=" address-more">
                            <h2>Dirección</h2>
                            <div class="col-md-4 address-grid">
                                <i class="glyphicon glyphicon-map-marker"></i>
                                <div class="address1">
                                    <p>Sincelejo – Colombia </p>
                                    <p><?php echo $manageData['address']; ?></p>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            <div class="col-md-4 address-grid ">
                                <i class="glyphicon glyphicon-phone"></i>
                                <div class="address1">
                                    <p>Tel: <?php echo $manageData['phone_fixed']; ?>

</p>  <p>Cel. :<?php echo $manageData['phone_mobile']; ?>  <br>Whatsapp: +57 <?php echo $manageData['whatsapp']; ?></p> 
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            <div class="col-md-4 address-grid ">
                                <i class="glyphicon glyphicon-envelope"></i>
                                <div class="address1">
                                    <p><a href="<?php echo $manageData['email']?>"><?php echo $manageData['email']?></a></p>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--//content-->
        <!--map--9.30579,-75.40023>
        <!--<div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3279847.2716062404!2d145.46948275!3d-36.60289065!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad4314b7e18954f%3A0x5a4efce2be829534!2sVictoria%2C+Australia!5e0!3m2!1sen!2sin!4v1443674224626" width="100%" height="" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>-->
        <div class="map"><iframe width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=es&amp;q=Florister%C3%ADa%20Capullos+(CAPULLOS)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe></div>
        <!--//map-->
        <?php require_once('layout/footer.php'); ?>
    </body>
</html>