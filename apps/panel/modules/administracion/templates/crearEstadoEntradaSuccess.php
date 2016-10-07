<div id="subnavegacion">
	<div class='botonSubNav'><?php echo link_to(__('Administrar Estados'),'/administracion/administrarEstados'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Crear Estado Pedido'),'/administracion/crearEstadoPedido'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Crear Estado Entrada'),'/administracion/crearEstadoEntrada'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Crear Estado Salida'),'/administracion/crearEstadoSalida'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Crear Estado Venta'),'/administracion/crearEstadoVenta'); ?></div>
</div>
<div id="tituloTabla" >
	<?php echo __("AGREGANDO ESTADO ENTRADA"); ?>
</div>
<?php if (!isset($msg)): ?>
	<?php echo form_tag('/administracion/crearEstadoEntrada'); ?>
		<table class='centrarTablas'>
			<thead>
				<tr><td align='center' colspan='2'><?php echo __("Agregar Estado Entrada"); ?></td></tr>
			</thead>
			<tr>
				<td align='center'><?php echo __("<strong>Estado: </strong>"); ?></td>
				<td>
					<?php echo form_error('estado_entrada'); ?>
					<?php echo input_tag('estado_entrada'); ?>
				</td>
			</tr>
			<tr>
				<td align='center'><?php echo button_to('Cancelar','administracion/administrarEstados',array('class' => 'buttonEsqueleto2')) ?></td>
				<td align='center'><?php echo submit_tag('Guardar',array('class' => 'buttonEsqueleto2')); ?></td>
			</tr>
		</table>
	</form>
<?php else: ?>
	<table class='centrarTablas'>
		<thead>
			<tr>
				<td colspan='2'><?php echo __("Agregar Estado Entrada"); ?></td>
			</tr>
		</thead>
		<tr><td align='center' colspan='2'><?php echo $msg; ?></td></tr>
		<tr>
			<td><?php echo button_to('Agregar Otro','/administracion/crearEstadoEntrada',array('class' => 'buttonEsqueleto2')); ?></td>
			<td><?php echo button_to('Volver','administracion/administrarEstados',array('class' => 'buttonEsqueleto2')); ?></td></tr>
	</table>
<?php endif; ?>