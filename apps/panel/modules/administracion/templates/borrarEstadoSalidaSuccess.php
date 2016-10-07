<div id="subnavegacion">
	<div class='botonSubNav'><?php echo link_to(__('Administrar Estados'),'/administracion/administrarEstados'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Crear Estado Pedido'),'/administracion/crearEstadoPedido'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Crear Estado Entrada'),'/administracion/crearEstadoEntrada'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Crear Estado Salida'),'/administracion/crearEstadoSalida'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Crear Estado Venta'),'/administracion/crearEstadoVenta'); ?></div>
</div>
<div id="tituloTabla">
  <?php echo __("BORRANDO ESTADO SALIDA"); ?>
</div>
<table class='centrarTablas'>
	<thead>
		<tr>
			<td colspan='2'><?php echo __("Borrar Estado Salida"); ?></td>
		</tr>
	</thead>
	<tr><td><?php echo $msg; ?></td></tr>
	<tr><td colspan='2'><?php echo button_to('Volver','administracion/administrarEstados',array('class' => 'buttonEsqueleto2')); ?></td></tr>
</table>