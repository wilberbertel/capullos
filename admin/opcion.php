<?php
//headerAdmin($data);
require_once("../includes/load.php");
$user = current_user();
if (!$session->isUserLoggedIn(true) || validatePermition($user['type']) == 0 || validateStatus($user['status']) == 0) {
    redirect('../index.php', false);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="Assets/images/favicon.png">
        <!-- Main CSS-->
        <link rel="stylesheet" type="text/css" href="Assets/css/main.css">
        <!-- Font-icon css-->
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Recuperar contraseña</title>
    </head>
    <body>
        <section class="material-half-bg">
            <div class="cover"></div>
        </section>
        <section class="lockscreen-content">
            <div class="logo">
                <h1>Floristeria capullos</h1>
            </div>
            <div class="lock-box"><img class="rounded-circle user-image" src="../uploads/users/<?php echo $user['image_profile']; ?>">
                <h4 class="text-center user-name"><?php echo $user['name'] . " " . $user['surname']; ?></h4>
                <p class="text-center text-muted"><?php echo $user['type']; ?></p>
                <form class="unlock-form" action="../includes/sqlinsert/restorePassword.php" method="post">
                    <div class="form-group">
                        <label class="control-label">CORREO</label>
                        <input class="form-control" type="email" placeholder="Correo electronico" name="email"  id="email" autofocus>
                    </div>
                    <div class="form-group btn-container">
                        <button class="btn btn-primary btn-block" type="submit"><i class="fa fa-unlock fa-lg"></i>Recuperar cuenta </button>
                    </div>
                </form>
                <p><a href="page-login.html">¿No eres <?php echo $user['name'] . " " . $user['surname']; ?> ? Entre aquí.</a></p>
            </div>
        </section>
        <!-- Essential javascripts for application to work-->
        <script src="Assets/js/jquery-3.3.1.min.js"></script>
        <script src="Assets/js/popper.min.js"></script>
        <script src="Assets/js/bootstrap.min.js"></script>
        <script src="Assets/js/main.js"></script>
        <!-- The javascript plugin to display page loading on top-->
        <script src="Assets/js/plugins/pace.min.js"></script>
    </body>
</html>