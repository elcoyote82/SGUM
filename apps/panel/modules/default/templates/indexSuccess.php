<!-- Ocultar y mostrar el contenido de un submenu cuando hacemos clic en un enlace -->
<?php echo javascript_tag("
  function mostrar_submenu(fila,fila2){
  status =document.getElementById(fila).style.display;
  if(status=='none'){
      document.getElementById(fila).style.display=\"table\";
      document.getElementById(fila2).style.display=\"block\";
   }else{
  	 document.getElementById(fila).style.display=\"none\";
  	 document.getElementById(fila2).style.display=\"none\";
   }
}

") ?>
<div id="tituloTabla" >
	<a href="javascript:mostrar_submenu('submenu_1','submenu_2');"><?php echo __("PEDIDOS PENDIENTES"); ?></a>
</div>
<!-- Tabla de Pedidos Pendientes-->
<?php if($pager_pedidos_pendientes->getnbResults() == 0): ?>
	<table id='submenu_1' class="centrarTablas">
		<tr><td align="center"><?php echo __("No se ha encontrado ningún pedido pendiente."); ?></td></tr>
	</table>
<?php else: ?>		
	<table id='submenu_1' class='centrarTablas'>
		<thead>			
			<tr>
				<td><?php echo __("Número Pedido"); ?></td>
				<td><?php echo __("Proveedor"); ?></td>
				<td><?php echo __("Estado Pedido"); ?></td>
				<td><?php echo __("Fecha Pedido"); ?></td>
				<td colspan='3'><?php echo __("Acciones"); ?></td>
			</tr>
		</thead>	
		<?php foreach($pager_pedidos_pendientes->getResults() as $pedidos_pendientes): ?>
			<?php $nombre_proveedor = $acc_proveedores->obtenerNombreProveedorXIdProveedor($pedidos_pendientes->getIdProveedor());?>
			<?php $id_estado_pedido = $pedidos_pendientes->getIdEstadoPedido();?>
			<?php $obj_estado_pedido = $acc_admin->obtenerObjEstadoPedido($id_estado_pedido);?>
			<tr>
				<td><?php echo $pedidos_pendientes->getNumPedido(); ?></td>
				<td><?php echo $nombre_proveedor; ?></td>
				<td><?php echo $obj_estado_pedido->getEstadoPedido(); ?></td>
				<td><?php echo $pedidos_pendientes->getCreatedAt(); ?></td>					
				<?php if($id_estado_pedido == 1): ?>
					<td><?php echo link_to(image_tag('../images/borrar.png'),'/pedidos/borrarPedido?id_md5_pedido='.$pedidos_pendientes->getIdMd5Pedido(), array('confirm' => '¿Est&aacute;s seguro?','title' => 'Cancelar pedido')); ?></td>
					<td><?php echo link_to(image_tag('../images/edit.png'),'/pedidos/editarPedido?id_md5_pedido='.$pedidos_pendientes->getIdMd5Pedido(), 'title=Editar pedido'); ?></td>
					<td><?php echo link_to(image_tag('../images/ok.png'),'/pedidos/confirmarPedido?id_md5_pedido='.$pedidos_pendientes->getIdMd5Pedido(), 'title=Confirmar pedido'); ?></td>
				<?php else:?>
					<td><?php echo link_to(image_tag('../images/lupa.png'),'/pedidos/verPedido?id_md5_pedido='.$pedidos_pendientes->getIdMd5Pedido(), 'title=Ver pedido'); ?></td>
					<td><?php echo link_to(image_tag('../images/pdf2.png'),'/pedidos/descargarInformePedido?id_md5_pedido='.$pedidos_pendientes->getIdMd5Pedido(), 'title=Descargar informe'); ?></td>
					<td><?php echo link_to(image_tag('../images/right.png'),'/pedidos/confirmarPedidoRecibido?id_md5_pedido='.$pedidos_pendientes->getIdMd5Pedido(), array('confirm' => '¿Confirma haber recibido el pedido en el almac&eacute;n. ?','title' => 'Confirmar Pedido Recibido')); ?></td>
				<?php endif;?>							
			</tr>					
		<?php endforeach; ?>				
	</table>
	<div id='submenu_2' align='center'>
	      <ul class='paginator'>
	        <?php if ($pager_pedidos_pendientes->haveToPaginate()): ?>
	          <li class='previous'><?php echo link_to('&laquo;', 'default/index?page_pedidos_pendientes='.$pager_pedidos_pendientes->getFirstPage()) ?></li>
	          <li class='previous'><?php echo link_to('&lt;', 'default/index?page_pedidos_pendientes='.$pager_pedidos_pendientes->getPreviousPage()) ?></li>
	          <?php $links = $pager_pedidos_pendientes->getLinks(); 
	          foreach ($links as $page_pedidos_pendientes): ?>
	            <?php if($page_pedidos_pendientes == $pager_pedidos_pendientes->getPage()): ?>
	              <li class='current'><?php echo $page_pedidos_pendientes; ?></li>
	            <?php else: ?>
	              <li class='page'><?php echo link_to($page_pedidos_pendientes, '/default/index?page_pedidos_pendientes='.$page_pedidos_pendientes) ?></li>
	            <?php endif; ?>
	            <?php if ($page_pedidos_pendientes != $pager_pedidos_pendientes->getCurrentMaxLink()): ?><li class='empty'>   <li><?php endif ?>
	          <?php endforeach ?>
	          <li class='next'><?php echo link_to('&gt;', 'default/index?page_pedidos_pendientes='.$pager_pedidos_pendientes->getNextPage()) ?></li>
	          <li class='next'><?php echo link_to('&raquo;', 'default/index?page_pedidos_pendientes='.$pager_pedidos_pendientes->getLastPage()) ?></li>
	        <?php endif ?>
	      </ul>
	</div>
<?php endif; ?>

<div id="tituloTabla" >
	<a href="javascript:mostrar_submenu('submenu_3','submenu_4');"><?php echo __("VENTAS PENDIENTES"); ?></a>
</div>
<!-- Tabla de Ventas Pendientes-->
<?php if($pager_ventas_pendientes->getnbResults() == 0): ?>
	<table class="centrarTablas">
		<tr><td align="center"><?php echo __("No se ha encontrado ninguna venta pendiente."); ?></td></tr>
	</table>
<?php else: ?>
	<table id='submenu_3' class='centrarTablas'>
		<thead>			
			<tr>
				<td><?php echo __("Número Venta"); ?></td>
				<td><?php echo __("Cliente"); ?></td>
				<td><?php echo __("Estado Venta"); ?></td>
				<td><?php echo __("Fecha Venta"); ?></td>
				<td colspan='3'><?php echo __("Acciones"); ?></td>
			</tr>
		</thead>			
		<?php foreach($pager_ventas_pendientes->getResults() as $ventas_pendientes): ?>
			<?php $nombre_cliente = $acc_clientes->obtenerNombreClienteXIdCliente($ventas_pendientes->getIdCliente());?>
			<?php $id_estado_venta = $ventas_pendientes->getIdEstadoVenta();?>
			<?php $obj_estado_venta = $acc_admin->obtenerObjEstadoVenta($ventas_pendientes->getIdEstadoVenta());?>
			<tr>
				<td><?php echo $ventas_pendientes->getNumVenta(); ?></td>
				<td><?php echo $nombre_cliente; ?></td>
				<td><?php echo $obj_estado_venta->getEstadoVenta(); ?></td>
				<td><?php echo $ventas_pendientes->getCreatedAt(); ?></td>				
				<?php if($id_estado_venta == 1): ?>
					<td><?php echo link_to(image_tag('../images/borrar.png'),'/ventas/borrarVenta?id_md5_venta='.$ventas_pendientes->getIdMd5Venta(), array('confirm' => '¿Est&aacute;s seguro?','title' => 'Cancelar venta')); ?></td>
					<td><?php echo link_to(image_tag('../images/edit.png'),'/ventas/editarVenta?id_md5_venta='.$ventas_pendientes->getIdMd5Venta(), 'title=Editar venta'); ?></td>
					<td><?php echo link_to(image_tag('../images/ok.png'),'/ventas/confirmarVenta?id_md5_venta='.$ventas_pendientes->getIdMd5Venta(), 'title=Confirmar venta'); ?></td>
				<?php else:?>
					<td><?php echo link_to(image_tag('../images/lupa.png'),'/ventas/verVenta?id_md5_venta='.$ventas_pendientes->getIdMd5Venta(), 'title=Ver venta'); ?></td>
					<td><?php echo link_to(image_tag('../images/pdf2.png'),'/ventas/descargarInformeVenta?id_md5_venta='.$ventas_pendientes->getIdMd5Venta(), 'title=Descargar informe'); ?></td>
					<td><?php echo link_to(image_tag('../images/ojo.png'),'/ventas/comprobarVentaCompleta?id_md5_venta='.$ventas_pendientes->getIdMd5Venta(), 'title=Actualizar Estado Venta'); ?></td>
				<?php endif;?>								
			</tr>						
		<?php endforeach; ?>				
	</table>
	<div id='submenu_4' class='centrarTablas' align='center'>
	   <ul class='paginator'>
	     <?php if ($pager_ventas_pendientes->haveToPaginate()): ?>
	       <li class='previous'><?php echo link_to('&laquo;', 'default/index?page_ventas_pendientes='.$pager_ventas_pendientes->getFirstPage()); ?></li>
	       <li class='previous'><?php echo link_to('&lt;', 'default/index?page_ventas_pendientes='.$pager_ventas_pendientes->getPreviousPage()); ?></li>
	       <?php $links = $pager_ventas_pendientes->getLinks(); 
	       foreach ($links as $page_ventas_pendientes): ?>
	         <?php if($page_ventas_pendientes == $pager_ventas_pendientes->getPage()): ?>
	           <li class='current'><?php echo $page_ventas_pendientes; ?></li>
	         <?php else: ?>
	           <li class='page'><?php echo link_to($page_ventas_pendientes, 'default/index?page_ventas_pendientes='.$page_ventas_pendientes); ?></li>
	         <?php endif; ?>
	         <?php if ($page_ventas_pendientes != $pager_ventas_pendientes->getCurrentMaxLink()): ?><li class='empty'>   <li><?php endif ?>
	       <?php endforeach ?>
	       <li class='next'><?php echo link_to('&gt;', 'default/index?page_ventas_pendientes='.$pager_ventas_pendientes->getNextPage()); ?></li>
	       <li class='next'><?php echo link_to('&raquo;', 'default/index?page_ventas_pendientes='.$pager_ventas_pendientes->getLastPage()); ?></li>
	     <?php endif ?>
	   </ul>
	</div>
<?php endif; ?>

<div id="tituloTabla" >
	<a href="javascript:mostrar_submenu('submenu_5','submenu_6');"><?php echo __("ARTICULOS BAJO STOCK"); ?></a>
</div>
<!-- Tabla de Articulos Bajo de Stock -->
<?php if($pager_articulos_bajo_stock->getnbResults() == 0): ?>
	<table class="centrarTablas">
		<tr><td align="center"><?php echo __("No se ha encontrado ningún articulo con bajo stock."); ?></td></tr>
	</table>
<?php else: ?>	
	<table id='submenu_5' class='centrarTablas'>
		<thead>		
			<tr>
				<td></td>				
				<td><?php echo __("Nombre"); ?></td>
				<td><?php echo __("Familia"); ?></td>
				<td><?php echo __("Datos"); ?></td>
				<td><?php echo __("Stock"); ?></td>
				<td><?php echo __("Ubicaciones"); ?></td>
				<td><?php echo __("Proveedores"); ?></td>				
				<td><?php echo __("Acciones"); ?></td>
			</tr>
		</thead>			
		<?php foreach($pager_articulos_bajo_stock->getResults() as $articulos_bajo_stock): ?>
			<tr>
				<?php if ($articulos_bajo_stock->getImagen() != ''): ?>
					<?php $imagen_tam = getimagesize(sfConfig::get('app_imagen_articulos').'/'.$articulos_bajo_stock->getImagen()); ?>
					<td align="center" style="padding:5px;"><?php echo link_to(image_tag('articulos/'.$articulos_bajo_stock->getImagen(),array('size' => '30x'.($imagen_tam[1]*30)/$imagen_tam[0])),'articulos/verArticulo?id_md5_articulo='.$articulos_bajo_stock->getIdMd5Articulo()); ?></td>
				<?php else: ?>
					<td align="center" style="padding:5px;"><?php echo link_to(image_tag('no_image.jpg',array('size' => '30x30')),'articulos/verArticulo?id_md5_articulo='.$articulos_bajo_stock->getIdMd5Articulo()); ?></td>
				<?php endif; ?>			
				<td><?php echo $articulos_bajo_stock->getNombre(); ?></td>
				<?php $obj_familia = $acc_familias->obtenerObjFamilia($articulos_bajo_stock->getIdFamilia()); ?>
				<?php $nombre_familia = $obj_familia->getNombre(); ?>
				<td><?php echo $nombre_familia; ?></td>
				<td><?php echo $articulos_bajo_stock->getDatosProducto(); ?></td>	
				<?php if($articulos_bajo_stock->getStock() > $articulos_bajo_stock->getStockMinimo()): ?>
					<td class="stock_alto"><?php echo $articulos_bajo_stock->getStock(); ?></td>		
				<?php else: ?>
					<td class="stock_bajo"><?php echo $articulos_bajo_stock->getStock(); ?></td>
				<?php endif; ?>
				<?php $ar_ubicaciones_x_articulo = $acc_articulos->obtenerUbicacionesXIdArticulo($articulos_bajo_stock->getIdArticulo()); ?>
				<td>
					<?php if($ar_ubicaciones_x_articulo):?>
						<?php foreach ($ar_ubicaciones_x_articulo as $ubicaciones_x_articulo): ?>
							<?php $obj_ubicacion = $acc_ubicaciones->obtenerObjUbicacion($ubicaciones_x_articulo->getIdUbicacion());?>
							<?php echo link_to($obj_ubicacion->getNombre(),'ubicaciones/verUbicacion?id_md5_ubicacion='.$obj_ubicacion->getIdMd5Ubicacion()); ?><br />
						<?php endforeach;?>
					<?php endif; ?>
				</td>
				<?php $ar_proveedores_x_articulo = $acc_articulos->obtenerProveedoresXIdArticulo($articulos_bajo_stock->getIdArticulo()); ?>
				<td align='left'>
					<?php if($ar_proveedores_x_articulo):?>
						<?php foreach ($ar_proveedores_x_articulo as $proveedores_x_articulo): ?>
							<?php $obj_proveedor = $acc_proveedores->obtenerObjProveedor($proveedores_x_articulo->getIdProveedor());?>
							<?php echo link_to($obj_proveedor->getNombre(),'proveedores/verProveedor?id_md5_proveedor='.$obj_proveedor->getIdMd5Proveedor()); ?><br />
						<?php endforeach;?>
					<?php endif; ?>
				</td>
				<td><?php echo button_to(__('Hacer Pedido'),'pedidos/index?id_md5_articulo='.$articulos_bajo_stock->getIdMd5Articulo(),array('class'  => 'buttonEsqueleto')); ?></td>			
			</tr>					
		<?php endforeach; ?>				
	</table>
	<div id='submenu_6' class='centrarTablas' align='center'>
	   <ul class='paginator'>
	     <?php if ($pager_articulos_bajo_stock->haveToPaginate()): ?>
	       <li class='previous'><?php echo link_to('&laquo;', 'default/index?page_articulos_bajo_stock='.$pager_articulos_bajo_stock->getFirstPage()); ?></li>
	       <li class='previous'><?php echo link_to('&lt;', 'default/index?page_articulos_bajo_stock='.$pager_articulos_bajo_stock->getPreviousPage()); ?></li>
	       <?php $links = $pager_articulos_bajo_stock->getLinks(); 
	       foreach ($links as $page_articulos_bajo_stock): ?>
	         <?php if($page_articulos_bajo_stock == $pager_articulos_bajo_stock->getPage()): ?>
	           <li class='current'><?php echo $page_articulos_bajo_stock; ?></li>
	         <?php else: ?>
	           <li class='page'><?php echo link_to($page_articulos_bajo_stock, 'default/index?page_articulos_bajo_stock='.$page_articulos_bajo_stock); ?></li>
	         <?php endif; ?>
	         <?php if ($page_articulos_bajo_stock != $pager_articulos_bajo_stock->getCurrentMaxLink()): ?><li class='empty'>   <li><?php endif ?>
	       <?php endforeach ?>
	       <li class='next'><?php echo link_to('&gt;', 'default/index?page_articulos_bajo_stock='.$pager_articulos_bajo_stock->getNextPage()); ?></li>
	       <li class='next'><?php echo link_to('&raquo;', 'default/index?page_articulos_bajo_stock='.$pager_articulos_bajo_stock->getLastPage()); ?></li>
	     <?php endif ?>
	   </ul>
	</div>
<?php endif; ?>