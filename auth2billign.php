<?php include_once('includes/load.php');

$req_fields = array('email', 'password');
validate_fields($req_fields);
$email = removeJunk($_POST['email']);
$password = removeJunk($_POST['password']);

if (empty($errors)) {
  $user_id = authenticate($email, $password);
  if ($user_id) {
    $session->login($user_id);
    updateLastLogIn($user_id);
    $tipo = typeUser($user_id);
    $user = current_user();
    if($tipo['type']==='CLIENTE'){
      $session->msg("s", "Datos del comprador llenos..." );
      header("Location: billing.php");
    }else{
      $session->msg("s", "SIN PERMISOS ");
      header("Location: index.php");
    }
  } else {
    $session->msg("d", "Nombre de usuario y/o contraseña incorrecto.");
    header("Location: billing.php");
  }
} else {
  $session->msg("d", $errors);
  
  header("Location: billing.php");
}
