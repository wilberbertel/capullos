<?php
//headerAdmin($data);
require_once("../includes/load.php");
require_once("layoutAdmin/header_admin.php");
$user = current_user();
if (!$session->isUserLoggedIn(true) || validatePermition($user['type']) == 0 || validateStatus($user['status']) == 0) {
    redirect('../index.php', false);
}
$productosPendientes = historyShoppingPending();


$i = 1;
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i>Pedidos Pendientes</h1>
           
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item active"><a href="dashboard.php">Dashboard</a></li>
            <li class="breadcrumb-item">Pedidos Pendientes</li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">

                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-12  text-center"">
                            <h1 class="m-0 text-dark">Busqueda de pedidos pendientes</h1> <br>
                            <input  class="form-control form-control-lg"  type="text" id="search" placeholder="Escribe una  para buscar..." />

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
                                    <th>Imagen</th>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                    <th>Estado del pago</th>v
                                    <th>Fecha de compra</th>
                                    <th>Es Adicion</th>
                                    <th>Estado del pedido</th>
                                    <th>Ver datalles del pedido</th>
                                    <th>Cambiar Estado del pedido</th>
                                </tr>
                            </thead>
                            <tbody>
<?php foreach ($productosPendientes as $productosPendientes) : ?>
                                    <tr>
                                        <td > <?php echo $i++ ?></td>
                                        <td > 
                                         <img title ="<?php echo $productosPendientes['namep']?>" src="../uploads/product/<?php echo $productosPendientes['image_product']; ?>" width="70px" height="70px" alt="">
                                         </td>
                                        <td > <?php echo $productosPendientes['namep']; ?></td>
                                        <td > <?php echo numberCOP($productosPendientes['price']); ?></td>
                                        <td > 
                                        <?php
                                        if ($productosPendientes['status']!="Aceptada") {
                                            ?>
                                            <span class="badge badge-danger"><i class="fa fa-exclamation-triangle"></i> <?php echo $productosPendientes['status']; ?></span> 
                                        }
                                       <?php
                                        }else{?>
                                        <span class="badge badge-primary"><i class="fa fa-fw fa-lg fa-check-circle"></i> <?php echo $productosPendientes['status']; ?></span> 
                                       <?php }?>
                                        </td>
                                        <td > <?php echo $productosPendientes['date']; ?></td>

                                        <td > <?php echo $productosPendientes['additions']; ?></td>

                                        <td >  <span class="badge badge-danger"><i class="fa fa-exclamation-triangle"></i> <?php echo $productosPendientes['request_status']; ?></span> </td>
                             
                                        <td align="center">    
                                            <button  title="Ver" class="btn btn-info btn-small btnVer" 
                                                     data-id="<?php echo $productosPendientes['id_product']; ?>"
                                                     data-nombre="<?php echo $productosPendientes['namep']; ?>"
                                                     data-fecha="<?php echo $productosPendientes['date']; ?>"
                                                     data-nombredestinatario="<?php echo $productosPendientes['names']; ?>"
                                                     data-de="<?php echo $productosPendientes['from']; ?>"
                                                     data-mensaje="<?php echo $productosPendientes['message']; ?>"
                                                     data-para="<?php echo $productosPendientes['for']; ?>"
                                                     data-descripcion="<?php echo $productosPendientes['description']; ?>"
                                                     data-imagen="<?php echo $productosPendientes['image_product']; ?>"
                                                     data-nota="<?php echo $productosPendientes['note']; ?>" 
                                                     data-status="<?php echo $productosPendientes['status']; ?>"
                                                     data-precio="<?php echo $productosPendientes['price']; ?>"
                                                     data-pais="<?php echo $productosPendientes['country']; ?>"
                                                     data-ciudad="<?php echo $productosPendientes['city']; ?>"
                                                     data-departamento="<?php echo $productosPendientes['state']; ?>"
                                                     data-telefono="<?php echo $productosPendientes['phone']; ?>"
                                                     data-dirrecion1="<?php echo $productosPendientes['address1']; ?>"
                                                     data-dirrecion2="<?php echo $productosPendientes['address2']; ?>"
                                                     data-cantidad="<?php echo $productosPendientes['quantity']; ?>"
                                                     data-total="<?php echo $productosPendientes['amount']; ?>"
                                                     data-codigo="<?php echo $productosPendientes['order_code']; ?>"
                                                     data-banco="<?php echo $productosPendientes['bank']; ?>"
                                                     data-metodo="<?php echo $productosPendientes['payment_method']; ?>"
                                                     data-adicion="<?php echo $productosPendientes['additions']; ?>"

                                                     data-toggle="modal" data-target="#modalVer" >
                                                <i class="fa fa-eye" ></i> </button>                    
                                        </td>
                                        <td align="center">    
                                            <button  title="Editar" class="btn btn-primary btn-small btnEditarEstado" 
                                                     data-id="<?php echo $productosPendientes['id_shipping']; ?>"
                                                     data-imagen="<?php echo $productosPendientes['image_product']; ?>"
                                                     data-nombre="<?php echo $productosPendientes['namep']; ?>"
                                                     data-codigo="<?php echo $productosPendientes['order_code']; ?>"

                                                     data-toggle="modal" data-target="#modalEditar" >
                                                <i class="fa fa-pencil-square-o" ></i> </button>                    
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


