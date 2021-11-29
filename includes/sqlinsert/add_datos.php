<?php
include "../load.php";
$cadena = $_POST['fecha'];
$subCandena =  explode(" ", $cadena);
$fecha = $subCandena[0];
$hora = $subCandena[1];
$subCandenafecha =  explode("-", $fecha);
$año = $subCandenafecha[0];
$mes = $subCandenafecha[1];
$dia = $subCandenafecha[2];
$arreglocarritoCapullos = $_SESSION['carritoCapullos'];
$ordenes = ordersSearch($_POST['recibo']);
$nameState =   stateSearch($_POST['departamento']);
$num = mysqli_num_rows($resultado);
 if ($ordenes['order_code']!=$_POST['recibo']) {
     if($_POST['idUser']=="INVALIDO"){
        for ($i = 0; $i < count($arreglocarritoCapullos); $i++) {
            $db->query("INSERT INTO orders (id_product, date,fecha_entrega,hora_entrega quantity, subtotal, amount, order_code, operation_code, status, payment_method,bank) VALUES(
               '" . $arreglocarritoCapullos[$i]['Id'] . "',
               '" .  $fecha  . "',   
               '" . $arreglocarritoCapullos[$i]['Fecha'] . "',
                       '" . $arreglocarritoCapullos[$i]['Hora'] . "',        
               '" . $arreglocarritoCapullos[$i]['Cantidad']. "',
               '" . $arreglocarritoCapullos[$i]['Precio']. "',
               '" .$arreglocarritoCapullos[$i]['Cantidad']*$arreglocarritoCapullos[$i]['Precio']. "',
               '" . $_POST['recibo'] . "',
               '" . $_POST['referencia'] . "',
               '" . $_POST['estado'] . "',
               '" . $_POST['metodoPago'] . "',
               '" . $_POST['banco'] . "'
               )") or die($db->error);
     //   }
    

      //  $id_orden = $db->insert_id;
      //for ($i = 0; $i < count($arreglocarritoCapullos); $i++) {
          $db->query("INSERT INTO sold_products (id_product,quantity,price,total,hora,dia,mes,año,fecha) VALUES('" . $arreglocarritoCapullos[$i]['Id'] . "',
                       '" . $arreglocarritoCapullos[$i]['Cantidad'] . "','" . $arreglocarritoCapullos[$i]['Precio'] . "','" . $arreglocarritoCapullos[$i]['Cantidad']*$arreglocarritoCapullos[$i]['Precio'] . "',
                       '" . $hora . "',
                       '" . $dia . "',
                       '" . $mes . "',
                       '" . $año . "',
                       '" . $fecha . "'
                   
                )") or die($db->error);
      //}
      $ultima_orden =  lastOrders();
     $ultima_venta =  lastSoldProduct();
       // $id_venta = $db->insert_id;
     // for ($i = 0; $i < count($arreglocarritoCapullos); $i++) {
         $db->query("INSERT INTO shipping (`country`, `state`, `city`, `address1`, `address2`, `names`, `phone`, `from`, `for`, `message`, `note`, `payment_status`, `request_status`, `id_sold_product`,  `id_orders`) VALUES(
            '" . $_POST['pais']. "',
            '" .  $nameState['name_state'] . "',           
            '" . $_POST['ciudad']. "',
            '" .  $_POST['dir1']. "',
            '" .$_POST['dir2']. "',
            '" . $_POST['nombres'] . "',
            '" . $_POST['telefono'] . "',
            '" . $arreglocarritoCapullos[$i]['De'] . "',
            '" . $arreglocarritoCapullos[$i]['Mensaje'] . "',
            '" . $arreglocarritoCapullos[$i]['Para'] . "',
            '" .$_POST['nota']  . "',
            '" . $_POST['estado'] . "',
            'PENDIENTE',
            '" . $ultima_venta['id_soldProduct']. "',
            '" . $ultima_orden['id_orders'] . "'          
            )") or die($db->error);
     }

     }else{

      
        for ($i = 0; $i < count($arreglocarritoCapullos); $i++) {
            $db->query("INSERT INTO orders (id_product, date,fecha_entrega,hora_entrega, user, quantity, subtotal, amount, order_code, operation_code, status, payment_method,bank) VALUES(
               '" . $arreglocarritoCapullos[$i]['Id'] . "',
               '" .  $fecha  . "',
               '" . $arreglocarritoCapullos[$i]['Fecha'] . "',
                       '" . $arreglocarritoCapullos[$i]['Hora'] . "',
               '" . $_POST['idUser'] . "',
               '" . $arreglocarritoCapullos[$i]['Cantidad']. "',
               '" . $arreglocarritoCapullos[$i]['Precio']. "',
               '" .$arreglocarritoCapullos[$i]['Cantidad']*$arreglocarritoCapullos[$i]['Precio']. "',
               '" . $_POST['recibo'] . "',
               '" . $_POST['referencia'] . "',
               '" . $_POST['estado'] . "',
               '" . $_POST['metodoPago'] . "',
               '" . $_POST['banco'] . "'
               )") or die($db->error);
      
      $db->query("INSERT INTO sold_products (id_product,quantity,price,total,hora,dia,mes,año,fecha) VALUES('" . $arreglocarritoCapullos[$i]['Id'] . "',
      '" . $arreglocarritoCapullos[$i]['Cantidad'] . "','" . $arreglocarritoCapullos[$i]['Precio'] . "','" . $arreglocarritoCapullos[$i]['Cantidad']*$arreglocarritoCapullos[$i]['Precio'] . "',
      '" . $hora . "',
      '" . $dia . "',
      '" . $mes . "',
      '" . $año . "',
      '" . $fecha . "'
)") or die($db->error);
 $ultima_orden =  lastOrders();
 $ultima_venta =  lastSoldProduct();
   // $id_venta = $db->insert_id;
 // for ($i = 0; $i < count($arreglocarritoCapullos); $i++) {
     $db->query("INSERT INTO shipping (`country`, `state`, `city`, `address1`, `address2`, `names`, `phone`, `from`, `for`, `message`, `note`, `payment_status`, `request_status`, `id_sold_product`,  `id_user`,  `id_orders`) VALUES(
        '" . $_POST['pais']. "',
        '" .  $nameState['name_state'] . "',           
        '" . $_POST['ciudad']. "',
        '" .  $_POST['dir1']. "',
        '" .$_POST['dir2']. "',
        '" . $_POST['nombres'] . "',
        '" . $_POST['telefono'] . "',
        '" . $arreglocarritoCapullos[$i]['De'] . "',
        '" . $arreglocarritoCapullos[$i]['Mensaje'] . "',
        '" . $arreglocarritoCapullos[$i]['Para'] . "',
        '" .$_POST['nota']  . "',
        '" . $_POST['estado'] . "',
        'PENDIENTE',
        '" . $ultima_venta['id_soldProduct']. "',
        '" .$_POST['idUser']. "',
        '" . $ultima_orden['id_orders'] . "'          
        )") or die($db->error);



        }

     }
    
     
 }
    unset($_SESSION['carritoCapullosCopia']);
     unset($_SESSION['carritoCapullos']);
?>