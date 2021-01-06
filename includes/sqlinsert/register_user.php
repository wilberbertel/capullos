<?php

include "../load.php";

if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['emailConfi'])  && isset($_POST['country'])  && isset($_POST['phone']) && isset($_POST['password']) && isset($_POST['passwordConfi'])) {
    $user = usersEmail($_POST['email']);
    if ($user['total'] >= 1) {
        $session->msg('d', "El correo (" . $_POST['email'] . ") ya se encuentra registrado. Inténtelo nuevamente.");
        redirect('../../register.php', false);
    }
    if ($_POST['email'] != $_POST['emailConfi']) {
        $session->msg('d', "Los correo no coinciden");
        redirect('../../register.php', false);
    }
    if ($_POST['password'] != $_POST['passwordConfi']) {
        $session->msg('d', "Contraseñas no coinciden.");
        redirect('register.php', false);
    }
    $date = make_date();
    $token = generateToken();
    $db->query("INSERT INTO users (email,password,name,surname,country,phone,image_profile,type,status,token,last_login)
  VALUES('" . $_POST['email'] . "',
  '" . sha1($_POST['password']) . "',
  '" . $_POST['firstname'] . "',
  '" . $_POST['lastname'] . "',
  '" . $_POST['country'] . "',
  '" . $_POST['phone'] . "',
  'default.png',
  'CLIENTE',
  'ACTIVE',
  '" . $token . "',
  '" . $date . "'
 );")or die($db->error);
   $user_id = authenticate($_POST['email'], $_POST['password']);
   if ($user_id) {
       $session->login($user_id);
       updateLastLogIn($user_id);
       $tipo = typeUser($user_id);
       $user = current_user();
       if ($tipo['type'] === 'CLIENTE') {
           $session->msg("s", "Bienvenido a FLORISTERIA CAPULLOS  " . $user['name']);
           header("Location: index.php");
       } else {
           $session->msg("s", "Bienvenido a FLORISTERIA CAPULLOS - ADMINISTRADOR  " . $user['name']);
           header("Location: admin/dashboard.php");
       }
   } else {
       $session->msg("d", "Nombre de usuario y/o contraseña incorrecto.");
       header("Location: account.php");
   }
    redirect('../../index.php', false);
} else {
    $session->msg('d', "Favor de llenar todos los campos. ");
    redirect('../../account.php', false);
}
?>

