<?php //headerAdmin($data);
require_once("../includes/load.php");
require_once("layoutAdmin/header_admin.php");
$categories = allCategories();
$occasions = allOccasionss();
$products = allProductsAdmin();

$i=1; ?>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>Tabla de productos</h1>
          <p>Agregar,lista,eliminar,editar</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item active"><a href="dashboard.php">Dashboard</a></li>
          <li class="breadcrumb-item">Tabla de productos</li>
        </ul>
      </div>
      <div class="row">
    <div class="col-md-12">
      <div class="tile">
       
        <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Lista de productos</h1>
          </div><!-- /.col -->
          <div class="col-sm-6 text-right">
             <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalAdd">
              <i class="fa fa-plus"></i> Insertar Producto
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
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Imagen</th>
                      <th>Nombre</th>
                      <th>Descripcion</th>
                      <th>Precio</th>
                      <th>Categoria</th>
                      <th>Ocacion</th>
                      <th>Status</th>
                      <th>Oferta</th>
                      <th>Opcion</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($products as  $productos) : ?>
                    <tr>
                    <td > <?php echo $i++ ?></td>
                       <td align="center" >  <img src="../uploads/product/<?php echo $productos['image_product'];?>" width="25px" height="25px" alt=""></td>
                       <td > <?php echo $productos['namep']; ?></td>
                       <td > <?php echo $productos['description']; ?></td>
                       <td > <?php echo $productos['price']; ?></td>
                       <td > <?php echo $productos['name']; ?></td>
                       <td > <?php echo $productos['name_ocaciones']; ?></td>
                       <td align="center" > <?php if( $productos['status']=="ACTIVE"){
                          ?>
                          <span class="badge badge-primary"><i class="fa fa-fw fa-lg fa-check-circle"></i>ACTIVE</span> 
                          <?php }else{?>
                           <span class="badge badge-danger"><i class="fa fa-exclamation-triangle"></i>INACTIVE</span> 
                          <?php }?>
                          </td>
                       <td > <?php echo $productos['offer']; ?></td>
                       <td align="center">    
                      
                       <button  title="Ver" class="btn btn-info btn-small btnVer" 
                       data-id="<?php echo $productos['id_product']; ?>"
                          data-nombre="<?php echo $productos['namep']; ?>"
                          data-descripcion="<?php echo $productos['description']; ?>"
                          data-imagen="<?php echo $productos['image_product']; ?>"
                          data-categoria="<?php echo $productos['name']; ?>"
                          data-ocaciones="<?php echo $productos['name_ocaciones']; ?>"
                          data-status="<?php echo $productos['status']; ?>"
                          data-precio="<?php echo $productos['price']; ?>"
                          data-oferta="<?php echo $productos['offer']; ?>"                          
                          data-toggle="modal" data-target="#modalVer" >
                       <i class="fa fa-eye" ></i> </button>
                       <button  title="Editar" class="btn btn-primary btn-small btnEditar" 
                       data-id="<?php echo $productos['id_product']; ?>"
                          data-nombre="<?php echo $productos['namep']; ?>"
                          data-descripcion="<?php echo $productos['description']; ?>"
                          data-imagen="<?php echo $productos['image_product']; ?>"
                          data-categoria="<?php echo $productos['name']; ?>"
                          data-ocacion="<?php echo $productos['name_ocaciones']; ?>"
                          data-status="<?php echo $productos['status']; ?>"
                          data-precio="<?php echo $productos['price']; ?>"
                          data-oferta="<?php echo $productos['offer']; ?>" 
                          data-toggle="modal" data-target="#modalEditar">
                       <i class="fa fa-pencil-square-o"></i> </button>
                       <button  title="Eliminar" class="btn btn-danger btn-small btnEliminar" 
                         data-id="<?php echo $productos['id_product']; ?>"
                         data-nombre="<?php echo $productos['namep']; ?>"
                          data-descripcion="<?php echo $productos['description']; ?>"
                          data-imagen="<?php echo $productos['image_product']; ?>"
                          data-categoria="<?php echo $productos['name']; ?>"
                          data-ocacion="<?php echo $productos['name_ocaciones']; ?>"
                          data-status="<?php echo $productos['status']; ?>"
                          data-precio="<?php echo $productos['price']; ?>"
                          data-oferta="<?php echo $productos['offer']; ?>"  
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
<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="ModalAddTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    
    <form action="../includes/sqlinsert/add_product.php" method="POST" enctype="multipart/form-data">
         <!--Header-->
         <div class="modal-header  bg-primary">
        <h4 class="title text-white"><i class="fa fa-shopping-basket"></i> Agregar nuevo producto!</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
      </div>
          <div class="modal-body">
              <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input title="Nombre" type="text" name="nombre" placeholder="nombre" id="nombre" class="form-control" required>
              </div>
              <div class="form-group">
                  <label for="descripcion">Descripcion</label>
                  <textarea title="Descripcion" rows="4" cols="50" name="descripcion" placeholder="descripcion" id="descripcion" class="form-control" required></textarea>
              </div>
           
              <div class="form-group">
                  <label for="imagen">Imagen</label>
                  <div class="tile">
            <div class="tile-title-w-btn"> 
            </div>
        
            <input title="Imagen" type="file" id="imagen" name="imagen" multiple="multiple" class="btn btn-default btn-file" />    
            <div class="tile-title-w-btn"> 
            <img id="imgSalidaAdd" style="height: 500px; width: 100%; display: block;" src="" />         
            </div>
           </div>
              </div>
              <div class="form-group">
                    <label class="control-label">Precio</label>
                    <div class="form-group">
                      <label class="sr-only" for="exampleInputAmount">Precio (sin puntos ni coma)</label>
                      <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                        <input title="Precio" type="number" min="0" name="precio" placeholder="precio" id="precio" class="form-control" required>
                        <div class="input-group-append"><span class="input-group-text">.00</span></div>
                      </div>
                    </div>
                  </div>
                   
              <div class="form-group">
                  <label for="categoria">Categoria</label>
                  <div class="row">
                      <div class="col-9">
                      <select title="Categoria" name="categoria" id="categoria" class="form-control" required>  
                      <?php foreach ($categories as  $categorias) : ?> 
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
                  <label for="ocacion">Ocacion</label>
                  <div class="row">
                      <div class="col-9">
                      <select title="Ocacion" name="ocacion" id="ocacion" class="form-control" required>  
                      <?php foreach ($occasions as  $ocaciones) : ?> 
                  <option value="<?php echo $ocaciones['id_ocaciones']; ?>" ><?php echo $ocaciones['name_ocaciones']; ?></option>'   
                  <?php endforeach; ?>
                  </select> 
                      </div>
                      <div class="col-3">                  
                    <a href="occasions.php" class="btn btn-primary  btn-small active col-12" role="button" aria-pressed="true">Ir a Ocaciones</a>
                      </div>
                  </div>
              </div>
        <div class="row">
           <div class="col-md-4">
             <div class="form-group">
                  <label for="oferta">Oferta</label>
                  <div class="row">
                      <div class="col-9">      
                  <select title="Oferta" name="oferta" id="oferta" class="form-control" required>   
                  <option value="ON" >Si</option> 
                  <option value="OFF" >NO</option> 
                  </select> 
                      </div>
                  </div>
              
              </div>
              </div>
              <div class="col-md-4 ml-auto"> 
              <div class="form-group">
                  <label for="status">Status</label>
                  <select title="Status" name="status" id="status" class="form-control" required>    
                  <option value="ACTIVE" >Active</option>
                  <option value="INACTIVE" >Inactive</option>
                  </select> 
              </div> 
              </div>
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

  <!-- ModalEdit -->
  <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="modalEditar" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <form action="../includes/sqlinsert/update_product.php" method="POST" enctype="multipart/form-data">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEditar">Editar producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <input type="hidden" id="idEdit" name="idEdit">
              <div class="form-group">
                  <label  for="nombre">Nombre</label>
                  <input title="Nombre" type="text" name="nombreEdit" placeholder="nombre" id="nombreEdit" class="form-control" required>
              </div>
              <div class="form-group">
                  <label for="descripcion">Descripcion</label>
                  <textarea title="Descripcion" rows="4" cols="50" name="descripcionEdit" placeholder="descripcion" id="descripcionEdit" class="form-control" required></textarea>
              </div>          
              <div class="form-group">
                  <label for="imagen">Imagen</label>
                  <div class="col-md-12">
          <div class="tile">
            <div class="tile-title-w-btn"> 
              <img title="Imagen" id="imgEdit" name="imgEdit" style="height: 500px; width: 100%; display: block;" src="" alt="Card image">                
            </div>
           <!-- <input type="file" name="imagenNew" id="imagenNew" multiple="multiple" class="btn btn-default btn-file" />-->
           <button title="Editar imagen" type="button" class="btn btn-primary btnEditarImagen" id="editaImagen" >
                       <i class="fa fa-pencil-square-o" ></i> Editar solo imagen</button>   
          </div>         
        </div>               
             </div>
        
              <div class="form-group">
                    <label class="control-label">Precio</label>
                    <div class="form-group">
                      <label class="sr-only" for="exampleInputAmount">Precio (sin puntos ni coma)</label>
                      <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                        <input title="Precio" type="number" min="0" name="precioEdit" placeholder="precio" id="precioEdit" class="form-control" required>
                        <div class="input-group-append"><span class="input-group-text">.00</span></div>
                      </div>
                    </div>
                  </div>
                  
              <div class="form-group">
                  <label for="categoria">Categoria</label>
                  <div class="row">
                      <div class="col-9">
                      <select title="Categoria" name="categoriaEdit" id="categoriaEdit" class="form-control" required>  
                      <?php foreach ($categories as  $categorias) : ?> 
                  <option value="<?php echo $categorias['id_category']; ?>" ><?php echo $categorias['name']; ?></option>'   
                  <?php endforeach; ?>
                  </select> 
                      </div>
                      <div class="col-3">                  
                    <a href="#" class="btn btn-primary  btn-small active col-12" role="button" aria-pressed="true">Ir a categorias</a>
                      </div>
                  </div>
              </div>
              <div class="form-group">
                  <label for="ocaciones">Ocaciones</label>
                  <div class="row">
                      <div class="col-9">
                      <select title="Ocaciones" name="ocacionesEdit" id="ocacionesEdit" class="form-control" required>  
                      <?php foreach ($occasions as  $ocaciones) : ?> 
                  <option value="<?php echo $ocaciones['id_ocaciones']; ?>" ><?php echo $ocaciones['name_ocaciones']; ?></option>'   
                  <?php endforeach; ?>
                  </select> 
                      </div>
                      <div class="col-3">                  
                    <a href="#" class="btn btn-primary  btn-small active col-12" role="button" aria-pressed="true">Ir a categorias</a>
                      </div>
                  </div>
              </div>
              <div class="row">
           <div class="col-md-4">
           <div class="form-group">
                  <label for="oferta">Oferta</label>
                  <div class="row">
                      <div class="col-9">
                      
                      <select title="Oferta" name="ofertaEdit" id="ofertaEdit" class="form-control" required>   
                  <option value="ON" >Si</option> 
                  <option value="OFF" >NO</option> 
                  </select> 
                      </div>
                  </div>
              </div>
              </div>
              <div class="col-md-4 ml-auto"> 
              <div class="form-group">
                  <label for="">Status</label>
                  <select title="Status" name="statusEdit" id="status" class="form-control" required>    
                  <option value="ACTIVE" >Active</option>
                  <option value="INACTIVE" >Inactive</option>
                  </select> 
              </div> 
              </div>
     </div>  
              <div class="form-group">
                  <label for="oferta">Oferta</label>
                  <div class="row">
                      <div class="col-9">
                      
                      <select title="Oferta" name="ofertaEdit" id="ofertaEdit" class="form-control" required>   
                  <option value="ON" >Si</option> 
                  <option value="OFF" >NO</option> 
                  </select> 
                      </div>
                  </div>
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

  <!-- ModalView -->
  <div class="modal fade" id="modalVer" tabindex="-1" role="dialog" aria-labelledby="modalVer" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
  
      <div class="modal-header">
        <h5 class="modal-title" id="modalVer">Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <input type="hidden" id="idVer" name="idVer">
  
          <div class="col-lg-12">
            <div class="bs-component">
              <div class="card">
                <h4 id="nombreVer" name="nombreVer" class="card-header"></h4>
                <div class="card-body">
                  <h5 id="precioVer" namer="precioVer"  class="card-title"></h5>
                  <h6  id="categoriaVer" class="card-subtitle text-muted"></h6>
                </div>
                
                <img id="imgSalida" style="height: 500px; width: 100%; display: block;" src="" alt="Card image">
                <div class="card-body">
                  <p  id="descripcionVer" class="card-text"></p><h6 class="card-link"  id="ocacionVer"></h6>
                </div>
                <div  id="statusVer" class="card-footer text-muted"></div>
                <div  id="ofertaVer" class="card-footer text-muted"></div>
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

 <!-- ModalEditImagen -->
