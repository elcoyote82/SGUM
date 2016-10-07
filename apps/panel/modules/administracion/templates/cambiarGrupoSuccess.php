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
	<?php echo __("CAMBIANDO GRUPO"); ?>
</div>
<?php if (!isset($msg)): ?>
	<?php echo form_tag('/administracion/cambiarGrupo'); ?>
	<?php echo input_hidden_tag('id_md5_usuario',$id_md5_usuario); ?>
	<table class='centrarTablas'>
		<thead>
			<tr><td align='center' colspan='2'><?php echo __("Cambiar Grupo"); ?></td></tr>
		</thead>
		<tr>
			<td align='center'><?php echo __("<strong>Usuario: </strong>"); ?></td>
			<td align='center'><?php echo $usuario->getUsername()?></td>	
		</tr>
		<tr>
			<td><?php echo __("<strong>Grupo:</strong>"); ?></td>
			<td>
			    <?php echo form_error('grupo'); ?>
				<?php echo select_tag('grupo', options_for_select($ar_grupos,$id_grupo)); ?>
			</td>
		</tr>
		<tr>
			<td align='center'><?php echo button_to('Cancelar','administracion/index',array('class' => 'buttonEsqueleto2')) ?></td>
			<td align='center'><?php echo submit_tag('Guardar',array('class' => 'buttonEsqueleto2')); ?></td>
		</tr>
	</table>
	</form>
<?php else: ?>
	<table class='centrarTablas'>
		<thead>
			<tr>
				<td colspan='2'><?php echo __("Cambiar Grupo"); ?></td>
			</tr>
		</thead>
		<tr><td align='center'><?php echo $msg; ?></td></tr>
		<tr><td align='center' colspan='2'><?php echo button_to('Volver','administracion/index',array('class' => 'buttonEsqueleto2')); ?></td></tr>
	</table>
<?php endif; ?>