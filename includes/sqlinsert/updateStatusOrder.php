<?php

include "../load.php";


if (isset($_POST['idEdit']) && isset($_POST['statusEdit']) ) {
    if($_POST['statusEdit']!="PENDIENTE"){
        $db->query("update shipping set 
        request_status='" . $_POST['statusEdit'] . "'
    
         where id_shipping='" . $_POST['idEdit'] . "'");

$session->msg('s', "Datos actualizados exitosamente. ");
redirect('../../admin/completeOrders.php', false);
    }else{
        $session->msg('d', "No hubo cambios. ");
        redirect('../../admin/pendingOrders.php', false);
    }
   
} else {
    $session->msg('d', "No se actualizo el estado del pedido. ");
    redirect('../../admin/pendingOrders.php', false);
}
?>