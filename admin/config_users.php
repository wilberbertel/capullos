<?php //headerAdmin($data);
require_once("../includes/load.php");
require_once("layoutAdmin/header_admin.php");
$user = usersAdmin();

$i=1; ?>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>Configuracion usuarios administrativos</h1>
          <p>Lista de usuarios administrativos</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item active"><a href="dashboard.php">Dashboard</a></li>
          <li class="breadcrumb-item">Configuracion usuarios administrativos</li>
        </ul>
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
                      <th>Nombres</th>
                      <th>Apellidos</th>

                      <th>Tipo</th>
                      <th>Status</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($user as  $usuario) : ?>
                    <tr>
                    <td > <?php echo $i++ ?></td>
                       <td > <?php echo $usuario['name']; ?></td>
                       <td > <?php echo $usuario['surname']; ?></td>
                       <td class="text-success" > <h6><?php echo $usuario['type']; ?></h6></td>
                       <td align="center" > <?php if(  $usuario['status']=="ACTIVE"){
                        ?>
                       <span class="badge badge-primary"><i class="fa fa-fw fa-lg fa-check-circle"></i>ACTIVE</span> 
                       <?php }else{?>
                        <span class="badge badge-danger"><i class="fa fa-exclamation-triangle"></i>INACTIVE</span> 
                       <?php }?>
                       </td>

                       <td align="center" > 
                       
                       <button  title="Editar Status" class="btn btn-primary btn-small btnEditar " 
                       data-id="<?php echo $usuario['id_users']; ?>"
                       data-nombres="<?php echo $usuario['name']; ?>"
                       data-apellidos="<?php echo $usuario['surname']; ?>"
                       data-tipo="<?php echo $usuario['type']; ?>"
                       data-status="<?php echo $usuario['status']; ?>"
                       data-toggle="modal" data-target="#modalEditar">
                        
                       <i class="fa fa-pencil-square-o"></i> </button>
                     
                       <button  title="Eliminar" class="btn btn-danger btn-small  btnEliminar"
                       data-id="<?php echo $usuario['id_users']; ?>"
                       data-nombres="<?php echo $usuario['name']; ?>"
                       data-apellidos="<?php echo $usuario['surname']; ?>"
                       data-tipo="<?php echo $usuario['type']; ?>"
                       data-status="<?php echo $usuario['status']; ?>"
                       data-toggle="modal" data-target="#modalEliminar"
                        >
                       <i class="fa fa-trash"></i> </button>
                   
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



  <!-- ModalEdit -->
  <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="modalEditar" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <form action="../includes/sqlinsert/update_user.php" method="POST" enctype="multipart/form-data">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEditar">Editar usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <input type="hidden" id="idEdit" name="idEdit">
              <div class="form-group">
                  <label  for="nombre">Nombre</label>
                  <input title="Nombre" type="text" name="nombresEdit" placeholder="nombres" id="nombresEdit" class="form-control" disabled>
              </div>
              <div class="form-group">
                  <label for="apellidos">Apellidos</label>
                  <input title="Apellidos" rows="4" cols="50" name="apellidosEdit" placeholder="apellidosEdit" id="apellidosEdit" class="form-control" disabled>
              </div>          
              <div class="form-group">
                  <label for="">Status</label>
                  <select title="Status" name="statusEdit" id="statusEdit" class="form-control" required>    
                  <option value="ACTIVE" >Active</option>
                  <option value="INACTIVE" >Inactive</option>
                  </select> 
              </div>       
              <div class="form-group">
                  <label for="">Tipo</label>
                  <select title="Tipo" name="tipoEdit" id="tipoEdit" class="form-control" required>    
                  <option value="ADMINISTRADOR" >ADMINISTRADOR</option>
                  <option value="CLIENTE" >CLIENTE</option>
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

<!-- ModalDelete -->
<div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="modalEliminarLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
         
            <div class="modal-header">
              <h5 class="modal-title" id="modalEliminarLabel">Eliminar usuario</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <h3>¿Desea eliminar este usuario?</h3>
                <input type="hidden" id="idDelete" name="idDelete">
             <div class="col-lg-12">
            <div class="bs-component">
              <div class="card">
                <h4 id="nombresDelete" name="nombresDelete" class="card-header"></h4>
                <div class="card-body">
                 <h6 class="card-link"  id="statusDelete"></h6>
                </div>
                <div  id="tipoDelete" class="card-footer text-muted"></div>
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

    //Eliminar
  $(document).ready(function(){
    var idEliminar= -1;
    var idEditar=-1;
    var fila;
    $(".btnEliminar").click(function(){
        idEliminar= $(this).data('id');
        fila=$(this).parent('td').parent('tr');
        var nombres=$(this).data('nombres');
      var apellidos=$(this).data('apellidos');
      var status=$(this).data('status');
      var tipo=$(this).data('tipo');
        $("#nombresDelete").text(nombres+" "+ apellidos);
        $("#statusDelete").text("Status: "+status);
        $("#tipoDelete").text(tipo);
        $("#idDelete").text(idEliminar);
    });
    $(".eliminar").click(function(){
      $.ajax({
        url: '../includes/sqlinsert/delete_user.php',
        method:'POST',
        data:{
          id:idEliminar
        }
      }).done(function(res){
        
        $(fila).fadeOut(1000);
      });
     
    });

   
    //Editar
    $(".btnEditar").click(function(){
      
      idEditar=$(this).data('id');
      var nombres=$(this).data('nombres');
      var apellidos=$(this).data('apellidos');
      var status=$(this).data('status');
      var tipo=$(this).data('tipo');
      $("#nombresEdit").val(nombres);
      $("#apellidosEdit").val(apellidos);
         $("#statusEdit").append(status);
      $("#tipoEdit").append(tipo);
      $("#idEdit").val(idEditar);
    });
  
  });


</script>