<!-- ModalView -->
<div class="modal fade bd-example-modal-lg" id="modalVer" tabindex="-1" role="dialog" aria-labelledby="modalVer" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="modalVer">Orden </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="idVer" name="idVer">
                <h5 id="estadoPago" namer="estadoPago"  class="card-title"></h5>

                <div class="row">

                <div class="col-lg-12">
                    <div class="bs-component">
                        <div class="card">
                            <h4 id="pagoCodigo" name="pagoCodigo" class="card-header">Detalles del pago</h4>
                            <div class="card-body">
                            <h5 id="fechaPagoVer" namer="fechaPagoVer"  class="card-title"></h5>
                                <h5 id="bancoVer" namer="bancoVer"  class="card-title"></h5>
                         </div>
                        <div class="card-body">
                            <h6  id="cantidadPagoVer" name ="cantidadPagoVer" "class="card-subtitle text-muted">s </h6><br>
                                <p  id="precioPagoVer" class="card-text"></p><h6 class="card-link"  id="totalPagoVer"></h6>
                         </div>
                          
                            <div  id="statusPagoVer" class="card-footer text-muted"></div>
                            <div  id="codePagoVer" class="card-footer text-muted"></div>
                            <div  id="metodoPagoVer" class="card-footer text-muted"></div>                            
                        </div>
                    </div>
                    <div><br><br></div>
                </div>
            
                <div class="col-lg-6">
                    <div class="bs-component">
                        <div class="card">
                            <h4 id="nombreVer" name="nombreVer" class="card-header"></h4>
                            <div class="card-body">
                                <h5 id="precioVer" namer="precioVer"  class="card-title"></h5>
                                <h5 id="cantidadVer" namer="cantidadVerS"  class="card-title"></h5>
                                <h5 id="adicionVer" namer="adicionVer"  class="card-title">a</h5>
                                <h5 id="totalVer" namer="totalVer"  class="card-title"></h5>
                            </div>

                            <img id="imgSalida" style="height: 400px; width: 100%; display: block;" src="" alt="Card image">                                
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="bs-component">
                        <div class="card">

                            <h4 id="" name="" class="card-header">Detalles del Envio</h4>
                            <div class="card-body">
                            <h5 id="fechaVer" namer="fechaVer"  class="card-title"></h5>
                                <h5 id="nombreDestinatarioVer" namer="nombreDestinatarioVer"  class="card-title"></h5>
                            </div>
                            <div class="card-body">
                            <h6  id="deVer" name ="deVer" title="DE: "class="card-subtitle text-muted">s </h6><br>
                                <p  id="mensajeVer" class="card-text"></p><h6 class="card-link"  id="paraVer"></h6>
                            </div>
                            <div class="card-body">
                            <h6  id="paisVer" name ="paisVer"  class="card-subtitle text-muted">s </h6><br>
                                <p  id="departamentoVer" class="card-text"></p><h6 class="card-link"  id="ciudadVer"></h6>
                            </div>
                            <div  id="dirreccion1Ver" class="card-footer text-muted"></div>
                            <div  id="dirreccion2Ver" class="card-footer text-muted"></div>
                            <div  id="telefonoVer" class="card-footer text-muted"></div>

                            <div  id="notaVer" class="card-footer text-muted"></div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>     
            </div>     
        </div>
    </div>
</div>


