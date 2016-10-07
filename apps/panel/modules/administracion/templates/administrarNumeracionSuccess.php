<div id="subnavegacion">
	<div class='botonSubNav'><?php echo link_to(__('Usuarios'),'/administracion/index'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Crear Usuario'),'/administracion/crearUsuario'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Grupos'),'/administracion/administrarGrupos'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Crear Grupo'),'/administracion/crearGrupo'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Permisos'),'/administracion/administrarPermisos'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Crear Permiso'),'/administracion/crearPermiso'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Estados'),'/administracion/administrarEstados'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Tarea Programada'),'/administracion/administrarTareaProgramada'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Configurar Numeración'),'/administracion/administrarNumeracion'); ?></div>
</div>
<div id="tituloTabla" >
	<?php echo __("ADMINISTRACIÓN DE LOS NÚMEROS DE LOS INFORMES"); ?>
</div>
<?php echo form_tag('/administracion/administrarNumeracion'); ?>
<table class='centrarTablas'>
	<thead>			
		<tr>
			<td><?php echo __("Nombre Informe"); ?></td>
			<td><?php echo __("Valor"); ?></td>
			<td><?php echo __("Actualizar"); ?></td>
		</tr>
	</thead>			
	<tr>
		<td><?php echo __("Pedido"); ?></td>
		<td><?php echo input_tag('numero_albaran_pedido', $ar_num_albaran[0]->getNumeroAlbaran()); ?>		
		<td align='center'><?php echo submit_tag('Actualizar',array('confirm' => '¿Estás seguro?','class' => 'buttonEsqueleto2')); ?></td>				
	</tr>
	<tr>
		<td><?php echo __("Entrada"); ?></td>
		<td><?php echo input_tag('numero_albaran_entrada', $ar_num_albaran[1]->getNumeroAlbaran()); ?>		
		<td align='center'><?php echo submit_tag('Actualizar',array('confirm' => '¿Estás seguro?','class' => 'buttonEsqueleto2')); ?></td>				
	</tr>
	<tr>
		<td><?php echo __("Venta"); ?></td>
		<td><?php echo input_tag('numero_albaran_venta', $ar_num_albaran[2]->getNumeroAlbaran()); ?>		
		<td align='center'><?php echo submit_tag('Actualizar',array('confirm' => '¿Estás seguro?','class' => 'buttonEsqueleto2')); ?></td>				
	</tr><tr>
		<td><?php echo __("Salida"); ?></td>
		<td><?php echo input_tag('numero_albaran_salida', $ar_num_albaran[3]->getNumeroAlbaran()); ?>		
		<td align='center'><?php echo submit_tag('Actualizar',array('confirm' => '¿Estás seguro?','class' => 'buttonEsqueleto2')); ?></td>				
	</tr>							
</table>
</form>