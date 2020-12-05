<?php

require_once("includes/load.php");
$arreglo = $_SESSION['carritoCapullos'];
for ($i = 0; $i < count($arreglo); $i++) {
    if ($arreglo[$i]['Id'] == $_POST['id']) {
        $arreglo[$i]['Cantidad'] = $_POST['cantidad'];
        $_SESSION['carrito'] = $arreglo;
        break;
    }
}
?>