<div id="subnavegacion">
	<div class='botonSubNav'><?php echo link_to(__('Agregar Artículo'),'/articulos/agregarArticulo'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Familias'),'/familias/index'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Ubicaciones'),'/ubicaciones/index'); ?></div>
</div>
<div id="tituloTabla" >
	<?php echo __("LISTADO DE ARTÍCULOS"); ?>
</div>
<div class='buscador_ancho'>
	<?php echo form_tag('/articulos/index'); ?>
		<?php echo __("Nombre: "); ?>
		<?php echo input_auto_complete_tag('nombre', $nombre,'/articulos/buscarArticulo',
    		array('autocomplete' => 'on'),
    		array('use_style' => true)) ?>
		<?php echo __("Familia: "); ?>
		<?php echo select_tag('id_familia',options_for_select($ar_familias,$id_familia)); ?>
		<?php echo __("Ubicación: "); ?>
		<?php echo input_auto_complete_tag('nombre_ubicacion', $nombre_ubicacion,'/articulos/buscarUbicacionArticulo',
    		array('autocomplete' => 'on'),
    		array('use_style' => true)) ?>		
		<?php echo __("Proveedor: "); ?>
		<?php echo select_tag('id_proveedor',options_for_select($ar_proveedores,$id_proveedor)); ?>
		<br />
		<?php echo __("Descripción: "); ?>
		<?php echo textarea_tag('descripcion', $descripcion) ?>
		<?php echo checkbox_tag('desde', 1, $desde); ?>
		<?php echo "desde el".input_date_tag('fecha_ini', $fecha_ini_inv, 'rich=true'); ?>
		<?php echo checkbox_tag('hasta', 1, $hasta); ?>
		<?php echo "hasta el ".input_date_tag('fecha_fin', $fecha_fin_inv, 'rich=true'); ?>
		<?php echo submit_tag(__('Buscar'),array('class'  => 'buttonEsqueleto')); ?>
		<?php echo button_to(__('Restablecer'),'articulos/index',array('class'  => 'buttonEsqueleto')); ?>	   
</div>
<?php if($pager->getnbResults() == 0): ?>
	<table class="centrarTablas">
		<thead>
			<tr><td align="center"><?php echo __("Artículos"); ?></td></tr>
		</thead>
		<tr><td align="center"><?php echo __("No se ha encontrado ningún articulo."); ?></td></tr>
	</table>
