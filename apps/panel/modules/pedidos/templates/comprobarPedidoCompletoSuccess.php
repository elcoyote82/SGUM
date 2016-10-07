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
	<div class='botonSubNav'><?php echo link_to(__('Agregar Pedido'),'/pedidos/index'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Administrar Pedidos'),'/pedidos/administrarPedidos'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Pedidos Pendientes'),'/pedidos/pedidosPendientes'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Pedidos En Proceso'),'/pedidos/pedidosEnProceso'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Pedidos Recibidos'),'/pedidos/pedidosRecibidos'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Pedidos Completos'),'/pedidos/pedidosCompletos'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Pedidos Procesados'),'/pedidos/pedidosProcesados'); ?></div>	
</div>
<div id="tituloTabla">
  <?php echo __("Comprobando Pedido '").$obj_pedido->getNumPedido()."' | ".$acc_fechas->cambiarFormatoFecha14($obj_pedido->getUpdatedAt()); ?>
</div>
<?php if(!isset($msg)): ?>
	<?php echo form_tag('/pedidos/comprobarPedidoCompleto'); ?>
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
			<td><?php echo $obj_proveedor->getNombre(); ?></td>
			<td><?php echo $obj_proveedor->getCifNif(); ?></td>
			<td><?php echo $obj_proveedor->getDireccion(); ?></td>
			<td><?php echo $obj_proveedor->getPoblacion(); ?></td>
			<td>
				<?php if($obj_proveedor->getProvincia()): ?>
					<?php echo $ar_provincias[$obj_proveedor->getProvincia()]; ?>
				<?php endif; ?>
			</td>
			<td><?php echo $obj_proveedor->getCP(); ?></td>
			<td><?php echo format_country($obj_proveedor->getPais()); ?></td>
			<td><?php echo $obj_proveedor->getTelefono(); ?></td>
			<td><?php echo $obj_proveedor->getMovil(); ?></td>
			<td><?php echo $obj_proveedor->getFax(); ?></td>
			<td><?php echo $obj_proveedor->getEmail(); ?></td>
			<td><?php echo $obj_proveedor->getWeb(); ?></td>	
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
			<?php if($ar_lineas_pedido): ?>
				<?php foreach($ar_lineas_pedido as $linea_pedido): ?>
					<?php $obj_articulo = $acc_articulos->obtenerObjArticulo($linea_pedido->getIdArticulo()); ?>
					<tr>
						<?php if ($obj_articulo->getImagen() != ''): ?>
							<?php $imagen_tam = getimagesize(sfConfig::get('app_imagen_articulos').'/'.$obj_articulo->getImagen()); ?>
							<td align="center" style="padding:5px;"><?php echo image_tag('articulos/'.$obj_articulo->getImagen(),array('size' => '20x'.($imagen_tam[1]*20)/$imagen_tam[0])); ?></td>
						<?php else: ?>
							<td align="center" style="padding:5px;"><?php echo image_tag('no_image.jpg',array('size' => '20x20')); ?></td>
						<?php endif; ?>
						<td><?php echo $obj_articulo->getNombre(); ?></td>
						<td><?php echo $obj_articulo->getDatosProducto(); ?></td>
						<td><?php echo $linea_pedido->getCantidad(); ?></td>				
						<td><?php echo checkbox_tag('id_linea_pedido['.$linea_pedido->getIdArticuloXPedido().']',$linea_pedido->getIdArticuloXPedido(),isset($ar_lineas_pedido_completo[$linea_pedido->getIdArticuloXPedido()])) ?></td>
					</tr>
				<?php endforeach; ?>
			<?php else: ?>
				<tr><td colspan='5' align="center"><?php echo __("No hay artículos en el pedido."); ?></td></tr>
			<?php endif; ?>
		</tbody>
	</table>
	<?php echo input_hidden_tag('id_md5_pedido',$id_md5_pedido);?>
	<?php echo button_to(__('Cancelar'),'/pedidos/pedidosRecibidos',array('class' => 'buttonEsqueleto2')); ?>
	<?php echo submit_tag(__('Pedido Completo'),array('class' => 'buttonEsqueleto2')) ?>
	</form>
<?php else: ?>
	<table class='centrarTablas'>
		<thead>
			<tr>
				<td colspan='2'><?php echo __("Comprobar Pedido Completo"); ?></td>
			</tr>
		</thead>
		<tr><td align='center' colspan='2'><?php echo $msg; ?></td></tr>
		<?php if($contador_lineas_pedido == $contador_lineas_pedido_completas): ?>
			<tr>
				<td><?php echo button_to(__('Volver'),'/pedidos/pedidosRecibidos',array('class' => 'buttonEsqueleto2')); ?></td>
				<td><?php echo button_to(__('Procesar Pedido'),'entradas/procesarEntrada?id_md5_pedido='.$id_md5_pedido,array('class' => 'buttonEsqueleto2')); ?></td>
			</tr>
		<?php else: ?>
			<tr>
				<td colspan='2'><?php echo button_to(__('Volver'),'/pedidos/pedidosRecibidos',array('class' => 'buttonEsqueleto2')); ?></td>
			</tr>		
		<?php endif;?>
	</table>
<?php endif; ?>