<?php

include "../load.php";

if (isset($_POST['nombreEdit']) && isset($_POST['statusEdit']) && isset($_POST['idEdit'])) {
    $db->query("update category set 
    name='" . $_POST['nombreEdit'] . "',
    status='" . $_POST['statusEdit'] . "'
    where id_category=" . $_POST['idEdit']);
    $session->msg('s', "Se actulializo  exitosamente. ");
    redirect('../../admin/categories.php', false);
} else {

    $session->msg('d', "No se actualizo la categotia. ");
    redirect('../../admin/categories.php', false);
}
?>