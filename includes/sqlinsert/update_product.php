<?php

include "../load.php";

if (isset($_POST['idEdit']) && isset($_POST['nombreEdit']) && isset($_POST['descripcionEdit']) && isset($_POST['precioEdit']) && isset($_POST['statusEdit']) &&  isset($_POST['categoriaEdit']) && isset($_POST['ocacionesEdit']) ) {

    $db->query("update product set namep='" . remove_junk($_POST['nombreEdit']) . "',
                description='" . remove_junk($_POST['descripcionEdit']) . "',
                price='" . remove_junk($_POST['precioEdit']) . "',
                category='" . remove_junk($_POST['categoriaEdit']) . "',
                occasions='" . remove_junk($_POST['ocacionesEdit']) . "', 
                status='" . remove_junk($_POST['statusEdit']) . "'            
                 where id_product='" . $_POST['idEdit'] . "'");

    $session->msg('s', "Producto actualizado exitosamente. ");
    redirect('../../admin/products.php', false);
} else {

    $session->msg('d', "No se actualizo  el producto. ");
    redirect('../../admin/products.php', false);
}


/* * else{

  $carpeta=".../../uploads/product/";
  $nombre = $_FILES['imagenNew']['name'];
  //imagen.casa.jpg
  $temp= explode('.', $nombre);
  $extension= end($temp);

  $nombreFinal = time().'.'.$extension;

  if ($extension=='jpg' || $extension == 'png' || $extension == 'jpeg') {
  if (move_uploaded_file( $_FILES['imagenNew']['tmp_name'], $carpeta.$nombreFinal)) {
  $fila = $conexion->query('select image_product  from product where idproduct='.$_POST['idEdit']);
  $id = mysqli_fetch_row($fila);
  if (file_exists('../../uploads/product/'.$id[0])) {
  unlink('../../uploads/product/'.$id[0]);
  }
  $db->query("update product set namep='".$_POST['nombreEdit']."',
  image_product='".$nombreFinal."',
  description='".$_POST['descripcionEdit']."',
  price='".$_POST['precioEdit']."',
  category='".$_POST['categoriaEdit']."',
  status='".$_POST['statusEdit']."',
  offer='".$_POST['ofertaEdit']."',
  where idproduct=".$_POST['idEdit']);
  $session->msg('s', "Producto actualizado exitosamente. ");
  redirect('../../admin/products.php', false);
  }else{
  $session->msg('w',"No se pudo subir la imagen. 2 ".$nombreFinal);
  redirect('../../admin/products.php', false);
  }
  }else{
  $session->msg('w',"Favor de subir una imagen valida. (JPG,PNG,JPEG) 2  ".  $nombre );
  redirect('../../admin/products.php', false);
  }
  } */
?>