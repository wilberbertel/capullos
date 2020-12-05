<?php
//headerAdmin($data);
require_once("../includes/load.php");
require_once("layoutAdmin/header_admin.php");
$user = current_user();
if (!$session->isUserLoggedIn(true) || validatePermition($user['type']) == 0 || validateStatus($user['status']) == 0) {
    redirect('../index.php', false);
}
$user = usersAdmin();

$i = 1;
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i>Usuarios administrativos</h1>
            <p>Lista de usuarios administrativos</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item active"><a href="dashboard.php">Dashboard</a></li>
            <li class="breadcrumb-item">Usuarios</li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">

                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark">Lista de usuarios</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6 text-right">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalAdd">
                                    <i class="fa fa-plus"></i> Insertar nuevo usuario (ADMINISTRADOR)
                                </button>
                            </div><!-- /.col -->

                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
            </div>
        </div>
    </div>
<?php echo display_msg($msg); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover"style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>                  
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Correo</th>
                                    <th>Tipo</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
<?php foreach ($user as $usuario) : ?>
                                    <tr>
                                        <td > <?php echo $i++ ?></td>
                                        <td > <?php echo $usuario['name']; ?></td>
                                        <td > <?php echo $usuario['surname']; ?></td>
                                        <td > <?php echo $usuario['email']; ?></td>
                                        <td class="text-success" > <h6><?php echo $usuario['type']; ?></h6></td>
                                        <td align="center" > <?php if ($usuario['status'] == "ACTIVE") {
        ?>
                                                <span class="badge badge-primary"><i class="fa fa-fw fa-lg fa-check-circle"></i>ACTIVE</span> 
                                            <?php } else { ?>
                                                <span class="badge badge-danger"><i class="fa fa-exclamation-triangle"></i>INACTIVE</span> 
    <?php } ?>
                                        </td>

                                    </tr>
<?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- ModalAdd -->
<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="ModalAddTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="../includes/sqlinsert/add_user.php" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalAddTitle">Añadir usuario administrador</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input title="Nombre" type="text" name="nombres" placeholder="nombre" id="nombres" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Apellidos</label>
                        <input title="Apellidos" rows="4" cols="50" name="apellidos" placeholder="Apellidos" id="apellidos" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Correo electronico</label>
                        <input title="Correo" rows="4" cols="50" name="correo" placeholder="Correo" id="correo" class="form-control" required>
                    </div>


                    <div class="form-group">
                        <label for="">Status</label>
                        <select title="Status" name="status" id="status" class="form-control" required>    
                            <option value="ACTIVE" >Active</option>
                            <option value="INACTIVE" >Inactive</option>
                        </select> 
                    </div>       
                </div>
                <div class="modal-footer">
                    <button title="Cerrar" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button  title="Guardar"type="submmit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div> 
    </div>
</div>



<?php
//footerAdmin($data);

require_once("layoutAdmin/footer_admin.php")
?>
