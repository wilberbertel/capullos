<?php

include "../load.php";


if (isset($_GET["opt"]) && $_GET["opt"] == "country" && isset($_POST['nombreEdit']) && isset($_POST['statusEdit']) && isset($_POST['idEdit'])) {
    $db->query("update country set name_country ='" . $_POST['nombreEdit'] . "',
   status='" . $_POST['statusEdit'] . "' where id=" . $_POST['idEdit']);
    $session->msg('s', "Pais  actualizado  correctamente.");
    header("Location: ../../admin/country.php");
}

if (isset($_GET["opt"]) && $_GET["opt"] == "state" && isset($_POST['nombreEdit']) && isset($_POST['statusEdit']) && isset($_POST['idEdit'])) {
    $db->query("update state set name_state ='" . $_POST['nombreEdit'] . "',
    status='" . $_POST['statusEdit'] . "' where id=" . $_POST['idEdit']);
    $session->msg('s', "Departamento  actualizado  correctamente.");
    header("Location: ../../admin/state.php");
}
if (isset($_GET["opt"]) && $_GET["opt"] == "city" && isset($_POST['nombreEdit']) && isset($_POST['statusEdit']) && isset($_POST['idEdit'])) {
    $db->query("update city set name_city ='" . $_POST['nombreEdit'] . "',
    status='" . $_POST['statusEdit'] . "' where id=" . $_POST['idEdit']);
    $session->msg('s', "Ciudad  actualizado  correctamente.");
    header("Location: ../../admin/city.php");
}
?>