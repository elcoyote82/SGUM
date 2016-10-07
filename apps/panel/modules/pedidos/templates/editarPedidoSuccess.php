<?php echo 
	javascript_tag(" 
		function obtenerIdArticulo(text, li){ 
			$('id_articulo').value  = li.value   
 		} 
 	") 
 ?> 

<div id="subnavegacion">
	<div class='botonSubNav'><?php echo link_to(__('Agregar Pedido'),'/pedidos/index'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Administrar Pedidos'),'/pedidos/administrarPedidos'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Pedidos Pendientes'),'/pedidos/pedidosPendientes'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Pedidos En Proceso'),'/pedidos/pedidosEnProceso'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Pedidos Recibidos'),'/pedidos/pedidosRecibidos'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Pedidos Completos'),'/pedidos/pedidosCompletos'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Pedidos Procesados'),'/pedidos/pedidosProcesados'); ?></div>	
</div>
<div id="tituloTabla" >
	<?php echo __("NÚMERO PEDIDO '").$obj_pedido->getNumPedido()."'"; ?>
</div>
<div class='buscador'>
<?php echo form_tag('/pedidos/confirmarPedido'); ?>
	<?php echo input_hidden_tag('id_pedido_temporal', $id_pedido_temporal); ?>
	<?php echo __("Artículo: "); ?>
	
	<?php echo input_auto_complete_tag('nombre_articulo', '','/pedidos/buscarArticuloPedido?id_proveedor='.$id_proveedor,
			array('autocomplete' => 'on', 'onClick' => 'this.select();','onchange' => " $('id_articulo').value = '';"),
    		array('use_style' => true,
    		'after_update_element' => "function (inputField, selectedItem) { $('id_articulo').value = selectedItem.id; }"
    	)) ?>	
	
	 
    <?php echo input_hidden_tag('id_articulo', '') ?>
    <?php echo submit_to_remote('articulos_ajax','Agregar Artículo', array(
        'update'   => 'lista_elementos',
        'url'      => '/pedidos/agregarArticuloPedido?id_pedido_temporal='.$id_pedido_temporal,
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
		<?php if($ar_lineas_pedido): ?>
			<?php foreach($ar_lineas_pedido as $linea_pedido): ?>
				<?php $obj_articulo = $acc_articulos->obtenerObjArticulo($linea_pedido->getIdArticulo()); ?>
				<tr>
					<?php if ($obj_articulo->getImagen() != ''): ?>
						<?php $imagen_tam = getimagesize(sfConfig::get('app_imagen_articulos').'/'.$obj_articulo->getImagen()); ?>
						<td align="center" style="padding:5px;"><?php echo image_tag('articulos/'.$obj_articulo->getImagen(),array('size' => '20x'.($imagen_tam[1]*20)/$imagen_tam[0])); ?></td>
					<?php else: ?>
						<td align="center" style="padding:5px;"><?php echo image_tag('no_image.jpg',array('size' => '20x20')); ?></td>
					<?php endif; ?>
					<td><?php echo $obj_articulo->getNombre(); ?></td>
					<td><?php echo $obj_articulo->getDatosProducto(); ?></td>
					<td><?php echo $linea_pedido->getCantidad(); ?></td>				
					<td>
						<?php echo link_to_remote(image_tag('../images/mas.png'), array(
				        'update'   => 'lista_elementos',
				        'url'      => '/pedidos/subirCantidadArticuloPedido?id_linea_pedido='.$linea_pedido->getIdArticuloXPedido(),
						)) ?>
						<?php echo link_to_remote(image_tag('../images/menos.png'), array(
				        'update'   => 'lista_elementos',
				        'url'      => '/pedidos/bajarCantidadArticuloPedido?id_linea_pedido='.$linea_pedido->getIdArticuloXPedido(),
						)) ?>
					</td>
					<td><?php echo link_to_remote(image_tag(sfConfig::get('app_ajax_func')."/borrar.png"), array(
				        'update'   => 'lista_elementos',
				        'url'      => '/pedidos/borrarArticuloPedido?id_linea_pedido='.$linea_pedido->getIdArticuloXPedido(),
						'confirm'  => '¿Estás seguro?'
						)) ?>
					</td>
				</tr>
			<?php endforeach; ?>
		<?php else: ?>
			<tr><td colspan='5' align="center"><?php echo __("No hay artículos en el pedido."); ?></td></tr>
		<?php endif; ?>
	</tbody>
</table>
<?php echo input_hidden_tag('id_pedido_temporal',$id_pedido_temporal);?>
<?php echo submit_tag('Confirmar Pedido',array('class' => 'buttonEsqueleto')) ?>
</form>