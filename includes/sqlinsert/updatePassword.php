<?php

include "../load.php";

if (isset($_POST['password']) && isset($_POST['passwordConfirmar'])) {
	if(validaPassword($_POST['password'],$_POST['passwordConfirmar'])){
    $db->query("update users set  password = 
    '" . sha1($_POST['password']) . "',
    token_password='', 
    password_request=0
                 where id_users='" . $_POST['user_id'] . "' AND token_password = '".$_POST['token']."' ");
        $session->msg('s', "Datos actualizados exitosamente! Vuelva a iniciar sesion con su nueva contraseña. ");
        redirect('../../index.php', false);
        
}else{
    echo "<script type='text/javascript'>
    alert('LAS CONTRASEÑAS NO COINCIDEN');
    window.location.href='javascript:history.back()';
    </script>";
}
} else {
    $session->msg('d', "No se actualizo  los datos. ");
    redirect('../../newPassword.php', false);
}
?>