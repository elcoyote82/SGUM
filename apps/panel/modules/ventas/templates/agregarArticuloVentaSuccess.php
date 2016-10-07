<table id="lista_elementos" class='centrarTablas'>
	<thead>
		<tr>					
			<td></td>
			<td><?php echo __("Artículo"); ?></td>
			<td><?php echo __("Datos"); ?></td>
			<td><?php echo __("Cantidad"); ?></td>
			<td><?php echo __("Agregar/Reducir"); ?></td>
			<td><?php echo __("Borrar"); ?></td>
		</tr>
	</thead>
	<tbody>
		<?php if($ar_lineas_venta): ?>
			<?php foreach($ar_lineas_venta as $linea_venta): ?>
				<?php $obj_articulo = $acc_articulos->obtenerObjArticulo($linea_venta->getIdArticulo()); ?>
				<tr>
					<?php if ($obj_articulo->getImagen() != ''): ?>
						<?php $imagen_tam = getimagesize(sfConfig::get('app_imagen_articulos').'/'.$obj_articulo->getImagen()); ?>
						<td align="center" style="padding:5px;"><?php echo image_tag('articulos/'.$obj_articulo->getImagen(),array('size' => '20x'.($imagen_tam[1]*20)/$imagen_tam[0])); ?></td>
					<?php else: ?>
						<td align="center" style="padding:5px;"><?php echo image_tag('no_image.jpg',array('size' => '20x20')); ?></td>
					<?php endif; ?>
					<td><?php echo $obj_articulo->getNombre(); ?></td>
					<td><?php echo $obj_articulo->getDatosProducto(); ?></td>
					<td><?php echo $linea_venta->getCantidad(); ?></td>				
					<td>
						<?php echo link_to_remote(image_tag('../images/mas.png'), array(
				        'update'   => 'lista_elementos',
				        'url'      => '/ventas/subirCantidadArticuloVenta?id_linea_venta='.$linea_venta->getIdArticuloXVenta(),
						)) ?>
						<?php echo link_to_remote(image_tag('../images/menos.png'), array(
				        'update'   => 'lista_elementos',
				        'url'      => '/ventas/bajarCantidadArticuloVenta?id_linea_venta='.$linea_venta->getIdArticuloXVenta(),
						)) ?>
					</td>
					<td><?php echo link_to_remote(image_tag(sfConfig::get('app_ajax_func')."/borrar.png"), array(
				        'update'   => 'lista_elementos',
				        'url'      => '/ventas/borrarArticuloVenta?id_linea_venta='.$linea_venta->getIdArticuloXVenta(),
						'confirm'  => '¿Estás seguro?'
						)) ?>
					</td>
				</tr>
			<?php endforeach; ?>
		<?php else: ?>
			<tr><td colspan='5' align="center"><?php echo __("No hay artículos en el venta."); ?></td></tr>
		<?php endif; ?>
	</tbody>
</table>