<?php
$user = current_user();
if (!$session->isUserLoggedIn(true) || validatePermition($user['type']) == 0 || validateStatus($user['status']) == 0) {
    redirect('../index.php', false);
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Tienda Virtual Capullos">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Adrian Atencia Caly">
        <meta name="theme-color" content="#009688">
        <link rel="shortcut icon" href="Assets/images/favicon.png">
        <title>CAPULLOS-ADMINISTRADOR</title>
        <!-- Main CSS-->
        <link rel="stylesheet" type="text/css" href="Assets/css/main.css">
        <link rel="stylesheet" type="text/css" href="Assets/css/style.css">
        <!-- Font-icon css-->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="../includes/Highcharts-8.1.0/code/highcharts.js"></script>
<script src="../includes/Highcharts-8.1.0/code/exporting.js"></script>
<script src="../includes/Highcharts-8.1.0/code/highcharts-3d.js"></script>
<script src="../includes/Highcharts-8.1.0/code/modules/exporting.js"></script>
<script src="../includes/Highcharts-8.1.0/code/modules/export-data.js"></script>
<script src="../includes/Highcharts-8.1.0/code/modules/accessibility.js"></script>
<script language="Javascript">
	function imprSelec(nombre) {
	  var ficha = document.getElementById(nombre);
	  var ventimp = window.open(' ', 'popimpr');
    ventimp.document.write( ficha.innerHTML );
    var css = ventimp.document.createElement("link");
css.setAttribute("href", "Assets/css/main.css");
css.setAttribute("rel", "stylesheet");
css.setAttribute("type", "text/css");
ventimp.document.head.appendChild(css);
	  ventimp.document.close();
	  ventimp.print( );
	  ventimp.close();
	}
	</script>
    </head>

    <body class="app sidebar-mini">
        <?php if ($session->isUserLoggedIn(true)) : ?>
            <!-- Navbar-->
            <header class="app-header"><a class="app-header__logo" href="dashboard.php">Capullos</a>
                <!-- Sidebar toggle button--><a class=" app-sidebar__toggle" href="" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
                <!-- Navbar Right Menu-->
                <ul class="app-nav">

                    <!-- User Menu-->
                    <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"> <?php echo $user['name']; ?> </i></a>
                        <ul class="dropdown-menu settings-menu dropdown-menu-right">
                            <li><a class="dropdown-item" href="profile.php"><i class="fa fa-user fa-lg"></i> Pefil</a></li>
                            <li><a class="dropdown-item" href="opcion.php"><i class=" fa fa-cog fa-lg"></i> Cambiar clave</a></li>
                            <li><a class="dropdown-item" href="../logout.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            <?php endif; ?>
        </header>
        <?php require_once("nav_admin.php") ?>