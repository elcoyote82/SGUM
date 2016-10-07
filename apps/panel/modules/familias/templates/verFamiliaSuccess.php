<div id="subnavegacion">
	<div class='botonSubNav'><?php echo link_to(__('Familias'),'/familias/index'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Agregar Familia'),'/familias/agregarFamilia'); ?></div>
</div>
<?php if (!isset($msg)): ?>
	<div id="tituloTabla" >
		<?php echo __("VER FAMILIA '".$obj_familia->getNombre()."'"); ?>
	</div>
	<div id='ficha'>
		<div id="sidebar-tabs">
			<div id="mostPopWidget">
	        	<div id="tabsContainer">
	        		<ul class="tabs">
	        			<li class="selected"><a href='#'><?php echo __("<strong>Familia</strong>"); ?></a></li>
	        		</ul>
	        	</div>
	        	<div class='info_ficha'>
	        			<div class='ficha_informe_ventas'>
	        				<table class='tabla_ficha'>
	        					<tr>
	        						<td></td>
	        						<td>
	        							<strong><?php echo __("Artículo"); ?></strong>
	        						</td>
									<td><strong><?php echo __("Datos"); ?></strong></td>
									<td><strong><?php echo __("Stock"); ?></strong></td>
									<td><strong><?php echo __("Ubicaciones"); ?></strong></td>
									<td><strong><?php echo __("Proveedores"); ?></strong></td>
	        					</tr>	      				       
						        <?php if($ar_articulos): ?>
									<?php foreach ($ar_articulos as $obj_articulo): ?>
										<tr>											
											<?php if ($obj_articulo->getImagen() != ''): ?>
												<?php $imagen_tam = getimagesize(sfConfig::get('app_imagen_articulos').'/'.$obj_articulo->getImagen()); ?>
												<td align="center" style="padding:5px;"><?php echo link_to(image_tag('articulos/'.$obj_articulo->getImagen(),array('size' => '30x'.($imagen_tam[1]*30)/$imagen_tam[0])),'articulos/verArticulo?id_md5_articulo='.$obj_articulo->getIdMd5Articulo()); ?></td>
											<?php else: ?>
												<td align="center" style="padding:5px;"><?php echo link_to(image_tag('no_image.jpg',array('size' => '30x30')),'articulos/verArticulo?id_md5_articulo='.$obj_articulo->getIdMd5Articulo()); ?></td>
											<?php endif; ?>			
											<td><?php echo $obj_articulo->getNombre(); ?></td>
											<td><?php echo $obj_articulo->getDatosProducto(); ?></td>	
											<?php if($obj_articulo->getStock() > $obj_articulo->getStockMinimo()): ?>
												<td class="stock_alto"><?php echo $obj_articulo->getStock(); ?></td>		
											<?php else: ?>
												<td class="stock_bajo"><?php echo $obj_articulo->getStock(); ?></td>
											<?php endif; ?>
											<?php $ar_ubicaciones_x_articulo = $acc_articulos->obtenerUbicacionesXIdArticulo($obj_articulo->getIdArticulo()); ?>
											<td>
												<?php if($ar_ubicaciones_x_articulo):?>
													<?php foreach ($ar_ubicaciones_x_articulo as $ubicaciones_x_articulo): ?>
														<?php $obj_ubicacion = $acc_ubicaciones->obtenerObjUbicacion($ubicaciones_x_articulo->getIdUbicacion());?>
														<?php echo link_to($obj_ubicacion->getNombre(),'ubicaciones/verUbicacion?id_md5_ubicacion='.$obj_ubicacion->getIdMd5Ubicacion()); ?><br />
													<?php endforeach;?>
												<?php endif; ?>
											</td>
											<?php $ar_proveedores_x_articulo = $acc_articulos->obtenerProveedoresXIdArticulo($obj_articulo->getIdArticulo()); ?>
											<td align='left'>
												<?php if($ar_proveedores_x_articulo):?>
													<?php foreach ($ar_proveedores_x_articulo as $proveedores_x_articulo): ?>
														<?php $obj_proveedor = $acc_proveedores->obtenerObjProveedor($proveedores_x_articulo->getIdProveedor());?>
														<?php echo link_to($obj_proveedor->getNombre(),'proveedores/verProveedor?id_md5_proveedor='.$obj_proveedor->getIdMd5Proveedor()); ?><br />
													<?php endforeach;?>
												<?php endif; ?>
											</td>
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
				<td colspan='2'><?php echo __("VER UBICACIÓN"); ?></td>
			</tr>
		</thead>
		<tr><td align='center' colspan='2'><?php echo $msg; ?></td></tr>
		<tr>
			<td><?php echo button_to('Volver','ubicaciones/index',array('class' => 'buttonEsqueleto2')); ?></td></tr>
	</table>
<?php endif; ?>