<?php
require_once("includes/load.php");
$user = current_user();
$tipo = page_require_tipo($user['type']);
$categories = allCategories();
$occasions = allOccasions();
?>
<!--header-->
<div class="header">
    <div class="header-top">
        <div class="container">
            <div class="col-sm-4 logo animated wow fadeInLeft" data-wow-delay=".5s">
                <h1><a href="index.php">Floristeria <span>Capullos</span></a></h1>	
            </div>
            <div class="col-sm-4 world animated wow fadeInRight" data-wow-delay=".5s">
                <div class="cart box_1">
                    <a href="cart.php">
                        <h3> <div class="total">
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
                            <img src="Assets/images/cart.png" alt=""/></h3>
                    </a>
                    <p><a href="cart.php" >Ver carrito</a></p>

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
                                                        <li><a href="profile.php"><img src="Assets/images/users.png" class="img-responsive" alt=""/>Perfil</a></li>
                                                        <li><a href="shoppingHistory.php"><img src="Assets/images/browsing.png" class="img-responsive" alt=""/>Historial de compras</a></li>
                                                       <?php if ($user['type'] == "SUPER" || $user['type'] == "ADMINISTRADOR"){?>
                                                        <li><a href="admin/dashboard.php"><img src="Assets/images/member.png" class="img-responsive" alt=""/>Administrar Tienda</a></li>
                                                        <?php }?>
                                                        <li><a href="logout.php"><img src="Assets/images/log-out.png" class="img-responsive" alt=""/>Salir</a></li>
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


            <div class="clearfix"> </div>
            <!---pop-up-box---->   
            <link href="Assets/css/popuo-box.css" rel="stylesheet" type="text/css" media="all"/>
            <script src="Assets/js/jquery.magnific-popup.js" type="text/javascript"></script>
            <!---//pop-up-box---->
            <div id="small-dialog" class="mfp-hide">
                <div class="search-top">
                    <div class="login">
                        <form  action="busqueda.php" method="POST">
                            <input type="submit" value="">
                            <input type="text" name="busqueda" value="Escriba algo..." onfocus="this.value = '';" onblur="if (this.value == '') {
                                                                            this.value = '';
                                                                        }">		

                        </form>
                    </div>				
                </div>				
            </div>
            
            <script>
                $(document).ready(function () {
                    $('.popup-with-zoom-anim').magnificPopup({
                        type: 'inline',
                        fixedContentPos: false,
                        fixedBgPos: true,
                        overflowY: 'auto',
                        closeBtnInside: true,
                        preloader: false,
                        midClick: true,
                        removalDelay: 300,
                        mainClass: 'my-mfp-zoom-in'
                    });

                });
            </script>			
            <!---->					

            </script>
            <script defer src="Assets/js/jquery.flexslider.js"></script>
            <link rel="stylesheet" href="Assets/css/flexslider.css" type="text/css" media="screen" />

            <script>
            // Can also be used with $(document).ready()
                                                 $(window).load(function () {
                                                     $('.flexslider').flexslider({
                                                         animation: "slide",
                                                         controlNav: "thumbnails"
                                                     });
                                                 });
            </script>
            <!---pop-up-box---->
            <link href="Assets/css/popuo-box.css" rel="stylesheet" type="text/css" media="all"/>
            <script src="Assets/js/jquery.magnific-popup.js" type="text/javascript"></script>
            <!---//pop-up-box---->
            <script>
        $(document).ready(function () {
            $('.popup-with-zoom-anim').magnificPopup({
                type: 'inline',
                fixedContentPos: false,
                fixedBgPos: true,
                overflowY: 'auto',
                closeBtnInside: true,
                preloader: false,
                midClick: true,
                removalDelay: 300,
                mainClass: 'my-mfp-zoom-in'
            });

        });
            </script>	

        </div>
    </div>
</div>