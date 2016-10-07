<!-- Ocultar y mostrar el contenido de un submenu cuando hacemos clic en un enlace -->
<?php echo javascript_tag("
  function mostrar_submenu(fila){
  status =document.getElementById(fila).style.display;
  if(status=='none'){
      document.getElementById(fila).style.display=\"table-row\";
   }else{
  	 document.getElementById(fila).style.display=\"none\";
   }
}

") ?>
<div id="subnavegacion">
	<div class='botonSubNav'><?php echo link_to(__('Agregar Pedido'),'/pedidos/index'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Administrar Pedidos'),'/pedidos/administrarPedidos'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Pedidos Pendientes'),'/pedidos/pedidosPendientes'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Pedidos En Proceso'),'/pedidos/pedidosEnProceso'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Pedidos Recibidos'),'/pedidos/pedidosRecibidos'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Pedidos Completos'),'/pedidos/pedidosCompletos'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Pedidos Procesados'),'/pedidos/pedidosProcesados'); ?></div>	
</div>
<div id="tituloPedido" >
	<?php echo __("Pedido '").$obj_pedido->getNumPedido()."' | ".$acc_fechas->cambiarFormatoFecha14($obj_pedido->getUpdatedAt()); ?>
	<?php if($obj_pedido->getIdEstadoPedido() == 2):?>
		<?php echo link_to(image_tag('../images/right.png'),'/pedidos/confirmarPedidoRecibido?id_md5_pedido='.$obj_pedido->getIdMd5Pedido(), array('confirm' => 'El pedido se ha recibido en el almacén. ¿Confirmar?','title' => 'Confirmar Pedido Recibido')); ?>
	<?php elseif($obj_pedido->getIdEstadoPedido() == 3):?>
		<?php echo link_to(image_tag('../images/ojo.png'),'/pedidos/comprobarPedidoCompleto?id_md5_pedido='.$obj_pedido->getIdMd5Pedido(), 'title=Comprobar Pedido Completo'); ?>
	<?php endif; ?>
</div>
<div id='ficha'>
	<div id="sidebar-tabs">
		<div id="mostPopWidget">
        	<div id="tabsContainer">
        		<ul class="tabs">
        			<li class="selected"><a href='#'><?php echo __("<strong>Datos Pedido</strong>"); ?></a></li>
        			<li><a href='#'><?php echo __("<strong>Informe Pedido</strong>"); ?></a></li>
        		</ul>
        	</div>
        	<div class="tabContent tabContentActive" id="a">
				<div class='info_ficha'>
					<div class='ficha_pedido_proveedor'>
			        	<table class='tabla_ficha'>
			        		<thead>
			        			<td colspan='2'><?php echo __("Datos Proveedor");?>
			        		</thead>
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
					<div class='ficha_pedido_articulos'>
						<table class='tabla_ficha'>
							<thead>
								<tr>
									<td></td>
									<td><?php echo __("Nombre"); ?></td>
									<td><?php echo __("Familia"); ?></td>
									<td><?php echo __("Datos"); ?></td>
									<td><?php echo __("Cantidad"); ?></td>
								</tr>
							</thead>
							<tr>
							<?php if(empty($ar_lineas_pedido)):?>
								<td colspan='5' align="center"><?php echo __("No se ha encontrado ningún artículo para el pedido."); ?></td></tr>
							<?php else: ?>
								<?php foreach($ar_lineas_pedido as $linea_pedido): ?>
									<?php $articulo = $acc_articulos->obtenerObjArticulo($linea_pedido->getIdArticulo()); ?>
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
									<td><?php echo $linea_pedido->getCantidad(); ?></td>								
								</tr>		
					 	 		<?php endforeach; ?>
					 	 	<?php endif; ?>
						</table>
					</div>
				</div>
			</div>
			<div class="tabContent" id="b">
				<div class='info_ficha'>	        				
        			<div class='ficha_informe_pedidos'>
        				<iframe src='<?php echo $ruta_informe_pedido ?>' style='width:940px;height:660px;border:none;'></iframe>;        			
        			</div>
        		</div>
			</div>
		</div>
	</div>
</div>