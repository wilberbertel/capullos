<?php

include "../load.php";

if (isset($_POST['idEdit']) && isset($_POST['names'])  && isset($_POST['nit']) && isset($_POST['razonSocial']) && isset($_POST['phoneFixed']) && isset($_POST['phoneMobile']) && isset($_POST['whatsapp']) && isset($_POST['email']) && isset($_POST['address'])) {

    $db->query("update company_configuration set 
                nit='" . $_POST['nit'] . "',
                name='" . $_POST['names'] . "',
                social_reason='" . $_POST['razonSocial'] . "',
                phone_fixed='" . $_POST['phoneFixed'] . "',
                email='" . $_POST['email'] . "',
                address='" . $_POST['address'] . "',
                phone_mobile='" . $_POST['phoneMobile'] . "',
                whatsapp='" . $_POST['whatsapp'] . "'
                 where id_config='" . $_POST['idEdit'] . "'");

    $session->msg('s', "Datos actualizados exitosamente. ");
    redirect('../../admin/manageData.php', false);
} else {
    $session->msg('d', "No se actualizo  los datos. ");
    redirect('../../admin/manageData.php', false);
}
?>