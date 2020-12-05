<?php

include "../load.php";
$user = usersEmail($_POST['correo']);
if ($user['total'] >= 1) {
    $session->msg('d', " Correo ya registrado " . $user['total']);
    redirect('../../admin/users.php', false);
}

if (isset($_POST['nombres']) && isset($_POST['apellidos']) && isset($_POST['correo']) && isset($_POST['status'])) {
    $db->query("INSERT INTO users (email,password,name,surname,image_profile,type,status) VALUES(
    '" . $_POST['correo'] . "',
    '" . sha1('capullosAdmin') . "',
    '" . $_POST['nombres'] . "',
    '" . $_POST['apellidos'] . "',
    'default.png',
    'ADMINISTRADOR',
    '" . $_POST['status'] . "')")or die($db->error);
    $session->msg('s', "Usuario agregado exitosamente. ");
    redirect('../../admin/users.php', false);
} else {
    $session->msg('d', "Favor de llenar todos los campos. ");
    redirect('../../admin/users.php', false);
}
?>

