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
		<?php if(!empty($ar_lineas_venta)): ?>	
			<?php echo link_to(image_tag('../images/ok.png'),'/ventas/generarVenta?id_md5_venta='.$obj_venta->getIdMd5Venta(), 'title=Confirmar venta'); ?>
		<?php endif; ?>
		<?php echo link_to(image_tag('../images/edit.png'),'/ventas/editarVenta?id_md5_venta='.$obj_venta->getIdMd5Venta(),'title=Editar venta'); ?>
		<?php echo link_to(image_tag('../images/borrar.png'),'/ventas/borrarVenta?id_md5_venta='.$obj_venta->getIdMd5Venta(),array('confirm' => '¿Est&aacute;s seguro?','title' => 'Cancelar venta')); ?>
	</div>
</div>
<div id='ficha'>
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