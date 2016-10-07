<div id="subnavegacion">
	<div class='botonSubNav'><?php echo link_to(__('Usuarios'),'/administracion/index'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Crear Usuario'),'/administracion/crearUsuario'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Grupos'),'/administracion/administrarGrupos'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Crear Grupo'),'/administracion/crearGrupo'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Permisos'),'/administracion/administrarPermisos'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Crear Permiso'),'/administracion/crearPermiso'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Estados'),'/administracion/administrarEstados'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Tarea Programada'),'/administracion/administrarTareaProgramada'); ?></div>
</div>
<div id="tituloTabla" >
	<?php echo __("AGREGANDO GRUPO"); ?>
</div>
<?php if (!isset($msg)): ?>
	<?php echo form_tag('/administracion/crearGrupo'); ?>
		<table class='centrarTablas'>
			<thead>
				<tr><td align='center' colspan='2'><?php echo __("Agregar Grupo"); ?></td></tr>
			</thead>
			<tr>
				<td align='center'><?php echo __("<strong>Nombre: </strong>"); ?></td>
				<td>
					<?php echo form_error('nombre'); ?>
					<?php echo input_tag('nombre'); ?>
				</td>
			</tr>
			<tr>
				<td align='center'><?php echo __("<strong>Descripción: </strong>"); ?></td>
				<td>
					<?php echo form_error('descripcion'); ?>
					<?php echo textarea_tag('descripcion'); ?>
				</td>
			</tr>
			<tr>
				<td><?php echo __("<strong>Permisos: </strong>"); ?></td>
				<td>
				    <?php echo form_error('permiso'); ?>
					<?php echo select_tag('permiso', options_for_select($ar_permisos,0)); ?>
				</td>
			</tr>
			<tr>
				<td align='center'><?php echo button_to('Cancelar','administracion/administrarGrupos',array('class' => 'buttonEsqueleto2')) ?></td>
				<td align='center'><?php echo submit_tag('Guardar',array('class' => 'buttonEsqueleto2')); ?></td>
			</tr>
		</table>
	</form>
<?php else: ?>
	<table class='centrarTablas'>
		<thead>
			<tr>
				<td colspan='2'><?php echo __("Agregar Grupo"); ?></td>
			</tr>
		</thead>
		<tr><td align='center' colspan='2'><?php echo $msg; ?></td></tr>
		<tr>
			<td><?php echo button_to('Agregar Otro','/administracion/crearGrupo',array('class' => 'buttonEsqueleto2')); ?></td>
			<td><?php echo button_to('Volver','administracion/administrarGrupos',array('class' => 'buttonEsqueleto2')); ?></td></tr>
	</table>
<?php endif; ?>