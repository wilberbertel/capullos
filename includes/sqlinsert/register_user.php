<?php 
include "../load.php";

if (isset($_POST['firstname']) && isset($_POST['lastname'])  && isset($_POST['email']) 
 && isset($_POST['emailConfi'])  && isset($_POST['address1'])   && isset($_POST['address2'])  && isset($_POST['country'])
 && isset($_POST['departament'])   && isset($_POST['city'])  && isset($_POST['phone']) && isset($_POST['phone']) && isset($_POST['password']) && isset($_POST['passwordConfi'])) {
  $user = usersEmail($_POST['email']);
  if($user['total']>=1){
    $session->msg('d',"El correo (".$_POST['email'].") ya se encuentra regitrado. Intentelo nuevamente.");
    redirect('../../register.php', false);
  }
  if($_POST['email'] != $_POST['emailConfi']){
  $session->msg('d',"Los correo no coinciden");
    redirect('../../register.php', false);
 }
 if($_POST['password'] != $_POST['passwordConfi']){
  $session->msg('d',"Password no coinciden");
    redirect('register.php', false);
 }
 $date = make_date();
 $db->query("INSERT INTO users (email,password,name,surname,address,address2,city,departament,country,phone,image_profile,type,status,last_login)
  VALUES('".$_POST['email']."',
  '".sha1($_POST['password'])."',
  '".$_POST['firstname']."',
  '".$_POST['lastname']."',
  '".$_POST['address1']."',
  '".$_POST['address2']."',
  '".$_POST['city']."',
  '".$_POST['departament']."',
  '".$_POST['country']."',
  '".$_POST['phone']."',
  'default.png',
  'CLIENTE',
  'ACTIVE',
  '".$date."'
 );")or die($db->error);
  redirect('../../index.php', false);
}else{
    $session->msg('d',"Favor de llenar todos los campos. ");
    redirect('../../account.php', false);
}
?>

