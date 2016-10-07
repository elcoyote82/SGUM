<div id="subnavegacion">
	<div class='botonSubNav'><?php echo link_to(__('Volver'),'/articulos/index'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Agregar Ubicación'),'/ubicaciones/agregarUbicacion'); ?></div>
</div>
<div id="tituloTabla" >
	<?php echo __("LISTADO DE UBICACIONES"); ?>
</div>

<div class='buscador'>
	<?php echo form_tag('/ubicaciones/index'); ?>
		<?php echo __("Nombre: "); ?>
		<?php echo input_tag('nombre', $nombre) ?> 
		<?php echo checkbox_tag('desde', 1, $desde); ?>
		<?php echo "desde el".input_date_tag('fecha_ini', $fecha_ini_inv, 'rich=true'); ?>
		<?php echo checkbox_tag('hasta', 1, $hasta); ?>
		<?php echo "hasta el ".input_date_tag('fecha_fin', $fecha_fin_inv, 'rich=true'); ?>
		<?php echo submit_tag(__('Buscar'),array('class'  => 'buttonEsqueleto')); ?>
		<?php echo button_to(__('Restablecer'),'ubicaciones/index',array('class'  => 'buttonEsqueleto')); ?>	   
</div>
<?php if($pager->getnbResults() == 0): ?>
	<table class="centrarTablas">
		<thead>
			<tr><td align="center"><?php echo __("Ubicaciones"); ?></td></tr>
		</thead>
		<tr><td align="center"><?php echo __("No se ha encontrado ninguna ubicación."); ?></td></tr>
	</table>
<?php else: ?>
<br/>
	<div align='center'>
		<!-- Parseo de variables -->
		<?php $nombre = $acc_url->parsearEnvio($nombre); ?>
		<?php $estado_ubicacion = $acc_url->parsearEnvio($estado_ubicacion); ?>
		<?php $desde = $acc_url->parsearEnvio($desde); ?>
		<?php $fecha_ini_inv = $acc_url->parsearEnvio($fecha_ini_inv); ?>
		<?php $hasta = $acc_url->parsearEnvio($hasta); ?>
		<?php $fecha_fin_inv = $acc_url->parsearEnvio($fecha_fin_inv); ?>
		<?php $sort = $acc_url->parsearEnvio($sort); ?>
		<?php $type = $acc_url->parsearEnvio($type); ?>
	      <ul class='paginator'>
	        <?php if ($pager->haveToPaginate()): ?>
	          <li class='previous'><?php echo link_to('&laquo;', 'ubicaciones/index?page='.$pager->getFirstPage().'&nombre='.$nombre.'&estado_ubicacion='.$estado_ubicacion.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort='.$sort.'&type='.$type) ?></li>
	          <li class='previous'><?php echo link_to('&lt;', 'ubicaciones/index?page='.$pager->getPreviousPage().'&nombre='.$nombre.'&estado_ubicacion='.$estado_ubicacion.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort='.$sort.'&type='.$type) ?></li>
	          <?php $links = $pager->getLinks(); 
	          foreach ($links as $page): ?>
	            <?php if($page == $pager->getPage()): ?>
	              <li class='current'><?php echo $page; ?></li>
	            <?php else: ?>
	              <li class='page'><?php echo link_to($page, '/ubicaciones/index?page='.$page.'&nombre='.$nombre.'&estado_ubicacion='.$estado_ubicacion.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort='.$sort.'&type='.$type) ?></li>
	            <?php endif; ?>
	            <?php if ($page != $pager->getCurrentMaxLink()): ?><li class='empty'>   <li><?php endif ?>
	          <?php endforeach ?>
	          <li class='next'><?php echo link_to('&gt;', 'ubicaciones/index?page='.$pager->getNextPage().'&nombre='.$nombre.'&estado_ubicacion='.$estado_ubicacion.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort='.$sort.'&type='.$type) ?></li>
	          <li class='next'><?php echo link_to('&raquo;', 'ubicaciones/index?page='.$pager->getLastPage().'&nombre='.$nombre.'&estado_ubicacion='.$estado_ubicacion.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort='.$sort.'&type='.$type) ?></li>
	        <?php endif ?>
	      </ul>
	</div>
	<table class='centrarTablas'>
		<thead>
			<tr>
				<td><?php echo __("Ver Artículos"); ?></td>
				<?php if($type == 'asc' && $sort == 'nombre_ubicacion'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('Nombre'), 'ubicaciones/index?page='.$pager->getPage().'&nombre='.$nombre.'&estado_ubicacion='.$estado_ubicacion.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=nombre_ubicacion&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'nombre_ubicacion'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('Nombre'), 'ubicaciones/index?page='.$pager->getPage().'&nombre='.$nombre.'&estado_ubicacion='.$estado_ubicacion.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=nombre_ubicacion&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('Nombre'), 'ubicaciones/index?page='.$pager->getPage().'&nombre='.$nombre.'&estado_ubicacion='.$estado_ubicacion.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=nombre_ubicacion&type=asc'); ?></td>
				<?php endif; ?>				
				<?php if($type == 'asc' && $sort == 'estado_ubicacion'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('Estado'), 'ubicaciones/index?page='.$pager->getPage().'&nombre='.$nombre.'&estado_ubicacion='.$estado_ubicacion.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=estado_ubicacion&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'estado_ubicacion'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('Estado'), 'ubicaciones/index?page='.$pager->getPage().'&nombre='.$nombre.'&estado_ubicacion='.$estado_ubicacion.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=estado_ubicacion&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('Estado'), 'ubicaciones/index?page='.$pager->getPage().'&nombre='.$nombre.'&estado_ubicacion='.$estado_ubicacion.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=estado_ubicacion&type=asc'); ?></td>
				<?php endif; ?>
				<td><?php echo __("Editar"); ?></td>
				<td><?php echo __("Borrar"); ?></td>
			</tr>
		</thead>
		<tr>
		<?php foreach($pager->getResults() as $ubicacion): ?>			
			<td><?php echo link_to(image_tag('../images/ubicacion.png'),'ubicaciones/verUbicacion?id_md5_ubicacion='.$ubicacion->getIdMd5Ubicacion()); ?></td>
			<td><?php echo $ubicacion->getNombre(); ?></td>
			<?php $obj_estado_ubicacion = $acc_administracion->obtenerObjEstadoUbicacion($ubicacion->getIdEstadoUbicacion()); ?>
			<td>
				<?php if($obj_estado_ubicacion->getEstadoUbicacion() == 0): ?>
					<?php echo "Libre"; ?>
				<?php elseif($obj_estado_ubicacion->getEstadoUbicacion() == 100): ?>
					<?php echo "Completo"; ?>
				<?php else: ?>
					<?php echo $obj_estado_ubicacion->getEstadoUbicacion()." %"; ?>
				<?php endif; ?>
			</td>
			<td><?php echo link_to(image_tag('../images/edit.png'),'/ubicaciones/editarUbicacion?id_md5_ubicacion='.$ubicacion->getIdMd5Ubicacion()); ?></td>
			<?php if($id_grupo == 1):?>
				<td><?php echo link_to(image_tag('../images/borrar.png'),'/ubicaciones/borrarUbicacion?id_md5_ubicacion='.$ubicacion->getIdMd5Ubicacion(),array('confirm' => '¿Est&aacute;s seguro?')); ?></td>
			<?php endif; ?>			
			</tr>		
 	 	<?php endforeach; ?>
 	 </table>
<?php endif; ?>