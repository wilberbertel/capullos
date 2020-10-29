<?php
include "../load.php";

$db->query("delete from category where id_category=".$_POST['id']);
echo 'listo';

?>