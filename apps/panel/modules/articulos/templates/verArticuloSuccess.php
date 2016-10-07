<div id="subnavegacion">
	<div class='botonSubNav'><?php echo link_to(__('Artículos'),'/articulos/index'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Familias'),'/familias/index'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Ubicaciones'),'/ubicaciones/index'); ?></div>
</div>
<?php if (!isset($msg)): ?>
	<div id="tituloTabla" >
		<?php echo __("VER ARTÍCULO ".$obj_articulo->getNombre()); ?>
	</div>
	<div id='ficha'>
		<div id="sidebar-tabs">
			<div id="mostPopWidget">
	        	<div id="tabsContainer">
	        		<ul class="tabs">
	        			<li class="selected"><a href='#'><?php echo __("<strong>Artículo</strong>"); ?></a></li>
	        			<li><a href='#'><?php echo __("<strong>Inventario</strong>"); ?></a></li>
	        			<li><a href='#'><?php echo __("<strong>Ubicación</strong>"); ?></a></li>
	        			<li><a href='#'><?php echo __("<strong>Proveedores</strong>"); ?></a></li>
	        		</ul>
	        	</div>	        	
        		<div class="tabContent tabContentActive" id="a">
	        		<div class='info_ficha'>
		        		<div style="float:left; margin-bottom:20px;">
		        			<?php echo button_to(__('Editar Producto'),'articulos/editarArticulo?id_md5_articulo='.$obj_articulo->getIdMd5Articulo(),array('class'  => 'buttonEsqueleto')); ?>
		        			<br /><br /><br />						
							<?php if ($obj_articulo->getImagen() != ''): ?>
								<?php $imagen_tam = getimagesize(sfConfig::get('app_imagen_articulos').'/'.$obj_articulo->getImagen()); ?>
								<td align="center" style="padding:5px;"><?php echo link_to(image_tag('articulos/'.$obj_articulo->getImagen(),array('size' => '200x'.($imagen_tam[1]*200)/$imagen_tam[0])),'articulos/verArticulo?id_md5_articulo='.$obj_articulo->getIdMd5Articulo()); ?></td>
							<?php else: ?>
								<td align="center" style="padding:5px;"><?php echo link_to(image_tag('no_image.jpg',array('size' => '200x200')),'articulos/verArticulo?id_producto='.$obj_articulo->getIdMd5Articulo()); ?></td>
							<?php endif; ?>	
						</div>					
	        			<div class='ficha_datos'>
	        				<table class='tabla_ficha'>
	        					<tr>
	        						<td>
	        							<strong><?php echo __("Nombre"); ?></strong>
	        						</td>
	        						<td>
	        							<?php echo $obj_articulo->getNombre(); ?>
	        						</td>
	        					</tr>
	        					<tr>
	        						<td>
	        							<strong><?php echo __("Familia"); ?></strong>
	        						</td>
	        						<td>
	        							<?php $obj_familia = $acc_familias->obtenerObjFamilia($obj_articulo->getIdFamilia()); ?>
	        							<?php echo $obj_familia->getNombre(); ?>
	        						</td>
	        					</tr>
	        					<tr>
	        						<td>
	        							<strong><?php echo __("Datos Producto"); ?></strong>
	        						</td>
	        						<td>
	        							<?php echo $obj_articulo->getDatosProducto(); ?>
	        						</td>
	        					</tr>
	        					<tr>
	        						<td>
	        							<strong><?php echo __("Descripción"); ?></strong>
	        						</td>
	        						<td>
	        							<?php echo $obj_articulo->getDescripcion(); ?>
	        						</td>
	        					</tr>
	        				</table>
	        			</div> 
	        		</div>
	       		</div>
				<div class="tabContent" id="b">
					<div class='info_ficha'>
		        		<div style="float:left; margin-bottom:20px;">
		        			<?php echo button_to(__('Editar Producto'),'articulos/editarArticulo?id_md5_articulo='.$obj_articulo->getIdMd5Articulo(),array('class'  => 'buttonEsqueleto')); ?>
		        			<br /><br /><br />									
							<?php if ($obj_articulo->getImagen() != ''): ?>
								<?php $imagen_tam = getimagesize(sfConfig::get('app_imagen_articulos').'/'.$obj_articulo->getImagen()); ?>
								<td align="center" style="padding:5px;"><?php echo link_to(image_tag('articulos/'.$obj_articulo->getImagen(),array('size' => '200x'.($imagen_tam[1]*200)/$imagen_tam[0])),'articulos/verArticulo?id_md5_articulo='.$obj_articulo->getIdMd5Articulo()); ?></td>
							<?php else: ?>
								<td align="center" style="padding:5px;"><?php echo link_to(image_tag('no_image.jpg',array('size' => '200x200')),'articulos/verArticulo?id_producto='.$obj_articulo->getIdMd5Articulo()); ?></td>
							<?php endif; ?>	
						</div>					
	        			<div class='ficha_datos'>
	        				<table class='tabla_ficha'>
	        					<tr>
	        						<td>
	        							<strong><?php echo __("Stock"); ?></strong>
	        						</td>
        							<?php if($obj_articulo->getStock() > $obj_articulo->getStockMinimo()): ?>
										<td class="stock_alto"><?php echo $obj_articulo->getStock(); ?></td>		
									<?php else: ?>
										<td class="stock_bajo"><?php echo $obj_articulo->getStock(); ?></td>
									<?php endif; ?>
	        					</tr>
	        					<tr>
	        						<td>
	        							<strong><?php echo __("Stock Mínimo"); ?></strong>
	        						</td>
	        						<td>
	        							<?php if($obj_articulo->getAvisoMinimo()): ?>
	        								<?php echo $obj_articulo->getStockMinimo(); ?>
	        							<?php else: ?>
	        								<?php echo "No tiene aviso de stock mínimo."; ?>
	        							<?php endif; ?>
	        						</td>
	        					</tr>
	        					<?php if($obj_articulo->getStock() < $obj_articulo->getStockMinimo()): ?>
		        					<tr>
		        						<td>
		        							<strong><?php echo __("Este artículo se encuentra bajo de existencias"); ?></strong>
		        						</td>
		        						<td>
		        							<?php echo button_to(__('Hacer Pedido'),'pedidos/index?id_md5_articulo='.$obj_articulo->getIdMd5Articulo(),array('class'  => 'buttonEsqueleto')); ?>
		        						</td>
		        					</tr>
	        					<?php elseif($obj_articulo->getStock() < 5): ?>
	        					<tr>
	        						<td>
	        							<?php echo button_to(__('Hacer Pedido'),'pedidos/index?id_md5_articulo='.$obj_articulo->getIdMd5Articulo(),array('class'  => 'buttonEsqueleto')); ?>
	        						</td>
	        						<td>
	        							<strong><?php echo __("Este artículo se encuentra bajo de existencias"); ?></strong>
	        						</td>
	        					</tr>
		        				<?php endif; ?>
	        				</table>
	        			</div> 
	        		</div>
				</div>
				<div class="tabContent" id="c">
					<div class='info_ficha'>
		        		<div style="float:left; margin-bottom:20px;">
		        			<?php echo button_to(__('Editar Producto'),'articulos/editarArticulo?id_md5_articulo='.$obj_articulo->getIdMd5Articulo(),array('class'  => 'buttonEsqueleto')); ?>
		        			<br /><br /><br />									
							<?php if ($obj_articulo->getImagen() != ''): ?>
								<?php $imagen_tam = getimagesize(sfConfig::get('app_imagen_articulos').'/'.$obj_articulo->getImagen()); ?>
								<td align="center" style="padding:5px;"><?php echo link_to(image_tag('articulos/'.$obj_articulo->getImagen(),array('size' => '200x'.($imagen_tam[1]*200)/$imagen_tam[0])),'articulos/verArticulo?id_md5_articulo='.$obj_articulo->getIdMd5Articulo()); ?></td>
							<?php else: ?>
								<td align="center" style="padding:5px;"><?php echo link_to(image_tag('no_image.jpg',array('size' => '200x200')),'articulos/verArticulo?id_producto='.$obj_articulo->getIdMd5Articulo()); ?></td>
							<?php endif; ?>	
						</div>					
	        			<div class='ficha_datos'>
	        				<table class='tabla_ficha'>
						        <tr>
						        	<td>
	        							<strong><?php echo __("LOTE"); ?></strong>
	        						</td>
	        						<td>
	        							<strong><?php echo __("UBICACIÓN"); ?></strong>
	        						</td>
	        					</tr>	        					
								<?php $ar_ubicaciones_x_articulo = $acc_articulos->obtenerUbicacionesXIdArticulo($obj_articulo->getIdArticulo()); ?>				       
						        <?php if($ar_ubicaciones_x_articulo): ?>
									<?php foreach ($ar_ubicaciones_x_articulo as $ubicaciones_x_articulo): ?>
										<?php $obj_ubicacion = $acc_ubicaciones->obtenerObjUbicacion($ubicaciones_x_articulo->getIdUbicacion());?>
										<tr>
											<td><?php echo $ubicaciones_x_articulo->getLote(); ?></td>
											<td><?php echo link_to($obj_ubicacion->getNombre(),'ubicaciones/verUbicacion?id_md5_ubicacion='.$obj_ubicacion->getIdMd5Ubicacion()); ?></td>
										</tr>
									<?php endforeach;?>
								<?php endif; ?>
	        				</table>
	        			</div> 
	        		</div>
				</div>
				<div class="tabContent" id="d">
					<div class='info_ficha'>
		        		<div style="float:left; margin-bottom:20px;">
		        			<?php echo button_to(__('Editar Producto'),'articulos/editarArticulo?id_md5_articulo='.$obj_articulo->getIdMd5Articulo(),array('class'  => 'buttonEsqueleto')); ?>
		        			<br /><br /><br />									
							<?php if ($obj_articulo->getImagen() != ''): ?>
								<?php $imagen_tam = getimagesize(sfConfig::get('app_imagen_articulos').'/'.$obj_articulo->getImagen()); ?>
								<td align="center" style="padding:5px;"><?php echo link_to(image_tag('articulos/'.$obj_articulo->getImagen(),array('size' => '200x'.($imagen_tam[1]*200)/$imagen_tam[0])),'articulos/verArticulo?id_md5_articulo='.$obj_articulo->getIdMd5Articulo()); ?></td>
							<?php else: ?>
								<td align="center" style="padding:5px;"><?php echo link_to(image_tag('no_image.jpg',array('size' => '200x200')),'articulos/verArticulo?id_producto='.$obj_articulo->getIdMd5Articulo()); ?></td>
							<?php endif; ?>	
						</div>					
	        			<div class='ficha_datos'>
	        				<table class='tabla_ficha'>
						        <tr>
						        	<td>
	        							<strong><?php echo __("Proveedor"); ?></strong>
	        						</td>
	        						<td>
	        							<strong><?php echo __("Dirección"); ?></strong>
	        						</td>
	        						<td>
	        							<strong><?php echo __("Teléfono"); ?></strong>
	        						</td>
	        					</tr>	    
	        					<?php $ar_proveedores_x_articulo = $acc_articulos->obtenerProveedoresXIdArticulo($obj_articulo->getIdArticulo()); ?>
								<?php if($ar_proveedores_x_articulo):?>
									<?php foreach ($ar_proveedores_x_articulo as $proveedores_x_articulo): ?>
										<?php $obj_proveedor = $acc_proveedores->obtenerObjProveedor($proveedores_x_articulo->getIdProveedor());?>
										<tr>
											<td><?php echo link_to($obj_proveedor->getNombre(),'proveedores/verProveedor?id_md5_proveedor='.$obj_proveedor->getIdMd5Proveedor()); ?></td>
											<td><?php echo $obj_proveedor->getDireccion(); ?></td>
											<td><?php echo $obj_proveedor->getTelefono(); ?></td>
										</tr>
									<?php endforeach;?>
								<?php endif; ?>								
	        				</table>
	        			</div> 
	        		</div>
				</div>
			</div>
		</div>
	</div>
<?php else: ?>
	<table class='centrarTablas'>
		<thead>
			<tr>
				<td colspan='2'><?php echo __("VER ARTÍCULO"); ?></td>
			</tr>
		</thead>
		<tr><td align='center' colspan='2'><?php echo $msg; ?></td></tr>
		<tr>
			<td><?php echo button_to('Volver','articulos/index',array('class' => 'buttonEsqueleto2')); ?></td></tr>
	</table>
<?php endif; ?>