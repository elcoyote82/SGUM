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
	<?php echo __("ADMINISTRACIÓN DE GRUPOS"); ?>
</div>
<div class='buscador'>
	<?php echo form_tag('/administracion/administrarGrupos'); ?>
		<?php echo __("Grupo: ").select_tag('grupo',options_for_select($ar_grupos,$grupo)); ?>
		<?php echo submit_tag(__('Buscar'),array('class'  => 'buttonEsqueleto')); ?>
		<?php echo button_to(__('Restablecer'),'administracion/administrarGrupos',array('class'  => 'buttonEsqueleto')); ?>	   
</div>
<?php if($pager_grupos->getnbResults() == 0): ?>
	<table class="centrarTablas">
		<thead>
			<tr><td align="center"><?php echo __("Grupos"); ?></td></tr>
		</thead>
		<tr><td align="center"><?php echo __("No se ha encontrado ningún grupo."); ?></td></tr>
	</table>
<?php else: ?>
	<br/>
	<div align='center'>
	   <ul class='paginator'>
	     <?php if ($pager_grupos->haveToPaginate()): ?>
	       <li class='previous'><?php echo link_to('&laquo;', 'administracion/administrarGrupos?page_grupo='.$pager_grupos->getFirstPage()); ?></li>
	       <li class='previous'><?php echo link_to('&lt;', 'administracion/administrarGrupos?page_grupo='.$pager_grupos->getPreviousPage()); ?></li>
	       <?php $links = $pager_grupos->getLinks(); 
	       foreach ($links as $page_grupo): ?>
	         <?php if($page_grupo == $pager_grupos->getPage()): ?>
	           <li class='current'><?php echo $page_grupo; ?></li>
	         <?php else: ?>
	           <li class='page'><?php echo link_to($page_grupo, 'administracion/administrarGrupos?page_grupo='.$page_grupo); ?></li>
	         <?php endif; ?>
	         <?php if ($page_grupo != $pager_grupos->getCurrentMaxLink()): ?><li class='empty'>   <li><?php endif ?>
	       <?php endforeach ?>
	       <li class='next'><?php echo link_to('&gt;', 'administracion/administrarGrupos?page_grupo='.$pager_grupos->getNextPage()); ?></li>
	       <li class='next'><?php echo link_to('&raquo;', 'administracion/administrarGrupos?page_grupo='.$pager_grupos->getLastPage()); ?></li>
	     <?php endif ?>
	   </ul>
	</div>	
	<table  class='centrarTablas'>
		<thead>			
			<tr>
				<td><?php echo __("Nombre"); ?></td>
				<td><?php echo __("Descripción"); ?></td>
				<td><?php echo __("Permisos"); ?></td>
				<td><?php echo __("Usuarios"); ?></td>
				<td><?php echo __("Editar"); ?></td>
				<td><?php echo __("Borrar"); ?></td>
			</tr>
		</thead>			
		<?php foreach($pager_grupos->getResults() as $grupo): ?>
			<?php $group_permission = $acc_admin->obtenerObjGroupPermissionXIdGrupo($grupo->getId()); ?>
			<?php $nombre_permiso = $acc_admin->obtenerNombrePermiso($group_permission->getPermissionId()); ?>
			<tr>
				<td><?php echo $grupo->getName(); ?></td>
				<td><?php echo $grupo->getDescription(); ?></td>
				<td><?php echo $nombre_permiso; ?></td>
				<td><?php echo button_to('Usuarios','administracion/verUsuariosGrupo?id_md5_grupo='.$grupo->getIdMd5(),array('class' => 'buttonEsqueleto2')); ?></td>
				<?php if ($grupo->getId() == 1): ?>
					<td></td>
					<td></td>
				<?php else: ?>
					<td><?php echo link_to(image_tag('../images/edit.png'),'administracion/editarGrupo?id_md5_grupo='.$grupo->getIdMd5()); ?></td>
					<td><?php echo link_to(image_tag('../images/borrar.png'),'administracion/borrarGrupo?id_md5_grupo='.$grupo->getIdMd5(),array('confirm' => '¿Estás seguro?')); ?></td>
				<?php endif; ?>
			</tr>					
		<?php endforeach; ?>				
	</table>
<?php endif; ?>