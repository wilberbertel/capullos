<?php 
include "../load.php";

if(isset($_POST['nombre']) &&  isset($_POST['descripcion'])   &&  isset($_POST['precio'])
&&  isset($_POST['status']) &&  isset($_POST['categoria'])&&  isset($_POST['oferta']) ){
    
    $carpeta="../../uploads/product/";
    $nombre = $_FILES['imagen']['name'];
   
    //imagen.casa.jpg
    $temp= explode( '.' ,$nombre);
    $extension= end($temp);
    $i = 0;
    $nombreFinal = time().'.'.$extension;
   
    if($extension=='jpg' || $extension == 'png'|| $extension == 'jpeg'){
        if(move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta.$nombreFinal)){
            $db->query("INSERT INTO product (namep,image_product,description,price,category,status,offer) VALUES (
                    '".$_POST['nombre']."',
                    '$nombreFinal',
                    '".$_POST['descripcion']."',                   
                    '".$_POST['precio']."',           
                    '".$_POST['categoria']."',
                    '".$_POST['status']."',
                    '".$_POST['oferta']."'
                )   ")or die($db->error);
                $session->msg('s',"Producto agregado exitosamente. ");
                redirect('../../admin/products.php', false);
        }else{
           // header("Location: ../admin/productos.php?error=No se pudo subir la imagen");
           $session->msg('w',"No se pudo subir la imagen. ");
           redirect('../../admin/products.php', false);
      
        }
    }else{
       // header("Location: ../admin/productos.php?error=Favor de subir una imagen valida");
       $session->msg('w',"Favor de subir una imagen valida. (JPG,PNG,JPEG) ");
       redirect('../../admin/products.php', false);
      
    }

}else{
   // header("Location: ../admin/productos.php?error=Favor de llenar todos los campos");
   $session->msg('d',"Favor de llenar todos los campos. ");
   redirect('../../admin/products.php', false);
  
}

?>