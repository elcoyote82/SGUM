<?php
/*
 * Mostrar los datos de mi tarea
 * 
 * schtasks /QUERY /tn "Comprobar Stock Articulos" /fo LIST /v
 * 
 * 
 * Tarea a ejecutar
 * C:\xampp\php\php.exe -f C:\xampp\htdocs\sgum\batch\comprobarStockArticulos.php
 * 
 * 
 */
?>
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
	<?php echo __("ADMINISTRACIÓN DE TAREAS PROGRAMADAS"); ?>
</div>
<?php if (!isset($msg)): ?>
<?php echo form_tag('/administracion/administrarTareaProgramada'); ?>
	<table class='centrarTablas'>
		<thead>			
			<tr>
				<td><?php echo __("Nombre Tarea"); ?></td>
				<td><?php echo __("Repetición"); ?></td>
				<td><?php echo __("Actualizar Tiempo"); ?></td>
				<td><?php echo __("Actualizar Stock"); ?></td>
			</tr>
		</thead>			
		<tr>
			<td><?php echo __("Comprobar el stock de los artículos"); ?></td>
			<td><?php echo __("Repetir cada ").select_tag('repeticion', options_for_select($ar_tiempo_repeticion,$tiempo_repeticion)); ?>		
			<td align='center'><?php echo submit_tag('Actualizar',array('confirm' => '¿Estás seguro?','class' => 'buttonEsqueleto2')); ?></td>
			<td><?php echo button_to("Ahora", "administracion/administrarTareaProgramada?actualizar_ahora=true",array('class' => 'buttonEsqueleto2'));?></td>				
		</tr>							
	</table>
	</form>
<?php else: ?>
	<table class='centrarTablas'>
		<thead>
			<tr>
				<td><?php echo __("Tarea Programada"); ?></td>
			</tr>
		</thead>
		<tr><td align='center'><?php echo $msg; ?></td></tr>
		<tr>
			<td align='center'><?php echo button_to('Volver','administracion/administrarTareaProgramada',array('class' => 'buttonEsqueleto2')); ?></td>
		</tr>
	</table>
<?php endif; ?>