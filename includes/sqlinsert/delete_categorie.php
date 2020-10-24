<?php
include "../load.php";

$db->query("delete from category where id=".$_POST['id']);
echo 'listo';

?>