<?php
include "../load.php";

if(isset($_POST['nombreEdit']) &&  isset($_POST['statusEdit']) &&  isset($_POST['idEdit'])&&  isset($_POST['categoriaEdit']) ){
    $db->query("update occasions set 
    name_ocaciones='".$_POST['nombreEdit']."',
    status='".$_POST['statusEdit']."',
    category='".$_POST['categoriaEdit']."'
    where id_ocaciones=".$_POST['idEdit']);
    $session->msg('s',"Se actulializo  exitosamente. ");
    redirect('../../admin/occasions.php', false);

}else{

    $session->msg('d',"No se actualizo la categotia. ");
    redirect('../../admin/occasions.php', false);
}


?>