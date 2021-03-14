<?php
require_once("../includes/load.php");
require_once("layoutAdmin/header_admin.php");
$user = current_user();
if (!$session->isUserLoggedIn(true) && validatePermition($user['type']) == 0 && validateStatus($user['status']) == 0) {
    //$session->msg('d', "Usuario no permitido");
    //redirect('../index.php', false);
    echo'<script type="text/javascript">
    alert("Usuario no permitido");
    window.location.href="../index.php";
    </script>';
}

$totalProducts = countProducts();
$totalUsersClientes = countUsersClientes();
$totalProductosVendidos = countSoldProducts();
$totalPedidosCompletados =  countShippingStatus('COMPLETADO');
$totalPedidosPendientes =  countShippingStatus('PENDIENTE');
$ValorTotalProductosVendidos =totalSoldProducts();
$ganaciasMes= gainMonth(getMonth());


?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
        </ul>
    </div>
<?php echo display_msg($msg); ?>
    <div class="row">
        <div class="col-md-4 col-lg-4">
            <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
                <div class="info">
                    <h4>Clientes Registrados</h4>
                    <p><b><?php echo $totalUsersClientes['total'];  ?></b></p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widget-small info coloured-icon"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
                <div class="info">
                    <h4>Total Productos</h4>
                    <p><b><?php echo $totalProducts['total']; ?></b></p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widget-small warning coloured-icon"><i class="icon fa fa-shopping-bag fa-3x"></i>
                <div class="info">
                    <h4>Productos Vendidos</h4>
                    <p><b><?php echo $totalProductosVendidos['total'];?></b></p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widget-small primary coloured-icon"><i class="icon fa fa-shopping-cart fa-3x"></i>
                <div class="info">
                    <h4>Pedidos Completados</h4>
                    <p><b><?php echo $totalPedidosCompletados['total']?></b></p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widget-small danger coloured-icon"><i class="icon fa fa-question-circle fa-3x"></i>
                <div class="info">
                    <h4>Pedidos Pendientes</h4>
                    <p><b><?php echo $totalPedidosPendientes['total']?></b></p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widget-small primary coloured-icon"><i class="icon fa fa-money fa-3x"></i>
                <div class="info">
                    <h4>Total Ganancias</h4>
                    <p><b><?php echo "$ ". numberCOP($ValorTotalProductosVendidos['total']); ?></b></p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 " id="container"></div>
<br>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">VENTAS DEL MES DE <?php echo   converterMonth(getMonth()). "DEL AÑO ". getYear();?></h3>
                
                    <div class="table-responsive">
              
                        <table class="table table-hover"style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>MES</th>
                                    <th>DIA</th>
                                    <th>HORA</th>
                                    <th>PRODUCTO</th>
                                    <th>TOTAL</th>
                                   
                                   
                                </tr>
                            </thead>
                            <tbody>

                            <?php 
                            $i  = 1;
                            foreach ($ganaciasMes as $ganaciasMes) : ?>
                                    <tr>
                                    <td > <?php echo   $i++ ; ?></td>
                                    <td > <?php echo converterMonth($ganaciasMes['mes']); ?></td>
                                    <td > <?php echo $ganaciasMes['dia']; ?></td>
                                    <td > <?php echo $ganaciasMes['hora']; ?></td>
                                    <td > <?php echo $ganaciasMes['namep']; ?></td>
                                    <td > <?php echo  numberCOP($ganaciasMes['total']); ?></td>


                                    </tr>
                                    <?php endforeach; ?>
                            </tbody>
                        </table> 
          
            
        

            </div>
        </div>
      
    </div>
    
</main>

<script type="text/javascript">
Highcharts.chart('container', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45,
            beta: 0
        }
    },
    title: {
        text: 'VENTAS POR MES PARA EL AÑO, <?php echo getYear();?>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            depth: 35,
            dataLabels: {
                enabled: true,
                format: '{point.name}'
            }
        }
    },
    series: [{
        type: 'pie',
        name: 'Porcentaje de venta',
        data: [
            <?php 
         $ganaciasEnero= gainMonths("01");
         $ganaciasFebrero= gainMonths("02");
         $ganaciasMarzo= gainMonths("03");
         $ganaciasAbril= gainMonths("04");
         $ganaciasMayo= gainMonths("05");
         $ganaciasJunio= gainMonths("06");
         $ganaciasJulio= gainMonths("07");
         $ganaciasAgosto= gainMonths("08");
         $ganaciasSeptiembre= gainMonths("09");
         $ganaciasOctubre= gainMonths("10");
         $ganaciasNoviembre= gainMonths("11");
        $ganaciasDiciembre= gainMonths("12");  
            if($ganaciasEnero['total']!=0){
                echo "['" .converterMonth($ganaciasEnero['mes'])."', ".$ganaciasEnero['total']/$ValorTotalProductosVendidos['total']."],";
            }
            if($ganaciasFebrero['total']!=0){
                echo "['" .converterMonth($ganaciasFebrero['mes'])."', ".$ganaciasFebrero['total']/$ValorTotalProductosVendidos['total']."],";
            }
            if($ganaciasMarzo['total']!=0){
                echo "['" .converterMonth($ganaciasMarzo['mes'])."', ".$ganaciasMarzo['total']/$ValorTotalProductosVendidos['total']."],";
            }
            if($ganaciasAbril['total']!=0){
                echo "['" .converterMonth($ganaciasAbril['mes'])."', ".$ganaciasAbril['total']/$ValorTotalProductosVendidos['total']."],";
            }
            if($ganaciasMayo['total']!=0){
                echo "['" .converterMonth($ganaciasMayo['mes'])."', ".$ganaciasMayo['total']/$ValorTotalProductosVendidos['total']."],";
            }
            if($ganaciasJunio['total']!=0){
                echo "['" .converterMonth($ganaciasJunio['mes'])."', ".$ganacganaciasJunioiasAbril['total']/$ValorTotalProductosVendidos['total']."],";
            }
            if($ganaciasJulio['total']!=0){
                echo "['" .converterMonth($ganaciasAbril['mes'])."', ".$ganaciasJulio['total']/$ValorTotalProductosVendidos['total']."],";
            }
            if($ganaciasAgosto['total']!=0){
                echo "['" .converterMonth($ganaciasAbril['mes'])."', ".$ganaciasAgosto['total']/$ValorTotalProductosVendidos['total']."],";
            }
            if($ganaciasSeptiembre['total']!=0){
                echo "['" .converterMonth($ganaciasSeptiembre['mes'])."', ".$ganaciasSeptiembre['total']/$ValorTotalProductosVendidos['total']."],";
            }
            if($ganaciasOctubre['total']!=0){
                echo "['" .converterMonth($ganaciasOctubre['mes'])."', ".$ganaciasOctubre['total']/$ValorTotalProductosVendidos['total']."],";
            }
            if($ganaciasNoviembre['total']!=0){
                echo "['" .converterMonth($ganaciasNoviembre['mes'])."', ".$ganaciasNoviembre['total']/$ValorTotalProductosVendidos['total']."],";
            }
            if($ganaciasDiciembre['total']!=0){
                echo "['" .converterMonth($ganaciasDiciembre['mes'])."', ".$ganaciasDiciembre['total']/$ValorTotalProductosVendidos['total']."]";
            }
         
         
  ?>
    
        ]
    }]
});
		</script>

<?php //footerAdmin($data);
require_once("layoutAdmin/footer_admin.php");

?>
