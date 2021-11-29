<?php
//headerAdmin($data);
require_once("../includes/load.php");
require_once("layoutAdmin/header_admin.php");
$user = current_user();
if (!$session->isUserLoggedIn(true) || validatePermition($user['type']) == 0 || validateStatus($user['status']) == 0) {
    redirect('../index.php', false);
}
$categories = allCategories();
$occasions = allOccasionss();
if (!isset($_GET['id']) || $_GET['id'] == "") {
    $session->msg('s', "Error al obtener el producto. ");
    redirect('products', false);
}
$product = searchProduct($_GET['id']);
$ocasion = searchOccasionById($product['occasions']);
$categoria = searchCategorieById($product['category']);
$i = 1;
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i>Tabla de productos</h1>
            <p>Editar Producto</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item active"><a href="dashboard.php">Dashboard</a></li>
            <li class="breadcrumb-item">Editar productos</li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">

                <div class="content-header">
                    <div class="container-fluid">
                        <form action="../includes/sqlinsert/update_product.php" method="POST"
                            enctype="multipart/form-data">
                            <div class="modal-header  bg-primary">
                                <h4 class="title text-white"><i class="fa fa-shopping-basket"></i> Editar Producto </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" id="idEdit" value="<?php echo $product['id_product'] ?>"
                                    name="idEdit">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input title="Nombre" type="text" name="nombreEdit"
                                        onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Nombre"
                                        id="nombreEdit" class="form-control" value="<?php echo $product['namep'] ?>"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="descripcion">Descripcion</label>
                                    <textarea title="Descripcion" rows="4" cols="50" name="descripcionEdit"
                                        onkeyup="javascript:this.value=this.value.toUpperCase();"
                                        placeholder="Descripcion" id="descripcionEdit" class="form-control"
                                        required><?php echo $product['description'] ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="imagen">Imagen</label>
                                    <div class="col-md-6 mx-auto">
                                        <div class="tittle">
                                            <div class="tile-title-w-btn ">
                                                <img align="right" title="Imagen" id="imgEdit" name="imgEdit"
                                                    width="500" height="600"
                                                    src="../uploads/product/<?php echo $product['image_product'] ?>"
                                                    alt="Card image">

                                            </div>
                                            <!-- <input type="file" name="imagenNew" id="imagenNew" multiple="multiple" class="btn btn-default btn-file" />-->

                                            <button type="button" class="btn btn-primary editaImagen" id="editaImagen"
                                                name="editaImagen" data-toggle="modal"
                                                data-target=".bd-example-modal-lg">Cambiar imagen</button>


                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Precio</label>
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputAmount">Precio (sin puntos ni
                                            coma)</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text">$</span>
                                            </div>
                                            <input title="Precio" type="number" min="0" name="precioEdit"
                                                placeholder="precio" id="precioEdit" class="form-control"
                                                value="<?php echo $product['price'] ?>" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="categoria">Categoria</label>
                                    <div class="row">
                                        <div class="col-9">
                                            <select title="Categoria" name="categoriaEdit" id="categoriaEdit"
                                                class="form-control" required>
                                                <option value="<?php echo $categoria['id_category']; ?>">
                                                    <?php echo $categoria['name']; ?></option>
                                                <?php foreach ($categories as $categorias) : ?>
                                                <option value="<?php echo $categorias['id_category']; ?>">
                                                    <?php echo $categorias['name']; ?></option>'
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            <a href="categories.php" class="btn btn-primary  btn-small active col-12"
                                                role="button" aria-pressed="true">Ir a categorias</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ocaciones">Ocaciones</label>
                                    <div class="row">
                                        <div class="col-9">
                                            <select title="Ocaciones" name="ocacionesEdit" id="ocacionesEdit"
                                                class="form-control" required>
                                                <option value="<?php echo $ocasion['id_ocaciones']; ?>">
                                                    <?php echo $ocasion['name_ocaciones']; ?></option>
                                                <?php foreach ($occasions as $ocaciones) : ?>
                                                <option value="<?php echo $ocaciones['id_ocaciones']; ?>">
                                                    <?php echo $ocaciones['name_ocaciones']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            <a href="occasions.php" class="btn btn-primary  btn-small active col-12"
                                                role="button" aria-pressed="true">Ir a ocaciones</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">Status</label>
                                    <select title="Status" name="statusEdit" id="status" class="form-control" required>
                                        <option value="ACTIVE">Active</option>
                                        <option value="INACTIVE">Inactive</option>
                                    </select>

                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Actualizar datos</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>





