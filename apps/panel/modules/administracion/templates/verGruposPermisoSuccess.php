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
	<?php echo __("LISTADO DE GRUPOS DEL PERMISO '".$nombrePermiso."'"); ?>
</div>
<?php if($pager->getnbResults() == 0): ?>
	<table class='centrarTablas'>
	  <tr>
	    <td>
	      <?php echo __("No se encontró ningún grupo del permiso ".$nombrePermiso."."); ?>
	    </td>
	  </tr>
	  <tr>
	    <td align='center'><?php echo button_to('Volver','administracion/administrarPermisos',array('class' => 'buttonEsqueleto2')); ?></td>
	  </tr>
	</table>
<?php else: ?>
	<div align='center'>
	      <ul class='paginator'>
	        <?php if ($pager->haveToPaginate()): ?>
	          <li class='previous'><?php echo link_to('&laquo;', 'administracion/verGruposPermiso?page='.$pager->getFirstPage()) ?></li>
	          <li class='previous'><?php echo link_to('&lt;', 'administracion/verGruposPermiso?page='.$pager->getPreviousPage()) ?></li>
	          <?php $links = $pager->getLinks(); 
	          foreach ($links as $page): ?>
	            <?php if($page == $pager->getPage()): ?>
	              <li class='current'><?php echo $page; ?></li>
	            <?php else: ?>
	              <li class='page'><?php echo link_to($page, '/administracion/verGruposPermiso?page='.$page) ?></li>
	            <?php endif; ?>
	            <?php if ($page != $pager->getCurrentMaxLink()): ?><li class='empty'>   <li><?php endif ?>
	          <?php endforeach ?>
	          <li class='next'><?php echo link_to('&gt;', 'administracion/verGruposPermiso?page='.$pager->getNextPage()) ?></li>
	          <li class='next'><?php echo link_to('&raquo;', 'administracion/verGruposPermiso?page='.$pager->getLastPage()) ?>
	        <?php endif ?>
	      </ul>
	</div>
	<table  class='centrarTablas'>
		<thead>			
			<tr>
				<td><?php echo __("Nombre"); ?></td>
				<td><?php echo __("Editar"); ?></td>
				<td><?php echo __("Descripción"); ?></td>
				<td><?php echo __("Permisos"); ?></td>
				<td><?php echo __("Usuarios"); ?></td>
				<td><?php echo __("Borrar"); ?></td>
			</tr>
		</thead>			
		<?php foreach($pager->getResults() as $grupo): ?>
			<?php $group_permission = $acc_admin->obtenerObjGroupPermissionXIdGrupo($grupo->getId()); ?>
			<?php $nombre_permiso = $acc_admin->obtenerNombrePermiso($group_permission->getPermissionId()); ?>
			<tr>
				<td><?php echo $grupo->getName(); ?></td>			
				<?php if ($grupo->getId() != 1): ?>
					<td><?php echo button_to('Editar','administracion/editarGrupo?id_md5_grupo='.$grupo->getIdMd5(),array('class' => 'buttonEsqueleto2')); ?></td>
				<?php else: ?>
					<td></td>
				<?php endif; ?>
				<td><?php echo $grupo->getDescription(); ?></td>
				<td><?php echo $nombre_permiso; ?></td>
				<td><?php echo button_to('Usuarios','administracion/verUsuariosGrupo?id_md5_grupo='.$grupo->getIdMd5(),array('class' => 'buttonEsqueleto2')); ?></td>
				<?php if ($grupo->getId() != 1): ?>
					<td><?php echo button_to('Borrar','administracion/borrarGrupo?id_md5_grupo='.$grupo->getIdMd5(),array('class' => 'buttonEsqueleto2','confirm' => '¿Estás seguro?')); ?></td>
				<?php else: ?>
					<td></td>
				<?php endif; ?>
			</tr>					
		<?php endforeach; ?>				
	</table>
<?php endif; ?>