<?php
//headerAdmin($data);
require_once("../includes/load.php");
$user = current_user();
require_once("layoutAdmin/header_admin.php");
if (!$session->isUserLoggedIn(true) || validatePermition($user['type']) == 0 || validateStatus($user['status']) == 0) {
    redirect('../index.php', false);
}
$user = users($user['id_users']);
?>
<main class="app-content">
    <div class="row user">
        <div class="col-md-12">
            <div class="profile">
                <div class="info"><img class="user-img" src="../uploads/users/<?php echo $user['image_profile']; ?>">
                    <h4><?php echo $user['name'] . " " . $user['surname']; ?></h4>
                    <p><?php echo $user['type']; ?></p>
                </div>
                <div class="cover-image"></div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="tile p-0">
                <ul class="nav flex-column nav-tabs user-tabs">
                    <li class="nav-item"><a class="nav-link active" href="#user-timeline" data-toggle="tab">Datos del usurios</a></li>
                    <li class="nav-item"><a class="nav-link" href="#user-settings" data-toggle="tab">Editar datos</a></li>
                </ul>
            </div>
        </div>
        <?php echo display_msg($msg); ?>

        <div class="col-md-9">
            <div class="tab-content">
                <div class="tab-pane active" id="user-timeline">
                    <div class="timeline-post">
                        <div class="post-media"><a href="#"><img class="user-img" style="height: 100px; width: 50%; display: block;" src="../uploads/users/<?php echo $user['image_profile']; ?>"></a>
                            <div class="content">
                                <h5><a href="#"><?php echo $user['name'] . " " . $user['surname']; ?></a></h5>
                                <p class="text-muted"><small><?php echo $user['type']; ?></small></p>
                            </div>
                        </div>
                        <div class="post-content">
                            <div class="tile user-settings">
                                <form>
                                    <div class="row mb-4">
                                        <div class="col-md-4">
                                            <label>Nombres</label>
                                            <input class="form-control" name = "names" type="text" value="<?php echo $user['name']; ?>" disabled>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Apellidos</label>
                                            <input class="form-control" name = "lasNames" type="text" value="<?php echo $user['surname']; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8 mb-4">
                                            <label>Correo</label>
                                            <input class="form-control" name = "email" type="text" value="<?php echo $user['email']; ?>" disabled>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-8 mb-4">
                                            <label>Direccion</label>
                                            <input class="form-control" name = "address" type="text" value="<?php echo $user['address']; ?>" disabled>
                                        </div>
                                        <div class="col-md-8 mb-4">
                                            <label>Direccion 2</label>
                                            <input class="form-control" name = "address2" type="text" value="<?php echo $user['address2']; ?>" disabled>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-8 mb-4">
                                            <label>Celular</label>
                                            <input class="form-control" name = "celular" type="text" value="<?php echo $user['phone']; ?>" disabled>
                                        </div>
                                        <div class="col-md-8 mb-4">
                                            <label>Pais</label>
                                            <input class="form-control" name = "pais" type="text" value="<?php echo $user['country']; ?>" disabled>
                                        </div>
                                        <div class="col-md-8 mb-4">
                                            <label>Departamento</label>
                                            <input class="form-control" name = "departamento" type="text" value="<?php echo $user['departament']; ?>" disabled>
                                        </div>
                                        <div class="col-md-8 mb-4">
                                            <label>Ciudad</label>
                                            <input class="form-control" name = "ciudad" type="text" value="<?php echo $user['city']; ?>" disabled>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-8 mb-4">
                                            <label>Tipo</label>
                                            <input class="form-control"  name = "tipo" type="text" value="<?php echo $user['type']; ?>" disabled>
                                        </div>
                                        <div class="col-md-8 mb-4">
                                            <label>Ultimo inicio de session</label>
                                            <input class="form-control"  name = "tipo" type="text" value="<?php echo $user['last_login']; ?>" disabled>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <ul class="post-utility">

                            <li class="comments"><a href="opcion.php"><i class="fa fa-unlock-alt"></i> Cambiar clave</a></li>
                        </ul>
                    </div>
                </div>
                <!--EDITAR PERFIL-->
                <div class="tab-pane fade" id="user-settings">
                    <div class="tile user-settings">
                        <h4 class="line-head">Editar informacion</h4>
                        <div class="info">
                            <div class="input-group">
                                <div  class="col-md-12">
                                    <img class="user-img"  style="height: 60px; width: 10%; display: block;"  src="../uploads/users/<?php echo $user['image_profile']; ?>">

                                    <button title="Editar imagen" type="button" class="btn btn-primary btnEditarImagen" id="editaImagen"
                                            data-id="<?php echo $user['id_users']; ?>"
                                            data-imagen="<?php echo $user['image_profile']; ?>"
                                            data-toggle="modal" data-target="#modalEditarImagenProfile"
                                            > <i class="fa fa-pencil-square-o" ></i> Editar</button>   
                                </div>
                            </div>
                        </div>
                        <h4 class="line-head"></h4>
                        <form  action="../includes/sqlinsert/update_profile.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" id="idEdit" name="idEdit" value="<?php echo $user['id_users']; ?>" >
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label>Nombres</label>
                                    <input class="form-control" name = "namesEdit" id="namesEdit" type="text" value="<?php echo $user['name']; ?>" >
                                </div>
                                <div class="col-md-4">
                                    <label>Apellidos</label>
                                    <input class="form-control" name = "lasNamesEdit" id="lasNamesEdit" type="text" value="<?php echo $user['surname']; ?>" >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 mb-4">
                                    <label>Correo</label>
                                    <input class="form-control" name = "emailEdit" id="emailEdit" type="text" value="<?php echo $user['email']; ?>" >
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-8 mb-4">
                                    <label>Direccion</label>
                                    <input class="form-control" name = "addressEdit" id="addressEdit" type="text" value="<?php echo $user['address']; ?>" >
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-8 mb-4">
                                    <label>Direccion 2</label>
                                    <input class="form-control" name = "address2Edit" id="address2Edit" type="text" value="<?php echo $user['address2']; ?>" >
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-8 mb-4">
                                    <label>Celular</label>
                                    <input class="form-control" name = "phoneEdit"  id="phoneEdit" type="text" value="<?php echo $user['phone']; ?>" >
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-8 mb-4">
                                    <label>Pais</label>
                                    <input class="form-control" name = "countryEdit" id="countryEdit" type="text" value="<?php echo $user['country']; ?>" >
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-8 mb-4">
                                    <label>Departamento</label>
                                    <input class="form-control" name = "departamentEdit"  id="departamentEdit" type="text" value="<?php echo $user['departament']; ?>" >
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-8 mb-4">
                                    <label>Ciudad</label>
                                    <input class="form-control" name = "cityEdit" id="cityEdit" type="text" value="<?php echo $user['city']; ?>" >
                                </div>
                                <?php /* if($user['type']=="SUPER"){
                                  echo "
                                  <div class='clearfix'></div>
                                  <div class='col-md-8 mb-4'>
                                  <label>Tipo</label>
                                  <select title='Oferta' name='tipoEdit' id='tipoEdit' class='form-control' required>
                                  <option value='SUPER' >SUPER ADMINISTRADOR</option>
                                  <option value='ADMINISTRADOR' >ADMINISTRADOR</option>
                                  <option value='CLIENTE' >CLIENTE</option>
                                  </select>
                                  </div>
                                  ";

                                  } */ ?>

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
            <form action="../includes/sqlinsert/update_imageProfile.php" method="POST" enctype="multipart/form-data">
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
                            <img id="imgEditar" name="imgEditar" style="height: 350px; width: 100%; display: block;" src="" alt="Card image">                
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
        document.getElementById("imgEditar").src = "../uploads/users/" + imagen;
        $("#idEditarImg").val(idEditar);
    });



</script>
