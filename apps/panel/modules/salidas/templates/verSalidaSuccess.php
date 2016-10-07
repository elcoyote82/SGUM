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
	<div class='botonSubNav'><?php echo link_to(__('Administrar Salidas'),'/salidas/index'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Salidas Pendientes'),'/salidas/salidasPendientes'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Salidas Procesadas'),'/salidas/salidasProcesadas'); ?></div>	
</div>
<div id="tituloVenta" >
	<?php echo __("Salida '").$obj_salida->getNumSalida()."' | ".$acc_fechas->cambiarFormatoFecha14($obj_salida->getUpdatedAt())." | ". __("Venta '").$obj_venta->getNumVenta()."' | ".$acc_fechas->cambiarFormatoFecha14($obj_venta->getUpdatedAt()); ?>
	<?php if($obj_salida->getIdEstadoSalida() == 1): ?>
		<?php echo link_to(image_tag('../images/right.png'),'/salidas/procesarSalida?id_md5_salida='.$obj_salida->getIdMd5Salida(), 'title=Procesar Salida'); ?>
	<?php endif; ?>
</div>
<div id='ficha'>
	<div id="sidebar-tabs">
		<div id="mostPopWidget">
        	<div id="tabsContainer">
        		<ul class="tabs">
        			<li class="selected"><a href='#'><?php echo __("<strong>Datos Salida</strong>"); ?></a></li>
        			<li><a href='#'><?php echo __("<strong>Informe Salida</strong>"); ?></a></li>
        			<li><a href='#'><?php echo __("<strong>Datos Venta</strong>"); ?></a></li>
        			<li><a href='#'><?php echo __("<strong>Informe Venta</strong>"); ?></a></li>
        		</ul>
        	</div>			
        	<div class="tabContent tabContentActive" id="a">
				<div class='info_ficha'>
					<div class='ficha_venta_cliente'>
			        	<table class='tabla_ficha'>
			        		<thead>
			        			<td colspan='2'><?php echo __("Datos Conductor");?>
			        		</thead>
			        		<tr>
			        			<td>
			        				<?php echo "<strong>Nombre</strong>"; ?>
			        			</td>
			        			<td>
			        				<?php echo $obj_transporte_conductor->getNombre(); ?>
			        			</td>
			        		</tr>
							<tr>
								<td>
									<?php echo "<strong>Apellidos</strong>"; ?>
								</td>
								<td>
									<?php echo $obj_transporte_conductor->getApellidos(); ?>
								</td>
							</tr>
							<tr>
								<td>
									<?php echo "<strong>Teléfono</strong>"; ?>
								</td>
								<td>
									<?php echo $obj_transporte_conductor->getTelefono(); ?>
								</td>
							</tr>
							<tr>
								<td>
									<?php echo "<strong>Móvil</strong>"; ?>
								</td>
								<td>
									<?php echo $obj_transporte_conductor->getMovil(); ?>
								</td>
							</tr>
							<tr>
								<td>
									<?php echo "<strong>Observaciones</strong>"; ?>
								</td>
								<td>
									<?php echo $obj_transporte_conductor->getObservaciones(); ?>
								</td>
							</tr>
						</table>
						<table class='tabla_ficha'>
			        		<thead>
			        			<td colspan='2'><?php echo __("Datos Empresa");?>
			        		</thead>
							<tr>
        						<td>
        							<?php echo "<strong>Nombre</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_transporte_empresa->getNombre(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>CIF/NIF</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_transporte_empresa->getCifNif(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>Dirección</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_transporte_empresa->getDireccion(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>Población</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_transporte_empresa->getPoblacion(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>Provincia</strong>"; ?>
        						</td>
        						<td>
        							<?php if($obj_transporte_empresa->getProvincia()):	?>
        								<?php echo $ar_provincias[$obj_transporte_empresa->getProvincia()]; ?>
        							<?php else: ?>
        								<?php echo "";?>
        							<?php endif; ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>CP</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_transporte_empresa->getCP(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>Pais</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_transporte_empresa->getPais(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>Teléfono</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_transporte_empresa->getTelefono(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>Móvil</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_transporte_empresa->getMovil(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>Fax</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_transporte_empresa->getFax(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>Email</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_transporte_empresa->getEmail(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>Web</strong>"; ?>
        						</td>
        						<td>
        							<?php echo link_to($obj_transporte_empresa->getWeb(),"http://".$obj_transporte_empresa->getWeb(),'target=_blank'); ?>
        						</td>
        					</tr>
						</table>
					</div>
					<div class='ficha_venta_articulos'>
						<table class='tabla_ficha'>
							<thead>
								<tr>
									<td></td>
									<td><?php echo __("Nombre"); ?></td>
									<td><?php echo __("Familia"); ?></td>
									<td><?php echo __("Datos"); ?></td>
									<td><?php echo __("Lote"); ?></td>
									<td><?php echo __("Ubicación"); ?></td>
								</tr>
							</thead>
							<tr>
							<?php if(empty($ar_lineas_salida)):?>
								<td colspan='5' align="center"><?php echo __("Todavía no han procesado la salida de mercancias para el venta."); ?></td></tr>
							<?php else: ?>
								<?php foreach($ar_lineas_salida as $linea_salida): ?>
									<?php $articulo = $acc_articulos->obtenerObjArticulo($linea_salida->getIdArticulo()); ?>
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
									<td><?php echo $linea_salida->getLote(); ?></td>
									<td><?php echo $acc_ubicaciones->obtenerNombreUbicacionXIdUbicacion($linea_salida->getIdUbicacion()); ?></td>								
								</tr>		
					 	 		<?php endforeach; ?>
					 	 	<?php endif; ?>
						</table>
					</div>
				</div>
			</div>			
			<div class="tabContent" id="b">
				<div class='info_ficha'>	        				
        			<div class='ficha_informe_ventas'>
        				<?php if(!$mostrar_informe_salida):?>
		        			<table class='tabla_ficha'>
								<thead>
									<tr>
										<td><?php echo __("Informe Salida"); ?></td>
									</tr>
								</thead>
								<tr>								
									<td align="center"><?php echo __("No se ha generado todavía ningún informe de salida para el venta."); ?></td>
								</tr>
							</table>
						<?php else: ?>
        					<iframe src='<?php echo $ruta_informe_salida ?>' style='width:940px;height:660px;border:none;'></iframe>;
        				<?php endif; ?>        			
        			</div>
        		</div>
			</div>
        	<div class="tabContent" id="c">
				<div class='info_ficha'>
					<div class='ficha_venta_cliente'>
			        	<table class='tabla_ficha'>
			        		<thead>
			        			<td colspan='2'><?php echo __("Datos Cliente");?>
			        		</thead>
			        		<tr>
			        			<td>
			        				<?php echo "<strong>Nombre</strong>"; ?>
			        			</td>
			        			<td>
			        				<?php echo $obj_cliente->getNombre(); ?>
			        			</td>
			        		</tr>
							<tr>
								<td>
									<?php echo "<strong>CIF/NIF</strong>"; ?>
								</td>
								<td>
									<?php echo $obj_cliente->getCifNif(); ?>
								</td>
							</tr>
							<tr>
								<td>
									<?php echo "<strong>Dirección</strong>"; ?>
								</td>
								<td>
									<?php echo $obj_cliente->getDireccion(); ?>
								</td>
							</tr>
							<tr>
								<td>
									<?php echo "<strong>Población</strong>"; ?>
								</td>
								<td>
									<?php echo $obj_cliente->getPoblacion(); ?>
								</td>
							</tr>
							<tr>
								<td>
									<?php echo "<strong>Provincia</strong>"; ?>
								</td>
								<td>
									<?php if($obj_cliente->getProvincia()): ?>
										<?php echo $ar_provincias[$obj_cliente->getProvincia()]; ?>
									<?php endif; ?>
								</td>
							</tr>
							<tr>
								<td>
									<?php echo "<strong>CP</strong>"; ?>
								</td>
								<td>
									<?php echo $obj_cliente->getCP(); ?>
								</td>
							</tr>
			        		<tr>
								<td>
									<?php echo "<strong>Pais</strong>"; ?>
								</td>
								<td>
									<?php echo format_country($obj_cliente->getPais()); ?>
								</td>
							</tr>
							<tr>
								<td>
									<?php echo "<strong>Teléfono</strong>"; ?>
								</td>
								<td>
									<?php echo $obj_cliente->getTelefono(); ?>
								</td>
							</tr>
							<tr>
								<td>
									<?php echo "<strong>Móvil</strong>"; ?>
								</td>
								<td>
									<?php echo $obj_cliente->getMovil(); ?>
								</td>
							</tr>
							<tr>
								<td>
									<?php echo "<strong>Fax</strong>"; ?>
								</td>
								<td>
									<?php echo $obj_cliente->getFax(); ?>
								</td>
							</tr>
							<tr>
								<td>
									<?php echo "<strong>Email</strong>"; ?>
								</td>
								<td>
									<?php echo $obj_cliente->getEmail(); ?>
								</td>
							</tr>
							<tr>
								<td>
									<?php echo "<strong>Web</strong>"; ?>
								</td>
								<td>
									<?php echo $obj_cliente->getWeb(); ?>
								</td>
							</tr>
						</table>
					</div>
					<div class='ficha_venta_articulos'>
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
							<?php if(empty($ar_lineas_venta)):?>
								<td colspan='5' align="center"><?php echo __("No se ha encontrado ningún artículo para el venta."); ?></td></tr>
							<?php else: ?>
								<?php foreach($ar_lineas_venta as $linea_venta): ?>
									<?php $articulo = $acc_articulos->obtenerObjArticulo($linea_venta->getIdArticulo()); ?>
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
									<td><?php echo $linea_venta->getCantidad(); ?></td>								
								</tr>		
					 	 		<?php endforeach; ?>
					 	 	<?php endif; ?>
						</table>
					</div>
				</div>
			</div>
			<div class="tabContent" id="d">
				<div class='info_ficha'>	        				
        			<div class='ficha_informe_ventas'>	
        				<?php if(!$mostrar_informe_venta):?>
		        			<table class='tabla_ficha'>
								<thead>
									<tr>
										<td></td>
										<td><?php echo __("Informe Venta"); ?></td>
									</tr>
								</thead>
								<tr>								
									<td align="center"><?php echo __("No se ha generado todavía ningún informe de venta."); ?></td>
								</tr>
							</table>
						<?php else: ?>
        					<iframe src='<?php echo $ruta_informe_venta ?>' style='width:940px;height:660px;border:none;'></iframe>;
        				<?php endif; ?>        			
        			</div>
        		</div>
			</div>
		</div>
	</div>
</div>