<?php else: ?>
	<br/>
	<div align='center'>
		<!-- Parseo de variables -->
		<?php $nombre = $acc_url->parsearEnvio($nombre); ?>
		<?php $id_familia = $acc_url->parsearEnvio($id_familia); ?>
		<?php $nombre_ubicacion = $acc_url->parsearEnvio($nombre_ubicacion); ?>
		<?php $id_proveedor = $acc_url->parsearEnvio($id_proveedor); ?>
		<?php $desde = $acc_url->parsearEnvio($desde); ?>
		<?php $fecha_ini_inv = $acc_url->parsearEnvio($fecha_ini_inv); ?>
		<?php $hasta = $acc_url->parsearEnvio($hasta); ?>
		<?php $fecha_fin_inv = $acc_url->parsearEnvio($fecha_fin_inv); ?>
		<?php $sort = $acc_url->parsearEnvio($sort); ?>
		<?php $type = $acc_url->parsearEnvio($type); ?>
	      <ul class='paginator'>
	        <?php if ($pager->haveToPaginate()): ?>
	          <li class='previous'><?php echo link_to('&laquo;', 'articulos/index?page='.$pager->getFirstPage().'&nombre='.$nombre.'&id_familia='.$id_familia.'&nombre_ubicacion='.$nombre_ubicacion.'&id_proveedor='.$id_proveedor.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort='.$sort.'&type='.$type) ?></li>
	          <li class='previous'><?php echo link_to('&lt;', 'articulos/index?page='.$pager->getPreviousPage().'&nombre='.$nombre.'&id_familia='.$id_familia.'&nombre_ubicacion='.$nombre_ubicacion.'&id_proveedor='.$id_proveedor.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort='.$sort.'&type='.$type) ?></li>
	          <?php $links = $pager->getLinks(); 
	          foreach ($links as $page): ?>
	            <?php if($page == $pager->getPage()): ?>
	              <li class='current'><?php echo $page; ?></li>
	            <?php else: ?>
	              <li class='page'><?php echo link_to($page, '/articulos/index?page='.$page.'&nombre='.$nombre.'&id_familia='.$id_familia.'&nombre_ubicacion='.$nombre_ubicacion.'&id_proveedor='.$id_proveedor.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort='.$sort.'&type='.$type) ?></li>
	            <?php endif; ?>
	            <?php if ($page != $pager->getCurrentMaxLink()): ?><li class='empty'>   <li><?php endif ?>
	          <?php endforeach ?>
	          <li class='next'><?php echo link_to('&gt;', 'articulos/index?page='.$pager->getNextPage().'&nombre='.$nombre.'&id_familia='.$id_familia.'&nombre_ubicacion='.$nombre_ubicacion.'&id_proveedor='.$id_proveedor.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort='.$sort.'&type='.$type) ?></li>
	          <li class='next'><?php echo link_to('&raquo;', 'articulos/index?page='.$pager->getLastPage().'&nombre='.$nombre.'&id_familia='.$id_familia.'&nombre_ubicacion='.$nombre_ubicacion.'&id_proveedor='.$id_proveedor.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort='.$sort.'&type='.$type) ?></li>
	        <?php endif ?>
	      </ul>
	</div>
	<table class='centrarTablas'>
		<thead>
			<tr>
				<td></td>
				<?php if($type == 'asc' && $sort == 'nombre_articulo'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('Nombre'), 'articulos/index?page='.$pager->getPage().'&nombre='.$nombre.'&id_familia='.$id_familia.'&nombre_ubicacion='.$nombre_ubicacion.'&id_proveedor='.$id_proveedor.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=nombre_articulo&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'nombre_articulo'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('Nombre'), 'articulos/index?page='.$pager->getPage().'&nombre='.$nombre.'&id_familia='.$id_familia.'&nombre_ubicacion='.$nombre_ubicacion.'&id_proveedor='.$id_proveedor.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=nombre_articulo&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('Nombre'), 'articulos/index?page='.$pager->getPage().'&nombre='.$nombre.'&id_familia='.$id_familia.'&nombre_ubicacion='.$nombre_ubicacion.'&id_proveedor='.$id_proveedor.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=nombre_articulo&type=asc'); ?></td>
				<?php endif; ?>
				<?php if($type == 'asc' && $sort == 'id_familia_articulo'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('Familia'), 'articulos/index?page='.$pager->getPage().'&nombre='.$nombre.'&nombre_ubicacion='.$nombre_ubicacion.'&id_familia='.$id_familia.'&id_proveedor='.$id_proveedor.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=id_familia_articulo&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'id_familia_articulo'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('Familia'), 'articulos/index?page='.$pager->getPage().'&nombre='.$nombre.'&nombre_ubicacion='.$nombre_ubicacion.'&id_familia='.$id_familia.'&id_proveedor='.$id_proveedor.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=id_familia_articulo&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('Familia'), 'articulos/index?page='.$pager->getPage().'&nombre='.$nombre.'&id_familia='.$id_familia.'&nombre_ubicacion='.$nombre_ubicacion.'&id_proveedor='.$id_proveedor.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=id_familia_articulo&type=asc'); ?></td>
				<?php endif; ?>
				<?php if($type == 'asc' && $sort == 'datos_producto_articulo'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('Datos'), 'articulos/index?page='.$pager->getPage().'&nombre='.$nombre.'&id_familia='.$id_familia.'&nombre_ubicacion='.$nombre_ubicacion.'&id_proveedor='.$id_proveedor.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=datos_producto_articulo&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'datos_producto_articulo'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('Datos'), 'articulos/index?page='.$pager->getPage().'&nombre='.$nombre.'&id_familia='.$id_familia.'&nombre_ubicacion='.$nombre_ubicacion.'&id_proveedor='.$id_proveedor.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=datos_producto_articulo&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('Datos'), 'articulos/index?page='.$pager->getPage().'&nombre='.$nombre.'&id_familia='.$id_familia.'&nombre_ubicacion='.$nombre_ubicacion.'&id_proveedor='.$id_proveedor.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=datos_producto_articulo&type=asc'); ?></td>
				<?php endif; ?>
				<?php if($type == 'asc' && $sort == 'descripcion_articulo'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('Descripción'), 'articulos/index?page='.$pager->getPage().'&nombre='.$nombre.'&id_familia='.$id_familia.'&nombre_ubicacion='.$nombre_ubicacion.'&id_proveedor='.$id_proveedor.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=descripcion_articulo&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'descripcion_articulo'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('Descripción'), 'articulos/index?page='.$pager->getPage().'&nombre='.$nombre.'&id_familia='.$id_familia.'&nombre_ubicacion='.$nombre_ubicacion.'&id_proveedor='.$id_proveedor.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=descripcion_articulo&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('Descripción'), 'articulos/index?page='.$pager->getPage().'&nombre='.$nombre.'&id_familia='.$id_familia.'&nombre_ubicacion='.$nombre_ubicacion.'&id_proveedor='.$id_proveedor.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=descripcion_articulo&type=asc'); ?></td>
				<?php endif; ?>				
				<?php if($type == 'asc' && $sort == 'stock_articulo'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('Stock'), 'articulos/index?page='.$pager->getPage().'&nombre='.$nombre.'&id_familia='.$id_familia.'&nombre_ubicacion='.$nombre_ubicacion.'&id_proveedor='.$id_proveedor.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=stock_articulo&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'stock_articulo'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('Stock'), 'articulos/index?page='.$pager->getPage().'&nombre='.$nombre.'&id_familia='.$id_familia.'&nombre_ubicacion='.$nombre_ubicacion.'&id_proveedor='.$id_proveedor.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=stock_articulo&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('Stock'), 'articulos/index?page='.$pager->getPage().'&nombre='.$nombre.'&id_familia='.$id_familia.'&nombre_ubicacion='.$nombre_ubicacion.'&id_proveedor='.$id_proveedor.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=stock_articulo&type=asc'); ?></td>
				<?php endif; ?>
				<td><?php echo __("Ubicaciones"); ?></td>
				<td><?php echo __("Proveedores"); ?></td>
				<td><?php echo __("Editar"); ?></td>
				<?php if($id_grupo == 1):?>
					<td><?php echo __("Borrar"); ?></td>
				<?php endif?>
			</tr>
		</thead>
		<tr>
		<?php foreach($pager->getResults() as $articulo): ?>
			<?php if ($articulo->getImagen() != ''): ?>
				<?php $imagen_tam = getimagesize(sfConfig::get('app_imagen_articulos').'/'.$articulo->getImagen()); ?>
				<td align="center" style="padding:5px;"><?php echo link_to(image_tag('articulos/'.$articulo->getImagen(),array('size' => '50x'.($imagen_tam[1]*50)/$imagen_tam[0])),'articulos/verArticulo?id_md5_articulo='.$articulo->getIdMd5Articulo()); ?></td>
			<?php else: ?>
				<td align="center" style="padding:5px;"><?php echo link_to(image_tag('no_image.jpg',array('size' => '50x50')),'articulos/verArticulo?id_md5_articulo='.$articulo->getIdMd5Articulo()); ?></td>
			<?php endif; ?>			
			<td><?php echo $articulo->getNombre(); ?></td>
			<?php $obj_familia = $acc_familias->obtenerObjFamilia($articulo->getIdFamilia()); ?>
			<?php $nombre_familia = $obj_familia->getNombre(); ?>
			<td><?php echo $nombre_familia; ?></td>
			<td><?php echo $articulo->getDatosProducto(); ?></td>
			<td>
				<?php $longitud = strlen($articulo->getDescripcion()); ?>
				<?php if($longitud  > 155 ): ?>
					<?php echo substr($articulo->getDescripcion(),0, 155)."..."; ?></td>
				<?php elseif($longitud == 0): ?>
					<?php echo "..."; ?></td>
				<?php else: ?>
					<?php echo $articulo->getDescripcion(); ?></td>
				<?php endif; ?>	
			<?php if($articulo->getStock() > $articulo->getStockMinimo()): ?>
				<td class="stock_alto"><?php echo $articulo->getStock(); ?></td>		
			<?php else: ?>
				<td class="stock_bajo"><?php echo $articulo->getStock(); ?></td>
			<?php endif; ?>
			<?php $ar_ubicaciones_x_articulo = $acc_articulos->obtenerUbicacionesXIdArticulo($articulo->getIdArticulo()); ?>
			<td>
				<?php if($ar_ubicaciones_x_articulo):?>
					<?php foreach ($ar_ubicaciones_x_articulo as $ubicaciones_x_articulo): ?>
						<?php $obj_ubicacion = $acc_ubicaciones->obtenerObjUbicacion($ubicaciones_x_articulo->getIdUbicacion());?>
						<?php echo link_to($obj_ubicacion->getNombre(),'ubicaciones/verUbicacion?id_md5_ubicacion='.$obj_ubicacion->getIdMd5Ubicacion()); ?><br />
					<?php endforeach;?>
				<?php endif; ?>
			</td>
			<?php $ar_proveedores_x_articulo = $acc_articulos->obtenerProveedoresXIdArticulo($articulo->getIdArticulo()); ?>
			<td align='left'>
				<?php if($ar_proveedores_x_articulo):?>
					<?php foreach ($ar_proveedores_x_articulo as $proveedores_x_articulo): ?>
						<?php $obj_proveedor = $acc_proveedores->obtenerObjProveedor($proveedores_x_articulo->getIdProveedor());?>
						<?php echo link_to($obj_proveedor->getNombre(),'proveedores/verProveedor?id_md5_proveedor='.$obj_proveedor->getIdMd5Proveedor()); ?><br />
					<?php endforeach;?>
				<?php endif; ?>
			</td>
			<td><?php echo link_to(image_tag('../images/edit.png'),'/articulos/editarArticulo?id_md5_articulo='.$articulo->getIdMd5Articulo()); ?></td>
			<?php if($id_grupo == 1):?>
				<td><?php echo link_to(image_tag('../images/borrar.png'),'/articulos/borrarArticulo?id_md5_articulo='.$articulo->getIdMd5Articulo(),array('confirm' => '¿Est&aacute;s seguro?')); ?></td>
			<?php endif?>									
		</tr>		
 	 	<?php endforeach; ?>
 	 </table>
<?php endif; ?>