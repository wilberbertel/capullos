<?php

include "../load.php";

if (isset($_POST['id'])) {
    $db->query("delete from users where id_users=" . $_POST['id']);
    echo 'listo';
} else {
    $session->msg('d', "No se elimino  el usuario. " . $_POST['id']);
}
?>