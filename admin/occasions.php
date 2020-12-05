<?php
//headerAdmin($data);
require_once("../includes/load.php");
require_once("layoutAdmin/header_admin.php");
$user = current_user();
if (!$session->isUserLoggedIn(true) || validatePermition($user['type']) == 0 || validateStatus($user['status']) == 0) {
    redirect('../index.php', false);
}
$occasions = allOccasionss();
$categories = allCategories();
$i = 1;
?>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i>Tabla de ocaciones</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item active"><a href="dashboard.php">Dashboard</a></li>
            <li class="breadcrumb-item">Tabla de ocaciones</li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">

                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark">Lista de ocaciones</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6 text-right">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalAddCategoria">
                                    <i class="fa fa-plus"></i> Insertar nueva ocacion
                                </button>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
            </div>
        </div>
<?php echo display_msg($msg); ?>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover"style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Status</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
<?php foreach ($occasions as $ocaciones) : ?>
                                    <tr>
                                        <td > <?php echo $i++ ?></td>
                                        <td > <?php echo $ocaciones['name_ocaciones']; ?></td>
                                        <td align="center" > <?php if ($ocaciones['status'] == "ACTIVE") {
        ?>
                                                <span class="badge badge-primary"><i class="fa fa-fw fa-lg fa-check-circle"></i>ACTIVE</span> 
                                            <?php } else { ?>
                                                <span class="badge badge-danger"><i class="fa fa-exclamation-triangle"></i>INACTIVE</span> 
    <?php } ?>
                                        </td>
                                        <td align="center">
                                            <button  title="Editar" class="btn btn-primary btn-small btnEditar" 
                                                     data-id="<?php echo $ocaciones['id_ocaciones']; ?>"
                                                     data-nombre="<?php echo $ocaciones['name_ocaciones']; ?>"
                                                     data-status="<?php echo $ocaciones['status']; ?>"
                                                     data-toggle="modal" data-target="#modalEditar">
                                                <i class="fa fa-pencil-square-o"></i> </button>

                                        </td>
                                        <td align="center">
                                            <button  title="Eliminar" class="btn btn-danger btn-small btnEliminar" 
                                                     data-id="<?php echo $ocaciones['id_ocaciones']; ?>"
                                                     data-nombre="<?php echo $ocaciones['name_ocaciones']; ?>"
                                                     data-status="<?php echo $ocaciones['status']; ?>"
                                                     data-toggle="modal" data-target="#modalEliminar">
                                                <i class="fa fa-trash" ></i> </button>  
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
<div class="modal fade" id="ModalAddCategoria" tabindex="-1" role="dialog" aria-labelledby="modalEditar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="../includes/sqlinsert/add_occasions.php" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalAddCategoriaTitle">Insertar categoria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" placeholder="nombre" id="nombre" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="categoria">Categoria</label>
                        <div class="row">
                            <div class="col-9">
                                <select title="Categoria" name="categoria" id="categoria" class="form-control" required>  
                                    <?php foreach ($categories as $categorias) : ?> 
                                        <option value="<?php echo $categorias['id_category']; ?>" ><?php echo $categorias['name']; ?></option>'   
<?php endforeach; ?>
                                </select> 
                            </div>
                            <div class="col-3">                  
                                <a href="categories.php" class="btn btn-primary  btn-small active col-12" role="button" aria-pressed="true">Ir a Categorias</a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control" required>    
                            <option value="ACTIVE" >Active</option>
                            <option value="INACTIVE" >Inactive</option>
                        </select> 
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- ModalEdit -->
<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="modalEditar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="../includes/sqlinsert/update_occasions.php" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditar">Editar ocacion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="idEdit" name="idEdit">
                    <div class="form-group">
                        <label for="nombreEdit">Nombre</label>
                        <input type="text" name="nombreEdit" placeholder="nombre" id="nombreEdit" class="form-control" required>
                    </div>  
                    <div class="form-group">
                        <label for="categoria">Categoria</label>
                        <div class="row">
                            <div class="col-9">
                                <select title="Categoria" name="categoriaEdit" id="categoriaEdit" class="form-control" required>  
                                    <?php foreach ($categories as $categorias) : ?> 
                                        <option value="<?php echo $categorias['id_category']; ?>" ><?php echo $categorias['name']; ?></option>'   
<?php endforeach; ?>
                                </select> 
                            </div>
                            <div class="col-3">                  
                                <a href="categories.php" class="btn btn-primary  btn-small active col-12" role="button" aria-pressed="true">Ir a Categorias</a>
                            </div>
                        </div>
                    </div>   
                    <div class="form-group">
                        <label for="statusEdit">Status</label>
                        <select name="statusEdit" id="statusEdit" class="form-control" required>    
                            <option value="ACTIVE" >Active</option>
                            <option value="INACTIVE" >Inactive</option>
                        </select> 
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ModalDelete -->
<div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="modalEliminarLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="modalEliminarLabel">Eliminar ocacion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="bs-component" style="margin-bottom: 3em;">
                    <h3>¿Desea eliminar esta ocacion <button class="btn btn-secondary" type="button" title="" data-container="body" data-toggle="popover" data-placement="bottom" data-content="Tenga en cuenta que al eliminar esta categoria se eliminaran todos los productos asociados a esta." data-original-title="A tener en cuenta">?</button>
                </div></h3>

                <input type="hidden" id="idDelete" name="idDelete">

                <div class="col-lg-12">
                    <div class="bs-component">
                        <div class="card">
                            <h4 id="nombreDelete" name="nombreDelete" class="card-header"></h4>
                            <div  id="statusDelete" class="card-footer text-muted"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger eliminar" data-dismiss="modal">Eliminar</button>
            </div>
        </div>
    </div>
</div>
</div>  



<?php
//footerAdmin($data);

require_once("layoutAdmin/footer_admin.php")
?>
<script>
    //Eliminar
    $(document).ready(function () {
        var idEliminar = -1;
        var idEditar = -1;
        var fila;
        $(".btnEliminar").click(function () {
            idEliminar = $(this).data('id');
            fila = $(this).parent('td').parent('tr');
            var nombre = $(this).data('nombre');
            var status = $(this).data('status');
            $("#nombreDelete").text(nombre);
            $("#statusDelete").text(status);
        });
        $(".eliminar").click(function () {
            $.ajax({
                url: '../includes/sqlinsert/delet_occasions.php',
                method: 'POST',
                data: {
                    id: idEliminar
                }
            }).done(function (res) {

                $(fila).fadeOut(1000);
            });

        });


        //Editar
        $(".btnEditar").click(function () {
            idEditar = $(this).data('id');
            var nombre = $(this).data('nombre');
            var status = $(this).data('status');
            $("#nombreEdit").val(nombre);
            $("#statusEdit").val(status);
            $("#idEdit").val(idEditar);

        });

    });


</script>