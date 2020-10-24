<?php 
include "../load.php";

if (isset($_POST['nombres']) && isset($_POST['apellidos'])  && isset($_POST['correo']) && isset($_POST['status']) ) {
  $user = usersEmail(isset($_POST['correo']));
if($user['total']<=0){
  $db->query("INSERT INTO users (email,password,name,surname,image_profile,type,status) VALUES(
    '".$_POST['correo']."',
    'capullosadmin',
    '".$_POST['nombres']."',
    '".$_POST['apellidos']."',
    'default.png',
    'ADMINISTRADOR',
    '".$_POST['status']."')")or die($db->error);
   $session->msg('s',"Usuario agregado exitosamente. ");
   redirect('../../admin/users.php', false);
}else{
  $session->msg('d'," Correo ya registrado ".$user['total']);
  redirect('../../admin/users.php', false);
}



}else{
    $session->msg('d',"Favor de llenar todos los campos. ");
    redirect('../../admin/users.php', false);
}
?>

