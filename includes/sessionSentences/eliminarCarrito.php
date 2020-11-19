<?php
echo "Hoa";
require_once("includes/load.php");
$arreglo = $_SESSION['carritoCapullos'];

for ($i=0; $i <count($arreglo) ; $i++) { 
    if($arreglo[$i]['Id'] != $_POST['id']){
        $arregloNuevo[] = array(
        'Id'=>$arreglo[$i]['Id'],
        'Nombre'=>$arreglo[$i]['Nombre'],
        'Decripcion'=>$arreglo[$i]['Decripcion'],
		'Mensaje'=>$arreglo[$i]['Mensaje'],
        'Precio'=>$arreglo[$i]['Precio'],
        'Imagen'=>$arreglo[$i]['Imagen'],
        'Cantidad'=>$arreglo[$i]['Cantidad']
        );
    }
}

if (isset($arregloNuevo)) {
    $_SESSION['carritoCapullos'] = $arregloNuevo;
}else{
    //REGISTRO A ELIMINAR UNICO QUE HABIA
    unset($_SESSION['carritoCapullos']);
}
echo "Listo";
?>