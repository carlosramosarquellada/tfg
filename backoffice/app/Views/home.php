<?php $session=session(); ?>
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>  
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>  
<script type="text/javascript">

window.onload = function () {

var options = {
	animationEnabled: true,
	title:{
		text: ""
	},
	axisX:{
		valueFormatString: "DD MMM",
		crosshair: {
			enabled: true,
			snapToDataPoint: true
		},
    intervalType: "day",
    interval: 1,
	},
	axisY: {
		title: "Ventas",
		valueFormatString: "##0.00€",
		crosshair: {
			enabled: true,
			snapToDataPoint: true,
			labelFormatter: function(e) {
				return   CanvasJS.formatNumber(e.value, "##0.00") +"€";
			}
		}
	},
	data: [{
		type: "area",
		xValueFormatString: "DD MMM",
		yValueFormatString: "##0.00€",
		dataPoints: [
      <?php foreach ($pedidos_ultima_semana as $dia)
      {
        echo'{ x: new Date('.$dia->anio.','. $dia->mes.','. $dia->dia.'), y: '.$dia->total.' },';
      }
     
      ?>
		]
	}]
};
$("#chartContainer").CanvasJSChart(options);
}


</script>
<main role="main" class="col-md-9 ml-sm-auto col-lg-12 pt-3 px-4"><div style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;" class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Ventas de la última semana</h1>
           
          </div>
          <div id="chartContainer" style="height: 370px; width: 100%;"></div>
          <div class="row">
          <div class="col-md-9 ml-sm-auto col-lg-4 pt-3 px-4">
            <h2>Mejores clientes</h2>
            <div class="table-responsive">
              <table class="table table-striped table-sm">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Total</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($mejores_clientes as $cliente): ?>
                  <tr>
                    <td><?php echo $cliente->id ?></td>
                    <td><?php echo $cliente->nombre ?></td>
                    <td><?php echo $cliente->apellidos ?></td>
                    <td><?php echo number_format($cliente->total,2,',','.').'€' ?></td>
                   
                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="col-md-9 ml-sm-auto col-lg-4 pt-3 px-4">
            <h2>Productos más vendidos</h2>
            <div class="table-responsive">
              <table class="table table-striped table-sm">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Producto</th>
                    <th>Cantidad vendida</th>
                    <th>Total generado</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($productos_mas_vendidos as $producto): ?>
                  <tr>
                    <td><?php echo $producto->id ?></td>
                    <td><?php echo $producto->nombre ?></td>
                    <td><?php echo $producto->total ?></td>
                    <td><?php echo number_format($producto->dinero,2,',','.').'€' ?></td>
                   
                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
          </div>
        </main>  
    
