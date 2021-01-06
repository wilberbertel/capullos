<?php

include "../load.php";

if (isset($_POST['idEdit']) && isset($_POST['namesEdit']) && isset($_POST['lasNamesEdit']) && isset($_POST['emailEdit']) && isset($_POST['addressEdit']) && isset($_POST['address2Edit']) && isset($_POST['phoneEdit']) && isset($_POST['countryEdit']) && isset($_POST['departamentEdit']) && isset($_POST['cityEdit'])) {

    $db->query("update users set 
                email='" . $_POST['emailEdit'] . "',
                name='" . $_POST['namesEdit'] . "',
                surname='" . $_POST['lasNamesEdit'] . "',
                address='" . $_POST['addressEdit'] . "',
                address2='" . $_POST['address2Edit'] . "',
                city='" . $_POST['cityEdit'] . "',
                departament='" . $_POST['departamentEdit'] . "',
                country='" . $_POST['countryEdit'] . "',
                phone='" . $_POST['phoneEdit'] . "'
                 where id_users='" . $_POST['idEdit'] . "'");

    $session->msg('s', "Datos actualizados exitosamente. ");
    redirect('../../admin/profile.php', false);
} else {
    $session->msg('d', "No se actualizo  los datos. ");
    redirect('../../admin/profile.php', false);
}
?>