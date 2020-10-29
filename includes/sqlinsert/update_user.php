<?php
include "../load.php";

if(isset($_POST['idEdit'])  &&  isset($_POST['statusEdit'])
    &&  isset($_POST['tipoEdit']) ){

                $db->query("update users set 
                type='".$_POST['tipoEdit']."',
                status='".$_POST['statusEdit']."'
                 where id_users='".$_POST['idEdit']."'");

                 $session->msg('s',"Datos actualizados exitosamente. ");
                 redirect('../../admin/config_users.php', false);
}else{
    $session->msg('d', "No se actualizo  los datos. ");
    redirect('../../admin/config_users.php', false);
}
?>