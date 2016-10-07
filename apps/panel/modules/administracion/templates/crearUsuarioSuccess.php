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
  <?php echo __("AGREGANDO USUARIO"); ?>
</div>
<?php if(!isset($msg)): ?>
	<?php echo form_tag('/administracion/crearUsuario'); ?>    
	<table class='centrarTablas'>
        <thead>
          <tr>
            <td colspan='2'><?php echo __("Agregar Usuario"); ?></td>
          </tr>
        </thead>
        <tr>
			<td><?php echo __("<strong>Nombre de usuario:</strong>"); ?></td>
			<td>
				<?php echo form_error('username'); ?>
				<?php echo input_tag('username','','size=50x10'); ?>
			</td>
		</tr>
		<tr>
			<td><?php echo __("<strong>Grupo:</strong>"); ?></td>
			<td>
			    <?php echo form_error('grupo'); ?>
				<?php echo select_tag('grupo', options_for_select($ar_grupos,0)); ?>
			</td>
		</tr>		
		<tr>
			<td><?php echo __("<strong>Permiso:</strong>"); ?></td>
			<td>
			    <?php echo form_error('permiso'); ?>
				<?php echo select_tag('permiso', options_for_select($ar_permisos,0)); ?>
			</td>
		</tr>
		<tr>
			<td><?php echo __("<strong>Password:</strong>"); ?></td>
			<td>
				<?php echo form_error('password'); ?>
				<?php echo input_password_tag('password','','size=50x10'); ?>
			</td>
		</tr>
		<tr>
			<td><?php echo __("<strong>Repetir Password:</strong>"); ?></td>
			<td>
				<?php echo form_error('password2'); ?>
				<?php echo input_password_tag('password2','','size=50x10'); ?>
			</td>
		</tr>
        <tr>
			<td><?php echo __("<strong>Nombre:</strong>"); ?></td>
			<td>
				<?php echo form_error('nombre'); ?>
				<?php echo input_tag('nombre','','size=50x10'); ?>
			</td>
		</tr>
        <tr>
			<td><?php echo __("<strong>Apellidos:</strong>"); ?></td>
			<td>
				<?php echo form_error('apellidos'); ?>
				<?php echo input_tag('apellidos','','size=50x10'); ?>
			</td>
		</tr>
        <tr>
			<td><?php echo __("<strong>Teléfono:</strong>"); ?></td>
			<td>
				<?php echo form_error('telefono'); ?>
				<?php echo input_tag('telefono','','size=50x10'); ?>
			</td>
		</tr>
        <tr>
			<td><?php echo __("<strong>Email:</strong>"); ?></td>
			<td>
				<?php echo form_error('email'); ?>
				<?php echo input_tag('email','','size=50x10'); ?>
			</td>
		</tr>		
		<tr>
			<td>
				<?php echo button_to(__('Cancelar'),'administracion/index',array('class'  => 'buttonEsqueleto2')) ?>
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
				<td colspan='2'><?php echo __("Agregar Usuario"); ?></td>
			</tr>
		</thead>
		<tr><td align='center' colspan='2'><?php echo $msg; ?></td></tr>
		<tr>
			<td><?php echo button_to('Agregar Otro','/administracion/crearUsuario',array('class' => 'buttonEsqueleto2')); ?></td>
			<td><?php echo button_to('Volver','administracion/index',array('class' => 'buttonEsqueleto2')); ?></td></tr>
	</table>
<?php endif; ?>