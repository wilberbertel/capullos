<?php
//headerAdmin($data);
require_once("../includes/load.php");
require_once("layoutAdmin/header_admin.php");
$user = current_user();
if (!$session->isUserLoggedIn(true) || validatePermition($user['type']) == 0 || validateStatus($user['status']) == 0) {
    redirect('../index.php', false);
}
$manageData = manageData();
?>
   <main class="app-content">
   
      <div class="app-title">
        <div>
          <h1><i class="fa fa-file-text-o"></i> Reporte de ventas por mes</h1>
          <p><?php echo converterMonth(getMonth());?></p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Reporte de ventas por mes</a></li>
        </ul>
        
      </div>
     
        <div class="col-md-12">
            <div class="tile">
            <form action="reportMonth.php" method="POST">
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-4">
                           
                            <h4>Seleccione un mes</h4>
              <select  class="form-control" id="mes" name="mes" required>
              <option value="" selected disabled hidden>Seleccione un mes</option>
                <option value="01">Enero</option>
                <option value="02">Febrero</option>
                <option value="03">Marzo</option>
                <option value="04">Abril</option>
                <option value="05">Mayo</option>
                <option value="06">Junio</option>
                <option value="07">Julio</option>
                <option value="08">Agosto</option>
                <option value="09">Septiembre</option>
                <option value="10">Octubre</option>
                <option value="11">Noviembre</option>
                <option value="12">Diciembre</option>
                </select>
                            
                            </div><!-- /.col -->
                            <div class="col-sm-4">
                           
                           <h4>Seleccione un año</h4>
           
            
             <?php
              echo "<select class='form-control' id='año' name='año' >";
              echo "<option value='".getYear()."'>".getYear()."</option>";
              for ($i = 2010; $i <= date("Y"); $i++) {
                echo "<option value='" . $i . "'>" . $i . "</option>";
              }
              echo "</select>";
              ?>
               </div><!-- /.col -->
                           </div><!-- /.col -->
                            <div class="col-sm-12 text-right">
                                <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#ModalAddCategoria">
                                    <i class="fa fa-search"></i> buscar
                                </button>
                            </div><!-- /.col -->

                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                </form>
            </div>
        
      
      <?php if(isset($_POST['mes']) && isset($_POST['año']) ){
        $ganaciasMes= gainMonthYear($_POST['mes'],$_POST['año']); 
              
        if(sizeof($ganaciasMes)<=0){
            echo " <div class='col-6'>
            <h2 class='page-header'>No se encontraron registros</h2>
            
          </div>";
          exit;
          }
        ?>
      <div class="row" id="seleccion"  >
        <div class="col-md-12" id="seleccion">
          <div class="tile" >
          <section class="invoice" id="seleccion">
              <div class="row mb-4">
                <div class="col-6">
                  <h2 class="page-header"><i class="fa fa-building"></i>Capullos  Floristeria</h2>
                </div>
                <div class="col-6">
                  <h5 class="text-right">Fecha : <?php echo get_date(); ?></h5>
                </div>
              </div>
              <div class="row invoice-info">
                <div class="col-4">
                  <address><strong><?php echo $manageData['name'];?></strong><br><?php echo $manageData['address'];?><br><?php echo $manageData['phone_mobile']."-".$manageData['phone_fixed'];?><br><?php echo $manageData['whatsapp'];?><br>Email: <?php echo $manageData['email'];?></address>
                </div>
                <div class="col-4">
                </div>
                <div class="col-4"><b></b><br><br><b>FECHA DE BUSQUEDA :<?php echo converterMonth($_POST['mes'])." - ".$_POST['año'];?></b><br><b>POR: </b> <?php echo $user['name'];?><br><b>TIPO: </b> <?php echo $user['type'];?></div>
              </div>
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-bordered">
                    <thead>
                 
                      <tr>
                        <th>#</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Fecha/Hora</th>
                        <th>Sub Total</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $total= 0;
                    foreach ($ganaciasMes as $ganaciasMes) : ?>
                     
                      <tr>
                        <td>1</td>
                        <td><?php echo $ganaciasMes['namep'] ?></td>
                        <td><?php echo $ganaciasMes['quantity'] ?></td>
                        <td><?php echo $ganaciasMes['fecha']."".$ganaciasMes['hora'] ?></td>
                        <td><?php echo numberCOP($ganaciasMes['price']) ?></td>
                        <td><?php echo numberCOP($ganaciasMes['total']) ?></td>
                      </tr>
                      <?php
                    $total=$total+$ganaciasMes['total'];
                     endforeach; ?>
                    </tbody>
                  </table>
              
                </div>
              </div>
             
             <div class="row d-print-none mt-2">
             <div class="col-12 text-right">
             <h3 class="text-center">Total de ganancias: <?php echo "(".converterMonth($_POST['mes'])." - ".$_POST['año'] .")"." : $ ".  numberCOP($total);?></h3>
             <a class="btn btn-primary" href="javascript:imprSelec('seleccion');" ><i class="fa fa-print"></i> Imprimir</a></div>
              </div>
              
            </section>
          </div>
        </div>
      </div>
      <?php } ?>
    </main>


<?php
require_once("layoutAdmin/footer_admin.php")
?>

<script language="Javascript">
	function imprSelec(nombre) {
	  var ficha = document.getElementById(nombre);
	  var ventimp = window.open(' ', 'popimpr');
    ventimp.document.write( ficha.innerHTML );
    var css = ventimp.document.createElement("link");
css.setAttribute("href", "Assets/css/main.css");
css.setAttribute("rel", "stylesheet");
css.setAttribute("type", "text/css");
ventimp.document.head.appendChild(css);
	  ventimp.document.close();
	  ventimp.print( );
	  ventimp.close();
	}
	</script>