<?php

include "../load.php";

if ($_FILES['imagenNew']['name'] != '') {
    $carpeta = "../../Assets/images/";
    $nombre = $_FILES['imagenNew']['name'];
    //imagen.casa.jpg
    $temp = explode('.', $nombre);
    $extension = end($temp);

    $nombreFinal = time() . '.' . $extension;

    if ($extension == 'jpg' || $extension == 'png' || $extension == 'jpeg') {
        if (move_uploaded_file($_FILES['imagenNew']['tmp_name'], $carpeta . $nombreFinal)) {
            $fila = $db->query('select banner_image  from company_configuration where id_config=' . $_POST['idEditarImg']);
            $id = mysqli_fetch_row($fila);
            if (file_exists('../../uploads/users/' . $id[0])) {
                unlink('../../uploads/users/' . $id[0]);
            }
            $db->query("update company_configuration set banner_image='" . $nombreFinal . "' where id_config=" . $_POST['idEditarImg']);
            $session->msg('s', "imagen actualizada exitosamente. ");
            redirect('../../admin/manageData.php', false);
        } else {
            $session->msg('w', "No se pudo subir la imagen. ");
            redirect('../../admin/manageData.php', false);
        }
    } else {
        $session->msg('w', "Favor de subir una imagen valida. (JPG,PNG,JPEG) ");
        redirect('../../admin/manageData.php', false);
    }
} else {
    $session->msg('d', "Favor de llenar todos los campos. ");
    redirect('../../admin/manageData.php', false);
}
?>