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
	<?php echo __("ADMINISTRACIÓN DE PERMISOS"); ?>
</div>
<div class='buscador'>
	<?php echo form_tag('/administracion/administrarPermisos'); ?>
		<?php echo __("Permiso: ").select_tag('permiso',options_for_select($ar_permisos,$permiso)); ?>
		<?php echo submit_tag(__('Buscar'),array('class'  => 'buttonEsqueleto')); ?>
		<?php echo button_to(__('Restablecer'),'administracion/administrarPermisos',array('class'  => 'buttonEsqueleto')); ?>	   
</div>
<?php if($pager_permisos->getnbResults() == 0): ?>
	<table class="centrarTablas">
		<thead>
			<tr><td align="center"><?php echo __("Permisos"); ?></td></tr>
		</thead>
		<tr><td align="center"><?php echo __("No se ha encontrado ningún permiso."); ?></td></tr>
	</table>
<?php else: ?>
	<br/>
	<div align='center'>
	   <ul class='paginator'>
	     <?php if ($pager_permisos->haveToPaginate()): ?>
	       <li class='previous'><?php echo link_to('&laquo;', 'administracion/administrarPermisos?page_permiso='.$pager_permisos->getFirstPage()); ?></li>
	       <li class='previous'><?php echo link_to('&lt;', 'administracion/administrarPermisos?page_permiso='.$pager_permisos->getPreviousPage()); ?></li>
	       <?php $links = $pager_permisos->getLinks(); 
	       foreach ($links as $page_permiso): ?>
	         <?php if($page_permiso == $pager_permisos->getPage()): ?>
	           <li class='current'><?php echo $page_permiso; ?></li>
	         <?php else: ?>
	           <li class='page'><?php echo link_to($page_permiso, 'administracion/administrarPermisos?page_permiso='.$page_permiso); ?></li>
	         <?php endif; ?>
	         <?php if ($page_permiso != $pager_permisos->getCurrentMaxLink()): ?><li class='empty'>   <li><?php endif ?>
	       <?php endforeach ?>
	       <li class='next'><?php echo link_to('&gt;', 'administracion/administrarPermisos?page_permiso='.$pager_permisos->getNextPage()); ?></li>
	       <li class='next'><?php echo link_to('&raquo;', 'administracion/administrarPermisos?page_permiso='.$pager_permisos->getLastPage()); ?></li>
	     <?php endif ?>
	   </ul>
	</div>	
	<table  class='centrarTablas'>
		<thead>			
			<tr>
				<td><?php echo __("Nombre"); ?></td>
				<td><?php echo __("Descripción"); ?></td>
				<td><?php echo __("Usuarios"); ?></td>
				<td><?php echo __("Grupos"); ?></td>
				<td><?php echo __("Editar"); ?></td>
				<td><?php echo __("Borrar"); ?></td>
			</tr>
		</thead>			
		<?php foreach($pager_permisos->getResults() as $permiso): ?>
			<tr>
				<td><?php echo $permiso->getName(); ?></td>	
				<td><?php echo $permiso->getDescription(); ?></td>
				<td><?php echo button_to('Usuarios','administracion/verUsuariosPermiso?id_md5_permiso='.$permiso->getIdMd5(),array('class' => 'buttonEsqueleto2')); ?></td>
				<td><?php echo button_to('Grupos','administracion/verGruposPermiso?id_md5_permiso='.$permiso->getIdMd5(),array('class' => 'buttonEsqueleto2')); ?></td>
				<?php if ($permiso->getId() == 1): ?>
					<td></td>
					<td></td>
				<?php else: ?>
					<td><?php echo link_to(image_tag('../images/edit.png'),'administracion/editarPermiso?id_md5_permiso='.$permiso->getIdMd5()); ?></td>
					<td><?php echo link_to(image_tag('../images/borrar.png'),'administracion/borrarPermiso?id_md5_permiso='.$permiso->getIdMd5(),array('confirm' => '¿Estás seguro?')); ?></td>
				<?php endif; ?>
			</tr>					
		<?php endforeach; ?>				
	</table>
<?php endif; ?>