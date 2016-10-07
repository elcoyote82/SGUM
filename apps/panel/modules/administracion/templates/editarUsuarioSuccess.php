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
  <?php echo __("EDITANDO USUARIO"); ?>
</div>
<?php if(!isset($msg)): ?>
    <?php echo form_tag('/administracion/editarUsuario'); ?>
    <?php echo input_hidden_tag('id_md5_usuario',$id_md5_usuario); ?>
    <table class='centrarTablas'>
        <thead>
          <tr>
            <td colspan='2'><?php echo __("Editar Usuario"); ?></td>
          </tr>
        </thead>
        <tr>
			<td><?php echo __("<strong>Nombre de usuario:</strong>"); ?></td>
			<td>
				<?php echo $usuario->getUsername(); ?>
			</td>
		</tr>
        <tr>
			<td><?php echo __("<strong>Nombre:</strong>"); ?></td>
			<td>
				<?php echo form_error('nombre'); ?>
				<?php echo input_tag('nombre',$profile->getNombre(),'size=50x10'); ?>
			</td>
		</tr>
        <tr>
			<td><?php echo __("<strong>Apellidos:</strong>"); ?></td>
			<td>
				<?php echo form_error('apellidos'); ?>
				<?php echo input_tag('apellidos',$profile->getApellidos(),'size=50x10'); ?>
			</td>
		</tr>
        <tr>
			<td><?php echo __("<strong>Teléfono:</strong>"); ?></td>
			<td>
				<?php echo form_error('telefono'); ?>
				<?php echo input_tag('telefono',$profile->getTelefono(),'size=50x10'); ?>
			</td>
		</tr>
        <tr>
			<td><?php echo __("<strong>Email:</strong>"); ?></td>
			<td>
				<?php echo form_error('email'); ?>
				<?php echo input_tag('email',$profile->getEmail(),'size=50x10'); ?>
			</td>
		</tr>		
		<tr>
			<td>
				<?php echo button_to(__('Cancelar'),'administracion/index',array('class'  => 'buttonEsqueleto2')) ?>
			</td>
			<td>
				<?php echo submit_tag(__('Actualizar'),array('class'  => 'buttonEsqueleto2')); ?>
			</td>
		</tr>
	  </table>
	</form>
<?php else: ?>
	<table class='centrarTablas'>
		<thead>
			<tr>
				<td colspan='2'><?php echo __("Editar Usuario"); ?></td>
			</tr>
		</thead>
		<tr><td align='center'><?php echo $msg; ?></td></tr>
		<tr><td align='center' colspan='2'><?php echo button_to('Volver','administracion/index',array('class' => 'buttonEsqueleto2')); ?></td></tr>
	</table>
<?php endif; ?>