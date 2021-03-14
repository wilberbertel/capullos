<?php

include "../load.php";

if (isset($_POST['nombre']) && isset($_POST['status']) && isset($_POST['categoria'])) {
    $db->query("INSERT INTO occasions (name_ocaciones,status,category) VALUES('" . $_POST['nombre'] . "','" . $_POST['status'] . "','" . $_POST['categoria'] . "'
 )")or die($db->error);
    $session->msg('s', "Ocasión agregada exitosamente. ");
    redirect('../../admin/occasions.php', false);
} else {
    $session->msg('d', "Favor de llenar todos los campos. ");
    redirect('../../admin/occasions.php', false);
}
?>

