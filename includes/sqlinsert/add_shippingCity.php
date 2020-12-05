<?php

include "../load.php";


if (isset($_GET["opt"]) && $_GET["opt"] == "country") {
    $db->query("insert into country(name_country,status) value (\"$_POST[name]\",'ACTIVE')");
    $session->msg('s', "Pais " . $_POST[name] . " agreado correctamente.");
    header("Location: ../../admin/shipping_city.php");
} else
if (isset($_GET["opt"]) && $_GET["opt"] == "state") {
    $db->query("insert into state(name_state,status,country_id) value (\"$_POST[name]\",'ACTIVE',$_POST[country_id])");
    $session->msg('s', "Departamento " . $_POST[name] . " agreado correctamente.");
    header("Location: ../../admin/shipping_city.php");
}
if (isset($_GET["opt"]) && $_GET["opt"] == "city") {
    $db->query("insert into city(name_city,status,state_id) value (\"$_POST[name]\",'ACTIVE',$_POST[state_id])");
    $session->msg('s', "Ciudad  " . $_POST[name] . " agreado correctamente.");
    header("Location: ../../admin/shipping_city.php");
}
?>