<div class="modal fade" id="modalEditarImagen" tabindex="-1" role="dialog" aria-labelledby="modalEditarImagen" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <form action="../includes/sqlinsert/update_image.php" method="POST" enctype="multipart/form-data">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEditarImagen">Editar Imagen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <input type="hidden" id="idEditarImg" name="idEditarImg">
      <div class="tile">
            <div class="tile-title-w-btn"> 
              <img id="imgEditar" name="imgEditar" style="height: 500px; width: 100%; display: block;" src="" alt="Card image">                
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

<!-- ModalDelete -->
<div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="modalEliminarLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
         
            <div class="modal-header">
              <h5 class="modal-title" id="modalEliminarLabel">¿Desea eliminar el producto?</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="idDelete" name="idDelete">
             <div class="col-lg-12">
            <div class="bs-component">
              <div class="card">
                <h4 id="nombreDelete" name="nombreDelete" class="card-header"></h4>
                <div class="card-body">
                  <h5 id="precioDelete" namer="precioDelete"  class="card-title"></h5>
                  <h6  id="categoriaDelete" class="card-subtitle text-muted"></h6>
                </div>
                <img id="imgSalidaDelete" style="height: 500px; width: 100%; display: block;" src="" alt="Card image">
                <div class="card-body">
                  <p  id="descripcionDelete" class="card-text"></p><h6 class="card-link"  id="ocacionesaDelete"></h6>
                </div>
                <div  id="statusDelete" class="card-footer text-muted"></div>
                <div  id="ofertaDelete" class="card-footer text-muted"></div>
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


