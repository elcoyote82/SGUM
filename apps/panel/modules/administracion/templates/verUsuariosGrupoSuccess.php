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
	<?php echo __("LISTADO DE USUARIOS DEL GRUPO '".$nombreGrupo."'"); ?>
</div>
<?php if($pager->getnbResults() == 0): ?>
	<table class='centrarTablas'>
	  <tr>
	    <td>
	      <?php echo __("No se encontró ningún usuario del grupo ".$nombreGrupo."."); ?>
	    </td>
	  </tr>
	  <tr>
	    <td align='center'><?php echo button_to('Volver','administracion/administrarGrupos',array('class' => 'buttonEsqueleto2')); ?></td>
	  </tr>
	</table>
<?php else: ?>
	<div align='center'>
	      <ul class='paginator'>
	        <?php if ($pager->haveToPaginate()): ?>
	          <li class='previous'><?php echo link_to('&laquo;', 'administracion/verUsuariosGrupo?page='.$pager->getFirstPage()) ?></li>
	          <li class='previous'><?php echo link_to('&lt;', 'administracion/verUsuariosGrupo?page='.$pager->getPreviousPage()) ?></li>
	          <?php $links = $pager->getLinks(); 
	          foreach ($links as $page): ?>
	            <?php if($page == $pager->getPage()): ?>
	              <li class='current'><?php echo $page; ?></li>
	            <?php else: ?>
	              <li class='page'><?php echo link_to($page, '/administracion/verUsuariosGrupo?page='.$page) ?></li>
	            <?php endif; ?>
	            <?php if ($page != $pager->getCurrentMaxLink()): ?><li class='empty'>   <li><?php endif ?>
	          <?php endforeach ?>
	          <li class='next'><?php echo link_to('&gt;', 'administracion/verUsuariosGrupo?page='.$pager->getNextPage()) ?></li>
	          <li class='next'><?php echo link_to('&raquo;', 'administracion/verUsuariosGrupo?page='.$pager->getLastPage()) ?>
	        <?php endif ?>
	      </ul>
	</div>
	<table class='centrarTablas'>
		<thead>
			<tr>
				<td><?php echo __("Nombre de Usuario"); ?></td>
				<td><?php echo __("Cambiar Password"); ?></td>
				<td><?php echo __("Nombre"); ?></td>
				<td><?php echo __("Apellidos"); ?></td>
				<td><?php echo __("Teléfono"); ?></td>
				<td><?php echo __("Email"); ?></td>
				<td><?php echo __("Grupo"); ?></td>
				<td><?php echo __("Permisos"); ?></td>
				<td><?php echo __("Cambiar Grupo"); ?></td>
				<td><?php echo __("Borrar"); ?></td>
			</tr>
		</thead>
		<tr>
		<?php foreach($pager->getResults() as $usuario): ?>  						
			<?php $id_grupo = $acc_admin->obtenerIdGrupoXIdUsuario($usuario->getId()); ?>
			<?php $nombre_grupo = $acc_admin->obtenerNombreGrupo($id_grupo); ?>
			<?php $id_permiso = $acc_admin->obtenerIdPermisoXIdUsuario($usuario->getId()); ?>
			<?php $nombre_permiso = $acc_admin->obtenerNombrePermiso($id_permiso); ?>				
			<td><?php echo link_to($usuario->getUsername(),'administracion/editarUsuario?id_md5_usuario='.$usuario->getIdMd5()); ?></td>
			<td><?php echo button_to(__(' Cambiar Password '),'administracion/cambiarPassword?id_md5_usuario='.$usuario->getIdMd5(),array('class'=>'buttonEsqueleto2')); ?></td>
			<td><?php echo $usuario->getProfile()->getNombre(); ?></td>
			<td><?php echo $usuario->getProfile()->getApellidos(); ?></td>
			<td><?php echo $usuario->getProfile()->getTelefono(); ?></td>
			<td><?php echo $usuario->getProfile()->getEmail(); ?></td>
			<td><?php echo $nombre_grupo; ?></td>
			<td><?php echo $nombre_permiso; ?></td>			
			<?php if($id_grupo == 1 && $usuario->getId() == 1): ?>
				<td></td>
				<td></td>
			<?php else: ?>
				<td><?php echo button_to(__(' Cambiar Grupo'),'administracion/cambiarGrupo?id_md5_usuario='.$usuario->getIdMd5(),array('class'=>'buttonEsqueleto2')); ?></td>
				<td><?php echo link_to(image_tag('../images/borrar.png'),'/administracion/borrarUsuario?id_md5_usuario='.$usuario->getIdMd5(),array('confirm' => '¿Est&aacute;s seguro?')); ?></td>
			<?php endif; ?>
			</tr>		
 	 	<?php endforeach; ?>
 	 </table>
<?php endif; ?> 