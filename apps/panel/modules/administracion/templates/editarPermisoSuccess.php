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
	<?php echo __("EDITANDO PERMISO"); ?>
</div>
<?php if (!isset($msg)): ?>
	<?php echo form_tag('/administracion/editarPermiso'); ?>
	<?php echo input_hidden_tag('id_md5_permiso',$id_md5_permiso); ?>
		<table class='centrarTablas'>
			<thead>
				<tr><td align='center' colspan='2'><?php echo __("Editar Permiso"); ?></td></tr>
			</thead>
			<tr>
				<td align='center'><?php echo __("<strong>Nombre: </strong>"); ?></td>
				<td>
					<?php echo form_error('nombre'); ?>
					<?php echo input_tag('nombre',$permiso->getName()); ?>
				</td>
			</tr>
			<tr>
				<td align='center'><?php echo __("<strong>Descripción: </strong>"); ?></td>
				<td>
					<?php echo form_error('descripcion'); ?>
					<?php echo textarea_tag('descripcion',$permiso->getDescription()); ?>
				</td>
			</tr>
			<tr>
				<td align='center'><?php echo button_to('Cancelar','administracion/administrarPermisos',array('class' => 'buttonEsqueleto2')) ?></td>
				<td align='center'><?php echo submit_tag('Actualizar',array('class' => 'buttonEsqueleto2')); ?></td>
			</tr>
		</table>
	</form>
<?php else: ?>
	<table class='centrarTablas'>
		<thead>
			<tr>
				<td colspan='2'><?php echo __("Editar Permiso"); ?></td>
			</tr>
		</thead>
		<tr><td align='center' colspan='2'><?php echo $msg; ?></td></tr>
		<tr>
			<td align='center'><?php echo button_to('Volver','administracion/administrarPermisos',array('class' => 'buttonEsqueleto2')); ?></td>
		</tr>
	</table>
<?php endif; ?>