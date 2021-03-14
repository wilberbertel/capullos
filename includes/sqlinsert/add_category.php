<?php

include "../load.php";

if (isset($_POST['nombre']) && isset($_POST['status'])) {
    $db->query("INSERT INTO category (name,status) VALUES('" . $_POST['nombre'] . "','" . $_POST['status'] . "'
 )")or die($db->error);
    $session->msg('s', "categoría  egoria agregada exitosamente. ");
    redirect('../../admin/categories.php', false);
} else {
    $session->msg('d', "Favor de llenar todos los campos. ");
    redirect('../../admin/categories.php', false);
}
?>