<!-- ModalEdit -->
<div class="modal fade bd-example-modal-lg" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="modalEditar" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
            <form action="../includes/sqlinsert/updateStatusOrder.php" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditar">Editar estado del pedido</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="idEdit" name="idEdit">
                    <h5 id="codePago" namer="codePago"  class="card-title"></h5>

                    <div class="card-body">
                                <p  id="" class="card-text"></p><h6 class="card-link"  id="">Tenga en cuenta que al editar el  estado del pedido a completado este no podrá ser modificado de nuevo y se agregara a  los pedidos completado y listo para enviar. </h6>
                            </div>
                            <div align="center"> <img  id="imgSalidaE" style="height: 400px; width: 70%; " src="" alt="Card image"> </div>

                    <div class="form-group">
                        <label for="statusEdit">Status</label>
                        <select name="statusEdit" id="statusEdit" class="form-control" required>    
                            <option value="PENDIENTE" >PENDIENTE</option>
                            <option value="COMPLETADO" >COMPLETADO</option>
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
<?php
require_once("layoutAdmin/footer_admin.php")
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.quicksearch/2.2.1/jquery.quicksearch.js"></script>

<script>
$(function () {

$('#search').quicksearch('table tbody tr');								
});
//Preview
    $(function () {
        $('#imagen').change(function (e) {
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
    

    $(document).ready(function () {    
        //Ver
        $(".btnVer").click(function () {

            idVer = $(this).data('id');
            var nombre = $(this).data('nombre');
            var nombreDestinatario = $(this).data('nombredestinatario');
            var fecha = $(this).data('fecha');
            var de = $(this).data('de');
            var mensaje = $(this).data('mensaje');
            var para = $(this).data('para');
            var imagen = $(this).data('imagen');
            var nota = $(this).data('nota');
            var pais = $(this).data('pais');
            var departamento = $(this).data('departamento');
            var ciudad = $(this).data('ciudad');
            var status = $(this).data('status');
            var precio = $(this).data('precio');
            var dirrecion1 = $(this).data('dirrecion1');
            var dirrecion2 = $(this).data('dirrecion2');
            var telefono = $(this).data('telefono');
            var estadoPago = $(this).data('status');
            var cantidad = $(this).data('cantidad');
            var total = $(this).data('total');
            var codigo = $(this).data('codigo');
            var fechaPago = $(this).data('fecha');
            var banco = $(this).data('banco');
            var metodo = $(this).data('metodo');         
            var adicion =  $(this).data('adicion');        
            $("#fechaVer").text("Fecha de la orden entrante: "+fecha);
            $("#nombreVer").text(nombre);       
            $("#nombreDestinatarioVer").text("Nombre del destinatario:  "+nombreDestinatario);
            $("#deVer").text("De: "+de);
            $("#nombreVer1").text(nombre);
            $("#mensajeVer").text("Mensaje: " + mensaje);
            $("#paraVer").text("Para: " + para);
            $("#notaVer").text("Nota: " + nota);
            $("#paisVer").text("Pais: " + pais);
            $("#departamentoVer").text("Departamento: " + departamento);
            $("#ciudadVer").text("Ciudad: " + ciudad);
            $("#dirreccion1Ver").text("Dirrecion 1: " + dirrecion1);
            $("#dirreccion2Ver").text("Dirrecion 2: " + dirrecion2);
            $("#telefonoVer").text("Telefono: " + telefono);
            $("#estadoPago").text("El estado de pago del producto es: " + estadoPago);
            $("#precioVer").text("Precio $ " + precio);
            $("#cantidadVer").text("Cantidad  " + cantidad +" Unidades");
            $("#pagoCodigo").text("Detalles del pago -  " + codigo );
            $("#fechaPagoVer").text("Fecha: "+fecha);
            $("#totalVer").text("Total $ " + total );
            $("#bancoVer").text("Banco:  " + banco );
            $("#cantidadPagoVer").text("Cantidad:  " + cantidad );
            $("#precioPagoVer").text("Precio:  " + precio );
            $("#totalPagoVer").text("Total:  " + total );
            $("#metodoPagoVer").text("Metodo de pago:  " + metodo );
            $("#codePagoVer").text("Codigo de pago:  " + codigo );
            $("#statusPagoVer").text("Estado del pago:  " + status );
            $("#adicionVer").text("Este producto es una adicion:  " + adicion );
            document.getElementById("imgSalida").src = "../uploads/product/" + imagen;
            $("#idVer").val(idVer);
        });

                //Editar
                $(".btnEditarEstado").click(function () {
                    var imagen = $(this).data('imagen');
idEditar = $(this).data('id');
var codigo = $(this).data('codigo');

$("#codePago").text("Editar estado del pedido:  " + codigo );
$("#idEdit").val(idEditar);
document.getElementById("imgSalidaE").src = "../uploads/product/" + imagen;

});

    });


</script>
