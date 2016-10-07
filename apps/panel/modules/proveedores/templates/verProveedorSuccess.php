<div id="subnavegacion">
	<div class='botonSubNav'><?php echo link_to(__('Proveedores'),'/proveedores/index'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Agregar Proveedor'),'/proveedores/agregarProveedor'); ?></div>	
	<div class='botonSubNav'><?php echo link_to(__('Contactos Proveedores'),'/contactos/administrarContactosProveedores'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Agregar Contacto'),'/contactos/agregarContacto?opcion=proveedores'); ?></div>
</div>
<div id="tituloTabla" >
	<?php echo __("PROVEEDOR '").$obj_proveedor->getNombre()."'"; ?>
</div>
<div id='ficha'>
	<div id="sidebar-tabs">
		<div id="mostPopWidget">
        	<div id="tabsContainer">
        		<ul class="tabs">
        			<li class="selected"><a href='#'><?php echo __("<strong>Proveedor</strong>"); ?></a></li>
        			<li><a href='#'><?php echo __("<strong>Artículos</strong>"); ?></a></li>
        			<li><a href='#'><?php echo __("<strong>Últimos Pedidos</strong>"); ?></a></li>
        			<li><a href='#'><?php echo __("<strong>Contactos</strong>"); ?></a></li>
        		</ul>
        	</div>
        	<div class="tabContent tabContentActive" id="a">
        		<div class='info_ficha'>
					<?php echo button_to(__('Editar Proveedor'),'proveedores/editarProveedor?id_md5_proveedor='.$obj_proveedor->getIdMd5Proveedor(),array('class'  => 'buttonEsqueleto')); ?>
        			<div class='ficha_datos'>
        				<table class='tabla_ficha'>
        					<tr>
        						<td>
        							<?php echo "<strong>Nombre</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_proveedor->getNombre(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>CIF/NIF</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_proveedor->getCifNif(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>Dirección</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_proveedor->getDireccion(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>Población</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_proveedor->getPoblacion(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>Provincia</strong>"; ?>
        						</td>
        						<td>
        							<?php if($obj_proveedor->getProvincia()): ?>
        								<?php echo $ar_provincias[$obj_proveedor->getProvincia()]; ?>
        							<?php endif; ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>CP</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_proveedor->getCP(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>Pais</strong>"; ?>
        						</td>
        						<td>
        							<?php echo format_country($obj_proveedor->getPais()); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>Teléfono</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_proveedor->getTelefono(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>Móvil</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_proveedor->getMovil(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>Fax</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_proveedor->getFax(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>Email</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_proveedor->getEmail(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>Web</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_proveedor->getWeb(); ?>
        						</td>
        					</tr>
        				</table>
        			</div> 
        		</div>		
			</div>
			<div class="tabContent" id="b">
				<div class='info_ficha'>	        				
        			<div class='ficha_informe_ventas'>
        				<table class='tabla_ficha'>        					
					        <tr>
					        	<td></td>
        						<td>
        							<strong><?php echo __("Artículo"); ?></strong>
        						</td>
        						<td>
        							<strong><?php echo __("Familia"); ?></strong>
        						</td>
        						<td>
        							<strong><?php echo __("Datos Producto"); ?></strong>
        						</td>
        						<td>
        							<strong><?php echo __("Stock"); ?></strong>
        						</td>
        						<td>
        							<strong><?php echo __("Pedido"); ?></strong>
        						</td>
        					</tr>
        					<?php $ar_articulos_x_proveedor = $acc_articulos->obtenerArticulosXIdProveedor($obj_proveedor->getIdProveedor()); ?>
        					<?php if($ar_articulos_x_proveedor): ?>
	        					<?php foreach($ar_articulos_x_proveedor as $articulos_x_proveedor): ?>
	        						<?php $obj_articulo = $acc_articulos->obtenerObjArticulo($articulos_x_proveedor->getIdArticulo()); ?>
	        						<tr>
	        							<?php if ($obj_articulo->getImagen() != ''): ?>
	        								<?php $imagen_tam = getimagesize(sfConfig::get('app_imagen_articulos').'/'.$obj_articulo->getImagen()); ?>
											<td align="center" style="padding:5px;"><?php echo link_to(image_tag('articulos/'.$obj_articulo->getImagen(),array('size' => '50x'.($imagen_tam[1]*50)/$imagen_tam[0])),'articulos/verArticulo?id_md5_articulo='.$obj_articulo->getIdMd5Articulo()); ?></td>
										<?php else: ?>
											<td align="center" style="padding:5px;"><?php echo link_to(image_tag('no_image.jpg',array('size' => '50x50')),'articulos/verArticulo?id_md5_articulo='.$obj_articulo->getIdMd5Articulo()); ?></td>
										<?php endif; ?>			
										<td><?php echo $obj_articulo->getNombre(); ?></td>
										<?php $obj_familia = $acc_familias->obtenerObjFamilia($obj_articulo->getIdFamilia()); ?>
										<?php $nombre_familia = $obj_familia->getNombre(); ?>
										<td><?php echo $nombre_familia; ?></td>
										<td><?php echo $obj_articulo->getDatosProducto(); ?></td>
										<?php if($obj_articulo->getStock() > $obj_articulo->getStockMinimo()): ?>
											<td class="stock_alto"><?php echo $obj_articulo->getStock(); ?></td>
										<?php else: ?>
											<td class="stock_bajo"><?php echo $obj_articulo->getStock(); ?></td>
										<?php endif; ?>
										<?php if($obj_articulo->getStock() < $obj_articulo->getStockMinimo()): ?>
			        						<td>
			        							<?php echo button_to(__('Hacer Pedido'),'pedidos/agregarPedido?id_md5_articulo='.$obj_articulo->getIdMd5Articulo().'&id_md5_proveedor='.$obj_proveedor->getIdMd5proveedor(),array('class'  => 'buttonEsqueleto')); ?>
			        						</td>
		        						<?php elseif($obj_articulo->getStock() < 5): ?>
		        							<td>
		        								<?php echo button_to(__('Hacer Pedido'),'pedidos/agregarPedido?id_md5_articulo='.$obj_articulo->getIdMd5Articulo().'&id_md5_proveedor='.$obj_proveedor->getIdMd5proveedor(),array('class'  => 'buttonEsqueleto')); ?>
		        							</td>
		        						<?php endif; ?>
									</tr>
	        					<?php endforeach; ?>		     						
		     				<?php else: ?>
		     					<tr>
		     						<td align='center' colspan = '6'><?php echo __("No hay ningún artículo para este proveedor."); ?></td>
		     					</tr>
		     				<?php endif; ?>									
        				</table>
        			</div> 
        		</div>
			</div>
			<div class="tabContent" id="c">
				<div class='info_ficha'>	        				
        			<div class='ficha_datos'>
        				<table class='tabla_ficha'> 
        					<tr>
        						<td>
        							<strong><?php echo __("Num Pedido"); ?></strong>
        						</td>
        						<td>
        							<strong><?php echo __("Estado Pedido"); ?></strong>
        						</td>
        						<td>
        							<strong><?php echo __("Fecha Pedido"); ?></strong>
        						</td>
        						<td colspan='3'>
        							<strong><?php echo __("Acciones"); ?></strong>
        						</td>
        					</tr>
        					<?php $ar_pedidos_x_proveedor = $acc_pedidos->obtenerPedidosXIdProveedor($obj_proveedor->getIdProveedor()); ?>
        					<?php if($ar_pedidos_x_proveedor): ?>
	        					<?php foreach($ar_pedidos_x_proveedor as $obj_pedidos_x_proveedor): ?>
	        						<tr>
		        						<td>
		        							<?php echo $obj_pedidos_x_proveedor->getNumPedido(); ?>
		        						</td>
		        						<?php $id_estado_pedido = $obj_pedidos_x_proveedor->getIdEstadoPedido();?>
		        						<?php $obj_estado_pedido = $acc_admin->obtenerObjEstadoPedido($id_estado_pedido); ?>
		        						<td>
		        							<?php echo $obj_estado_pedido->getEstadoPedido(); ?>
		        						</td>
		        						<td>
		        							<?php echo $obj_pedidos_x_proveedor->getCreatedAt(); ?>
		        						</td>					
										<?php if($id_estado_pedido == 1): ?>
											<td><?php echo link_to(image_tag('../images/borrar.png'),'/pedidos/borrarPedido?id_md5_pedido='.$obj_pedidos_x_proveedor->getIdMd5Pedido(), array('confirm' => '¿Est&aacute;s seguro?','title' => 'Cancelar pedido')); ?></td>
											<td><?php echo link_to(image_tag('../images/edit.png'),'/pedidos/editarPedido?id_md5_pedido='.$obj_pedidos_x_proveedor->getIdMd5Pedido(), 'title=Editar pedido'); ?></td>
											<td><?php echo link_to(image_tag('../images/ok.png'),'/pedidos/confirmarPedido?id_md5_pedido='.$obj_pedidos_x_proveedor->getIdMd5Pedido(), 'title=Confirmar pedido'); ?></td>
										<?php elseif($id_estado_pedido == 2): ?>
											<td><?php echo link_to(image_tag('../images/lupa.png'),'/pedidos/verPedido?id_md5_pedido='.$obj_pedidos_x_proveedor->getIdMd5Pedido(), 'title=Ver pedido'); ?></td>
											<td><?php echo link_to(image_tag('../images/pdf2.png'),'/pedidos/descargarInformePedido?id_md5_pedido='.$obj_pedidos_x_proveedor->getIdMd5Pedido(), 'title=Descargar informe'); ?></td>
											<td><?php echo link_to(image_tag('../images/right.png'),'/pedidos/confirmarPedidoRecibido?id_md5_pedido='.$obj_pedidos_x_proveedor->getIdMd5Pedido(), array('confirm' => 'El pedido se ha recibido en el almacén. ¿Confirmar?','title' => 'Confirmar Pedido Recibido')); ?></td>
										<?php elseif($id_estado_pedido == 3): ?>
											<td><?php echo link_to(image_tag('../images/lupa.png'),'/pedidos/verPedido?id_md5_pedido='.$obj_pedidos_x_proveedor->getIdMd5Pedido(), 'title=Ver pedido'); ?></td>
											<td><?php echo link_to(image_tag('../images/pdf2.png'),'/pedidos/descargarInformePedido?id_md5_pedido='.$obj_pedidos_x_proveedor->getIdMd5Pedido(), 'title=Descargar informe'); ?></td>
											<td><?php echo link_to(image_tag('../images/ojo.png'),'/pedidos/comprobarPedidoCompleto?id_md5_pedido='.$obj_pedidos_x_proveedor->getIdMd5Pedido(), 'title=Comprobar Pedido Completo'); ?></td>
										<?php else:?>
											<td><?php echo link_to(image_tag('../images/lupa.png'),'/pedidos/verPedidoCompleto?id_md5_pedido='.$obj_pedidos_x_proveedor->getIdMd5Pedido(), 'title=Ver pedido'); ?></td>
											<td></td>
											<td><?php echo link_to(image_tag('../images/pdf2.png'),'/pedidos/descargarInformePedido?id_md5_pedido='.$obj_pedidos_x_proveedor->getIdMd5Pedido(), 'title=Descargar informe'); ?></td>					
										<?php endif;?>	
	        						</tr>
	        					<?php endforeach; ?>		     						
		     				<?php else: ?>
		     					<tr>
		     						<td align='center' colspan = '5'><?php echo __("No hay ningún pedido para este proveedor."); ?></td>
		     					</tr>
		     				<?php endif; ?>
        				</table>
        			</div>
        		</div>
        	</div>
			<div class="tabContent" id="d">
				<div class='info_ficha'>	        				
        			<div class='ficha_datos'>
        				<table class='tabla_ficha'>
					        <tr>
					        	<td>
        							<strong><?php echo __("Nombre"); ?></strong>
        						</td>
        						<td>
        							<strong><?php echo __("Apellidos"); ?></strong>
        						</td>
        						<td>
        							<strong><?php echo __("Teléfono"); ?></strong>
        						</td>
        						<td>
        							<strong><?php echo __("Jefe"); ?></strong>
        						</td>        						
        						<td>
        							<strong><?php echo __("Puesto"); ?></strong>
        						</td>
        					</tr>	
        					<?php $ar_contactos_x_proveedor = $acc_contactos->obtenerContactosXIdProveedor($obj_proveedor->getIdProveedor()); ?>
        					<?php if($ar_contactos_x_proveedor): ?>        						
		     					<?php foreach($ar_contactos_x_proveedor as $contactos_x_proveedor): ?>
			     					<tr>
			     						<td><?php echo link_to($contactos_x_proveedor->getNombre(),'contactos/verContacto?id_md5_contacto='.$contactos_x_proveedor->getIdMd5Contacto()); ?></td>
										<td><?php echo $contactos_x_proveedor->getApellidos(); ?></td>
										<td><?php echo $contactos_x_proveedor->getTelefono(); ?></td>
										<?php $nombre_jefe = $acc_contactos->obtenerNombreJefeXIdJefe($contactos_x_proveedor->getIdJefe()); ?>
										<td><?php echo $nombre_jefe; ?></td>
										<td><?php echo $contactos_x_proveedor->getPuesto(); ?></td>
									</tr>
		     					<?php endforeach; ?>		     						
		     				<?php else: ?>
		     					<tr>
		     						<td align='center' colspan = '5'><?php echo __("No hay ningún contacto para este proveedor."); ?></td>
		     					</tr>
		     				<?php endif; ?>							
        				</table>
        			</div> 
        		</div>
			</div>
		</div>
	</div>
</div>