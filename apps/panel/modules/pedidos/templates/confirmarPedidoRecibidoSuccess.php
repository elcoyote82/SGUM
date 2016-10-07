<div id="subnavegacion">
	<div class='botonSubNav'><?php echo link_to(__('Agregar Pedido'),'/pedidos/index'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Administrar Pedidos'),'/pedidos/administrarPedidos'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Pedidos Pendientes'),'/pedidos/pedidosPendientes'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Pedidos En Proceso'),'/pedidos/pedidosEnProceso'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Pedidos Recibidos'),'/pedidos/pedidosRecibidos'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Pedidos Completos'),'/pedidos/pedidosCompletos'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Pedidos Procesados'),'/pedidos/pedidosProcesados'); ?></div>	
</div>
<div id="tituloTabla">
  <?php echo __("CONFIRMANDO PEDIDO RECIBIDO"); ?>
</div>
<?php if(!isset($msg)): ?>
	<?php echo form_tag('/pedidos/confirmarPedidoRecibido'); ?>
		<?php echo input_hidden_tag('id_md5_pedido', $id_md5_pedido); ?>	
		<table class='centrarTablas'>
			<thead>
				<tr>
					<td colspan='2'><?php echo __("Conductor"); ?></td>
				</tr>
			</thead>
			<tr>				
				<td colspan='2'>
					<?php echo form_error('id_transporte_conductor'); ?>
					<?php echo select_tag('id_transporte_conductor',options_for_select($ar_transporte_conductores,'')); ?>
				</td>
			</tr>	
			<tr>
				<td>
					<?php echo button_to(__('Cancelar'),'pedidos/pedidosRecibidos',array('class'  => 'buttonEsqueleto2')) ?>
				</td>
				<td>
					<?php echo submit_tag(__('Guardar'),array('class'  => 'buttonEsqueleto2')); ?>
				</td>
			</tr>
		</table>
	</form>
<?php else: ?>
	<table class='centrarTablas'>
		<thead>
			<tr>
				<td colspan='2'><?php echo __("Confirmar Pedido Recibido"); ?></td>
			</tr>
		</thead>
		<tr>
			<td colspan='2'><?php echo $msg; ?></td>
		</tr>
		<tr>
			<td><?php echo button_to('Volver','pedidos/pedidosRecibidos',array('class' => 'buttonEsqueleto2')); ?></td>
			<td><?php echo button_to('Comprobar Pedido Completo','pedidos/comprobarPedidoCompleto?id_md5_pedido='.$id_md5_pedido,array('class' => 'buttonEsqueleto2')); ?></td>
		</tr>
	</table>
<?php endif; ?>