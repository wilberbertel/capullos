<?php

include "../load.php";

$db->query("delete from occasions where id_ocaciones=" . $_POST['id']);
echo 'listo';
?>