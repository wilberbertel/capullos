<?php

include "../load.php";

$fila = $db->query('select image_product  from product where id_product=' . $_POST['id']);
$id = mysqli_fetch_row($fila);
if (file_exists('../../uploads/product/' . $id[0])) {
    unlink('../../uploads/product/' . $id[0]);
}
$db->query("delete from product where id_product=" . $_POST['id']);
echo 'listo';
?>