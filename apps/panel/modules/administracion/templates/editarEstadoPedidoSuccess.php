<div id="subnavegacion">
	<div class='botonSubNav'><?php echo link_to(__('Administrar Estados'),'/administracion/administrarEstados'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Crear Estado Pedido'),'/administracion/crearEstadoPedido'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Crear Estado Entrada'),'/administracion/crearEstadoEntrada'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Crear Estado Salida'),'/administracion/crearEstadoSalida'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Crear Estado Venta'),'/administracion/crearEstadoVenta'); ?></div>
</div>
<div id="tituloTabla" >
	<?php echo __("EDITANDO ESTADO PEDIDO"); ?>
</div>
<?php if (!isset($msg)): ?>
	<?php echo form_tag('/administracion/editarEstadoPedido'); ?>
		<?php echo input_hidden_tag('id_estado_pedido',$id_estado_pedido); ?>
		<table class='centrarTablas'>
			<thead>
				<tr><td align='center' colspan='2'><?php echo __("Editar Estado Pedido"); ?></td></tr>
			</thead>
			<tr>
				<td align='center'><?php echo __("<strong>Estado: </strong>"); ?></td>
				<td>
					<?php echo form_error('estado_pedido'); ?>
					<?php echo input_tag('estado_pedido',$obj_estado_pedido->getEstadoPedido()); ?>
				</td>
			</tr>
			<tr>
				<td align='center'><?php echo button_to('Cancelar','administracion/administrarEstados',array('class' => 'buttonEsqueleto2')) ?></td>
				<td align='center'><?php echo submit_tag('Actualizar',array('class' => 'buttonEsqueleto2')); ?></td>
			</tr>
		</table>
	</form>
<?php else: ?>
	<table class='centrarTablas'>
		<thead>
			<tr>
				<td><?php echo __("Editar Estado Pedido"); ?></td>
			</tr>
		</thead>
		<tr><td align='center'><?php echo $msg; ?></td></tr>
		<tr>
			<td><?php echo button_to('Volver','administracion/administrarEstados',array('class' => 'buttonEsqueleto2')); ?></td>
		</tr>
	</table>
<?php endif; ?>