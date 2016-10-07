<div id="subnavegacion">
	<div class='botonSubNav'><?php echo link_to(__('Agregar Venta'),'/ventas/index'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Administrar Ventas'),'/ventas/administrarVentas'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Ventas Pendientes'),'/ventas/ventasPendientes'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Ventas En Proceso'),'/ventas/ventasEnProceso'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Ventas Enviadas'),'/ventas/ventasEnviadas'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Ventas Completas'),'/ventas/ventasCompletas'); ?></div>	
	<div class='botonSubNav'><?php echo link_to(__('Ventas Procesadas'),'/ventas/ventasProcesadas'); ?></div>
</div>
<div id="tituloTabla">
  <?php echo __("CONFIRMANDO VENTA ENVIADA"); ?>
</div>
<?php if(!isset($msg)): ?>
	<?php echo form_tag('/ventas/confirmarVentaEnviada'); ?>
		<?php echo input_hidden_tag('id_md5_venta', $id_md5_venta); ?>	
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
					<?php echo button_to(__('Cancelar'),'ventas/ventasEnviadas',array('class'  => 'buttonEsqueleto2')) ?>
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
				<td colspan='2'><?php echo __("Confirmar Venta Enviada"); ?></td>
			</tr>
		</thead>
		<tr>
			<td colspan='2'><?php echo $msg; ?></td>
		</tr>
		<tr>
			<td><?php echo button_to('Volver','ventas/ventasEnviadas',array('class' => 'buttonEsqueleto2')); ?></td>
			<td><?php echo button_to('Comprobar Venta Completa','ventas/comprobarVentaCompleta?id_md5_venta='.$id_md5_venta,array('class' => 'buttonEsqueleto2')); ?></td>
		</tr>
	</table>
<?php endif; ?>