<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="../includes/sqlinsert/update_image.php" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditarImagen">Editar Imagen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="idEditarImg" value="<?php echo $product['id_product'] ?>"
                        name="idEditarImg">
                    <div class="tile">
                        <div class="tile-title-w-btn">
                            <img id="imgEditarimgEditarver" name="imgEditarver" width="900" height="600"
                                src="../uploads/product/<?php echo $product['image_product'] ?>" alt="Card image">

                        </div>
                        <input type="file" name="imagenNew" id="imagenNew" class="btn btn-default btn-file" required />


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
</div>


<?php
require_once("layoutAdmin/footer_admin.php")
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.quicksearch/2.2.1/jquery.quicksearch.js"></script>

<script>
$(function() {

    $('#search').quicksearch('table tbody tr');
});
//Preview
$(function() {
    $('#imagen').change(function(e) {
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
        $('#imgSalidaAdd').attr("src", result);
    }
});
$(function() {
    $('#imagenNew').change(function(e) {
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
        $('#imgEditarimgEditarver').attr("src", result);
    }
});

//Eliminar
$(document).ready(function() {
    var idEliminar = -1;
    var idEditar = -1;
    var fila;
    $(".btnEliminar").click(function() {
        idEliminar = $(this).data('id');
        fila = $(this).parent('td').parent('tr');
        var nombre = $(this).data('nombre');
        var descripcion = $(this).data('descripcion');
        var imagen = $(this).data('imagen');
        var categoria = $(this).data('categoria');
        var ocaciones = $(this).data('ocaciones');
        var status = $(this).data('status');
        var precio = $(this).data('precio');

        $("#nombreDelete").text(nombre);
        $("#descripcionDelete").text("Decripcion: " + descripcion);
        $("#categoriaDelete").text(categoria);
        $("#ocacionDelete").text("Ocacion: " + ocaciones);
        $("#statusDelete").text("Status: " + status);

        $("#precioDelete").text("$ " + precio);

        document.getElementById("imgSalidaDelete").src = "../uploads/product/" + imagen;

    });
    $(".eliminar").click(function() {
        $.ajax({
            url: '../includes/sqlinsert/delete_product.php',
            method: 'POST',
            data: {
                id: idEliminar
            }
        }).done(function(res) {

            $(fila).fadeOut(1000);
        });

    });


    //Editar
    $(".btnEditar").click(function() {

        idEditar = $(this).data('id');
        var nombre = $(this).data('nombre');
        var descripcion = $(this).data('descripcion');
        var imagen = $(this).data('imagen');
        var categoria = $(this).data('categoria');
        var ocacion = $(this).data('ocacion');
        var status = $(this).data('status');
        var precio = $(this).data('precio');
        $("#nombreEdit").val(nombre);
        $("#descripcionEdit").val(descripcion);
        $("#categoriaEdit").append(categoria);
        $("#statusEdit").text(status);
        $("#precioEdit").val(precio);
        $("#idEdit").val(idEditar);
        $("#ocacionesEdit").append(ocacion);
        document.getElementById("imgEdit").src = "../uploads/product/" + imagen;
        document.getElementById("imgEditar").src = "../uploads/product/" + imagen;
        $("#idEditarImg").val(idEditar);
    });


    //Ver
    $(".editaImagen").click(function() {
        document.getElementById("imgEditarver").src = "../uploads/product/" + imagen;
        addImage(e)
    });
});
</script>