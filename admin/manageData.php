<?php
//headerAdmin($data);
require_once("../includes/load.php");
$user = current_user();
require_once("layoutAdmin/header_admin.php");
if (!$session->isUserLoggedIn(true) || validatePermition($user['type']) == 0 || validateStatus($user['status']) == 0) {
    redirect('../index.php', false);
}
$user = users($user['id_users']);
$manageData = manageData();
?>
<main class="app-content">
    <div class="row user">
        <div class="col-md-12">
            <div class="profile">
                <div class="info">
                <button title="Editar imagen" type="button" class="btn btn-primary btnEditarImagen" id="editaImagen"
                                            data-id="<?php echo $manageData['id_config']; ?>"
                                            data-imagen="<?php echo $manageData['banner_image']; ?>"
                                            data-toggle="modal" data-target="#modalEditarImagenProfile"
                                            > <i class="fa fa-pencil-square-o" ></i> Editar</button> 
                    <h4>Editar imagen del banner principal</h4>
                    
                </div>
                <div class=""><img class="user-img"   style="height: 200px; width: 100%; display: block;" src="../Assets/images/<?php echo $manageData['banner_image']; ?>"</div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="tile p-0">
                <ul class="nav flex-column nav-tabs user-tabs">
                    <li class="nav-item"><a class="nav-link active" href="#user-timeline" data-toggle="tab">Datos de la tienda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#user-settings" data-toggle="tab">Editar datos</a></li>
                </ul>
            </div>
        </div>
        <?php echo display_msg($msg); ?>
        <div class="col-md-9">
            <div class="tab-content">
                <div class="tab-pane active" id="user-timeline">
                    <div class="timeline-post">
                      
                        <div class="post-content">

                            <div class="tile user-settings">
                                <form>
                                    <div class="row mb-8">
                                    <div class="col-md-8">
                                            <label>NIT</label>
                                            <input class="form-control" name = "nit" type="text" disabled value="<?php echo $manageData['nit']; ?>" >
                                        </div> 
                                        <div class="col-md-8">
                                            <label>Nombres</label>
                                            <input class="form-control" name = "names" type="text" value="<?php echo $manageData['name']; ?>" disabled>
                                        </div>   
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8 mb-4">
                                            <label>Razon Social</label>
                                            <textarea title="Razon social" rows="4" cols="50" name="razonSocial" id="razonSOcial" class="form-control" disabled><?php echo $manageData['social_reason']; ?></textarea>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-8 mb-4">
                                            <label>Telefonos Fijos</label>
                                            <input class="form-control" name = "phoneFixed" type="text" value="<?php echo $manageData['phone_fixed']; ?>" disabled>
                                        </div>
                                        <div class="col-md-8 mb-4">
                                            <label>Celular</label>
                                            <input class="form-control" name = "phoneMobile" type="text" value="<?php echo $manageData['phone_mobile']; ?>" disabled>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-8 mb-4">
                                            <label>Numero de whatsapp</label>
                                            <input class="form-control" name = "whatsapp" type="text" value="<?php echo $manageData['whatsapp']; ?>" disabled>
                                        </div>
                                        <div class="col-md-8 mb-4">
                                            <label>Correo</label>
                                            <input class="form-control" name = "email" type="text" value="<?php echo $manageData['email']; ?>" disabled>
                                        </div>
                                        <div class="col-md-8 mb-4">
                                            <label>Direccion</label>
                                            <input class="form-control" name = "address" type="text" value="<?php echo $manageData['address']; ?>" disabled>
                                        </div>
                                     
                    
                                    </div>
                                </form>
                            </div>
                        </div>
                      
                    </div>
                </div>
                <!--EDITAR PERFIL-->
                <div class="tab-pane fade" id="user-settings">
                    <div class="tile user-settings">
                        <h4 class="line-head">Editar informacion</h4>
                      
                        <form  action="../includes/sqlinsert/update_manageData.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" id="idEdit" name="idEdit" value="<?php echo $manageData['id_config']; ?>" >
                            
                                    <div class="row mb-8">
                                    <div class="col-md-8">
                                            <label>NIT</label>
                                            <input class="form-control" name = "nit" type="text" value="<?php echo $manageData['nit']; ?>" >
                                        </div> 
                                        <div class="col-md-8">
                                            <label>Nombres</label>
                                            <input class="form-control" name = "names" type="text" value="<?php echo $manageData['name']; ?>" >
                                        </div>   
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8 mb-4">
                                            <label>Razon Social</label>
                                            <textarea title="Razon social" rows="4" cols="50" name="razonSocial" id="razonSOcial" class="form-control" required ><?php echo $manageData['social_reason']; ?></textarea>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-8 mb-4">
                                            <label>Telefonos Fijos</label>
                                            <input class="form-control" name = "phoneFixed" type="text"  required value="<?php echo $manageData['phone_fixed']; ?>" >
                                        </div>
                                        <div class="col-md-8 mb-4">
                                            <label>Celular</label>
                                            <input class="form-control" name = "phoneMobile" type="text" required value="<?php echo $manageData['phone_mobile']; ?>" >
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-8 mb-4">
                                            <label>Numero de whatsapp</label>
                                            <input class="form-control" name = "whatsapp" type="text" required value="<?php echo $manageData['whatsapp']; ?>" >
                                        </div>
                                        <div class="col-md-8 mb-4">
                                            <label>Correo</label>
                                            <input class="form-control" name = "email" type="text" required value="<?php echo $manageData['email']; ?>" >
                                        </div>
                                        <div class="col-md-8 mb-4">
                                            <label>Direccion</label>
                                            <input class="form-control" name = "address" type="text" required  value="<?php echo $manageData['address']; ?>" >
                                        </div>
                                     
                    
                                    </div>
                            <div class="row mb-10">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Actualizar datos</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>



</main>
<!-- ModalEditImagen -->
<div class="modal fade" id="modalEditarImagenProfile" tabindex="-1" role="dialog" aria-labelledby="modalEditarImagenProfile" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="../includes/sqlinsert/update_imageBanner.php" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditarImagenProfile">Editar Imagen de perfil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="idEditarImg" name="idEditarImg">
                    <div class="tile">
                        <div class="tile-title-w-btn"> 
                           <!-- <img id="imgEditar" name="imgEditar" style="height: 350px; width: 400%; display: block;" src="" alt="Card image">    -->            
                        </div>
                        <input type="file" name="imagenNew" id="imagenNew"  class="btn btn-default btn-file"  required />


                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Actualizar Imagen</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
//footerAdmin($data);

require_once("layoutAdmin/footer_admin.php")
?>

<script>
    $(function () {
        $('#imagenNew').change(function (e) {
            addImage(e);
        });

        function addImage(e) {
            var file = e.target.files[0],
                    imageType = /image.*/;

            if (!file.type.match(imageType))
                return;

            var reader = new FileReader();
            reader.onload = fileOnload;
            reader.readAsDataURL(file);
        }

        function fileOnload(e) {
            var result = e.target.result;
            $('#imgEditar').attr("src", result);
        }
    });
    //EditarFotoPerfil
    $(".btnEditarImagen").click(function () {
        idEditar = $(this).data('id');
        var imagen = $(this).data('imagen');
        $("#idEdit").val(idEditar);
        //document.getElementById("imgEdit").src="../uploads/users/"+imagen;
       // document.getElementById("imgEditar").src = "../uploads/users/" + imagen;
        $("#idEditarImg").val(idEditar);
    });
</script>
