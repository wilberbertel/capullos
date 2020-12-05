<?php

include "../load.php";



if (isset($_GET["opt"]) && $_GET["opt"] == "country") {
    $db->query("delete from country where id=" . $_POST['id']);
    echo 'listo';
}

if (isset($_GET["opt"]) && $_GET["opt"] == "state") {
    $db->query("delete from state where id=" . $_POST['id']);
    echo 'listo';
}
if (isset($_GET["opt"]) && $_GET["opt"] == "city") {
    $db->query("delete from city where id=" . $_POST['id']);
    echo 'listo';
}
?>