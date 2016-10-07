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
	<div class='botonSubNav'><?php echo link_to(__('Agregar Venta'),'/ventas/index'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Administrar Ventas'),'/ventas/administrarVentas'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Ventas Pendientes'),'/ventas/ventasPendientes'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Ventas En Proceso'),'/ventas/ventasEnProceso'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Ventas Enviadas'),'/ventas/ventasEnviadas'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Ventas Completas'),'/ventas/ventasCompletas'); ?></div>	
	<div class='botonSubNav'><?php echo link_to(__('Ventas Procesadas'),'/ventas/ventasProcesadas'); ?></div>
</div>
<div id="tituloVenta" >
	<?php echo __("Venta '").$obj_venta->getNumVenta()."' | ".$acc_fechas->cambiarFormatoFecha14($obj_venta->getCreatedAt()); ?>
	<?php if($obj_venta->getIdEstadoVenta() == 2):?>
		<?php echo link_to(image_tag('../images/right.png'),'/ventas/confirmarVentaEnviada?id_md5_venta='.$obj_venta->getIdMd5Venta(), array('confirm' => 'La venta se va a enviar al almacén. ¿Confirmar?','title' => 'Confirmar Venta Enviada')); ?>
	<?php elseif($obj_venta->getIdEstadoVenta() == 3):?>
		<?php echo link_to(image_tag('../images/ojo.png'),'/ventas/comprobarVentaCompleta?id_md5_venta='.$obj_venta->getIdMd5Venta(), 'title=Comprobar Venta Completa'); ?>
	<?php endif; ?>	
</div>
<div id='ficha'>
	<div id="sidebar-tabs">
		<div id="mostPopWidget">
        	<div id="tabsContainer">
        		<ul class="tabs">
        			<li class="selected"><a href='#'><?php echo __("<strong>Datos Venta</strong>"); ?></a></li>
        			<li><a href='#'><?php echo __("<strong>Informe Venta</strong>"); ?></a></li>
        		</ul>
        	</div>
        	<div class="tabContent tabContentActive" id="a">
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
			<div class="tabContent" id="b">
				<div class='info_ficha'>	        				
        			<div class='ficha_informe_ventas'>
        				<iframe src='<?php echo $ruta_informe_venta ?>' style='width:940px;height:660px;border:none;'></iframe>;        			
        			</div>
        		</div>
			</div>
		</div>
	</div>
</div>