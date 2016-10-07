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
	<?php echo __("ADMINISTRACIÓN DE USUARIOS"); ?>
</div>
<div class='buscador_ancho'>
	<?php echo form_tag('/administracion/index'); ?>
		<?php echo __("Usuario: "); ?>
		<?php echo input_auto_complete_tag('login', $login,
					'administracion/buscarLogin',
					array('autocomplete' => 'on'),
					array('use_style'    => true)
				) ?> 
		<?php echo __("Grupo: ").select_tag('grupo',options_for_select($ar_grupos,$grupo)); ?>
		<?php echo __("Permiso: ").select_tag('permiso',options_for_select($ar_permisos,$permiso)); ?>
		<br /><br />
		<?php echo checkbox_tag('desde', 1, $desde); ?>
		<?php echo "desde el".input_date_tag('fecha_ini', $fecha_ini_inv, 'rich=true'); ?>
		<?php echo checkbox_tag('hasta', 1, $hasta); ?>
		<?php echo "hasta el ".input_date_tag('fecha_fin', $fecha_fin_inv, 'rich=true'); ?>
		<?php echo submit_tag(__('Buscar'),array('class'  => 'buttonEsqueleto')); ?>
		<?php echo button_to(__('Restablecer'),'administracion/index',array('class'  => 'buttonEsqueleto')); ?>	   
</div>
<?php if($pager->getnbResults() == 0): ?>
	<table class="centrarTablas">
		<thead>
			<tr><td align="center"><?php echo __("Usuarios"); ?></td></tr>
		</thead>
		<tr><td align="center"><?php echo __("No se ha encontrado ningún usuario."); ?></td></tr>
	</table>
<?php else: ?>
<br/>
	<div align='center'>
		<!-- Parseo de variables -->
		<?php $login = $acc_url->parsearEnvio($login); ?>
		<?php $grupo = $acc_url->parsearEnvio($grupo); ?>
		<?php $permiso = $acc_url->parsearEnvio($permiso); ?>
		<?php $desde = $acc_url->parsearEnvio($desde); ?>
		<?php $fecha_ini_inv = $acc_url->parsearEnvio($fecha_ini_inv); ?>
		<?php $hasta = $acc_url->parsearEnvio($hasta); ?>
		<?php $fecha_fin_inv = $acc_url->parsearEnvio($fecha_fin_inv); ?>
	      <ul class='paginator'>
	        <?php if ($pager->haveToPaginate()): ?>
	          <li class='previous'><?php echo link_to('&laquo;', 'administracion/index?page='.$pager->getFirstPage().'&login='.$login.'&grupo='.$grupo.'&permiso='.$permiso.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv) ?></li>
	          <li class='previous'><?php echo link_to('&lt;', 'administracion/index?page='.$pager->getPreviousPage().'&login='.$login.'&grupo='.$grupo.'&permiso='.$permiso.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv) ?></li>
	          <?php $links = $pager->getLinks(); 
	          foreach ($links as $page): ?>
	            <?php if($page == $pager->getPage()): ?>
	              <li class='current'><?php echo $page; ?></li>
	            <?php else: ?>
	              <li class='page'><?php echo link_to($page, '/administracion/index?page='.$page.'&login='.$login.'&grupo='.$grupo.'&permiso='.$permiso.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv) ?></li>
	            <?php endif; ?>
	            <?php if ($page != $pager->getCurrentMaxLink()): ?><li class='empty'>   <li><?php endif ?>
	          <?php endforeach ?>
	          <li class='next'><?php echo link_to('&gt;', 'administracion/index?page='.$pager->getNextPage().'&login='.$login.'&grupo='.$grupo.'&permiso='.$permiso.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv) ?></li>
	          <li class='next'><?php echo link_to('&raquo;', 'administracion/index?page='.$pager->getLastPage().'&login='.$login.'&grupo='.$grupo.'&permiso='.$permiso.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv) ?>
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
				<td><?php echo __("Editar"); ?></td>
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
			<?php if($id_grupo == 1 && $usuario->getId() == 1): ?>
				<td></td>
			<?php else: ?>
				<td><?php echo button_to(__(' Cambiar Password '),'administracion/cambiarPassword?id_md5_usuario='.$usuario->getIdMd5(),array('class'=>'buttonEsqueleto2')); ?></td>
			<?php endif; ?>
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
				<td><?php echo link_to(image_tag('../images/edit.png'),'administracion/editarUsuario?id_md5_usuario='.$usuario->getIdMd5()); ?></td>
				<td><?php echo link_to(image_tag('../images/borrar.png'),'/administracion/borrarUsuario?id_md5_usuario='.$usuario->getIdMd5(),array('confirm' => '¿Est&aacute;s seguro?')); ?></td>
			<?php endif; ?>
			</tr>		
 	 	<?php endforeach; ?>
 	 </table>
<?php endif; ?> 