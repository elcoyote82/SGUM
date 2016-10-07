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
	<?php echo __("AGREGAR PEDIDO"); ?>
</div>
<div class='buscador'>
<?php echo form_tag('/pedidos/index'); ?>
	<?php echo input_hidden_tag('buscar',true); ?>		
	<?php echo __("Proveedor: "); ?>
	<?php echo select_tag('id_proveedor',options_for_select($ar_proveedores,$id_proveedor)); ?>
	<?php echo __("Artículo: "); ?>	
	<?php echo input_auto_complete_tag('nombre_articulo', '','/pedidos/buscarProveedorArticulo',
			array('autocomplete' => 'on'),
    		array('use_style' => true,
    		'after_update_element' => "function (inputField, selectedItem) { $('id_articulo').value = selectedItem.id; }")
    		) ?>	 
    <?php echo input_hidden_tag('id_articulo', '') ?>
	<?php echo submit_tag(__('Buscar'),array('class'  => 'buttonEsqueleto')); ?>
	<?php echo button_to(__('Restablecer'),'pedidos/index',array('class'  => 'buttonEsqueleto')); ?>	
</div>
<?php if($buscar): ?> 
	<?php if($pager->getnbResults() == 0): ?>
		<table class="centrarTablas">
			<thead>
				<tr><td align="center"><?php echo __("Proveedores"); ?></td></tr>
			</thead>
			<tr><td align="center"><?php echo __("No se ha encontrado ningún proveedor."); ?></td></tr>
		</table>
	<?php else: ?>
	<br/>
		<div align='center'>
			<!-- Parseo de variables -->
			<?php $id_proveedor = $acc_url->parsearEnvio($id_proveedor); ?>
			<?php $id_articulo = $acc_url->parsearEnvio($id_articulo); ?>
		      <ul class='paginator'>
		        <?php if ($pager->haveToPaginate()): ?>
		          <li class='previous'><?php echo link_to('&laquo;', 'pedidos/index?page='.$pager->getFirstPage().'&id_proveedor='.id_proveedor.'&id_articulo='.id_articulo) ?></li>
		          <li class='previous'><?php echo link_to('&lt;', 'pedidos/index?page='.$pager->getPreviousPage().'&id_proveedor='.id_proveedor.'&id_articulo='.id_articulo) ?></li>
		          <?php $links = $pager->getLinks(); 
		          foreach ($links as $page): ?>
		            <?php if($page == $pager->getPage()): ?>
		              <li class='current'><?php echo $page; ?></li>
		            <?php else: ?>
		              <li class='page'><?php echo link_to($page, '/pedidos/index?page='.$page.'&id_proveedor='.id_proveedor.'&id_articulo='.id_articulo) ?></li>
		            <?php endif; ?>
		            <?php if ($page != $pager->getCurrentMaxLink()): ?><li class='empty'>   <li><?php endif ?>
		          <?php endforeach ?>
		          <li class='next'><?php echo link_to('&gt;', 'pedidos/index?page='.$pager->getNextPage().'&id_proveedor='.id_proveedor.'&id_articulo='.id_articulo) ?></li>
		          <li class='next'><?php echo link_to('&raquo;', 'pedidos/index?page='.$pager->getLastPage().'&id_proveedor='.id_proveedor.'&id_articulo='.id_articulo) ?></li>
		        <?php endif ?>
		      </ul>
		</div>		
		<?php if($nombre_articulo != ''): ?>
			<?php $obj_articulo = $acc_articulos->obtenerObjArticulo($id_articulo); ?>
		<?php endif; ?>
		<table class='centrarTablas'>
			<thead>
				<tr>	
					<?php if(isset($obj_articulo)): ?>
						<td><?php echo __("Artículo"); ?></td>
						<td><?php echo __("Stock"); ?></td>
						<td><?php echo __("Datos"); ?></td>
					<?php endif; ?>				
					<td><?php echo __("Nombre"); ?></td>
					<td><?php echo __("CIF/NIF"); ?></td>
					<td><?php echo __("Dirección"); ?></td>
					<td><?php echo __("Población"); ?></td>
					<td><?php echo __("Provincia"); ?></td>
					<td><?php echo __("CP"); ?></td>
					<td><?php echo __("Pais"); ?></td>
					<td><?php echo __("Teléfono"); ?></td>
					<td><?php echo __("Otro Teléfono"); ?></td>
					<td><?php echo __("Fax"); ?></td>
					<td><?php echo __("Email"); ?></td>
					<td><?php echo __("Pedido"); ?></td>
				</tr>
			</thead>
			<?php foreach($pager->getResults() as $proveedor): ?>
				<tr>							
					<?php if($nombre_articulo != ''): ?>
						<td><?php echo $obj_articulo->getNombre(); ?></td>
						<?php if($obj_articulo->getStock() > $obj_articulo->getStockMinimo()): ?>
							<td class="stock_alto"><?php echo $obj_articulo->getStock(); ?></td>		
						<?php else: ?>
							<td class="stock_bajo"><?php echo $obj_articulo->getStock(); ?></td>
						<?php endif; ?>
						<td><?php echo $obj_articulo->getDatosProducto(); ?></td>
					<?php endif; ?>							
					<td><?php echo link_to($proveedor->getNombre(),'proveedores/verProveedor?id_md5_proveedor='.$proveedor->getIdMd5Proveedor()); ?></td>
					<td><?php echo $proveedor->getCifNif(); ?></td>
					<td><?php echo $proveedor->getDireccion(); ?></td>
					<td><?php echo $proveedor->getPoblacion(); ?></td>
					<td><?php echo $proveedor->getProvincia(); ?></td>
					<td><?php echo $proveedor->getCP(); ?></td>
					<td><?php echo $proveedor->getPais(); ?></td>			
					<td><?php echo $proveedor->getTelefono(); ?></td>
					<td><?php echo $proveedor->getTelefono2(); ?></td>
					<td><?php echo $proveedor->getFax(); ?></td>
					<td><?php echo $proveedor->getEmail(); ?></td>					
					<?php $id_md5_proveedor = $acc_url->parsearEnvio($proveedor->getIdMd5Proveedor()); ?>
					<?php if($nombre_articulo != ''): ?>												
						<?php $id_md5_articulo = $acc_url->parsearEnvio($obj_articulo->getIdMd5Articulo()); ?>
						<td><?php echo link_to(image_tag('../images/tareas.png'),'pedidos/agregarPedido?id_md5_proveedor='.$id_md5_proveedor.'&id_md5_articulo='.$id_md5_articulo); ?></td>
					<?php else: ?>
						<td><?php echo link_to(image_tag('../images/tareas.png'),'pedidos/agregarPedido?id_md5_proveedor='.$id_md5_proveedor); ?></td>
					<?php endif; ?>
	 	 		</tr>
	 	 	<?php endforeach; ?>
	 	 </table>
	<?php endif; ?>
<?php else: ?>
	<table class="centrarTablas">
			<tr><td align="center"><?php echo __("Busque un proveedor o un artículo concreto."); ?></td></tr>
		</table>	
<?php endif; ?> 