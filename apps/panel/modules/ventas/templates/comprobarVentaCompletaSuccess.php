<!-- para marcar todos los emails --> 
<?php echo javascript_tag("
  function seleccionar_todo(form)  
{    
	for(i=0; i<form.elements.length; i++){
		 if((form.elements[i].type== \"checkbox\")&&(form.check_all.checked == true))
	     {
	     	form.elements[i].checked=true;
	     }
	     else
	     {
	     	form.elements[i].checked=false;	     
	     }
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
<div id="tituloTabla">
  <?php echo __("Comprobando Venta '").$obj_venta->getNumVenta()."' | ".$acc_fechas->cambiarFormatoFecha14($obj_venta->getUpdatedAt()); ?>
</div>
<?php if(!isset($msg)): ?>
	<?php echo form_tag('/ventas/comprobarVentaCompleta'); ?>
	<table class='centrarTablas'>
		<thead>
			<tr>
				<td><?php echo __("Nombre"); ?></td>
				<td><?php echo __("CIF/NIF"); ?></td>
				<td><?php echo __("Dirección"); ?></td>
				<td><?php echo __("Población"); ?></td>
				<td><?php echo __("Provincia"); ?></td>
				<td><?php echo __("CP"); ?></td>
				<td><?php echo __("Pais"); ?></td>
				<td><?php echo __("Teléfono"); ?></td>
				<td><?php echo __("Móvil"); ?></td>
				<td><?php echo __("Fax"); ?></td>
				<td><?php echo __("Email"); ?></td>
				<td><?php echo __("Web"); ?></td>
			</tr>
		</thead>
		<tr>
			<td><?php echo $obj_cliente->getNombre(); ?></td>
			<td><?php echo $obj_cliente->getCifNif(); ?></td>
			<td><?php echo $obj_cliente->getDireccion(); ?></td>
			<td><?php echo $obj_cliente->getPoblacion(); ?></td>
			<td>
				<?php if($obj_cliente->getProvincia()): ?>
					<?php echo $ar_provincias[$obj_cliente->getProvincia()]; ?>
				<?php endif; ?>
			</td>
			<td><?php echo $obj_cliente->getCP(); ?></td>
			<td><?php echo format_country($obj_cliente->getPais()); ?></td>
			<td><?php echo $obj_cliente->getTelefono(); ?></td>
			<td><?php echo $obj_cliente->getMovil(); ?></td>
			<td><?php echo $obj_cliente->getFax(); ?></td>
			<td><?php echo $obj_cliente->getEmail(); ?></td>
			<td><?php echo $obj_cliente->getWeb(); ?></td>	
		</tr>
	</table>
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
				<td width='15' align='center'>
					<?php echo checkbox_tag('check_all', 1,0,array('onclick' => 'seleccionar_todo(this.form)'));?>
				</td>	
			</tr>
		</thead>
		<tbody>
			<?php if($ar_lineas_venta): ?>
				<?php foreach($ar_lineas_venta as $linea_venta): ?>
					<?php $obj_articulo = $acc_articulos->obtenerObjArticulo($linea_venta->getIdArticulo()); ?>
					<tr>
						<?php if ($obj_articulo->getImagen() != ''): ?>
							<?php $imagen_tam = getimagesize(sfConfig::get('app_imagen_articulos').'/'.$obj_articulo->getImagen()); ?>
							<td align="center" style="padding:5px;"><?php echo image_tag('articulos/'.$obj_articulo->getImagen(),array('size' => '20x'.($imagen_tam[1]*20)/$imagen_tam[0])); ?></td>
						<?php else: ?>
							<td align="center" style="padding:5px;"><?php echo image_tag('no_image.jpg',array('size' => '20x20')); ?></td>
						<?php endif; ?>
						<td><?php echo $obj_articulo->getNombre(); ?></td>
						<td><?php echo $obj_articulo->getDatosProducto(); ?></td>
						<td><?php echo $linea_venta->getCantidad(); ?></td>				
						<td><?php echo checkbox_tag('id_linea_venta['.$linea_venta->getIdArticuloXVenta().']',$linea_venta->getIdArticuloXVenta(),isset($ar_lineas_venta_completo[$linea_venta->getIdArticuloXVenta()])) ?></td>
					</tr>
				<?php endforeach; ?>
			<?php else: ?>
				<tr><td colspan='5' align="center"><?php echo __("No hay artículos en la venta."); ?></td></tr>
			<?php endif; ?>
		</tbody>
	</table>
	<?php echo input_hidden_tag('id_md5_venta',$id_md5_venta);?>
	<?php echo button_to(__('Cancelar'),'/ventas/ventasEnviadas',array('class' => 'buttonEsqueleto2')); ?>
	<?php echo submit_tag(__('Venta Completa'),array('class' => 'buttonEsqueleto2')) ?>
	</form>
<?php else: ?>
	<table class='centrarTablas'>
		<thead>
			<tr>
				<td colspan='2'><?php echo __("Comprobar Venta Completa"); ?></td>
			</tr>
		</thead>
		<tr><td align='center' colspan='2'><?php echo $msg; ?></td></tr>
		<?php if($contador_lineas_venta == $contador_lineas_venta_completas): ?>
			<tr>
				<td><?php echo button_to(__('Volver'),'/ventas/ventasEnviadas',array('class' => 'buttonEsqueleto2')); ?></td>
				<td><?php echo button_to(__('Procesar Venta'),'salidas/procesarSalida?id_md5_venta='.$id_md5_venta,array('class' => 'buttonEsqueleto2')); ?></td>
			</tr>
		<?php else: ?>
			<tr>
				<td colspan='2'><?php echo button_to(__('Volver'),'/ventas/ventasEnviadas',array('class' => 'buttonEsqueleto2')); ?></td>
			</tr>		
		<?php endif;?>
	</table>
<?php endif; ?>