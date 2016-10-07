<?php echo 
	javascript_tag(" 
		function obtenerIdArticulo(text, li){ 
			$('id_articulo').value  = li.value   
 		} 
 	") 
 ?> 

<div id="subnavegacion">
	<div class='botonSubNav'><?php echo link_to(__('Agregar Venta'),'/ventas/index'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Administrar Ventas'),'/ventas/administrarVentas'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Ventas Pendientes'),'/ventas/ventasPendientes'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Ventas En Proceso'),'/ventas/ventasEnProceso'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Ventas Enviadas'),'/ventas/ventasEnviadas'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Ventas Completas'),'/ventas/ventasCompletas'); ?></div>	
	<div class='botonSubNav'><?php echo link_to(__('Ventas Procesadas'),'/ventas/ventasProcesadas'); ?></div>
</div>
<div id="tituloTabla" >
	<?php echo __("NÚMERO VENTA '").$obj_venta->getNumVenta()."' | Cliente '".$obj_cliente->getNombre()."'"; ?>
</div>
<div class='buscador'>
<?php echo form_tag('/ventas/confirmarVenta'); ?>
	<?php echo input_hidden_tag('id_venta_temporal', $id_venta_temporal); ?>
	<?php echo __("Artículo: "); ?>
	
	<?php echo input_auto_complete_tag('nombre_articulo', '','/ventas/buscarArticuloVenta?id_cliente='.$id_cliente,
			array('autocomplete' => 'on', 'onClick' => 'this.select();','onchange' => " $('id_articulo').value = '';"),
    		array('use_style' => true,
    		'after_update_element' => "function (inputField, selectedItem) { $('id_articulo').value = selectedItem.id; }"
    	)) ?>		 
    <?php echo input_hidden_tag('id_articulo', '') ?>
    
    <?php echo submit_to_remote('articulos_ajax','Agregar Artículo', array(
        'update'   => 'lista_elementos',
        'url'      => '/ventas/agregarArticuloVenta?id_venta_temporal='.$id_venta_temporal,
		),
        array('class' => 'buttonEsqueleto')
        ) ?>  
</div> 
<div id="tituloTabla" >
	<?php echo __("LISTA DE ARTÍCULOS"); ?>
</div>
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
			<tr><td colspan='5' align="center"><?php echo __("No hay artículos en la venta."); ?></td></tr>
		<?php endif; ?>
	</tbody>
</table>
<?php echo input_hidden_tag('id_venta_temporal',$id_venta_temporal);?>
<?php echo submit_tag('Confirmar Venta',array('class' => 'buttonEsqueleto')) ?>
</form>