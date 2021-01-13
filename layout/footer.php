<?php
require_once("includes/load.php");
$manageData = manageData();

?>
<!--footer-->
<div class="footer">
    <div class="container">
        <div class="footer-top">
            <div class="col-md-6 top-footer animated wow fadeInLeft" data-wow-delay=".5s">
                <h3>Síganos en: </h3>
                <a href="https://api.whatsapp.com/send?phone=+573226163368"><img src="Assets/images/whatsapp16px.png"/></a>
                <a href="https://www.instagram.com/capullosfloristeria/"><img src="Assets/images/instagram64px.png"/></a>
                <a href="https://www.facebook.com/Capullos-Floristeria-1650902468254844"><img src="Assets/images/facebook64px.png"/></a>
            </div>
            <div class="col-md-6 top-footer1 animated wow fadeInRight" data-wow-delay=".5s">
            <!--	<h3><img src="Assets/images/medios-de-pago-1024x42.png"/></h3>
                    <form action="#" method="post">
                                    <input type="text" name="email" value="" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='';}">
                                    <input type="submit" value="SUBSCRIBE">
                            </form>-->

            </div>
            <div class="clearfix"> </div>	
        </div>	
    </div>
    <div class="footer-bottom">
        <div class="container">
           <!-- <div class="col-md-3 footer-bottom-cate animated wow fadeInLeft" data-wow-delay=".5s">
                <h6>Categorias</h6>
                <ul>
                    <li><a href="products.html">Curabitur sapien</a></li>
                    <li><a href="single.html">Dignissim purus</a></li>
                    <li><a href="men.html">Tempus pretium</a></li>
                    <li><a href="products.html">Dignissim neque</a></li>
                    <li><a href="single.html">Ornared id aliquet</a></li>

                </ul>
            </div>-->
   

            <div class="col-md-3 footer-bottom-cate animated wow fadeInRight" data-wow-delay=".5s">
                <h6>Horario</h6>
                <ul>
                    <li><a>Lunes - Sabados:</a></li>
                    <li><a >De 8:00 Am a 6:00 PM</a></li>
                    <li><a >Domingos y Festivos.</a></li>
                    <li><a >No tenemos Servicio ni Entrega de Pedidos</a></li>
                    <li><a >(A excepcion de fechas especiales)</a></li>


                </ul>
            </div>
            <div class="col-md-3 footer-bottom-cate cate-bottom animated wow fadeInRight" data-wow-delay=".5s">
                <h6>Nuestra dirección</h6>
                <ul>
                    <li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>Dirrecion : <?php echo $manageData['address']?>, <span>Sincelejo Sucre.</span></li>
                    <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>Correo : <a href=" <?php echo $manageData['email']?>"> <?php echo $manageData['email']?></a></li>
                    <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>Celular : +57  <?php echo $manageData['phone_mobile']?></li>
                    <li><i class="glyphicon glyphicon-phone" aria-hidden="true"></i>Whatsapp : +57  <?php echo $manageData['whatsapp']?></li>

                </ul>
            </div>
            <!--<div class="col-md-3 footer-bottom-cate animated wow fadeInLeft" data-wow-delay=".5s">
                <h6>Feature Projects</h6>
                <ul>
                    <li><a href="products.html">Dignissim purus</a></li>
                    <li><a href="men.html">Curabitur sapien</a></li>
                    <li><a href="single.html">Tempus pretium</a></li>
                    <li><a href="men.html">Dignissim neque</a></li>
                    <li><a href="products.html">Ornared id aliquet</a></li>
                </ul>
            </div>-->
            <div class="clearfix"> </div>
            <p class="footer-class animated wow fadeInUp animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;"> © 2020 CAPULLOS. Todos los derechos reservados  | Diseño por W3layouts  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> y modificado por: <a href="http://localhost/capullos/index.php" target="_blank">Floristeria Capullos</a>  </p>
        </div>
    </div>
</div>
<!--footer-->