<?php //footerAdmin($data);

require_once("layoutAdmin/footer_admin.php") 

?>
<script>
//Preview
$(function() {
  $('#imagen').change(function(e) {
      addImage(e); 
     });

     function addImage(e){
      var file = e.target.files[0],
      imageType = /image.*/;
    
      if (!file.type.match(imageType))
       return;
  
      var reader = new FileReader();
      reader.onload = fileOnload;
      reader.readAsDataURL(file);
     }
  
     function fileOnload(e) {
      var result=e.target.result;
      $('#imgSalidaAdd').attr("src",result);
     }
    });
    $(function() {
  $('#imagenNew').change(function(e) {
      addImage(e); 
     });

     function addImage(e){
      var file = e.target.files[0],
      imageType = /image.*/;
    
      if (!file.type.match(imageType))
       return;
  
      var reader = new FileReader();
      reader.onload = fileOnload;
      reader.readAsDataURL(file);
     }
  
     function fileOnload(e) {
      var result=e.target.result;
      $('#imgEditar').attr("src",result);
     }
    });

    //Eliminar
  $(document).ready(function(){
    var idEliminar= -1;
    var idEditar=-1;
    var fila;
    $(".btnEliminar").click(function(){
      idEliminar= $(this).data('id');
      fila=$(this).parent('td').parent('tr');
    var nombre=$(this).data('nombre');
   var descripcion=$(this).data('descripcion');
   var imagen=$(this).data('imagen');
   var categoria=$(this).data('categoria');
   var ocaciones=$(this).data('ocaciones');
   var status=$(this).data('status');
   var precio=$(this).data('precio');
   var oferta=$(this).data('oferta');
   $("#nombreDelete").text(nombre);
   $("#descripcionDelete").text("Decripcion: "+descripcion);
   $("#categoriaDelete").text(categoria);
   $("#ocacionDelete").text("Ocacion: "+ocaciones);
   $("#statusDelete").text("Status: "+status);
   $("#ofertaDelete").text("Oferta: "+oferta);
   $("#precioDelete").text("$ "+precio);
 
   document.getElementById("imgSalidaDelete").src="../uploads/product/"+imagen;

    });
    $(".eliminar").click(function(){
      $.ajax({
        url: '../includes/sqlinsert/delete_product.php',
        method:'POST',
        data:{
          id:idEliminar
        }
      }).done(function(res){
        
        $(fila).fadeOut(1000);
      });
     
    });

    $(document).on('click', '#editaImagen', function() {
        $('#modalEditarImagen').modal('show');
    });

    //Editar
    $(".btnEditar").click(function(){
   
      idEditar=$(this).data('id');
      var nombre=$(this).data('nombre');
      var descripcion=$(this).data('descripcion');
      var imagen=$(this).data('imagen');
      var categoria=$(this).data('categoria');
      var status=$(this).data('status');
      var precio=$(this).data('precio');
      $("#nombreEdit").val(nombre);
      $("#descripcionEdit").val(descripcion);
     $("#categoriaEdit").append(categoria);
      $("#statusEdit").text(status);
      $("#precioEdit").val(precio);
      $("#idEdit").val(idEditar);
      document.getElementById("imgEdit").src="../uploads/product/"+imagen;
      document.getElementById("imgEditar").src="../uploads/product/"+imagen;
      $("#idEditarImg").val(idEditar);
    });
  
    
     //Ver
     $(".btnVer").click(function(){
   
   idVer=$(this).data('id');
   var nombre=$(this).data('nombre');
   var descripcion=$(this).data('descripcion');
   var imagen=$(this).data('imagen');
   var categoria=$(this).data('categoria');
   var ocaciones=$(this).data('ocaciones');
   var status=$(this).data('status');
   var precio=$(this).data('precio');
   var oferta=$(this).data('oferta');
   $("#nombreVer").text(nombre);
   $("#nombreVer1").text(nombre);
   $("#descripcionVer").text("Decripcion: "+descripcion);
   $("#categoriaVer").text(categoria);
   $("#ocacionVer").text("Ocacion: "+ocaciones);
   $("#statusVer").text("Status:"+ status);
   $("#ofertaVer").text("Oferta:"+ oferta);
   $("#precioVer").text("$ "+precio);
   document.getElementById("imgSalida").src="../uploads/product/"+imagen;
   $("#idVer").val(idVer);
 });
  });


</script>
